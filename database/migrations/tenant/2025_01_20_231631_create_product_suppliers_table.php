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
        Schema::create('product_suppliers',
            function (Blueprint $table) {
                $table->id();
                $table->string('code')->unique();
                $table->string('name');
                $table->string('email')->nullable()->nullable();
                $table->string('phone')->nullable();
                $table->string('service_type')->nullable(); // Ex.: Consultoria, Suporte Técnico
                $table->string('address')->nullable();
                $table->string('city')->nullable();
                $table->string('state')->nullable();
                $table->string('zip')->nullable();
                $table->string('document')->nullable();
                $table->string('bank_account')->nullable();
                $table->boolean('client')->default(false);
                $table->string('code_client')->nullable();

//                $table->string('tenant_id')->nullable();
//                $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade');

                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_suppliers');
    }
};
