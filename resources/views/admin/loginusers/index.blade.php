
@extends('layouts.admin')
@section('title', 'Loginusers')
@section('content')
<div class="contents_title application" >
	<form action="" method="post">
		@csrf
		<h3>List login users</h3>
		<input type="submit" name="company_search" value="Tìm kiếm" class="btn_M">
	</form>
	<div>
		<table>
			<thead>
				<tr>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($loginusers as $l)
				<tr>
					<td></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	
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