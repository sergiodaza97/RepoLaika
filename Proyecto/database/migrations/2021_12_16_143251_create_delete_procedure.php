<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDeleteProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $delete_procedure = "DROP PROCEDURE IF EXISTS `delete_users`;
                            CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_users`(
	                           IN idx INT
                            )
                            BEGIN 
                            
                            DELETE FROM `datos` WHERE id= idx ;
                            END ";

        DB::unprepared($delete_procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delete_procedure');
    }
}
