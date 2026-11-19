@extends('layouts.app')

@section('title', $job->job_title)

@section('content')

<div class="container mt-4 mb-5">

    <div class="card shadow border-0">

        {{-- Header --}}
        <div class="card-header bg-primary text-white">
            <h4 class="mb-1">{{ $job->job_title }}</h4>
            <small>{{ $job->organization }}</small>
        </div>

        <div class="card-body">

            <form action="{{ route('jobs.update', $job->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">

                    {{-- 1. Job Information --}}
                    <div class="col-12 mt-2 mb-3">
                        <div class="p-3 rounded border-start border-primary border-4 bg-light">
                            <h5 class="text-primary mb-1">
                                <i class="fa-solid fa-briefcase me-2"></i>
                                Job Information
                            </h5>
                            <small class="text-muted">Post name and organization details</small>
                        </div>
                    </div>

                    {{-- Job Title --}}
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Job Title / Post Name</label>
                        <div class="form-control view-mode">
                            {{ $job->job_title ?? 'N/A' }}
                        </div>
                        <input type="text" name="job_title"
                            value="{{ $job->job_title }}"
                            class="form-control edit-mode d-none">
                    </div>

                    {{-- Organization --}}
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Organization / Company</label>
                        <div class="form-control view-mode">
                            {{ $job->organization ?? 'N/A' }}
                        </div>
                        <input type="text" name="organization"
                            value="{{ $job->organization }}"
                            class="form-control edit-mode d-none">
                    </div>


                    {{-- 2. Application Status --}}
                    <div class="col-12 mt-4 mb-3">
                        <div class="p-3 rounded border-start border-warning border-4 bg-light">
                            <h5 class="text-warning mb-1">
                                <i class="fa-solid fa-list-check me-2"></i>
                                Application Status
                            </h5>
                            <small class="text-muted">Current application progress</small>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Current Status</label>

                        <div class="view-mode">
                            <span class="badge bg-primary fs-6">
                                {{ $job->status ?? 'Not Set' }}
                            </span>
                        </div>

                        <select name="status" class="form-select edit-mode d-none">
                            <option value="">Select Status</option>

                            @foreach(['Applied', 'Exam Scheduled', 'Absent', 'Result Pending', 'Selected', 'Rejected'] as $status)
                                <option value="{{ $status }}"
                                    {{ $job->status == $status ? 'selected' : '' }}>
                                    {{ $status }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Roll / Registration No</label>

                        <div class="form-control view-mode">
                            {{ $job->registration_no ?? 'N/A' }}
                        </div>

                        <input type="text" name="registration_no"
                            value="{{ $job->registration_no }}"
                            class="form-control edit-mode d-none"
                            placeholder="001356">
                    </div>


                    {{-- 3. Circular Information --}}
                    <div class="col-12 mt-4 mb-3">
                        <div class="p-3 rounded border-start border-info border-4 bg-light">
                            <h5 class="text-info mb-1">
                                <i class="fa-solid fa-file-lines me-2"></i>
                                Circular Information
                            </h5>
                            <small class="text-muted">Circular number, publication date and link</small>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Circular No</label>
                        <div class="form-control view-mode">
                            {{ $job->circular_no ?? 'N/A' }}
                        </div>
                        <input type="text" name="circular_no"
                            value="{{ $job->circular_no }}"
                            class="form-control edit-mode d-none">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Circular Publish Date</label>
                        <div class="form-control view-mode">
                            {{ $job->circular_publish_date ?? 'N/A' }}
                        </div>
                        <input type="date" name="circular_publish_date"
                            value="{{ $job->circular_publish_date }}"
                            class="form-control edit-mode d-none">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="fw-bold">Circular Link</label>

                        <div class="form-control view-mode">
                            @if($job->circular_link)
                                <a href="{{ $job->circular_link }}" target="_blank">
                                    View Circular
                                </a>
                            @else
                                N/A
                            @endif
                        </div>

                        <input type="url" name="circular_link"
                            value="{{ $job->circular_link }}"
                            class="form-control edit-mode d-none">
                    </div>


                    {{-- 4. Post & Salary Information --}}
                    <div class="col-12 mt-4 mb-3">
                        <div class="p-3 rounded border-start border-success border-4 bg-light">
                            <h5 class="text-success mb-1">
                                <i class="fa-solid fa-building me-2"></i>
                                Post & Salary Information
                            </h5>
                            <small class="text-muted">Number of posts, salary, grade and ministry</small>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Number Of Post</label>
                        <div class="form-control view-mode">
                            {{ $job->number_of_post ?? 'N/A' }}
                        </div>
                        <input type="number" name="number_of_post"
                            value="{{ $job->number_of_post }}"
                            class="form-control edit-mode d-none">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Salary</label>
                        <div class="form-control view-mode">
                            {{ $job->salary ?? 'N/A' }}
                        </div>
                        <input type="text" name="salary"
                            value="{{ $job->salary }}"
                            class="form-control edit-mode d-none">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Grade</label>
                        <div class="form-control view-mode">
                            {{ $job->grade ?? 'N/A' }}
                        </div>

                        <select name="grade" class="form-select edit-mode d-none">
                            <option value="">Select Grade</option>
                            @for($i = 1; $i <= 20; $i++)
                                <option value="{{ $i }}"
                                    {{ $job->grade == $i ? 'selected' : '' }}>
                                    Grade {{ $i }}
                                </option>
                            @endfor
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Discipline</label>
                        <div class="form-control view-mode">
                            {{ $job->discipline ?? 'N/A' }}
                        </div>
                        <input type="text" name="discipline"
                            value="{{ $job->discipline }}"
                            class="form-control edit-mode d-none">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Ministry</label>
                        <div class="form-control view-mode">
                            {{ $job->ministry ?? 'N/A' }}
                        </div>
                        <input type="text" name="ministry"
                            value="{{ $job->ministry }}"
                            class="form-control edit-mode d-none">
                    </div>


                    {{-- 5. Application Information --}}
                    <div class="col-12 mt-4 mb-3">
                        <div class="p-3 rounded border-start border-warning border-4 bg-light">
                            <h5 class="text-warning mb-1">
                                <i class="fa-solid fa-file-signature me-2"></i>
                                Application Information
                            </h5>
                            <small class="text-muted">Application dates, fees and tracking number</small>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Application Start Date</label>
                        <div class="form-control view-mode">
                            {{ $job->application_start_date ?? 'N/A' }}
                        </div>
                        <input type="date" name="application_start_date"
                            value="{{ $job->application_start_date }}"
                            class="form-control edit-mode d-none">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Application End Date</label>
                        <div class="form-control view-mode">
                            {{ $job->application_end_date ?? 'N/A' }}
                        </div>
                        <input type="date" name="application_end_date"
                            value="{{ $job->application_end_date }}"
                            class="form-control edit-mode d-none">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Application Fee</label>
                        <div class="form-control view-mode">
                            {{ $job->application_fee ? '৳'.$job->application_fee : 'N/A' }}
                        </div>
                        <input type="number" name="application_fee"
                            value="{{ $job->application_fee }}"
                            class="form-control edit-mode d-none"
                            placeholder="500">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Tracking No</label>
                        <div class="form-control view-mode">
                            {{ $job->tracking_no ?? 'N/A' }}
                        </div>
                        <input type="text" name="tracking_no"
                            value="{{ $job->tracking_no }}"
                            class="form-control edit-mode d-none">
                    </div>


                    {{-- 6. Examination Information --}}
                    <div class="col-12 mt-4 mb-3">
                        <div class="p-3 rounded border-start border-danger border-4 bg-light">
                            <h5 class="text-danger mb-1">
                                <i class="fa-solid fa-pen-to-square me-2"></i>
                                Examination Information
                            </h5>
                            <small class="text-muted">
                                Exam schedule, exam center, exam taker and results
                            </small>
                        </div>
                    </div>

                    @php
                        $examStages = [
                            [
                                'key' => 'preli',
                                'title' => 'Preliminary Examination',
                                'date' => 'preli_date',
                                'result' => 'preli_result',
                            ],
                            [
                                'key' => 'written',
                                'title' => 'Written Examination',
                                'date' => 'written_date',
                                'result' => 'written_result',
                            ],
                            [
                                'key' => 'aptitude',
                                'title' => 'Aptitude Test',
                                'date' => 'aptitude_date',
                                'result' => 'aptitude_result',
                            ],
                            [
                                'key' => 'viva',
                                'title' => 'Viva Examination',
                                'date' => 'viva_date',
                                'result' => 'viva_result',
                            ],
                            [
                                'key' => 'medical',
                                'title' => 'Medical Examination',
                                'date' => 'medical_date',
                                'result' => null,
                            ],
                        ];
                    @endphp

                    @foreach($examStages as $stage)

                        <div class="col-12 mt-3 mb-2">
                            <div class="p-3 rounded border bg-light">
                                <h6 class="fw-bold text-primary mb-0">
                                    <i class="fa-solid fa-calendar-check me-2"></i>
                                    {{ $stage['title'] }}
                                </h6>
                            </div>
                        </div>

                        {{-- Exam Taker --}}
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Exam Taker</label>

                            <div class="form-control view-mode">
                                {{ $job->{$stage['key'].'_exam_taker'} ?? 'N/A' }}
                            </div>

                            <input type="text"
                                name="{{ $stage['key'] }}_exam_taker"
                                value="{{ $job->{$stage['key'].'_exam_taker'} }}"
                                class="form-control edit-mode d-none"
                                placeholder="Exam taker name">
                        </div>

                        {{-- Exam Date --}}
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Exam Date</label>

                            <div class="form-control view-mode">
                                {{ $job->{$stage['date']} ?? 'Not Published Yet' }}
                            </div>

                            <input type="date"
                                name="{{ $stage['date'] }}"
                                value="{{ $job->{$stage['date']} }}"
                                class="form-control edit-mode d-none">
                        </div>

                        {{-- Exam Time --}}
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Exam Time</label>

                            <div class="form-control view-mode">
                                {{ $job->{$stage['key'].'_time'} ?? 'Not Published Yet' }}
                            </div>

                            <input type="time"
                                name="{{ $stage['key'] }}_time"
                                value="{{ $job->{$stage['key'].'_time'} }}"
                                class="form-control edit-mode d-none">
                        </div>

                        {{-- Exam Center --}}
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Exam Center</label>

                            <div class="form-control view-mode">
                                {{ $job->{$stage['key'].'_centre'} ?? 'Not Published Yet' }}
                            </div>

                            <input type="text"
                                name="{{ $stage['key'] }}_centre"
                                value="{{ $job->{$stage['key'].'_centre'} }}"
                                class="form-control edit-mode d-none"
                                placeholder="Exam center">
                        </div>                                                
                    @endforeach


                    {{-- Final Result & Joining --}}
                    <div class="col-12 mt-4 mb-3">
                        <div class="p-3 rounded border-start border-success border-4 bg-light">
                            <h5 class="text-success mb-1">
                                <i class="fa-solid fa-trophy me-2"></i>
                                Final Result & Joining Information
                            </h5>
                            <small class="text-muted">Final selection and joining details</small>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Final Result</label>

                        <div class="form-control view-mode">
                            {{ $job->final_result ?? 'Pending' }}
                        </div>

                        <select name="final_result" class="form-select edit-mode d-none">
                            @foreach(['Pending', 'Selected', 'Rejected'] as $result)
                                <option value="{{ $result }}"
                                    {{ $job->final_result == $result ? 'selected' : '' }}>
                                    {{ $result }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Joining Date</label>

                        <div class="form-control view-mode">
                            {{ $job->joining_date ?? 'Not Published Yet' }}
                        </div>

                        <input type="date" name="joining_date"
                            value="{{ $job->joining_date }}"
                            class="form-control edit-mode d-none">
                    </div>


                    {{-- 7. Educational Requirement --}}
                    <div class="col-12 mt-4 mb-3">
                        <div class="p-3 rounded border-start border-primary border-4 bg-light">
                            <h5 class="text-primary mb-1">
                                <i class="fa-solid fa-graduation-cap me-2"></i>
                                Educational Requirement
                            </h5>
                            <small class="text-muted">Required qualifications and academic details</small>
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="fw-bold">Educational Requirement</label>

                        <div class="form-control view-mode"
                            style="min-height:120px; white-space:pre-wrap;">
                            {{ $job->req_edu ?? 'N/A' }}
                        </div>

                        <textarea name="req_edu" rows="6"
                            class="form-control edit-mode d-none">{{ $job->req_edu }}</textarea>
                    </div>


                    {{-- 8. Account Information --}}
                    <div class="col-12 mt-4 mb-3">
                        <div class="p-3 rounded border-start border-secondary border-4 bg-light">
                            <h5 class="text-secondary mb-1">
                                <i class="fa-solid fa-user-lock me-2"></i>
                                Account Information
                            </h5>
                            <small class="text-muted">Application portal username and password</small>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Username</label>

                        <div class="form-control view-mode">
                            {{ $job->username ?? 'N/A' }}
                        </div>

                        <input type="text" name="username"
                            value="{{ $job->username }}"
                            class="form-control edit-mode d-none">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Password</label>

                        <div class="form-control view-mode">
                            {{ $job->password ? '********' : 'N/A' }}
                        </div>

                        <input type="password" name="password"
                            value=""
                            class="form-control edit-mode d-none"
                            placeholder="Leave blank to keep current password">
                    </div>


                    {{-- 9. Remarks --}}
                    <div class="col-12 mt-4 mb-3">
                        <div class="p-3 rounded border-start border-dark border-4 bg-light">
                            <h5 class="text-dark mb-1">
                                <i class="fa-solid fa-note-sticky me-2"></i>
                                Remarks
                            </h5>
                            <small class="text-muted">Additional notes about this application</small>
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="fw-bold">Remarks</label>

                        <div class="form-control view-mode"
                            style="min-height:80px; white-space:pre-wrap;">
                            {{ $job->remarks ?? 'N/A' }}
                        </div>

                        <textarea name="remarks" rows="4"
                            class="form-control edit-mode d-none">{{ $job->remarks }}</textarea>
                    </div>

                </div>

                <hr>

                {{-- Buttons --}}
                <div class="d-flex gap-2 flex-wrap">

                    <button type="button" id="editBtn" class="btn btn-warning">
                        <i class="fa-solid fa-pen-to-square"></i>
                        Edit
                    </button>

                    <button type="submit" id="saveBtn" class="btn btn-success d-none">
                        <i class="fa-solid fa-floppy-disk"></i>
                        Save Changes
                    </button>

                    <a href="{{ route('jobs.index') }}" class="btn btn-secondary">
                        <i class="fa-solid fa-arrow-left"></i>
                        Back
                    </a>

                </div>

            </form>

        </div>
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const editBtn = document.getElementById('editBtn');
    const saveBtn = document.getElementById('saveBtn');

    editBtn.addEventListener('click', function () {

        document.querySelectorAll('.view-mode').forEach(function (element) {
            element.classList.add('d-none');
        });

        document.querySelectorAll('.edit-mode').forEach(function (element) {
            element.classList.remove('d-none');
        });

        saveBtn.classList.remove('d-none');
        editBtn.classList.add('d-none');

    });

});
</script>

@endsection