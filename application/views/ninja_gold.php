<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Ninja Gold Game</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/styles.css">
	<style>

</style>
</head>
<body>
	<h1>Your Gold: </h1>
	<div id="goldCounter"><?php echo $gold ?></div>

	<form class="box b1" action="/ninjagold/farm" method="post" >
		<h2>Farm</h2>
		<h3>(earns 10-20 gold)</h3>
		<input type="hidden" name="building" value="farm">
		<input class="goldButton" type="submit" value="Find Gold!">
	</form>
	<form class="box b2" action="/ninjagold/cave" method="post">
		<h2>Cave</h2>
		<h3>(earns 5-10 gold)</h3>
		<input type="hidden" name="outdoors" value="cave">
		<input class="goldButton" type="submit" value="Find Gold!">
	</form>
	<form class="box b3" action="/ninjagold/house" method="post">
		<h2>House</h2>
		<h3>(earns 2-5 gold)</h3>
		<input type="hidden" name="home" value="house">
		<input class="goldButton" type="submit" value="Find Gold!">
	</form>
	<form class="box b4" action="/ninjagold/casino" method="post">
		<h2>Casino!</h2>
		<h3>(earns/takes 0-50 gold)</h3>
		<input type="hidden" name="gamble" value="casino">
		<input class="goldButton" type="submit" value="Find Gold!">
	</form>
	
	<h2>Activities:</h2>
	<div id="activities">
<?php 	if(!empty($messages)) {
			foreach (array_reverse($messages) as $message) {
				echo $message. '<br>';
			} 
		} ?>
	</div>
	<form action="process.php" method="post">
		<input type="hidden" name="reset" value="reset">
		<input class="refresh" type="submit" name="reset" value="Start Over!">
	</form>
</body>
</html>