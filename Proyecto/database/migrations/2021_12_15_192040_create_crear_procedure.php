<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCrearProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $crear_procedure = "DROP PROCEDURE IF EXISTS `post_users`;
                            CREATE DEFINER=`root`@`localhost` PROCEDURE `post_users`(
	                            Nombre VARCHAR(191),
	                            Apellido VARCHAR(191),
	                            email VARCHAR(191), 
                                password VARCHAR(191)
                            )
                            BEGIN 
                            
                            INSERT INTO `datos`(`Nombre`, `Apellido`, `email`, `password`) VALUES (Nombre,Apellido,email,password);
                            END ";

        DB::unprepared($crear_procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crear_procedure');
    }
}
