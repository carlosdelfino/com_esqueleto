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
class EsqueletoViewExemplo extends JView
{
	function display($tpl = null)
	{
		$mainframe = JFactory::getApplication();

		// Initialize variables
		$document	=& JFactory::getDocument();
		$user		=& JFactory::getUser();
		$pathway	=& $mainframe->getPathway();
		$image		= '';

		$menu   =& JSite::getMenu();
		$item   = $menu->getActive();
		if($item)		$params	=& $menu->getParams($item->id);
		else		$params	=& $menu->getParams(null);


		$type = (!$user->get('guest')) ? 'reservado' : 'aberto';

		// Set some default page parameters if not set
		$params->def( 'show_page_title', 				1 );
		if (!$params->get( 'page_title')) {
			$params->set('page_title',	JText::_( 'Detalhes' ));
		}
		if(!$item)
		{
			$params->def( 'header_detalhes', 			'' );
		}

		$params->def( 'pageclass_sfx', 			'' );
			
		if ( !$user->get('guest') )
		{
			// Trabalhador não identificado
		}
		else
		{
			$title = JText::_( 'Detalhes do Item');

			// pathway item
			$pathway->addItem($title, '' );
			// Set page title
			$document->setTitle( $title );
		}

		// Build login image if enabled
		if ( $params->get( 'image_'.$type ) != -1 ) {
			$image = 'images/stories/'.$params->get( 'image_'.$type );
			$image = '<img src="'. $image  .'" align="'. $params->get( 'image_'.$type.'_align' ) .'" hspace="10" alt="" />';
		}

		// Get the return URL
		if (!$url = JRequest::getVar('return', '', 'method', 'base64')) {
			$url = base64_encode($params->get($type));
		}

		$errors =& JError::getErrors();

		$this->assign('image' , $image);
		$this->assign('type'  , $type);
		$this->assign('return', $url);

		$this->assignRef('params', $params);
		
		$id = JRequest::getVar('id');
		
		 
				
 		parent::display($tpl);
	}
	
 

 }

