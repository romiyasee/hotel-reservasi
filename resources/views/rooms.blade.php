<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kamar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { display: flex; min-height: 100vh; flex-direction: column; }
        .sidebar { min-width: 250px; max-width: 250px; height: 100vh; position: fixed; background-color: #343a40; color: white; padding-top: 1rem; }
        .sidebar a { color: white; display: block; padding: 10px 20px; margin-bottom: 5px; border-radius:5px; text-decoration: none;}
        .sidebar a:hover { background-color: #495057; }
        .content { margin-left: 250px; padding: 2rem; flex:1;}
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h3 class="text-center">Admin Dashboard</h3>
        <hr class="text-white">
        <a href="{{ route('admin.dashboard') }}"><i class="bi bi-house-door"></i> Dashboard</a>
        <a href="{{ route('admin.users') }}"><i class="bi bi-people"></i> Kelola User</a>
        <a href="{{ route('admin.rooms') }}"><i class="bi bi-house"></i> Kelola Kamar</a>
        <a href="{{ route('admin.reservations') }}"><i class="bi bi-calendar-check"></i> Kelola Reservasi</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h2>Kelola Kamar</h2>
        <p>Tambah, edit, atau hapus data kamar hotel.</p>

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <button class="btn btn-success mb-3" onclick="addRoom()"><i class="bi bi-plus-circle"></i> Tambah Kamar</button>
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Nama Kamar</th>
                                <th>Tipe</th>
                                <th>Harga / Malam</th>
                                <th>Deskripsi</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rooms as $room)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $room->nama_kamar }}</td>
                                <td>{{ $room->tipe }}</td>
                                <td>Rp {{ number_format($room->harga,0,',','.') }}</td>
                                <td>{{ $room->deskripsi }}</td>
                                <td>
                                    @if($room->foto)
                                        <img src="{{ asset('storage/'.$room->foto) }}" alt="Foto" width="80">
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-warning" onclick="editRoom({{ $room->id }}, '{{ $room->nama_kamar }}', '{{ $room->tipe }}', {{ $room->harga }}, '{{ $room->deskripsi }}')">
                                        <i class="bi bi-pencil"></i> Edit
                                    </button>
                                    <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Apakah anda yakin ingin menghapus kamar ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah/Edit -->
    <div class="modal fade" id="roomModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <form method="POST" id="roomForm" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" id="method">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Tambah Kamar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nama Kamar</label>
                        <input type="text" name="nama_kamar" class="form-control" id="nama_kamar" required>
                    </div>
                    <div class="mb-3">
                        <label>Tipe</label>
                        <input type="text" name="tipe" class="form-control" id="tipe" required>
                    </div>
                    <div class="mb-3">
                        <label>Harga / Malam</label>
                        <input type="number" name="harga" class="form-control" id="harga" required>
                    </div>
                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" id="deskripsi"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Foto Kamar</label>
                        <input type="file" name="foto" class="form-control" id="foto">
                        @if(isset($room) && $room->foto)
                            <img src="{{ asset('storage/' . $room->foto) }}" alt="Foto Kamar" width="100" class="mt-2">
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </div>
        </form>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function addRoom(){
            document.getElementById('modalTitle').innerText = 'Tambah Kamar';
            document.getElementById('roomForm').action = '{{ route("admin.rooms.store") }}';
            document.getElementById('method').value = 'POST';
            document.getElementById('nama_kamar').value = '';
            document.getElementById('tipe').value = '';
            document.getElementById('harga').value = '';
            document.getElementById('deskripsi').value = '';
            var roomModal = new bootstrap.Modal(document.getElementById('roomModal'));
            roomModal.show();
        }

        function editRoom(id, nama, tipe, harga, deskripsi){
            document.getElementById('modalTitle').innerText = 'Edit Kamar';
            document.getElementById('roomForm').action = '/admin/rooms/' + id;
            document.getElementById('method').value = 'PUT';
            document.getElementById('nama_kamar').value = nama;
            document.getElementById('tipe').value = tipe;
            document.getElementById('harga').value = harga;
            document.getElementById('deskripsi').value = deskripsi;
            var roomModal = new bootstrap.Modal(document.getElementById('roomModal'));
            roomModal.show();
        }
    </script>
</body>
</html>
