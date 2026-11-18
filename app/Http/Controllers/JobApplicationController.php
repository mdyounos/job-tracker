<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function index(Request $request)
    {
        $query = JobApplication::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where('job_title', 'like', "%{$search}%")
                ->orWhere('organization', 'like', "%{$search}%")
                ->orWhere('circular_no', 'like', "%{$search}%")
                ->orWhere('username', 'like', "%{$search}%")
                ->orWhere('registration_no', 'like', "%{$search}%")
                ->orWhere('tracking_no', 'like', "%{$search}%")
                ->orWhere('exam_centre', 'like', "%{$search}%")
                ->orWhere('status', 'like', "%{$search}%");
        }

        $jobs = $query->latest()->get();

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
                

            'application_start_date' =>
                $request->application_start_date,

            'application_end_date' =>
                $request->application_end_date,

            'application_fee' =>
                $request->application_fee,

            'req_edu' =>
                $request->req_edu,

            'status' =>
                $request->status,

            'number_of_post' => 
                $request->number_of_post,

            'username' => 
                $request->username,

            'salary' => 
                $request->salary,

            'grade' => 
                $request->grade,
            'exam_centre' => 
                $request->exam_centre,
            'exam_type' => 
                $request->exam_type,

            'registration_no' => 
                $request->registration_no,

            'tracking_no' => 
                $request->tracking_no,
        ]);

        return redirect()
            ->route('jobs.index')
            ->with(
                'success',
                'Application added successfully.'
            );
    }

    public function show($id)
    {
        $job = JobApplication::findOrFail($id);

        return view('show', compact('job'));
    }

    public function edit($id)
    {
        $job = JobApplication::findOrFail($id);

        return view('edit', compact('job'));
    }

    public function update(Request $request, JobApplication $job)
    {
        $job->update($request->all());

        return redirect()
            ->route('jobs.show', $job->id)
            ->with('success', 'Job updated successfully.');
    }

    public function searchDuplicate(Request $request)
    {
        $keyword = $request->job_title;

        $jobs = JobApplication::where('job_title', 'like', "%{$keyword}%")
                ->orWhere('organization', 'like', "%{$keyword}%")
                ->take(10)
                ->get();

        return response()->json($jobs);
    }
}