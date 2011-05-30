<?php

/**
 * @copyright Copyright (C) 2009 inch communications ltd. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// no direct access
defined('_JEXEC') or die('Direct Access to this location is not allowed.');

jimport('joomla.application.component.controller');
jimport('joomla.application.component.helper');

$helper = JApplicationHelper::getPath('helper');
dump($helper,"helper");
require_once $helper;

$user_option = JRequest::getCmd('option');
$user_controller = JRequest::getCmd('controller', NULL);
$user_task = JRequest::getCmd('task', 'view');
// controla se o script generico do adminform foi adicionado.
global $scriptAdminForm;
$scriptAdminForm = false;

dumpMessage("Debug: Controler -> " .$user_controller);
  
if(is_null($user_controller) || empty($user_controller)){
	$controllerFile = JPATH_COMPONENT.DS.'controller.php';
}else{
	$controllerFile = strtolower($user_controller);
	$controllerFile = JPATH_COMPONENT.DS.'controllers'.DS.$controllerFile.'.php';
	if(file_exists($controllerFile)){
		$controllerClass = ucfirst($user_controller);
	}else{
		$app = JFactory::getApplication();
		$app->enqueueMessage("Controlador Inexistente: ".$user_controller);
		JRequest::setVar('layout',NULL);
		JRequest::setVar('task',NULL);
		$controllerFile = JPATH_COMPONENT.DS.'controller.php';
	}
}

require_once ($controllerFile);
$controllerClass = "Esqueleto${controllerClass}Controller";
$controller	= new $controllerClass();
 
// Perform the Request task
$controller->execute( $user_task );

// Redirect if set by the controller
$controller->redirect();


?>