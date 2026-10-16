
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();

            $table->foreignId('kegiatan_id')
                ->constrained('kegiatan')
                ->cascadeOnDelete();

            $table->foreignId('jamaah_id')
                ->constrained('jamaah')
                ->cascadeOnDelete();

            $table->date('tanggal');

            $table->time('waktu_hadir')->nullable();

            $table->enum('status', [
                'hadir',
                'izin',
                'tidak_hadir'
            ])->default('hadir');

            $table->text('keterangan')->nullable();

            $table->timestamps();

            $table->unique([
                'kegiatan_id',
                'jamaah_id',
                'tanggal'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};
