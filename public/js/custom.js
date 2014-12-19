
 //resize the fixed navigation bar on top of content

$(window).resize(function(){
	document.getElementById("found-content-nav").style.width=document.getElementById("found-content").offsetWidth+"px";
})
$(window).load(function(){
	document.getElementById("found-content-nav").style.width=document.getElementById("found-content").offsetWidth+"px";
})


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
}