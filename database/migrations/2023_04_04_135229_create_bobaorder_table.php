<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBobaorderTable extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bobaorder', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('date');
            $table->string('status')->default('pending');
            $table->float('amount')->nullable();
            $table->timestamps();
            $table->dateTime('date')->nullable()->change();
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bobaorder');
    }
}
