<?php
$connect = mysqli_connect("localhost", "root", "", "shopee");
if(isset($_POST["insert"]))
{
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $query = "INSERT INTO sell(Image) VALUES ('$file')";
    if(mysqli_query($connect, $query))
    {
        echo '<script>alert("Image Inserted into Database")</script>';
    }
}

?>
<!DOCTYPE html>
    <html lang="en">
<head>
    <title>UNIMART: SELL</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
<br /><br />
<div class="container" style="width:500px;">
    <h1 align="center">Post your Product</h1>
    <br />
    <h2>Enter Your Details</h2>
    <form action="connection1.php" method="post" enctype="multipart/form-data">
        <label>
            <input  type="text" class="input-box" placeholder="Your Name" name="Name">
        </label>
        <?php if(isset($name_error)): ?>
            <span><?php echo $name_error; ?></span>
        <?php endif ?>
        <label>
            <input type="text" class="input-box" placeholder="Your Contact" name="Contact">
        </label>
        <label>
            <input type="Email" class="input-box" placeholder="Your Email ID" name="EmailID">
        </label>
        <label>
            <input class="input-box" placeholder="Address" name="Address">
        </label>

        <label for="Category">Choose a Category</label>
        <select name="Category" id="Category">
            <option value="Select"> Select</option>
            <option value="Trunk"> Trunk</option>
            <option value="Book"> Book</option>
            <option value="Cycle"> Cycle</option>
            <option value="Other"> Other</option>
        </select>

        <label>
            <input class="input-box" placeholder="Price" name="Price">
        </label>

        <label for="Rating"> Choose the Rating</label>
        <select name="Rating" id="Rating">
            <option value="Select"> Select</option>
            <option value="1"> 1</option>
            <option value="2"> 2</option>
            <option value="3"> 3</option>
            <option value="4"> 4</option>
            <option value="5"> 5</option>
        </select>

        <label>
            <input class="input-box" placeholder="Description" name="Description">
        </label>


    </form>

      <form method="post" enctype="multipart/form-data">
          <input type="file" name="image" id="image" />
          <br />
          <input type="submit" name="insert" id="insert" value="insert" class="btn btn-info" />

      </form>
    <br />
    <br />
   <!-- <table class="table table-bordered">
        <tr>
            <th>Image</th>
        </tr>
        <?php
        $query = "SELECT * FROM sell ORDER BY S_id DESC";
        $result = mysqli_query($connect, $query);
        while($row = mysqli_fetch_array($result))
        {
            echo '  
                          <tr>  
                               <td>  
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['Image'] ).'" height="200" width="200" class="img-thumnail"  alt=""/>  
                               </td>  
                          </tr>  
                     ';
        }
        ?>
    </table>-->
</div>
</body>
</html>
<script>
    $(document).ready(function(){
        $(`#insert`).click(function(){
            let image_name = $("#image").val();
            if(image_name === '')
            {
                alert("Please Select Image");
                return false;
            }
            else
            {
                let extension = $('#image').val().split('.').pop().toLowerCase();
                if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) !== -1) {
                } else {
                    alert('Invalid Image File');
                    $(`#image`).val('');
                    return false;
                }
            }
        });
    });
</script>
<?php