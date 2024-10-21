# Simple Dashboard

### Demo

[https://demos.adminmart.com/free/bootstrap/freedash-lite/src/html/index.html](https://demos.adminmart.com/free/bootstrap/freedash-lite/src/html/index.html)

### Contoh Modal & DataTables

ada di `resources/views/examples/halaman.blade.php`

### Contoh Notif SweetAlert2

session `error` menampilkan sweetalert error, session `errors` menampilkan alert rincian error (ada di atas card).

```sh
public function create(Request $request)
    {
        // Validasi

        DB::beginTransaction();
        try {

            // Logika

            DB::commit();
            return redirect()->back()->with('success', 'User Berhasil Di Tambahkan!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'User Gagal Di Tambahkan!')->withErrors(['errors' => $e->getMessage()]);
        }
    }
```

list session ada di `app.blade.php`

```sh
<script>
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: '{{ session('success') }}'
        })
    @elseif (session('error'))
        Swal.fire({
            icon: 'warning',
            title: '{{ session('error') }}'
        })
    @elseif (session('info'))
        Swal.fire({
            icon: 'info',
            title: '{{ session('info') }}'
        })
    @elseif (session('delete'))
        Swal.fire({
            icon: 'success',
            title: '{{ session('delete') }}'
        })
    @endif
</script>
```

### Contoh Konfirmasi SweetAlert2

Tombol (masukkan pada foreach data `<td>`) :

```sh
<form action="{{ route('user-destroy', $user->id) }}" method="POST" id="deleteForm{{ $user->id }}" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $user->id }})"><i class="bx bx-trash"></i></button>
</form>
```

Javascript :

```sh
<script>
    function confirmDelete(userId) {
        Swal.fire({
            title: 'Anda yakin?',
            text: "Data yang di hapus tidak dapat dikembalikan!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm' + userId).submit();
            }
        })
    }
</script>
```
