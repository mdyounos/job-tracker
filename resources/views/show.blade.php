@extends('layouts.app')

@section('title', $job->job_title)

@section('content')

<div class="container mt-4">

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white">
            <h4 class="mb-1">{{ $job->job_title }}</h4>
            <small>{{ $job->organization }}</small>
        </div>

        <div class="card-body">

            <form action="{{ route('jobs.update', $job->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    {{-- Circular No --}}
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Circular No</label>

                        <div class="form-control view-mode">
                            {{ $job->circular_no ?? 'N/A' }}
                        </div>

                        <input type="text"
                               name="circular_no"
                               value="{{ $job->circular_no }}"
                               class="form-control edit-mode d-none">
                    </div>

                    {{-- Circular Publish Date --}}
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Circular Publish Date</label>

                        <div class="form-control view-mode">
                            {{ $job->circular_publish_date ?? 'N/A' }}
                        </div>

                        <input type="date"
                               name="circular_publish_date"
                               value="{{ $job->circular_publish_date }}"
                               class="form-control edit-mode d-none">
                    </div>

                    {{-- Circular Link --}}
                    <div class="col-md-12 mb-3">
                        <label class="fw-bold">Circular Link</label>

                        <div class="form-control view-mode">
                            @if($job->circular_link)
                                <a href="{{ $job->circular_link }}"
                                target="_blank">
                                    📄 View Circular
                                </a>
                            @else
                                N/A
                            @endif
                        </div>

                        <input type="url"
                            name="circular_link"
                            value="{{ $job->circular_link }}"
                            class="form-control edit-mode d-none">
                    </div>

                    {{-- Number of post --}}
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Number Of Post</label>

                        <div class="form-control view-mode">
                            {{ $job->number_of_post ?? 'N/A' }}
                        </div>

                        <input type="text"
                               name="number_of_post"
                               value="{{ $job->number_of_post }}"
                               class="form-control edit-mode d-none">
                    </div>

                    {{-- Salary --}}
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Salary</label>

                        <div class="form-control view-mode">
                            {{ $job->salary ?? 'N/A' }}
                        </div>

                        <input type="text"
                            name="salary"
                            value="{{ $job->salary }}"
                            class="form-control edit-mode d-none">
                    </div>

                    {{-- Grade --}}
                    <div class="col-md-6 mb-3">

                        <label class="fw-bold">Grade</label>

                        <div class="form-control view-mode">
                            {{ $job->grade ?? 'N/A' }}
                        </div>

                        <select name="grade"
                                class="form-select edit-mode d-none">
                            <option value="">Select Grade</option>

                            @for($i = 1; $i <= 20; $i++)
                                <option value="{{ $i }}"
                                    {{ $job->grade == $i ? 'selected' : '' }}>
                                    Grade {{ $i }}
                                </option>
                            @endfor

                        </select>

                    </div>
                    
                    {{-- Discipline --}}
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Discipline</label>

                        <div class="form-control view-mode">
                            {{ $job->discipline ?? 'N/A' }}
                        </div>

                        <input type="text"
                               name="discipline"
                               value="{{ $job->discipline }}"
                               class="form-control edit-mode d-none">
                    </div>

                    {{-- Ministry --}}
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Ministry</label>

                        <div class="form-control view-mode">
                            {{ $job->ministry ?? 'N/A' }}
                        </div>

                        <input type="text"
                               name="ministry"
                               value="{{ $job->ministry }}"
                               class="form-control edit-mode d-none">
                    </div>

                    {{-- Application Start Date --}}
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Application Start Date</label>

                        <div class="form-control view-mode">
                            {{ $job->application_date ?? 'N/A' }}
                        </div>

                        <input type="date"
                               name="application_start_date"
                               value="{{ $job->application_start_date }}"
                               class="form-control edit-mode d-none">
                    </div>

                    {{-- Application End Date --}}
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Application End Date</label>

                        <div class="form-control view-mode">
                            {{ $job->application_end_date ?? 'N/A' }}
                        </div>

                        <input type="date"
                               name="application_end_date"
                               value="{{ $job->application_end_date }}"
                               class="form-control edit-mode d-none">
                    </div>

                    {{-- Apply Fee --}}
                    <div class="col-md-6 mb-3">

                        <label class="fw-bold">Apply Fee</label>

                        <div class="form-control view-mode">
                            {{ $job->application_fee ? '৳'.$job->application_fee : 'N/A' }}
                        </div>

                        <input type="number"
                            name="application_fee"
                            value="{{ $job->application_fee }}"
                            class="form-control edit-mode d-none"
                            placeholder="500">

                    </div>

                    {{-- Tracking No --}}
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Tracking No</label>

                        <div class="form-control view-mode">
                            {{ $job->tracking_no ?? 'Not Available' }}
                        </div>

                        <input type="text"
                            name="tracking_no"
                            value="{{ $job->tracking_no }}"
                            class="form-control edit-mode d-none"
                            placeholder="26011400000002">
                    </div>

                    {{-- Exam Taker --}}
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Exam Taker</label>

                        <div class="form-control view-mode">
                            {{ $job->exam_taker ?? 'N/A' }}
                        </div>

                        <input type="text"
                               name="exam_taker"
                               value="{{ $job->exam_taker }}"
                               class="form-control edit-mode d-none">
                    </div>
                    
                    {{-- Exam Type --}}
                    <div class="col-md-6 mb-3">

                        <label class="fw-bold">Exam Type</label>

                        <div class="form-control view-mode">
                            {{ $job->exam_type ?? 'N/A' }}
                        </div>

                        <select name="exam_type"
                                class="form-select edit-mode d-none">

                            <option value="">Select Exam Type</option>

                            <option value="Preliminary">Preliminary</option>
                            <option value="Written">Written</option>
                            <option value="Preliminary + Written">Preliminary + Written</option>
                            <option value="Aptitude Test">Aptitude Test</option>
                            <option value="Practical Test">Practical Test</option>
                            <option value="Viva">Viva</option>                        
                        </select>
                    </div>

                    {{-- Exam Date --}}
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Exam Date</label>

                        <div class="form-control view-mode">
                            {{ $job->exam_date ?? 'Not Published Yet' }}
                        </div>

                        <input type="date"
                               name="exam_date"
                               value="{{ $job->exam_date }}"
                               class="form-control edit-mode d-none">
                    </div>

                    {{-- Exam Time --}}
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Exam Time</label>

                        <div class="form-control view-mode">
                            {{ $job->exam_time ? \Carbon\Carbon::parse($job->exam_time)->format('h:i A') : 'Not Published Yet' }}
                        </div>

                        <input type="time"
                            name="exam_time"
                            value="{{ $job->exam_time }}"
                            class="form-control edit-mode d-none">
                    </div>

                    {{-- Exam Centre --}}
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Exam Centre</label>

                        <div class="form-control view-mode">
                            {{ $job->exam_centre ?? 'Not Published Yet' }}
                        </div>

                        <input type="text"
                            name="exam_centre"
                            value="{{ $job->exam_centre }}"
                            class="form-control edit-mode d-none"
                            placeholder="Dhaka">
                    </div>

                    {{-- Status --}}
                    <div class="col-md-6 mb-3">

                        <label class="fw-bold">Status</label>

                        <div class="view-mode">
                            <span class="badge bg-primary fs-6">
                                {{ $job->status ?? 'N/A' }}
                            </span>
                        </div>

                        <select name="status"
                                class="form-select edit-mode d-none">

                            <option value="Applied">Applied</option>
                            <option value="Exam Scheduled">Exam Scheduled</option>
                            <option value="Absent">Absent</option>
                            <option value="Result Pending">Result Pending</option>
                            <option value="Passed">Passed</option>
                            <option value="Failed">Failed</option>
                        </select>

                    </div>
                    
                    {{-- Registration No --}}
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Roll/Registration No</label>

                        <div class="form-control view-mode">
                            {{ $job->registration_no ?? 'N/A' }}
                        </div>

                        <input type="text"
                            name="registration_no"
                            value="{{ $job->registration_no }}"
                            class="form-control edit-mode d-none"
                            placeholder="001356">
                    </div>

                    {{-- Educational Requirement --}}
                    <div class="col-md-12 mb-3">
                        <label class="fw-bold">Educational Requirement</label>

                        <div class="form-control view-mode"
                             style="min-height:120px; white-space:pre-wrap;">
                            {{ $job->req_edu ?? 'N/A' }}
                        </div>

                        <textarea name="req_edu"
                                  rows="6"
                                  class="form-control edit-mode d-none">{{ $job->req_edu }}</textarea>
                    </div>
                    
                    {{-- Username --}}
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Username</label>

                        <div class="form-control view-mode">
                            {{ $job->username ?? 'N/A' }}
                        </div>

                        <input type="text"
                               name="username"
                               value="{{ $job->username }}"
                               class="form-control edit-mode d-none">
                    </div>

                    {{-- Password --}}
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Password</label>

                        <div class="form-control view-mode">
                            {{ $job->password ?? 'N/A' }}
                        </div>

                        <input type="text"
                            name="password"
                            value="{{ $job->password }}"
                            class="form-control edit-mode d-none">
                    </div>

                    {{-- Remarks --}}
                    <div class="col-md-12 mb-3">

                        <label class="fw-bold">Remarks</label>

                        <div class="form-control view-mode"
                             style="min-height:80px;">
                            {{ $job->remarks ?? 'N/A' }}
                        </div>

                        <textarea name="remarks"
                                  rows="4"
                                  class="form-control edit-mode d-none">{{ $job->remarks }}</textarea>

                    </div>

                </div>

                <hr>

                <div class="d-flex gap-2">

                    <button type="button"
                            id="editBtn"
                            class="btn btn-warning">
                        <i class="fa-solid fa-pen-to-square"></i>
                        Edit
                    </button>

                    <button type="submit"
                            id="saveBtn"
                            class="btn btn-success d-none">
                        <i class="fa-solid fa-floppy-disk"></i>
                        Save Changes
                    </button>

                    <a href="{{ route('jobs.index') }}"
                       class="btn btn-secondary">
                        <i class="fa-solid fa-arrow-left"></i>
                        Back
                    </a>

                </div>

            </form>

        </div>
    </div>

</div>

<script>
document.getElementById('editBtn').addEventListener('click', function () {

    document.querySelectorAll('.view-mode').forEach(function(el) {
        el.classList.add('d-none');
    });

    document.querySelectorAll('.edit-mode').forEach(function(el) {
        el.classList.remove('d-none');
    });

    document.getElementById('saveBtn').classList.remove('d-none');

    this.classList.add('d-none');
});
</script>

@endsection