

$("document").ready(function () {
    if ($("#upload-file"))
    {
        $("#upload-file").change(changeFile);
    }
    
    //clear the signs when input login information
    if ($("#inputInput-Account"))
    {
        $("#inputInput-Account").keyup(function(){
        	clearSign($("#inputInput-Account"));
        	clearSign($("#inputInput-Password"));
        });
        $("#inputInput-Password").keyup(function(){
        	clearSign($("#inputInput-Account"));
        	clearSign($("#inputInput-Password"));
        });
    }


});





//resize the fixed navigation bar on top of content

$(window).resize(function () {
    sizeAdjustor();
});
$(window).load(function () {
    sizeAdjustor();
});
//adjust size when loading or windows changed
function sizeAdjustor()
{
    if ($("#found-content-nav").length)
    {
        document.getElementById("found-content-nav").style.width = document.getElementById("found-content").offsetWidth + "px";
    }
    if ($("#user-nav").length)
    {
        document.getElementById("user-nav").style.width = document.getElementById("user-container").offsetWidth + "px";
    }
    if ($("#user-info-icon").length)
    {
        document.getElementById("user-info-icon").style.height = document.getElementById("user-info-icon").offsetWidth + "px";
    }
    if ($("#user-post-ul").length)
    {
        $("#user-post-ul").css("padding-left", $("#user-post").width() * 0.015);
    }
    if ($(".user-post-ul li div").length)
    {
        $(".user-post-ul li div").css("height", $(".user-post-ul li div").width());
    }
    if ($(".photo-detail-photo").length)
    {
        $(".photo-detail-photo").css("height", $(".photo-detail-photo").width() * (9 / 16));
    }
    if ($(".found-photo-content").length)
    {
        $(".found-photo-content").css("height", $(".found-photo-content").width() * (9 / 16));
    }
}

function showEditForm(event)
{
    if (event == "changeName" || event == "changePW" || event == "close")
    {
        $("#user-info-edit-a").css("display", "none");
        switch (event) {
            case "changeName":
                $("#user-info-change-pw").css("display", "none");
                $("#user-info-name").css("display", "none");
                $("#user-info-change-name").css("display", "block");
                break;
            case "changePW":
                $("#user-info-change-pw").css("display", "block");
                $("#user-info-name").css("display", "block");
                $("#user-info-change-name").css("display", "none");
                break;
            case "close":
                $("#user-info-change-pw").css("display", "none");
                $("#user-info-name").css("display", "block");
                $("#user-info-change-name").css("display", "none");
                $("#user-info-edit-a").css("display", "block");
                break;
        }
    }
}

//delete photo
function deletePhoto()
{
    var photoid = $("#photo-detail").parent().attr("id");
    //firstly, check if the photo is posted by current user
    //if true, delete it
}

//display different hearts when clicked
function clickheart(event)
{
    var children = event.getElementsByTagName('span');
    var photoid = event.parentNode.parentNode.id;//the id of photo, user this to update

    if (children[1].style.display == "inline-block" && children[2].style.display == "none")//if empty
    {
        children[1].style.display = "none";
        children[2].style.display = "inline-block";
        /**
         * like +1 with the photoid given above
         * insert a message in table 'like' with the photoid and userid
         **/
    }
    else if (children[1].style.display == "none" && children[2].style.display == "inline-block")//if full
    {
        children[1].style.display = "inline-block";
        children[2].style.display = "none";
        /**
         * like -1 with the photoid given above 
         * delete the message in table 'like' with the photoid and userid
         **/
    }
}

function checkload()
{
    if ($(document).scrollTop() >= $(document).height() - $(window).height())
    {
        loadmore();
    }
}

function login()
{
    clearSign($("#inputInput-Account"));
    clearSign($("#inputInput-Password"));
    var account=$("#inputInput-Account").val();
    //alert(account);
    var password=$("#inputInput-Password").val();
    //alert(password);
    //showError($("#inputInput-Account"));
    $.ajax({
        // The URL for the request
        url: "/gourylls/login",
        // The data to send (will be converted to a query string)
        data: { account: account, password: password },
        // Whether this is a POST or GET request
        type: "POST",
        // The type of data we expect back
        dataType: "text",
        // Code to run if the request succeeds;
        // the response is passed to the function
        success: function (data) {
            
            data=parseInt(data);
            if(data==0)
            {
                //alert(typeof(data));
                showError($("#inputInput-Account"));
                showError($("#inputInput-Password"));
                $("#inputInput-Password").val("");
                $("#inputInput-Password").focus();
                return;
            }
            if(data==1)
            {
                window.location ="/gourylls/found";
            }
            
            
            
        },
        // Code to run if the request fails; the raw request and
        // status codes are passed to the function
        error: function (xhr, status, errorThrown) {
            alert("Sorry, there was a problem!");
            console.log("Error: " + errorThrown);
            console.log("Status: " + status);
            console.dir(xhr);
        }
        // Code to run regardless of success or failure

    });
    return false;
}

