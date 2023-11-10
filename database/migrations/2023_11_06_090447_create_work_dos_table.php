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
        Schema::create('work_dos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('module_id')->index();
            $table->unsignedBigInteger('project_id')->index();
            $table->unsignedBigInteger('work_item_id')->index();
            $table->unsignedBigInteger('emp_workdo');

            $table->string('work_do_code');
            $table->string('name');
            $table->string('type_of_work');
            $table->string('priority');
            $table->string('status');
            $table->string('note');

            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('work_item_id')->references('id')->on('work_items')->onDelete('cascade');
            $table->foreign('emp_workdo')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_dos');
    }
};
