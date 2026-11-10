<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Job Tracker')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body{
            background:#f4f6f9;
        }

        .navbar-brand{
            font-weight:700;
        }

        .content-card{
            background:#fff;
            border-radius:12px;
            padding:20px;
            box-shadow:0 2px 10px rgba(0,0,0,.08);
        }

        .status-applied{
            background:#0d6efd;
        }

        .status-admit{
            background:#17a2b8;
        }

        .status-preliminary{
            background:#6f42c1;
        }

        .status-written{
            background:#fd7e14;
        }

        .status-viva{
            background:#ffc107;
            color:#000;
        }

        .status-selected{
            background:#198754;
        }

        .status-rejected{
            background:#dc3545;
        }
    </style>

    @stack('styles')
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">

        <a class="navbar-brand" href="{{ url('/') }}">
            Job Tracker
        </a>

        <div class="navbar-nav ms-auto">

            <a class="nav-link"
               href="{{ route('jobs.index') }}">
                Jobs
            </a>

            <a class="nav-link"
               href="{{ route('jobs.create') }}">
                Add Job
            </a>

        </div>

    </div>
</nav>

<div class="container py-4">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="content-card">
        @yield('content')
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')

</body>
</html>