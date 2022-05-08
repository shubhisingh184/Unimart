
<?php

session_start();
header('location:index2.php');


$server = "localhost";
$username = "root";
$password = "";
$dbname = "shopee";

//create a connection

$conn = mysqli_connect($server, $username, $password, $dbname);


if (isset($_POST['submit'])) {
    //echo "connection sucessfully";
    if (!empty($_POST['Name']) && !empty($_POST['Contact']) && !empty($_POST['EmailID'])&& !empty($_POST['Address']) && !empty($_POST['Category'])&& !empty($_POST['Price'])&& !empty($_POST['Rating'])&& !empty($_POST['Description'])) {
        $Name = $_POST['Name'];
        $Contact = $_POST['Contact'];
        $EmailID = $_POST['EmailID'];
        $Address= $_POST['Address'];
        $Category= $_POST['Category'];
        $Price = $_POST['Price'];
        $Rating = $_POST['Rating'];
        $Description= $_POST['Description'];
        $sql_u = "select * from sell where Name = '$Name' ";
        $sql_e = "select * from sell where EmailID = '$EmailID' ";
        $res_u = mysqli_query($conn, $sql_u) or die(mysqli_error($conn));
        $res_e = mysqli_query($conn, $sql_e) or die(mysqli_error($conn));
        $num_u = mysqli_num_rows($res_u);
        $num_e = mysqli_num_rows($res_u);
        if ($num_u > 0) {
            $name_error = "Sorry....Name existed";
            echo " Already existing data";
        } else if ($num_e > 0) {
            $name_error = "Sorry....Email existed";
            echo " Already existing data";

        } else {

            $query = "insert into sell(Name,Contact,EmailID,Address,Category,Price,Rating,Description) values('$Name','$Contact','$EmailID','$Address','$Category','$Price','$Rating','$Description')";
            $run = mysqli_query($conn, $query) or die(mysqli_error($conn));
            echo "registration successfully";


        }
    } else {
        echo "all fields required";
    }
}

?> && !empty($_POST['EmailID']) && !empty($_POST['Password'])){
    $Name=$_POST['Name'];
    $BanasthaliID=$_POST['BanasthaliID'];
    $EmailID=$_POST['EmailID'];
    $Password=$_POST['Password'];
    $sql_u = "select * from registration where Name = '$Name' ";
    $sql_e = "select * from registration where EmailID = '$EmailID' ";
    $res_u =  mysqli_query($conn,$sql_u) or die(mysqli_error($conn));
    $res_e = mysqli_query($conn,$sql_e) or die(mysqli_error($conn));
    $num_u = mysqli_num_rows($res_u);
    $num_e = mysqli_num_rows($res_u);
    if($num_u > 0)
    {
    $name_error = "Sorry....Name existed";
    echo" Already existing data";
    }
    else if($num_e > 0)
    {
    $name_error = "Sorry....Email existed";
    echo" Already existing data";

    }
    else
    {

    $query = "insert into registration(Name,BanasthaliID,EmailID,Password) values('$Name','$BanasthaliID','$EmailID', '$Password')";
    $run = mysqli_query($conn,$query) or die(mysqli_error($conn));

    echo"registration successfully";


    }
    }
    else
    {
    echo"all fields required";
    }
    }

<?php

