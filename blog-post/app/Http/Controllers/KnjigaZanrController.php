<?php

namespace App\Http\Controllers;
use App\Http\Resources\KnjigaCollection;
use App\Models\Knjiga;
use Illuminate\Http\Request;

class KnjigaZanrController extends Controller
{
    public function index($zanr_id)
    {
        $knjigas=Knjiga::get()->where('zanr_id', $zanr_id);
        if(is_null($knjigas)){
            return response()->json('Nije pronadjen nijedna knjiga izabranog zanra', 404);
        }
        return response()->json(new KnjigaCollection($knjigas));
    }
}
