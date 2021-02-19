$(function(){
//    $('.input-time').inputmask('hh:mm:ss', {placeholder: 'hh:mm:ss', insertMode: false, showMaskOnHover: false});
//    $('.datepicker').inputmask('dd/mm/yyyy', {placeholder: 'dd/mm/yyyy', insertMode: false, showMaskOnHover: false});

//	$('.input-time').inputmask('hh:mm:ss', {insertMode: false, showMaskOnHover: false});
//    $('.datepicker').inputmask('dd/mm/yyyy', {insertMode: false, showMaskOnHover: false});
    
	$('.datepicker').each(function(){
		var self = $(this);
		var min = self.data('min'); // use: data-min="current" or data-min="20/07/2019"
		if (min === 'current') min = new Date();

		self.datepicker({ startDate: min, format: 'dd/mm/yyyy', autoclose: true, todayHighlight: true });
		
		//if (self.val() === '') self.datepicker('setDate', new Date());
	});
	
	$('input.icheckbox').iCheck({
		checkboxClass: 'icheckbox_square-blue',
		radioClass: 'iradio_square-blue',
		increaseArea: '20%' /* optional */
	});
});

function popUpWindow(url, title, width, height) {

    if (popUpWin && !popUpWin.closed) {
        popUpWin.focus();
        return;
    } else {
        var left = (window.innerWidth - width) / 2;
        var top = (window.innerHeight - height) / 2;
        popUpWin = open(url, title, 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,copyhistory=yes,width=' + width + ',height=' + height + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
    }
}

function bsAlert(title) {
    $('#alert-modal .modal-body').text(title);
    $('#alert-modal').modal('show');
}

function bsWarning(title) {
    $('#warning-modal .modal-body').text(title);
    $('#warning-modal').modal('show');
}

function bsConfirm(title, callback) {
    $('#confirm-modal .modal-body').text(title);
    $('#confirm-modal').modal('show');

    $('#confirm-modal #submit-btn').unbind( "click" );
    $('#confirm-modal #submit-btn').click(function (e) {
        e.preventDefault();
        callback(1);
        $('#confirm-modal').modal('hide');
    });
}

$('#check_all').click(function (event) {
    var items = $("*[name='ids[]']");
    for (var i = 0; i < items.length; i++) {
        items[i].checked = this.checked;
    }
});

$("[name='ids[]']").click(function (event) {
    var flag = true;
    var items = $("*[name='ids[]']");
    for (var i = 0; i < items.length; i++) {
        if (items[i].checked != true) {
            flag = false;
        }
    }
    if (flag == true) {
        $('#check_all').prop('checked', true);
    } else {
        $('#check_all').prop('checked', false);
    }
});

/////////////////////////////////////////////////////////////////////////

//$(document).on('click', 'input[type=submit], button[type=submit], a.submit, button.submit', function (e) {
$(document).on('click', 'button[type=submit].btn-submit', function (e) {
    submitForm = true;

    // Disables the element.
    $(this).attr('disabled', 'disabled');

//    If the element IS NOT a link, submits the enclosing form.
    if (!$(this).is('a')) {
        if ($(this).parents('form').length) {
            var form = $(this).parents('form')[0];
            if ($(form).attr('id') != 'filter-form') {
                $(this).parents('form')[0].submit();
            }
        }
    }
    return true;
});

//function callAjax(element) {
//    var data_id = $(element).attr('data-id');
//    var data_method = $(element).attr('data-method');
//    var data_action = $(element).attr('data-action');
//    if (data_id && data_method && data_action && data_id > 0) {
//        $.ajax({
//            method: data_method,
//            url: data_action,
//            type: 'POST',
//            data: { "id": data_id },
//            headers: {
//                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//            },
//            success: function (response) {
//                if (response.error == 0) {
//                    $.growl.notice({title: "Thành công", message: response.message});
//                    location.reload();
//                } else if (response.error == 1) {
//                    $.growl.error({title: "Error", message: response.message});
//                }
//            },
//            error: function (xhr, ajaxOptions, thrownError) {
//                $.growl.error({title: "Error", message: xhr.responseJSON.message});
//            }
//        });
//
//    } else {
//        $.growl.error({title: "Error", message: "Dữ liệu không chính xác"});
//    }
//}

function refreshSecretKey() {
    $.ajax({
        method: 'GET',
        url: '/merchants/refresh_secret_key',
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            var data_name = $('#refresh_secret').attr('data-name');
            $('#' + data_name).val(response.secret_key);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            $.growl.error({title: "Error", message: xhr.responseJSON.message});
        }
    });
}

