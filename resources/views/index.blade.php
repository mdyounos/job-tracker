@extends('layouts.app')

@section('title', 'Job Application Tracker')

@section('content')

<div class="row mb-4">

    <div class="col-md-3">
        <div class="card border-0 shadow-sm bg-primary text-white">
            <div class="card-body text-center">
                <h6>Total Applied</h6>
                <h2>{{ $jobs->count() }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-0 shadow-sm bg-info text-white">
            <div class="card-body text-center">
                <h6>Upcoming Exams</h6>
                <h2>
                    {{ $jobs->where('status','Preliminary')->count() }}
                </h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-0 shadow-sm bg-success text-white">
            <div class="card-body text-center">
                <h6>Selected</h6>
                <h2>
                    {{ $jobs->where('status','Selected')->count() }}
                </h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-0 shadow-sm bg-danger text-white">
            <div class="card-body text-center">
                <h6>Rejected</h6>
                <h2>
                    {{ $jobs->where('status','Rejected')->count() }}
                </h2>
            </div>
        </div>
    </div>

</div>

<div class="d-flex justify-content-between align-items-center mb-3">

    <h3>Government Job Tracker</h3>

    <a href="{{ route('jobs.create') }}"
       class="btn btn-primary">
        + Add Application
    </a>

</div>

<div class="card shadow-sm border-0">

    <div class="card-body">

        <table class="table table-hover align-middle">

            <thead class="table-dark">

                <tr>
                    <th>SL</th>
                    <th>Job Title</th>
                    <th>Organization</th>
                    <th>Application Date</th>
                    <th>Exam Date</th>
                    <th>Status</th>
                    <th>Remarks</th>
                </tr>

            </thead>

            <tbody>

            @forelse($jobs as $job)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>
                        <strong>
                            {{ $job->job_title }}
                        </strong>
                    </td>

                    <td>
                        {{ $job->organization }}
                    </td>

                    <td>
                        {{ $job->application_date }}
                    </td>

                    <td>
                        {{ $job->exam_date }}
                    </td>

                    <td>

                        @switch($job->status)

                            @case('Circular Published')
                                <span class="badge bg-secondary">
                                    Circular Published
                                </span>
                                @break

                            @case('Applied')
                                <span class="badge bg-primary">
                                    Applied
                                </span>
                                @break

                            @case('Admit Published')
                                <span class="badge bg-info">
                                    Admit Published
                                </span>
                                @break

                            @case('Preliminary')
                                <span class="badge bg-warning text-dark">
                                    Preliminary
                                </span>
                                @break

                            @case('Written')
                                <span class="badge bg-dark">
                                    Written
                                </span>
                                @break

                            @case('Viva')
                                <span class="badge bg-success">
                                    Viva
                                </span>
                                @break

                            @case('Selected')
                                <span class="badge bg-success">
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

                    <td>
                        {{ $job->remarks }}
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