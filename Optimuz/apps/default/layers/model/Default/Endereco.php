<?php



/**
 * Skeleton subclass for representing a row from the 'endereco' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.Default
 */
class Endereco extends BaseEndereco {
	/**
	 * Define o valor do campo CEP.
	 * @param string $v Valor do campo, com ou sem máscara. Se contiver máscara,
	 * ela será retirada.
	 */
	public function setCep($v)
	{
		parent::setCep(Text::remove('#\D+#', $v));
	}

	/**
	  * Retorna o CEP formatado.
	  * @return string CEP no formato 00000-000.
	  */
	public function getCepFormatado()
	{
		return Text::substring($this->cep, 0, -3) . '-' . Text::substring($this->cep, -3);
	}
} // Endereco
