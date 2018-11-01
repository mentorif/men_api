<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessFunctionalAreaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('business_functional_area')) {
            Schema::create('business_functional_area', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('bd_id',false)->nullable(false);
                $table->unsignedBigInteger('uid', false)->nullable(false);
                $table->unsignedSmallInteger('fa_id',false)->nullable(false);
                $table->enum('status',['act','ina','dis'])->default('act');

                $table->timestamps();
                $table->softDeletes();
                $table->engine = 'InnoDB';
                $table->charset = 'utf8';
                $table->collation = 'utf8_unicode_ci';
                $table->unique(['bd_id','fa_id']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //No drop
    }
}
