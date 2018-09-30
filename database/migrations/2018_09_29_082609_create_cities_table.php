<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('city_master')) {
            Schema::create('city_master', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name', '100')->nullable(false);
                $table->decimal('lat', 17, 15)->nullable(true);
                $table->decimal('long', 17, 15)->nullable(true);
                $table->integer('state_id')->nullable(false);
                $table->integer('country_id')->nullable(false);
                $table->integer('shown_order')->default(1);
                $table->enum('status', ['act', 'dis', 'ina'])->default('act');

                $table->timestamps();
                $table->softDeletes();
                $table->engine = 'InnoDB';
                $table->charset = 'utf8';
                $table->collation = 'utf8_unicode_ci';
                $table->unique(['name', 'state_id', 'country_id']);

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
        Schema::dropIfExists('cities');
    }
}