function loadmore()
{

    $.ajax({
        // The URL for the request
        url: "/gourylls/app/views/found/loadmore.php",
        // The data to send (will be converted to a query string)

        // Whether this is a POST or GET request
        type: "GET",
        // The type of data we expect back
        dataType: "html",
        // Code to run if the request succeeds;
        // the response is passed to the function
        success: function (html) {
            $("#loadmore").before(html);
            sizeAdjustor();
        },
        // Code to run if the request fails; the raw request and
        // status codes are passed to the function
        error: function (xhr, status, errorThrown) {
            alert("Sorry, there was a problem!");
            console.log("Error: " + errorThrown);
            console.log("Status: " + status);
            console.dir(xhr);
        }
        // Code to run regardless of success or failure

    });

//    $.get("/gourylls/app/views/found/loadmore.php", function (response) {
//        $("#loadmore").before(response);
//    });

}

//upload files

function changeFile()
{
    var pic = document.getElementById("upload-photo-preview");
    var file = document.getElementById("upload-file");
    var ext = file.value.substring(file.value.lastIndexOf(".") + 1).toLowerCase();
    $("#uploadModal").modal();
    // gif在IE浏览器暂时无法显示
    if (ext != 'png' && ext != 'jpg' && ext != 'jpeg' && ext != 'gif') {
        alert("文件必须为图片！");
        return;
    }
    // IE浏览器
    if (document.all) {

        file.select();
        var reallocalpath = document.selection.createRange().text;
        var ie6 = /msie 6/i.test(navigator.userAgent);
        // IE6浏览器设置img的src为本地路径可以直接显示图片
        if (ie6)
            pic.src = reallocalpath;
        else {
            // 非IE6版本的IE由于安全问题直接设置img的src无法显示本地图片，但是可以通过滤镜来实现
            pic.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='image',src=\"" + reallocalpath + "\")";
            // 设置img的src为base64编码的透明图片 取消显示浏览器默认图片
            pic.src = 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==';
        }
    } else {
        html5Reader(file);
    }


}
;

function html5Reader(file) {
    var file = file.files[0];
    var reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function (e) {
        var pic = document.getElementById("upload-photo-preview");
        pic.src = this.result;
    }
}
//.upload-file ends

//check input field
function checkRequired(event) {
    var field = event.target;
    var form = $(field).parent(".form-group");
    if ($(field).val() != "")
    {
        $(form).removeClass("has-warning").removeClass("has-error").removeClass("has-success");
        $(form).addClass("has-success");
    }
    else
    {
        $(form).removeClass("has-warning").removeClass("has-error").removeClass("has-success");
        $(form).addClass("has-warning");
    }
} 
//input field styles
 function clearSign(event)
 {
 	var field=event;
 	var form=$(field).parent(".form-group");
 	$(form).removeClass("has-warning").removeClass("has-error").removeClass("has-success");
 	if($(field).siblings(".form-control-feedback").length)
 	{
 		$(field).siblings(".form-control-feedback").removeClass("glyphicon-ok").removeClass("glyphicon-warning-sign").removeClass("glyphicon-remove");
 	}
 }
 function showError(event)
 {
 	var field=event;
 	var form=$(field).parent(".form-group");
 	$(form).removeClass("has-warning").removeClass("has-error").removeClass("has-success");
 	$(form).addClass("has-error");
 	if($(field).siblings(".form-control-feedback").length)
 	{
 		$(field).siblings(".form-control-feedback").removeClass("glyphicon-ok").removeClass("glyphicon-warning-sign").removeClass("glyphicon-remove").addClass("glyphicon-remove");
 	}
 }

 function showWarning(event)
 {
 	var field=event;
 	var form=$(field).parent(".form-group");
 	$(form).removeClass("has-warning").removeClass("has-error").removeClass("has-success");
 	$(form).addClass("has-warning");
 	if($(field).siblings(".form-control-feedback").length)
 	{
 		$(field).siblings(".form-control-feedback").removeClass("glyphicon-ok").removeClass("glyphicon-warning-sign").removeClass("glyphicon-remove").addClass("glyphicon-warning-sign");
 	}
 }

 function showSuccess(event)
 {
 	var field=event;
 	var form=$(field).parent(".form-group");
 	$(form).removeClass("has-warning").removeClass("has-error").removeClass("has-success");
 	$(form).addClass("has-success");
 	if($(field).siblings(".form-control-feedback").length)
 	{
 		$(field).siblings(".form-control-feedback").removeClass("glyphicon-ok").removeClass("glyphicon-warning-sign").removeClass("glyphicon-remove").addClass("glyphicon-ok");
 	}
 }
//...input field styles end

