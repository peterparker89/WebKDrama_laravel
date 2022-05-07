<?php

namespace App\Http\Controllers;

use App\Models\kdrama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KdramaController extends Controller
{
    
   public function __construct()
   {
       $this->middleware('auth');
   }
    public function index(Request $request)
    {
        if($request->has('search')){
            $kdrama = Kdrama::where('judul','LIKE','%'.$request->search.'%')->get();
        }else{
        $kdrama = Kdrama::all();
        }
        return view('kdrama.index', compact('kdrama'));
    }

    public function create()
    {
        return view('kdrama.create');
    }

    public function store(Request $request)
    {
        $kdrama = new Kdrama;
        $kdrama->judul = $request->input('judul');
        $kdrama->pengarang = $request->input('pengarang');
        $kdrama->penerbit = $request->input('penerbit');
        if($request->hasfile('gambar'))
        {
            $file       = $request->file('gambar');
            $extension  = $file->getClientOriginalExtension();
            $filename   = time().'.'.$extension;
            $file->move('uploads/kdramas/', $filename);
            $kdrama->gambar = $filename;
        }
        $kdrama ->save();
        return redirect()->back()->with('status','Data Berhasil Ditambah');
    }

    public function edit($id)
    {
        $kdrama = Kdrama::find($id);
        return view('kdrama.edit', compact('kdrama'));
    }

    public function update(Request $request, $id)
    {
        $kdrama = Kdrama::find($id);
        $kdrama->judul = $request->input('judul');
        $kdrama->pengarang = $request->input('pengarang');
        $kdrama->penerbit = $request->input('penerbit');

        if($request->hasfile('gambar'))
        {
            $destination = 'uploads/kdramas/'.$kdrama->gambar;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('gambar');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/kdramas/', $filename);
            $kdrama->gambar = $filename;
        }

        $kdrama->update();
        return redirect()->back()->with('status','Data Berhasil Diupdate');
    }

    public function delete($id)
    {
        $kdrama = Kdrama::find($id);
        $destination = 'uploads/kdramas/'.$kdrama->gambar;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $kdrama->delete();
        return redirect()->back()->with('status','Data Berhasil Dihapus');
    }
}
