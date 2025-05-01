@extends('backend.layouts.main')
@section('container')
    <main id="main" class="main">
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid p-4">

                    <div class="pagetitle">
                        <div class="d-flex justify-content-between">
                            <h1>View</h1>
                            <a href="{{ route('job.index') }}" class="btn btn-primary btn-md p-3">Back</a>
                        </div>
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">view-job</li>
                            </ol>
                        </nav>
                    </div><!-- End Page Title -->
                    <section class="section">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('job.update', $job->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Title</label>
                                                    <input disabled type="text" class="form-control"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp" name="title"
                                                        value="{{ $job->title }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Location</label>
                                                    <input disabled type="text" class="form-control"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp" name="location"
                                                        value="{{ $job->location }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="endDate" class="form-label">End Date</label>
                                                    <input type="date" class="form-control" id="endDate"
                                                        name="end_date" value="{{ $job->end_date }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Salary</label>
                                                    <input disabled type="number" class="form-control"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp" name="salary"
                                                        value="{{ $job->salary }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputText1" class="form-label">Description</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3">{{ $job->description }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </section>
        </div>
    </main>
@endsection
