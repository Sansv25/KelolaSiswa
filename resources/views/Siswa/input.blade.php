<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2:wght@400..800&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Jersey+25&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    @vite(['resources/css/form.css'])
    <title>{{ $title }}</title>
</head>

<body class="bg-white w-full max-w-260 mx-auto overflow-x-hidden">
    <div class="px-7 md:px-15 pt-5">
        <div class="mx-auto text-white -translate-y-65 animate-atas relative">
            <div class="bg-gradient-to-r from-sky-500 to-fuchsia-500 p-5 text-center">
                <h1 id="judul-form"
                    class="text-2xl md:text-4xl font-extrabold italic font-inter transition-opacity duration-1000 ease-in-out">
                    INPUT
                    DATA SISWA</h1>
                <h2 class="text-xs md:text-lg font-semibold font-inter">Silakan lengkapi semua data siswa dengan benar
                </h2>
                <div class="relative py-2">
                    <div id="progressBar"
                        class="h-1.5 md:h-2 bg-white rounded-full absolute transition-all duration-1000"></div>
                    <div class="h-1.5 md:h-2 bg-black/45 rounded-full"></div>
                </div>
                <h2 id="stepTitle" class="font-jersey text-lg md:text-2xl">Langkah 1 Dari 6</h2>
            </div>
            <div id="stepIndicator" class="flex justify-between items-center gap-3 md:mx-15 my-7 step-1-of-3">
                <svg class="w-40" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
                    <path
                        d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-240v-32q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v32q0 33-23.5 56.5T720-160H240q-33 0-56.5-23.5T160-240Zm80 0h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z" />
                </svg>
                <div class="relative w-full">
                    <div class="h-1 bg-primary rounded-full w-0 absolute transition-all duration-1000"></div>
                    <div class="h-1 bg-black/10 rounded-full"></div>
                </div>
                <svg class="w-40 transition-all duration-1000 delay-500" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 -960 960 960">
                    <path
                        d="M40-272q0-34 17.5-62.5T104-378q62-31 126-46.5T360-440q66 0 130 15.5T616-378q29 15 46.5 43.5T680-272v32q0 33-23.5 56.5T600-160H120q-33 0-56.5-23.5T40-240v-32Zm800 112H738q11-18 16.5-38.5T760-240v-40q0-44-24.5-84.5T666-434q51 6 96 20.5t84 35.5q36 20 55 44.5t19 53.5v40q0 33-23.5 56.5T840-160ZM360-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm400-160q0 66-47 113t-113 47q-11 0-28-2.5t-28-5.5q27-32 41.5-71t14.5-81q0-42-14.5-81T544-792q14-5 28-6.5t28-1.5q66 0 113 47t47 113ZM120-240h480v-32q0-11-5.5-20T580-306q-54-27-109-40.5T360-360q-56 0-111 13.5T140-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T440-640q0-33-23.5-56.5T360-720q-33 0-56.5 23.5T280-640q0 33 23.5 56.5T360-560Zm0 320Zm0-400Z" />
                </svg>
                <div class="relative w-full">
                    <div class="h-1 bg-primary rounded-full w-0 absolute transition-all duration-1000"></div>
                    <div class="h-1 bg-black/10 rounded-full"></div>
                </div>
                <svg class="w-40 transition-all duration-1000 delay-500" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 -960 960 960">
                    <path
                        d="M360-440h240q17 0 28.5-11.5T640-480q0-17-11.5-28.5T600-520H360q-17 0-28.5 11.5T320-480q0 17 11.5 28.5T360-440Zm0 120h240q17 0 28.5-11.5T640-360q0-17-11.5-28.5T600-400H360q-17 0-28.5 11.5T320-360q0 17 11.5 28.5T360-320Zm0 120h120q17 0 28.5-11.5T520-240q0-17-11.5-28.5T480-280H360q-17 0-28.5 11.5T320-240q0 17 11.5 28.5T360-200ZM240-80q-33 0-56.5-23.5T160-160v-640q0-33 23.5-56.5T240-880h287q16 0 30.5 6t25.5 17l194 194q11 11 17 25.5t6 30.5v447q0 33-23.5 56.5T720-80H240Zm480-520H580q-25 0-42.5-17.5T520-660v-140H240v640h480v-440ZM240-800v200-200 640-640Z" />
                </svg>
            </div>
        </div>
        <div class="mx-auto">
            <form action="{{ route('siswa.store') }}" method="POST">
                @csrf

                <!-- STEP 1 -->
                <div id="form-step-1" class="grid grid-cols-1 xl:grid-cols-2 gap-8 step-form active">
                    <div class="input-form animate-kiri -translate-x-[100vw]" style="animation-delay: 300ms;">
                        <label for="nis">NIS</label>
                        <input type="number" name="nis" id="nis" placeholder="NIS SISWA - 4 DIGIT">
                    </div>
                    <div class="input-form animate-kanan translate-x-[100vw]" style="animation-delay: 300ms;">
                        <label for="nisn">NISN</label>
                        <input type="number" name="nisn" id="nisn" placeholder="NISN SISWA - 12 DIGIT">
                    </div>
                    {{-- ASAL SEKOLAH --}}
                    <div class="input-form animate-kiri -translate-x-[100vw] z-40" style="animation-delay: 600ms;">
                        <label for="asal_sekolah">ASAL SEKOLAH</label>
                        <select name="asal_sekolah_id" id="asal_sekolah" class="hidden">
                            <option value="">-- Pilih Asal Sekolah --</option>
                            @foreach ($sekolah as $school)
                                <option value="{{ $school->id }}">{{ $school->nama_sekolah }}</option>
                            @endforeach
                        </select>

                        <div id="custom-asal_sekolah" class="relative w-full">
                            <button type="button"
                                class="custom-toggle w-full text-left border rounded-md p-2 flex items-center gap-3 bg-white">
                                <img class="custom-icon w-6 h-6 rounded-sm hidden" src="" alt="">
                                <span class="custom-text text-sm text-gray-700">-- Pilih Asal Sekolah --</span>
                                <svg class="ml-auto w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M6 9l6 6 6-6" />
                                </svg>
                            </button>

                            <ul
                                class="custom-options absolute z-999 pointer-events-auto mt-1 w-full bg-white border rounded-md shadow max-h-52 overflow-auto hidden">
                                @foreach ($sekolah as $school)
                                    <li data-value="{{ $school->id }}"
                                        class="flex items-center gap-3 p-2 hover:bg-gray-100 cursor-pointer">
                                        @if (!empty($school->gambar))
                                            <img src="{{ asset('storage/logo-sekolah/' . $school->gambar) }}"
                                                alt="{{ $school->nama_sekolah }}"
                                                class="w-6 h-6 rounded-sm object-cover aspect-square">
                                        @else
                                            <div
                                                class="w-6 h-6 bg-gray-200 rounded-sm flex items-center justify-center text-xs text-gray-600">
                                                S</div>
                                        @endif
                                        <span class="text-sm text-gray-800">{{ $school->nama_sekolah }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="input-form animate-kanan translate-x-[100vw]" style="animation-delay: 600ms;">
                        <label for="nik">NIK</label>
                        <input type="number" name="nik" id="nik"
                            placeholder="NOMOR INDUK KEPENDUDUKAN SISWA">
                    </div>
                    <div class="input-form animate-kiri -translate-x-[100vw] " style="animation-delay: 900ms;">
                        <label for="siswa_namalengkap">NAMA - LENGKAP</label>
                        <input type="text" name="siswa_namalengkap" id="siswa_namalengkap"
                            placeholder="NAMA LENGKAP SISWA">
                    </div>
                    <div class="input-form animate-kanan translate-x-[100vw]" style="animation-delay: 900ms;">
                        <label for="siswa_namapangilan">NAMA - PANGGILAN</label>
                        <input type="text" name="siswa_namapangilan" id="siswa_namapangilan"
                            placeholder="NAMA PANGGILAN SISWA">
                    </div>
                    <div class="input-form animate-kiri -translate-x-[100vw]" style="animation-delay: 1200ms;">
                        <label for="tempatlahir">TEMPAT LAHIR</label>
                        <input type="text" name="tempatlahir" id="tempatlahir" placeholder="TEMPAT  LAHIR SISWA">
                    </div>
                    <div class="input-form animate-kanan translate-x-[100vw]" style="animation-delay: 1200ms;">
                        <label for="tanggallahir">TANGGAL LAHIR</label>
                        <input type="date" name="tanggallahir" id="tanggallahir"
                            placeholder="NAMA PANGGILAN SISWA">
                    </div>
                    <div class="input-form animate-kiri -translate-x-[100vw]" style="animation-delay: 1500ms;">
                        <label for="agama">AGAMA</label>
                        <select name="agama" id="agama">
                            <option value="" disabled selected>-- Pilih Agama --</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                    <div class="input-form animate-kanan translate-x-[100vw] radio" style="animation-delay: 1500ms;">
                        <label>JENIS KELAMIN</label>
                        <div class="flex gap-6 items-center mx-6 h-12.5">
                            <label class="flex items-center gap-5 cursor-pointer w-full self-center"
                                style="margin-bottom: 0;">
                                <input type="radio" name="jenis_kelamin" id="laki" value="Laki-laki"
                                    class="peer mr-2">
                                <span>Laki-laki</span>
                            </label>
                            <label class="flex items-center cursor-pointer w-1/2" style="margin-bottom: 0;">
                                <input type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan"
                                    class="peer mr-2">
                                <span>Perempuan</span>
                            </label>
                        </div>
                    </div>
                </div>
                <!-- STEP 2 -->
                <div id="form-step-2" class="grid grid-cols-1 xl:grid-cols-2 gap-8 step-form">
                    <div class="input-form animate-kiri -translate-x-[100vw]" style="animation-delay: 300ms;">
                        <label for="ntlp_siswa">NO TELPON - SISWA</label>
                        <input type="text" name="ntlp_siswa" id="ntlp_siswa" placeholder="08xx-xxxx-xxxx">
                    </div>
                    <div class="input-form animate-kanan translate-x-[100vw]" style="animation-delay: 300ms;">
                        <label for="kelas" class="block text-sm font-medium text-gray-700 mb-1">KELAS</label>
                        <select name="kelas" id="kelas">
                            <option disabled selected>-- Pilih Kelas --</option>
                            @foreach ([
                                    1 => 'I',
                                    2 => 'II',
                                    3 => 'III',
                                    4 => 'IV',
                                    5 => 'V',
                                    6 => 'VI',
                                    7 => 'VII',
                                    8 => 'VIII',
                                    9 => 'IX',
                                    10 => 'X',
                                    11 => 'XI',
                                    12 => 'XII',
                                ] as $num => $romawi)
                                <option value="{{ $num }}" {{ old('kelas') == $num ? 'selected' : '' }}>
                                    {{ $romawi }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-form animate-kiri -translate-x-[100vw]" style="animation-delay: 600ms;">
                        <label for="jurusan">JURUSAN</label>
                        <input type="text" name="jurusan" id="jurusan"
                            placeholder="JURUSAN SISWA JIKA SMA/SMK">
                    </div>
                    <div class="input-form animate-kanan translate-x-[100vw]" style="animation-delay: 600ms;">
                        <label for="kecamatan">KECAMATAN</label>
                        <input type="text" name="kecamatan" id="kecamatan"
                            placeholder="KECAMATAN TEMPAT TINGGAL SISWA">
                    </div>
                    <div class="input-form animate-kiri -translate-x-[100vw]" style="animation-delay: 900ms;">
                        <label for="kabupaten">KABUPATEN</label>
                        <input type="text" name="kabupaten" id="kabupaten"
                            placeholder="KABUPATEN TEMPAT TINGGAL SISWA">
                    </div>
                    {{-- PROVINSI --}}
                    <div class="input-form animate-kanan translate-x-[100vw]" style="animation-delay: 900ms;">
                        <label for="provinsi">PROVINSI</label>
                        <select name="asal_provinsi_id" id="provinsi" class="hidden">
                            <option value="">-- Pilih Provinsi --</option>
                            @foreach ($provinsi as $prov)
                                <option value="{{ $prov->id }}">{{ $prov->nama }}</option>
                            @endforeach
                        </select>

                        <div id="custom-provinsi" class="relative w-full">
                            <button type="button"
                                class="custom-toggle w-full text-left border rounded-md p-2 flex items-center gap-3 bg-white">
                                <span class="custom-text text-sm text-gray-700">-- Pilih Provinsi --</span>
                                <svg class="ml-auto w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M6 9l6 6 6-6" />
                                </svg>
                            </button>

                            <ul
                                class="custom-options absolute z-999 pointer-events-auto mt-1 w-full bg-white border rounded-md shadow max-h-52 overflow-auto hidden">
                                @foreach ($provinsi as $prov)
                                    <li data-value="{{ $prov->id }}"
                                        class="p-2 hover:bg-gray-100 cursor-pointer text-sm text-gray-800">
                                        {{ $prov->nama }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="input-form xl:col-span-2 animate-kiri -translate-x-[100vw]"
                        style="animation-delay: 1200ms;">
                        <label for="alamat">ALAMAT LENGKAP</label>
                        <textarea name="alamat" id="alamat" rows="4" placeholder="ALAMAT LENGKAP SISWA"></textarea>
                    </div>
                </div>
                <!-- STEP 3 -->
                <div id="form-step-3" class="grid grid-cols-1 xl:grid-cols-2 gap-8 step-form">
                    <div class="input-form animate-kiri -translate-x-[100vw]" style="animation-delay: 300ms;">
                        <label for="nama_ayah">NAMA AYAH</label>
                        <input type="text" name="nama_ayah" id="nama_ayah" placeholder="NAMA LENGKAP AYAH">
                    </div>
                    <div class="input-form animate-kanan translate-x-[100vw]" style="animation-delay: 300ms;">
                        <label for="pekerjaan_ayah">PEKERJAAN AYAH</label>
                        <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah"
                            placeholder="PROFESI ATAU BIDANG KERJA AYAH">
                    </div>
                    <div class="input-form animate-kiri -translate-x-[100vw]" style="animation-delay: 600ms;">
                        <label for="penghasilan_ayah">PENGHASILAN AYAH</label>
                        <input type="text" name="penghasilan_ayah" id="penghasilan_ayah"
                            placeholder="PENGHASILAN AYAH PERBULAN (RUPIAH)">
                    </div>
                    <div class="input-form animate-kanan translate-x-[100vw]" style="animation-delay: 600ms;">
                        <label for="nama_ibu">NAMA IBU</label>
                        <input type="text" name="nama_ibu" id="nama_ibu" placeholder="NAMA LENGKAP IBU">
                    </div>
                    <div class="input-form animate-kiri -translate-x-[100vw]" style="animation-delay: 900ms;">
                        <label for="pekerjaan_ibu">PEKERJAAN IBU</label>
                        <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu"
                            placeholder="PROFESI ATAU BIDANG KERJA IBU">
                    </div>
                    <div class="input-form animate-kanan translate-x-[100vw]" style="animation-delay: 900ms;">
                        <label for="penghasilan_ibu">PENGHASILAN IBU</label>
                        <input type="text" name="penghasilan_ibu" id="penghasilan_ibu"
                            placeholder="PENGHASILAN IBU PERBULAN (RUPIAH)">
                    </div>
                    <div class="input-form animate-kiri -translate-x-[100vw]" style="animation-delay: 1200ms;">
                        <label for="ntlp_ortu">NO TELPON - ORANG TUA</label>
                        <input type="text" name="ntlp_ortu" id="ntlp_ortu" placeholder="08xx-xxxx-xxxx">
                    </div>
                    <div class="input-form animate-kanan translate-x-[100vw]" style="animation-delay: 1200ms;">
                        <label for="no_kk">NO-KK</label>
                        <input type="number" name="no_kk" id="no_kk" placeholder="NO KARTU KELUARGA">
                    </div>
                </div>
                <!-- STEP 4 -->
                <div id="form-step-4" class="grid grid-cols-1 xl:grid-cols-2 gap-8 step-form">
                    <div class="input-form animate-kiri -translate-x-[100vw]" style="animation-delay: 300ms;">
                        <label for="golongan_darah">GOLONGAN DARAH</label>
                        <select name="golongan_darah" id="golongan_darah">
                            <option value="">-- Pilih Golongan Darah --</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                    </div>
                    <div class="input-form animate-kanan translate-x-[100vw]" style="animation-delay: 300ms;">
                        <label for="tinggi_badan">TINGGI BADAN</label>
                        <input type="text" name="tinggi_badan" id="tinggi_badan"
                            placeholder="ASAL SEKOLAH SISWA">
                    </div>
                    <div class="input-form animate-kiri -translate-x-[100vw]" style="animation-delay: 600ms;">
                        <label for="berat_badan">BERAT BADAN</label>
                        <input type="number" name="berat_badan" id="berat_badan"
                            placeholder="BERAT BADAN SISWA">
                    </div>
                    <div class="input-form animate-kanan translate-x-[100vw]" style="animation-delay: 600ms;">
                        <label for="hobi">HOBI</label>
                        <input type="text" name="hobi" id="hobi" placeholder="HOBI SISWA">
                    </div>
                    <div class="input-form animate-kiri -translate-x-[100vw]" style="animation-delay: 900ms;">
                        <label for="cita_cita">CITA - CITA</label>
                        <input type="text" name="cita_cita" id="cita_cita" placeholder="CITA - CITA SISWA">
                    </div>
                    <div class="input-form animate-kanan translate-x-[100vw]" style="animation-delay: 900ms;">
                        <label for="siswa_anak_ke">SISWA - ANAK KE</label>
                        <input type="number" name="siswa_anak_ke" id="siswa_anak_ke" placeholder="SISWA ANAK KE *">
                    </div>
                    <div class="input-form animate-kiri -translate-x-[100vw]" style="animation-delay: 1200ms;">
                        <label for="kewarganegaraan">KEWARGANEGARAAN SISWA</label>
                        <select id="kewarganegaraan" name="kewarganegaraan" onchange="toggleInput(this.value)">
                            <option value="">-- Pilih Kewarganegaraan --</option>
                            <option value="Brunei">Brunei Darussalam</option>
                            <option value="Cambodia">Kamboja</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Laos">Laos</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Myanmar">Myanmar</option>
                            <option value="Philippines">Filipina</option>
                            <option value="Singapore">Singapura</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Vietnam">Vietnam</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div id="negaralainnya" class="input-form animate-kanan translate-x-[100vw]"
                        style="animation-delay: 1200ms; display: none;">
                        <label for="kewarganegaraan_lain">KEWARGANEGARAAN SISWA - LAINNYA</label>
                        <input type="text" id="kewarganegaraan_lain" name="kewarganegaraan_lain"
                            placeholder="Contoh: Jepang" data-optional="true">
                    </div>
                    <script>
                        function toggleInput(value) {
                            const inputDiv = document.getElementById('negaralainnya');
                            if (value === 'lainnya') { // Diperbaiki: Match dengan value="lainnya"
                                inputDiv.style.display = 'block';
                            } else {
                                inputDiv.style.display = 'none';
                            }
                        }
                    </script>
                </div>
            </form>
        </div>
        <div class="overflow-y-hidden mt-10 pb-5">
            <div class="flex justify-between mx-auto text-lg md:text-2xl font-jersey translate-y-18 animate-bawah"
                style="animation-delay: 2000ms;">
                <button id="prevBtn" class="border p-2 rounded-md flex items-center button-prev-disabled">
                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
                        <path
                            d="m142-480 294 294q15 15 14.5 35T435-116q-15 15-35 15t-35-15L57-423q-12-12-18-27t-6-30q0-15 6-30t18-27l308-308q15-15 35.5-14.5T436-844q15 15 15 35t-15 35L142-480Z" />
                    </svg>
                    SEBELUMNYA
                </button>
                <button id="nextBtn"
                    class="border p-2 rounded-md flex items-center bg-primary text-white fill-white">
                    Selanjutnya
                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
                        <path
                            d="M579-480 285-774q-15-15-14.5-35.5T286-845q15-15 35.5-15t35.5 15l307 308q12 12 18 27t6 30q0 15-6 30t-18 27L356-115q-15 15-35 14.5T286-116q-15-15-15-35.5t15-35.5l293-293Z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    @vite(['resources/js/form.js'])
    <a href="/table" id="homebutton"
        class="fixed bottom-10 right-10 bg-blue-500 h-15 w-15 justify-center flex items-center rounded-full">
        <i class="fa-solid fa-house fa-xl text-white"></i>
    </a>

</body>

</html>
