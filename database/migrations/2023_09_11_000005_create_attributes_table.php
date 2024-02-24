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
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('comment')->nullable();
            $table->boolean('required')->default(false);
            $table->foreignId('attribute_list_id')->nullable()->constrained('attribute_lists');
            $table->foreignId('unit_id')->nullable()->constrained('units');
            $table->foreignId('data_type_id')->constrained('data_types');
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
        Schema::dropIfExists('attributes');
    }
};
