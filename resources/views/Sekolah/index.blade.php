<x-app-layout :title="$title">
  <div class="w-full px-4 mx-auto lg:px-12 mb-10">
    <!-- Start coding here -->
    <div class="relative overflow-hidden bg-white shadow-xl border-1 border-slate-300 dark:bg-gray-800 sm:rounded-lg">
      <div class="flex-row items-center justify-between p-4 space-y-3 sm:flex sm:space-y-0 sm:space-x-4">
        <div>
          <h5 class="mr-3 font-bold dark:text-white text-2xl">{{ count($sekolahs) }} Sekolah Terdaftar</h5>
        </div>
        <button type="button"
                class="flex items-center gap-2 justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
          <i class="fa-solid fa-school"></i>
          Tambah Sekolah
        </button>
      </div>
    </div>
  </div>
    <div class="space-y-4">
        @if (isset($sekolahs) && $sekolahs->count() > 0)
            @foreach ($sekolahs as $sekolah)
                <!-- Kartu SMK Negeri 1 Denpasar -->
                <a href="{{ $sekolah->website }}"
                    class="max-w-6xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden flex flex-col md:flex-row mb-6 hover:shadow-xl transition-shadow duration-300">
                    <!-- Logo / Background -->
                    <div class="w-full md:w-1/3 bg-cover bg-center"
                        style="background-image: url('{{ asset('storage/bg-sekolah/' . $sekolah->gambar) }}');">
                    </div>

                    <!-- Konten -->
                    <div class="w-full md:w-2/3 p-6 flex flex-col justify-center">
                        <h2 class="text-2xl font-bold text-blue-700 mb-2">{{ $sekolah->nama_sekolah }}</h2>
                        <p class="text-gray-600 mb-3">{{ $sekolah->deskripsi }}</p>
                        <ul class="text-sm text-gray-700 space-y-1">
                            <li><i class="fa-solid fa-users text-blue-500 mr-2"></i><strong>Jumlah Siswa:</strong> ±{{ $sekolah->siswa->count() }}</li>
                            <li><i class="fa-solid fa-book text-blue-500 mr-2"></i><strong>Jurusan:</strong>{{ !empty($sekolah->jurusan) ? implode(', ', $sekolah->jurusan) : 'kosong' }}</li>
                            <li><i class="fa-solid fa-location-dot text-blue-500 mr-2"></i><strong>Alamat:</strong> {{ $sekolah->alamat }}</li>
                            <li><i class="fa-solid fa-phone text-blue-500 mr-2"></i><strong>Kontak:</strong> (0361) 420874</li>
                        </ul>
                    </div>
                </a>
            @endforeach
            @else
            <h1>null</h1>
            @endif
    </div>
</x-app-layout>