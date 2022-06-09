<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use App\Models\gaji;
use App\Models\User;
use App\Models\ProfilPerusahaan;
use App\Models\presensi;
use Illuminate\Http\Request;
use App\Http\Requests\StoregajiRequest;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Requests\UpdategajiRequest;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Karyawan.gaji.gaji', [
            'title' => "Gaji",
            'gaji_admins' => gaji::latest()->get(),
            'gaji_karyawans' => gaji::where('karyawan_id', auth()->user()->id)->latest()->get(),
            'data' => ProfilPerusahaan::where('id', 1)->first()

        ]);
    }
    public function bayar()
    {
        $search = gaji::latest();
        if (request('search')) {
            $search->where('kode', 'like', request('search'));
        }
        $cek = $search->first();
        if (empty($cek)){
            return redirect('/pembayaran')->with('error', 'Tidak Ada data dengan kode');
        }

        return view('Karyawan.gaji.pembayaran', [
            'title' => "Pembayaran",
            'search' => $search->first(),
            'data' => ProfilPerusahaan::where('id', 1)->first()
            
        ]);
    }
    public function konfirmasi(Request $request, $id)
    {
        
        $gaji = gaji::where('id', $id)->first();
        $gaji->status = 'konfimasi';
        $gaji->update();

        $request->session()->flash('bisa', 'Selamat Data Telah Ditambahkan!!');
        // kembalikan ke halaman post
        return redirect('/pembayaran');
        
    }
    public function nominalgaji()
    {
        $idi = gaji::latest()->first();
        $kehadirans = presensi::where('user_id', $idi->karyawan)->get();
        return view('Karyawan.gaji.nominalgaji', compact('kehadirans'), [
            'title' => "Nominal",
            'nominal' => gaji::latest()->first(),
            // 'karyawans' => User::where('name', gaji()->karyawan)->get(),
            // 'kehadirans' => presensi::where('user_id', $idi)->get()
        ]);
    }
    public function nominal(Request $request)
    {
        $gaji = gaji::where('gaji', '')->latest()->first();
        $user->gaji = $request->gaji;
        $user->update();

        $request->session()->flash('bisa', 'Selamat Data Telah Ditambahkan!!');
        // kembalikan ke halaman post
        return redirect('/');
    }

    // QR
    public function generate ($id)
    {
        $gaji = gaji::findOrFail($id);
        $qrcode = QrCode::size(400)->generate($gaji->kode);
        return view('qrcode',compact('qrcode'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $jumlah = '';
        $kondisi = '';
        if (request('karyawan_id')) {
            $gaji = User::where('id', request('karyawan_id'))->latest()->first();
            $presensi = presensi::where('user_id', request('karyawan_id'))->where('kondisi', null)->where('status', 'hadir')->get();
            $Jpres = count($presensi);
            if ($Jpres && $gaji->jabatan->gaji) {
                $jumlah = $Jpres * $gaji->jabatan->gaji;
            }else {
                $jumlah = '';
            }
            $kondisi = 'ada';
        }else {
            $gaji = '';
        }
        return view('karyawan.gaji.tambahgaji', [
            'title' => "Tambah Gaji",
            'karyawans' => User::where('level', 'karyawan')->get(),
            'kehadirans' => presensi::where('user_id', auth()->user()->id)->get(),
            'data' => ProfilPerusahaan::where('id', 1)->first(),
            'kondisi' => $kondisi,
            'jumlah' => $jumlah,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoregajiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $timezone = 'Asia/Jakarta'; 
        // $date = new DateTime('now', new DateTimeZone($timezone)); 
        // $tanggal = $date->format('Y-m-d');
        $bebassaja = $request->validate([
            'karyawan_id' => 'required|max:255',
            'tanggal' => 'required',
            'gaji' => 'required|max:255',
            'kode' => 'required|max:255|unique:gajis'
        ]);
        
        gaji::create($bebassaja);
        $presensis = presensi::where('user_id', request('karyawan_id'))->where('kondisi', null)->get();
        foreach ($presensis as $presensi) {
            $presensi->kondisi = '1';
            $presensi->update(); 
        }

        $request->session()->flash('bisa', 'Selamat Data Telah Ditambahkan!!');
        // kembalikan ke halaman post
        return redirect('/gaji');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function show(gaji $gaji)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function edit(gaji $gaji)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdategajiRequest  $request
     * @param  \App\Models\gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function update(UpdategajiRequest $request, gaji $gaji)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function destroy(gaji $gaji)
    {
        //
    }
}
