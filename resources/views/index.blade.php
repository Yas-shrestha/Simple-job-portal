@extends('layouts.frontend')
@section('content')
    <section class="hero-section"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ asset('assets/images/jobb.jpg') }});">
        <div class="hero-content">
            <h2 class="hero-title">Elevate Careers.</h2>
            <p class="hero-desc">Powering Youth to Find a place where they belong</p>
            <div>
                <form action="{{ route('search') }}" class="search-container" method="GET">
                    @csrf
                    <input type="text" name="job" class="search-input" placeholder="Job title or keywords" />
                    <div class="location-search">
                        <input type="text" name="location" class="location-input" placeholder="Location" />
                        <button type="submit" class="search-button">Search Jobs</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <main class="main-content">
        <section class="categories-section">
            <h2 class="section-title">Job Categories</h2>
            <div class="categories-grid">
                <article class="category-card">
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/c7bfab3a4499c777ba94d6be097a78b3e0ab24c7?placeholderIfAbsent=true&apiKey=93eb1b98c04f45d4bb891c2509fbcfdd"
                        alt="IT Icon" class="category-icon" />
                    <h3 class="category-title">IT</h3>
                </article>
                <article class="category-card">
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/dd6aa61efc640455c8fc1bd9648fa476a4173bba?placeholderIfAbsent=true&apiKey=93eb1b98c04f45d4bb891c2509fbcfdd"
                        alt="Finance Icon" class="category-icon" />
                    <h3 class="category-title">Finance</h3>
                </article>
                <article class="category-card">
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/1158fd342ac8f616c99006a8700f980879456d35?placeholderIfAbsent=true&apiKey=93eb1b98c04f45d4bb891c2509fbcfdd"
                        alt="Marketing Icon" class="category-icon" />
                    <h3 class="category-title">Marketing</h3>
                </article>
                <article class="category-card">
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/d2778f7845926e706dcb661df96d90f72f6148b2?placeholderIfAbsent=true&apiKey=93eb1b98c04f45d4bb891c2509fbcfdd"
                        alt="Engineering Icon" class="category-icon" />
                    <h3 class="category-title">Engineering</h3>
                </article>
            </div>
        </section>

        <section class="featured-jobs">
            <h2 class="section-title">Featured Jobs</h2>
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
        </section>
    </main>
@endsection
