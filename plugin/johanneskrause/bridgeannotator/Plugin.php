<?php namespace JohannesKrause\BridgeAnnotator;

use System\Classes\PluginBase;
use System\Classes\SettingsManager;
use Backend;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
	return [
	    'settings' => [
	        'label'		=> 'johanneskrause.bridgeannotator::lang.settings.menu_label',
		'description'	=> 'johanneskrause.bridgeannotator::lang.settings.menu_description',
		'category'	=> SettingsManager::CATEGORY_USERS,
		'icon'		=> 'icon-cog',
		'url'		=> Backend::url('johanneskrause/bridgeannotator/settings'),
		'order'		=> 500
	    ]
	];
    }
}
