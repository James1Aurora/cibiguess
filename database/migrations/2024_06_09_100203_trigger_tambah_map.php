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
        DB::unprepared('
        CREATE TABLE update_log(status VARCHAR(100));
        CREATE TRIGGER trigger_tambah_map BEFORE INSERT ON mini_maps
        FOR EACH ROW
        BEGIN
            INSERT INTO update_log (status) VALUES ("berhasil");
        END
    ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
