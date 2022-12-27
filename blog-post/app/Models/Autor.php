<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;
    protected $fillable=[
        'ime',
        'prezime',
        'datum_rodjenja',
        'pol',
    ];
    public function knjiga(){
        return  $this->hasMany(Knjiga::class);
    }
}
