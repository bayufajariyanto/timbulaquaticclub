<?php

use App\Gaya;
use App\Nomor;
use Illuminate\Database\Seeder;

class GayaNomorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        foreach(Gaya::all() as $gaya){
            $gaya->delete();
        }

        $gaya = new Gaya();
        $gaya->id = 1;
        $gaya->nama = "Free Style (Bebas)";
        $gaya->save();
        $gaya = new Gaya();
        $gaya->id = 2;
        $gaya->nama = "Breaststroke (Dada)";
        $gaya->save();
        $gaya = new Gaya();
        $gaya->id = 3;
        $gaya->nama = "Backstroke (Punggung)";
        $gaya->save();
        $gaya = new Gaya();
        $gaya->id = 4;
        $gaya->nama = "Butterfly (Kupu)";
        $gaya->save();
        $gaya = new Gaya();
        $gaya->id = 5;
        $gaya->nama = "Gaya Ganti";
        $gaya->save();
        $gaya = new Gaya();
        $gaya->id = 6;
        $gaya->nama = "Surface";
        $gaya->save();
        $gaya = new Gaya();
        $gaya->id = 7;
        $gaya->nama = "Biffins";
        $gaya->save();
        
        foreach (Nomor::all() as $nomor) {
            $nomor->delete();
        }

        for ($i=1; $i <= 7; $i++) { 
            $nomor = new Nomor();
            $nomor->nama = "100 M";
            $nomor->id_gaya = $i;
            $nomor->save();        
            $nomor = new Nomor();
            $nomor->nama = "200 M";
            $nomor->id_gaya = $i;
            $nomor->save();        
            $nomor = new Nomor();
            $nomor->nama = "400 M";
            $nomor->id_gaya = $i;
            $nomor->save();        
            $nomor = new Nomor();
            $nomor->nama = "800 M";
            $nomor->id_gaya = $i;
            $nomor->save();        
            $nomor->nama = "1500 M";
            $nomor->id_gaya = $i;
            $nomor->save();        
        }
    }
}
