<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sample extends Model
{
    use HasFactory;

    protected $table = 'samples';
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $guarded = ['id'];

    protected $fillable = [
        'criteria_id', 'alternatif_id', 'nilai'
    ];

    ######################################## Detail Sample ########################################
    public function detailSample($alternatif_id = null)
    {
        $builder = DB::table('samples')
            ->select('samples.id', 'samples.criteria_id', 'samples.alternatif_id', 'samples.nilai', 'criterias.id As idCriteria', 'criterias.criteria', 'alternatives.id As idAlternative', 'alternatives.nama_alternative')
            ->join('criterias', 'criterias.id', '=', 'samples.criteria_id')
            ->join('alternatives', 'alternatives.id', '=', 'samples.alternatif_id');
        if (empty($alternatif_id)) {
            return json_decode(json_encode($builder->get()), true); // convert collection to array
            // print_r($builder->toSql());
            // die;
        } else {
            // tampilkan data sesuai id/barcode
            return json_decode(json_encode($builder->where('samples.alternatif_id', $alternatif_id)->get()), true); // return single row as array
        }
    }
}
