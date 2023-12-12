<?php
@include 'config.php';
session_start();
//initializing variables
$errors=array();
$FullName="";
$RegisterNo="";
$Department="";
$TotalSubject="";
$Age="";

//connect to the database
$db =mysqli_connect('localhost','root','','College Website');

//Storing the student details
if (isset($_POST['student details']))
{
    //receive all the input values from the entry
    $FullName = mysqli_real_escape_string($db,$_POST['Full Name']);
    $RegisterNo = mysqli_real_escape_string($db,$_POST['Register No']);
    $Department = mysqli_real_escape_string($db,$_POST['Department']);
    $TotalSubject=mysqli_real_escape_string($db,$_POST['Total Subject']);
    $Age=mysqli_real_escape_string($db,$_POST['Age']);

    //validation that all the entities are entered 
    if(empty($FullName)) {array_push($errors,"Full Name is required");}
    if(empty($RegisterNo)) {array_push($errors,"Register No is required");}
    if(empty($Department)) {array_push($errors,"Department is required");}
    if(empty($TotalSubject)) {array_push($errors,"Total Subject is required");}
    if(empty($Age)) {array_push($errors,"Age is required");}
    
    //
    if($RegisterNo) {
        if($RegisterNo["Roll No"] === $RegisterNo){
            array_push($errors,"Full Name already exists");
        }
    }
}

