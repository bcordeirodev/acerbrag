<?php
/**
 * Este arquivo contém um controle pertencente ao sistema da Interativa
 * Desenvolvimento.
 * @version 0.1
 * @package Controller
 */

/**
 * Controle auxiliar usado para realizar tarefas comuns.
 * @author Diego Andrade
 */
class Utils
{
	/**
	 * Retorna uma versão criptografada da string original.
	 * @param string $string String original.
	 * @return string String criptografada.
	 * @static
	 */
	public static function encrypt($string)
	{
		$md5 = md5($string);
		$salt = '7$+arzVvTBiauxijwmugdaaFPcbMp3333546250_';
		$hash = hash('sha512', $salt . $md5 . strrev($salt));
		return $hash;
	}

	/**
	 * Gera uma senha de 12 digitos
	 * @return String
	 * @author Bruno Cordeiro
	 */
	public static function generatePassword()
	{
		return substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#+$%*"), 0, 12);
	}

	/**
	 * Retorna o número formatado.
	 * @param mixed $number Número original que será formatado.
	 * @param int $decimals Número de casas decimais. O padrão são 2.
	 * @return string Número já formatado.
	 * @static
	 */
	public static function formatNumber($number, $decimals = 2)
	{
		$numberFormated = null;

		if(!empty($number))
			$numberFormated = number_format($number, $decimals, ',', '.');

		return $numberFormated;
	}

	/**
	 * Converte uma data passada no formato YYYY-MM-DD para DD/MM/YYYY.
	 * @param string $date Data no formato YYYY-MM-DD. Qualquer caracter não
	 * numérico pode ser usado como separador.
	 * @return string Data no formato DD/MM/YYYY.
	 */
	public static function formatDate($date)
	{
		return Text::replace('#(\d{4})\D(\d{2})\D(\d{2})#', '$3/$2/$1', $date);
	}

	/**
	 * Converte uma data passada no formato DD/MM/YYYY para YYYY-MM-DD.
	 * @param string $date Data no formato YYYY-MM-DD. Qualquer caracter não
	 * numérico pode ser usado como separador.
	 * @return string Data no formato DD/MM/YYYY
	 */
	public static function formatDateDb($date)
	{
		return Text::replace('#(\d{2})\D(\d{2})\D(\d{4})#', '$3-$2-$1', $date);
	}


	/**
	 * Converte um número formatado monetariamente para double.
	 * @param string $number Número formatado (ex. 1.000,00).
	 * @return double Retorna um double.
	 * @static
	 */
	public static function textToDouble($number)
	{
		if(is_string($number) && !empty($number))
		{
			$number = Text::remove('.', $number);
			$number = Text::replace(',', '.', $number);
		}

		return (double)$number;
	}

	/**
	 * Retorna os registros da coleção em um formato aceito pelo plugin Select2
	 * do jQuery, quando usado em um input hidden.
	 * @param PropelCollection $records Coleção de objetos oriundos do banco de
	 * dados.
	 * @return array
	 * @static
	 */
	public static function toSelect2(PropelCollection $records)
	{
		$data = array();

		foreach($records as $record)
			$data[] = array('id' => $record->getId(), 'text' => $record->getNome());

		return $data;
	}

	/**
	 * Verifica se a string passada está vazia e se estiver retorna um valor
	 * padrão.
	 * @param string $string String original.
	 * @param string $default String padrão que será devolvida caso a string
	 * original esteja vazia.
	 * @return string String original ou valor padrão se necessário.
	 * @static
	 */
	public static function defaultValue($string, $default = '--')
	{
		return empty($string) ? $default : $string;
	}

	/**
	 * Retorna uma data formatada nos mesmo padrões das principais redes sociais
	 * (hoje às ..., ontem às ..., etc).
	 * @param mixed $dateExpr Data no formato de string, timestamp ou um objeto
	 * <code>Date</code>.
	 * @return string Data formatada.
	 * @static
	 */
	public static function getDateFormatted($dateExpr)
	{
		$dateFormatted = '';
		$date = Date::parse($dateExpr);
		$diff = Date::diff($date, Date::get());

		if($diff->getDays() < 1)
		{
			if($diff->getSeconds() < 59)
			{
				$time = floor($diff->getSeconds());
				$dateFormatted = "Há {$time} segundo";
			}
			elseif($diff->getMinutes() < 59)
			{
				$time = floor($diff->getMinutes());
				$dateFormatted = "Há {$time} minuto";
			}
			else
			{
				if(floor($diff->getHours()) > Date::hour())
				{
					$dateFormatted = 'Ontem às ' . $date->getTime('H:i:s');
					$time = null;
				}
				else
				{
					$time = round($diff->getHours());

					if($time === 0)
						$time = 1;

					$dateFormatted = "Há {$time} hora";
				}
			}

			$dateFormatted .= $time > 1 ? 's' : '';
		}
		elseif($diff->getDays() < 2)
		{
			$dateFormatted = 'Ontem às ' . $date->getTime('H:i:s');
		}
		else
		{
			$dateFormatted = $date->getDate('d/m/Y \à\s H:i:s');
		}

		return $dateFormatted;
	}

