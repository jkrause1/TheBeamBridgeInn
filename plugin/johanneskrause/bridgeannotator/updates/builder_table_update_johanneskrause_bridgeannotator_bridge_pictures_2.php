<?php namespace JohannesKrause\Bridgeannotator\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateJohanneskrauseBridgeannotatorBridgePictures2 extends Migration
{
    public function up()
    {
        Schema::table('johanneskrause_bridgeannotator_bridge_pictures', function($table)
        {
            $table->renameColumn('bridge_types_id', 'bridge_type_id');
        });
    }
    
    public function down()
    {
        Schema::table('johanneskrause_bridgeannotator_bridge_pictures', function($table)
        {
            $table->renameColumn('bridge_type_id', 'bridge_types_id');
        });
    }
}
