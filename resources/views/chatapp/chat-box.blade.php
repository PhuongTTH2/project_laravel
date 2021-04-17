<div id="chat_box" class="chat_box pull-right" style="display: none">
    <input id="id_to_chat" class="hide">
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Chat with <i class="chat-user"></i> </h3>
                    <span class="glyphicon glyphicon-remove pull-right close-chat"></span>
                </div>
                <div class="panel-body chat-area">
                </div>
                <div class="panel-footer">
                    <div class="input-group form-controls">
                        <textarea id="chat_input" class="form-control input-sm chat_input" placeholder="Write your message here..." onkeyup="addMessages()"></textarea>
                        <span class="input-group-btn">
                                    <button class="btn btn-primary btn-sm btn-chat" type="button" data-to-user="" disabled>
                                        <i class="glyphicon glyphicon-send"></i>
                                        Send</button>
                                </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="to_user_id" value="" />
</div>

{{--@section('script')--}}
    {{--<script src="/static/js/users.js"></script>--}}
    {{--<!-- stop moi hoat dong -->--}}
    {{--<script type="text/javascript">--}}
        {{--// function ChangeToSlug() {--}}
        {{--//  var title, slug;--}}
        {{--//--}}
        {{--//  //Lấy text từ thẻ input title--}}
        {{--//  title = document.getElementById("title").value;--}}
        {{--//  document.getElementById("users-list").innerHTML = title;--}}
        {{--//  //Đổi chữ hoa thành chữ thường--}}
        {{--//  slug = title.toLowerCase();--}}
        {{--// };--}}

    {{--</script>--}}
{{--@stop--}}
