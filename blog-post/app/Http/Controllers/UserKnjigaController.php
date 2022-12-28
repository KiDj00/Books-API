<?php

namespace App\Http\Controllers;
use App\Http\Resources\KnjigaCollection;
use App\Models\Knjiga;
use Illuminate\Http\Request;

class UserKnjigaController extends Controller
{
    public function index($user_id)
    {
        $knjigas=Knjiga::get()->where('user_id', $user_id);
        if(is_null($knjigas)){
            return response()->json('Nije pronadjen nijedna knjiga izabranog korisnika', 404);
        }
        //return response()->json($knjigas);
        return response()->json(new KnjigaCollection($knjigas));
    }
}
