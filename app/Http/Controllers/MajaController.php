<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class MajaController extends Controller
{
    public function depanUploadTtd()
    {
        $gurus = Guru::orderBy('nama', 'asc')->get();
        return view('maja.uploadttd')->with([
            'gurus' => $gurus
        ]);
    }
    public function uploadttd(Request $request)
    {


        $guru = $request->input('guru');

        // Hapus tanda "-" dari $guruId
        $guruIdWithoutDash = str_replace('-', '', $guru);


        $image = $request->file('file');
        $imageName = 'guru' . $guruIdWithoutDash . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/images', $imageName);

        return redirect()->back();
    }
}
