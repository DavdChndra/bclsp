<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use App\Models\Input_aspirasi;
use App\Models\Kategori;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AspirasiController extends Controller
{
    public function index()
    {
        $aspirasi = Aspirasi::latest();
        $noUrut = $aspirasi->max('id_aspirasi');
        $kategori = Kategori::all();
        $id =abs($noUrut + 1);
        return View('aspirasi', [
            'title' => 'Pengaduan',
            'aspirasi' => $aspirasi->fillter(request(['search']))->get(),
            'no' => $id,
            'kategori' => $kategori,
            
        ]);
    }

    public function store(Request $request)
    {
        $ValidateData = $this->validate($request, [
            'nis' => 'required',
            'lokasi' => 'required',
            'id_kategori' => 'required',
            'ket' => 'required',
            'image' => 'image|file|max:1024'
        ]);

        if($request->file('image')){
            $ValidateData['image'] = $request->file('image')->store('Post-images');
        }
    
        $data = Siswa::all()->where('nis',$request->nis)->count();
        if ($data > 0) {
       
            Input_aspirasi::create(
                $ValidateData
            );
            Aspirasi::create([
                'id_pelaporan' => $request->id_pelaporan,
                'id_aspirasi' => $request->id_aspirasi,
                'id_kategori' => $request->id_kategori,
            ]);
            return Redirect("/?id_pelaporan=$request->id_pelaporan");
            } else{
                return Redirect("/?nis=$request->nis");
            }
    }
    public function feedback(Request $request)
        {
            Aspirasi::where('id_aspirasi',  $request->id_aspirasi)
            ->update(['feedback' => $request->feedback]);
            return redirect('/#aspirasi');
        }
}