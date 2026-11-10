<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function index()
    {
        $jobs = JobApplication::latest()->get();

        return view('index', compact('jobs'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        JobApplication::create([

            'circular_no' => $request->circular_no,

            'circular_publish_date' =>
                $request->circular_publish_date,

            'job_title' =>
                $request->job_title,

            'organization' =>
                $request->organization,

            'ministry' =>
                $request->ministry,

            'application_end_date' =>
                $request->application_end_date,

            'req_edu' =>
                $request->req_edu,

            'status' =>
                $request->status,
        ]);

        return redirect()
            ->route('jobs.index')
            ->with(
                'success',
                'Application added successfully.'
            );
    }
}