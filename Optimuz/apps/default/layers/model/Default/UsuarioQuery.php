<?php



/**
 * Skeleton subclass for performing query and update operations on the 'usuario' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.4 on:
 *
 * Sat Sep  6 02:37:20 2014
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.Communikame
 */
class UsuarioQuery extends BaseUsuarioQuery {
	/**
	 * Retorna uma query para selecionar apenas os usuários ativos (ou inativos
	 * se for especificado). As contas também são filtradas para retornar apenas
	 * usuários de contas ativas.
	 * @param string $modelAlias (opcional) Alias usado na consulta. O padrão é
	 * <code>u</code>.
	 * @param boolean $active (opcional) Indica se os usuários retornados devem
	 * ser os ativos ou inativos (removidos). O padrão é true, ou seja, retorna
	 * apenas usuários ativos.
	 * @return UsuarioQuery
	 * @static
	 */
	public static function getAtivos($modelAlias = 'u', $active = true)
	{
		return self::create($modelAlias)
			->filterByAtivo($active);
	}

	/**
	 * Apresenta os usuários baseado no perfíl do usuário logado no sistema.
	 *
	 * @param string $alias Alias usado na consulta.
	 * @return UsuarioQuery Objeto de consulta dos usuários.
	 * @autor Bruno Cordeiro.
	 * @static
	 */
	public static function getByUserProfile($alias = 'u')
	{
		$currentUser = Usuario::atual();
		
		$query = self::create($alias)
			->filterById($currentUser->getId(), Criteria::NOT_EQUAL);

		return $query;
	}
} // UsuarioQuery