	/**
	 * Retorna uma string com a diferença entre os valores dos dois arrays. Este
	 * método é usado para construir os detalhes dos registros da tabela de
	 * auditoria. Ele descobre quais campos foram modificados e registra suas
	 * alterações de valores.
	 * @param array $array1 Lista de campos de uma tabela com seus respectivos
	 * valores.
	 * @param array $array2 Lista de campos de uma tabela com seus valores
	 * atuais.
	 * @param mixed $object (opcional) Objeto de onde os valores foram extraídos
	 * para os arrays.
	 * @param array $keysMap (opcional) Array contendo as traduções para os
	 * nomes das chaves e seus respectivos labels.
	 * @param array $valuesMap (opcional) Array contendo as traduções para os
	 * valores dos campos e seus respectivos labels.
	 * @return string
	 * @static
	 * @todo Aprimorar este método para lidar com chaves estrangeiras.
	 */
	public static function getDifferenceDetais(array $array1, array $array2, $object = null, array $keysMap = null, array $valuesMap = null)
	{
		foreach($array1 as $key => $value)
		{
			if(is_array($value))
				$array1[$key] = implode(', ', $value);
			elseif(isset($valuesMap[$value]))
				$array1[$key] = $valuesMap[$value];
		}

		foreach($array2 as $key => $value)
		{
			if(is_array($value))
				$array2[$key] = implode(', ', $value);
			elseif(isset($valuesMap[$value]))
				$array2[$key] = $valuesMap[$value];
		}

		$obs = '';
		$diffColumns = array_diff_assoc($array1, $array2);

		if(!empty($diffColumns))
		{
			$obs = '<p>Os seguintes campos foram modificados:</p><ul>';

			foreach($diffColumns as $key => $value)
			{
				$oldValue = $array2[$key];

				if(!is_null($value) && ($value !== ''))
				{
					$isForeignKey = Text::substring($key, -2) == 'Id';

					if($isForeignKey)
					{
						$method = 'get' . Text::remove('#Id$#', $key);

						if(Object::hasMethod($object, $method))
							$value = $object->$method()->getNome();
					}

					if(!is_null($oldValue) && ($oldValue !== ''))
					{
						if($isForeignKey)
						{
							$class = Text::remove('#Id$#', $key) . 'Query';

							if(class_exists($class, false))
							{
								$instance = new $class;
								$oldValue = $instance->findPk($oldValue)->getNome();
							}
						}

						$oldValue = "de <strong>{$oldValue}</strong> para";
					}
					else
					{
						$oldValue = "novo valor";
					}

					$value = "<strong>{$value}</strong>";
				}
				else
				{
					$oldValue = '';
					$value = "valor removido";
				}

				$key = Text::remove('# Id$#', Text::replace('#([A-Z])#', ' $1', $key));

				if(isset($keysMap[$key]))
					$key = $keysMap[$key];

				$obs .= "<li>{$key}: {$oldValue} {$value}</li>";
			}

			$obs .= '</ul>';
		}
		else
		{
			$obs = '<p>Nenhum campo modificado.</p>';
		}

		return $obs;
	}

	/**
	 * Envia um email de sistema para o usuário.
	 * @param mixed $usuario Usuário que receberá o email.
	 * @param string $assunto Assunto do email.
	 * @param string $mensagem Corpo da mensagem.
	 * @return boolean Retorna true se o email for enviado, ou false caso
	 * contrário.
	 * @static
	 */
	public static function sendUserEmail(Usuario $usuario, $assunto, $mensagem)
	{
		return self::sendEmail($usuario->getEmail(), $usuario->getNome(), $assunto, $mensagem);
	}

