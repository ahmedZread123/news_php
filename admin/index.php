
<?php
include "../layout_admin\main.php";

 ?>
        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Dashboard</h1>
                <br><br>

                <br><br>
                 <?php    $sql = "select * from post GEt" ;
                          $post = mysqli_query($coon , $sql);
                          $sql = "select * from admin GEt" ;
                          $admin = mysqli_query($coon , $sql);
                          $sql = "select * from contact GEt" ;
                          $contact = mysqli_query($coon , $sql);
               ?>
                <div class="col-4 text-center">



                    <h1>      <?php 
                  echo $admin->num_rows;
                  
                  ?></h1>
                    <br />
            
                  Admin
                </div>

                <div class="col-4 text-center">


                    <h1><?php 
                  echo $post->num_rows;
                  
                  ?></h1>
                    <br />
                    Post
                </div>

                <div class="col-4 text-center">



                    <h1><?php 
                  echo $contact->num_rows;
                  
                  ?></h1>
                    <br />
                    contact
                </div>


                <div class="clearfix"></div>

            </div>
        </div>
        <!-- Main Content Setion Ends -->
        <?php
        include "../layout_admin/footer.php";

         ?>
