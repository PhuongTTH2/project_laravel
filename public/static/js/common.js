//function callAjax(element) {
//    var data_id = $(element).attr('data-id');
//    var data_method = $(element).attr('data-method');
//    var data_action = $(element).attr('data-action');
//    
//    if (data_id && data_method && data_action && data_id != '') {
//        
//        $.ajax({
//            method: data_method,
//            url: data_action,
//            type: 'POST',
//            data: { "id" : data_id },
//            headers: {
//                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//            },
//            success: function (response) {
//                if (response.error == 0) {
//                    $.growl.notice({ title : "Thành công", message : response.message });
//                    location.reload();
//                } else if (response.error == 1) {
//                    $.growl.error({ title : "Error", message : response.message });
//                }
//            },
//            error: function (xhr, ajaxOptions, thrownError) {
//                $.growl.error({ title: "Error", message: xhr.responseJSON.message });
//            }
//        });
//
//    } else {
//        $.growl.error({title: "Error", message: "Dữ liệu không chính xác"});
//    }
//}

$(document).ready(function () {

    $('.sidebar-menu').tree();

//    $('.ajax_action').click(function () {
//        var self = this;
//
//        $.confirm({
//            title: 'Xác nhận!',
//            content: $(this).attr('data-label'),
//            buttons: {
//                confirm: function () {
//                    callAjax(self);
//                },
//                cancel: function () {
//                }
//            }
//        });
//
//    });

    $('#refresh_secret').click(function () {
//        refreshSecretKey();
    });


    /***********************************
	 * hack input type=file
	 */
    // <div class="form-group">
	// 	<span class="btn btn-primary btn-sm btn-file">
	// 	    Chọn tệp&hellip; <input type="file" name="file" id="file" class="file-custom">
	// 	    <!-- <i class="glyphicon glyphicon-folder-open"></i> <input type="file" name="file" id="file" class="file-custom"> -->
	// 	</span> &nbsp;
	// 	<div class="col-sm-8">
	// 	    <input type="text" class="form-control" readonly>
	// 	</div>
	// </div>
 	$(document).on('fileselect', '.btn-file :file', function (event, numFiles, label) {
 		var input = $(this).closest('.form-group').find(':text'),
                log = numFiles > 1 ? numFiles + ' files selected' : label;

        if( input.length ) {
            input.val(log).change();
        } else {
            if( log ) alert(log);
        }
 	}).on('change', '.btn-file :file', function (e) {
 		var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
        input.closest('.form-group').find('.btn-file-remove').css('display', '');
 	}).on('click', '.popup', function (e) {
 		// load data khi mo modal
 		e.preventDefault();

 		if ($('#modal-custom').length == 0) {
 			$( "body" ).append( '<div class="modal fade" id="modal-custom">'+
								'	<div class="modal-dialog">'+
								'		<div class="modal-content"></div>'+
								'    </div>'+
								'</div>'+
	        '' );
 		}

		var self = $(this),
			modal = $('#modal-custom');

		self.loading();

		modal.find('.modal-content').html('<div class="progress progress-striped active" style="margin-bottom:0;"><div class="progress-bar" style="width: 100%"></div></div>');
		modal.modal({
      		// keyboard: true, //option to close with keyboard
    		backdrop: "static" //ability to close modal with click
      	});

		$.ajax({
			url: self.attr('href'),
			dataType: 'html',
			success: function (res) {
				modal.data('bs.modal').options.backdrop = 'static';
				modal.find('.modal-content').html(res);
				// modal.modal();
				self.loading(false);
			},
			error: function (res) {
				modal.data('bs.modal').options.backdrop = true;
				modal.find('.modal-content').html(res.statusText);
				console.log(res.responseText);

				// modal.modal();
				self.loading(false);
			}
		});
 	}).on('hidden.bs.modal', '#modal-custom', function (e) {
 		// clear data khi dong modal
 		// $(this).find('.modal-content').html('');
 	});
});


String.prototype.dateFormat = function(template) {
    var s = this;
    if (s.length > 0) {
        var datetime = new Date(s);
        var date = [];
        $.each(template.split(' '), function(index, item){
            if (item == 'dd/mm/yyyy') {
                date.push(datetime.getDate().pad(2) + '/' + (datetime.getMonth() + 1).pad(2) + '/' + datetime.getFullYear());
            }
            if (item == 'dd-mm-yyyy') {
                date.push(datetime.getDate().pad(2) + '-' + (datetime.getMonth() + 1).pad(2) + '-' + datetime.getFullYear());
            }
            
            if (item == 'hh:ii:ss') {
                date.push(datetime.getHours().pad(2) + ':' + datetime.getMinutes().pad(2) + ':' + datetime.getSeconds().pad(2));
            }
        });            
    }
        
    return date.join(' ');
};
Date.prototype.dateFormat = function(template) {
    return this.toJSON().dateFormat(template);
};
/**
 
 * @param {int} size
 * @returns {String|Number.prototype.pad.s}
 
 * https://stackoverflow.com/questions/2998784/how-to-output-integers-with-leading-zeros-in-javascript
 * (9).pad();  //returns "09"
 * (7).pad(3);  //returns "007"
 */
String.prototype.pad = function(size) {
    var s = this;
    while (s.length < (size || 2)) {s = "0" + s;}
    return s;
}
Number.prototype.pad = function(size) {
    return String(this).pad(size);
}

$.fn.loading = function(status) {
    var self = $(this);
    
    if (self.length == 1 && self.prop('nodeName') == 'FORM') {
        if (status === false) {
            self.find('div.loading').remove();
            self.find('button.btn').attr('disabled', false);
        }
        else {
            var html = '<div class="loading" style="width: 100%;height: 100%;top: 0px;left: 0px;position: fixed;display: block;opacity: 0.5;background-color: transparent;z-index: 99;text-align: center;">'+
                        '<div style="height: 48%"></div>'+
//                        '<img src="'+BASE_URL+'/assets/images/loaders/loader6.gif" alt="waiting..." style="z-index: 100;">'+
                    '</div>';
            $(html).appendTo(self);
            self.find('button').attr('disabled', true);
        }  
    }
    else {
        $.each(self, function(){
            var self = $(this);
            
            if( self.prop('nodeName') == 'A' || self.prop('nodeName') == 'BUTTON' ) {
                if (status === false) {
                    self.button('reset');
                }
                else {
                    self.data('loading-text', '<i class="fa fa-spinner fa-spin"></i> ' + (status || self.text()));
                    self.button('loading');
                }
            }
        }); 
    }
};
$.fn.serializeObject = function() {
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (typeof o[this.name] !== 'undefined') {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};
$.fn.showValidationMessage = function(messages, class_name) {
	var form = $(this);
	if (!class_name) class_name = '.error';
	if ($.type(messages) == "object") {
		var focus = 0;
		$.each(messages, function(key, value){
			var field = $('[name="'+ key +'"]', form);
			var error = $(class_name+'[for="'+ key +'"]', form);
			if (!error.length) error = field.parent().find(class_name);
			if (!error.length) error = field.parent().parent().find(class_name);
			if (!error.length) error = field.parent().parent().parent().find(class_name);
			if (!error.length) error = field.parent().parent().parent().parent().find(class_name);
			error.text(value[0]);
			error.closest('.form-group').addClass('has-error')
			if (focus === 0) {
				field.focus();
				focus = 1;
			}
		});
	}
	else if ($.type(messages) == "string") {
		$.growl.error({title: "Error", message: messages });
	}
};