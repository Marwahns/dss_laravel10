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

    ######################################## Detail Alternative ########################################
    public function detailAlternative($id = null)
    {
        $builder = DB::table('alternatives')
            ->select('alternatives.id', 'alternatives.nama_alternative', 'alternatives.kode_alternative');
        if (empty($id)) {
            return json_decode(json_encode($builder->get()), true); // convert collection to array
        } else {
            return json_decode(json_encode($builder->where('alternatives.id', $id)->first()), true); // convert object to array
        }
    }
}
