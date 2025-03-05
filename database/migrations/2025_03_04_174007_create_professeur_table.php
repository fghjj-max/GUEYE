<?php

use App\Models\Classe;
use App\Models\Cour;
use App\Models\Professeur;
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
        Schema::create('professeurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom_professeur');
            $table->string('prenom_professeur');
            $table->string('telephone_professeur')->unique();
            $table->string('email_professeur')->unique();
            $table->timestamps();
        });
        Schema::create('professeurs_classes', function (Blueprint $table) {
            $table->foreignIdFor(Professeur::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Classe::class)->nullable()->constrained()->cascadeOnDelete();
            $table->primary(['professeur_id', 'classe_id']);

        });
        Schema::create('professeurs_cours', function (Blueprint $table) {
            $table->foreignIdFor(Professeur::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Cour::class)->nullable()->constrained()->cascadeOnDelete();
            $table->primary(['professeur_id', 'cour_id']);

        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professeurs');
        Schema::dropIfExists('professeurs_classes');
        Schema::dropIfExists('professeurs_cours');

    }
};
