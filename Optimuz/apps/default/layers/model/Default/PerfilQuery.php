<?php



/**
 * Skeleton subclass for performing query and update operations on the 'perfil' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.Default
 */
class PerfilQuery extends BasePerfilQuery {

	/**
	 * Aprensenta a lista de perfil baseado no perfil do usuário atual.
	 */
	public static function personList()
	{
		$currentUser = Usuario::atual();
		$isAdmin = $currentUser->getPerfilId() == Perfil::PERFIL_ADMINISTRADOR;
		$isCoordinator = $currentUser->getPerfilId() == Perfil::PERFIL_COORDENADOR;

		$profile = self::create()
				->filterById(Perfil::PERFIL_PESQUISADOR);

		if($isCoordinator)
		{
			$profile = self::create()
				->filterById(array(
						Perfil::PERFIL_SUPERVISOR,
						Perfil::PERFIL_PESQUISADOR)
					);
		}
		elseif($isAdmin)
		{
			$profile = self::create()
				->filterById(array(
						Perfil::PERFIL_COORDENADOR,
						Perfil::PERFIL_SUPERVISOR,
						Perfil::PERFIL_PESQUISADOR)
					);
		}

		return $profile;
	}

} // PerfilQuery
