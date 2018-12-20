<?php
class EmailConfig {

	public $default = array(
		'transport' => 'Mail',
		'from' => 'you@localhost',
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);

	public $smtp = array(
		'transport' => 'smtp',
		'from' => array('site@localhost.com' => 'My Site'),
		'host' => 'smtp.gmail.com',
		'port' => 587,
		'timeout' => 60,
		'username' => 'saini.vikas630@gmail.com',
		'password' => 'life-xperience',
                'transport' => 'smtp',
		'client' => null,
		'log' => false,
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);

	public $fast = array(
		'from' => array('site@localhost.com' => 'My Site'),
		'sender' => null,
		'to' => null,
		'cc' => null,
		'bcc' => null,
		'replyTo' => null,
		'readReceipt' => null,
		'returnPath' => null,
		'messageId' => true,
		'subject' => null,
		'message' => null,
		'headers' => null,
		'viewRender' => null,
		'template' => false,
		'layout' => false,
		'viewVars' => null,
		'attachments' => null,
		'emailFormat' => null,
		'transport' => 'smtp',
		'host' => 'smtp.gmail.com',
		'port' => 587,
		'timeout' => 60,
		'username' => 'saini.vikas630@gmail.com',
		'password' => 'life-xperience',           
		'client' => null,
		'log' => true,
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);

}
