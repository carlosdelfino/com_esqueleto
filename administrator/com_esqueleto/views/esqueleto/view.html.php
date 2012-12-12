<?php
/**
 * @version		$Id: view.html.php 14401 2010-01-26 14:10:00Z louis $
 * @package		Joomla
 * @subpackage	Esqueleto
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// Check to ensure this file is included in Joomla!
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view');

/**
 *  
 *
 * @package		Joomla
 * @subpackage	 Esqueleto
 * @since	1.0
 */
class EsqueletoViewEsqueleto extends JView
{
	function display($tpl = null)
	{
		$mainframe = JFactory::getApplication();

		// Initialize variables
		$document	=& JFactory::getDocument();
		$user		=& JFactory::getUser();
		  
		// Get the return URL
		if (!$url = JRequest::getVar('return', '', 'method', 'base64')) {
			$url = base64_encode($params->get($type));
		}

		$errors =& JError::getErrors();

		$id = JRequest::getVar('id');
		

		$this->assign('return', $url);

		$this->assign('id', $id);
		
				
 		parent::display($tpl);
	}
	
 

 }

