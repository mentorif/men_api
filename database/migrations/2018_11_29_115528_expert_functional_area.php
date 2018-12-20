<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExpertFunctionalArea extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('expert_functional_area')) {
            Schema::create('expert_functional_area', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('uid', false)->nullable(false);
                $table->unsignedBigInteger('expert_id', false)->nullable(false);
                $table->unsignedSmallInteger('fa_id',false)->nullable(false);
                $table->enum('status',['act','ina','dis'])->default('act');

                $table->timestamps();
                $table->softDeletes();
                $table->engine = 'InnoDB';
                $table->charset = 'utf8';
                $table->collation = 'utf8_unicode_ci';
                $table->unique(['uid','fa_id']);
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
        //
    }
}
