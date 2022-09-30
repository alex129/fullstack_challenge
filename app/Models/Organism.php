<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * An organism
 * @property string $genus
 * @property string $species
 */
class Organism extends Model
{
    use HasFactory;

    protected $fillable = [ 'genus', 'especies' ];


    protected $attribute = ['common_crops'];

    public function abundances() 
    {
        return $this->hasMany(Abundance::class);
    }

    public function getCommonCropsAttribute()
    {
        $abundances = $this->abundances()->with(['sample' => function($q){
            $q->with('crop');
        }])->get();
        $crops = [];
        foreach($abundances as $abundance){
            $crops[] = $abundance->sample->crop_id;
        }
        $arrayCountValues = array_count_values($crops);
        arsort($arrayCountValues);
        $popularCrops = array_slice(array_keys($arrayCountValues), 0, 3, true);
        return Crop::whereIn('id', $popularCrops)->get();
    }
}
