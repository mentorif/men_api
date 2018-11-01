<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('business_detail')) {
            Schema::create('business_detail', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('uid')->nullable(false);
                $table->enum('type',['profitable','nonprofitable','social','unsure','other'])->default('profitable');
                $table->string('type_other', 50)->nullable(true);
                $table->string('name', 150)->nullable(true);

                $table->enum('stage',['profitable','idea','revenue','operational','other'])->default('profitable');
                $table->string('stage_other', 255)->nullable(true);
                $table->unsignedSmallInteger('launch_month', false)->nullable(true);
                $table->unsignedInteger('launch_year', false)->nullable(true);

                $table->unsignedInteger('industry_id', false)->nullable(false);
                $table->string('description', 1000)->nullable(false);
                $table->string('request', 1000)->nullable(false);

                $table->timestamps();
                $table->softDeletes();
                $table->engine = 'InnoDB';
                $table->charset = 'utf8';
                $table->collation = 'utf8_unicode_ci';

                $table->unique('uid');
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
        //Schema::dropIfExists('business_detail');
    }
}
