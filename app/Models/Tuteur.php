<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tuteur extends Model
{
    protected $guarded= [];
    use HasFactory;
    public function eleves()
    {
        return $this->hasMany(Eleve::class);
    }
}
