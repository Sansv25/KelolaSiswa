<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Sekolah;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class InputController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sekolah = Sekolah::all();
        $provinsi = Provinsi::all();
        return view('Siswa.input', ['title' => "Input Siswa" , 'sekolah' => $sekolah, 'provinsi' => $provinsi]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'nis' => 'required|string',
        'nisn' => 'required|string|unique:siswa,nisn',
        'nik' => 'required|string|unique:siswa,nik',
        'no_kk' => 'required|string',
        'asal_sekolah_id' => 'required|exists:sekolah,id',
        'siswa_namalengkap' => 'required|string',
        'siswa_namapangilan' => 'required|string',
        'tempatlahir' => 'required|string',
        'tanggallahir' => 'required|date',
        'agama' => 'required|string',
        'jenis_kelamin' => 'required|string',
        'kelas' => 'required|string',
        'jurusan' => 'nullable|string',
        'ntlp_siswa' => 'nullable|string',
        'ntlp_ortu' => 'nullable|string',
        'kecamatan' => 'required|string',
        'kabupaten' => 'required|string',
        'asal_provinsi_id' => 'required|exists:provinsi,id',
        'alamat' => 'required|string',
        'nama_ayah' => 'required|string',
        'pekerjaan_ayah' => 'required|string',
        'penghasilan_ayah' => 'required|string',
        'nama_ibu' => 'required|string',
        'pekerjaan_ibu' => 'required|string',
        'penghasilan_ibu' => 'required|string',
        'golongan_darah' => 'nullable|string',
        'tinggi_badan' => 'nullable|integer',
        'berat_badan' => 'nullable|integer',
        'hobi' => 'nullable|string',
        'cita_cita' => 'nullable|string',
        'siswa_anak_ke' => 'nullable|integer',
        'kewarganegaraan' => 'nullable|string',
        'kewarganegaraan_lain' => 'nullable|string',
    ]);

    Siswa::create($validated);

    return redirect()->route('table')->with('success', 'Data siswa ' . ($validated['siswa_namapangilan'] ?? '') . ' berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        //
    }
}
