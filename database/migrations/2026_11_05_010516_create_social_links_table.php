<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('social_links', function (Blueprint $table) {
            $table->id();
            $table->string('platform_name');
            $table->string('platform_key');
            $table->string('url');
            $table->string('handle');
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('social_links'); }
};