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
      Schema::table('campaigns', function (Blueprint $table) {
          $table->string('name_fr')->nullable()->after('name');
          $table->string('name_en')->nullable()->after('name_fr');
          $table->text('description_fr')->nullable()->after('description');
          $table->text('description_en')->nullable()->after('description_fr');
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