	/**
	 * Envia um email de sistema.
	 * @param string $destinatarioEmail Email do destinatário.
	 * @param string $destinatarioNome Nome do destinatário.
	 * @param string $assunto Assunto do email.
	 * @param string $mensagem Corpo da mensagem.
	 * @param mixed $anexo (opcional) Objeto File ou caminho completo para o
	 * arquivo que será anexado na mensagem.
	 * @return boolean Retorna true se o email for enviado, ou false caso
	 * contrário.
	 * @static
	 */
	public static function sendEmail($destinatarioEmail, $destinatarioNome, $assunto, $mensagem, $anexo = null)
	{
		$template = HtmlHelper::load(Application::getCurrent()->getPath('view') . 'email/Padrao/index.html');
		$template->find('.mail-header')->getFirst()->html("Olá {$destinatarioNome},");
		$template->find('.mail-body')->getFirst()->html($mensagem);
		$template->find('.mail-logo img')->getFirst()->setAttribute('src', Enviroment::resolveUrl('~/resource/default/img/logo-name.png'));
		$template->find('.mail-infos')->getFirst()->html('Este e-mail foi disparado pelo sistema, não o responda.');
		$template->embed();
		$html = $template->getHtml();

		$mail = new Mail;
		$mail->setFrom('nao.responda@legalway.com.br', 'LegalWay');
		$mail->addTo($destinatarioEmail, $destinatarioNome);
		$mail->setSubject($assunto);
		$mail->setMessage($html);

		if(!empty($anexo))
			$mail->attachFile($anexo);

		try
		{
			$success = $mail->send();
		}
		catch(Error $error)
		{
			Report::sendError($error);
			$success = false;
		}
		catch(Exception $ex)
		{
			Report::sendError(new Error($ex));
			$success = false;
		}

//		$messages = $mail->getSMTPServer()->getMessages();
//
//		if(!empty($messages))
//		{
//			$logMessage = '';
//
//			foreach($messages as $message)
//				$logMessage .= "COMMAND: {$message['command']}, RESPONSE: {$message['response']}\n";
//
//			Log::add($logMessage, Log::INFO, Log::MESSAGE_SHORT, Application::getCurrent()->getName());
//		}

		return $success;
	}

	/**
	 * Retorna o SQL gerado pela consulta <code>$query</code>.
	 * @param ModelCriteria $originalQuery Modelo responsável pela consulta, de
	 * onde o SQL será retornado.
	 * @param boolean $dumpParams (opcional) Indica se os parâmetros da consulta
	 * também devem ser detalhados. O padrão é false.
	 * @return string SQL da consulta.
	 * @todo Retornar também os campos do SELECT
	 */
	public static function getSQL(ModelCriteria $originalQuery, $dumpParams = false)
	{
		$query = clone $originalQuery;
//		$select = $query->getSelect();

		//$query->configureSelectColumns();
//		if(!is_null($select))
//		{
//			$query->setFormatter('PropelSimpleArrayFormatter');
//			$query->clearSelectColumns();
//			$query->setPrimaryTableName(constant($query->getModelPeerName() . '::TABLE_NAME'));
//
//			$columnNames = is_array($select) ? $select : array($select);
//
//			foreach($columnNames as $columnName)
//			{
//				if(!array_key_exists($columnName, $query->getAsColumns()))
//				{
//					$column = $query->getColumnName($columnName);
//					$query->addAsColumn('"' . $columnName . '"', $column[1]);
//				}
//			}
//		}

		$params = array();
		$sql = BasePeer::createSelectSql($query, $params);

		if($dumpParams)
		{
			$db = Propel::getDB($query->getDbName());
			$dbMap = Propel::getDatabaseMap($query->getDbName());
			$stmt = Propel::getConnection()->prepare($sql);
			$db->bindValues($stmt, $params, $dbMap);

			Buffer::start();
			$stmt->debugDumpParams();
			$completeSql = Buffer::stop();
		}
		else
		{
			$completeSql = $sql;
		}

		return $completeSql;
	}

	/**
	 * Remove os apelidos das chaves do array passado. Chaves sem alias não
	 * serão alteradas.
	 * @param array $record Array associativo com chaves no formato a.key.
	 * @param string $alias (opcional) Se for informado, apenas as chaves com
	 * este alias serão alteradas.
	 * @return array Array com chaves sem alias.
	 * @static
	 */
	public static function clearAlias($record, $alias = null)
	{
		$newRecord = array();

		foreach($record as $key => $value)
			$newRecord[empty($alias) ? Text::remove('^\w\.', $key) : Text::remove("{$alias}.", $key)] = $value;

		return $newRecord;
	}

