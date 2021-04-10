@extends('layouts.auth')
@section('content')
<div class="container">
	- chatapp
	<div class="wrapper">
		<section class="content-header">
			<h1>
				chatapp
			</h1>
		</section>
		<section class="user">
			<div class="content">
				<div class="search">
					<!-- <span class="text">Select an user to start chat</span> -->
					<input type="text" placeholder="Enter name to search..." id="title" onkeyup="ChangeToSlug()">
					<button><i class="fa fa-search"></i></button>
				</div>
				<div class="users-list" id="users-list">

				</div>
			</div>
		</section>
	</div>

</div>
@endsection

@section('script')
 <script src="/static/js/users.js"></script>
<!-- stop moi hoat dong -->
 <script type="text/javascript">
	 // function ChangeToSlug() {
		//  var title, slug;
	 //
		//  //Lấy text từ thẻ input title
		//  title = document.getElementById("title").value;
		//  document.getElementById("users-list").innerHTML = title;
		//  //Đổi chữ hoa thành chữ thường
		//  slug = title.toLowerCase();
	 // };

 </script>
@stop 