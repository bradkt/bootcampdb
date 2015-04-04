<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="main.css">
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<script>
function getinfo(str) {
    if (str == "") {
        document.getElementById("selection").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("selection").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","results.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
<script>
function getinfo1(){
    document.getElementById("selection").innerHTML = "Hello World";
}
</script>

</head>

<body>

<header>
<div>
	<code class="top-center">{{bootcampdb}}
	<div class="nav">
	<?php include 'menu.php';?>
	</div>
	</code>
</div> 
<p class="bottom-center">
	It's a big decision, make sure you have all the information you need to make it.
</p> 
</div>

</header>

<section class="aboveFoldGreeting">
<h1>So your Thinkning about going to bootcamp?</h1>
<p>
Bootcampdb will help you get all the information you need to decide which bootcamp is right for you.
</p>
<p>
Many times the location of the bootcamp determines the location of the job placement, which means you, and your family,
are moving on to a new chapter in your lives, big decision right? Now you want to know information about the city,
schools, local weather, things to do, everything.  This website is geared to help.
</p>
</section> 

<div class="line-separator"></div>

<section id="selection">Selection a bootcamp you would like information on by clicking below</section>

<section class="data">
	<?php echo '<p>Here are the most popular Coding Bootcamp available today...</p>'; ?>
	<?php
	$servername = "localhost";
	$username = "brad";
	$password = "Joven_2015";
	$dbname = "bootcampdb";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT logoImage, indexURL, uniqueid, bootcamp, locationMainCity FROM camps";
	$result = $conn->query($sql);


	if ($result->num_rows > 0) {
    // output data of each row
    	while($row = $result->fetch_assoc()) {
    	//while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["uniqueid"]. " - Name: " . $row["bootcamp"]. " HeadQuarters: " . $row["locationMainCity"]. "<br>";
    	//echo '<a href="'.$row["indexURL"].'"><img src=media/'.$row["logoImage"].' alt="BootCampLogo" class="images"></a>';
        //echo '<img src=media/'.$row["logoImage"].' alt="BootCampLogo" class="images" onclick="getinfo('.$row["uniqueid"].')">';
        //echo '<input type="image" src="'.$row["logoImage"].'" class="images" onclick="getinfo('.$row["uniqueid"].')"/>';
        echo '<input type="image" src="media/'.$row["logoImage"].'" style="width:90px;height:90px;padding:5px" onclick="getinfo('.$row["uniqueid"].')"/>';

    }
		} else {
    	echo "0 results";
	}

	$conn->close();
	?>
</section>


</body>
<footer>
<?php
echo "<p>Copyright &copy; 2014-" . date("Y") . " bootcamp.db</p>";
?>
</footer>
</html>