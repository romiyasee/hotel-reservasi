<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .sidebar {
            min-width: 250px;
            max-width: 250px;
            height: 100vh;
            position: fixed;
            background-color: #343a40;
            color: white;
            padding-top: 1rem;
            transition: all 0.3s;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 10px 20px;
            margin-bottom: 5px;
            border-radius: 5px;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .sidebar a i {
            margin-right: 10px;
        }
        .content {
            margin-left: 250px;
            padding: 2rem;
            flex: 1;
            transition: margin-left 0.3s;
        }
        .toggle-btn {
            position: absolute;
            top: 15px;
            left: 260px;
            font-size: 1.5rem;
            cursor: pointer;
            color: #343a40;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <h3 class="text-center">Admin Dashboard</h3>
        <hr class="text-white">
        <a href="{{ route('admin.dashboard') }}"><i class="bi bi-house-door"></i> Dashboard</a>
        <a href="{{ route('admin.users') }}"><i class="bi bi-people"></i>Kelola User</a>
        <a href="{{ route('admin.rooms') }}"><i class="bi bi-house-door"></i>Kelola Kamar</a>
        <a href="{{ route('admin.reservations') }}"><i class="bi bi-calendar-check"></i>Kelola Reservasi</a>
        <a href=""
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="bi bi-box-arrow-right"></i>Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>


    <!-- Toggle Sidebar -->
    

    <!-- Main Content -->
    <div class="content" id="main-content">
        <div class="container-fluid">
            <h2>Selamat Datang, {{ auth()->user()->username }}</h2>
            <p>Ini adalah halaman khusus admin untuk mengelola data hotel.</p>

            <!-- Dashboard Cards -->
            <div class="row mt-4 g-4">
                <div class="col-md-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title"><i class="bi bi-people-fill"></i> Users</h5>
                                <p class="card-text">Kelola data user hotel.</p>
                            </div>
                            <a href="{{ route('admin.users') }}" class="btn btn-primary mt-3">Kelola <i class="bi bi-arrow-right-circle"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title"><i class="bi bi-house-fill"></i> Kamar</h5>
                                <p class="card-text">Kelola data kamar hotel.</p>
                            </div>
                            <a href="{{ route('admin.rooms') }}" class="btn btn-success mt-3">Kelola <i class="bi bi-arrow-right-circle"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title"><i class="bi bi-calendar-check-fill"></i> Reservasi</h5>
                                <p class="card-text">Kelola reservasi yang masuk.</p>
                            </div>
                            <a href="{{ route('admin.reservations') }}" class="btn btn-warning mt-3">Kelola <i class="bi bi-arrow-right-circle"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabel Reservasi -->
            <div class="mt-5">
                <h4>Daftar Reservasi Terbaru</h4>
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Nama User</th>
                                <th>Kamar</th>
                                <th>Check-in</th>
                                <th>Check-out</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>Suite A</td>
                                <td>2025-09-15</td>
                                <td>2025-09-18</td>
                                <td><span class="badge bg-success">Confirmed</span></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jane Smith</td>
                                <td>Deluxe B</td>
                                <td>2025-09-16</td>
                                <td>2025-09-17</td>
                                <td><span class="badge bg-warning text-dark">Pending</span></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Bob Johnson</td>
                                <td>Standard C</td>
                                <td>2025-09-20</td>
                                <td>2025-09-22</td>
                                <td><span class="badge bg-danger">Cancelled</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle Sidebar
        const toggleBtn = document.getElementById('toggle-btn');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            if(sidebar.classList.contains('collapsed')) {
                sidebar.style.width = '80px';
                mainContent.style.marginLeft = '80px';
            } else {
                sidebar.style.width = '250px';
                mainContent.style.marginLeft = '250px';
            }
        });
    </script>
</body>
</html>
