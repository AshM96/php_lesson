
$(function () {

    
    $(`#email`).on('blur',function () {

        const email = $(this).val();
        const obj ={
            'user':email
        };

        $.ajax({

            url:'emalVerification.php',
            method:'post',
            data:obj,
            dataType:'json',
            success:function (res) {

                $('#error').html(res.error)
            }



        })

    });

    $("#saveEdit").on('click',function (event) {
        event.preventDefault();
        const data = $(this).parent().serialize();
       // console.log(data);

       $.ajax({
            url: 'editProfile.php',
            method: 'post',
            data: data,
            dataType: 'json',
            success: function (res1) {
                if(res1){
                    $('#newN').html(res1.newN);
                    $('#newS').html(res1.newS);
                    $('#newD').html(res1.newD);
                    $('#myModal').modal('hide');
                }


            }
        })
    });

    $('.deletepost').click(function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        $.ajax({
            url: 'deletePost.php',
            method: 'post',
            data: formData,
            dataType: 'json',
            cache: false,
            processData: false,
            contentType: false,
            success(res){
                if(res){
                    var r = $('a'+res.iddd);
                    $('.deletepost').attr("id","r");
                    $('#r').parent().remove();
                }

            }
        })

    })




    /*$('#postUpload').submit(function (event) {
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: 'postProcess.php',
            method: 'post',
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            dataType: 'json',
            success: function (result) {
                $('#postTitle').html(result.post_title);
                $('#postText').html(result.post_text);
                $('#postImg').html(result.post_img);

            }
        })


    })*/

});
