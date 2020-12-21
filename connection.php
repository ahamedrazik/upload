<?php
        global $img_des,$uname,$tmp;
       $con=mysqli_connect("localhost","root","","pencil");

       if(mysqli_connect_errno()){

        echo "cannot connected";
       }
       else
       {
          if(isset($_POST['submit']))
          {
          $imgim= $_FILES['profile'];
          $tmp=$_FILES['profile']['tmp_name'];
          $imagename=$_FILES['profile']['name'];
          $uname=$_POST['uname'];
          $img_ext=pathinfo($imagename,PATHINFO_EXTENSION);
        
          $img_des="imges/".$imagename.".".$img_ext;
         
          $img_size=$_FILES['profile']['size']/(1024*1024);
          

          if(($img_ext!='png') &&  ($img_ext!='jpg') && ($img_ext!='jpeg') && ($img_ext!='webp'))
          {
            echo "<script>alert('invalid images!!');</script>";
            exit();
        }
         
         if($img_size>3)
         {
            echo "<script>alert(' images size is greater than img!!');</script>";
            exit();
         }

          }
    
          $query="INSERT INTO `pen`(`username`, `profile`) VALUES ('$uname','$img_des')";

         if(mysqli_query($con,$query))
         {
            move_uploaded_file($tmp,$img_des); 
            echo "<h1>images uploaded to db</h1>";
         }
         else{
            echo "<script>alert('unsuccess');</script>";

         }
        
          }

?>

