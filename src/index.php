<?php

echo "DevOps course 2020 fall";
echo '<br>';


$remote_addr = $_SERVER['REMOTE_ADDR'];
$remote_port = $_SERVER['REMOTE_PORT'];
$server_addr = $_SERVER['SERVER_ADDR'];
$server_port = $_SERVER['SERVER_PORT'];

echo "<p>Req came from " . $remote_addr . ":" . $remote_port . "<p>";
echo "<p>Req served at " . $server_addr . ":" . $server_port . "<p>";

$mysqli = new mysqli("db", "root", "example");

$db_selected = mysqli_select_db($mysqli, 'company1');

if (!$db_selected) {
    $sql = "CREATE DATABASE company1";
    if ($mysqli->query($sql) === TRUE) {
        echo "Database created successfully";
        $mysqli = new mysqli("db", "root", "example", "company1");
    } else {
        echo "Error creating database: " . $mysqli->error;
    }
}

$sql = 'SELECT * FROM users';
if ($result = mysqli_query($mysqli, $sql)==0) {
    $sql = "CREATE TABLE IF NOT EXISTS users (name varchar(25), last_name varchar(25))";
    $result = $mysqli->query($sql);
    $sql = "INSERT INTO users (name, last_name) VALUES('Erkki', 'Esimerkki')";
    $result = $mysqli->query($sql);
    $sql = "INSERT INTO users (name, last_name) VALUES('Pasi', 'Kuikka')";
    $result = $mysqli->query($sql);
    $sql = "INSERT INTO users (name, last_name) VALUES('Helli', 'Kulmala')";
    $result = $mysqli->query($sql);
    $sql = "INSERT INTO users (name, last_name) VALUES('Anni', 'Finaalissa')";
    $result = $mysqli->query($sql);

    $sql = "";
}


$sql = 'SELECT * FROM users';

if ($result = $mysqli->query($sql)) {
    while ($data = $result->fetch_object()) {
        $users[] = $data;
    }
}

foreach ($users as $user) {
    echo "<br>";
    echo $user->name . " " . $user->last_name;
    echo "<br>";
}
?>
