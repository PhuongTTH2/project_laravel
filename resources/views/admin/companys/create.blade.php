@extends('layouts.admin')
@section('title', 'Tạo')
@section('content')
<div class="contents_title application">
	Tạo
<form action="{{route('companys.update')}}" method="post">
	@csrf
	<div>
		<table>
			<tbody>
				<tr>
					<td><span>ID</span></td>
					<td>
						<span>
							<input type="text" name="company_code_1" maxlength="5" value="{{old('company_code_1')}}">
							<input type="text" name="company_code_2" maxlength="3" value="{{old('company_code_2')}}">
							<input type="text" name="company_code_3" maxlength="2" value="{{old('company_code_3')}}">
						</span>
						@if($errors->has('company_code'))
							<span class="err_msg">{{$errors->first('company_code')}}</span>
						@endif
					</td>
				</tr>
				<tr>
					<td>
						<span>Tên</span>
					</td>
					<td>
						<input type="text" name="company_name" value="{{old('company_name')}}">
						@if($errors->has('company_name'))
						<span>{{$errors->first('company_name')}}</span>
						@endif
					</td>
				</tr>
				<tr>
					<td><span>Tên Site</span></td>
					<td>
						<input type="text" name="company_site_name" value="{{old('company_site_name')}}">
						@if($errors->has('company_site_name'))
						<span>{{$errors->first('company_site_name')}}</span>
						@endif
					</td>
				</tr>
				<tr>
					<td><span>business code</span></td>
					<td>
						<select id="select_company_business_code" name="company_business_code" > 
							<option> -</option>
							@foreach($companyBusinessCodes as $companyBusinessCode)
							<option value="{{$companyBusinessCode->id}}" {{old('company_business_code')== $companyBusinessCode->id  ? 'selected':''}}> {{$companyBusinessCode->name}}</option>
							@endforeach
						</select>
					</td>
				</tr>
			<!-- 	<tr>
					<td><span>Mã cty</span></td>
					<td>
						<input type="text" name="select_broadcaster_id" value="{{old('select_broadcaster_id')}}">
						@if($errors->has('select_broadcaster_id'))
						<span>{{$errors->first('select_broadcaster_id')}}</span>
						@endif
					</td>
				</tr> -->
				<tr>
		          <td class="must">
		            <span>Phương pháp xác thực</span>
		          </td>
		          <td>
		            <span>
		              <input type="radio" name="auth_type_id" id="new_company_auth_1" value="1" {{old('auth_type_id')=='1' ? 'checked':''}}>
		              <label for="new_company_auth_1">Xác thực IP</label>
		              <input type="radio" name="auth_type_id" id="new_company_auth_2" value="2" {{old('auth_type_id')=='2' ? 'checked':''}}>
		              <label for="new_company_auth_2">Xác minh IP hoặc xác minh hai bước</label>
		            </span>
		            <div class="err_msg">{{$errors->first('auth_type_id')}}</div>
		          </td>
		        </tr>

				<tr>
					<td></td>
					<td>
						<input type="button" class="bts_S" name="" value="+" onclick="addForm(this)">
					</td>
				</tr>
				<tr>
					<td>Check box</td>
					<td>
						<input type="checkbox" name="can_use_gyokyomaster" value="1" {{old('company_business_code') == 1 ? 'checked': ''}}>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<a href="{{Session('preUrl')}}" class="bts_S">Trở về</a>
	<input type="submit" name="" value="Đăng ký">
</form>
</div>
<script type="text/javascript">
	function addForm(btn){
		var addElement = '<tr><td></td><td><input type="text" class="bts_S" name="ip[]" ><span class="fa fa-close" onclick="deleteForm(this)"></span></td></tr>';
		var insertPoint = btn.parentNode.parentNode; // td -> tr
		$(addElement).insertBefore(insertPoint); // + 
		// $(addElement).insertAfter(insertPoint); sau + 
	}
	function deleteForm(btn){
		var record = btn.parentNode.parentNode;
		record.style.display = "none";
		record.parentNode.removeChild(record)
	}
</script>
@endsection