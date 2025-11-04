<?php
  include_once 'connection.php';

if (!isset($_SESSION['Member_Firstname']) || !isset($_SESSION['member_gender'])) {
    echo "No member details found.";
    exit;
}

$fname = $_SESSION["Member_Firstname"];
$lname = $_SESSION["user_lname"];
$gender = $_SESSION["member_gender"];
$contact = $_SESSION["Member_Contact"];
$age = isset($_POST['age']) ? $_POST['age'] : 'N/A';
$city = isset($_POST['cityname']) ? $_POST['cityname'] : 'Unknown';
$hobbies = isset($_POST['hobby']) ? implode(", ", $_POST['hobby']) : 'No hobbies listed';
$language = isset($_POST['lang']) ? implode(", ", $_POST['lang']) : 'Unknown';

$aboutText = "Hello, my name is $fname $lname. I am a $age-year-old $gender from $city. 
I enjoy $hobbies and can speak $language. Feel free to reach out to me at $contact.";

echo $aboutText;
?>
