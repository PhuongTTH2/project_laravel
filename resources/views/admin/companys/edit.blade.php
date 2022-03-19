@extends('layouts.admin')
@section('title', 'Tạo')
@section('content')
<div class="contents_title application">
	Cập nhật
	<input type="submit" name="del_user" value="Xóa" class="del_alert" data-iziModal
	-open=".del_confirm" >
<form action="{{route('administrators.update')}}" method="post">
	@csrf
	<div>
		<table>
			<tbody>
				<tr>
					<td><span>ID</span></td>
					<td>
						<span><input type="text" name="account" value="{{old('account') ? old('account') : $administrators->account}}"></span>
						@if($errors->has('account'))
							<span class="err_msg">{{$errors->first('account')}}</span>
						@endif
					</td>
				</tr>
				<td>
					<td><span>Mật khẩu</span></td>
					<td>
						<input type="password" name="password">
						@if($errors->has('password'))
						<span>{{$errors->first('password')}}</span>
						@endif
					</td>
				</td>
				<td>
					<td><span>Mật khẩu(xác nhận)</span></td>
					<td><input type="password" name="password_confirm"></td>
					@if($errors->has('password_confirm'))
					<span>{{$errors->first('password_confirm')}}</span>
					@endif
				</td>
			</tbody>
		</table>
	</div>
	<a href="{{Session('preUrl')}}" class="bts_S">Trở về</a>
	<input type="submit" name="" value="Cập nhật">
</form>
<div class="model">
	<form action="" method="post"> 
		@csrf
		<h3><span>{{$administrators->account}}</span></h3>
		<input type="hidden" name="administrators_id" value="{{$administrators->id}}">
		<input type="submit" name="del_confirm" value="OK" class="btn_M">
	</form>
</div>
</div>
@endsection