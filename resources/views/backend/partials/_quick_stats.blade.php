<div class="row mb-4">
    <div class="col-md-6">
        <div class="card h-100">  
            <div class="card-header">
                <h3 class="card-title">User Management</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="info-box bg-primary">
                            <span class="info-box-icon"><i class="fas fa-users"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">New Members&nbsp;<small>(Last 7 days)</small></span>
                                <span class="info-box-number">{{ $newRegisteredMembersCount }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box bg-success">
                            <span class="info-box-icon"><i class="fas fa-key"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Roles</span>
                                <span class="info-box-number">{{ $rolesCount }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="info-box bg-info">
                            <span class="info-box-icon"><i class="fas fa-user-shield"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Permissions</span>
                                <span class="info-box-number">{{ $permissionsCount }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header">
                <h3 class="card-title">System Monitoring</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="info-box bg-danger">
                            <span class="info-box-icon"><i class="fa fa-history"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">System Logs</span>
                                <span class="info-box-number">{{ $logsCount }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box bg-warning">
                            <span class="info-box-icon"><i class="fas fa-user-shield"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Notifications</span>
                                <span class="info-box-number">{{ $notifCount }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
