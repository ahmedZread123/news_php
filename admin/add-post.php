<?php
include "../layout_admin\main.php";

 ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Post</h1>

        <br><br>



        <br><br>

        <!-- Add CAtegory Form Starts -->
        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Post Title">
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Description of the Post."></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
        <!-- Add CAtegory Form Ends -->


    </div>
</div>

<?php
if(isset($_POST['submit'])){
  $title = $_POST['title'];
  $description = $_POST['description'] ;
  $date =date('M d,Y');

  if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=""){
     $img_name = $_FILES['image']['name'];
     $temp = $_FILES['image']['tmp_name'];


  $ex = explode(".",$img_name) ;
  $en = end($ex);
  $det = "../images/".time()."_".$title.".".$en ;
  $uploded = move_uploaded_file($temp , $det);
  $img_name = $det;
  }
  else{
    $img_name = "../images/country.png";
  }

  $sql = "insert into post SET
  name_post = '$title',
  imge = '$img_name',
  description = '$description',
  date = '$date'
  ";
  $res = mysqli_query($coon , $sql);
  if($res){
  $_SESSION['admin'] = "post is added";
  header("location:manage-post.php");
  }else{
    $_SESSION['admin'] = "post is not added";
    header("location:manage-post.php");
  }
}

include "../layout_admin/footer.php";

 ?>
