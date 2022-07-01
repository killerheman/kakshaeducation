<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('email',50);
            $table->string('mobile',15);
            $table->string('highest_quali',100);
            $table->string('experience',100);
            $table->string('cv',25)->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('is_del')->default(0);
            $table->timestamps();
        });
        DB::statement("alter table careers auto_increment=701");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('careers');
    }
}
