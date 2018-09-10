<?php namespace JohannesKrause\BridgeAnnotator\Controllers;

use Backend\Classes\Controller;
use System\Classes\SettingsManager;
use JohannesKrause\BridgeAnnotator\Models\BridgeTypes;
use JohannesKrause\BridgeAnnotator\Models\WorkPackage;
use BackendMenu;
use Request;
use Db;

class Settings extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
	BackendMenu::setContext('October.System', 'system', 'settings');
	SettingsManager::setContext('JohannesKrause.BridgeAnnotator', 'settings');
    }

    public function onCreateTables(){
    	$settings = Request::input('Settings');

        $this->checkInput($settings);
	$this->setupDatabase($settings);
    }

    private function checkInput($settings){
    	$this->checkDataSetPath($settings['dataset_path']);
        $this->checkBridgeTypes($settings['bridge_types']);
    }

    private function checkDataSetPath($dataSetPath){
	if(!file_exists($dataSetPath)){
	throw new Exception("$dataSetPath ist kein gültiger Pfad oder Leserechte fehlen.");
	}
    }

    private function checkBridgeTypes($bridgesText){

        $bridgeLines = explode(PHP_EOL, $bridgesText);
	$usedHotKeys = [];
	foreach($bridgeLines as $bridgeLine){
	    $bridgeLine = trim($bridgeLine);
	    $bridgeData = explode(";", $bridgeLine);
	    if(sizeof($bridgeData) != 3)
	        throw new Exception("Ungültige Brückentyp-Eingabe: $bridgeLine");		
	    if($bridgeData[0] === '')
	        throw new Exception("Name des Brückentypes fehlt: $bridgeLine");
	    if($bridgeData[2] === '')
	        throw new Exception("Kein Hotkey für den Brückentyp angegeben: $bridgeLine");
	    if(strlen($bridgeData[2]) != 1)
	        throw new Exception("Nur einstellige Hotkeys sind gestattet: $bridgeLine");

	    if(array_key_exists($bridgeData[2], $usedHotKeys))
	        throw new Exception("Hotkey wird bereits verwendet: $bridgeLine");
	    
	    $usedHotKeys[$bridgeData[2]] = 1;
	}
    }

    private function setupDatabase($settings){
    
	$this->setupBridgeTypes($settings);

        $photoPath = $settings['dataset_path'];
	$workPackageSize = $settings['work_package_size'];
	$photoDir = scandir($photoPath);
	$photoDir = array_diff($photoDir, array('.', '..'));
	$photoDir = array_values($photoDir);

	Db::delete('delete from johanneskrause_bridgeannotator_bridge_pictures');
	Db::delete('delete from johanneskrause_bridgeannotator_work_package');

	Db::select('alter table johanneskrause_bridgeannotator_bridge_pictures auto_increment = 1');
	Db::select('alter table johanneskrause_bridgeannotator_work_package auto_increment = 1');

    	$queryTemplate = 'INSERT INTO johanneskrause_bridgeannotator_bridge_pictures (     grid_image_id, work_package_id) VALUES ';
    	$query = '';

    	$workPackage;
    	$workPackageId;

    	for($i = 0; $i < count($photoDir); $i++){
            if($i % $workPackageSize <= 0){
    	        if($i != 0)
    		    Db::select($query);

    		$query = $queryTemplate;

    		$workPackage = new WorkPackage;
    		$workPackage->save();
    		$workPackageId = $workPackage->id;
    	    }

	    if($i % $workPackageSize > 0)
	        $query .= ', ';

	    $photo = pathinfo($photoDir[$i], PATHINFO_FILENAME);
	    $query .= '('.$photo.', '.$workPackageId.')';
	}

	Db::select($query);
    }

    private function setupBridgeTypes($settings){

        Db::delete('delete from johanneskrause_bridgeannotator_bridge_types');
	Db::select('alter table johanneskrause_bridgeannotator_bridge_types auto_increment = 1');

	$bridgesText = $settings['bridge_types'];
	$bridgeLines = explode(PHP_EOL, $bridgesText);
	foreach($bridgeLines as $bridgeLine){
	    $bridgeData = explode(";", $bridgeLine);
	    $bridgeName = $bridgeData[0];
	    $bridgeDescription = $bridgeData[1];
	    $hotkey = $bridgeData[2];

	    $bridgeType = BridgeTypes::create();
	    $bridgeType->name = $bridgeName;
	    $bridgeType->description = $bridgeDescription;
	    $bridgeType->hotkey = ord($hotkey);
	    $bridgeType->save();
	}
    }
}