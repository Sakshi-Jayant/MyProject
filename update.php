<?php

$conn=mysqli_connect("localhost","root","","employeebulkrecordssep2022") or die ("Coonection Failed");
$dc=$_POST["dept"];

$row="select count(*) as row from `bulkrecordmaster` where DeptCode='$dc'";
$j=mysqli_query($conn,$row);
$result = mysqli_fetch_all($j);
$count= $result[0][0];
// $id=$result[0][0];
// echo "<pre>";
// print_r $count;
// echo "<br>.$id";
// exit;

for($i=1;$i<=$count;$i++){
    $name=$_POST["Name$i"];
    $contact=$_POST["Contact$i"];

if(!empty($dc) && !empty($name) && !empty($contact)){

    $update="UPDATE `bulkrecordmaster` SET `Contact`='$contact' WHERE Name='$name' && DeptCode='$dc'";

    $query=mysqli_query($conn,$update) or die("Query Unsuccessful");
}
    //$array1[]=$array2;
    // echo "<pre>";
    //$id++;
}
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


mysqli_query($conn,$update);
?>