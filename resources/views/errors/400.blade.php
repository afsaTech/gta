@extends(config('system.paths.backend.layout') . 'master')

@section('title')
    - 400 Bad Request
@endsection

@section('content')
    <div class="error-page">
        <h2 class="headline text-danger">400</h2>

        <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-danger"></i> Bad Request</h3>
            <p class="mt-4">
                Your request was invalid.
            <p>
                {{ $exception->getMessage() }}
            </p>
            Please try again or contact the administrator.
            </p>
        </div>
    </div>
@endsection
