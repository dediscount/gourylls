
 //resize the fixed navigation bar on top of content

$(window).resize(function(){
	sizeAdjustor();
})
$(window).load(function(){
	sizeAdjustor();
})
//adjust size when loading or windows changed
function sizeAdjustor()
{
	if($("#found-content-nav").length)
	{
		document.getElementById("found-content-nav").style.width=document.getElementById("found-content").offsetWidth+"px";
	}
	if($("#user-nav").length)
	{
		document.getElementById("user-nav").style.width=document.getElementById("user-container").offsetWidth+"px";
	}
	if($("#user-info-icon").length)
	{
		document.getElementById("user-info-icon").style.height=document.getElementById("user-info-icon").offsetWidth+"px";
	}
	if($("#user-post-ul").length)
	{
		$("#user-post-ul").css("padding-left",$("#user-post").width()*0.015);
	}
	if($(".user-post-ul li div").length)
	{
		$(".user-post-ul li div").css("height",$(".user-post-ul li div").width());
	}
	if($(".photo-detail-photo").length)
	{
		$(".photo-detail-photo").css("height",$(".photo-detail-photo").width()*(9/16));
	}
	if($(".found-photo-content").length)
	{
		$(".found-photo-content").css("height",$(".found-photo-content").width()*(9/16));
	}
}

function showEditForm(event)
{
	if(event=="changeName"||event=="changePW"||event=="close")
	{
		$("#user-info-edit-a").css("display","none");
		switch(event){
			case "changeName":
				$("#user-info-change-pw").css("display","none");
				$("#user-info-name").css("display","none");
				$("#user-info-change-name").css("display","block");
				break;
			case "changePW":
				$("#user-info-change-pw").css("display","block");
				$("#user-info-name").css("display","block");
				$("#user-info-change-name").css("display","none");
				break;
			case "close":
				$("#user-info-change-pw").css("display","none");
				$("#user-info-name").css("display","block");
				$("#user-info-change-name").css("display","none");
				$("#user-info-edit-a").css("display","block");
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
	var children=event.getElementsByTagName('span');
	var photoid=event.parentNode.parentNode.id;//the id of photo, user this to update

	if(children[1].style.display=="inline-block" && children[2].style.display=="none")//if empty
	{
		children[1].style.display="none";
		children[2].style.display="inline-block";
		/**
		* like +1 with the photoid given above
		* insert a message in table 'like' with the photoid and userid
		**/
	}
	else if(children[1].style.display=="none" && children[2].style.display=="inline-block")//if full
	{
		children[1].style.display="inline-block";
		children[2].style.display="none";
		/**
		* like -1 with the photoid given above 
		* delete the message in table 'like' with the photoid and userid
		**/
	}
}

function checkload()
{
	if($(document).scrollTop()>=$(document).height()-$(window).height())
	{
		loadmore();
	}
}

function loadmore()
{
	/**
	 *load more photos
	 
	 var name = $('#name').val();
	$.ajax({
		url : '/project/app/view/found/loadmore.php',
		data: 'name='+name,		
		success : function (data) {
		 $("#loadmore").before(data);
			//$('#content').html(data);
		}

	}
	
	
	);*/
	
       
       $.get("/gourylls/app/views/found/loadmore.php",function(response){
           $("#loadmore").before(response);
       });
       sizeAdjustor();
}