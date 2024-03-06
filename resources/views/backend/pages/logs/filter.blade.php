@extends(config('system.paths.backend.layout') . 'master')

@section('title')
    - Logs
@endsection

@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
    <style>
        .list-group-item {
            padding: 20px;
            margin-bottom: 10px;
        }

        .list-group-item p {
            margin-bottom: 0;
        }

        .list-group-item details {
            margin-top: 10px;
        }

        .list-group-item details summary {
            cursor: pointer;
            font-weight: bold;
        }

        .list-group-item pre {
            white-space: pre-wrap;
            margin: 0;
            font-family: monospace;
            font-size: 16px;
            padding: 5px;
            background-color: #eee;
        }
    </style>
@endsection

@section('content')
    <!-- Main content -->
    <h2 class="text-center display-4 mb-4">Logs Filter Options</h2>
    <form action="{{ route('logs.handleFilter') }}" method="post" id="filter_form">
        @csrf
        <div class="row">
            <div class="col-md-10 offset-md-1 mt-4">
                <div class="row">
                    <!-- Action Type Dropdown -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="action_type">Action Type:</label>
                            <div class="select2-dark">
                                <select name="action_type[]" class="select2" id="action_type" multiple="multiple"
                                    data-placeholder="Action Type" data-dropdown-css-class="select2-dark"
                                    style="width: 100%;">
                                    <option value="">All action</option>
                                    <option value="created">Created</option>
                                    <option value="updated">Updated</option>
                                    <option value="deleted">Deleted</option>>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Table Name Dropdown -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="table_name">Table Name:</label>
                            <div class="select2-dark">
                                <select name="table_name[]" class="select2" id="table_name" multiple="multiple"
                                    data-placeholder="Table Name" data-dropdown-css-class="select2-dark"
                                    style="width: 100%;">
                                    <option value="">All tables</option>
                                    @foreach ($tables as $table)
                                        <option value="{{ $table }}">{{ $table }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Role Dropdown -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="role">Role:</label>
                            <div class="select2-dark">
                                <select name="role[]" class="select2" id="role" multiple="multiple"
                                    data-placeholder="Role" data-dropdown-css-class="select2-dark" style="width: 100%;">
                                    <option value="">All roles</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Date Fields -->
                    <div class="col-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="date_from">Date from:</label>
                                    <input type="date" name="date_from" id="date_from" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="date_to">Date to:</label>
                                    <input type="date" name="date_to" id="date_to" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order By Dropdown -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="order_by">Order By:</label>
                            <select name="order_by" class="select2" id="order_by" data-dropdown-css-class="select2-dark"
                                style="width: 100%;">
                                <option value="created_at" selected>Created Date</option>
                                <option value="updated_at">Updated Date</option>
                            </select>
                        </div>
                    </div>

                    <!-- Sort Order Dropdown -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="sort_order">Sort Order:</label>
                            <select name="sort_order" class="select2" id="sort_order" data-dropdown-css-class="select2-dark"
                                style="width: 100%;">
                                <option value="asc" selected>ASC</option>
                                <option value="desc">DESC</option>
                            </select>
                        </div>
                    </div>

                    @can('logs.filter')
                        <!-- Filter Button -->
                        <div class="col-12 mt-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-block btn-dark">Filter</button>
                            </div>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </form>

    <!-- ... (previous code) -->
    <div class="row mt-3">
        <div class="col-md-10 offset-md-1">
            <div class="list-group" id="list_group"></div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Select2 -->
    <script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function() {
            $('.select2').select2();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterForm = document.getElementById('filter_form');
            const listGroup = document.getElementById('list_group');

            filterForm.addEventListener('submit', function(event) {
                event.preventDefault();

                const formData = new FormData(this);

                fetch('{{ route('logs.handleFilter') }}', {
                        method: 'post',
                        body: formData,
                        headers: {
                            'X-CSRF-Token': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        const logs = data.logs;

                        // Clear previous logs
                        listGroup.innerHTML = '';

                        if (logs.length > 0) {
                            logs.forEach(log => {
                                const listItem = document.createElement('div');
                                listItem.classList.add('list-group-item');

                                const oldData = JSON.parse(log.old_data);
                                const newData = JSON.parse(log.new_data);

                                listItem.innerHTML = `
                <h4 class="mb-1"><label>Log ID:</label> <span>${log.id}</span></h4>
                <p class="mb-1"><label>Action:</label> <span>${log.action}</span></p>
                <p class="mb-1"><label>Table Name:</label> <span>${log.table_name}</span></p>
                <p class="mb-1"><label>User ID:</label> <span>${log.user_id}</span></p>

                <details>
                    <summary>Old Data</summary>
                    <pre>${JSON.stringify(oldData, null, 2)}</pre>
                </details>

                <details class="mb-3">
                    <summary>New Data</summary>
                    <pre>${JSON.stringify(newData, null, 2)}</pre>
                </details>

                <p class="mb-1"><label>Request URL:</label> <span>${log.request_url}</span></p>
                <p class="mb-1"><label>Request Method:</label> <span>${log.request_method}</span></p>
                <p class="mb-1"><label>Remote Address:</label> <span>${log.remote_address}</span></p>
                <p class="mb-1"><label>Path:</label> <span>${log.path}</span></p>
                <p class="mb-1"><label>Host:</label> <span>${log.host}</span></p>
                `;

                                listGroup.appendChild(listItem);
                            });
                        } else {
                            const noLogsItem = document.createElement('div');
                            noLogsItem.classList.add('list-group-item');
                            noLogsItem.textContent = 'No logs found.';
                            listGroup.appendChild(noLogsItem);
                        }
                    });
            });
        });
    </script>
@endsection
