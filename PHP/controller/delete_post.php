<?php
session_start();

include_once('../database/database.php');

$id = $_GET['id'];

$query = "DELETE FROM post WHERE id = $id";
$delete = mysqli_query($conn, $query);

if($delete){
    $_SESSION['success'] = "Deleted Successfully";
    header("location: ../all_post.php");
}
else{echo "No no no no";}