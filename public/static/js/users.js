
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
        console.log('1');
        usersList.removeClass("list");
    }else{
        console.log('2');
        usersList.removeClass("list");

    }
    $.ajax({
        url:  '/search',
        type: "GET",
        data: {"name" : title},
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (datas) {
            usersList.removeClass("users-list");

            var $output ;
            if(datas.length === 0) {
                $output = '<div> No users are available to chat</div>';
                usersList.append($output);
            }else{
                for (var i = 0; i < datas.length; i++) {
                    console.log(datas);
                    var list = $('<a href="#">' +
                        '<img src="php/images/ alt="">' +
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
        }
    });

    // document.getElementById("users-list").innerHTML = searchRequest['name'];
}

    searchIcon.click(function () {
        alert("Hello! I am an alert box!!2");

    });