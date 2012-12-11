<?php

defined('_JEXEC') or die('Direct Access to this location is not allowed.');

jimport('joomla.application.component.controller');
class EsqueletoController extends JController{

	public function __construct($config = array()) {
		
		parent::__construct($config);
	}
	
	public function execute($task){

		if(JDEBUG) dumpMessage("EsqueletoController Execute: ".$task);

		parent::execute($task);
	}

	public function view(){

		parent::display();
	}

	
	

}