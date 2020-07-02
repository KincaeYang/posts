var ue = UE.getEditor('content');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//关注、取消关注
$(".like-button").click(function (event) {
    var target = $(event.target);
    var current_like = target.attr("like-value");
    var csrf = target.attr("csrf");
    var user_id = target.attr("like-user");
    if (current_like == 1){
        //取消操作
        $.ajax({
            url:"/user/"+user_id+"/unfan",
            method: 'POST',
            dataType: "json",
            success:function (data) {
                if (data.error != 0){
                    alert(data.msg);
                    return;
                }
                target.attr("like-value",0);
                target.text("关注");
            }
        });
    } else {
        $.ajax({
            url:"/user/"+user_id+"/dofan",
            method: 'POST',
            dataType: "json",
            success:function (data) {
                if (data.error != 0){
                    alert(data.msg);
                    return;
                }
                target.attr("like-value",1);
                target.text("取消关注");
            }
        });
    }
});

