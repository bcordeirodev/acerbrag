<?php
/**
 * This file defines a class to send e-mails directly to SMTP servers,
 * supporting SMTP authentication, file attachment and others features.
 * @version 0.2
 * @package Email
 */

/**
 * Class used to send e-mails.
 *
 * This class does not uses the built-in mail() function, but connects directly
 * to the specified SMTP server (SMTP authentication is supported).
 * @author Diego Andrade
 * @package Email
 * @since Optimuz 0.1
 * @version 0.2
 * @uses Core
 * @uses IO
 * @uses Lang
 * @uses Email
 */
class Mail
{
	/**
	 * Field "From" not specified.
	 */
	const MISSING_FROM			= 100;

	/**
	 * Error while sending the e-mail.
	 */
	const SEND_ERROR			= 101;

	/**
	 * Message is low priority.
	 */
	const PRIORITY_LOW			= "low";

	/**
	 * Message is normal priority.
	 */
	const PRIORITY_NORMAL		= "normal";

	/**
	 * Message is high priority.
	 */
	const PRIORITY_HIGH			= "high";

	/**
	 * Field "From".
	 *
	 * It's an array with keys: name and email.
	 * @var array
	 * @see Mail::setFrom()
	 */
	private $from				= null;

	/**
	 * Field "To".
	 *
	 * It's a two dimensions array. Each sub array contains the keys: name and
	 * email.
	 * @var array
	 * @see Mail::addTo()
	 */
	private $to					= null;

	/**
	 * Field "Cc".
	 *
	 * It's a two dimensions array. Each sub array contains the keys: name and
	 * email.
	 * @var array
	 * @see Mail::addCc()
	 */
	private $cc					= null;

	/**
	 * Field "Bcc".
	 *
	 * It's a two dimensions array. Each sub array contains the keys: name and
	 * email.
	 * @var array
	 * @see Mail::addBcc()
	 */
	private $bcc				= null;

	/**
	 * Message subject.
	 * @var string
	 * @see Mail::setSubject()
	 */
	private $subject			= null;

	/**
	 * Message body.
	 *
	 * It can to be a plain text or HTML, depending on the defined $type.
	 * @var string
	 * @see Mail::$isHtml
	 * @see Mail::setMessage()
	 */
	private $message			= null;

	/**
	 * Message priority.
	 *
	 * It can to be any of Mail::PRIORITY_* constants.
	 * @var string
	 * @see Mail::setPriority()
	 * @see Mail::getPriority()
	 */
	private $priority			= null;

	/**
	 * E-mail charset.
	 *
	 * It can to be any of Mail::PRIORITY_* constants.
	 * @var string
	 * @see Mail::setCharset()
	 * @see Mail::getCharset()
	 */
	private $charset			= null;

	/**
	 * Headers array for the e-mail.
	 * @var array
	 */
	private $headers			= null;

	/**
	 * Defines if the e-mail message will be HTML.
	 *
	 * When a new Mail object is created, this is automaticaly setted to true.
	 * @var bool
	 * @see Mail::$message
	 * @see Mail::setMessage()
	 */
	private $isHtml				= null;

	/**
	 * SmtpServer instance, used to authenticate on SMTP server.
	 * @var SmtpServer
	 * @see SmtpServer
	 * @see Mail::$useSmtpServer
	 * @see Mail::$useSmtpServerAuth
	 */
	private $smtp				= null;

	/**
	 * Defines if a SMTP server must to be used.
	 * @var bool
	 * @see SmtpServer
	 * @see Mail::$smtp
	 * @see Mail::$useSmtpServerAuth
	 */
	private $useSmtpServer		= null;

	/**
	 * Defines if is needed to authenticate in the SMTP server.
	 * @var bool
	 * @see SmtpServer
	 * @see Mail::$useSmtpServer
	 * @see Mail::$smtp
	 */
	private $useSmtpServerAuth	= null;

