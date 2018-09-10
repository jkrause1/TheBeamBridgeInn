<?php namespace JohannesKrause\Bridgeannotator\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateJohanneskrauseBridgeannotatorWorkPackage extends Migration
{
    public function up()
    {
        Schema::create('johanneskrause_bridgeannotator_work_package', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('johanneskrause_bridgeannotator_work_package');
    }
}
