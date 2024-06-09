<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create the update_log table
        DB::unprepared('
            CREATE TABLE update_log (
                status VARCHAR(100)
            );
        ');

        // Create the trigger for mini_maps
        DB::unprepared('
            CREATE TRIGGER trigger_tambah_map
            BEFORE INSERT ON mini_maps
            FOR EACH ROW
            BEGIN
                INSERT INTO update_log (status) VALUES (\'berhasil\');
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the trigger and table
        DB::unprepared('
            DROP TRIGGER IF EXISTS trigger_tambah_map;
            DROP TABLE IF EXISTS update_log;
        ');
    }
};




?>
