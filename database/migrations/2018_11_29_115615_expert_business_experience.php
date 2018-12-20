<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExpertBusinessExperience extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('expert_country_experience')) {
            Schema::create('expert_country_experience', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('uid', false)->nullable(false);
                $table->unsignedBigInteger('expert_id', false)->nullable(false);
                $table->unsignedSmallInteger('country_id',false)->nullable(false);

                $table->timestamps();
                $table->softDeletes();
                $table->engine = 'InnoDB';
                $table->charset = 'utf8';
                $table->collation = 'utf8_unicode_ci';
                $table->unique(['uid','country_id']);
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
