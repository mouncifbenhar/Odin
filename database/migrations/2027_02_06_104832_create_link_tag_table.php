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
       
      Schema::create('link_tag', function (Blueprint $table) {
      $table->foreignId('lien_id')->constrained('liens')->onDelete('CASCADE');
      $table->foreignId('tag_id')->constrained('tags')->onDelete('CASCADE');
      $table->primary('tag_id','lien_id');
      
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('link_tag');
    }
};

