<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndustriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('industry_master')) {
            Schema::create('industry_master', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name',255)->nullable(false);
                $table->integer('shown_order')->default(1);
                $table->enum('status', ['act', 'dis', 'ina'])->default('act');

                $table->timestamps();
                $table->softDeletes();
                $table->engine = 'InnoDB';
                $table->charset = 'utf8';
                $table->collation = 'utf8_unicode_ci';
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
        // no drop
    }
}
