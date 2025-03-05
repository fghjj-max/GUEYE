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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('nom_classes');
            $table->timestamps();


        });
        Schema::table('etudiants', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Classe::class)->nullable()->constrained()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
        Schema::table('etudiants', function (Blueprint $table) {
            $table->dropForeignIdFor(\App\Models\Classe::class);

        });
    }
};