	/**
	 * Retorna um cliente HTTP para requisições remotas. O cliente já vem com o
	 * User-Agent configurado para o Firefox.
	 * @param string $url (opcional) URL da requisição.
	 * @param string $method (opcional) Método da requisição. O padrão é
	 * <code>HttpTransport::GET</code>.
	 * @return HttpRequest
	 */
	public static function getHttpClient($url = null, $method = HttpTransport::GET)
	{
		$client = new HttpRequest($url, $method);
		$client->setUserAgent('Mozilla/5.0 (Windows NT 6.3; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0');
//		$client->setTimeout(10);
		$client->setConnectionType('close');

		return $client;
	}

	/**
	 * Verfica se a chave existe na coleção e retorna seu valor associado. Se a
	 * chave não existir, retorna null ou outro valor específico.
	 * @param mixed $collection A coleção pode ser um array ou um objeto. Se for
	 * um objeto, a chave deve ser uma propriedade pública.
	 * @param mixed $key A chave usada para retornar o valor desejado da
	 * coleção. Pode ser qualquer valor aceito como chave de um array ou objeto.
	 * @param mixed $emptyValue (opcional) Valor que será retornado caso a chave
	 * não exista na coleção. O padrão é null.
	 * @return mixed Retorna o valor correspondente à chave na coleção. Se a
	 * chave não existir, retorna null ou o valor indicado em
	 * <code>$emptyValue</code>.
	 * @static
	 */
	public static function getValueOrNull($collection, $key, $emptyValue = null)
	{
		return is_array($collection) ? (isset($collection[$key]) && !empty($collection[$key]) ? $collection[$key] : $emptyValue) : (is_object($collection) && property_exists($collection, $key) && !empty($collection[$key]) ? $collection->{$key} : $emptyValue);
	}

	/**
	 * Adiciona uma mascára a qualquer campo informado.
	 * @param string $val Valor que irá receber a mascara.
	 * @param string $mask Descrição da mascára a ser adicionada, o campo aceita
	 * apenas o número '9' como exemplo de mascára ex. 99/99/9999.
	 * @return string Retorna a string formatada de acordo com o informado na
	 * variável $mask.
	 * @static.
	 */
	public static function mask($val, $mask)
	{
		$maskared = '';

		if(!($val == '' || empty($val)))
		{
			$k = 0;

			for($i = 0; $i<=strlen($mask)-1; $i++)
			{
				if($mask[$i] == '9')
				{
					if(isset($val[$k]))
					$maskared .= $val[$k++];
				}
				else
				{
					if(isset($mask[$i]))
					$maskared .= $mask[$i];
				}
			}
		}

		return $maskared;
	}

	/**
	 * Remove tudo que não seja numero da string.
	 * @param String $string
	 * @author Bruno Cordeiro
	 */
	public static function getJustNumber($string)
	{
		return preg_replace("/[^0-9]/", "", $string);
	}

	/**
	 * Remove todos os acentos da string
	 *
	 * @param String $string String que será usada para remover os acentos.
	 * @param String $slug (opcional) Trocará tudo que não for letra pelo
	 * caractere informado no pamâmetro.
	 * @author Bruno Cordeiro
	 * @return Strig
	 */
	public static function removeAccent($string , $slug = null)
	{
		$string = strtolower($string);

		if(mb_detect_encoding($string.'x', 'UTF-8, ISO-8859-1') == 'UTF-8')
			$string = utf8_decode(strtolower($string));

		// Código ASCII das vogais
		$ascii['a'] = range(224, 230);
		$ascii['e'] = range(232, 235);
		$ascii['i'] = range(236, 239);
		$ascii['o'] = array_merge(range(242, 246), array(240, 248));
		$ascii['u'] = range(249, 252);

		// Código ASCII dos outros caracteres
		$ascii['b'] = array(223);
		$ascii['c'] = array(231);
		$ascii['d'] = array(208);
		$ascii['n'] = array(241);
		$ascii['y'] = array(253, 255);

		foreach($ascii as $key => $item)
		{
			$acentos = '';

			foreach($item AS $codigo)
				$acentos .= chr($codigo);
			$troca[$key] = '/[' . $acentos . ']/i';
		}

		$string = preg_replace(array_values($troca), array_keys($troca), $string);

		// Slug?
		if($slug)
		{
			/*
			 *  Troca tudo que não for letra ou número por um caractere ($slug)
			 */
			$string = preg_replace('/[^a-z0-9]/i', $slug, $string);

			/*
			 *  Tira os caracteres ($slug) repetidos
			 */
			$string = preg_replace('/' . $slug . '{2,}/i', $slug, $string);
			$string = trim($string, $slug);
		}

		return $string;
	}
}
