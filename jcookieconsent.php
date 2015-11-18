<?php

/**
 * @copyright	Copyright (C) Gogodigital Srls. All rights reserved.
 * @license		GNU General Public License version 2 or later
 */

// no direct access
defined( '_JEXEC' ) or die;

class plgSystemJcookieconsent extends JPlugin 
{
	public function __construct( &$subject, $config ) 
	{	
		parent::__construct( $subject, $config );	
	}
	
	function onBeforeRender() 
	{
		$app = JFactory::getApplication();		
		$doc = JFactory::getDocument();
		
		if ($app->isAdmin()) 
		{
			return;
		}
		
		$cookieScript = 'window.cookieconsent_options = {
			"message":"'.$this->params->get("cookieMessage","This website uses cookies to ensure you get the best experience on our website").'",
			"dismiss":"'.$this->params->get("cookieDismiss","Got It!").'",
			"learnMore":"More info",
			"link":'.$this->params->get("cookieLink","null").',
			"theme":"'.$this->params->get("cookieTheme","dark-bottom").'"
		};';
		
		$doc->addScript('//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.9/cookieconsent.min.js');
		$doc->addScriptDeclaration($cookieScript);
	}	
	
}
	