<?php namespace JohannesKrause\BridgeAnnotator\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateJohanneskrauseBridgeannotatorBridgeTypes extends Migration
{
    public function up()
    {
        Schema::table('johanneskrause_bridgeannotator_bridge_types', function($table)
        {
            $table->integer('hotkey');
        });
    }
    
    public function down()
    {
        Schema::table('johanneskrause_bridgeannotator_bridge_types', function($table)
        {
            $table->dropColumn('hotkey');
        });
    }
}
