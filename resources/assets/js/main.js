$(function () {
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
    });
});

//region Alert close and auto hide
$('#close-success-alert').click(function () {
    $('#success-msg').remove();
});

$('#close-error-alert').click(function () {
    $('#error-msg').remove();
});

$("#success-msg, #error-msg").delay(5000).slideUp(700);
//endregion

$.ajaxSetup({headers: {'csrftoken': '{{ csrf_token() }}'}});

$('.btn-delete').click(function () {
    var url = $(this).data("url");
    var method = $(this).data("method");
    $('#delete-action').attr('href', url).attr('method', method);
});

$('#delete-action').click(function () {
    event.preventDefault();
    var url = $(this).attr("href");
    var method = $(this).attr("method");
    var token = $('meta[name=_token]').attr('content');

    $.ajax({
        method: method != null ? method : "POST",
        url: url,
        data: {'_token': token},
        beforeSend: function () {
            $('#AskRemove').modal('hide');
            $('#loading-element').show();
        },
        success: function (data) {
            if (data != 0) {
                $('#item-' + data).effect('highlight', {}, 100, function () {
                    $(this).fadeOut('fast', function () {
                        $(this).remove();
                    });
                });
                $('#loading-element').hide();
            }
            else location.reload();
        },
        error: function () {
            alert('Ошибка при удалении записи');
            $('#loading-element').hide();
        }
    });
});