$(document).on('click', '.table-responsive [data-toggle="dropdown"]', function () {
    // if the button is inside a modal
    if ($('body').hasClass('modal-open')) {
        throw new Error("This solution is not working inside a responsive table inside a modal, you need to find out a way to calculate the modal Z-index and add it to the element")
        return true;
    }

    $buttonGroup = $(this).parent();
    if (!$buttonGroup.attr('data-attachedUl')) {
        var ts = +new Date;
        $ul = $(this).siblings('ul');
        $ul.attr('data-parent', ts);
        $buttonGroup.attr('data-attachedUl', ts);
        $(window).resize(function () {
            $ul.css('display', 'none').data('top');
        });
    } else {
        $ul = $('[data-parent=' + $buttonGroup.attr('data-attachedUl') + ']');
    }
    if (!$buttonGroup.hasClass('open')) {
        $ul.css('display', 'none');
        return;
    }
    dropDownFixPosition($(this).parent(), $ul);
    function dropDownFixPosition(button, dropdown) {
        var dropDownTop = button.offset().top + button.outerHeight();
        dropdown.css('top', dropDownTop + "px");
        dropdown.css('left', button.offset().left + "px");
        dropdown.css('position', "absolute");

        dropdown.css('width', dropdown.width());
        dropdown.css('heigt', dropdown.height());
        dropdown.css('display', 'block');
        dropdown.appendTo('body');
    }
});

//var isDropdownShowed = false;
//$(document).on('click', '.table-responsive [data-toggle="dropdown"]', function () {
//
//    // if the button is inside a modal
//    if ($('body').hasClass('modal-open')) {
//        throw new Error("This solution is not working inside a responsive table inside a modal, you need to find out a way to calculate the modal Z-index and add it to the element")
//        return true;
//    }
//
//    $buttonGroup = $(this).parent();
//    if (!$buttonGroup.attr('data-attachedUl')) {
//        var ts = +new Date;
//        $ul = $(this).siblings('ul');
//        $ul.attr('data-parent', ts);
//        $buttonGroup.attr('data-attachedUl', ts);
//        $(window).resize(function () {
//            $ul.css('display', 'none').data('top');
//        });
//    } else {
//        $ul = $('[data-parent=' + $buttonGroup.attr('data-attachedUl') + ']');
//    }
//    if (!$buttonGroup.hasClass('open')) {
//        $ul.css('display', 'none');
//        return;
//    }
//    dropDownFixPosition($(this).parent(), $ul);
//    function dropDownFixPosition(button, dropdown) {
//        var dropDownTop = button.offset().top + button.outerHeight();
//        dropdown.css('top', dropDownTop + "px");
//        dropdown.css('left', button.offset().left + "px");
//        dropdown.css('position', "absolute");
//
//        dropdown.css('width', dropdown.width());
//        dropdown.css('heigt', dropdown.height());
//        dropdown.css('display', 'block');
//        dropdown.appendTo('body');
//    }
//});
//
//

//$(document).mouseup(function(e) 
//{
//    var container = $('.dropdown-menu-right');
//    // if the target of the click isn't the container nor a descendant of the container
//    if (!container.is(e.target) && container.has(e.target).length === 0) {
//        container.hide();
//    }
//});