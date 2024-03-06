<div class="input-group mb-3">
    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
        placeholder="Email address" required="required" autocomplete="true" autofocus>
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="bi bi-envelope-open"></span>
        </div>
    </div>
    @error('email')
        <span class="text-danger text-left">{{ $message }}</span>
    @enderror
</div>

<div class="input-group mb-3">
    <input type="password" class="form-control  @error('email') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}"
        placeholder="Password" required />
    <div class="input-group-append">
        <div class="input-group-text">
            <i class="bi bi-eye-slash" id="togglePassword" style="cursor: pointer;"></i>
        </div>
    </div>
        @error('password')
            <span class="text-danger text-left">{{ $message }}</span>
        @enderror
</div>

<div class="social-auth-links text-center mt-4">
    <div class="text-left">
        <a href="/forgot-password" style="color: #b98b40 !important; text-decoration: underline;">Forgot password?</a>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <input type="checkbox" id="remember" value="1" checked>
        <button type="submit" class="btn btn-sm btn-block p-2" style="background-color:#b98b40 !important"><span
                style="color:white;">Login</span></button>
    </div>
</div>

