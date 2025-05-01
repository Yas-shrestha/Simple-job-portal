@extends('backend.layouts.main')
@section('container')
    <!-- Content wrapper -->
    <div class="container py-3">
        <h1>Welcome to Job-Portal</h1>
        <div class="bg-white rounded-3  p-3">
            @if (Auth::user() && Auth::user()->role == 'company')
                <div>
                    <h1>Add Job</h1>
                    <a href="{{ route('job.create') }}" class="btn btn-primary">Add</a>
                </div>
            @elseif (Auth::user() && Auth::user()->role == 'user')
                <div>
                    <h1 class="text-center">See <span class="text-primary">Jobs</span></h1>
                    <div class="card mb-3">
                        @foreach ($jobs as $job)
                            <div class="row g-0 my-2">
                                <div class="col-md-4 ">

                                    @php
                                        $end = \Carbon\Carbon::parse($job->end_date);
                                        $isExpired = $end->isPast();
                                        $companyImg = $job->user->company->img;
                                        $isUrl = filter_var($companyImg, FILTER_VALIDATE_URL); // checks if it's a web URL
                                    @endphp
                                    <img src="{{ $isUrl ? $companyImg : asset('uploads/' . $companyImg) }}" alt="..."
                                        class="img-fluid rounded-start"
                                        style="height: 200px; width: 100%; object-fit: cover; object-position: center;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $job->title }}</h5>
                                        <div class="d-flex justify-content-between">
                                            <p class="card-text"><small class="text-muted">Loaction : {{ $job->location }}
                                                </small></p>
                                            <p class="card-text"><small class="text-muted">Approximate Salary :
                                                    Rs {{ $job->salary }} per mth
                                                </small></p>
                                        </div>
                                        <p class="card-text">{{ $job->description }}</p>
                                        <span class="badge {{ $isExpired ? 'bg-danger' : 'bg-warning text-dark' }}">
                                            {{ $isExpired ? 'Deadline Passed' : 'Apply Before: ' . $end->format('F j, Y') }}
                                        </span>
                                        <div class="d-flex justify-content-between">
                                            <p class="card-text"><small class="text-muted">Last updated
                                                    {{ $job->updated_at->diffForHumans() }}</small></p>
                                            <a href="{{ route('apply.job', $job->id) }}" class="btn btn-primary">Apply
                                                Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
