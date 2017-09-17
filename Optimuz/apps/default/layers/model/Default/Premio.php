<?php



/**
 * Skeleton subclass for representing a row from the 'premio' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.Default
 */
class Premio extends BasePremio {

	/**
	 * Retorna o caminho da pasta do objeto instanciado.
	 *
	 * O diretório é criado automaticamente caso ainda não exista.
	 * @return string Caminho do diretório.
	 * @author Bruno Cordeiro
	 */
	public function getDiretorio()
	{
		$optionDir = null;

		if(!empty($this->id))
		{
			$optionDir = Application::getCurrent()->getPath('resources') . 'premio/' . $this->id . '/';

			if(!Dir::exists($optionDir))
				Dir::create($optionDir);

			return $optionDir;
		}
	}

	/**
	 * Retorna a imagem cadastrada para a notícia.
	 *
	 * @param boolean $returnUrl (opcional) Se for true retorna a URL da imagem,
	 * caso contrário retorna o caminho físico da mesma.
	 * @return string Retorna o caminho da imagem ou null caso ela não exista.
	 */
	public function getImagem($returnUrl = true)
	{
		$img = null;
		$file = File::search($this->getDiretorio() . "*");

		if(!$file->isEmpty())
		{
			if($returnUrl)
				$img = Enviroment::resolveUrl("~/resource/default/premio/{$this->id}/{$file->getFirst()->getName()}");
			else
				$img = $file->getFirst()->getPath();
		}

		return $img;
	}

} // Premio
