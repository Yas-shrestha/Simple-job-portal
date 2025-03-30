@extends('backend.layouts.main')

@section('container')
    <div class="container py-3">
        <h1 class="text-center">Job Details & Applications</h1>
        <div class="bg-white my-3 p-3 rounded-3">
            <!-- Job Details Section -->
            <h3>{{ $job->title }}</h3>
            <p><strong>Location:</strong> {{ $job->location }}</p>
            <p><strong>Salary:</strong> Rs {{ $job->salary }} per month</p>
            <p><strong>Description:</strong> {{ $job->description }}</p>

            <!-- Applicants Section -->
            <h4 class="mt-4">Applicants</h4>
            @foreach ($applications as $application)
                <div class="my-3 p-3 border rounded">
                    <div class="d-flex justify-content-between">
                        <h5>{{ $application->user->name }}</h5>
                        <form action="{{ route('application.delete', $application->id) }}" method="POST"
                            id="deleteForm{{ $application->id }}" onsubmit="return confirmDelete()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>



                    </div>
                    <p><strong>Status:</strong> {{ $application->updated_at->diffForHumans() }}</p>

                    <!-- User Details -->
                    <p><strong>Email:</strong> {{ $application->user->email }}</p>
                    <p><strong>Phone:</strong> {{ $application->user->phone ?? 'N/A' }}</p>

                    <!-- Documents Section -->
                    <h6 class="mt-2">Uploaded Documents</h6>
                    @if ($application->cover_letter)
                        @foreach (json_decode($application->cover_letter) as $document)
                            <p><strong>{{ $document }}:</strong> <a href="{{ asset($document) }}"
                                    target="_blank"><iframe src="{{ asset($document) }}" width="100%" height="500px"
                                        frameborder="0"></iframe></a>
                            </p>
                        @endforeach
                    @else
                        <p>No documents uploaded.</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this application?');
        }
    </script>
@endsection
