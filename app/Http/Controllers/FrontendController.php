<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $jobs = Job::with('user.company')->latest()->take(4)->get();
        return view('index', compact('jobs'));
    }
    public function jobs()
    {

        $jobs = Job::with('user.company')
            ->whereDate('end_date', '>=', Carbon::today())
            ->latest()
            ->paginate(10);
        return view('jobs', compact('jobs'));
    }
    public function contact()
    {
        return view('contact');
    }
    public function search(Request $request)
    {
        $query = Job::with('user.company');

        if ($request->filled('job')) {
            $query->where('title', 'like', '%' . $request->job . '%');
        }

        if ($request->filled('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        $jobs = $query->latest()->paginate(10);

        return view('search', compact('jobs'));
    }
    public function contactStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Contact::create($request->all());

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
