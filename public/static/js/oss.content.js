$(document).ready(function() {
	$('.ajax_action_article').click(function(){
		var self = this;
		$.confirm({
			title: 'Xác nhận!',
			content: $(this).attr('data-label'),
			buttons: {
				'Xác nhận': function () {
					call_ajax_article(self);
				},
				'Quay lại': function () {
				}
			}
		});
	});
	
	$('.input-time').inputmask("hh:mm:ss", {placeholder: "hh:mm:ss", insertMode: false, showMaskOnHover: false});
	$('.datepicker').inputmask("dd/mm/yyyy", {placeholder: "dd/mm/yyyy", insertMode: false, showMaskOnHover: false});
	$('.datepicker').each(function(){
		var self = $(this);
		var min = self.data('min');
		if (min == 'current') min = new Date();
		
		$(this).datepicker({ startDate: min, format: 'dd/mm/yyyy', autoclose: true });
	});
	
	$('input[type="checkbox"].icheck').iCheck({
		checkboxClass: 'icheckbox_square-blue',
		radioClass: 'iradio_square-blue',
		increaseArea: '20%' /* optional */
	});

	$('.remove_image').click(function(){
		$('#image').val('');
		$(this).parent().parent().remove();
	});
});


function call_ajax_article(element){
	var el = $(element);
	var data_row = JSON.parse(el.attr('data-row'));
	var data_method = el.attr('data-method');
	var data_action = el.attr('data-action');
	if(data_row.article_id > 0 && data_method && data_action){
		$.ajax({
			method: data_method,
			url: data_action,
			type: 'json',
			data: data_row,
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success: function (response) {
				if(response.error == 0){
					toastr.success(response.message, '', {closeButton:true, closeDuration:0, timeOut: 10000});
					//$.growl.notice({title: "Thành công", message: response.message });
					location.reload();
				} else if(response.error == 1){
					toastr.error(response.message, '', {closeButton:true, closeDuration:0, timeOut: 10000});
				}
			},
			error: function (xhr, ajaxOptions, thrownError) {
				toastr.error(xhr.responseJSON.message, '', {closeButton:true, closeDuration:0, timeOut: 10000});
			}
		});

	} else {
		toastr.error('Dữ liệu không chính xác', '', {closeButton:true, closeDuration:0, timeOut: 10000});
	}
}

function ChangeToSlug()
{
	var title, slug;

	//Lấy text từ thẻ input title
	title = document.getElementById("title").value;

	//Đổi chữ hoa thành chữ thường
	slug = title.toLowerCase();

	//Đổi ký tự có dấu thành không dấu
	slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
	slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
	slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
	slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
	slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
	slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
	slug = slug.replace(/đ/gi, 'd');
	//Xóa các ký tự đặt biệt
	slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
	//Đổi khoảng trắng thành ký tự gạch ngang
	slug = slug.replace(/ /gi, "-");
	//Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
	//Phòng trường hợp người nhập vào quá nhiều ký tự trắng
	slug = slug.replace(/\-\-\-\-\-/gi, '-');
	slug = slug.replace(/\-\-\-\-/gi, '-');
	slug = slug.replace(/\-\-\-/gi, '-');
	slug = slug.replace(/\-\-/gi, '-');
	//Xóa các ký tự gạch ngang ở đầu và cuối
	slug = '@' + slug + '@';
	slug = slug.replace(/\@\-|\-\@|\@/gi, '');
	//In slug ra textbox có id “slug”
	document.getElementById('slug').value = slug;
}