@extends(config('system.paths.backend.layout') . 'master')

@section('title')
    - Profile
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3><i class="fas fa-lock"></i> Change Password</h3>
                    </div>

                    <div class="card-body">
                        @can('profile.change-password')
                            <!-- Change Password -->
                            <form class="mt-3" method="POST" action="{{ route('profile.change-password', ['profile' => $user->id]) }}" id="change_password_form">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="old_password">Old Password</label>
                                    <input type="password" id="old_password" name="old_password" class="form-control"
                                        placeholder="Old password" required>
                                </div>

                                <!-- Add a hidden input to store the hashed password -->
                                <input type="hidden" id="hashed_password" value="{{ $user->password }}">

                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="New password" required>
                                </div>

                                <button type="submit" class="btn btn-outline-primary mt-3" disabled>Change Password</button>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var oldPassword = document.getElementById('old_password');
            var hashedPassword = document.getElementById('hashed_password').value;

            oldPassword.addEventListener('input', function() {
                var enteredOldPassword = oldPassword.value;

                if (!checkPasswordMatch(enteredOldPassword, hashedPassword)) {
                    oldPassword.setCustomValidity('Old password does not match.');
                } else {
                    oldPassword.setCustomValidity('');
                }
            });

            function checkPasswordMatch(enteredPassword, hashedPassword) {
                return enteredPassword !== '' && bcrypt.compareSync(enteredPassword, hashedPassword);
            }
        });
    </script>
@endsection
