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

    // Menghitung nilai positif (F+) dan negatif (F-) dari setiap kriteria
    public function calculateFValues()
    {
        $criterias = Criteria::all(); // Mengambil semua kriteria dari database

        $fPlus = []; // Array untuk menyimpan nilai positif (F+)
        $fMinus = []; // Array untuk menyimpan nilai negatif (F-)

        foreach ($criterias as $criteria) {
            // Mengambil semua nilai kriteria dari database
            $criteriaValues = Criteria::where('id', $criteria->id)->pluck('weight')->toArray();

            // Menghitung nilai maksimum (F+) dan minimum (F-) dari setiap kriteria
            $fPlus[$criteria->id] = max($criteriaValues);
            $fMinus[$criteria->id] = min($criteriaValues);
        }

        // Mengembalikan nilai F+ dan F- dalam bentuk array asosiatif
        return [
            'fPlus' => $fPlus,
            'fMinus' => $fMinus,
        ];
    }

    // Menyimpan nilai F+ dan F- dalam model Kriteria
    public function saveFValues()
    {
        $fValues = $this->calculateFValues();

        foreach ($fValues['fPlus'] as $criteriaId => $fPlusValue) {
            $criteria = Criteria::find($criteriaId);
            $criteria->f_plus = $fPlusValue;
            $criteria->f_minus = $fValues['fMinus'][$criteriaId];
            $criteria->save();
        }
    }
}
