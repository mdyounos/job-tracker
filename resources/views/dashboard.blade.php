
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">Overview</h2>
        </div>

        <a href="{{ route('jobs.index') }}" class="btn btn-primary">
            <i class="fa-solid fa-list"></i> All Jobs
        </a>
    </div>

    <div class="row g-3">

        <div class="col-md-4">
            <div class="card shadow-sm border-0 bg-primary text-white">
                <div class="card-body">
                    <h6>Total Applications</h6>
                    <h2>{{ $totalJobs }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 bg-info text-white">
                <div class="card-body">
                    <h6>Applied</h6>
                    <h2>{{ $applied }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 bg-warning">
                <div class="card-body">
                    <h6>Exam Scheduled</h6>
                    <h2>{{ $examScheduled }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 bg-dark text-white">
                <div class="card-body">
                    <h6>Absent</h6>
                    <h2>{{ $absent }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 bg-secondary text-white">
                <div class="card-body">
                    <h6>Result Pending</h6>
                    <h2>{{ $resultPending }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 bg-success text-white">
                <div class="card-body">
                    <h6>Selected</h6>
                    <h2>{{ $selected }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 bg-danger text-white">
                <div class="card-body">
                    <h6>Rejected</h6>
                    <h2>{{ $rejected }}</h2>
                </div>
            </div>
        </div>        
    </div>

    <div class="row mt-4 g-4">
        <div class="col-md-6">
            <div class="card shadow-sm border-0 h-100">

                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="fa-solid fa-calendar-check"></i>
                        Upcoming Exams
                    </h5>
                </div>

                <div class="card-body">

                    @forelse($upcomingExams as $exam)

                        <div class="border-bottom py-3">

                            <div class="d-flex justify-content-between align-items-center mb-2">

                                <span class="badge bg-primary">
                                    {{ $exam['exam_name'] }}
                                </span>

                                <span class="text-success fw-bold small">
                                    <i class="fa-solid fa-calendar"></i>
                                    {{ \Carbon\Carbon::parse($exam['exam_date'])->format('d M Y') }}
                                </span>

                            </div>

                            <a href="{{ route('jobs.show', $exam['job_id']) }}"
                            class="fw-bold text-decoration-none">
                                {{ $exam['job_title'] }}
                            </a>

                            <div class="text-muted small mt-1">
                                {{ $exam['organization'] ?? 'Organization not specified' }}
                            </div>

                        </div>

                    @empty

                        <p class="text-muted mb-0">
                            No upcoming exams.
                        </p>

                    @endforelse

                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-danger text-white">
                    <h5 class="mb-0">Upcoming Application Deadlines</h5>
                </div>

                <div class="card-body">
                    @forelse($closingSoon as $job)
                        <div class="border-bottom py-2">
                            <a href="{{ route('jobs.show', $job->id) }}"
                               class="fw-bold text-decoration-none">
                                {{ $job->job_title }}
                            </a>

                            <div class="text-muted">
                                {{ $job->organization }}
                            </div>

                            <small>
                                Last Date: {{ $job->application_end_date }}
                            </small>
                        </div>
                    @empty
                        <p class="text-muted mb-0">
                            No upcoming deadlines.
                        </p>
                    @endforelse
                </div>            
                
            </div>
        </div>

    </div>


    {{-- Monthly Exam Calendar --}}
    <div class="card shadow-sm border-0 mt-4 mb-4">

        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center flex-wrap gap-2">

            <h5 class="mb-0">
                <i class="fa-solid fa-calendar-days"></i>
                Exam Calendar
            </h5>

            <div class="d-flex gap-2">
                <a href="{{ url('/') }}" class="btn btn-light btn-sm">Today</a>

                <a href="{{ url('/?month='.$previousMonth) }}" class="btn btn-light btn-sm">
                    <i class="fa-solid fa-chevron-left"></i>
                </a>

                <a href="{{ url('/?month='.$nextMonth) }}" class="btn btn-light btn-sm">
                    <i class="fa-solid fa-chevron-right"></i>
                </a>
            </div>

        </div>

        <div class="card-body">

            <h4 class="text-center fw-bold mb-3">
                {{ $currentMonth->format('F Y') }}
            </h4>

            @php
                $weekDays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            @endphp

            <div style="overflow-x:auto;">
                <div style="min-width:700px;">

                    {{-- Week Days --}}
                    <div style="display:grid; grid-template-columns:repeat(7, 1fr);">
                        @foreach($weekDays as $day)
                            <div class="text-center fw-bold bg-light border p-1 small">
                                {{ $day }}
                            </div>
                        @endforeach
                    </div>

                    {{-- Calendar Grid --}}
                    <div style="display:grid; grid-template-columns:repeat(7, 1fr);">

                        @foreach($calendarDays as $day)

                            <div class="border p-1"
                                style="min-height:85px; background:{{ $day['isCurrentMonth'] ? '#fff' : '#f5f5f5' }};">

                                {{-- Date Number --}}
                                <div class="fw-bold small mb-1"
                                    style="color:{{ $day['isCurrentMonth'] ? '#222' : '#aaa' }};">
                                    {{ $day['date']->format('d') }}
                                </div>                             
                    
                            {{-- Events --}}
                            @foreach($day['events'] as $event)

                                <a href="{{ route('jobs.show', $event['job_id']) }}"
                                class="d-block text-decoration-none mb-1">

                                    <div class="small fw-bold text-primary text-truncate"
                                        style="font-size:10px;">
                                        {{ $event['title'] }}
                                    </div>

                                    <div class="small text-dark text-truncate"
                                        style="font-size:10px;">
                                        {{ $event['organization'] }}
                                    </div>

                                    <div class="mt-1">
                                        @php
                                            $status = $event['status'] ?? 'N/A';

                                            $statusClass = match($status) {
                                                'Applied' => 'bg-primary',
                                                'Exam Scheduled' => 'bg-info text-dark',
                                                'Absent' => 'bg-danger text-dark',
                                                'Result Pending' => 'bg-warning text-dark',
                                                'Selected' => 'bg-success',
                                                'Rejected' => 'bg-danger',
                                                default => 'bg-secondary',
                                            };
                                        @endphp

                                        <span class="badge rounded-pill {{ $statusClass }} px-2 py-1"
                                            style="font-size: 9px;">
                                            {{ $status }}
                                        </span>
                                    </div>
                                </a>

                            @endforeach

                            </div>

                        @endforeach

                    </div>

                </div>
            </div>

            <div class="mt-2 text-muted small">
                <i class="fa-solid fa-circle-info"></i>
                Click an event to view job details.
            </div>

        </div>
    </div>

</div>

@endsection
