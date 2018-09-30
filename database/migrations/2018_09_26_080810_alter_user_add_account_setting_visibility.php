<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUserAddAccountSettingVisibility extends Migration
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
                if(!Schema::hasColumn('users', 'is_acc_setup_done')){
                    $table->boolean('is_acc_setup_done')->default('0');
                }
                if(!Schema::hasColumn('users', 'visibility')){
                    $table->enum('visibility',['pub','pri','hid'])->default('pri');
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
        //
    }
}
