@extends('layouts.frontend')
@section('content')
    <div class="container">
        <div class="jobs-listing">
            <h1>Job Listing</h1>
            <div class="jobs-grid">

                @foreach ($jobs as $job)
                    <article class="job-card">
                        <div class="job-header">
                            <div>
                                <h3 class="job-title">{{ $job->title }}</h3>
                                <p class="company-name">{{ $job->user->company?->name ?? 'No company listed' }}</p>
                            </div>
                            @php
                                $companyImg = $job->user->company->img;
                                $isUrl = filter_var($companyImg, FILTER_VALIDATE_URL); // checks if it's a web URL
                            @endphp
                            <div>
                                <a href="{{ $isUrl ? $companyImg : asset('uploads/' . $companyImg) }}">
                                    <img src="{{ $isUrl ? $companyImg : asset('uploads/' . $companyImg) }}"
                                        alt="company image" height="100px" width="100px">
                                </a>
                            </div>
                        </div>

                        <div class="job-footer">
                            <span class="location">{{ $job->user->company?->location ?? 'No Location' }}</span>
                            <a href="{{ route('apply.job', $job->id) }}" class="apply-button">Apply</a>
                        </div>
                    </article>
                @endforeach

            </div>
        </div>
    </div>
@endsection
