<?php namespace JohannesKrause\BridgeAnnotator\Models;

use Model;

/**
 * Model
 */
class BridgePictures extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'johanneskrause_bridgeannotator_bridge_pictures';

    public $belongsTo = [
        'bridge_type' => [
	    'JohannesKrause\BridgeAnnotator\Models\BridgeTypes',
	    'key' => 'bridge_type_id'
	],
	'work_package' => [
	    'JohannesKrause\BridgeAnnotator\Models\WorkPackage',
	    'key' => 'work_package_id'
	]
    ];
}