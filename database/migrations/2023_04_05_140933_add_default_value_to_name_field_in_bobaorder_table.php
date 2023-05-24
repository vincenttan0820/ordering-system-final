<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultValueToNameFieldInBobaorderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bobaorder', function (Blueprint $table) {
            $table->string('name')->default('')->change();
            $table->dateTime('date')->nullable()->change();
        });

        DB::table('bobaorder')->insert([
            'name' => 'John Doe',
            'status' => 'completed',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bobaorder', function (Blueprint $table) {
            $table->string('name')->nullable(false)->change();
        });
    }
}
