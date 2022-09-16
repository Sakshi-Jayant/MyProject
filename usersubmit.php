<?php

$conn=mysqli_connect("localhost","root","","employeebulkrecordssep2022") or die ("Coonection Failed");

$row=$_POST['Rows'];
//echo "<pre>";
//print_r($_POST);
// $deptcode=$_POST['DeptCode'];
// $name=$_POST['Name'];
// $contact=$_POST['Contact'];

//echo $row;


for($i=1;$i<=$row;$i++){
   
    $dc=$_POST["DeptCode"];
    $name=$_POST["Name$i"];
    $contact=$_POST["Contact$i"];

if(!empty($dc) && !empty($name) && !empty($contact)){
    $sql="INSERT INTO `bulkrecordmaster`( `DeptCode`, `Name`, `Contact`) VALUES ('$dc','$name','$contact')";
    $query=mysqli_query($conn,$sql) or die("Query Unsuccessful");
}
    //$array1[]=$array2;
    // echo "<pre>";
}
  // print_r($array2);
  if($query)
  {
      echo "<script>alert('success')
      window.location = 'http://localhost/LearnPHP/AssessmentQ9/';
      </script>";
  }else{
      echo "<script>alert('failed')
      window.location = 'http://localhost/LearnPHP/AssessmentQ9/';
      </script>";
  }

