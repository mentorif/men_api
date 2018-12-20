<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('f_name', 50)->nullable(true);
                $table->string('m_name', 50)->nullable(true);
                $table->string('l_name', 50)->nullable(true);
                $table->string('email','255');
                $table->string('pass', '128')->nullable();
//                $table->char('country_code', '2')->nullable(true);
//                $table->integer('state_id')->nullable(true);
//                $table->integer('city_id')->nullable(true);
//                $table->string('address1', 255)->nullable(true);
//                $table->string('address2', 255)->nullable(true);
//                $table->string('lat', 20)->nullable(true);
//                $table->string('long', 20)->nullable(true);
                $table->boolean('is_mentor')->default('0');
                $table->boolean('is_privacy_confirmed')->default('0');
                $table->boolean('is_term_condition_confirmed')->default('0');
                $table->boolean('is_code_conduct_confirmed')->default('0');


                $table->timestamps();
                $table->softDeletes();
                $table->engine = 'InnoDB';
                $table->charset = 'utf8';
                $table->collation = 'utf8_unicode_ci';

                $table->unique('email');
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
        Schema::dropIfExists('users');
    }
}
