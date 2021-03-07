<?php
$c=$_GET['c'];
$g=$_GET['g'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blood";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * from details where citys='$c' and groups='$g'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<center><table style=\"width:90%;\" border=1>
    <tr>
    <th>Names</th>
    <th>States</th>
    <th>Citys</th>
    <th>Emails</th>
    <th>Mobils</th>
    <th>Blood Groups</th>
    </tr>";
    while($row = $result->fetch_assoc()) {
       $name=$row["names"];
       $states=$row["states"];
       $citys=$row["citys"];
       $emails=$row["emails"];
       $mobiles=$row["mobiles"];
       $groups=$row["groups"];
       echo "<tr>
       <td style=\"text-transform:uppercase;\">$name</td>
       <td>$states</td>
       <td>$citys</td>
       <td>$emails</td>
       <td>$mobiles</td>
       <td>$groups</td>
       </tr>";
    }
    echo "</table></center>";
} else {
    echo "<center>No Results Found!</center>";
}
$conn->close();
?>