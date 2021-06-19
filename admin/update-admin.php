<?php
include "../layout_admin\main.php";
$id = $_GET['id'];
$sql = "select * from admin where id='$id' ";
$res = mysqli_query($coon , $sql);
 if($res){
  if($res->num_rows>0){
    $row = $res->fetch_assoc() ;
    $fullname = $row['fullname'];
    $username =$row['username'];

  }else{
    $_SESSION['admin'] = "admin is not found";
    header("location:manage-admin.php");
  }

 }


 ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br><br>


        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $fullname ?>">
                    </td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>

<?php
$id = $_GET['id'];

if(isset($_POST['submit'])){
  $fullname = $_POST['full_name'] ;
  $username =   $_POST['username'];

  $sql = "update  admin  SET
   fullname = '$fullname',
   username = ' $username'
    where id='$id'
  ";
  $res = mysqli_query($coon ,$sql );
  if($res){

  $_SESSION['admin'] = "admin is Update";
  header("location:manage-admin.php");
  }else{
    $_SESSION['admin'] = "admin is not Update";
    header("location:manage-admin.php");
  }
}
include "../layout_admin/footer.php";

 ?>
