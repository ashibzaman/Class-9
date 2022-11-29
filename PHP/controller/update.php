<?php
session_start();
include_once("../database/database.php");

if (isset($_POST['submit']))
{
    $id = $_POST['postId'];
    $title = $_POST['title'];
    $details = $_POST['details'];
    $author= $_POST['author'];
    $mail = $_POST['mail'];

    $errors=[];


if (empty($title))
{$errors['title'] = "Please Insert your title";}

if (empty($author))
{$errors['author'] = "Please Insert your Author Name";}

if (empty($details))
{$errors['details'] = "Please Insert your Details";}

if (empty($mail))
{$errors['mail'] = "Please Insert your Email";}


if (count($errors)==0)
{


include '../database/database.php';
$query = "UPDATE post SET
title='$title',
details='$details',
author='$author',
mail='$mail'
WHERE id='$id'";

$update = mysqli_query($conn, $query);
$_SESSION['success'] = "Updated Successfully";

header('location: ../all_post.php');
}

else {
    $_SESSION['errors'] = $errors;

header ("location:../edit_post.php? id=$id");
}
}
