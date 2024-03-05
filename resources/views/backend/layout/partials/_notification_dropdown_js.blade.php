    <script>
        $(function() {
            $.ajax({
                url: '{{ route('notifications.get-unread') }}',
                method: 'GET',
                success: function(response) {
                    $('#unread-notifications-count').text(response.length);

                    var html = '';

                    for (var i = 0; i < response.length; i++) {
                        html += '<a href="' + '/notifications/show/' + response[i].id +
                            '" class="dropdown-item notification" data-notification-id="' + response[i]
                            .id + '">' +
                            '<span class="float-right close-notification"><i class="fas fa-xs fa-times" style="opacity: 0.5;"></i></span>' +
                            response[i].message +
                            '</a>';
                    }

                    $('#unread-notifications').html(html);

                    $('.close-notification').click(function(e) {
                        e.preventDefault();

                        var notificationId = $(this).closest('.notification').data(
                            'notification-id');

                        $.ajax({
                            url: '/notifications/mark-as-read/' + notificationId,
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                            },
                            success: function(response) {
                                $('#unread-notifications-count').text(response
                                    .unread_count);
                                $('.notification[data-notification-id="' +
                                    notificationId + '"]').remove();
                            }
                        });
                    });
                }
            });
        });
    </script>
