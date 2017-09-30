<?php 


namespace Hcode;

class PageAdmin extends Page{

	public function __construct($opts = array(), $tpl_dir = "/views/admin/")
	{
		parent::__construct($opts, $tpl_dir);//pega o metodo construtor da classe pai (Classe Page)

	}
}