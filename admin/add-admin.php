<?php
include "../layout_admin\main.php";

 ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>


        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>
<?php
if(isset($_POST['submit'])){
  $fullname = $_POST['full_name'] ;
  $username =   $_POST['username'];
  $password = $_POST['password'];
  $sql = "INSERT Into admin SET
   fullname = '$fullname',
   	username = ' $username',
    password = '$password'


  ";
  $res = mysqli_query($coon ,$sql );
  if($res){

  $_SESSION['admin'] = "admin is added";
  header("location:manage-admin.php");
  }else{
    $_SESSION['admin'] = "admin is not added";
    header("location:manage-admin.php");
  }
}
include "../layout_admin/footer.php";

 ?>
