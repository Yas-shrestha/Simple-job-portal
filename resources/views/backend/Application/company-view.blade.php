@extends('backend.layouts.main')

@section('container')
    <div class="container py-3">
        <h1 class="text-center">Applications for Your Jobs</h1>
        <div class="bg-white my-3 p-3 rounded-3">
            @if ($applications->isEmpty())
                <p>No applications yet for your jobs.</p>
            @else
                <ul>
                    @foreach ($applications as $application)
                        <li class="my-3 p-3 border rounded">
                            <h4>{{ $application->job->title }}</h4> <!-- Display the job title -->
                            <p>Applicant: {{ $application->user->name }}</p> <!-- Display applicant name -->
                            <p>Status: {{ $application->updated_at->diffForHumans() }}</p>
                            <!-- Display application status -->
                            <p>Location: {{ $application->job->location }}</p> <!-- Display job location -->
                            <a href="{{ route('job.applications', $application->job->id) }}" class="btn btn-primary mt-2">
                                View Applicants & Details
                            </a>
                        </li>
                    @endforeach
                </ul>

                <!-- Pagination links -->
                {{ $applications->links() }}
            @endif
        </div>
    </div>
@endsection
