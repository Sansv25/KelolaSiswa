<x-app-layout>

    <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 p-8 rounded-3xl shadow-2xl mb-10 transform transition-all duration-500 hover:scale-101">
    <div class="flex items-center space-x-4">
        <!-- Avatar dummy -->
        <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center shadow-lg">
            <i class="fa-solid fa-user fa-2x text-indigo-600"></i>
        </div>
        <div>
            <h1 class="text-3xl font-bold text-white">Halo, {{ Auth::user()->name }}</h1>
            <p class="text-lg text-white/80 mt-1">Selamat datang di dashboard Anda. Berikut adalah statistik terkini untuk hari ini.</p>
        </div>
    </div>
</div>
    <!-- Statistik Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-10">
        @foreach ([['label' => 'Total Siswa', 'value' => $count, 'icon' => 'fa-user-group', 'bg' => 'bg-gradient-to-tr from-blue-600 to-blue-400'], ['label' => 'Siswa Baru - Hari Ini', 'value' => $jumlah_per_hari[0], 'icon' => 'fa-circle-check', 'bg' => 'bg-gradient-to-tr from-green-600 to-green-400'], ['label' => 'Sekolah Terdaftar', 'value' => $count_sekolah, 'icon' => 'fa-school', 'bg' => 'bg-gradient-to-tr from-yellow-500 to-yellow-300'], ['label' => 'Provinsi Terdaftar', 'value' => $count_provinsi , 'icon' => 'fa-building-flag', 'bg' => 'bg-gradient-to-tr from-red-600 to-red-400']] as $card)
            <div
                class="bg-white p-6 rounded-2xl shadow-lg transform transition hover:shadow-xl hover:scale-[1.03] cursor-pointer">
                <div class="flex items-center">
                    <div
                        class="w-14 h-14 p-3 {{ $card['bg'] }} rounded-full flex items-center justify-center text-white drop-shadow-lg">
                        <i class="fa-solid {{ $card['icon'] }} fa-xl"></i>
                    </div>
                    <div class="ml-5">
                        <p class="text-sm font-semibold text-gray-500 tracking-wide">{{ $card['label'] }}</p>
                        <p class="text-3xl font-extrabold text-gray-900">{{ $card['value'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Chart Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-10">
        @foreach ([['title' => 'Siswa Terdaftar', 'id' => 'classChart'], ['title' => 'Gender Siswa', 'id' => 'genderChart']] as $chart)
            <div class="bg-white p-6 pb-20 rounded-2xl shadow-lg h-[600px] flex flex-col">
                <h2 class="text-2xl font-semibold text-gray-900 border-b border-gray-200 pb-4 mb-4">
                    {{ $chart['title'] }}
                </h2>
                <canvas id="{{ $chart['id'] }}" class="flex-grow"></canvas>
            </div>
        @endforeach
    </div>

    <!-- Tabel Siswa Terbaru -->
    <div class="bg-white p-6 rounded-2xl shadow-lg mb-10 max-w-full overflow-x-auto">
        <h2 class="text-2xl font-semibold text-gray-900 mb-6">Siswa Terbaru</h2>
        <table class="min-w-full table-auto border-collapse rounded-lg overflow-hidden">
            <thead class="text-left">
                <tr class="bg-gray-50 border-b border-gray-200">
                    <th class="px-6 py-3 text-gray-600 font-medium uppercase tracking-wider">NISN</th>
                    <th class="px-6 py-3 text-gray-600 font-medium uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-gray-600 font-medium uppercase tracking-wider text-center">Kelas</th>
                    <th class="px-6 py-3 text-gray-600 font-medium uppercase tracking-wider text-center">Waktu Daftar
                    </th>
                    <th class="px-6 py-3 text-gray-600 font-medium uppercase tracking-wider text-center">Tingkat Sekolah
                    </th>
                </tr>
            </thead>
            <tbody class="">
                @if($siswas->count() > 0)
                    @foreach ($siswas as $siswa)
                        <tr class="hover:bg-gray-50 border-b border-gray-100 transition-colors">
                            <td class="px-6 py-4 text-gray-900">{{ $siswa->nisn }}</td>
                            <td class="px-6 py-4 text-gray-900 font-semibold">{{ $siswa->siswa_namalengkap }}</td>
                            <td class="px-6 py-4 text-gray-900 text-center">{{ $siswa->kelas }}</td>
                            <td class="px-6 py-4 text-gray-900 text-center">
                                {{ \Carbon\Carbon::parse($siswa->created_at)->diffForHumans() }}</td>
                            <td class="px-6 py-4 text-gray-900 text-center">{{ $siswa->sekolah->tipe_sekolah }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr class="bg-white">
                        <td colspan="5" class="px-6 py-4 text-center font-medium">Data Kosong</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <!-- Widget Notifikasi -->
    <div class="bg-white p-6 rounded-2xl shadow-lg mx-auto">
        <h2 class="text-2xl font-semibold text-gray-900 mb-6">Informasi Terbaru</h2>
        <ul class="space-y-6">
            <li class="flex space-x-4">
                <div
                    class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white drop-shadow-lg">
                    <i class="fa-solid fa-comment"></i>
                </div>
                <div>
                    <p class="text-gray-900 font-semibold">Fitur Percakapan Dengan AI - INDATAS</p>
                    <p class="text-gray-600 text-sm">Kamu Bisa Bertanya, Mengolah & Mencari Data Dengan Cepat.</p>
                    <p class="text-gray-400 text-xs mt-1">2 jam yang lalu</p>
                </div>
            </li>
            <li class="flex space-x-4">
                <div
                    class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center text-white drop-shadow-lg">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div>
                    <p class="text-gray-900 font-semibold">Peringatan: Data siswa belum lengkap</p>
                    <p class="text-gray-600 text-sm">Untuk Beberapa siswa Yang belum mengisi data orang tua.</p>
                    <p class="text-gray-400 text-xs mt-1">1 hari yang lalu</p>
                </div>
            </li>
        </ul>
    </div>

    <!-- Penjelasan Aplikasi -->
    <div
        class="mt-12 mx-auto p-8 bg-gradient-to-r from-blue-50 to-white border border-blue-200 rounded-3xl shadow-lg flex items-center space-x-6">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14 text-blue-600 flex-shrink-0" fill="none"
            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M13 16h-1v-4h-1m1-4h.01M12 3C6.48 3 2 7.48 2 13s4.48 10 10 10 10-4.48 10-10S17.52 3 12 3z" />
        </svg>
        <div>
            <h3 class="text-base md:text-xl font-semibold text-gray-900">Tentang Aplikasi</h3>
            <p class="mt-2 text-gray-700 leading-relaxed max-w-5xl text-xs md:text-base">
                Aplikasi ini merupakan platform digital interaktif yang menyajikan data pendidikan dari 34 provinsi di
                Indonesia secara visual dan terstruktur. Melalui tampilan dashboard modern, pengguna dapat dengan mudah
                melihat, membandingkan, dan menganalisis informasi utama setiap provinsi — termasuk jumlah sekolah, luas
                wilayah, populasi siswa, bahasa daerah, serta kondisi ekonomi setempat.

                Didukung dengan teknologi kecerdasan buatan (AI) dan tabel analitik dinamis, aplikasi ini tidak hanya
                menampilkan data, tetapi juga membantu dalam mengolah dan menafsirkan tren pendidikan secara otomatis.
                Dengan begitu, sekolah, dinas pendidikan, maupun pengambil kebijakan dapat memantau perkembangan
                pendidikan secara real-time dan membuat keputusan yang lebih tepat dan berbasis data.
            </p>
        </div>
    </div>

    <script>
        // Inisialisasi Chart.js
        const ctxClass = document.getElementById('classChart').getContext('2d');
        new Chart(ctxClass, {
            type: 'bar',
            data: {
                labels: ['1 days ago', '2 days ago', '3 days ago', '4 days ago', '5 days ago', '6 days ago'],
                datasets: [{
                    label: 'Jumlah Siswa',
                    data: {{ json_encode(array_slice($jumlah_per_hari, 1, 6)) }},
                    backgroundColor: 'rgba(59, 130, 246, 0.6)',
                    borderColor: 'rgba(59, 130, 246, 1)',
                    borderWidth: 1,
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        const ctxGender = document.getElementById('genderChart').getContext('2d');
        new Chart(ctxGender, {
            type: 'pie',
            data: {
                labels: ['Laki-laki', 'Perempuan'],
                datasets: [{
                    data: [{{ $count_male }}, {{ $count_female }}],
                    backgroundColor: ['rgba(59, 130, 246, 0.7)', 'rgba(236, 72, 153, 0.7)'],
                    borderColor: ['rgba(59, 130, 246, 1)', 'rgba(236, 72, 153, 1)'],
                    borderWidth: 1,
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: {
                                size: 14
                            },
                            color: '#374151'
                        }
                    }
                }
            }
        });
    </script>
</x-app-layout>