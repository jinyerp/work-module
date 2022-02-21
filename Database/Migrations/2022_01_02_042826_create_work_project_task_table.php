<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkProjectTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_project_task', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('enable')->default(1);
            $table->unsignedBigInteger('project');

            $table->string('task')->nullable();

            $table->string('description')->nullable();

            // 작업자 관리자 ID
            $table->unsignedBigInteger('user_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_project_task');
    }
}
