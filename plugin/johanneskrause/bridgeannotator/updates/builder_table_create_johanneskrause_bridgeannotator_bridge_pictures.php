<?php namespace JohannesKrause\Bridgeannotator\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateJohanneskrauseBridgeannotatorBridgePictures extends Migration
{
    public function up()
    {
        Schema::create('johanneskrause_bridgeannotator_bridge_pictures', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('grid_image_id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('johanneskrause_bridgeannotator_bridge_pictures');
    }
}
