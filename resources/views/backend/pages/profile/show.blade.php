@extends(config('system.paths.backend.layout') . 'master')

@section('title')
    - Profile
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3><i class="fas fa-user"></i> User Profile</h3>
                    </div>

                    <div class="card-body">
                        <h3>{{ Str::ucfirst($user->name) ?? 'N/A' }}</h3>
                        <p><b>Email:</b>&nbsp;{{ $user->email ?? 'N/A' }}</p>
                        <p><b>Username:</b>&nbsp;{{ $user->username ?? 'N/A' }}</p>

                        @can('profile.update')
                            <!-- Personal Details -->
                            <div class="persona-details-container">
                                <form class="mt-4" method="POST" action="{{ route('profile.update', $user->id) }}">
                                    @csrf
                                    @method('patch')
    
                                    <fieldset>
                                        <legend><i class="fas fa-user-circle"></i> Personal Details</legend>
    
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                value="{{ $user->name }}">
                                        </div>
    
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" name="email" class="form-control"
                                                value="{{ $user->email }}">
                                        </div>
    
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" id="username" name="username" class="form-control"
                                                value="{{ $user->username }}">
                                        </div>
    
                                        <button type="submit" class="btn btn-outline-primary">Update Profile</button>
                                    </fieldset>
                                </form>
                            </div>
                        @endcan

                        @can('profile.change-password')
                            <div class="change-password-container" style="margin-top: 50px;">
                            <!-- Change Password -->
                            <form class="mt-4" method="POST" action="{{ route('profile.change-password', $user->id) }}"
                                id="change_password_form">
                                @csrf
                                @method('patch')

                                <fieldset class="mt-4">
                                    <legend><i class="fas fa-lock"></i> Change Password</legend>

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

                                    <button type="submit" class="btn btn-outline-primary">Change Password</button>
                                </fieldset>
                            </form>
                            </div>
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
