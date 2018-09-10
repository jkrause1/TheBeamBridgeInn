<?php namespace JohannesKrause\Bridgeannotator\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateJohanneskrauseBridgeannotatorBridgePictures extends Migration
{
    public function up()
    {
        Schema::table('johanneskrause_bridgeannotator_bridge_pictures', function($table)
        {
            $table->integer('bridge_types_id');
        });
    }
    
    public function down()
    {
        Schema::table('johanneskrause_bridgeannotator_bridge_pictures', function($table)
        {
            $table->dropColumn('bridge_types_id');
        });
    }
}
