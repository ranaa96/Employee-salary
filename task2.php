<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    table{
        border: 1px solid black;
    }
    </style>
</head>
<body>
<form method='POST'>
    
    <label>Employee name</label>
    <input type="text" name="txtname"  value="<?php echo isset($_POST['txtname'])?$_POST['txtname']:'' ?>" ><br>
    <input type="radio" name="time" value="full"> full time
    <input type="radio" name="time" value="part"> part time<br>
    <input type="submit" name="btnnext" value="Next.."><br>


    
<?php 
session_start();
if(isset($_POST['btnnext'])){

$time;
$time=$_POST['time'];
if($time=="full"){
echo("<label>Basic Salary</label>
<input type='number' name='salary'><br>
<label>Absent days continues</label>
<input type='number' name='dContinues'><br>
<label>Absent days discret</label>
<input type='number' name='dDiscret'> <br>
<input type='submit' name='btnfdays' value='Select days'>");
}
else{
echo ("<label>Count of days</label><input type='number' name='days'>
 <label>Salary per day </label><input type='number' name='dSalary'><br><input type='submit' name='btnpdays' value='Select days'>");

}

}

if(isset($_POST['btnpdays'])){
    $count;
    $count=$_POST['days'];
    $hours;
    $_SESSION['salary']=$_POST['dSalary'];
    $_SESSION['days']= $_POST['days'];
    for($x=1;$x<=$count;$x++){
    
        echo("<label>$x Day name</label><input type='text' name='dayname'> ");
        echo("<label>Hours of work</label><input type='number' name='hours$x'> <br> ");
        
    }
    echo("<input type='submit' name='btnpartSalary' value='calculate salary'>");

    
}
if(isset($_POST['btnpartSalary'])){
    $thours=0;
    $salary;
    $count;
    $count=$_SESSION['days'];
    for($x=1;$x<=$count;$x++){

        $hours=$_POST['hours'.$x];
        $thours=+$hours;
    }

    $dsalary;
    $dsalary=$_SESSION['salary'];
    $salary=$thours*$dsalary;
    echo($salary);

}
if(isset($_POST['btnfdays'])){
  $dayd;
  $dayc;
 
  $dayc=$_POST['dContinues'];
  $dayd=$_POST['dDiscret'];
 
  echo("<h2>Continues Days</h2>");
  for($x=1;$x<=$dayc;$x++){
    echo("<label>$x Day name</label><input type='text' name='cdayname' >");

  }
  echo("<h2>Discret Days</h2>");
  for($x=1;$x<=$dayd;$x++){
    echo("<label>$x Day name</label><input type='text' name='ddayname' >");

  }

  echo("<input type='submit' name='btnfullSalary' value='calculate salary'>");
  
  
  
}
if(isset($_POST['btnfullSalary'])){
    $bsalary;
    $dayd;
    $dayc;
    $dayc=$_POST['dContinues'];
    $dayd=$_POST['dDiscret'];
    $bsalary=$_POST['salary'];
    $alldays=$dayd;

  if($dayc==1){
      $dayc=1;
    }
  elseif($dayc==2){
      $dayc=2.25;
    }
  elseif($dayc==3){
      $dayc=3.75;
    }
  else{
      $dayc=($dayc-3)*2+3.75;
    }
    $allday+=$dayc;
    $dailysalary=$bsalary/30;
    $finalsalary;
    $finalsalary= $bsalary- ($allday*$dailysalary);
    echo("Final Salary is".$finalsalary);

  }

?>

</form>
</body>
</html>