<x-app-layout :title="'Edit Data Siswa'">
    <form method="POST" action="{{ route('siswa.update', $siswa->id) }}">
    @csrf
    @method('PUT')

    <!-- Data Identitas Dasar -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4 border-b-2 border-blue-500 pb-2">Data Identitas Dasar</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="nis" class="block text-sm font-medium text-gray-700">NIS</label>
                    <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="nis" name="nis" value="{{ old('nis', $siswa->nis) }}" required>
                </div>
                <div>
                    <label for="nisn" class="block text-sm font-medium text-gray-700">NISN</label>
                    <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="nisn" name="nisn" value="{{ old('nisn', $siswa->nisn) }}" required>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <div>
                    <label for="no_kk" class="block text-sm font-medium text-gray-700">No. KK</label>
                    <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="no_kk" name="no_kk" value="{{ old('no_kk', $siswa->no_kk) }}" required>
                </div>
                <div>
                    <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                    <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="nik" name="nik" value="{{ old('nik', $siswa->nik) }}" required>
                </div>
            </div>
            <div class="mt-4">
                <label for="asal_sekolah_id" class="block text-sm font-medium text-gray-700">Asal Sekolah</label>
                <select class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="asal_sekolah_id" name="asal_sekolah_id" required>
                    <option value="">Pilih Sekolah</option>
                    @foreach($sekolah as $sek)
                        <option value="{{ $sek->id }}" {{ old('asal_sekolah_id', $siswa->asal_sekolah_id) == $sek->id ? 'selected' : '' }}>{{ $sek->nama_sekolah }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Nama dan Data Pribadi -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4 border-b-2 border-blue-500 pb-2">Nama dan Data Pribadi</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="siswa_namalengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="siswa_namalengkap" name="siswa_namalengkap" value="{{ old('siswa_namalengkap', $siswa->siswa_namalengkap) }}" required>
                </div>
                <div>
                    <label for="siswa_namapangilan" class="block text-sm font-medium text-gray-700">Nama Panggilan</label>
                    <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="siswa_namapangilan" name="siswa_namapangilan" value="{{ old('siswa_namapangilan', $siswa->siswa_namapangilan) }}" required>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                <div>
                    <label for="tempatlahir" class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                    <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="tempatlahir" name="tempatlahir" value="{{ old('tempatlahir', $siswa->tempatlahir) }}" required>
                </div>
                <div>
                    <label for="tanggallahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                    <input type="date" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="tanggallahir" name="tanggallahir" value="{{ old('tanggallahir', $siswa->tanggallahir) }}" required>
                </div>
                <div>
                    <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                    <select class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="">Pilih</option>
                        <option value="Laki-laki" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="mt-4">
                <label for="agama" class="block text-sm font-medium text-gray-700">Agama</label>
                <select class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="agama" name="agama" required>
                    <option value="">Pilih Agama</option>
                    <option value="Islam" {{ old('agama', $siswa->agama) == 'Islam' ? 'selected' : '' }}>Islam</option>
                    <option value="Kristen" {{ old('agama', $siswa->agama) == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                    <option value="Katolik" {{ old('agama', $siswa->agama) == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                    <option value="Hindu" {{ old('agama', $siswa->agama) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="Buddha" {{ old('agama', $siswa->agama) == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                    <option value="Konghucu" {{ old('agama', $siswa->agama) == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                </select>
            </div>
        </div>

        <!-- Pendidikan -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4 border-b-2 border-blue-500 pb-2">Pendidikan</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                    <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="kelas" name="kelas" value="{{ old('kelas', $siswa->kelas) }}" required>
                </div>
                <div>
                    <label for="jurusan" class="block text-sm font-medium text-gray-700">Jurusan</label>
                    <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="jurusan" name="jurusan" value="{{ old('jurusan', $siswa->jurusan) }}">
                </div>
            </div>
        </div>

        <!-- Kontak -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4 border-b-2 border-blue-500 pb-2">Kontak</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="ntlp_siswa" class="block text-sm font-medium text-gray-700">No. Telepon Siswa</label>
                    <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="ntlp_siswa" name="ntlp_siswa" value="{{ old('ntlp_siswa', $siswa->ntlp_siswa) }}">
                </div>
                <div>
                    <label for="ntlp_ortu" class="block text-sm font-medium text-gray-700">No. Telepon Orang Tua</label>
                    <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="ntlp_ortu" name="ntlp_ortu" value="{{ old('ntlp_ortu', $siswa->ntlp_ortu) }}">
                </div>
            </div>
        </div>

        <!-- Alamat Lengkap -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4 border-b-2 border-blue-500 pb-2">Alamat Lengkap</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="kecamatan" class="block text-sm font-medium text-gray-700">Kecamatan</label>
                    <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="kecamatan" name="kecamatan" value="{{ old('kecamatan', $siswa->kecamatan) }}" required>
                </div>
                <div>
                    <label for="kabupaten" class="block text-sm font-medium text-gray-700">Kabupaten</label>
                    <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="kabupaten" name="kabupaten" value="{{ old('kabupaten', $siswa->kabupaten) }}" required>
                </div>
                <div>
                    <label for="asal_provinsi_id" class="block text-sm font-medium text-gray-700">Provinsi</label>
                    <select class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="asal_provinsi_id" name="asal_provinsi_id" required>
                        <option value="">Pilih Provinsi</option>
                        @foreach($provinsi as $prov)
                            <option value="{{ $prov->id }}" {{ old('asal_provinsi_id', $siswa->asal_provinsi_id) == $prov->id ? 'selected' : '' }}>{{ $prov->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mt-4">
                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                <textarea class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $siswa->alamat) }}</textarea>
            </div>
        </div>

        <!-- Data Orang Tua -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4 border-b-2 border-blue-500 pb-2">Data Orang Tua</h2>
            <h3 class="text-lg font-medium text-gray-600 mb-2">Ayah</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="nama_ayah" class="block text-sm font-medium text-gray-700">Nama Ayah</label>
                    <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="nama_ayah" name="nama_ayah" value="{{ old('nama_ayah', $siswa->nama_ayah) }}" required>
                </div>
                <div>
                    <label for="pekerjaan_ayah" class="block text-sm font-medium text-gray-700">Pekerjaan Ayah</label>
                    <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="pekerjaan_ayah" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah', $siswa->pekerjaan_ayah) }}" required>
                </div>
                <div>
                    <label for="penghasilan_ayah" class="block text-sm font-medium text-gray-700">Penghasilan Ayah</label>
                    <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="penghasilan_ayah" name="penghasilan_ayah" value="{{ old('penghasilan_ayah', $siswa->penghasilan_ayah) }}" required>
                </div>
            </div>
            <h3 class="text-lg font-medium text-gray-600 mb-2 mt-4">Ibu</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="nama_ibu" class="block text-sm font-medium text-gray-700">Nama Ibu</label>
                    <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="nama_ibu" name="nama_ibu" value="{{ old('nama_ibu', $siswa->nama_ibu) }}" required>
                </div>
                <div>
                    <label for="pekerjaan_ibu" class="block text-sm font-medium text-gray-700">Pekerjaan Ibu</label>
                    <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="pekerjaan_ibu" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu', $siswa->pekerjaan_ibu) }}" required>
                </div>
                <div>
                    <label for="penghasilan_ibu" class="block text-sm font-medium text-gray-700">Penghasilan Ibu</label>
                    <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="penghasilan_ibu" name="penghasilan_ibu" value="{{ old('penghasilan_ibu', $siswa->penghasilan_ibu) }}" required>
                </div>
            </div>
        </div>
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4 border-b-2 border-blue-500 pb-2">Data Tambahan</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label for="golongan_darah" class="block text-sm font-medium text-gray-700">Golongan Darah</label>
                    <select class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="golongan_darah" name="golongan_darah">
                        <option value="">Pilih</option>
                        <option value="A" {{ old('golongan_darah', $siswa->golongan_darah) == 'A' ? 'selected' : '' }}>A</option>
                        <option value="B" {{ old('golongan_darah', $siswa->golongan_darah) == 'B' ? 'selected' : '' }}>B</option>
                        <option value="AB" {{ old('golongan_darah', $siswa->golongan_darah) == 'AB' ? 'selected' : '' }}>AB</option>
                        <option value="O" {{ old('golongan_darah', $siswa->golongan_darah) == 'O' ? 'selected' : '' }}>O</option>
                    </select>
                </div>
                <div>
                    <label for="tinggi_badan" class="block text-sm font-medium text-gray-700">Tinggi Badan (cm)</label>
                    <input type="number" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="tinggi_badan" name="tinggi_badan" value="{{ old('tinggi_badan', $siswa->tinggi_badan) }}">
                </div>
                <div>
                    <label for="berat_badan" class="block text-sm font-medium text-gray-700">Berat Badan (kg)</label>
                    <input type="number" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="berat_badan" name="berat_badan" value="{{ old('berat_badan', $siswa->berat_badan) }}">
                </div>
                <div>
                    <label for="siswa_anak_ke" class="block text-sm font-medium text-gray-700">Anak Ke</label>
                    <input type="number" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="siswa_anak_ke" name="siswa_anak_ke" value="{{ old('siswa_anak_ke', $siswa->siswa_anak_ke) }}">
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <div>
                    <label for="hobi" class="block text-sm font-medium text-gray-700">Hobi</label>
                    <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="hobi" name="hobi" value="{{ old('hobi', $siswa->hobi) }}">
                </div>
                <div>
                    <label for="cita_cita" class="block text-sm font-medium text-gray-700">Cita-cita</label>
                    <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="cita_cita" name="cita_cita" value="{{ old('cita_cita', $siswa->cita_cita) }}">
                </div>
            </div>
        </div>

        <!-- Kewarganegaraan -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4 border-b-2 border-blue-500 pb-2">Kewarganegaraan</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="kewarganegaraan" class="block text-sm font-medium text-gray-700">Kewarganegaraan</label>
                    <select class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="kewarganegaraan" name="kewarganegaraan">
                        <option value="">-- Pilih Kewarganegaraan --</option>
                        <option value="Brunei" {{ old('kewarganegaraan', $siswa->kewarganegaraan) == 'Brunei' ? 'selected' : '' }}>Brunei Darussalam</option>
                        <option value="Cambodia" {{ old('kewarganegaraan', $siswa->kewarganegaraan) == 'Cambodia' ? 'selected' : '' }}>Kamboja</option>
                        <option value="Indonesia" {{ old('kewarganegaraan', $siswa->kewarganegaraan) == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
                        <option value="Laos" {{ old('kewarganegaraan', $siswa->kewarganegaraan) == 'Laos' ? 'selected' : '' }}>Laos</option>
                        <option value="Malaysia" {{ old('kewarganegaraan', $siswa->kewarganegaraan) == 'Malaysia' ? 'selected' : '' }}>Malaysia</option>
                        <option value="Myanmar" {{ old('kewarganegaraan', $siswa->kewarganegaraan) == 'Myanmar' ? 'selected' : '' }}>Myanmar</option>
                        <option value="Philippines" {{ old('kewarganegaraan', $siswa->kewarganegaraan) == 'Philippines' ? 'selected' : '' }}>Filipina</option>
                        <option value="Singapore" {{ old('kewarganegaraan', $siswa->kewarganegaraan) == 'Singapore' ? 'selected' : '' }}>Singapura</option>
                        <option value="Thailand" {{ old('kewarganegaraan', $siswa->kewarganegaraan) == 'Thailand' ? 'selected' : '' }}>Thailand</option>
                        <option value="Vietnam" {{ old('kewarganegaraan', $siswa->kewarganegaraan) == 'Vietnam' ? 'selected' : '' }}>Vietnam</option>
                        <option value="lainnya" {{ old('kewarganegaraan', $siswa->kewarganegaraan) == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>
                <div>
                    <label for="kewarganegaraan_lain" class="block text-sm font-medium text-gray-700">Kewarganegaraan Lain</label>
                    <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="kewarganegaraan_lain" name="kewarganegaraan_lain" value="{{ old('kewarganegaraan_lain', $siswa->kewarganegaraan_lain) }}">
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Update
            </button>
        </div>
    </form>
</div>
</x-app-layout>