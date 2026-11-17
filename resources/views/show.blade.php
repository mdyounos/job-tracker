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

                    {{-- Organization --}}
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Organization</label>

                        <div class="form-control view-mode">
                            {{ $job->organization ?? 'N/A' }}
                        </div>

                        <input type="text"
                               name="organization"
                               value="{{ $job->organization }}"
                               class="form-control edit-mode d-none">
                    </div>

                    {{-- Department --}}
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Department</label>

                        <div class="form-control view-mode">
                            {{ $job->department ?? 'N/A' }}
                        </div>

                        <input type="text"
                               name="department"
                               value="{{ $job->department }}"
                               class="form-control edit-mode d-none">
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

                    {{-- Application Date --}}
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Application Date</label>

                        <div class="form-control view-mode">
                            {{ $job->application_date ?? 'N/A' }}
                        </div>

                        <input type="date"
                               name="application_date"
                               value="{{ $job->application_date }}"
                               class="form-control edit-mode d-none">
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

                            <option value="Circular Published" {{ $job->status=='Circular Published' ? 'selected' : '' }}>Circular Published</option>

                            <option value="Applied" {{ $job->status=='Applied' ? 'selected' : '' }}>Applied</option>

                            <option value="Admit Published" {{ $job->status=='Admit Published' ? 'selected' : '' }}>Admit Published</option>

                            <option value="Preliminary" {{ $job->status=='Preliminary' ? 'selected' : '' }}>Preliminary</option>

                            <option value="Written" {{ $job->status=='Written' ? 'selected' : '' }}>Written</option>

                            <option value="Viva" {{ $job->status=='Viva' ? 'selected' : '' }}>Viva</option>

                            <option value="Selected" {{ $job->status=='Selected' ? 'selected' : '' }}>Selected</option>

                            <option value="Rejected" {{ $job->status=='Rejected' ? 'selected' : '' }}>Rejected</option>

                        </select>

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