	/**
	 * List of attachments that will be added to the message.
	 * @var ArrayList
	 * @see Mail::attachFile()
	 */
	private $attachments		= null;

	/**
	 * Default MIME type used for attachments with unknown types.
	 * @var string text/plain
	 * @see Mail::setDefaultMimeType()
	 */
	private $defaultMimeType	= null;

	/**
	 * Creates a new instance and sets the default properties.
	 *
	 * If there is a SMTP server setted in the application configuration, the
	 * property Mail::$useSmtp will be setted to true automaticaly and these
	 * settings will be used.
	 * @see Mail::useSmtp()
	 * @see Mail::$useSmtpServer
	 */
	public function __construct()
	{
		$this->headers = array();
		$this->to = array();
		$this->cc = array();
		$this->bcc = array();
		$this->setIsHtml(true);
		$this->priority = self::PRIORITY_NORMAL;
		$this->charset = LocalConfiguration::get('page.charset');
		$this->attachments = new ArrayList();
		$this->attachments->setType('File');
		$this->defaultMimeType = 'text/plain';

		if(LocalConfiguration::get('smtp.enable'))
		{
			$this->useSmtpServer = true;
			$this->useSmtpServerAuth = LocalConfiguration::get('smtp.user') && LocalConfiguration::get('smtp.pwd');
			$this->smtp = new SmtpServer(LocalConfiguration::get('smtp.host.remote.name'), LocalConfiguration::get('smtp.host.remote.port'), LocalConfiguration::get('smtp.user'), LocalConfiguration::get('smtp.pwd'));
			$this->smtp->setLocalHost(LocalConfiguration::get('smtp.host.local.name'));
			$this->smtp->setSecurity(LocalConfiguration::get('smtp.host.remote.security'));
		}
	}

	/**
	 * Sets the field "From".
	 * @param string $email E-mail address.
	 * @param string $name (optimal) Sender name.
	 * @see Mail::$from
	 */
	public function setFrom($email, $name = null)
	{
		$this->from = array('email' => $email, 'name' => $name);
	}

	/**
	 * Sets the field "To".
	 * @param string $email E-mail address.
	 * @param string $name (optimal) Addressee name.
	 * @see Mail::$to
	 */
	public function addTo($email, $name = null)
	{
		$this->to[] = array('email' => $email, 'name' => $name);
	}

	/**
	 * Adds a new entry to the field "Cc".
	 * @param string $email E-mail address.
	 * @param string $name (optimal) Addressee name.
	 * @see Mail::$cc
	 */
	public function addCc($email, $name = null)
	{
		$this->cc[] = array('email' => $email, 'name' => $name);
	}

	/**
	 * Adds a new entry to the field "Bcc".
	 * @param string $email E-mail address.
	 * @param string $name (optimal) Addressee name.
	 * @see Mail::$bcc
	 */
	public function addBcc($email, $name = null)
	{
		$this->bcc[] = array('email' => $email, 'name' => $name);
	}

	/**
	 * Sets the e-mail subject.
	 * @param string $subject E-mail subject.
	 * @see Mail::$subject
	 */
	public function setSubject($subject)
	{
		$this->subject = $subject;
	}

	/**
	 * Sets the e-mail message.
	 * @param string $message E-mail message.
	 * @see Mail::$message
	 */
	public function setMessage($message)
	{
		$this->message = $message;
	}

	/**
	 * Sets an e-mail header.
	 * @param string $header E-mail header in its full form, like
	 * "Header-name: header value".
	 * @param bool $isHtmlHeader (optimal) Specifies if the header is an HTML
	 * header. If so, it will be appended in the right section. Default is
	 * false.
	 * @see Mail::$headers
	 */
	public function setHeader($header, $isHtmlHeader = false)
	{
		if($isHtmlHeader)
			$this->headers['html'][] = $header;
		else
			$this->headers[] = $header;
	}

