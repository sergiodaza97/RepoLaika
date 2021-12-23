<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsersProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $users_procedure = "DROP PROCEDURE IF EXISTS `get_users`;
                            CREATE DEFINER=`root`@`localhost` PROCEDURE `get_users`()
                            BEGIN 
                            
                            SELECT * FROM `datos` ;
                            END ";

        DB::unprepared($users_procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_procedure');
    }
}
