<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::latest()->where('user_id', Auth::id())->paginate(10);
        return view('backend.job.index', compact('jobs'));
    }
    public function store(Request $request)
    {
        $job = new Job;
        $request->validate([
            'title' => 'required|string|max:255',
            'img' => 'nullable',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0', // Ensure salary is a valid number
        ]);

        $job->title = $request->title;
        $job->img = $request->img;
        $job->description = $request->description;
        $job->location = $request->location;
        $job->salary = (float) $request->salary; // Convert salary to float to match decimal field
        $job->user_id = Auth::id();
        $job->save();
        return redirect()->route('job.index')->with('success', 'Job created successfully');
    }
    public function create(Request $request)
    {
        $files = File::query()->where('user_id', Auth::id())->paginate(9);
        return view('backend.job.create', compact('files'));
    }
    public function edit($id)
    {
        $job = Job::query()->where('id', $id)->first();
        $files = File::query()->where('user_id', Auth::id())->paginate(9);
        return view('backend.job.edit', compact('job', 'files'));
    }
    public function show($id)
    {
        $job = Job::query()->where('id', $id)->first();
        $files = File::query()->where('user_id', Auth::id())->paginate(9);
        return view('backend.job.show', compact('job', 'files'));
    }
    public function update(Request $request, $id)
    {
        $job = Job::query()->where('id', $id)->first();
        $request->validate([
            'title' => 'required|string|max:255',
            'img' => 'nullable',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0', // Ensure salary is a valid number
        ]);

        $job->title = $request->title;
        $job->description = $request->description;
        $job->img = $request->img;
        $job->location = $request->location;
        $job->salary = (float) $request->salary; // Convert salary to float to match decimal field
        $job->user_id = Auth::id();
        $job->save();
        return redirect()->route('job.index')->with('success', 'Job created successfully');
    }
    public function destroy($id)
    {
        $job = Job::query()->where('id', $id)->first();
        $job->delete();
        return redirect()->route('job.index')->with('success', 'Job created successfully');
    }
}
