<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_project', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // 프로젝트 이름
            $table->string('enable')->default(1);
            $table->string('project');

            // 프로젝트 담당자
            $table->unsignedBigInteger('manager_id')->default(0);


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
        Schema::dropIfExists('work_project');
    }
}
