<?php
include "../layout_admin\main.php";

 ?>
 <div class="main-content">
    <div class="wrapper">
        <h1>Messages</h1>

      

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>date</th>
                <th>Name</th>
                <th>Meesage </th>
                
                <!-- <th>Actions</th> -->
            </tr>
             <?php
             $sql = "select * from contact GEt" ;
             $res = mysqli_query($coon , $sql);
           if($res->num_rows>0){
               while ($row = $res->fetch_assoc()) {
                $id= $row['id'] ;
                $name= $row['name'];
                $email= $row['email'];
                $message= $row['message'];
                $date=  $row['date'];

               ?>
               <tr>
                   <td> <?php echo $id ;  ?></td>
                   <td> <?php echo $date ; ?></td>

                   <td>
                       <?php echo $name ;?>
                       <!-- " width="50px"> -->


                   </td>

                   <td width="50px" ><?php echo $message ;?>  </td>
                   <!-- <td><?php echo $message ;?></td> -->
                   <!-- <td>
                       <a href="update-post.php?id=<?php echo $id ;  ?>" class="btn-secondary">Update post</a>
                       <a href="delete-post.php?id=<?php echo $id ;  ?>" class="btn-danger">Delete post</a>
                   </td> -->
               <!-- </tr> -->
          <?php

          }
             }
              ?>