<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUserAddSourcePersistCode extends Migration
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
                if(!Schema::hasColumn('users', 'acc_creation_method')){
                    $table->enum('acc_creation_method',['fb','in','gp','ml'])->default('ml');
                }
                if(!Schema::hasColumn('users', 'persist_code')){
                    $table->string('persist_code','255')->nullable(true);
                    $table->unique('persist_code');
                }
                if(!Schema::hasColumn('users', 'status')){
                    $table->enum('status',['act','dis','ina'])->default('act');
                }
                if(!Schema::hasColumn('users', 'remember_token')){
                    $table->string('remember_token','255')->nullable(true);
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
        // no down allowed
    }
}
