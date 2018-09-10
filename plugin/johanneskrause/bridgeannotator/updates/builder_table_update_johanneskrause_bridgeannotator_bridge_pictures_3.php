<?php namespace JohannesKrause\Bridgeannotator\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateJohanneskrauseBridgeannotatorBridgePictures3 extends Migration
{
    public function up()
    {
        Schema::table('johanneskrause_bridgeannotator_bridge_pictures', function($table)
        {
            $table->integer('work_package_id');
        });
    }
    
    public function down()
    {
        Schema::table('johanneskrause_bridgeannotator_bridge_pictures', function($table)
        {
            $table->dropColumn('work_package_id');
        });
    }
}
