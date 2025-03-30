@extends('backend.layouts.main')
@section('container')
    <!-- Content wrapper -->
    <div class="container py-3">
        <h1 class="text-center ">View Application</h1>
        <div class="bg-white my-3 p-3 rounded-3">
            <table class="table table-light table-striped table-hover table-bordered table-sm table-responsive-sm">
                <thead>
                    <tr>
                        <th scope="col">S.N</th>
                        <th scope="col">Job Name</th>
                        <th scope="col">Applied_time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($applications as $application)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $application->job->title }}</td>
                            <td>{{ $application->updated_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
