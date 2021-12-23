<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateEditProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $edit_procedure = "DROP PROCEDURE IF EXISTS `edit_users`;
                            CREATE DEFINER=`root`@`localhost` PROCEDURE `edit_users`(
                                p_product_id INT,
                                Nombre VARCHAR(191),
                                Apellido VARCHAR(191),
                                email VARCHAR(191), 
                                password VARCHAR(191),
                                p_now DATETIME
                            )
                            BEGIN
                                UPDATE `datos` SET Nombre=Nombre, Apellido=Apellido, email=email, password=password, updated_at = p_now WHERE id=p_product_id;

                            END ";

        DB::unprepared($edit_procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('edit_procedure');
    }
}
