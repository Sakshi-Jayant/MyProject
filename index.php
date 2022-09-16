<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
     <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<style>
    #fonts{
        /* font-family:'Times New Roman', Times, serif; */
        font-size:20px;
    }
    #heading{
        font-size:20px;
    }
</style>

<body style="text-align:center; "><br>
    <table border="2 px" align="center" >
        <tr>
            <td>
                <form method="POST" style="margin:20px;">
                    <label id="fonts"><b>Enter No. of Rows to Add</b></label>&nbsp;
                    <input type="number" value="" name="Rows"><br><br>
                    <input type="submit" value="Add Rows" class="btn btn-warning" name="addrows">
                </form>

            </td>
            <td>
                <form method="POST" style="margin:20px;">
                    <label id="fonts"><b>Enter Department Code</b></label>&nbsp;
                    <input type="number" value="" name="DeptCode"><br><br>
                    <input type="submit" value="Fetch Records" class="btn btn-warning" name="dept">
                </form>
            </td>
            
        </tr>
    </table>
</body>

<br><br>
<?php

$conn=mysqli_connect("localhost","root","","employeebulkrecordssep2022") or die ("CoonectionFailed");
    
if(isset($_POST['addrows'])){
$rows=$_POST['Rows'];

if($rows!=0 && $rows>0){
echo "<html>
    <body>
    <h2><u>Add Records</u></h2><br><br>
    <table>
    <tr>
    <th id='heading'>Name</th>
    <th id='heading'>Contact</th>
    </tr>
    <form method='POST' action='usersubmit.php'>
    <h3>Enter Department Code</h3>&nbsp;&nbsp;
    <input type='text' value='' name='DeptCode'><br><br>";
    $row=$_POST['Rows'];
    echo "<input type='hidden' name='Rows' value="; echo $row;" >";
    for($i=1;$i<=$row;$i++){
            
    echo "
        <tr>
            <td><input type='text' name='Name$i' value=''>
            <td><input type='tel' name='Contact$i' value=''>
        </tr>";
    }
    
    echo "
        <tr> 
        <td align='center'>
        <input type='submit' value='Save' class='btn btn-success'>
        </td>
        </tr>";
    echo "
        </form>
        </table>
        </body>
    </html>";
}
    else{
        echo "<script>alert('Enter valid number of rows.')
      window.location = 'http://localhost/LearnPHP/AssessmentQ9/';
      </script>";
    }

    }
if(isset($_POST['dept'])){

$DeptCode=$_POST['DeptCode'];

$query="SELECT * FROM `bulkrecordmaster` WHERE DeptCode='$DeptCode'";

$result=mysqli_query($conn,$query);


//if($row!=0){

    
//print_r ($row);
if($result!=null){

echo "
<html>
<body>
<h2><u>Edit Records</u></h2><br><br>
<form method='POST' action='update.php'>
<table>
    <tr>
    <h3>Enter Department Code</h3>&nbsp;&nbsp;
        <input type='number' name='dept' readonly value='"; echo $DeptCode; echo "'>
    </tr>
    <tr>
        <th id='heading'>Name</th>
        <th id='heading'>Contact</th>
    </tr>
    <tr>";
   
$i=1;
while($row=mysqli_fetch_assoc($result)){
    // echo "<pre>";
    // print_r($row);
    //for($i=1;$i<=$row;$i++){
    echo "
    <input type='hidden' name='dept' readonly value= ";echo $row["DeptCode"]; echo  ">
        <td><input type='text' readonly name='Name$i' value= ";echo $row["Name"]; echo  "></td>
        <td><input type='number' name='Contact$i' value = "; echo $row['Contact'] ; echo"></td>
    </tr>";
$i++;
}//} 
    echo "<tr><td align='center'><input type='submit' name='update' value='Update' class='btn btn-success'></td></tr>
</table>
</form>
</body>
</html>";
}

else{
    
    echo "<script>alert('Data Not Found')
  window.location = 'http://localhost/LearnPHP/AssessmentQ9/';
  </script>";
}
}

?>


  