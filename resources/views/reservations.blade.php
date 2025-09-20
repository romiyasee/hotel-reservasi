<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Reservasi</title>
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

    <div class="content">
        <h2>Kelola Reservasi</h2>
        <p>Tambah, edit, atau hapus reservasi hotel.</p>

        <!-- Tambah Reservasi -->
        <a href="#" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addReservationModal">
            <i class="bi bi-plus-circle"></i> Tambah Reservasi
        </a>

        <!-- Tabel Reservasi -->
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Kamar</th>
                                <th>Check-in</th>
                                <th>Check-out</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservations as $reservation)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $reservation->user->username }}</td>
                                <td>{{ $reservation->room->nama_kamar }}</td>
                                <td>{{ $reservation->tanggal_checkin }}</td>
                                <td>{{ $reservation->tanggal_checkout }}</td>
                                <td>
                                    @if($reservation->status === 'confirmed')
                                        <span class="badge bg-success">Confirmed</span>
                                    @elseif($reservation->status === 'pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @else
                                        <span class="badge bg-danger">Cancelled</span>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-warning editBtn" 
                                        data-id="{{ $reservation->id }}"
                                        data-user="{{ $reservation->user_id }}"
                                        data-room="{{ $reservation->kamar_id }}"
                                        data-checkin="{{ $reservation->tanggal_checkin }}"
                                        data-checkout="{{ $reservation->tanggal_checkout }}"
                                        data-status="{{ $reservation->status }}"
                                        data-bs-toggle="modal" data-bs-target="#editReservationModal">
                                        <i class="bi bi-pencil"></i> Edit
                                    </button>

                                    <form action="{{ route('admin.reservations.destroy', $reservation->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus reservasi ini?')">
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

    <!-- Modal Tambah Reservasi -->
    <div class="modal fade" id="addReservationModal" tabindex="-1">
      <div class="modal-dialog">
        <form action="{{ route('admin.reservations.store') }}" method="POST">
          @csrf
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah Reservasi</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>User</label>
                    <select name="user_id" class="form-control" required>
                        @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->username }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Kamar</label>
                    <select name="kamar_id" class="form-control" required>
                        @foreach($rooms as $room)
                        <option value="{{ $room->id }}">{{ $room->nama_kamar }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Check-in</label>
                    <input type="date" name="tanggal_checkin" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Check-out</label>
                    <input type="date" name="tanggal_checkout" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Status</label>
                    <select name="status" class="form-control" required>
                        <option value="pending">Pending</option>
                        <option value="confirmed">Confirmed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- Modal Edit Reservasi -->
    <div class="modal fade" id="editReservationModal" tabindex="-1">
      <div class="modal-dialog">
        <form action="" method="POST" id="editForm">
          @csrf
          @method('PUT')
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Reservasi</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>User</label>
                    <select name="user_id" class="form-control" id="editUser" required>
                        @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->username }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Kamar</label>
                    <select name="kamar_id" class="form-control" id="editRoom" required>
                        @foreach($rooms as $room)
                        <option value="{{ $room->id }}">{{ $room->nama_kamar }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Check-in</label>
                    <input type="date" name="tanggal_checkin" class="form-control" id="editCheckin" required>
                </div>
                <div class="mb-3">
                    <label>Check-out</label>
                    <input type="date" name="tanggal_checkout" class="form-control" id="editCheckout" required>
                </div>
                <div class="mb-3">
                    <label>Status</label>
                    <select name="status" class="form-control" id="editStatus" required>
                        <option value="pending">Pending</option>
                        <option value="confirmed">Confirmed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Update</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script>
        // Inject data ke modal edit
        const editButtons = document.querySelectorAll('.editBtn');
        const editForm = document.getElementById('editForm');
        const editUser = document.getElementById('editUser');
        const editRoom = document.getElementById('editRoom');
        const editCheckin = document.getElementById('editCheckin');
        const editCheckout = document.getElementById('editCheckout');
        const editStatus = document.getElementById('editStatus');

        editButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                const id = btn.getAttribute('data-id');
                const userId = btn.getAttribute('data-user');
                const roomId = btn.getAttribute('data-room');
                const checkin = btn.getAttribute('data-checkin');
                const checkout = btn.getAttribute('data-checkout');
                const status = btn.getAttribute('data-status');

                editForm.action = `/admin/reservations/${id}`;
                editUser.value = userId;
                editRoom.value = roomId;
                editCheckin.value = checkin;
                editCheckout.value = checkout;
                editStatus.value = status;
            });
        });
    </script>
</body>
</html>

