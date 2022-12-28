<?php

namespace App\Http\Controllers;

use App\Models\Knjiga;
use Illuminate\Http\Request;
use App\Http\Resources\KnjigaResource;
use App\Http\Resources\KnjigaCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KnjigaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $knjigas = Knjiga::all();
       // return $knjigas;
      //  return KnjigaResource::collection($knjigas);
      return new KnjigaCollection($knjigas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'naziv'=>'required|string|max:255',
            'godina_izdanja'=>'required|digits:4|integer|min:1000|max:'.(date('Y')+1),
            'opis'=>'required|string||max:255',
            'zanr_id'=>'required',
            'autor_id'=>'required'
        ]);
            
            if($validator->fails()){
                return response()->json($validator->errors());
            }
    
            $knjiga=Knjiga::create([
                'naziv'=>$request->naziv,
                'godina_izdanja'=>$request->godina_izdanja,
                'opis'=>$request->opis,
                'zanr_id'=>$request->zanr_id,
                'autor_id'=>$request->autor_id,
                'user_id'=>Auth::user()->id,          
            ]);
    
            return response()->json(['Knjiga uspesno kreirana', new KnjigaResource($knjiga)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Knjiga  $knjiga
     * @return \Illuminate\Http\Response
     */
    public function show(Knjiga $knjiga)
    {
    return new KnjigaResource($knjiga);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Knjiga  $knjiga
     * @return \Illuminate\Http\Response
     */
    public function edit(Knjiga $knjiga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Knjiga  $knjiga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Knjiga $knjiga)
    {
        $validator=Validator::make($request->all(),[
            'naziv'=>'required|string|max:255',
            'opis'=>'required|string|max:255',
            'godina_izdanja'=>'required|digits:4|integer|min:1000|max:'.(date('Y')+1),
            'zanr_id'=>'required',
            'autor_id'=>'required',
        ]);
        
        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $knjiga->naziv=$request->naziv;
        $knjiga->opis=$request->opis;
        $knjiga->godina_izdanja=$request->godina_izdanja;
        $knjiga->category_id=$request->category_id;
        $knjiga->autor_id=$request->autor_id;

        
        $knjiga->save();

        return response()->json(['Knjiga uspesno izmenjena', new KnjigaResource($knjiga)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Knjiga  $knjiga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Knjiga $knjiga)
    {
        $knjiga->delete();
        return response()->json(['Knjiga uspesno izbrisana', new KnjigaResource($knjiga)]);
    }
}
