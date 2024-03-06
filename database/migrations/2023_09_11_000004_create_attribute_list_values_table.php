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
        Schema::create('attribute_list_values', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('comment')->nullable();
            $table->foreignId('attribute_list_id')->constrained('attribute_lists')->cascadeOnDelete();
            $table->integer('user_id')->default(1);
            $table->string('odoo_name')->nullable();
            $table->integer('sort')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attribute_list_values');
    }
};
