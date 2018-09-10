<?php namespace JohannesKrause\BridgeAnnotator\Models;

use Lang;
use Model;

class Settings extends Model
{
	public $implement = [\System\Behaviors\SettingsModel::class];
	public $settingsCode = "bridgeannotator_settings";
	public $settingsFields = "fields.yaml";

	public function initSettingsData()
	{
	    $this->dataset_path = "";
	    $this->work_package_size = 50;
	}
}