@if (isset($errors) && count($errors) > 0)
    @foreach ($errors->all() as $error)
        <script>
            $(document).ready(function() {
                toastr.error('{{ $error }}', '', {
                    positionClass: 'toast-top-right',
                    preventDuplicates: true,
                    timeOut: 3000,
                    extendedTimeOut: 600,
                });
            });
        </script>
    @endforeach
@endif

@if (Session::get('success', false))
    <?php $data = Session::get('success'); ?>
    @if (is_array($data))
        @foreach ($data as $msg)
            <script>
                $(document).ready(function() {
                    toastr.success('{{ $msg }}', '', {
                        positionClass: 'toast-top-right',
                        preventDuplicates: true,
                        timeOut: 3000,
                        extendedTimeOut: 600,
                    });
                });
            </script>
        @endforeach
    @else
        <script>
            $(document).ready(function() {
                toastr.success('{{ $data }}', '', {
                    positionClass: 'toast-top-right',
                    preventDuplicates: true,
                    timeOut: 3000,
                    extendedTimeOut: 600,
                });
            });
        </script>
    @endif
@endif
