<?php
session_start();


//create a connection

$conn = mysqli_connect('localhost','root');
if($conn)
{
    echo"Connection successfully";

}
else
{
    echo"not successful";
}
mysqli_select_db($conn,'shopee');


$EmailID=$_POST['EmailID'];
$Password=$_POST['Password'];
$q="select * from user where  EmailID = '$EmailID' && Password = '$Password' ";
$result= mysqli_query($conn,$q);
$num=mysqli_num_rows($result);
if($num==1)
{
    $_SESSION['EmailID'] = $EmailID;
    header('location:http://localhost/Tutorial/WebDevelopment/Unimart');
}
else
{    $_SESSION['status'] ="WRONG DETAILS";

    header('location:http://localhost/html/main.php');
    //echo"wrong info";


}


?>