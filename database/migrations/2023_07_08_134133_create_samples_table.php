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
        Schema::create('samples', function (Blueprint $table) {
            $table->id()->autoIncrement()->unsigned();
            $table->float('nilai');
            $table->timestamps();

            $table->foreignId('criteria_id')
                ->constrained('criterias','id')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('alternatif_id')
                ->constrained('alternatives','id')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('samples');
    }
};
