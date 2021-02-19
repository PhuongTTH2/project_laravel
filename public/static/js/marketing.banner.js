//$(function(){
//	$('.input-time').inputmask("hh:mm:ss", {placeholder: "hh:mm:ss", insertMode: false, showMaskOnHover: false});
//	$('.datepicker').inputmask("dd/mm/yyyy", {placeholder: "dd/mm/yyyy", insertMode: false, showMaskOnHover: false});
//	$('.datepicker').datepicker({ format: 'dd/mm/yyyy', autoclose: true });
//});

var BannerClass = function(options) {
    var vars = {};
	var me;
    
    var reloadCombobox = function(form, name, list, id, text) {
        var select = $('select[name='+ name +']', form),
                options = '';
        
        if (select.data('placeholder')) {
            options += '<option value="">'+ select.data('placeholder') +'</option>';
        }
        
        $.each(list, function(i, item){
            options += '<option value="'+ item[id] +'">'+ item[text] +'</option>';
        });
        select.html(options);
    };
    
    this.listBanner = function(options){
        $.extend(vars, options || {});
		
		// form search
        var form = $('form[name=form_index]');
        //reloadCombobox(form, 'campain_id', vars.campains, 'campain_id', 'name');
        form.fillData(vars.filter, 'input,select');
		
		// list banner
		$('.ajax_action_banner').click(function(){
			var self = this;
			$.confirm({
				title: 'Xác nhận!',
				content: $(this).attr('data-label'),
				buttons: {
					confirm: function () {
						me.call_ajax_banner(self);
					},
					cancel: function () {
					},
				}
			});
		});
    };
	this.call_ajax_banner = function(element){
		var data_id = $(element).attr('data-id');
		var data_method = $(element).attr('data-method');
		var data_action = $(element).attr('data-action');
		if(data_id && data_method && data_action && data_id > 0){
			$.ajax({
				method: data_method,
				url: data_action,
				type: 'json',
				data: {"id" : data_id},
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				success: function (response) {
					if(response.error == 0){
						$.growl.notice({title: "Thành công", message: response.message });
						location.reload();
					} else if(response.error == 1){
						$.growl.error({title: "Error", message: response.message });
					}
				},
				error: function (xhr, ajaxOptions, thrownError) {
					$.growl.error({title: "Error", message: xhr.responseJSON.message });
				}
			});

		} else {
			$.growl.error({title: "Error", message: "Dữ liệu không chính xác" });
		}
	};
    this.edit = function(options){
        $.extend(vars, options || {});
        var form = $('form[name=form_edit]');
        
        reloadCombobox(form, 'banner_position_id', vars.positions, 'position_id', 'name');
        reloadCombobox(form, 'campain_id', vars.campains, 'campain_id', 'name');
        
        $('select[name=type_id]', form).change(function(){
            var self = $(this);
            
//            $('select[name=module]', form).parent().parent().hide();
//            $('input[name=link]', form).parent().parent().hide();
//            
//            if (self.val() == 1) { // Điều hướng chức năng
//                $('select[name=module]', form).parent().parent().show();
//            }
//            if (self.val() == 2) { // Điều hướng từ link
//                $('input[name=link]', form).parent().parent().show();
//            }
            if (self.val() == 1) { // Điều hướng chức năng
                $('input[name=link]', form).attr('placeholder', 'app://');
            }
            if (self.val() == 2) { // Điều hướng từ link
                $('input[name=link]', form).attr('placeholder', 'http://');
            }
        });
		
		$('.remove_image').click(function(){
            $('[name=image]').val('');
            $(this).hide().prev().hide();
        });
        
        form.submit(function(e){
            e.preventDefault();
            
			$('.error', form).text('');
            $('button.btn', form).loading();
            
            $.ajax({
                url: vars.url_submit,
                data: new FormData(form[0]),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                contentType: false,
                enctype: 'multipart/form-data',
                processData: false,
                success: function(res) {
                    if(res.error == 0){
                        $.growl.notice({title: "Thành công", message: res.message });
                        redirect('/marketing/banner');
                    } else if(res.error == 1){
						form.showValidationMessage(res.message);
                        $('button.btn', form).loading(false);
                    }
                },
                error: function(res) {
                    $('button.btn', form).loading(false);
                }
            });
        });

        form.fillData(vars.form_data, 'input,select');
		if (vars.form_data.banner_id) {
			$('[name=name]', form).attr('disabled', true);
		}
		
		// =================================
			$(":file").change(function() {
				var input = $(this),
						numFiles = input.get(0).files ? input.get(0).files.length : 1,
						label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
				input.trigger('fileselect', [numFiles, label]);
			});

			$('.btn-file :file').on('fileselect', function(event, numFiles, label) {
				var input = $(this).parents('.form-group').find(':text'),
						log = numFiles > 1 ? numFiles + ' files selected' : label;

				if( input.length ) {
					input.val(log);
				} else {
					if( log ) alert(log);
				}
			});
		// =================================
		
		
    };
    
    this.construct = function(options){
        $.extend(vars , options);
		me = this;
    };
    this.construct(options);
};
var objBanner = new BannerClass();


$.fn.fillData = function(data, elements, except) {
    if (!$.isEmptyObject(data)) {
        if(except == undefined) except = [];
        $(this).find(elements).each(function(index, element){
            var type = element.type.toLowerCase();
            var name = element.name;
            if ($.inArray(name, except) > -1) return;
//console.log(name, type, data[name]);
            if (type == 'file') {
                if (data[name]) {
                    $('img[for='+name+']').attr('src', data[name]);
                }
                return;
            }
            if (type == 'checkbox') {
                $(element).attr('checked', $(element).val() == data[name]);
                return;
            }
            if (type == 'select-multiple' && data[name] != undefined) {
                $.each(data[name], function(i, value){
                    $('option[value="'+ value +'"]', element).attr('selected', true);
                });
                return;
            }
			if ($(element).hasClass('datepicker')) {
				$(element).datepicker('setDate', data[name]);
				return;
			}
            $(element).val(data[name] || $(this).val()).change();
        });
    }
    
    return this;
};