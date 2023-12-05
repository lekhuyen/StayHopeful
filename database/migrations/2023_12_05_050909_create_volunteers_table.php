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
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->string("finding_source");
            $table->boolean("enrolled");
            $table->string("name");
            $table->string("phone");
            $table->string("email");
            $table->string("volunteer_description");
            $table->string("rel_name");
            $table->string("rel_relationship");
            $table->string("rel_phone");
            $table->unsignedBigInteger("project_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteers');
    }
};
