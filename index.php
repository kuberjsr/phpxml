<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$servername = "localhost";
$username = "yourusername";
$password = "yourpassword";
$db="yourdatabasename";

// Create connection
$conn = new mysqli($servername, $username, $password,$db) or die("Could not connect");
$xml = simplexml_load_file("mytables.xml") 
       or die("Error: Cannot create object");
	   
foreach($xml->children() as $cars){
	foreach($cars->children() as $car => $data){
	$sql= "create table ". $data->mytable['name']."(".$data->feilds.")";
	  
	  if ($conn->query($sql) === TRUE) {
    echo $data->mytable['name']." table created successfully"."<br>";
} else {
    echo "Error creating table: " . $conn->error;
}


	}
}

?>

</body>
</html>
