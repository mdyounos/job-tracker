<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $fillable = [
        'circular_no',
        'circular_publish_date',
        'number_of_post',
        'username',
        'password',
        'department',
        'job_title',
        'registration_no',
        'discipline',
        'organization',
        'tracking_no',
        'application_start_date',
        'ministry',
        'exam_taker',
        'exam_type',
        'exam_date',
        'exam_time',
        'application_end_date',
        'application_fee',
        'salary',
        'grade',
        'circular_link',
        'req_edu',
        'exam_centre',
        'remarks',
        'status'
    ];
}
