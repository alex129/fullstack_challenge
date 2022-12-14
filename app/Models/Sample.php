<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * A sample
 * @property string $code The code to identify the sample
 */
class Sample extends Model
{
    use HasFactory;

    public function abundances(){
        return $this->hasMany(Abundance::class);
    }

    public function crop(){
        return $this->belongsTo(Crop::class);
    }

}
