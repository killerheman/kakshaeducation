<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('cour_id');
            $table->string('course_name',50);
            $table->string('alias',60);
            $table->float('price');
            $table->float('offer_pice')->nullable();
            $table->float('referal_pice')->nullable();
            $table->string('duration',20)->nullable();
            $table->string('pic',35)->nullable();
            $table->string('pic_2',35)->nullable();
            $table->string('video_link',50)->nullable();
            $table->text('short_desc');
            $table->text('long_desc')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('is_del')->default(0);
            $table->timestamps();
        });
        DB::statement("alter table courses auto_increment=101");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
