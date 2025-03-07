<?php

use App\Models\Classe;
use App\Models\Cour;
use App\Models\Emploie;
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
        Schema::create('emploies', function (Blueprint $table) {
            $table->id();
            $table->string('jour');
            $table->time('heureDebut');
            $table->time('heureFin');

            $table->timestamps();
        });

        Schema::create('emploie_classes', function (Blueprint $table) {
            $table->foreignIdFor(Emploie::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Classe::class)->nullable()->constrained()->cascadeOnDelete();
            $table->primary(['emploie_id', 'classe_id']);

        });



        Schema::create('emploie_professeurs', function (Blueprint $table) {
            $table->foreignIdFor(Emploie::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Professeur::class)->nullable()->constrained()->cascadeOnDelete();
            $table->primary(['emploie_id', 'professeur_id']);

        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emploie');
        Schema::dropIfExists('emploie_professeurs');
        Schema::dropIfExists('emploie_classes');
        Schema::dropIfExists('emploie_cours');


    }
};
