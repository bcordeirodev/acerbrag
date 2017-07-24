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
class HtmlHelper extends BaseHtmlHelper
{
	/**
	 * Carrega um arquivo HTML e retorna uma nova instância da classe para
	 * manipulação.
	 * @param mixed $file Objeto File ou caminho absoluto para um arquivo HTML.
	 * @return HtmlHelper Retorna uma nova instância da classe. Se não for
	 * possível carregar o documento HTML, uma exceção <code>Error</code> será
	 * lançada.
	 * @throws Error
	 * @static
	 */
	public static function load($file)
	{
		if(is_string($file))
		{
			if(File::exists($file))
				$file = File::open($file);
			else
				throw new Error("O arquivo HTML {$file} é inválido");
		}
		elseif(!Object::isType($file, 'File'))
		{
			throw new Error('O método HtmlHelper::load() precisa receber uma instância válida da classe File ou o caminho de um arquivo HTML válido.');
		}
		
		$instance = new self;
		$instance->doc = new HtmlDocument;
		$instance->doc->loadFileContent($file->getPath());
		$instance->baseDir = $file->getDirPath() . '/';
		return $instance;
	}
	
	/**
	 * Retorna o HTML completo do documento.
	 * @return string
	 */
	public function getHtml()
	{
		return $this->doc->saveHTML();
	}
	
	/**
	 * Incorpora todos os arquivos externos vinculados no HTML, como imagens e
	 * CSS.
	 */
	public function embed()
	{
//		$this->embedMedias('img');
		$this->embedStyles();
	}
	
	/**
	 * Incorpora todos os arquivos CSS encontrados no documento. As regras CSS
	 * são incorporadas diretamente nos elementos HTML definidos por seus
	 * seletores.
	 */
	protected function embedStyles()
	{
		$elements = $this->find('link');
		$content = '';
		
		foreach($elements as $element)
		{
			$src = $element->getAttribute('href');
			
			if(!empty($src))
			{
				if(File::exists($this->baseDir . $src))
				{
					$file = File::open($this->baseDir . $src);
					$fileContent = $file->read();
					$file->close();
					
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
					$content .= $fileContent;
				}

				$element->remove();
			}
		}

		if(!empty($content))
		{
			foreach($this->getCssRules($content) as $selector => $styles)
			{
				foreach($this->find($selector) as $element)
					$element->setAttribute('style', ($element->hasAttribute('style') ? $element->getAttribute('style') . ';' : '') . $styles);
			}
		}
	}
}
