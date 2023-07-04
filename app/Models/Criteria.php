<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Criteria extends Model
{
    use HasFactory;

    protected $table = 'criterias';
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $guarded = ['id'];

    protected $fillable = [
        'criteria', 'type', 'weight'
    ];

    ######################################## Detail Criteria ########################################
    public function detailCriteria($id = null)
    {
        $builder = DB::table('criterias')
            ->select('criterias.id', 'criterias.criteria', 'criterias.type', 'criterias.weight');
            // ->select('criterias.id', 'criterias.criteria', 'criterias.type_id', 'criterias.weight', 'type_criterias.id As idType', 'type_criterias.type')
            // ->join('type_criterias', 'type_criterias.id', '=', 'criterias.type_id');
        if (empty($id)) {
            return $builder->get(); // tampilkan semua data
        } else {
            // tampilkan data sesuai id/barcode
            return $builder->where('criterias.id', $id)->get(1)->getRow();
        }
    }
}
