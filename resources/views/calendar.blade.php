
@extends('layouts.app')

@section('title', 'Exam Calendar')

@section('content')

<div class="container mt-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <div>
            <h2 class="fw-bold">
                <i class="fa-solid fa-calendar-days text-primary"></i>
                Exam Calendar
            </h2>
            <p class="text-muted mb-0">All your exam schedules in one place</p>
        </div>
    </div>

    {{-- Month Navigation --}}
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">

            <a href="{{ route('jobs.calendar', ['month' => $previousMonth]) }}"
               class="btn btn-outline-primary">
                <i class="fa-solid fa-chevron-left"></i> Previous
            </a>

            <h4 class="fw-bold mb-0">
                {{ $currentMonth->format('F Y') }}
            </h4>

            <a href="{{ route('jobs.calendar', ['month' => $nextMonth]) }}"
               class="btn btn-outline-primary">
                Next <i class="fa-solid fa-chevron-right"></i>
            </a>

        </div>
    </div>

    {{-- Exam Event Cards --}}
    <div class="row g-3">

        @php
            $hasEvents = false;
        @endphp

        @foreach($calendarDays as $day)

            @foreach($day['events'] as $event)

                @php
                    $hasEvents = true;

                    $colors = [
                        'General Exam' => 'secondary',
                        'Aptitude' => 'primary',
                        'Preliminary' => 'info',
                        'Written' => 'success',
                        'Viva' => 'warning',
                        'Medical' => 'danger',
                        'Joining' => 'dark',
                    ];

                    $color = $colors[$event['type']] ?? 'secondary';
                @endphp

                <div class="col-md-6 col-lg-4">

                    <a href="{{ route('jobs.show', $event['job_id']) }}"
                       class="text-decoration-none text-dark">

                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body">

                                <div class="d-flex justify-content-between align-items-center mb-3">

                                    <span class="badge bg-{{ $color }}">
                                        {{ $event['type'] }}
                                    </span>

                                    <span class="text-primary fw-bold">
                                        <i class="fa-solid fa-calendar"></i>
                                        {{ $day['date']->format('d M Y') }}
                                    </span>

                                </div>

                                <h5 class="fw-bold">
                                    {{ $event['title'] }}
                                </h5>

                                <p class="text-muted mb-3">
                                    {{ $event['organization'] ?? 'Organization not specified' }}
                                </p>

                                <div class="mb-3">
                                    <span class="text-muted small">Status:</span>

                                    @php
                                        $statusColor = match($event['status'] ?? 'N/A') {
                                            'Applied' => 'primary',
                                            'Exam Scheduled' => 'info',
                                            'Result Pending' => 'warning',
                                            'Passed', 'Selected' => 'success',
                                            'Failed', 'Rejected' => 'danger',
                                            'Absent' => 'dark',
                                            default => 'secondary',
                                        };
                                    @endphp

                                    <span class="badge bg-{{ $statusColor }}">
                                        {{ $event['status'] ?? 'N/A' }}
                                    </span>
                                </div>

                                <div class="border-top pt-3 d-flex justify-content-between align-items-center">

                                    <small class="text-muted">
                                        View Job Details
                                    </small>

                                    <i class="fa-solid fa-arrow-right text-primary"></i>

                                </div>

                            </div>
                        </div>

                    </a>

                </div>

            @endforeach

        @endforeach

        @if(!$hasEvents)
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center py-5">
                        <i class="fa-solid fa-calendar-xmark fa-3x text-muted mb-3"></i>

                        <h5>No Exams Scheduled</h5>

                        <p class="text-muted mb-0">
                            No exam dates found for {{ $currentMonth->format('F Y') }}.
                        </p>

                        <a href="{{ route('jobs.index') }}" class="btn btn-primary mt-3">
                            View All Jobs
                        </a>
                    </div>
                </div>
            </div>
        @endif

    </div>

</div>

@endsection
