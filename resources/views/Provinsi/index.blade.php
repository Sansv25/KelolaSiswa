<x-app-layout :title="$title">
    <div class="w-full px-4 mx-auto lg:px-12 mb-10">
    <!-- Start coding here -->
    <div class="relative overflow-hidden bg-white shadow-xl border-1 border-slate-300 dark:bg-gray-800 sm:rounded-lg">
      <div class="flex-row items-center justify-between p-4 space-y-3 sm:flex sm:space-y-0 sm:space-x-4">
        <div>
          <h5 class="mr-3 font-bold dark:text-white text-2xl">{{ count($provinsis) }} Provinsi Terdaftar</h5>
        </div>
        <button type="button"
                class="flex items-center gap-2 justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
          <i class="fa-solid fa-building-flag"></i>
          Tambah Provinsi
        </button>
      </div>
    </div>
  </div>
    <div class="space-y-4">
        @if (isset($provinsis) && $provinsis->count() > 0)
            @foreach ($provinsis as $provinsi)
                <div
            class="max-w-6xl mx-auto bg-white rounded-xl shadow-md overflow-hidden flex flex-col md:flex-row h-auto md:h-[220px] transition hover:shadow-lg">
            <!-- Logo Daerah -->
            <div
                class="bg-gradient-to-br from-orange-400 to-red-500 w-full md:w-1/3 flex items-center justify-center p-6">
                <img src="{{ asset('storage/logo-provinsi/'. $provinsi->gambar) }}" alt="Logo Bali"
                    class="h-24 w-24 md:h-32 md:w-32 object-contain">
            </div>

            <!-- Konten Kartu -->
            <div class="w-full md:w-2/3 p-6 flex flex-col justify-center">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $provinsi->nama }}</h2>
                <p class="text-gray-600 mb-3">Total Sekolah: <span class="font-semibold text-gray-800">{{ count($provinsi->sekolah) }}</span></p>
                <ul class="text-sm md:text-base text-gray-600 space-y-1">
                    <li><strong>Luas:</strong> {{ $provinsi->luas_km2 }} km²</li>
                    <li><strong>Jumlah Siswa:</strong>{{ \App\Models\Siswa::where('asal_provinsi_id', $provinsi->id)->count() }}</li>
                    <li><strong>Bahasa:</strong> {{ $provinsi->bahasa }}</li>
                    <li><strong>Ekonomi:</strong> {{ $provinsi->ekonomi }}</li>
                </ul>
            </div>
        </div>
            @endforeach
            @else
            <h1>null</h1>
            @endif
    </div>
</x-app-layout>