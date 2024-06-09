<?php


//setiap pada map yang masuk, akan memunculkan trigger ke table update_log

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class triggermap extends Model
{
    protected $table = 'update_log';

    public static function boot()
    {
        parent::boot();

        static::creating(function () {
            DB::unprepared('
                CREATE TRIGGER trigger_tambah_map BEFORE INSERT ON mini_maps
                FOR EACH ROW
                BEGIN
                    INSERT INTO update_log (status) VALUES ("berhasil");
                END
            ');
        });
    }
}



?>
