<?php namespace JohannesKrause\Bridgeannotator\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateJohanneskrauseBridgeannotatorBridgeTypes extends Migration
{
    public function up()
    {
        Schema::create('johanneskrause_bridgeannotator_bridge_types', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('name');
            $table->text('description');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('johanneskrause_bridgeannotator_bridge_types');
    }
}
