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

        DB::unprepared('
            CREATE TABLE update_log (
                id INT AUTO_INCREMENT PRIMARY KEY,
                status VARCHAR(100),
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            );
        ');


        DB::unprepared('
            CREATE PROCEDURE log_update_status(IN log_status VARCHAR(100))
            BEGIN
                INSERT INTO update_log (status, created_at, updated_at) VALUES (log_status, NOW(), NOW());
            END;
        ');


        DB::unprepared('
            CREATE TRIGGER trigger_tambah_map
            BEFORE INSERT ON mini_maps
            FOR EACH ROW
            BEGIN
                CALL log_update_status(\'berhasil\');
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        DB::unprepared('
            DROP TRIGGER IF EXISTS trigger_tambah_map;
            DROP PROCEDURE IF EXISTS log_update_status;
            DROP TABLE IF EXISTS update_log;
        ');
    }
};





?>
