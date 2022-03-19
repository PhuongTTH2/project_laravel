
@extends('layouts.admin')
@section('title', 'Administrators')
@section('content')
<div class="contents_title application" >
	<form action="{{route('administrators.search')}}" method="post">
		@csrf
		<h3>List Administrators</h3>
		<a href="{{route('administrators.create') }}" class="btn_S" >Tạo</a>
		<div class="">
			<h3>Tìm kiếm ID</h3>
			<input type="text" id="loginid" name="loginid" maxlength="20" value="{{ Request()->loginid }}">
		</div>
		<input type="submit" name="company_search" value="Submit" class="btn_M">
	</form>

	@if(count($administrators))
		<div class="cart_table_container">
			<form action="#" method="post">
				<div style="display: block;">
					<span>{{$administrators->firstItem()}}</span>
					<span>First</span>
					<span>{{$administrators->lastItem()}}</span>
					<span>Last</span>
					<span>{{$administrators->total()}}</span>
				</div>
				<div class="table_box">
					<table>
						<thead>
							<tr>
								<th>ID</th>
								<th>Tạo</th>
								<th>Cập nhật</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($administrators as $a)
							<tr>
								<td>{{$a->account}}</td>
								<td>{{$a->created_at->format('Y-m-d')}}</td>
								<td>{{$a->updated_at->format('Y-m-d')}}</td>
								<td><a href="{{ route('administrators.edit', ['administratorId' => $a->id]) }}" class="btn_S">Edit</a></td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</form>
		</div>
	@endif
</div>
<script type="text/javascript">
	// $('form').submit(function() {
	// 	let loginid = $('#loginid').val()
	// 	let url = "{{route('administrators.search') }}"
	// 	if (loginid.length) {
	// 		url += '?loginid='+loginid 
	// 	}
	// 	location.href = url
	// 	return false
	// })
</script>
@endsection