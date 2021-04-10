@extends('layouts.auth')
@section('content')

<div class="container">

    <div class="d-flex bd-highlight mb-4">
        <div class="p-2 w-100 bd-highlight">
            <h2>Laravel AJAX Example</h2>
        </div>
        <div class="p-2 flex-shrink-0 bd-highlight">
            <button class="btn btn-success" id="btn-add">
                Add Todo
            </button>
        </div>
    </div>

    <div>
        <table class="table table-inverse">
            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                </div>
            @endif
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody id="todos-list" name="todos-list">
                @foreach ($todo as $data)
                <tr id="todo_{{$data->id}}">
                    <td>{{$data->id}}</td>
                    <td>{{$data->title}}</td>
                    <td>{{$data->description}}</td>
                      <td>
                        <div class="btn-group" style="width:100%">
                             <a data-id="{{ $data->id }}" onclick="editTodo(event.target)" class="btn btn-primary">Edit</a>
                            <!-- <a href="#" class="btn btn-danger">Delete</a> -->
                             <div>
                                {!! Form::open([
                                    'route' => ['destroy-name', $data->id],
                                    'method' => 'DELETE'
                                ]) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>  
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="modal fade" id="formModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="formModalLabel">Create Todo</h4>
                    </div>
                    <div class="modal-body">
                        <form id="myForm" name="myForm" class="form-horizontal" novalidate="">

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Enter title" value="">
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                    <input type="text" class="form-control" id="description" name="description"
                                        placeholder="Enter Description" value="">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes
                        </button>
                        <input type="hidden" id="todo_id" name="todo_id" value="0">
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('script')


<script type="text/javascript">

 //EDIT 
function editTodo(e) {
        $('#formModal').modal('show');
        var id  = $(e).data("id");
        var title  = $("#todo_"+id+" td:nth-child(2)").html();
        var description  = $("#todo_"+id+" td:nth-child(3)").html();
        $("#todo_id").val(id);
        $("#title").val(title);
        $("#description").val(description);
        $("#btn-save").val('edit');
}

$(document).ready(function () {

    //----- Open model CREATE -----//
    $('#btn-add').click(function () {
        $('#btn-save').val("add");
        $('#myForm').trigger("reset");
        $('#formModal').modal('show');
    });

    // CREATE
    $("#btn-save").click(function (e) {

        e.preventDefault();
        $.ajaxSetup({
          headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });

        var state = $('#btn-save').val();
        if (state == "add") {
              var formData = {
            title: $('#title').val(),
            description: $('#description').val(),
            };
            var type = "POST";
            var todo_id = $('#todo_id').val();
            var ajaxurl = '/todo';      
        } else {
              var formData = {
                title: $('#title').val(),
                description: $('#description').val(),
               };
           var type = "PUT";
           var id = $('#todo_id').val();
           var ajaxurl = '/todo/'+ id;
           console.log(formData);
            console.log(id);
        }
   
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
        
                // var todo = '<tr id="todo_' + data.id + '"><td>' + data.id + '</td><td id="title_>' + data.title + '</td><td>' + data.description + '</td>';
                // if (state == "add") {
                //     $('#todo-list').append(todo);
                // } else {
                //     $("#todo" + todo_id).replaceWith(todo);
                // }
                // $('#myForm').trigger("reset");
                // $('#formModal').modal('hide');

                setTimeout(function() 
                {
                    location.reload(); 
                }, 200);
            },
            error: function (data) {
                console.log(data);
            }
        });
    });

});


</script>


@stop