	/**
	 * Sets if the e-mail type is HTML.
	 *
	 * If the e-mail is setted to be HTML, the required headers will be added
	 * automaticaly.
	 * @param bool $isHtml A boolean indicating whether the message type is
	 * HTML.
	 * @see Mail
	 * @see Mail::$isHtml
	 */
	public function setIsHtml($isHtml)
	{
		$this->isHtml = $isHtml;

		if($isHtml)
		{
			/*if(empty($this->headers['html']))
			{
				$this->headers['html'] = array(
					'MIME-Version: 1.0',
					"Content-type: text/html; charset=OPTIMUZ_MAIL_CHARSET"
				);
			}*/
		}
		else
		{
			if(!empty($this->headers['html']))
				$this->headers['html'] = array();
		}
	}

	/**
	 * Adds an attachment file.
	 * @param File|string $file File object or path to a file that will be
	 * attached.
	 */
	public function attachFile($file)
	{
		if(is_string($file))
		{
			if(File::exists($file))
				$file = File::open($file, true);
			else
				throw new EmailError(Language::getInstance('Email')->getSentence('error.attachmentNotFound', $file), File::NOT_EXISTS);
		}

		if(is_object($file) && ($file instanceof File))
			$this->attachments->add($file);
	}

	/**
	 * Sets if a SMTP server must to be used to send the email. If true, the
	 * SMTP configuration must to be setted in the application configuration
	 * file.
	 * @param bool $bool true or false.
	 * @see Mail
	 * @see Mail::send()
	 * @see Mail::$useSmtpServer
	 * @see Mail::$useSmtpServerAuth
	 * @see Mail::useSmtpAuth()
	 */
	public function useSmtp($bool)
	{
		$this->useSmtpServer = $bool;
	}

	/**
	 * Sets if is needed to authenticate in the SMTP server.
	 * @param bool $bool true or false.
	 * @see Mail::sand()
	 * @see Mail::$useSmtpServer
	 * @see Mail::$useSmtpServerAuth
	 * @see Mail::useSmtp()
	 */
	public function useSmtpAuth($bool)
	{
		$this->useSmtpServerAuth = $bool;
	}

	/**
	 * Sets the e-mail priority.
	 * @param string $priority Any of the following values: Mail::PRIORITY_LOW,
	 * Mail::PRIORITY_NORMAL, Mail::PRIORITY_HIGH.
	 * @see Mail::$priority
	 * @see Mail::getPriority()
	 */
	public function setPriority($priority)
	{
		$this->priority = $priority;
	}

	/**
	 * Returns the e-mail priority.
	 * @return string
	 * @see Mail::$priority
	 * @see Mail::setPriority()
	 */
	public function getPriority()
	{
		return $this->priority;
	}

	/**
	 * Sets the e-mail charset.
	 * @param string $charset The e-mail charset. Default is the application
	 * charset, defined in the page.charset setting.
	 * @see Mail::$charset
	 * @see Mail::getCharset()
	 */
	public function setCharset($charset)
	{
		$this->charset = $charset;
	}

	/**
	 * Returns the e-mail charset.
	 * @return string
	 * @see Mail::$charset
	 * @see Mail::setCharset()
	 */
	public function getCharset()
	{
		return $this->charset;
	}

	/**
	 * Sets the default MIME type for attachments with unknown types.
	 * @param string $defaultMimeType A valid MIME type.
	 * @see Mail::$defaultMimeType
	 */
	public function setDefaultMimeType($defaultMimeType)
	{
		$this->defaultMimeType = $defaultMimeType;
	}

