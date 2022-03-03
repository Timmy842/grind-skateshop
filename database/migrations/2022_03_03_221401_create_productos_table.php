<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('marca_id')->unsigned();
            $table->bigInteger('tipo_id')->unsigned();

            $table->string('nombre', 100);
            $table->string('descripcion', 500);
            $table->string('image', 500);
            $table->decimal('precio', 10, 2);
            $table->string('medida', 10);
            
            $table->timestamps();

            $table->foreign('marca_id')->references('id')->on('marcas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tipo_id')->references('id')->on('marcas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};
