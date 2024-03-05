@extends(config('system.paths.backend.layout') . 'master')

{{-- CSS Section --}}
@section('css')
    <!-- Additional CSS specific for the guest role -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/your-custom-guest-css.css') }}">
@endsection

{{-- Content Section --}}
@section('content')
    <div class="content-wrapper">
        <!-- Header Section -->
        <section class="content-header">
            <h1>
                Guest Dashboard
                <small>Welcome, {{ Auth::user()->name }}</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Quick Actions -->
            <div class="row">
                <!-- Add your quick action buttons here -->
            </div>

            <!-- Summary Panels -->
            <div class="row">
                <!-- Add your summary panels here -->
            </div>

            <!-- Recent Activity Feed -->
            <div class="row">
                <!-- Add recent activity feed here -->
            </div>

            <!-- Graphs/Charts (Optional) -->
            <div class="row">
                <!-- Add graphs/charts here (if applicable) -->
            </div>
        </section>
    </div>
@endsection

{{-- JS Section --}}
@section('js')
    <!-- Additional JS specific for the guest role -->
    <script src="{{ asset('adminlte/plugins/your-custom-guest-js.js') }}"></script>
@endsection
