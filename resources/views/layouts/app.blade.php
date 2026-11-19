
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Government Job Tracker')</title>

    <meta name="description" content="Government Job Application Tracking System">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    {{-- Font Awesome Icons --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <style>
        body {
            background: #f3f6fb;
            color: #263238;
            font-family: Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar */
        .main-navbar {
            background: linear-gradient(135deg, #0d47a1, #1565c0);
            box-shadow: 0 3px 12px rgba(0,0,0,.12);
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 21px;
            letter-spacing: .3px;
        }

        .navbar-nav .nav-link {
            color: rgba(255,255,255,.85);
            font-weight: 600;
            padding: 9px 15px;
            border-radius: 8px;
            margin-left: 5px;
            transition: .2s;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            background: rgba(255,255,255,.18);
            color: #fff;
        }

        /* Main Content */
        .main-content {
            width: 100%;
            max-width: 1500px;
            margin: auto;
            padding: 25px 20px;
            flex: 1;
        }

        .content-card {
            background: #fff;
            border-radius: 14px;
            padding: 24px;
            box-shadow: 0 3px 15px rgba(0,0,0,.05);
        }

        /* General Cards */
        .card {
            border-radius: 12px;
        }

        .card-header {
            border-radius: 12px 12px 0 0 !important;
        }

        /* Buttons */
        .btn {
            border-radius: 8px;
            font-weight: 600;
        }

        /* Tables */
        .table {
            vertical-align: middle;
        }

        .table thead th {
            background: #f1f5f9;
            white-space: nowrap;
        }

        /* Status Colors */
        .status-applied {
            background: #0d6efd;
        }

        .status-admit {
            background: #17a2b8;
        }

        .status-preliminary {
            background: #6f42c1;
        }

        .status-written {
            background: #fd7e14;
        }

        .status-viva {
            background: #ffc107;
            color: #000;
        }

        .status-selected {
            background: #198754;
        }

        .status-rejected {
            background: #dc3545;
        }

        /* Footer */
        .main-footer {
            background: #102a43;
            color: #dbe5ef;
            padding: 16px;
            text-align: center;
            font-size: 13px;
            margin-top: 25px;
        }

        /* Mobile */
        @media (max-width: 768px) {
            .main-content {
                padding: 15px 10px;
            }

            .content-card {
                padding: 14px;
            }

            .navbar-nav .nav-link {
                margin: 3px 0;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

{{-- Navigation Bar --}}
<nav class="navbar navbar-expand-lg navbar-dark main-navbar">
    <div class="container-fluid px-lg-4">

        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="fa-solid fa-briefcase me-2"></i>
            Job Tracker
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar"
                aria-controls="mainNavbar"
                aria-expanded="false"
                aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">

            <div class="navbar-nav ms-auto">

                <a class="nav-link {{ request()->routeIs('dashboard') || request()->is('/') ? 'active' : '' }}"
                   href="{{ url('/') }}">
                    <i class="fa-solid fa-house me-1"></i>
                    Dashboard
                </a>

                <a class="nav-link {{ request()->routeIs('jobs.index') || request()->routeIs('jobs.show') || request()->routeIs('jobs.edit') ? 'active' : '' }}"
                   href="{{ route('jobs.index') }}">
                    <i class="fa-solid fa-list me-1"></i>
                    All Jobs
                </a>

                <a class="nav-link {{ request()->routeIs('jobs.create') ? 'active' : '' }}"
                   href="{{ route('jobs.create') }}">
                    <i class="fa-solid fa-plus-circle me-1"></i>
                    Add Job
                </a>

                <a class="nav-link {{ request()->routeIs('jobs.calendar') ? 'active' : '' }}"
                   href="{{ route('jobs.calendar') }}">
                    <i class="fa-solid fa-calendar-days me-1"></i>
                    Calendar
                </a>

            </div>
        </div>

    </div>
</nav>

{{-- Success Message --}}
@if(session('success'))
    <div class="container-fluid px-lg-4 pt-3">
        <div class="alert alert-success alert-dismissible fade show shadow-sm"
             role="alert">

            <i class="fa-solid fa-circle-check me-2"></i>
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close">
            </button>
        </div>
    </div>
@endif

{{-- Main Content --}}
<main class="main-content">

    <div class="content-card">
        @yield('content')
    </div>

</main>

{{-- Footer --}}
<footer class="main-footer">
    <div>
        <i class="fa-solid fa-briefcase me-1"></i>
        Government Job Tracker
    </div>

    <div class="mt-1">
        Track Applications • Manage Exams • Follow Results
    </div>
</footer>

{{-- Bootstrap JavaScript --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')

</body>
</html>
