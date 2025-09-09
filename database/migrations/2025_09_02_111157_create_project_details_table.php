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
        Schema::create('project_details', function (Blueprint $table) {
            $table->id(); // This is your auto revision number ID
            $table->string('project_name');
            $table->unsignedBigInteger('user_id'); // Reference to engineer (logged-in user)
            $table->string('contractor_name');
            $table->string('consultant_name');
            $table->string('client_name');
            $table->string('bill_no');
            $table->string('bbs_for');
            $table->string('floor');
            $table->string('reference_drawing');
            $table->string('approved_by');
            $table->decimal('total_rf_weight', 10, 2); // R/F weight with decimals
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_details');
    }
};
