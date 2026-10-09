<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('reports')->orderBy('id')->chunkById(500, function ($reports) {
            foreach ($reports as $report) {
                $exists = DB::table('report_status_histories')->where('report_id', $report->id)->exists();
                if ($exists) continue;

                DB::table('report_status_histories')->insert([
                    'report_id' => $report->id,
                    'user_id' => null,
                    'status' => $report->status,
                    'note' => 'Current status when history tracking was enabled',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        });
    }

    public function down(): void
    {
        DB::table('report_status_histories')
            ->where('note', 'Current status when history tracking was enabled')
            ->delete();
    }
};