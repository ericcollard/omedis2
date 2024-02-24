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
        Schema::create('odoo_variant_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('variant_id')->constrained('variants');
            $table->foreignId('odoo_model_id')->constrained('odoo_models');
            $table->text('value');
            $table->text('attribute_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('odoo_variant_values');
    }
};
