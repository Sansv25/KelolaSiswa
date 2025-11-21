<x-app-layout :title="$title">
    <div class="bg-gradient-to-br from-blue-50 to-white p-8 rounded-2xl shadow-lg border border-blue-100">
        <!-- Header Profil -->
        <div class="flex flex-col md:flex-row items-center gap-6 mb-8">
            <div class="relative w-28 h-28 rounded-xl overflow-hidden shadow-md border border-blue-100 bg-white">
                <img src="{{ asset('storage/logo-sekolah/' . $siswa->sekolah->gambar) }}"
                    alt="Logo Sekolah"
                    class="w-full h-full object-contain p-2" />
            </div>
            <div class="text-center md:text-left">
                <h1 class="text-3xl font-bold text-blue-700">{{ $siswa->siswa_namalengkap }}</h1>
                <p class="text-gray-600 mt-1">NISN: <span class="font-semibold">{{ $siswa->nisn }}</span></p>
                <p class="text-sm text-gray-500">{{ $siswa->sekolah->nama_sekolah ?? '-' }}</p>
            </div>
        </div>

        <div class="border-t border-gray-200 my-6"></div>

        <!-- Informasi Pribadi -->
        <h2 class="text-xl font-semibold text-blue-600 mb-4 flex items-center gap-2">
            <i class="fa-solid fa-user-graduate text-blue-500"></i> Data Pribadi
        </h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 text-gray-700">
            <p><span class="font-semibold">NIS:</span> {{ $siswa->nis }}</p>
            <p><span class="font-semibold">NIK:</span> {{ $siswa->nik }}</p>
            <p><span class="font-semibold">Nama Panggilan:</span> {{ $siswa->siswa_namapangilan }}</p>
            <p><span class="font-semibold">TTL:</span> {{ $siswa->tempatlahir }}, {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->translatedFormat('d F Y') }}</p>
            <p><span class="font-semibold">Agama:</span> {{ $siswa->agama }}</p>
            <p><span class="font-semibold">Jenis Kelamin:</span> {{ $siswa->jenis_kelamin }}</p>
            <p><span class="font-semibold">Kelas:</span> {{ $siswa->kelas ?? '-' }}</p>
            <p><span class="font-semibold">Jurusan:</span> {{ $siswa->jurusan ?? 'Tidak Punya Jurusan' }}</p>
            <p><span class="font-semibold">No. Telepon:</span> {{ $siswa->ntlp_siswa }}</p>
        </div>

        <div class="border-t border-gray-200 my-6"></div>

        <!-- Alamat -->
        <h2 class="text-xl font-semibold text-blue-600 mb-4 flex items-center gap-2">
            <i class="fa-solid fa-map-location-dot text-blue-500"></i> Alamat Lengkap
        </h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 text-gray-700">
            <p><span class="font-semibold">Alamat:</span> {{ $siswa->alamat }}</p>
            <p><span class="font-semibold">Kecamatan:</span> {{ $siswa->kecamatan }}</p>
            <p><span class="font-semibold">Kabupaten:</span> {{ $siswa->kabupaten }}</p>
            <p><span class="font-semibold">Provinsi:</span> {{ $siswa->Provinsi->nama }}</p>
        </div>

        <div class="border-t border-gray-200 my-6"></div>

        <!-- Data Orang Tua -->
        <h2 class="text-xl font-semibold text-blue-600 mb-4 flex items-center gap-2">
            <i class="fa-solid fa-users text-blue-500"></i> Data Orang Tua
        </h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 text-gray-700">
            <p><span class="font-semibold">Nama Ayah:</span> {{ $siswa->nama_ayah }}</p>
            <p><span class="font-semibold">Pekerjaan Ayah:</span> {{ $siswa->pekerjaan_ayah }}</p>
            <p><span class="font-semibold">Penghasilan Ayah:</span> Rp {{ $siswa->penghasilan_ayah }}</p>
            <p><span class="font-semibold">Nama Ibu:</span> {{ $siswa->nama_ibu }}</p>
            <p><span class="font-semibold">Pekerjaan Ibu:</span> {{ $siswa->pekerjaan_ibu }}</p>
            <p><span class="font-semibold">Penghasilan Ibu:</span> Rp {{ $siswa->penghasilan_ibu}}</p>
            <p><span class="font-semibold">No. Telepon Ortu:</span> {{ $siswa->ntlp_ortu }}</p>
        </div>

        <div class="border-t border-gray-200 my-6"></div>

        <!-- Data Tambahan -->
        <h2 class="text-xl font-semibold text-blue-600 mb-4 flex items-center gap-2">
            <i class="fa-solid fa-circle-info text-blue-500"></i> Data Tambahan
        </h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 text-gray-700">
            <p><span class="font-semibold">Golongan Darah:</span> {{ $siswa->golongan_darah ?? '-' }}</p>
            <p><span class="font-semibold">Tinggi Badan:</span> {{ $siswa->tinggi_badan ?? '-' }} cm</p>
            <p><span class="font-semibold">Berat Badan:</span> {{ $siswa->berat_badan ?? '-' }} kg</p>
            <p><span class="font-semibold">Hobi:</span> {{ $siswa->hobi }}</p>
            <p><span class="font-semibold">Cita-cita:</span> {{ $siswa->cita_cita }}</p>
            <p><span class="font-semibold">Anak ke-:</span> {{ $siswa->siswa_anak_ke }}</p>
            <p><span class="font-semibold">Kewarganegaraan:</span> 
                @if(!empty($siswa->kewarganegaraan))
                    {{ $siswa->kewarganegaraan }}
                @elseif(!empty($siswa->kewarganegaraan_lain))
                    {{ $siswa->kewarganegaraan_lain }}
                @else
                    kosong
                @endif
            </p>
        </div>
    </div>
    
</x-app-layout>
