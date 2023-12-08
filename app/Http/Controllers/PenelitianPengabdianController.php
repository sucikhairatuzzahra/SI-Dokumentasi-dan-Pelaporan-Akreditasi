<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\LuaranLainPPKMDosen;
use App\Models\LuaranPPKMDosen;
use App\Models\PPKM;
use App\Models\PPKMDosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenelitianPengabdianController extends Controller
{

    public function index()
    {
        $dosens = Dosen::with('pegawai')->get();
        $data = [];
        $b = [];
        foreach ($dosens as $dosen) {
            $item = [];
            $item['dosen'] = $dosen->pegawai->nama_pegawai;
            $item['jumlah_publikasi']  = LuaranPPKMDosen::where('id_dosen', $dosen->id)->count();

            $ppkm_dosen = PPKMDosen::where('id_dosen', $dosen->id)->get();
            $penelitian = $ppkm_dosen->load(['ppkm' => fn ($query) => $query->where('jenis_penelitian_pengabdian', 'Penelitian')]);
            $item['jumlah_penelitian'] = $penelitian->count();;

            $ppkm_luaran_lain_dosen = LuaranLainPPKMDosen::where('id_dosen', $dosen->id)->with('luaranLainPpkm')->get();

            $total_hki = 0;
            foreach ($ppkm_luaran_lain_dosen as $ppkm_lld) {
                foreach ($penelitian as $penelitian_dosen) {
                    if ($penelitian_dosen->id_ppkm == $ppkm_lld->luaranLainPpkm->id_ppkm) {
                        $total_hki++;
                    }
                }
            }
            $item['jumlah_hki'] = $total_hki;
            
            $pengabdian = $ppkm_dosen->load(['ppkm' => fn ($query) => $query->where('jenis_penelitian_pengabdian', 'Pengabdian')]);
            $item['jumlah_hki_diadopsi'] = $pengabdian;
            $data[] = $item;
        }

        dd($data, $b);
        return view('penelitian_pengabdian.index');
    }
}
