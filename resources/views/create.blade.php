@extends('layouts.app')

@section('title', 'Add Application')

@section('content')

<h3>Add Job Application</h3>

<form method="POST" action="{{ route('jobs.store') }}">
    @csrf

    <div class="mb-3">
        <label>Company/Organization</label>
        <input type="text"
               name="organization"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Job Title</label>

        <input type="text"
               id="job_title"
               name="job_title"
               class="form-control"
               required>

        <div id="similarJobs" class="mt-2"></div>
    </div>

    <div class="mb-3">
        <label>Number of Post</label>
        <input type="text"
               name="number_of_post"
               class="form-control">
    </div>

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
                  rows="3"></textarea>
    </div>

    <div class="mb-3">
        <label>Status</label>

        <select name="status" class="form-select">
            <option value="Applied">Applied</option>
            <option value="Exam Scheduled">Exam Scheduled</option>
            <option value="Absent">Absent</option>
            <option value="Result Pending">Result Pending</option>
            <option value="Passed">Passed</option>
            <option value="Failed">Failed</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">
        Save
    </button>

</form>

<script>
document.getElementById('job_title').addEventListener('keyup', function () {

    let keyword = this.value;

    if (keyword.length < 3) {
        document.getElementById('similarJobs').innerHTML = '';
        return;
    }

    fetch('/jobs/search-duplicate?job_title=' + encodeURIComponent(keyword))
        .then(response => response.json())
        .then(data => {

            let html = '';

            if (data.length > 0) {

                html += `
                    <div class="alert alert-warning">
                        <strong>⚠ Similar Jobs Found</strong><br><br>
                `;

                data.forEach(job => {
                    html += `
                        <div>
                            <strong>${job.job_title ?? ''}</strong>
                            <br>
                            ${job.organization ?? 'N/A'}
                        </div>
                        <hr>
                    `;
                });

                html += `</div>`;
            }

            document.getElementById('similarJobs').innerHTML = html;
        });
});
</script>

@endsection