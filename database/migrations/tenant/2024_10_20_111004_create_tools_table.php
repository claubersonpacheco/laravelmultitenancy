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
        Schema::create('tools', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name', 100);
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');



            $table->string('brand', 50);
            $table->string('model', 50)->nullable();
            $table->string('serial_number', 50)->nullable();
            $table->string('condition', 20);
            $table->date('purchase_date');
            $table->decimal('purchase_price', 10, 2)->nullable();
            $table->string('invoice')->nullable(); // Caminho da foto
            $table->text('notes')->nullable();
            $table->string('photo_path')->nullable(); // Caminho da foto

//            $table->string('tenant_id')->nullable();
//            $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tools');
    }
};
