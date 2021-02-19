$(document).ready(function() {
	$('input[type="checkbox"]:visible').iCheck({
		checkboxClass: 'icheckbox_square-blue',
		radioClass: 'iradio_square-blue',
		increaseArea: '20%' /* optional */
	});

	init_datetime();

	$('#remove-business-registration-btn').click(function (event) {
		$('#business-registration-img').attr('src', '/img/no-image.png');
		$('#delete_business_registration').attr('checked', 'checked');
	});

	$('#business_registration').change(function (event) {
		$('#business-registration-img').attr('src', URL.createObjectURL(event.target.files[0]));
	});

	$('#remove-bank-account-btn').click(function (event) {
		$('#bank-account-img').attr('src', '/img/no-image.png');
		$('#delete_bank_account').attr('checked', 'checked');
	});

	$('#bank_account').change(function (event) {
		$('#bank-account-img').attr('src', URL.createObjectURL(event.target.files[0]));
	});

	var rowNum = 0;
	$('#addLineBtn').click(function(e){

		var row = "<tr>\n\
					<td><input type=\"text\" name=\"contract_no[]\" class=\"form-control\"></td>\
					<td><input type=\"text\" name=\"contract_date[]\" class=\"datepicker form-control\"> </td> \
					<td>\n\
						<div class=\"col-md-2\">\n\
							<div class=\"btn btn-primary btn-file\">\n\
								<i class=\"glyphicon glyphicon-folder-open\"></i>\n\
								<input name=\"uploads[]\" type=\"file\" onchange='show_image_local(this)'>\n\
							</div>\n\
						</div>\n\
						<div class='file_name col-md-10'></div>\n\
					</td>\n\
					<td></td>\n\
				</tr> \n\
			";
		$('#contract_table').append(row);
		
		init_datetime();
		rowNum++;
	});
    
	$('.ajax_action_contract').click(function(){
		var self = this;
		$.confirm({
			title: 'Xác nhận!',
			content: $(this).attr('data-label'),
			buttons: {
				confirm: function () {
					call_ajax_contract(self);
				},
				cancel: function () {
				},

			}
		});

	});

	// submit form
	$('form[name="form-provider"]').submit(function(e){
		e.preventDefault();
		var form = $(this);

		$('.invalid-feedback', form).text('');
		$('.has-error', form).removeClass('has-error');
		$('button.btn', form).loading();

		$.ajax({
			url: form.attr('action'),
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
					redirect(res.url_redirect);
				} else if(res.error == 1){
					form.showValidationMessage(res.message, '.invalid-feedback');
					$('button.btn', form).loading(false);
				}
			},
			error: function(res) {
				$('button.btn', form).loading(false);
			}
		});
	});
	
	$('.contract_confirm').click(function(e){
		e.preventDefault();
		var self = $(this);
		var title = self.data('title'),
			message = self.data('message'),
			contract_id = self.data('id');
			
		bootbox.prompt({
			title: title,
			inputType: 'textarea',
			buttons: {
				confirm: {
					label: 'Xác nhận',
					className: 'btn-primary'
				},
				cancel: {
					label: 'Quay lại',
					className: 'btn-default'
				}
			},
			callback: function (result) {
				if (result !== null) {
					$('[for=bootbox-input-textarea]')
						.closest('.form-group').removeClass('has-error')
						.find('.invalid-feedback').html('');
					
					$('.bootbox-accept').loading();
					$.ajax({
						url: self.data('action'),
						type: self.data('method'),
						data: {id: contract_id, reason: result},
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						success: function(response){
							if (response.error == 0) {
								toastr.success(response.message, '', {closeButton:true, closeDuration:0, timeOut: 10000});
								// bootbox.hideAll()
								location.reload();
							} else if (response.error == 1) {
								if (response.message.reason) {
									$('[for=bootbox-input-textarea]').html(response.message.reason)
										.closest('.form-group').addClass('has-error');
								}
								$('.bootbox-accept').loading(false);
							}
						}
					});
					
					return false; // dont close bootbox
				}
			}
		}).on("shown.bs.modal", function(e) {
			$('.bootbox-input-textarea').wrap('<div class="form-group"></div>');
			$('<label>'+message+'</label>').insertBefore('.bootbox-input-textarea');
			$('<div class="invalid-feedback" for="bootbox-input-textarea"></div>').insertAfter('.bootbox-input-textarea');
		});
	});
	$('.ajax_prompt').click(function(e){
		e.preventDefault();
		var self = $(this);
		var title = self.data('title'),
			message = self.data('message'),
			data = self.data('row');
		
		bootbox.prompt({
			title: '<h4 class="modal-title">'+ title +'</h4>',
			inputType: 'textarea',
			buttons: {
				confirm: {
					label: 'Xác nhận',
					className: 'btn-primary'
				},
				cancel: {
					label: 'Quay lại',
					className: 'btn-default'
				}
			},
			callback: function (result) {
				if (result !== null) {
					data['reason'] = result;
					$('[for=bootbox-input-textarea]')
						.closest('.form-group').removeClass('has-error')
						.find('.invalid-feedback').html('');
					
					$('.bootbox-accept').loading();
					$.ajax({
						url: self.data('action'),
						type: self.data('method'),
						data: data,
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						success: function(response){
							if (response.error == 0) {
								toastr.success(response.message, '', {closeButton:true, closeDuration:0, timeOut: 10000});
								// bootbox.hideAll()
								location.reload();
							} else if (response.error == 1) {
								if (response.message.reason) {
									$('[for=bootbox-input-textarea]').html(response.message.reason)
										.closest('.form-group').addClass('has-error');
								}
								else if (response.message) {
									toastr.error(response.message, '');
								}
								$('.bootbox-accept').loading(false);
							}
						}
					});
					
					return false; // dont close bootbox
				}
			}
		}).on("shown.bs.modal", function(e) {
			$('.bootbox-input-textarea').wrap('<div class="form-group"></div>');
			$('<label>'+message+'</label>').insertBefore('.bootbox-input-textarea');
			$('<div class="invalid-feedback" for="bootbox-input-textarea"></div>').insertAfter('.bootbox-input-textarea');
		});
	});
	
});

function init_datetime() {
	$('.datepicker').datepicker({
		autoclose: true,
		calendarWeeks: true,
		todayHighlight: true,
		toggleActive: true,
		format: 'dd/mm/yyyy'
	});
}

function show_image_local(el){
	$(el).closest('tr')
		.find('.file_name')
		.html(el.files[0].name);
		//.attr('src', URL.createObjectURL(el.files[0]));
}