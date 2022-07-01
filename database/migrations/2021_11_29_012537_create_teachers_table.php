<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('teach_id');
            $table->string('teacher_name',50);
            $table->string('email',50);
            $table->string('mobile',15);
            $table->string('pic',50)->nullable();
            $table->string('highest_quali',100)->nullable();
            $table->string('country',15)->nullable();
            $table->string('state',20)->nullable();
            $table->string('city',20)->nullable();
            $table->integer('pin_code')->nullable();
            $table->string('address')->nullable();
            $table->string('cv',25)->nullable();
            $table->string('password',100);
            $table->boolean('status')->default(1);
            $table->boolean('is_del')->default(0);
            $table->timestamps();
        });
        DB::statement("alter table teachers auto_increment=301");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
