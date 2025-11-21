<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Sekolah;
use App\Models\Provinsi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil semua data siswa tanpa pagination
        $siswas = Siswa::all();  // Atau Siswa::get(); sama saja
        // Jika ada search atau filter, tetap bisa ditambahkan (opsional)
        if ($request->has('search') && !empty($request->search)) {
            $query = $request->search;
            $siswas = Siswa::where('siswa_namalengkap', 'like', '%' . $query . '%')
                ->orWhere('nisn', 'like', '%' . $query . '%')
                ->paginate(10); // untuk mempertahankan query saat pagination
        } else {
            $siswas = Siswa::paginate(10);
        }

        // Kirim data ke view
        return view('Siswa.index', ['title' => 'Tabel Siswa',  'siswas' => $siswas]);
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        $siswas = Siswa::where('siswa_namalengkap', 'like', '%' . $query . '%')
            ->orWhere('nisn', 'like', '%' . $query . '%')
            ->paginate(10);;  // Gunakan paginate jika perlu; atau get() jika tidak
        return view('Siswa.search-results', compact('siswas'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        return view('Siswa.data-siswa', [
        'title' => "Data Siswa " . $siswa->siswa_namalengkap,
        'siswa' => $siswa
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    // ambil siswa berdasarkan primary key id
    $siswa = Siswa::with(['sekolah', 'provinsi'])->findOrFail($id);

    // daftar sekolah (sertakan kolom jurusan untuk JS)
    $sekolah = Sekolah::select('id', 'nama_sekolah', 'jurusan', 'gambar')
        ->orderBy('nama_sekolah')
        ->get();

    // daftar provinsi
    $provinsi = Provinsi::select('id', 'nama')
        ->orderBy('nama')
        ->get();

    // kirim ke view
    return view('siswa.edit', compact('siswa', 'sekolah', 'provinsi'));
}



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'nis' => 'required|string',
        'nisn' => 'required|string|unique:siswa,nisn,' . $id,
        'nik' => 'required|string|unique:siswa,nik,' . $id,
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
    $siswa = Siswa::findOrFail($id);
    $siswa->update($validated);

    return redirect()->route('table')->with('success', 'Data siswa ' . ($validated['siswa_namapangilan'] ?? '') . ' berhasil diperbarui.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $siswa = Siswa::findOrFail($id);
    $nama = Str::limit($siswa->siswa_namapangilan, 9, '...');
    $siswa->delete(); // Soft delete

    return redirect()->route('table')->with('deleted', "Data $nama Dihapus!");
}


}
