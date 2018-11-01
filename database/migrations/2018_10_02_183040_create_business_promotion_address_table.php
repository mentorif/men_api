<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessPromotionAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('business_promotion_address')) {
            Schema::create('business_promotion_address', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('bd_id',false)->nullable(false);
                $table->unsignedBigInteger('uid', false)->nullable(false);
                $table->string('url')->nullable(false);
                $table->enum('type',['active_website','linkedin','facebook','twitter','other'])->default('active_website');

                $table->timestamps();
                $table->softDeletes();
                $table->engine = 'InnoDB';
                $table->charset = 'utf8';
                $table->collation = 'utf8_unicode_ci';
                //$table->unique(['bd_id','url','type']);
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
        //Schema::dropIfExists('business_promotion_address');
    }
}
