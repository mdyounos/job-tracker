@extends('layouts.app')

@section('title', 'Job Application Tracker')

@section('content')
<div class="row mb-3">
    <div class="col-md-8">
        <form method="GET" action="{{ route('jobs.index') }}">
            <div class="input-group">

                <input type="text"
                       name="search"
                       class="form-control"
                       placeholder="Search by Job Title, Organization, Tracking No..."
                       value="{{ request('search') }}">

                <button type="submit" class="btn btn-primary">
                    Search
                </button>

                <a href="{{ route('jobs.index') }}"
                   class="btn btn-secondary">
                    Reset
                </a>

            </div>
        </form>
    </div>
</div>

<div class="card shadow-sm border-0">

    <div class="card-body">

        <table class="table table-hover align-middle">

            <thead class="table-primary">

                <tr>
                    <th>SL</th>
                    <th>Job Title</th>
                    <th>Organization</th>      
                    <th>Status</th>
                </tr>

            </thead>

            <tbody>

            @forelse($jobs as $job)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>
                        <a href="{{ route('jobs.show', $job->id) }}"
                        class="text-decoration-none fw-bold">
                            {{ $job->job_title }}
                        </a>
                    </td>

                    <td>
                        {{ $job->organization }}
                    </td>

                    <td>

                        @switch($job->status)

                            @case('Applied')
                                <span class="badge bg-secondary">
                                    Applied
                                </span>
                                @break

                            @case('Exam Scheduled')
                                <span class="badge bg-primary">
                                    Exam Scheduled
                                </span>
                                @break

                            @case('Absent')
                                <span class="badge bg-info">
                                    Absent
                                </span>
                                @break

                            @case('Result Pending')
                                <span class="badge bg-warning text-dark">
                                    Result Pending
                                </span>
                                @break

                            @case('Selected')
                                <span class="badge bg-dark">
                                    Selected
                                </span>
                                @break
                            
                            @case('Rejected')
                                <span class="badge bg-danger">
                                    Rejected
                                </span>
                                @break

                            @default
                                <span class="badge bg-secondary">
                                    N/A
                                </span>

                        @endswitch

                    </td>   
                </tr>

            @empty

                <tr>

                    <td colspan="7"
                        class="text-center py-4">

                        No Job Application Found

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection