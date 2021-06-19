<?php
include "../layout_admin\main.php";
$id = $_GET['id'];
$sql = "select * from post where id='$id'";
$res = mysqli_query($coon , $sql);
if ($res->num_rows > 0) {
  $row = $res->fetch_assoc() ;
  $id= $row['id'] ;
  $title= $row['name_post'];
  $old_imag_name= $row['imge'];
  $date= $row['date'];
  $description=  $row['description'];

}
 ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update post</h1>

        <br><br>


        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image:</td>
                    <td>
                         <?php echo $old_imag_name; ?>
                    </td>
                </tr>

                <tr>
                    <td>New Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="" > <?php echo $description;?> </textarea>
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="">
                        <input type="hidden" name="id" value="">
                        <input type="submit" name="submit" value="Update post" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>

<?php
if(isset($_POST['submit'])){
  $title = $_POST['title'];
  $description = $_POST['description'] ;
 // $date =$_POST['date'];
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
    $img_name = $old_imag_name;
  }

  $sql = "update  post SET
  name_post	 = '$title',
  imge = '$img_name',
  description = '$description',
  date ='$date'
  where id='$id'
  ";
  $res = mysqli_query($coon , $sql);
  if($res){
  $_SESSION['admin'] = "post is update";
  header("location:manage-post.php");
  }else{
    $_SESSION['admin'] = "post is not update";
    header("location:manage-post.php");
  }
}
include "../layout_admin/footer.php";

 ?>
