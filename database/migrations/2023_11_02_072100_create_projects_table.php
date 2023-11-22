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
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index();
            // $table->unsignedBigInteger('customer_id')->index();

            $table->string('project_code')->unique();
            $table->string('name');
            $table->string('active_status');
            $table->date('date_start');
            $table->date('date_end');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->string('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
