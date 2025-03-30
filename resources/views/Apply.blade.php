@extends('backend.layouts.main')
@section('container')
    <!-- Content wrapper -->
    <div class="container py-3">
        <h1 class="text-center ">Apply job</h1>
        <div class="bg-white my-3 p-3 rounded-3">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <img src="{{ asset('uploads/' . $job->img) }}" style="width:100%;height:100%" alt="">
                </div>
                <div class="col-lg-6 col-sm-12">
                    <h1 class="text-primary">{{ $job->title }}</h1>
                    <div class="d-flex justify-content-between">
                        <p class="card-text"><small class="text-muted">Loaction : {{ $job->location }}
                            </small></p>
                        <p class="card-text"><small class="text-muted">Approximate Salary :
                                Rs {{ $job->salary }} per mth
                            </small></p>
                    </div>
                    <p>{{ $job->description }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white shadow rounded p-4 my-3">
            <h5 class="mb-3">Upload Your Documents</h5>
            <form action="{{ route('jobs.upload', $job->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row align-items-end">
                    <div class="col-md-10">
                        <label for="formFile" class="form-label fw-bold">Upload CV & Cover Letter</label>
                        <input class="form-control" type="file" name="documents[]" id="formFile" multiple required>
                        <small class="text-muted d-block mt-1">Please upload both CV and Cover Letter (PDF/DOCX).</small>
                    </div>
                    <div class="col-md-2 text-end">
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection
