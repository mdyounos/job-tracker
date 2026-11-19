
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {
            foreach (['preli', 'written', 'aptitude', 'viva', 'medical'] as $stage) {
                $table->string("{$stage}_exam_taker")->nullable();
                $table->time("{$stage}_time")->nullable();
                $table->string("{$stage}_centre")->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {
            foreach (['preli', 'written', 'aptitude', 'viva', 'medical'] as $stage) {
                $table->dropColumn([
                    "{$stage}_exam_taker",
                    "{$stage}_time",
                    "{$stage}_centre",
                ]);
            }
        });
    }
};
