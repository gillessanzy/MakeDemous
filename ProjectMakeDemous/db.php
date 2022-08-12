   
<?php

$db = new PDO('mysql:host=localhost;dbname=make_demous', 'root', 'root');


// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


session_start();
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'root';
$DATABASE_NAME = 'make_demous';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}



if ($db->getAttribute(PDO::ATTR_DRIVER_NAME) == 'mysql') {
    $stmt = $db->prepare("set names 'utf8'",
        array(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true));
        $stmt->execute();
} else {
    die("my application only works with mysql; I should use \$stmt->fetchAll() instead");
}


?>