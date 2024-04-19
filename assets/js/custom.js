var input = document.querySelector("#select_post_img");
input.addEventListener("change", preview);

function preview() {
    var fileobj = this.files[0];
    var fileReader = new FileReader();
    fileReader.readAsDataURL(fileobj);
    fileReader.onload = function () {
        var img_src = fileReader.result;
        var image = document.querySelector("#post_img");
        image.setAttribute('src', img_src);
        image.setAttribute('style', 'display:');
    }
}

$(document).ready(function () {
    $('.folowBtn').click(function () {
        var user_id_value = $(this).data("userId");
        var button = this;
        $(button).attr('disabled', true);

        $.ajax({
            type: "POST",
            url: "assets/php/ajax.php?follow",
            data: { user_id: user_id_value },
            dataType: 'json',
            success: function (response) {
                console.log(response);
                if (response.status) {
                    $(button).attr('disabled', false);
                    $(button).data("userId", 0);
                    $(button).html("<i class='bi bi-check-circle-fill'></i>");
                } else {

                }
                console.log(response);
            },
            error: function (error) {
                console.log(error.responseText);

            }

        });
    });

    $('.like_btn').click(function () {
        var user_id_v = $(this).data('userId');
        var post_id_v = $(this).data('postId');
        var button = this;
        var btnFinal = this.i;
        var isLike = false;
        //$('#countLike').text("hehe");
        var countlike = parseInt($('#countLike').text());
        var countlikeAfter = countlike + 1;
        $('#countLike').text(countlikeAfter);
        $.ajax({
            url: "assets/php/ajax.php?like",
            type: "POST",
            data: { user_id: user_id_v, post_id: post_id_v },
            dataType: 'json',
            success: function (response) {
                console.log(response);
                if (response.status) {

                    // $(button).attr('disabled', false);
                    location.reload();
                    $(button).attr('class', "text-decoration-none text-muted me-3 fa-regular fa-heart fa-solid");


                } else {

                }
            }, error: function (error) {
                console.log(error.responseText);

            }
        });
    });

    $('.unlike_btn').click(function () {
        var user_id_v = $(this).data('userId');
        var post_id_v = $(this).data('postId');
        var button = this;
        var countlike = parseInt($('#countLike').text());
        var countlikeAfter = countlike - 1;
        $('#countLike').text(countlikeAfter);
        //$(button).attr('disabled', true);
        $.ajax({
            url: "assets/php/ajax.php?unlike",
            type: "POST",
            data: { user_id: user_id_v, post_id: post_id_v },
            dataType: 'json',
            success: function (response) {
                console.log(response);
                if (response.status) {
                    // $(button).attr('disabled', false);

                    location.reload();

                    $(button).attr('class', "text-decoration-none text-muted me-3 fa-regular fa-heart");
                    //button = 

                } else {

                }
            }, error: function (error) {
                console.log(error.responseText);

            }
        });
    });

    $(".add-comment").click(function () {
        var button = this;
        var post_id_v = $(this).data('postId');
        var cs = $(this).data('cs');
        var comment_v = $(button).siblings('.comment-input').val();
        if (comment_v == '') {
            return 0;
        }

        $(button).attr('disabled', true);
        $(button).siblings('.comment-input').attr('disabled', true);

        $.ajax({
            url: 'assets/php/ajax.php?addcomment',
            method: 'post',
            dataType: 'json',
            data: { post_id: post_id_v, comment: comment_v },
            success: function (response) {
                console.log(response.status);
                if (response.status) {
                    $(button).attr('disabled', false);

                    $("#" + cs).append(response.comment);
                    location.reload();

                    $(button).siblings('.comment-input').attr('disabled', false);
                    $(button).siblings('.comment-input').val('');
                } else {
                    $(button).attr('disabled', false);
                    $(button).siblings('.comment-input').attr('disabled', false);
                    alert("يوجد خطأ");
                }

            }, error: function (error) {
                console.log(error.responseText);

            }
        });
    });

});
var chatting_user_id = 10;

function synmsg() {
    $.ajax({
        url: 'assets/php/ajax.php?getmessages',
        method: 'post',
        dataType: 'json',
        data: { chatter_id: chatting_user_id },
        success: function (response) {
            console.log("response");
            //console.log(response);
            //console.log(response.chatlist);
            console.log(response);
            $("#chatlist").html(response.chatlist);
            $("#user_chat").html(response.chat);

        }
    });
}
synmsg();

setInterval(() => {
    synmsg();
}, 1000);

{/* <script>
    //$(document).ready(function(){

        //         $.ajax({
        //                  type: "POST",
        //     url: "assets/php/ajax.php?unfollow",
        //     data: {user_id: user_id_value },
        //     dataType: 'json',
        //     success: function(){

        //     },error: function(){

        //     }
        //         });
   // });
</script> */}
