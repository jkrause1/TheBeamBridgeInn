<?php namespace JohannesKrause\BridgeAnnotator\Models;

use Model;

/**
 * Model
 */
class BridgeTypes extends Model
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
    public $table = 'johanneskrause_bridgeannotator_bridge_types';

    public $hasMany = [
        'bridge_pictures' => 'JohannesKrause\BridgeAnnotator\Models\BridgePictures'
    ];
}
