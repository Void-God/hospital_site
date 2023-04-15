<?php 
  session_start();
  if($_SESSION['priv']){
    require "../config.inc.php";
      
      $fileName = $_FILES['file']['name'];
      $fileSize = $_FILES['file']['size'];
      $fileExplode = explode('.', $fileName);
      $fileExt = strtolower(end($fileExplode));
      
      $allowed = array('jpg','jpeg','png'); //allowed extensions 
      
      
      if(in_array($fileExt, $allowed)) {  //if extension is allowed
        if($fileSize < 1048576){       // image max size is 1mb
          if($_FILES['file']['error'] === 0){    //check if file have any error
            if($_SESSION['priv'] == 'patient'){
              $query = "SELECT img_loc FROM patients WHERE user_email = '".$_SESSION['userID']."'";
              $filedes = "../../profile-images/pat-images/"; 
              $var = "user_email";             
            }
            else if($_SESSION['priv'] == 'doctor'){     //if user is doctor
              $query = "SELECT img_loc FROM doctors WHERE doctor_email = '".$_SESSION['userID']."'";
              $filedes = "../../profile-images/doc-images/"; 
              $var = "doctor_email";
            }
            echo $query;
            $query_run = mysqli_query($con,$query);
            $image_loc = mysqli_fetch_assoc($query_run);
            if(is_null($image_loc['img_loc'])){  //check if variable is null mean photo is not uploaded
              $fileName = uniqid('',true).".".$fileExt;
              $update_data = "UPDATE ".$_SESSION['priv']."s SET img_loc = '".$fileName."' WHERE ".$var." = '".$_SESSION['userID']."'";
              $filedes .= $fileName;
            }
            else {         //photo is already uploaded
              $fileName = $image_loc['img_loc'];
              $filedes .= $image_loc['img_loc'];
            }              
              if(move_uploaded_file($_FILES['file']['tmp_name'] , $filedes)) {       //upload the photo
                if(isset($update_data)){     //if image location do not exist in database
                  if(mysqli_query($con,$update_data)){       //update image location in database
                    $_SESSION['response'] = "Image uploaded Successfully";
                    // echo '<script>alert("Image uploaded Successfully")</script>';
                    //echo "<p style='color:red;font-size:16px'>Image uploaded Successfully<p/>";                    
                  }
                  else {           //if database did not get update give error
                    unlink($filedes);    //delete uploaded file
                    $_SESSION['response'] = "Error! Please try again.";
                    // echo '<script>alert("Error! Please try again.")</script>';
                    //echo "<p style='color:red;font-size:16px'>Error! Please try again.<p/>";                     
                  }
                } 
                else {       //location already exist in database
                  $_SESSION['response'] = "Image uploaded Successfully";
                  // echo '<script>alert("Image uploaded Successfully")</script>';
                  //echo "<p style='color:red;font-size:16px'>Image uploaded Successfully<p/>";                   
                }
              }
              else {           //if failed to ulload the poto
                $_SESSION['response'] = "Error! Please try again.";
                // echo '<script>alert("Error! Please try again.")</script>';
                //echo "<p style='color:red;font-size:16px'>Error! Please try again.<p/>"; 
              }
          
          }
          else {         //if there exist any error
            $_SESSION['response'] = "Error! Please try again.";
            // echo '<script>alert("Error! Please try again.")</script>';
            //echo "<p style='color:red;font-size:16px'>Error! Please try again.<p/>";            
          }
        } 
        else {  //if size of file is more than 1 mb
          $_SESSION['response'] = "Size of image size can not exceed 1 mb";
          // echo '<script>alert("Size of image size can not exceed 1 mb")</script>';
          //echo "<p style='color:red;font-size:16px'>Image's size can't exceed 1 mb<p/>";          
        }            
      }
      else {            // if extension is not allowed
        // echo '<script>alert("Only jpg,jpeg and png files are allowed!")</script>';
        $_SESSION['response'] = "Only jpg,jpeg and png files are allowed!";
        // $('#picError').html("<p style='color:red;font-size:16px'><p/>");
        //echo "<p style='color:red;font-size:16px'>Only jpg,jpeg and png files are allowed!<p/>";
      }
  }
  header("Location:../../dashboard/?show=profile");

?>