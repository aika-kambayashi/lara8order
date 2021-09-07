$(function() {
    $('#adminOrderEdit2Button').on('click',adminOrderEditRequest);
});

function adminOrderEditRequest(event) {
    adminOrderEditFormInit();
    let data = $('#orderEdit').serialize();
    $.ajax({
        url: "/lara8order/admin/order/" + data.id + "/edit2ajax",
        type: "POST",
        data: data,
        dataType: "json",
    }).done(adminOrderEditSuccess).fail(adminOrderEditError);
}

function adminOrderEditFormInit() {
    $('#message').remove();
    $('.help-block').remove();
    $('.form-group').removeClass('has-error');
}

function adminOrderEditSuccess(result) {
    if(result['status'] == 'success') {
        showSuccessMessage("受注を更新しました");
    } else {
        showErrorMessage("登録に失敗しました");
        showValidationMessage(result['errors']);
    }
}

function adminOrderEditError(result) {
    showErrorMessage("エラーが発生しました");
}

function showSuccessMessage(message) {
    var tag = '<div id="message" class="alert alert-success">';
    tag += message;
    tag += '</div>';
    $('.main').prepend(tag); 
}

function showErrorMessage(message) {
    var tag = '<div id="message" class="alert alert-danger">';
    tag += message;
    tag += '</div>';
    $('.main').prepend(tag); 
}

function showValidationMessage(errors) {
    for (key in errors) {
        var obj = $("[name='" + key + "']");
        obj.parent().addClass('has-error');
        var field = errors[key];
        for (var value in field) {
            var tag = '<div class="help-block">' + field[value] + '</div>';
            obj.after(tag);
        }
    }
}