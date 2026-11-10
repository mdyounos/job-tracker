@extends('layouts.app')

@section('title', 'Add Application')

@section('content')

<h3>Add Job Application</h3>

<form method="POST" action="{{ route('jobs.store') }}">
    @csrf

    <div class="mb-3">
        <label>Circular No</label>
        <input type="text"
               name="circular_no"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Circular Publish Date</label>

        <input type="date"
            name="circular_publish_date"
            class="form-control">
    </div>

    <div class="mb-3">
        <label>Job Title</label>
        <input type="text"
            name="job_title"
            class="form-control"
            required>
    </div>

    <div class="mb-3">
        <label>Organization</label>
        <input type="text"
               name="organization"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Ministry</label>
        <input type="text"
               name="ministry"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Application End Date</label>
        <input type="date"
               name="application_end_date"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Educational Qualification</label>

        <textarea name="req_edu"
                class="form-control"
                rows="3"
                placeholder="Enter educational qualification requirements"></textarea>
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status"
                class="form-select">

            <option value="Applied">
                Applied
            </option>

            <option value="Preliminary">
                Preliminary
            </option>

            <option value="Written">
                Written
            </option>

            <option value="Viva">
                Viva
            </option>

            <option value="Selected">
                Selected
            </option>

            <option value="Rejected">
                Rejected
            </option>

        </select>
    </div>

    <button type="submit"
            class="btn btn-success">
        Save
    </button>

</form>

@endsection