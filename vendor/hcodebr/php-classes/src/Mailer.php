<?php


namespace Hcode;

use Rain\Tpl;

class Mailer
{

	const USERNAME  = "juliocsilvapdr@gmail.com";
	const PASSWORD  = "senhaminhasenha;
	const NAME_FROM = "Curso Saber";

	private $mail;

	public function __construt($toAddress, $toName, $subject,
		$tplName, $data = array())
	{

		 $config = array(

			"tpl_dir"   => $_SERVER['DOCUMENT_ROOT']."/views/email/",
			"cache_dir" => $_SERVER['DOCUMENT_ROOT']."/views_cache/",
			"debug"     => true 
		 );

		 Tpl::configure( $config );

		 $tpl = new Tpl;

		 foreach(date as $key => $value)
		 {
		 	$tpl->assign($key, $value);

		 }

		 $html = tpl->draw($tplName, true);



		$this->mail = new \PHPMailer();

		$this->mail->isSMTP();
		$this->mail->SMTPDebug    = 0;
		$this->mail->Debugoutupt  = "html";
		$this->mail->Host         = "smtp.gmail.com";
		$this->mail->Port         = 587;
		$this->mail->SMTPSecure   = "tls";
		$this->mail->SMTPAuth     = true;
		$this->mail->UserName     = Mailer::USERNAME;
		$this->mail->UserPassword = Mailer::PASSWORD;
		

		$this->mail->setFrom      = (Mailer::NAME, Mailer::NAME_FROM);
		$this->mail->addAddress   = ($toAddress, $toName);
		$this->mail->Subject      =  $subject;


		$this->mail->msgHTML($html);

		$this->mail->AltBody =  "Texto Plano!";
	}

	public function send()
	{
		return $this->mail->send();
	}
}