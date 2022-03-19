@extends('layouts.admin')
@section('title', 'Tạo')
@section('content')
<div class="contents_title application">
	Tạo

<form action="{{route('administrators.update')}}" method="post">
	@csrf
	<div>
		<table class="add_new_admin">
			<tbody>
				<tr class="must">
					<td >
						<span>ID</span>
					</td>
					<td>
						<span><input type="text" name="account" value="{{old('account')}}"></span>
						@if($errors->has('account'))
							<span class="err_msg">{{$errors->first('account')}}</span>
						@endif
					</td>
				</tr>
				<tr >
					<td class="must">
						<span>Mật khẩu</span>
					</td>
					<td>
						<input type="password" name="password">
						@if($errors->has('password'))
						<span>{{$errors->first('password')}}</span>
						@endif
					</td>
				<tr>
				<tr>
					<td class="must">
						<span>Mật khẩu(xác nhận)</span>
					</td>
					<td><input type="password" name="password_confirm"></td>
					@if($errors->has('password_confirm'))
					<span>{{$errors->first('password_confirm')}}</span>
					@endif
				</tr>
			</tbody>
		</table>
	</div>
	<div >
		 <a href="{{Session('preUrl')}}" class="bts_S">Trở về</a>
		<input type="submit" name="" value="Đăng ký">
	</div>

</form>
</div>
@endsection