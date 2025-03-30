<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $publishedjobs = Job::latest()->where('user_id', Auth::id())->paginate(10);
        $jobs = Job::latest()->paginate(10);
        return view('backend.index', compact('publishedjobs', 'jobs'));
    }
    public function ApplyJob($id)
    {
        $job = Job::query()->where('id', $id)->first();
        return view('apply', compact('job'));
    }

    public function uploadDocuments(Request $request, $id)
    {
        $request->validate([
            'documents.*' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $uploadedFiles = [];

        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $file) {
                $filename = time() . '-' . $file->getClientOriginalName();
                $destinationPath = public_path('documents'); // Store in public/documents
                $file->move($destinationPath, $filename);
                $uploadedFiles[] = 'documents/' . $filename;
            }
        }

        // Save application to the database
        $application = new Application;
        $application->job_id = $id;
        $application->user_id = Auth::id();
        $application->cover_letter = json_encode($uploadedFiles); // Store file paths as JSON
        $application->save();

        return back()->with('success', 'Files uploaded successfully!');
    }
    public function showApplications()
    {
        $applications = Application::where('user_id', Auth::id())->latest()->paginate(10);
        return view('backend.application.user-view', compact('applications'));
    }
    public function showApplicationsAdmin()
    {
        $user = Auth::user();

        // Get all jobs posted by the user (company)
        $jobs = Job::where('user_id', $user->id)->get();

        // Get all applications for those jobs
        $applications = Application::whereIn('job_id', $jobs->pluck('id'))
            ->latest()
            ->paginate(10); // Paginate results for better UI

        return view('backend.application.company-view', compact('applications'));
    }
    public function viewJobApplications($jobId)
    {
        $user = Auth::user();

        // Get the job details
        $job = Job::findOrFail($jobId);

        // Check if the authenticated user is the one who posted the job (the company)
        if ($job->user_id != $user->id) {
            abort(403, 'Unauthorized access');
        }

        // Get all applications for this job
        $applications = Application::where('job_id', $jobId)->get();

        return view('backend.application.job-application', compact('job', 'applications'));
    }
    public function deleteApplication($id)
    {
        $application = Application::findOrFail($id);
        $application->delete();

        return back()->with('success', 'Application deleted successfully!');
    }
}
