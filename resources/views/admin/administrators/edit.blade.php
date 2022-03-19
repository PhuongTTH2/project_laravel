@extends('layouts.admin')
@section('title', 'Tạo')
@section('content')
<div class="contents_title application">
	Cập nhật
	<input type="submit" name="del_user" value="Xóa" class="del_alert" data-iziModal-open=".del_confirm" >
<form action="{{route('administrators.update')}}" method="post">
	@csrf
	<div>
		<table class="edit_new_admin">
			<tbody>
				<tr class="must">
					<td><span>ID</span></td>
					<td>
						<span><input type="text" name="account" value="{{old('account') ? old('account') : $administrators->account}}"></span>
						@if($errors->has('account'))
							<span class="err_msg">{{$errors->first('account')}}</span>
						@endif
					</td>
				</tr>
				<tr class="must" style="">
					<td><span>Mật khẩu</span></td>
					<td>
						<input type="password" name="password">
						@if($errors->has('password'))
						<span>{{$errors->first('password')}}</span>
						@endif
					</td>
				</tr>
				<tr class="must">
					<td><span>Mật khẩu(xác nhận)</span></td>
					<td><input type="password" name="password_confirm"></td>
					@if($errors->has('password_confirm'))
					<span>{{$errors->first('password_confirm')}}</span>
					@endif
				</tr>
			</tbody>
		</table>
	</div>
	<a href="{{Session('preUrl')}}" class="bts_S">Trở về</a>
	<input type="submit" name="" value="Cập nhật">


<script type="text/javascript">
    $(function(){
		$(".del_confirm").iziModal({
		    onOpening: function() { resizeBody(); }
		});
     
    })

    function resizeBody() {
        $("body").css("min-height", $("#sidebar").height());
    }
</script>

</form>
   <!-- Modal Box -->
    <div class="modal del_confirm" >
        <form action="{{route('administrators.delete')}}" method="post" >
            @csrf
            <h3 style="text-align: center;"><span >Account:{{$administrators->account}}</span> Bạn muốn xóa?</h3>
            <div style="display:flex; justify-content: center;">
            	<span data-izimodal-close="" class="btn_M btn_Back" data-inline="true" style="margin-right: 10px;">Trở về</span>
            	<input type="submit" name="del_confirm_ok" value="OK" class="btn_M" data-inline="true" >
            	
            </div>
            <input type="hidden" name="administrators_id" value="{{ $administrators->id }}">
           
        </form>
    </div>

</div>
@endsection