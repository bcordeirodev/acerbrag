<?php



/**
 * Skeleton subclass for representing a row from the 'resposta' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.Default
 */
class Resposta extends BaseResposta {
	
	/**
	 * Resposta tipo texto.
	 */
	const RESPOTA_TIPO_TEXTO					= 1;

	/**
	 * Resposta tipo nummero.
	 */
	const RESPOTA_TIPO_NUMERO					= 2;

	/**
	 * Resposta de tipo multipla escolha.
	 */
	const RESPOTA_TIPO_MULTIPLA_ESCOLHA			= 3;

	/**
	 * Resposta de tipo opção unica.
	 */
	const RESPOTA_TIPO_OPCAO_UNICA				= 4;

	/**
	 * Resposta de tipo multipla escolha com imagem.
	 */
	const RESPOTA_TIPO_MULTIPLA_ESCOLHA_IMAGEM	= 5;

	/**
	 * Resposta de tipo opção unica com imagem.
	 */
	const RESPOTA_TIPO_OPCAO_UNICA_IMAGEM		= 6;
} // Resposta
