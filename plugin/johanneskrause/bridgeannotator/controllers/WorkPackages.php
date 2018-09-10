<?php namespace JohannesKrause\BridgeAnnotator\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class WorkPackages extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController',        'Backend\Behaviors\ReorderController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('JohannesKrause.BridgeAnnotator', 'bridge-annotator-menu-item', 'work-package-menu-item');
    }
}
