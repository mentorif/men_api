<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('business_address')) {
            Schema::create('business_address', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('bd_id', false)->nullable(false);
                $table->unsignedBigInteger('uid', false)->nullable(false);
                $table->unsignedSmallInteger('country_id', false)->nullable(false);
                $table->unsignedMediumInteger('state_id', false)->nullable(false);
                $table->string('state_other',50)->nullable(true);
                $table->string('city',50)->nullable('false');
                $table->unsignedInteger('pincode',false)->nullable(false);

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
        //Schema::dropIfExists('business_address');
    }
}
