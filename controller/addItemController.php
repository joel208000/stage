<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
       
        $ProductName = $_POST['p_name'];
        $desc= $_POST['p_desc'];
        $price = $_POST['p_price'];
       
            
        $name = $_FILES['file']['name'];
        $name1 = $_FILES['file1']['name'];
        $name2 = $_FILES['file2']['name'];
        $name3 = $_FILES['file3']['name'];
        $temp = $_FILES['file']['tmp_name'];
        $temp1 = $_FILES['file1']['tmp_name'];
        $temp2 = $_FILES['file2']['tmp_name'];
        $temp3 = $_FILES['file3']['tmp_name'];
    
        $location="./uploads/";
        $image=$location.$name;
        $image1=$location.$name1;
        $image2=$location.$name2;
        $image3=$location.$name3;

        $target_dir="../uploads/";
        $finalImage=$target_dir.$name;
        $finalImage1=$target_dir.$name1;



        move_uploaded_file($temp,$finalImage);
        move_uploaded_file($temp1,$finalImage1);

         $insert = mysqli_query($conn,"INSERT INTO product
         (product_name,product_image,image1,price,product_desc) 
         VALUES ('$ProductName','$image','$image1',$price,'$desc')");
 
         if(!$insert)
         {
             echo mysqli_error($conn);
         }
         else
         {
             echo "Records added successfully.";
         }
     
    }
        
?>