var loadPic = -1;
var iconCache;
var uploadPhoto;


$("document").ready(function () {
    $(window).unload(function () {
        document.body.scrollTop = document.documentElement.scrollTop = 0;
    })
    //
    if ($("#upload-photo-button").on("click", function () {
        $("#upload-file").replaceWith(uploadPhoto = uploadPhoto.clone(true));
        $("#upload-photo-preview").attr("src", "");
        $("#upload-file").parent().css("display", "inline-block");
    }))
        //
        $("#user-post-ul > li > div").click(showPhotoDetail);
    //
    $(".found-photo-user").click(showUserDetail);
    //

    if ($("#upload-file").length)
    {
        $("#upload-file").change(function () {
            if ($("#upload-file").css("display") != "none")
            {
                changeFile();
                $("#upload-file").parent().css("display", "none");
            }
        });
    }
    //
    if ($("#upload-icon-container"))
    {
        $("#upload-icon").change(function () {
            changeIcon();
            showEditForm("changeIcon")
        });
    }

    //clear the signs when input login information
    if ($("#inputInput-Account"))
    {
        $("#inputInput-Account").keyup(function () {
            clearSign($("#inputInput-Account"));
            clearSign($("#inputInput-Password"));
        });
        $("#inputInput-Password").keyup(function () {
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
    loadmore();
    sizeAdjustor();
    if ($("#user-info-icon-img").length)
        iconCache = $("#user-info-icon-img").attr("src");
    uploadPhoto = $("#upload-file");
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
    if ($(".user-post-ul>li>div").length)
    {
        $(".user-post-ul>li>div").css("height", $(".user-post-ul>li>div").width());
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
    if (event == "changeName" || event == "changePW" || event == "changeIcon" || event == "close")
    {
        $("#user-info-edit-a").css("display", "none");
        $("#upload-icon-container").css("display", "block");
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
            case "changeIcon":
                $("#user-info-change-pw").css("display", "none");
                $("#user-info-name").css("display", "none");
                $("#user-info-change-name").css("display", "none");
                $("#user-info-icon-footer").css("display", "block");
                break;
            case "close":
                $("#user-info-change-pw").css("display", "none");
                $("#user-info-name").css("display", "block");
                $("#user-info-change-name").css("display", "none");
                $("#upload-icon-container").css("display", "none");
                $("#user-info-icon-footer").css("display", "none");
                $("#user-info-edit-a").css("display", "block");
                $("#user-info-icon-img").attr("src", iconCache);
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
        $.ajax({
            // The URL for the request
            url: "/gourylls/found/like",
            // The data to send (will be converted to a query string)
            data: {picID: photoid},
            // Whether this is a POST or GET request
            type: "POST",
            error: function (xhr, status, errorThrown) {
                alert("Sorry, there was a problem!");
                console.log("Error: " + errorThrown);
                console.log("Status: " + status);
                console.dir(xhr);
            }
            // Code to run regardless of success or failure
        });

    }
    else if (children[1].style.display == "none" && children[2].style.display == "inline-block")//if full
    {
        children[1].style.display = "inline-block";
        children[2].style.display = "none";
        //alert(photoid);
        /**
         * like -1 with the photoid given above 
         * delete the message in table 'like' with the photoid and userid
         **/
        $.ajax({
            // The URL for the request
            url: "/gourylls/found/dislike",
            // The data to send (will be converted to a query string)
            data: {picID: photoid},
            // Whether this is a POST or GET request
            type: "POST",
            error: function (xhr, status, errorThrown) {
                alert("Sorry, there was a problem!");
                console.log("Error: " + errorThrown);
                console.log("Status: " + status);
                console.dir(xhr);
            }
            // Code to run regardless of success or failure
        });
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
    var account = $("#inputInput-Account").val();
    //alert(account);
    var password = $("#inputInput-Password").val();
    //alert(password);
    //showError($("#inputInput-Account"));
    $.ajax({
        // The URL for the request
        url: "/gourylls/login",
        // The data to send (will be converted to a query string)
        data: {account: account, password: password},
        // Whether this is a POST or GET request
        type: "POST",
        // The type of data we expect back
        dataType: "text",
        // Code to run if the request succeeds;
        // the response is passed to the function
        success: function (data) {
            data = parseInt(data);
            if (data == 1)
            {
                showError($("#inputInput-Account"));
                showError($("#inputInput-Password"));
                $("#inputInput-Password").val("");
                $("#inputInput-Password").focus();
                return;
            }
            if (data == 0)
            {
                window.location = "/gourylls/found";
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

function signin()
{
//    clearSign($("#inputInput-Account"));
//    clearSign($("#inputInput-Password"));
    var account = $("#signin-Account").val();
    var name = $("#signin-Username").val();
    var password_1 = $("#signin-Password").val();
    var password_2 = $("#signin-Password-confirm").val();

    $.ajax({
        // The URL for the request
        url: "/gourylls/signin",
        // The data to send (will be converted to a query string)
        data: {account: account, name: name, password_1: password_1, password_2: password_2},
        // Whether this is a POST or GET request
        type: "POST",
        // The type of data we expect back
        dataType: "text",
        // Code to run if the request succeeds;
        // the response is passed to the function
        success: function (data) {

            data = parseInt(data);
            //alert(data);
            if (data == 1)
            {
                //alert(typeof(data));
                showError($("#signin-Account"));
            } else if (data == 2)
            {
                showError($("#signin-Username"));
            } else if (data == 3)
            {
                showError($("#signin-Password"));
                showError($("#signin-Password-confirm"));
            } else if (data == 0)
            {
                window.location = "/gourylls/found";
            }
            else
            {
                window.location = "/gourylls";
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
    var i = 0;
    while (loadPic > -2 && i < 3)

    {
        i++;
        loadPic++;
        $.ajax({
            async: false,
            // The URL for the request
            url: "/gourylls/found/loadmore",
            // The data to send (will be converted to a query string)
            data: {num: loadPic},
            // Whether this is a POST or GET request
            type: "POST",
            // The type of data we expect back
            dataType: "html",
            // Code to run if the request succeeds;
            // the response is passed to the function
            success: function (html) {
                //alert(loadPic);
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
    }

}

//change user name
function changeName()
{
    var name = $("#user_userName").val();
    $.ajax({
        // The URL for the request
        url: "/gourylls/user/changename",
        // The data to send (will be converted to a query string)
        data: {name: name},
        // Whether this is a POST or GET request
        type: "POST",
        // The type of data we expect back
        dataType: "text",
        // Code to run if the request succeeds;
        // the response is passed to the function
        success: function (data) {
            data = parseInt(data);
            //alert(data);
            if (data == 1)
            {
                showError($("#user_userName"));
            }
            else if (data == 0)
            {
                window.location = "/gourylls/user";
            }
            else
            {
                window.location = "/gourylls";
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

//change password
function changePassword()
{
    var oldPassword = $("#user_oldPassword").val();
    var password_1 = $("#user_newPassword_1").val();
    var password_2 = $("#user_newPassword_2").val();

    $.ajax({
        // The URL for the request
        url: "/gourylls/user/changepassword",
        // The data to send (will be converted to a query string)
        data: {oldPassword: oldPassword, password_1: password_1, password_2: password_2},
        // Whether this is a POST or GET request
        type: "POST",
        // The type of data we expect back
        dataType: "text",
        // Code to run if the request succeeds;
        // the response is passed to the function
        success: function (data) {
            data = parseInt(data);
            //alert(data);
            if (data == 1)
            {
                //alert(typeof(data));
                showError($("#user_oldPassword"));
            } else if (data == 2)
            {
                showError($("#user_newPassword_1"));
                showError($("#user_newPassword_2"));
            } else if (data == 0)
            {
                window.location = "/gourylls/user";
            }
            else
            {
                window.location = "/gourylls";
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


//upload files

function changeFile()
{
    var pic = document.getElementById("upload-photo-preview");
    var file = document.getElementById("upload-file");
    var ext = file.value.substring(file.value.lastIndexOf(".") + 1).toLowerCase();

    // gif在IE浏览器暂时无法显示
    if (ext !== 'png' && ext !== 'jpg' && ext !== 'jpeg' && ext !== 'gif' && ext !== 'bmp') {
        alert("File must be a picture！");
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

//upload icon
function changeIcon()
{
    var pic = document.getElementById("user-info-icon-img");
    var file = document.getElementById("upload-icon");
    var ext = file.value.substring(file.value.lastIndexOf(".") + 1).toLowerCase();
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
        html5IconReader(file);
    }
}
;

function html5IconReader(file) {
    var file = file.files[0];
    var reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function (e) {
        var pic = document.getElementById("user-info-icon-img");
        pic.src = this.result;
    }
}
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
    var field = event;
    var form = $(field).parent(".form-group");
    $(form).removeClass("has-warning").removeClass("has-error").removeClass("has-success");
    if ($(field).siblings(".form-control-feedback").length)
    {
        $(field).siblings(".form-control-feedback").removeClass("glyphicon-ok").removeClass("glyphicon-warning-sign").removeClass("glyphicon-remove");
    }
}
function showError(event)
{
    var field = event;
    var form = $(field).parent(".form-group");
    $(form).removeClass("has-warning").removeClass("has-error").removeClass("has-success");
    $(form).addClass("has-error");
    if ($(field).siblings(".form-control-feedback").length)
    {
        $(field).siblings(".form-control-feedback").removeClass("glyphicon-ok").removeClass("glyphicon-warning-sign").removeClass("glyphicon-remove").addClass("glyphicon-remove");
    }
}

function showWarning(event)
{
    var field = event;
    var form = $(field).parent(".form-group");
    $(form).removeClass("has-warning").removeClass("has-error").removeClass("has-success");
    $(form).addClass("has-warning");
    if ($(field).siblings(".form-control-feedback").length)
    {
        $(field).siblings(".form-control-feedback").removeClass("glyphicon-ok").removeClass("glyphicon-warning-sign").removeClass("glyphicon-remove").addClass("glyphicon-warning-sign");
    }
}

function showSuccess(event)
{
    var field = event;
    var form = $(field).parent(".form-group");
    $(form).removeClass("has-warning").removeClass("has-error").removeClass("has-success");
    $(form).addClass("has-success");
    if ($(field).siblings(".form-control-feedback").length)
    {
        $(field).siblings(".form-control-feedback").removeClass("glyphicon-ok").removeClass("glyphicon-warning-sign").removeClass("glyphicon-remove").addClass("glyphicon-ok");
    }
}
//...input field styles end

//dice
function dice()
{
    var type = $("#dice-category").val();
    switch (type)
    {
        case "breakfast":
            type = 1;
            break;
        case "lunch":
            type = 2;
            break;
        case "dinner":
            type = 3;
            break;
        case"nightSnack":
            type = 4;
            break;
        default:
            type = 0;
    }
    var food = [];

    var resultText;//get from server side
    var resultHref = "http://www.google.com";//get from server side

    var intervalIndex = 0;

    var pesudoResults;
    var pesudoLength;

    $.ajax({
        url: "/gourylls/home/dice",
        data: {category: type},
        type: "POST",
        dataType: "text",
        success: function (tips) {
            //alert(tips);
            var obj = $.parseJSON(tips);
            var i;
            for (i = 0; i < obj.tips.length; i++)
            {
                food[i] = obj.tips[i].name;
                //alert(food[i]);
            }
            pesudoResults = food;
            pesudoLength = pesudoResults.length;

            var r = Math.floor(Math.random() * pesudoLength);
            resultText = obj.tips[r].name;
            resultHref = obj.tips[r].recipe_link;
            showResult();
        },
        error: function (xhr, status, errorThrown) {
            alert("Sorry, there was a problem!");
            console.log("Error: " + errorThrown);
            console.log("Status: " + status);
            console.dir(xhr);
        }
    });
    function showResult()
    {
        $("#diceResult").html(pesudoResults[Math.floor(Math.random() * pesudoLength)]);

        var timeInterval;
        if (intervalIndex <= 10)
            timeInterval = 200;
        else
            timeInterval = 200 + 100 * (intervalIndex - 10);

        intervalIndex++;

        if (intervalIndex <= 13)
            setTimeout(function () {
                showResult();
            }, timeInterval);
        else
        {
            $("#diceResult").attr("href", resultHref);
            $("#diceResult").html(resultText + "<span class='glyphicon glyphicon-chevron-right'></span>");
        }
    }
}

function showPost()
{
    $.ajax({
        url: "/gourylls/user/showpost",
        //data: {id: photoId},
        type: "POST",
        dataType: "html",
        success: function (post) {
            $("#photo-detail-block").replaceWith(post);
            $("#user-post-ul > li > div").click(showPhotoDetail);
            
        },
        error: function (xhr, status, errorThrown) {
            alert("Sorry, there was a problem!");
            console.log("Error: " + errorThrown);
            console.log("Status: " + status);
            console.dir(xhr);
        }
    });
}

function showPhotoDetail(event)
{
    var photoId = event.target.id;
    var userID=$("#user-info-icon>img").attr("title");
    $.ajax({
        // The URL for the request
        url: "/gourylls/user/showdetail",
        // The data to send (will be converted to a query string)
        data: {id: photoId,userID:userID},
        // Whether this is a POST or GET request
        type: "POST",
        // The type of data we expect back
        dataType: "html",
        // Code to run if the request succeeds;
        // the response is passed to the function
        success: function (pic) {
            $("#user-post").replaceWith(pic);
            sizeAdjustor();
        },
        error: function (xhr, status, errorThrown) {
            alert("Sorry, there was a problem!");
            console.log("Error: " + errorThrown);
            console.log("Status: " + status);
            console.dir(xhr);
        }
    });


}
function showUserDetail(event)
{
    var photoId = $(event.target).parents(".found-photo-container").attr("id");
}

function deletePicture()
{
    var picID = $(".photo-detail-photo").attr("id");
    $.ajax({
        // The URL for the request
        url: "/gourylls/user/deletepicture",
        // The data to send (will be converted to a query string)
        data: {id: picID},
        // Whether this is a POST or GET request
        type: "POST",
        dataType: "html",
        success: function (post) {
            $("#photo-detail-block").replaceWith(post);
            sizeAdjustor();
            $("#user-post-ul > li > div").click(showPhotoDetail);
            $(".user-info-stats-ul > li:nth-of-type(2) > i").html($(".user-info-stats-ul > li:nth-of-type(2) > i").html() - 1);
        },
        error: function (xhr, status, errorThrown) {
            alert("Sorry, there was a problem!");
            console.log("Error: " + errorThrown);
            console.log("Status: " + status);
            console.dir(xhr);
        }
    });

}