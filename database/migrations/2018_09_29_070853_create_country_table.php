<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('country_master')) {
            Schema::create('country_master', function (Blueprint $table) {
                $table->increments('id');
                $table->char('code', '2')->nullable(false);
                $table->string('name', '100')->nullable(false);
                $table->integer('dial_code')->nullable(false);
                $table->string('region', '100')->nullable(true);
                $table->integer('shown_order')->default(1);
                $table->enum('status', ['act', 'dis', 'ina'])->default('act');

                $table->timestamps();
                $table->softDeletes();
                $table->engine = 'InnoDB';
                $table->charset = 'utf8';
                $table->collation = 'utf8_unicode_ci';
                $table->unique('code');
                //$table->unique('dial_code');
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
        // no drop available
    }
}
