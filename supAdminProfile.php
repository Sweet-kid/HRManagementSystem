<?php
include("config.php");
include_once("connection.php");
session_start();

if( !isset($_SESSION["login"]) || $_SESSION["login"] != "true" )
  {
    header("Location: login.php");
  }
else if(!isset( $_SESSION["id"] ) || !isset($_SESSION["access"]) || $_SESSION["access"] != 1 )
  {
    header("Location: login.php");
  }
else if( !isset($_SESSION["sup"]) && $_SESSION["sup"] != 1 )
  {
    header("Location: adminprofile.php");
  }

?>

<html>
<head>

/* <script type="text/javascript" src="../../login.js"> */
/* </script> */

<link rel="stylesheet" type="text/css" href="../../hrms_style_sheet.css" />

<?php
  include_once "header.php";
?>
<title>
<?php
  include("config.php");
/*   $con = mysql_connect( $db_server, $db_username, $db_password ); */
/* if( !$con ) */
/*   { */
/*       die ("<script type=\"text/javascript\"> try { throw \"err\" } catch(err) { alert(\"Error in connecting to database :".mysql_error()."\");}</script>");    */
/*   } */

/* $res = mysql_select_db( $db_name, $con ); */
/* if( !$res ) */
/*   { */
/*     die ("<script type=\"text/javascript\"> try { throw \"err\" } catch(err) { alert(\"Error in mysql_select_db : ".mysql_error()."\");}</script>"); */
/*   } */

$query = $retrieveCompName;
$res = mysql_query( $query, $con );
if( $res )
  {
    $row = mysql_fetch_array( $res );
    if( $row["CompanyName"] != "" )
      {
	echo "Administrator@".$row["CompanyName"];
      }
    else
      {
	echo "Administrator@HRMS";
      }
  }
?>
</title>

/* <style> */

/* h1 */
/* { */
/* font-size:200%; */
/* color:RED; */
/* text-align:center; */
/* } */

/* h2 */
/* { */
/* font-size:175%; */
/* color:red; */
/* text-align:center; */
/* } */

/* body */
/* { */
/* background-color:black; */
/* } */

/* th */
/* { */
/* color:white; */
/* font-size:150%; */
/* } */

/* td */
/* { */
/* color:white; */
/* font-size:100%; */
/* } */

/* </style> */
</head>

<body>
<img src="hrms.php" height="15%" width="15%" style="float:left;" />

<h1>
HRMS Administrator Login
</h1>

<h2>
Welcome Admin!
</h2>

<table align="center">
<tr>

<nav style="float:right;" >
<td>
<a href="showMessages.php" style="color:white;">
Inbox
<?php

$query = $retrieveUnReadMsgCount;
$res = mysql_query( $query, $con );
if( $res )
  {
    $row = mysql_fetch_array( $res );
    echo "(".$row[0].")";
  }
?>
</a>
</td>

<td>
<a href="mailto:?Subject:" style="color:white;" >
   |  Send Mail  |
</a>
</td>

<td>
<a href="addPrerequisites.php" style="color:white;">
Add Pre-requisites  |
</a>
</td>

<td>
<a href="viewEmployees.php" style="color:white;">
View Employees Profiles|
</a>
</td>

<td>
<a href="addEmployee.php" style="color:white;">
 Add Employee |
</a>
</td>

<td>
<a href="deleteEmployee.php" style="color:white;">
 Delete Employee |
</a>
</td>

<td>
<a href="searchEmployee.php" style="color:white;">
 Search Employee |
</a>
</td>

<td>
<a href="ChangePassword.php" style="color:white;">
 Change Password |
</a>
</td>

<td>
<a href="logout.php" style="color:white;">
 Logout
</a>
</td>

</nav>
</tr>
</table>
<hr/>

<p style="text-align:center">
<img src="image.php" style="width:95%;height:65%;"/>
</p>

</body>
</html>