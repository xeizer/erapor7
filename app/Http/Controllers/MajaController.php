<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Ttd;
use Illuminate\Http\Request;

class MajaController extends Controller
{
    public function depanUploadTtd()
    {
        $gurus = Guru::orderBy('nama', 'asc')->get();
        $ttd = Ttd::all();
        return view('maja.uploadttd')->with([
            'gurus' => $gurus,
            'ttds' => $ttd
        ]);
    }
    public function uploadttd(Request $request)
    {
        $guru = $request->input('guru');
        $tampil = $request->input('tampil');
        // Hapus tanda "-" dari $guruId
        //$guruIdWithoutDash = str_replace('-', '', $guru);
        $image = $request->file('file');
        if ($image) {
            $imageName = 'guru-' . $guru . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
        }

        $data = Ttd::where('guru_id', $guru)->first();
        if ($data) {
            $simpan = $data;
            if ($tampil) {
                $simpan->tampil = $tampil;
            }
            if ($image) {
                $simpan->lokasi = 'storage/images/' . $imageName;
            }
            $simpan->save();
        } else {
            $simpan = new Ttd();
            $simpan->guru_id = $guru;
            $simpan->tampil = $tampil;
            $simpan->lokasi = 'storage/images/' . $imageName;
            $simpan->save();
        }

        return redirect()->back();
    }
}
