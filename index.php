
    <form action="index.php" method="POST" enctype="multipart/form-data">
<input type="file" name="image"/> 
<input type="submit" value="Post">
    </form>



<?php 


   if(isset($_FILES['image']['tmp_name'] )){
      $ch = curl_init();
      $cfile = new  CURLFile($_FILES['image']['tmp_name'],$_FILES['image']['type'],$_FILES['image']['name']);
    //   var_dump($cfile);die;
      $data= array("myimage"=>$cfile);
    //   var_dump($data);die;


      curl_setopt($ch,CURLOPT_URL, "http://localhost/sad/server.php");
     
      curl_setopt($ch,CURLOPT_POST,true);
      curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
      $response = curl_exec($ch);
    //    var_dump($response);die;
      if($response == true){
          echo "file posted";
      }else{
          echo "error:".curl_error($ch);
      }
   }

 ?>