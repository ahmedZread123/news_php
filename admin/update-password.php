<?php
include "../layout_admin\main.php";

 ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>


        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Current Password:</td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password">
                    </td>
                </tr>

                <tr>
                    <td>New Password:</td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password:</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

    </div>
</div>

<?php
$id = $_GET['id'];
$sql = "select * from admin where id ='$id'" ;
$res = mysqli_query($coon , $sql);
if($res){
  if($res->num_rows>0){
    $row = $res->fetch_assoc() ;
    $password = $row['password'] ;
  }else {
    $_SESSION['admin'] = "admin is not found";
    header("location:manage-admin.php");
  }
}

if (isset($_POST['submit'])) {
   $current_password = $_POST['current_password'] ;
   $new_password = $_POST['new_password'] ;
   $confirm_password =$_POST['confirm_password'] ;
    if(  $password ==  $current_password){
      if($new_password == $confirm_password){

          $sql = "update  admin  SET
           password = '$confirm_password'

            where id='$id'
          ";
          $res = mysqli_query($coon ,$sql );
          if($res){

          $_SESSION['admin'] = "admin is Update password";
          header("location:manage-admin.php");
          }

      }

    }else{
      $_SESSION['admin'] = "admin is not Update password";
      header("location:manage-admin.php");
    }

}
include "../layout_admin/footer.php";

 ?>
