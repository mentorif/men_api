<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExpertDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('expert_detail')) {
            Schema::create('expert_detail', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('uid')->nullable(false);
                $table->unsignedInteger('industry_id', false)->nullable(false);
                $table->string('professional_bio', 1000)->nullable(false);
                $table->string('entrepreneur_pitch', 1000)->nullable(false);
                $table->string('preference', 255)->nullable(false);
                $table->unsignedInteger('years_management', false)->nullable(false);
                $table->unsignedInteger('years_ownership', false)->nullable(false);
                $table->string('website', 100)->nullable(true);
                $table->string('company', 100)->nullable(true);
                $table->string('role', 100)->nullable(true);

                $table->timestamps();
                $table->softDeletes();
                $table->engine = 'InnoDB';
                $table->charset = 'utf8';
                $table->collation = 'utf8_unicode_ci';

                $table->unique('uid');
            });
        }
        if(Schema::hasTable('user_personal_info')) {
            Schema::table('user_personal_info', function (Blueprint $table) {
                if(!Schema::hasColumn('user_personal_info', 'country_id')){
                    //$table->unsignedInteger('country', false)->nullable(true);
                    $table->unsignedInteger('state', false)->nullable(true);
                    $table->unsignedInteger('city', false)->nullable(true);
                    $table->unsignedInteger('region', false)->nullable(true);
                    $table->unsignedInteger('pincode', false)->nullable(true);
                }
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
