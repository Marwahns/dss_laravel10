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
        Schema::create('criterias', function (Blueprint $table) {
            $table->id()->autoIncrement()->unsigned();
            $table->string('criteria');
            $table->enum('type', ['benefit', 'cost']);
            $table->double('weight');
            $table->timestamps();

            // $table->foreignId('type_id')
            //     ->constrained('type_criterias','id')
            //     ->cascadeOnUpdate()
            //     ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('criterias');
    }
};
