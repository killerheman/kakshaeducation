<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('stu_id');
            $table->string('student_name',50);
            $table->string('email',50);
            $table->string('mobile',15);
            $table->string('pic',50)->nullable();
            $table->string('education',100)->nullable();
            $table->string('referal_id',20)->nullable();
            $table->string('acname',50)->nullable();
            $table->string('acnumber',50)->nullable();
            $table->string('branch',50)->nullable();
            $table->string('ifsc',30)->nullable();
            $table->string('password',100);
            $table->boolean('status')->default(1);
            $table->boolean('is_del')->default(0);
            $table->timestamps();
        });
        DB::statement("alter table students auto_increment=201");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
