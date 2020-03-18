<?php include('header.php'); 

if(isset($_POST['submit'])){
 
 
      


      if(isset($_POST['edit'])){
           
             $where_condition = array(  
                     'id' => $_POST["edit"]
                 );  
               
                  // All key names are collumn name of db table collumns.
                    $update_data = array(  
                       
                 
                       'locationId'  =>    mysqli_real_escape_string($data_obj->con, $_POST['locationId']),
                       'Name'  =>     mysqli_real_escape_string($data_obj->con, $_POST['Name']),
                       'User_name'  =>   mysqli_real_escape_string($data_obj->con, $_POST['User_name']),
                       'Password'  =>   mysqli_real_escape_string($data_obj->con, $_POST['Password'])
                       
                       
                       
                      );
               
       
              if($data_obj->update("land_details", $update_data, $where_condition))  
              {  
               
                   header("location:chatbot.php?updated=1");  
              }



        }else{

              $insert_data = array(
                       'Sl_no'  =>  mysqli_real_escape_string($data_obj->con, $_POST['SLNo']),
                      'Category'  =>     mysqli_real_escape_string($data_obj->con, $_POST['Category']),
                       'Area' =>  mysqli_real_escape_string($data_obj->con,$_POST['Area'])
                         
                   
                  );


           if($data_obj->insert(" land_details",$insert_data))
          {
            $success_message='inserted';
          }

        }

   
} // isset post end

 if(isset($_GET['edit'])){  // display input box values
       
        $where=array(
        'id' => $_GET["edit"]
        );
        $post=$data_obj->select_where("land_details",$where);
                     
       $locationId =$post->locationId;
       $Name=  $post->Name;
       $User_name = $post->User_name;
       $Password=  $post->Password;

       
   }  

    if(isset($_GET["delete"]))  
        {  
          $where = array(  
               'id' =>  $_GET["delete"]  
          );  
          if($data_obj->del("land_details", $where))  
          {  
               //header("location:add_event.php?deleted=1");  
          }  
    }
?>

<?php include('ownerslidebar.php'); ?>

 <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Location List</h3>
        <div class="row">
          <div class="col-md-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i>Location List</h4>
              <hr>
              <table class="table">
                <thead>
                  <tr>
                    <th>Locationid</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Password</th>
                    <!-- <th>Ploat No</th>
                    <th>Total Area</th>
 -->


                    <th></th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
 $loc_data =$data_obj->select("land_details");
       foreach ($loc_data as  $fields) {
        
                  ?>
                  <tr>
                    <td><?php echo $fields['locationId']; ?></td>
                    <td><?php echo $fields['Name']; ?></td>
                    <td><?php echo $fields['User_name']; ?></td>
                    <td><?php echo $fields['Password']; ?></td>
                    <!-- <td><?php echo $fields['plot_no']; ?></td>
                    <td><?php echo $fields['Total_area']; ?></td> -->

<td>
<a href="land_edit.php?edit=<?php echo $fields['id']; ?>"type="button" class="btn btn-success">Edit</a>
</td>

<form method="get">
<!-- <td><button class="btn btn-success">Edit</button></td>
 -->                    <td><button class="btn btn-danger" type="submit" name="delete" value="<?php echo $fields['id']; ?>">Delete</button></td></form>

                    <td></td>
                  </tr>
                 <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /col-md-12 -->
          
        </div>
       
      </section>
    </section>
  

<?php include('footer.php'); ?>

