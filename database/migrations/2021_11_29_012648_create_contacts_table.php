<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('student_name',50);
            $table->string('email',50);
            $table->string('mobile',15)->nullable();
            $table->string('subject',50)->nullable();
            $table->string('message')->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('is_del')->default(0);
            $table->timestamps();
        });
        DB::statement("alter table contacts auto_increment=801");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
