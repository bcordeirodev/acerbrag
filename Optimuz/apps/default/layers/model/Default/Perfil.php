<?php



/**
 * Skeleton subclass for representing a row from the 'perfil' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.Default
 */
class Perfil extends BasePerfil {

	/**
	 * Usuário com perfil administrador.
	 */
	const PERFIL_ADMINISTRADOR					= 1;

	/**
	 * Perfil para usuários comuns
	 */
	const PERFIL_USUARIO_REGULAR				= 2;
} // Perfil
