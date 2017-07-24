<?php
/**
 * Este arquivo contém um controle pertencente ao sistema da Interativa
 * Desenvolvimento.
 * @version 0.1
 * @package Controller
 */

/**
 * Classe responsável por manipular documentos HTML que devem ser compactos.
 * @author Diego Andrade
 */
class BaseHtmlHelper
{
	/**
	 * Objeto usado para manipular o HTML e fazer todas as operações de
	 * traversia DOM. O HTML final é extraído dele.
	 * @var HtmlDocument
	 */
	protected $doc					= null;

	/**
	 * Caminho do diretório base do componente.
	 * @var string
	 */
	protected $baseDir				= null;

	/**
	 * Procura pelos elementos especificados por <code>$tag</code> e incorpora
	 * seu conteúdo no lugar da URL original. O conteúdo é incorporado usando
	 * data URL. Este método é específico para incorporar CSS e JS.
	 * @param string $tag Tag dos elementos que precisam ter seu conteúdo
	 * incorporado. Atualmente apenas link (para CSS) e script (para JS) são
	 * suportados. No caso do CSS, se houver referências dentro do arquivo CSS
	 * para arquivos externos como imagens de fundo e fontes, estes serão também
	 * serão incorporados.
	 * @param boolean $return Indica se o conteúdo deve ser incorporado no
	 * elemento original (false), ou retornado ao final do processamento (true).
	 * @return string Se o parâmetro <code>$return</code> for true, retorna o
	 * conteúdo concatenado de todos os elementos encontrados. Se for false,
	 * nada é retornado.
	 * @see BaseHtmlHelper::encodeFile()
	 */
	protected function embedResources($tag, $return)
	{
		$elements = $this->find($tag);
		$attrs = array(
			'script' => 'src',
			'link' => 'href',
		);
		$attr = $attrs[$tag];
		$content = '';

		foreach($elements as $element)
		{
			$src = $element->getAttribute($attr);

			if(!empty($src))
			{
				if(File::exists($this->baseDir . $src))
				{
					$element->removeAttribute($attr);
					$file = File::open($this->baseDir . $src);
					$fileContent = $file->read();
					$file->close();

					if($tag == 'link')
					{
						$matches = Text::matchAll('#url\((.+?)\)#', $fileContent);
						$baseDir = $file->getDirPath();

						if($matches)
						{
							foreach($matches[1] as $match)
							{
								$url = Text::remove('#\'|"#', $match);
								$path = Enviroment::normalizePath($baseDir . $url);

								if(File::exists($path))
								{
									$file = File::open($path, true);
									$embedContent = $this->encodeFile($file);
									$file->close();
									$fileContent = Text::replace($match, "'{$embedContent}'", $fileContent);
								}
							}
						}

						$fileContent = CssMin::minify($fileContent);
					}
					else
					{
						$fileContent = JSMin::minify($fileContent);
					}

					$content .= $fileContent;
				}

				$element->remove();
			}
		}

		if($return)
		{
			return $content;
		}
		else
		{
			if(!empty($content))
			{
				if($tag == 'link')
				{
					$this->doc->getElementsByTagName('head')->item(0)->append("<style type='text/css'>{$content}</style>");
				}
				else
				{
					$scriptTag = new HtmlElement('script');
					$scriptTag->setAttribute('charset', 'UTF-8');
					$scriptTag = $this->doc->importNode($scriptTag);
					$scriptTag->append(new HtmlText($content));
					$this->doc->getElementsByTagName('body')->item(0)->append($scriptTag);
				}
			}
		}
	}

	/**
	 * Procura pelos elementos especificados por <code>$tag</code> e incorpora
	 * seu conteúdo no lugar da URL original. O conteúdo é incorporado usando
	 * data URL. Este método é usado para incorporar principalmente arquivos de
	 * mídia como imagens e vídeos.
	 * @param string $tag Expressão CSS para encontrar os elementos que precisam
	 * ter seu conteúdo incorporado, tais como img, video etc.
	 * @see BaseHtmlHelper::encodeFile()
	 */
	protected function embedMedias($tag)
	{
		$elements = $this->find($tag);

		foreach($elements as $element)
		{
			$src = $element->getAttribute('src');

			if(!empty($src) && File::exists($this->baseDir . $src))
			{
				$file = File::open($this->baseDir . $src, true);
				$element->setAttribute('src', $this->encodeFile($file));
				$file->close();
			}
		}
	}

	/**
	 * Codifica um arquivo usando base64 e retorna seu conteúdo em uma data URL.
	 * @param File $file Arquivo para ser codificado.
	 * @return string String no formato de uma data URL, codificada em base64.
	 */
	protected function encodeFile(File $file)
	{
		$src = '';
		$dataType = null;

		switch($file->getExtension())
		{
			case 'mp4':
			case 'webm':
			case 'ogg':
			case 'flv':
				$dataType = 'video/' . $file->getExtension();
				break;
			case 'ttf':
			case 'woff':
				$dataType = 'font/' . $file->getExtension();
				break;
			default:
				$dataType = 'image/' . $file->getExtension();
				break;
		}

		$src = 'data:' . $dataType . ';charset=UTF-8;base64,' . base64_encode($file->read());
		return $src;
	}

	/**
	 * Faz uma pesquisa por elementos HTML utilizando expressão CSS e retorna
	 * uma lista como resultado.
	 * @param string $query Expressão CSS.
	 * @return HtmlElementList Lista com o resultado.
	 */
	public function find($query)
	{
		return $this->doc->xpath(HtmlTranslator::cssToXpath($query));
	}

	/**
	 * Retorna um ArrayList com a lista de regras CSS e seus valores.
	 * @param string $css Código CSS original.
	 * @return ArrayList Retorna um ArrayList com todas as regras encontradas.
	 * Se nada for encontrado, o ArrayList será retornado vazio.
	 */
	protected function getCssRules($css)
	{
		$rules = array();
		$matches = Text::matchAll('#(.+?){([^:]+:.+?);?}#', $css);

		if($matches)
		{
			foreach($matches[1] as $i => $match)
				$rules[$match] = $matches[2][$i];
		}

		return new ArrayList($rules);
	}
}
