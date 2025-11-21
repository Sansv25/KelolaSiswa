<table class="min-w-[640px] w-full text-sm text-left text-black">
    <thead class="text-white uppercase bg-blue-400">
        <tr>
            <th class="px-4 py-3 text-center whitespace-nowrap">No</th>
            <th class="px-4 py-3 whitespace-nowrap">NISN</th>
            <th class="px-4 py-3 whitespace-nowrap">Nama</th>
            <th class="px-4 py-3 whitespace-nowrap text-center">Sekolah</th>
            <th class="px-4 py-3 whitespace-nowrap text-center">Kelas - Jurusan</th>
            <th class="px-4 py-3 text-center whitespace-nowrap">Action</th>
        </tr>
    </thead>
    <tbody></tbody>
    @if (isset($siswas) && $siswas->count() > 0)
        @foreach ($siswas as $siswa)
            <tr onclick="window.location.href='/siswa/nisn/{{ $siswa->nisn }}'"
                class="cursor-pointer odd:bg-white even:bg-blue-100 border-b border-gray-200 hover:bg-blue-200 transition">
                <td class="py-4 px-4 text-center whitespace-nowrap">
                    {{ $loop->iteration + ($siswas->currentPage() - 1) * $siswas->perPage() }}
                </td>
                <td class="px-4 py-4 whitespace-nowrap">{{ $siswa->nisn ?? '-' }}</td>
                <td class="px-4 py-4 font-bold whitespace-nowrap">
                    {{ $siswa->siswa_namalengkap ?? '-' }}
                </td>
                <td class="px-4 py-4 whitespace-nowrap text-center">
                    {{ $siswa->sekolah->nama_sekolah ?? '-' }}
                </td>
                <td class="px-4 py-4 whitespace-nowrap text-center">
                    {{ $siswa->kelas ?? '-' }} {{ $siswa->jurusan ? '- ' . $siswa->jurusan : '' }}
                </td>
                <td class="px-4 py-4 whitespace-nowrap z-40">
                    <div class="flex items-center justify-evenly">
                        <a href="/siswa/edit/{{ $siswa->id }}" onclick="event.stopPropagation()" title="Edit">
                            <i class="fa-solid fa-pen-to-square fa-xl text-green-500 hover:text-green-700"></i>
                        </a>
                        <!-- Tombol Hapus -->
                        <button type="button" onclick="event.stopPropagation(); confirmDelete({{ $siswa->id }}, '{{ $siswa->siswa_namapangilan }}')" title="Hapus"
                            class="bg-transparent border-none p-0">
                            <i class="fa-solid fa-trash fa-xl text-red-500 hover:text-red-700"></i>
                        </button>

                        <!-- Form tersembunyi -->
                        <form id="delete-form-{{ $siswa->id }}" method="POST" action="{{ route('siswa.destroy', $siswa->id) }}"
                            style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>

                    </div>
                </td>
            </tr>
        @endforeach
    @else
        <tr class="bg-white">
            <td colspan="6" class="px-4 py-4 text-center font-medium">Data Kosong</td>
        </tr>
    @endif
    </tbody>
</table>
@if ($siswas->hasPages())
    <div class="m-5">
    {{ $siswas->links() ?? '' }}
</div>
@endif


<script>
function confirmDelete(id, namapanggilan) {
    Swal.fire({
        title: 'Yakin ingin menghapus ' + namapanggilan + '?',
        text: "Data tidak bisa dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    });
}
</script>


