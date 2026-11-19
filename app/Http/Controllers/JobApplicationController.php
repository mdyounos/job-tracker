<?php
namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class JobApplicationController extends Controller
{
    private function allowedStatuses(): array
    {
        return [
            'Applied',
            'Exam Scheduled',
            'Absent',
            'Result Pending',
            'Selected',
            'Rejected',
        ];
    }

    public function index(Request $request)
    {
        $query = JobApplication::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('job_title', 'like', "%{$search}%")
                    ->orWhere('organization', 'like', "%{$search}%")
                    ->orWhere('circular_no', 'like', "%{$search}%")
                    ->orWhere('username', 'like', "%{$search}%")
                    ->orWhere('registration_no', 'like', "%{$search}%")
                    ->orWhere('tracking_no', 'like', "%{$search}%")
                    ->orWhere('exam_centre', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%");
            });
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
        $validated = $request->validate([
            'status' => [
                'required',
                Rule::in($this->allowedStatuses()),
            ],
        ]);

        $fields = [
            'circular_no',
            'circular_publish_date',
            'job_title',
            'organization',
            'ministry',
            'application_start_date',
            'application_end_date',
            'application_fee',
            'req_edu',
            'number_of_post',
            'username',
            'salary',
            'grade',
            'exam_centre',
            'exam_type',
            'registration_no',
            'tracking_no',
        ];

        $data = $request->only($fields);
        $data['status'] = $validated['status'];

        JobApplication::create($data);

        return redirect()
            ->route('jobs.index')
            ->with('success', 'Application added successfully.');
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
        $validated = $request->validate([
            'status' => [
                'required',
                Rule::in($this->allowedStatuses()),
            ],
        ]);

        $fields = [
            'job_title',
            'organization',
            'circular_no',
            'circular_publish_date',
            'circular_link',
            'number_of_post',
            'salary',
            'grade',
            'discipline',
            'ministry',
            'application_start_date',
            'application_end_date',
            'application_fee',
            'tracking_no',

            'exam_taker',
            'exam_type',
            'exam_time',
            'exam_centre',

            'registration_no',

            'preli_date',
            'preli_result',
            'preli_exam_taker',
            'preli_time',
            'preli_centre',

            'written_date',
            'written_result',
            'written_exam_taker',
            'written_time',
            'written_centre',

            'aptitude_date',
            'aptitude_result',
            'aptitude_exam_taker',
            'aptitude_time',
            'aptitude_centre',

            'viva_date',
            'viva_result',
            'viva_exam_taker',
            'viva_time',
            'viva_centre',

            'medical_date',
            'medical_exam_taker',
            'medical_time',
            'medical_centre',

            'final_result',
            'joining_date',
            'req_edu',
            'username',
            'remarks',
        ];

        $data = $request->only($fields);
        $data['status'] = $validated['status'];

        if ($request->filled('password')) {
            $data['password'] = $request->input('password');
        }

        $job->forceFill($data);
        $job->save();

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

    public function dashboard()
    {
        $today = now()->toDateString();

        // Dashboard Statistics
        $totalJobs = JobApplication::count();

        $applied = JobApplication::where('status', 'Applied')->count();

        $examScheduled = JobApplication::where('status', 'Exam Scheduled')->count();

        $absent = JobApplication::where('status', 'Absent')->count();

        $resultPending = JobApplication::where('status', 'Result Pending')->count();

        $selected = JobApplication::where('status', 'Selected')->count();

        $rejected = JobApplication::where('status', 'Rejected')->count();

        // Upcoming Exams
        $examDateFields = [
            'preli_date' => 'Preliminary Examination',
            'written_date' => 'Written Examination',
            'aptitude_date' => 'Aptitude Test',
            'viva_date' => 'Viva Examination',
            'medical_date' => 'Medical Examination',
        ];

        $upcomingExams = [];

        $examJobs = JobApplication::where(function ($query) use ($examDateFields, $today) {
            foreach (array_keys($examDateFields) as $field) {
                $query->orWhere(function ($q) use ($field, $today) {
                    $q->whereNotNull($field)
                        ->whereDate($field, '>=', $today);
                });
            }
        })->get();

        foreach ($examJobs as $job) {
            foreach ($examDateFields as $field => $examName) {
                if ($job->$field && $job->$field >= $today) {
                    $upcomingExams[] = [
                        'job_id' => $job->id,
                        'job_title' => $job->job_title,
                        'organization' => $job->organization,
                        'exam_name' => $examName,
                        'exam_date' => $job->$field,
                    ];
                }
            }
        }

        $upcomingExams = collect($upcomingExams)
            ->sortBy('exam_date')
            ->take(10)
            ->values();

        // Application Closing Soon
        $closingSoon = JobApplication::whereNotNull('application_end_date')
            ->whereDate('application_end_date', '>=', $today)
            ->orderBy('application_end_date')
            ->take(5)
            ->get();

        // Upcoming Events
        $upcomingEvents = [];

        $dateFields = [
            'admit_publish_date' => 'Admit Card',
            'preli_date' => 'Preliminary',
            'written_date' => 'Written',
            'aptitude_date' => 'Aptitude',
            'viva_date' => 'Viva',
            'medical_date' => 'Medical',
            'joining_date' => 'Joining',
        ];

        $calendarJobs = JobApplication::where(function ($query) use ($dateFields) {
            foreach (array_keys($dateFields) as $field) {
                $query->orWhereNotNull($field);
            }
        })->get();

        foreach ($calendarJobs as $job) {
            foreach ($dateFields as $field => $type) {
                if ($job->$field && $job->$field >= $today) {
                    $upcomingEvents[] = [
                        'date' => $job->$field,
                        'type' => $type,
                        'title' => $job->job_title,
                        'organization' => $job->organization,
                        'status' => $job->status,
                        'job_id' => $job->id,
                    ];
                }
            }
        }

        $upcomingEvents = collect($upcomingEvents)
            ->sortBy('date')
            ->take(8)
            ->values();

        // Monthly Calendar
        try {
            $currentMonth = request()->filled('month')
                ? Carbon::createFromFormat('Y-m', request('month'))->startOfMonth()
                : now()->startOfMonth();
        } catch (\Throwable $e) {
            $currentMonth = now()->startOfMonth();
        }

        $dateFields = [
            'admit_publish_date' => 'Admit Card',
            'preli_date' => 'Preliminary',
            'written_date' => 'Written',
            'aptitude_date' => 'Aptitude',
            'viva_date' => 'Viva',
            'medical_date' => 'Medical',
            'joining_date' => 'Joining',
        ];

        $eventsByDate = [];

        $calendarJobs = JobApplication::where(function ($query) use ($dateFields) {
            foreach (array_keys($dateFields) as $field) {
                $query->orWhereNotNull($field);
            }
        })->get();

        foreach ($calendarJobs as $job) {
            foreach ($dateFields as $field => $type) {
                if ($job->$field) {
                    $eventDate = Carbon::parse($job->$field)->toDateString();

                    if (Carbon::parse($eventDate)->format('Y-m') === $currentMonth->format('Y-m')) {
                        $eventsByDate[$eventDate][] = [
                            'title' => $job->job_title,
                            'organization' => $job->organization,
                            'status' => $job->status,
                            'job_id' => $job->id,
                        ];
                    }
                }
            }
        }

        $calendarDays = [];

        $startDate = $currentMonth->copy()->startOfWeek(Carbon::SUNDAY);
        $endDate = $currentMonth->copy()->endOfMonth()->endOfWeek(Carbon::SATURDAY);

        for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay()) {
            $dateString = $date->toDateString();

            $calendarDays[] = [
                'date' => $date->copy(),
                'events' => $eventsByDate[$dateString] ?? [],
                'isCurrentMonth' => $date->month === $currentMonth->month,
            ];
        }

        $previousMonth = $currentMonth->copy()->subMonth()->format('Y-m');
        $nextMonth = $currentMonth->copy()->addMonth()->format('Y-m');

        return view('dashboard', compact(
            'totalJobs',
            'applied',
            'examScheduled',
            'absent',
            'resultPending',
            'selected',
            'rejected',
            'upcomingExams',
            'closingSoon',
            'upcomingEvents',
            'currentMonth',
            'calendarDays',
            'previousMonth',
            'nextMonth'
        ));
    }

    public function calendar(Request $request)
    {
        try {
            $currentMonth = $request->filled('month')
                ? Carbon::createFromFormat('Y-m', $request->month)->startOfMonth()
                : now()->startOfMonth();
        } catch (\Throwable $e) {
            $currentMonth = now()->startOfMonth();
        }

        $dateFields = [
            'admit_publish_date' => 'Admit Card',
            'preli_date' => 'Preliminary',
            'written_date' => 'Written',
            'aptitude_date' => 'Aptitude',
            'viva_date' => 'Viva',
            'medical_date' => 'Medical',
            'joining_date' => 'Joining',
        ];

        $jobs = JobApplication::where(function ($query) use ($dateFields) {
            foreach (array_keys($dateFields) as $field) {
                $query->orWhereNotNull($field);
            }
        })->get();

        $eventsByDate = [];

        foreach ($jobs as $job) {
            foreach ($dateFields as $field => $eventName) {
                if ($job->$field) {
                    $eventDate = Carbon::parse($job->$field)->toDateString();

                    if (Carbon::parse($eventDate)->format('Y-m') === $currentMonth->format('Y-m')) {
                        $eventsByDate[$eventDate][] = [
                            'title' => $job->job_title,
                            'organization' => $job->organization,
                            'type' => $eventName,
                            'status' => $job->status,
                            'job_id' => $job->id,
                        ];
                    }
                }
            }
        }

        $startDate = $currentMonth->copy()->startOfWeek(Carbon::SUNDAY);
        $endDate = $currentMonth->copy()->endOfMonth()->endOfWeek(Carbon::SATURDAY);

        $calendarDays = [];

        for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay()) {
            $dateString = $date->toDateString();

            $calendarDays[] = [
                'date' => $date->copy(),
                'events' => $eventsByDate[$dateString] ?? [],
            ];
        }

        return view('calendar', [
            'currentMonth' => $currentMonth,
            'calendarDays' => $calendarDays,
            'previousMonth' => $currentMonth->copy()->subMonth()->format('Y-m'),
            'nextMonth' => $currentMonth->copy()->addMonth()->format('Y-m'),
        ]);
    }
}
