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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('image_url');
            $table->string('region'); // Daerah asal (Sumatera Utara, Jawa, Bali, dll)
            $table->enum('category', [
                'pakaian_adat', 
                'tarian', 
                'rumah_adat', 
                'kerajinan', 
                'upacara', 
                'kuliner'
            ]);
            $table->boolean('is_featured')->default(false); // Untuk item unggulan
            $table->text('detailed_description')->nullable(); // Deskripsi panjang
            $table->string('slug')->unique(); // URL-friendly identifier
            $table->integer('views')->default(0); // Jumlah view
            $table->json('tags')->nullable(); // Tags untuk pencarian
            $table->string('photographer')->nullable(); // Credit photographer
            $table->string('source')->nullable(); // Sumber gambar
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            // Indexes
            $table->index(['category', 'is_active']);
            $table->index(['region', 'is_active']);
            $table->index(['is_featured', 'is_active']);
            $table->index('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};