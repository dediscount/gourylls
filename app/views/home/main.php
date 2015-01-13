<div class="cover mask-cover">
	<img class="img-cover" src="/gourylls/public/image/fish.jpg"/>
</div>
<div class="row-fluid">
	<div class="span12 dice">
		
		<h1 id="course" ><a id="diceResult"></a></h1><!--The random course is displayed here-->

		<div class="btn-group btn-group-justified btn-dice-home" role="group" aria-label="...">
		  <div class="btn-group" style="width:230px" role="group">
		    <!--call the random function when this button is clicked-->
			<button type="button" class="btn btn-hue btn-dice" onclick="dice()">Click to dice</button>
		  </div>
		  <div class="btn-group" style="width:70px" role="group">
			<a href="found" title="Find more">
				<button type="button" class="btn btn-hue btn-home">	
						<span class="glyphicon glyphicon-home" style="color:#FFF"></span>	
				</button>
			</a>
		  </div>
		</div>
			<!--goto home when clicked-->
		<div class="form-group">
			<select name="" id="dice-category" class="form-control">
				<option value="all">-- All --</option>
				<option value="breakfast">Breakfast</option>
				<option value="lunch">Lunch</option>
				<option value="dinner">Dinner</option>
				<option value="nightSnack">Night Snack</option>
			</select>
		</div>
	</div>
</div>