<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->json('role_titles');
            $table->text('bio');
            $table->text('about');
            $table->integer('semester');
            $table->integer('total_projects');
            $table->decimal('gpa', 3, 2);
            $table->integer('tech_count');
            $table->string('photo_path')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('profiles'); }
};