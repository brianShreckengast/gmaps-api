<?php

/*here's a change*/
$db = new mysqli("localhost", "root", "root", "intro_to_php");
if($db->connect_errno){

	echo "Failed to connect to MySQL :( <br>";
	echo $db->connect_error;
	exit();
	}


function drawMarkers ($marker_array){

	$map = '<img src ="https://maps.googleapis.com/maps/api/staticmap?size=600x300&markers=color:green%';

	foreach ($marker_array as $marker) {

		$map .= urlencode($marker['address']) . "|";

	}

	return $map;
}

$sql = "SELECT * FROM markers";

$result = $db->query($sql);

if (empty($result)){

	echo drawMarkers($result);

	}

else {

	/*echo '<img src ="https://maps.googleapis.com/maps/api/staticmap?center=austin+texas&size=600x300">';*/
	}


if(isset($_POST['submit'])){

	if($_POST['marker']!= 'Enter a location'){

		

		$stmt = $db->prepare("INSERT INTO markers (address) VALUES (?)");

		$marker = $_POST['marker'];

		$stmt->bind_param("s", $marker);

		$stmt->execute();
	}

}	


?>

<div style ="float:left;">
<p>Enter a new location to add a marker</p>
<p>khkhk</p>


<form action="mapGenerator2.php" method ="POST">

<input type="text" name="marker" value="Enter a location">

<input type ="submit" name ="submit" value ="Go!">

</form>

</div>


</html>

