<div class="input-group mb-3">
    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-lock"></span>
        </div>
    </div>
</div>
<div id="popover-password">
    <p>Password Strength: <span id="result"> </span></p>
    <div class="progress" style="height:5px;">
        <div id="password-strength" class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0"
            aria-valuemax="100" style="width:0%"> </div>
    </div>
    <p>&nbsp;</p>
</div>


<div class="input-group mb-3">
    <input type="password" id="confirm-password" name="confirm_password" class="form-control"
        placeholder="Retype password" required>
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-lock"></span>
        </div>
    </div>
</div>
<p id="popover-cpassword"style="display:none;color:red;"></p>
