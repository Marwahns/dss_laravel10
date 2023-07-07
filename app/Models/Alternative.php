<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Alternative extends Model
{
    use HasFactory;

    protected $table = 'alternatives';
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $guarded = ['id'];

    protected $fillable = [
        'nama_alternative', 'kode_alternative'
    ];

    ######################################## Detail Criteria ########################################
    public function detailAlternative($id = null)
    {
        $builder = DB::table('alternatives')
            ->select('alternatives.id', 'alternatives.nama_alternative', 'alternatives.kode_alternative');
        if (empty($id)) {
            return $builder->get(); // tampilkan semua data
        } else {
            // tampilkan data sesuai id/barcode
            return $builder->where('alternatives.id', $id)->get(1)->getRow();
        }
    }
}
