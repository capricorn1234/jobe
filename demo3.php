<?php
header('Content-Type=text/html,charest=utf-8'); 
$link=mysqli_connect("localhost","root","");
      $ti=mysqli_select_db($link,"boke");
    $username=trim($_POST['KeyWord']);
    $password=trim($_POST['password']);
    $rs=mysqli_query($link,"SELECT * FROM user WHERE ID="."'"."$username"."'");
    $num=mysqli_fetch_array($rs);
    print_r($num);
    if($username!=$num[0]){
    	echo "<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."该用户不存在！"."\"".")".";"."</script>";
    	echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."http://127.0.0.1/login.php"."\""."</script>";
    	exit;


    }else{
         if($password==$num[1]){
         	//session_start();
         	//$_SESSION['name']="$username";
         	setcookie('name',$username,time()+5000000000);
    	     echo "<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."登入成功！"."\"".")".";"."</script>";
    	     mysqli_close($link) or exit('no');
    	     echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."http://127.0.0.1/Homepage.php"."\""."</script>";
    	      exit;
           }else{
    	       echo "<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."登入失败！"."\"".")".";"."</script>";
    	       
    	       echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."http://127.0.0.1/login.php"."\""."</script>";
    	       exit;

               }
         }
    exit;
?>