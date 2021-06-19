<?php
include "../layout_admin\main.php";

 ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Post</h1>

        <br>
        <!-- Button to Add Admin -->
        <a href="add-post.php" class="btn-primary">Add post</a>


        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Image</th>
                <th>description</th>
                <th>date</th>
                <th>Actions</th>
            </tr>
             <?php
             $sql = "select * from post GEt" ;
             $res = mysqli_query($coon , $sql);
           if($res->num_rows>0){
               while ($row = $res->fetch_assoc()) {
                $id= $row['id'] ;
                $title= $row['name_post'];
                $imag_name= $row['imge'];
                $description= $row['description'];
                $date=  $row['date'];

               ?>
               <tr>
                   <td> <?php echo $id ;  ?></td>
                   <td> <?php echo $title ; ?></td>

                   <td>
                       <img src="<?php echo $imag_name ;?>" width="50px">


                   </td>

                   <td width="50px" ><?php echo $description ;?>  </td>
                   <td><?php echo $date ;?></td>
                   <td>
                       <a href="update-post.php?id=<?php echo $id ;  ?>" class="btn-secondary">Update post</a>
                       <a href="delete-post.php?id=<?php echo $id ;  ?>" class="btn-danger">Delete post</a>
                   </td>
               </tr>
          <?php

          }
             }
              ?>



            <tr>
                <td colspan="6">
                    <div class="Print">
                      <?php if (isset($_SESSION['admin'])) {
                      echo $_SESSION['admin'];
                      unset($_SESSION['admin']);
                    } ?>
                  </div>
                </td>
            </tr>


        </table>
    </div>

</div>
<?php

include "../layout_admin/footer.php";

 ?>
