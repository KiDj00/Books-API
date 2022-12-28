<?php

namespace Database\Seeders;
use App\Models\Knjiga;
use App\Models\Autor;
use App\Models\Zanr;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /*
     @return void
     */
    public function run()
    {
        Knjiga::truncate();

        Autor::truncate();

        Zanr::truncate();

        \App\Models\User::truncate();



       // \App\Models\User::factory(5)->create();



        Knjiga::factory(5)->create();



       /* Knjiga::create([

            'id' => 1,

            'naziv' => "Mali Princ",

            'godina_izdanja' => "1943",

            'opis' => "Mali princ, usamljeni dečak iz svemira, napustio je svoju malenu planetu i svog jedinog prijatelja, crvenu ružu o kojoj se brinuo i koju je voleo najviše na svetu i potpuno sam krenuo na putovanje s ciljem da otkrije nepoznati svet i nešto novo nauči.",
            
            'user_id' => 1,

            'zanr_id'=> 1,

            'autor_id'=> 1

        ]);



        Knjiga::create([

            'id' => 2,

            'naziv' => "Dnevnik Ane Frank",

            'godina_izdanja' => "1947",

            'opis' => "Dnevnik Ane Frank roman je napravljen prema dnevničkim zapisima trinaestogodišnje Jevrejke Ane Frank, koja se s roditeljima i prijateljima u skrovištu svoje kuće skrivala od nacista tokom njihove okupacije Amsterdama.",

            'user_id' => 2,

            'zanr_id'=> 2,

            'autor_id'=> 2

        ]);



        Autor::create([

            'id' => 1,

            'ime' => "Antoan",

            'prezime' => "de Sent Egziperi",

            'datum_rodjenja' => "1900/06/29",

            'pol' => "muski"

        ]);



        Autor::create([

            'id' => 2,

            'ime' => "Ana",

            'prezime' => "Frank",

            'datum_rodjenja' => "1929/06/12",

            'pol' => "zenski"

        ]);



        Zanr::create([

            'id' => 1,

            'naziv' => "roman",

        ]);



        Zanr::create([

            'id' => 2,

            'naziv' => "dnevnik",

        ]);



        Zanr::create([

            'id' => 3,

            'naziv' => "strip",

        ]);
*/
    }
    }