	/**
	 * Sends the e-mail.
	 *
	 * If the sender e-mail is not present, and error will be thrown.
	 * @return bool True on success or false on errors.
	 */
	public function send()
	{
		$success = false;

		// sender
		if(!empty($this->from))
		{
			$headers = "From: {$this->getEmailAddress($this->from)}" . Enviroment::WINDOWS_EOL
					. "Subject: {$this->subject}" . Enviroment::WINDOWS_EOL
					. "Importance: {$this->priority}" . Enviroment::WINDOWS_EOL
					. "Priority: {$this->priority}" . Enviroment::WINDOWS_EOL
					//. "X-Priority: {$this->priority}" . Enviroment::WINDOWS_EOL
					. "X-Mailer: PHP Optimuz Framework" . Enviroment::WINDOWS_EOL;

			// headers
			if(count($this->headers) > 0)
			{
				foreach($this->headers as $header)
					$headers .= (is_array($header) ? join(Enviroment::WINDOWS_EOL, $header) : $header) . Enviroment::WINDOWS_EOL;

				//$headers = str_replace('OPTIMUZ_MAIL_CHARSET', $this->charset, $headers);
			}

			// addresses
			if(count($this->to) > 0)
			{
				foreach($this->to as $to)
					$headers .= "To: {$this->getEmailAddress($to)}" . Enviroment::WINDOWS_EOL;
			}

			// cc
			if(count($this->cc) > 0)
			{
				foreach($this->cc as $cc)
					$headers .= "Cc: {$this->getEmailAddress($cc)}" . Enviroment::WINDOWS_EOL;
			}

			$hasAttachments = !$this->attachments->isEmpty();
			$mimeFormatMessage = 'This is a multi-part message in MIME format.';
			$messageBoundary = 'part-' . md5('optimuz-' . time());
			$isMultipart = false;

			// message
			$message = '';

			if(preg_match('/<body[^>]*>.*?<\/body>/i', Text::replace("\n", '{NEW_LINE}', $this->message), $body))
				$plainText = Text::replace('{NEW_LINE}', "\n", Text::plain($body[0]));
			else
				$plainText = Text::plain($this->message);

			if($this->isHtml)
			{
				$isMultipart = true;
				$headers .= 'MIME-Version: 1.0' . Enviroment::WINDOWS_EOL
						. "Content-Type: multipart/alternative; boundary=\"{$messageBoundary}\"" . Enviroment::WINDOWS_EOL . Enviroment::WINDOWS_EOL

						. (!$hasAttachments ? $mimeFormatMessage . Enviroment::WINDOWS_EOL . Enviroment::WINDOWS_EOL : '');

				$message = "--{$messageBoundary}" . Enviroment::WINDOWS_EOL
						. "Content-Type: text/plain; charset=\"{$this->charset}\"" . Enviroment::WINDOWS_EOL
						. 'Content-Transfer-Encoding: 7bit' . Enviroment::WINDOWS_EOL . Enviroment::WINDOWS_EOL
						. $plainText . Enviroment::WINDOWS_EOL

						. "--{$messageBoundary}" . Enviroment::WINDOWS_EOL
						. "Content-Type: text/html; charset=\"{$this->charset}\"" . Enviroment::WINDOWS_EOL
						. 'Content-Transfer-Encoding: 7bit' . Enviroment::WINDOWS_EOL . Enviroment::WINDOWS_EOL
						. $this->message . Enviroment::WINDOWS_EOL;
			}
			else
			{
				if($hasAttachments)
				{
					$isMultipart = true;
					$headers .= 'MIME-Version: 1.0' . Enviroment::WINDOWS_EOL
							. "Content-Type: multipart/alternative; boundary=\"{$messageBoundary}\"" . Enviroment::WINDOWS_EOL . Enviroment::WINDOWS_EOL

							. (!$hasAttachments ? $mimeFormatMessage . Enviroment::WINDOWS_EOL . Enviroment::WINDOWS_EOL : '');

					$message = "--{$messageBoundary}" . Enviroment::WINDOWS_EOL
							. "Content-Type: text/plain; charset=\"{$this->charset}\"" . Enviroment::WINDOWS_EOL
							. "Content-Transfer-Encoding: 7bit" . Enviroment::WINDOWS_EOL . Enviroment::WINDOWS_EOL
							. $plainText . Enviroment::WINDOWS_EOL;
				}
				else
				{
					$headers .= "Content-Type: text/plain; charset=\"{$this->charset}\"" . Enviroment::WINDOWS_EOL . Enviroment::WINDOWS_EOL;
					$message = $plainText . Enviroment::WINDOWS_EOL . Enviroment::WINDOWS_EOL;
				}
			}

			// attachments
			$attachments = '';

			if($hasAttachments)
			{
				foreach($this->attachments as $attachment)
				{
					$type = $attachment->getType();

					if(!$type)
						$type = $this->defaultMimeType;

					$attachments .= "--{$messageBoundary}" . Enviroment::WINDOWS_EOL
								. "Content-Type: {$type}; name=\"{$attachment->getName()}\"" . Enviroment::WINDOWS_EOL
								. 'Content-Transfer-Encoding: base64' . Enviroment::WINDOWS_EOL
								. 'Content-Disposition: attachment' . Enviroment::WINDOWS_EOL . Enviroment::WINDOWS_EOL
								. chunk_split(base64_encode($attachment->read())) . Enviroment::WINDOWS_EOL;
				}
			}

			$headers .= $message;
			$headers .= $attachments;

			if($isMultipart)
				$headers .= "--{$messageBoundary}--" . Enviroment::WINDOWS_EOL . Enviroment::WINDOWS_EOL;

			$headers .= '.';

			// send message using a SMTP server
			if(!is_null($this->smtp) && $this->useSmtpServer)
			{
				if($this->smtp->openConnection())
				{
					if($this->useSmtpServerAuth ? $this->smtp->authenticate() : true)
					{
						// sender
						$this->smtp->command("MAIL FROM: <{$this->from['email']}>");

						// recipients
						foreach($this->to as $to)
							$this->smtp->command("RCPT TO: <{$to['email']}>");

						foreach($this->cc as $cc)
							$this->smtp->command("RCPT TO: <{$cc['email']}>");

						foreach($this->bcc as $bcc)
							$this->smtp->command("RCPT TO: <{$bcc['email']}>");

						// message
						$this->smtp->command('DATA');
						$this->smtp->command($headers);

						// finish conversation
						$success = $this->smtp->command('QUIT');
						$this->smtp->closeConnection();

						if(!$success)
							throw new EmailError(Language::getInstance('Email')->getSentence('error.sendError', $this->smtp->getError()->getMessage()), self::SEND_ERROR);
					}
					else
					{
						throw new EmailError(Language::getInstance('Email')->getSentence('error.smtpAuthError', $this->smtp->getError()->getMessage()), $this->smtp->getError()->getCode());
					}
				}
				else
				{
					throw new EmailError($this->smtp->getError());
				}
			}
			// send message using the PHP mail function
			else
			{
				// the 'From' field and the message are sent with the $headers
				// variable, so we omit them on the parameters of the mail()
				// function.
				$success = mail('', $this->subject, '', $headers);

				// check for errors
				if(!$success)
				{
					$errorMsg = EmailError::getScriptError();
					throw new EmailError($errorMsg, self::SEND_ERROR);
				}
			}
		}
		else
		{
			throw new EmailError(Language::getInstance('Email')->getSentence('error.missingFrom'), self::MISSING_FROM);
		}

		return $success;
	}

	/**
	 * Returns the e-mail address in it's full form.
	 *
	 * If the recipient name is available, it is included. Otherwise only the
	 * address is retuned.
	 * @param string $array
	 * @return string
	 */
	private function getEmailAddress($array)
	{
		return !is_null($array['name']) ? "{$array['name']} <{$array['email']}>" : $array['email'];
	}

	/**
	 * Returns the SmtpServer instance.
	 * @return SmtpServer
	 */
	public function getSMTPServer()
	{
		return $this->smtp;
	}
}
?>