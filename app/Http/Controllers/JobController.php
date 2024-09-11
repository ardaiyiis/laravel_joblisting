<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::latest()->with(['employer', 'tags'])->get()->groupBy('featured');// returns two list with the help of 'featured' attr

        return view('jobs.index', [
            'featuredJobs'=> $jobs[0],
            'jobs'=> $jobs[1],
            'tags'=> Tag::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        

        $jobAttributes = $request->validate([
            'title' => ['required'],
            'salary' => ['required'],
            'location' => ['required'],
            'schedule' => ['required', Rule::in(['Full Time', 'Part Time'])],
            'url' => ['required', 'active_url'],
            'tags' => ['nullable'],
        ]);
        
        $jobAttributes['featured'] = $request->has('feature');

        $job = Auth::user()->employer->jobs()->create(Arr::except($jobAttributes, 'tags'));//with this employer id comes along

        if ($jobAttributes['tags']){
            foreach (explode(',', $jobAttributes['tags']) as $tag){
                $job->tag($tag);
            }
        }

        return redirect('/');

    }
}
