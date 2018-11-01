<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUserAddProfilePicColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('users')) {
            Schema::table('users', function($table) {
                if(!Schema::hasColumn('users', 'profile_pic_path')){
                    $table->string('profile_pic_path',255)->nullable(true);
                }
                if(!Schema::hasColumn('users', 'is_profile_image_done')){
                    $table->boolean('is_profile_image_done')->default('0');
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
        // no drop allowed
    }
}
