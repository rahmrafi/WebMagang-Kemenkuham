<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Tambah 2 key setting baru untuk fitur sertifikat
        DB::table('settings')->insertOrIgnore([
            [
                'key'        => 'certificate_template_path',
                'value'      => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key'        => 'certificate_fields',
                'value'      => json_encode([
                    [
                        'id'         => 'nama',
                        'label'      => 'Nama Peserta',
                        'x'          => 35.0,
                        'y'          => 45.0,
                        'font_size'  => 16,
                        'font_color' => '#1a1a1a',
                    ],
                    [
                        'id'         => 'institusi',
                        'label'      => 'Institusi',
                        'x'          => 35.0,
                        'y'          => 54.0,
                        'font_size'  => 13,
                        'font_color' => '#1a1a1a',
                    ],
                    [
                        'id'         => 'periode',
                        'label'      => 'Periode',
                        'x'          => 35.0,
                        'y'          => 62.0,
                        'font_size'  => 12,
                        'font_color' => '#1a1a1a',
                    ],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    public function down(): void
    {
        DB::table('settings')->whereIn('key', [
            'certificate_template_path',
            'certificate_fields',
        ])->delete();
    }
};
