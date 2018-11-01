<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPersonalInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('user_personal_info')) {
            Schema::create('user_personal_info', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('uid', false)->nullable(false);
                $table->unsignedInteger('birth_country_id')->nullable(false);
                $table->string('spoken_lang',255)->nullable(false);
                $table->string('m_dial_code',10)->nullable(false);
                $table->unsignedBigInteger('phone_mobile')->nullable(false);
                $table->string('phone_landline',50)->nullable(true);
                $table->unsignedInteger('birth_year')->nullable(false);
                $table->enum('gender',['M','F','O','X'])->default('M');
                $table->string('education_level',255)->nullable(true);
                $table->string('ethnicity',255)->nullable(true);
                $table->enum('contact_method',['mail','sms','vc'])->default('mail');

                $table->timestamps();
                $table->softDeletes();
                $table->engine = 'InnoDB';
                $table->charset = 'utf8';
                $table->collation = 'utf8_unicode_ci';

                $table->unique('uid');
            });
        }
        if(Schema::hasTable('users')) {
            Schema::table('users', function($table) {
                if(!Schema::hasColumn('users', 'intent_to_connect')){
                    $table->enum('intent_to_connect',['Y','N','NS'])->default('Y');
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
        // no drop exists
    }
}
