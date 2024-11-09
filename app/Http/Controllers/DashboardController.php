<?php

namespace App\Http\Controllers;

use App\Models\JobCandidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function my_applications()
    {
        $user = Auth::user();
        $my_applocations = JobCandidate::where('candidate_id', $user->id)->orderByDesc('id')->paginate(10);
        return view('admin.job_candidates.show', compact('my_applocations'));
    }

    function my_application_details(JobCandidate $jobCandidate)
    {
        $user = Auth::user();
        if ($jobCandidate->candidate_id != $user->id) {
            abort(403);
        }
        return view('admin.job_candidates.show', compact('jobCandidate'));
    }
}
