<?php
/**
 * This file sets a custom component using the Html.Component.HtmlComponent.
 * @version 0.3
 * @package Html
 * @subpackage Component
 */

/**
 * Returns the HTML of a box with the css class msg.
 * @author Diego Andrade
 * @package Html
 * @subpackage Component
 * @since Optimuz 0.3
 * @version 0.4
 */
class MessageComponent extends HtmlComponent
{
	/**
	 * Sets the box as a success box.
	 * @var string
	 */
	const GREEN				= 'enable';
	
	/**
	 * Sets the box as an error box.
	 * @var string
	 */
	const RED				= 'disable';
	
	/**
	 * Sets the box as a warning box.
	 * @var string
	 */
	const YELLOW			= 'confirm';

	/**
	 * Message's text.
	 * @var string
	 */
	protected $message		= null;

	/**
	 * Message's type.
	 * @var string
	 */
	protected $type			= null;
	
	/**
	 * Creates a new message box using a P element as base.
	 * @param HtmlElement|HtmlText|string (optimal) $content Box HTML content.
	 * @param string $type (optimal) Message type (CSS class): enable (green),
	 * disable (red) or confirm (yellow).
	 */
	public function __construct($message = null, $type = '')
	{
		parent::__construct('p');

		if(!empty($message))
			$this->setMessage($message);

		if(!empty($type))
			$this->setType($type);
	}

	/**
	 * Sets the message's content. This text is stored as an HtmlText object.
	 *
	 * Any previous content is removed before the new one is added.
	 * @param HtmlElement|HtmlText|string $message Any text. Can have HTML.
	 */
	public function setMessage($message)
	{
		$this->message = !is_object($message) ? new HtmlText($message) : $message;
		$this->clear();
		$this->appendChild($this->message);
	}

	/**
	 * Returns the message's content as an HtmlText object.
	 * @return HtmlText
	 */
	public function getMessage()
	{
		return $this->message;
	}

	/**
	 * Sets the message's type.
	 *
	 * The available types are: MessageComponent::GREEN, MessageComponent::RED
	 * and MessageComponent::YELLOW.
	 * @param string $type One of the available types.
	 */
	public function setType($type)
	{
		$this->type = $type;
		$this->setAttribute('class', "msg {$this->type}");
	}

	/**
	 * Returns the message's type.
	 *
	 * The available types are: MessageComponent::GREEN, MessageComponent::RED
	 * and MessageComponent::YELLOW.
	 * @return string
	 */
	public function getType()
	{
		return $this->type;
	}
}
?>