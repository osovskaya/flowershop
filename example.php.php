<?php

include 'connect.php';

echo "hello".'<br>';

//$query = "INSERT INTO registration_data (name_customer, password) VALUES ('valentin', '0503'), ('ira', '2311')";
//$info = mysqli_query($con, $query);
//var_dump($info);

//$query = "DELETE FROM registration_data ORDER BY id_customer DESC LIMIT 2";
//$info = mysqli_query($con, $query);
//var_dump($info);

$query = "SELECT name_customer FROM registration_data GROUP BY name_customer";
$info = mysqli_query($con, $query);

$select = mysqli_fetch_array($info);
print_r($select);

?>