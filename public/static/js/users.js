
const searchBar = document.querySelector(".search input"),
    searchIcon =  $(".search button"),
    usersList = jQuery(".users-list");

function ChangeToSlug() {
    var title, slug,searchRequest = null ;

    title = document.getElementById("title").value;
    // title = document.getElementById("title"); không thể tác động lai giá trị
    //Đổi chữ hoa thành chữ thường
    // title.value = title.value.toUpperCase();
    if(title != ""){
        usersList.addClass("hide");
    }else{
        usersList.addClass("hide");

    }
    console.log(title);
    $.ajax({
        url:  '/search',
        type: "GET",
        data: {"name" : title},
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (datas) {
            var $output ;
            if(datas.length === 0) {
                $('.check-empty').removeClass("hide");
                usersList.addClass("hide");
            }else{
                usersList.empty();
                $('.check-empty').addClass("hide");
                usersList.removeClass("hide");
                console.log(datas);
                for (var i = 0; i < datas.length; i++) {
                    var list = $('<a  class="chat-toggle">' +
                        '<img src="/static/img/avatar.png"  onclick="displayChat(this)" id="'+datas[i]['id']+'" >' +
                        '<div class = "list" id="list' +datas[i]['id'] + '"><span>' + datas[i]['name'] + '</span></div>' +
                        '</a>' +
                        '<div class="status-chat"><i class="fa fa-circle"></i></div>' +
                        '</br>');
                    usersList.append(list);

                };
            }

        },
        error: function (datas) {
            // console.log(data);
        },
    });

    // document.getElementById("users-list").innerHTML = searchRequest['name'];
}
    //
    $(".chat-toggle").on("click", function (e) {
        e.preventDefault();
    //     let ele = $(this);
    //     let user_id = ele.attr("data-id");
    //     let username = ele.attr("data-user");
    //     cloneChatBox(user_id, username, function () {
    //         let chatBox = $("#chat_box_" + user_id);
    //         if(!chatBox.hasClass("chat-opened")) {
    //             chatBox.addClass("chat-opened").slideDown("fast");
    //             loadLatestMessages(chatBox, user_id);
    //             chatBox.find(".chat-area").animate({scrollTop: chatBox.find(".chat-area").offset().top + chatBox.find(".chat-area").outerHeight(true)}, 800, 'swing');
    //         }
    //     });
    });
    function displayChat($data) {
        var $id = $data.id;
        $.ajax({
            url:  '/chatbox',
            type: "POST",
            data: {"id" : $id},
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (datas) {
                $('.chat_box').css("display", "");
                $('#id_to_chat').val(datas['id']);
                console.log(datas);
            },
            error: function (datas) {
                // console.log(data);
            },
        });
    }
    function addMessages(){
        var  textarea = document.getElementById("chat_input").value;
        if(textarea != ''){
            $(".btn-chat").prop("disabled", false);
        }else{
            $(".btn-chat").prop("disabled", true);
        }
    }
    $('.btn-sm').click(function () {
        var  textarea = document.getElementById("chat_input").value;
        var  id_to_chat = document.getElementById("id_to_chat").value;
        var formData = {
            id: id_to_chat,
            msg : textarea ,
        };
        $.ajax({
            url:  '/add-messages',
            type: "POST",
            data : formData,
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (datas) {
                console.log(datas);
            },
            error: function (datas) {
                // console.log(data);
            },
        });
    });

    searchIcon.click(function () {
        alert("Hello! I am an alert box!!2");

    });
