<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('work_items', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('module_id')->index();
            $table->unsignedBigInteger('project_id')->index();
            $table->unsignedBigInteger('emp_workitem')->index();

            $table->string('work_item_code');
            $table->string('name');
            $table->string('priority');
            $table->string('note');

            $table->date('date_start');
            $table->date('date_end');

            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('emp_workitem')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_items');
    }
};
