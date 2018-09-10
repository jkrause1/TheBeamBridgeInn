<?php namespace JohannesKrause\BridgeAnnotator\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateJohanneskrauseBridgeannotatorWorkPackage extends Migration
{
    public function up()
    {
        Schema::table('johanneskrause_bridgeannotator_work_package', function($table)
        {
            $table->boolean('done');
        });
    }
    
    public function down()
    {
        Schema::table('johanneskrause_bridgeannotator_work_package', function($table)
        {
            $table->dropColumn('done');
        });
    }
}
