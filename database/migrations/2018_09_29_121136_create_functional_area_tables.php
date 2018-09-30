<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionalAreaTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('functional_area_group')) {
            Schema::create('functional_area_group', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name', '255')->nullable(false);
                $table->integer('shown_order')->default(1);
                $table->enum('status', ['act', 'dis', 'ina'])->default('act');

                $table->timestamps();
                $table->softDeletes();
                $table->engine = 'InnoDB';
                $table->charset = 'utf8';
                $table->collation = 'utf8_unicode_ci';
                $table->unique(['name']);
            });
        }

        if(!Schema::hasTable('functional_area')) {
            Schema::create('functional_area', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name', '255')->nullable(false);
                $table->integer('functional_group_id')->nullable(false);
                $table->integer('shown_order')->default(1);
                $table->enum('status', ['act', 'dis', 'ina'])->default('act');

                $table->timestamps();
                $table->softDeletes();
                $table->engine = 'InnoDB';
                $table->charset = 'utf8';
                $table->collation = 'utf8_unicode_ci';
                $table->unique(['name','functional_group_id']);
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
