<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('submissions', function (Blueprint $table) {
            $table->string('certificate_zip_path')->nullable()->after('permit_file_name');
            $table->timestamp('certificate_generated_at')->nullable()->after('certificate_zip_path');
        });
    }

    public function down(): void
    {
        Schema::table('submissions', function (Blueprint $table) {
            $table->dropColumn(['certificate_zip_path', 'certificate_generated_at']);
        });
    }
};
