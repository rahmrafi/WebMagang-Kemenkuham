<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('submissions', function (Blueprint $table) {
            $table->string('study_program', 100)->nullable()->change();
        });
    }

    public function down(): void
    {
        DB::table('submissions')->whereNull('study_program')->update(['study_program' => '']);

        Schema::table('submissions', function (Blueprint $table) {
            $table->string('study_program', 100)->nullable(false)->change();
        });
    }
};
