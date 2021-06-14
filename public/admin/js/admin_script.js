(function () {
    feather.replace()
})()

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {
    $("body").on("click", ".deleteRecord", function (e) {
        const id = $(this).data("id");

        if (!confirm("Подтверждаете удаление c #ID " + id + " ?")) {
            return false;
        }

        e.preventDefault();

        const $row = $(this).closest("tr");

        const token = $("meta[name='csrf-token']").attr("content");
        const url = e.target.href;

        $.ajax({
            url: url,
            type: "POST",
            data: {_token: token, id: id, _method: 'DELETE'},
            success: function (json) {
                const $notification = $('.notification');

                $notification.html('');

                if (json['success']) {
                    $notification.append(json['success']);

                    $row.remove();
                } else {
                    $notification.append(json['error']);
                }

                $('.toast').toast({
                    'delay': 1000
                }).toast('show');

                $('.toast').on('hidden.bs.toast', function () {
                    location.reload();
                })
            },
        });
    });
});
