<?php
session_start();
if(isset($_GET['id']))
{
    $_SESSION['courseid']=$_GET['id'];
    header("location:index.php");
}
else
{
	header("location:selectcourse.php");
}