<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

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

    $sql = "SELECT indexURL, uniqueid, bootcamp, locationMainCity FROM camps";
    $result = $conn->query($sql);
    $a = ();

    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
        $a[] = $row["indexURL"]; 
        
    }
        } else {
        echo "0 results";
    }

    $conn->close();
    ?>
<!--?php
$q = intval($_GET['q']);

$servername = "localhost";
$username = "brad";
$password = "Joven_2015";
$dbname = "bootcampdb";

    // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

mysqli_select_db($conn,"ajax_demo");
$sql="SELECT * FROM camps WHERE uniqueid = '".$q."'";
$result = mysqli_query($conn,$sql);

echo "<table>
<tr>
<th>Bootcamp</th>
<th>Main City</th>
<th>State</th>
<th>Cost of Program</th>
<th>Primary Language</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['bootcamp'] . "</td>";
    echo "<td>" . $row['locationMainCity'] . "</td>";
    echo "<td>" . $row['locationMainState'] . "</td>";
    echo "<td>" . $row['cost'] . "</td>";
    echo "<td>" . $row['languageMain'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($conn);
?-->
</body>
</html>