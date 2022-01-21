<?php
$firstName = $_POST['first Name'];
$lastName = $_POST['last Name'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$issuefaced = $_POST['issue faced'];
$phonenumber = $_POST['phone number'];
$address = $_POST['address'];

$conn = new mysqli('localhost', 'root','','appointment');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into registration(first Name, last Name, gender, email,issue faced,phone number,address) values(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssis", $firstName, $lastName, $gender, $email, $issuefaced, $phonenumber, $address);
    $execval = $stmt->execute();
    echo $execval;
    echo "Registration successfully...";
    $stmt->close();
    $conn->close();
}
