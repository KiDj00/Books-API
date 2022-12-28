<?php

namespace App\Http\Controllers;
use App\Http\Resources\KnjigaCollection;
use App\Models\Knjiga;
use Illuminate\Http\Request;

class KnjigaAutorController extends Controller
{
    public function index($autor_id)
    {
        $knjigas=Knjiga::get()->where('autor_id', $autor_id);
        if(is_null($knjigas)){
            return response()->json('Nije pronadjen nijedna knjiga izabranog korisnika', 404);
        }
        return response()->json(new KnjigaCollection($knjigas));
    }
}
