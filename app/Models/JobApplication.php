<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $fillable = [

        'circular_no',

        'circular_publish_date',

        'job_title',

        'organization',

        'ministry',

        'application_end_date',

        'req_edu',

        'status'
    ];
}
