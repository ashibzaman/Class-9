<?php

session_start();

include "../database/database.php";

if (isset($_POST["submit"]))
{	
	$error =[];
	
	$_request = $_POST;
	$title = $_request["title"];
	$details = $_request["details"];
	$author = $_request["author"];
	$mail= $_request["mail"];

	if (empty ($title))
		{
		$msg = "Plz insert Title?";
		$error ["title"] = $msg;
		}
	
	elseif(strlen($title)>100)
		{
		$msg = "Plz use less than 100 charecter";
		$error ["title"] = $msg;
		}
	
	if (empty ($details))
		{
		$msg ="Plz insert details";
		$error["details"] = $msg;
		}
	
	elseif(strlen($details)>200)
		{
		$msg = "Details must be less than 200 charecter";
		$error ["details"] = $msg;
		}
	
	if (empty ($author))
		{
		$msg ="Plz insert Author Name";
		$error["author"]= $msg;
		}

	elseif(strlen($author)>25)
		{
		$msg = "Plz use less then 25 character";
		$error ["author"] = $msg;
		}

			if (empty($author))
			{$author= "akasher tara";
		
			}

	
	if (empty ($mail))
		{
		$msg ="Plz insert Email Address";
		$error["mail"]= $msg;
		}

	elseif(strlen($mail)>25)
		{
		$msg = "Plz use less then 25 character";
		$error ["mail"] = $msg;
		}



	if (count($error)>0)
		{
		$_SESSION["error"] = $error;
		$_SESSION["oldData"]= $_request;

		header("Location: ../index.php");
		}

	else {
			$query = "INSERT INTO post (title, details, author, mail) VALUES ('$title', '$details', '$author', '$mail')";

$store = mysqli_query($conn, $query);

if($store)
	header ("Location:../index.php");
$_SESSION["success"] = "Your post added successfully";

}

}
	else {echo "Please try with submit button";}