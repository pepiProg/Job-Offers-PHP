<?php
$dbc = new mysqli('localhost', 'Pepi', 'pepi', 'jobs');
function getUsername()
{
    $dbc = new mysqli('localhost', 'Pepi', 'pepi', 'jobs');
    // Check connection
    if (!$dbc) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $res=mysqli_query($dbc, "SELECT `Username`, `Pass` FROM `current`");
    return mysqli_fetch_array($res)['Username'];
}
// Check connection
if (!$dbc) {
    die("Connection failed: " . mysqli_connect_error());
}
$user = getUsername();

$sql = "SELECT `Title`,`Description`,`Company`,`Salary`,`Date`,`Image`,`Location`,`Site`, `Creator` FROM jobs WHERE Creator LIKE '$user'";
$result = mysqli_query($dbc, $sql);
$res = array();
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($res, $row);
    }
} else {
    echo "<br><br><p style='text-align:center;font-size:20px'>No announcements</p>";
}
