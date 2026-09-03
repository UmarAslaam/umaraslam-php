<?php
if (isset($_POST["submit"])) {
    $studentName = $_POST["studentName"];
    $fatherName = $_POST["fatherName"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $class = $_POST["class"];
    $section = $_POST["section"];
    $rollNumber = $_POST["rollNumber"];
    $admissionNumber = $_POST["admissionNumber"];
    $school = $_POST["school"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $emergencyName = $_POST["emergencyName"];
    $emergencyPhone = $_POST["emergencyPhone"];
    $medical = $_POST["medical"];


    echo"<h2>$studentName</h2>";
    echo"<h2>$fatherName</h2>"; 
    echo"<h2>$dob</h2>";
    echo"<h2>$gender</h2>";
    echo"<h2>$class</h2>";
    echo"<h2>$section</h2>";
    echo"<h2>$rollNumber</h2>";
    echo"<h2>$admissionNumber</h2>";
    echo"<h2>$school</h2>";
    echo"<h2>$phone</h2>";
    echo"<h2>$email</h2>";
    echo"<h2>$address</h2>";
    echo"<h2>$city</h2>";
    echo"<h2>$emergencyName</h2>";
    echo"<h2>$emergencyPhone</h2>";
    echo"<h2>$medical</h2>";

}
