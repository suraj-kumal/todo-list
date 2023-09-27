<?php
     include"header.php";
     //database connection
    $conn=new mysqli('localhost','root','','todolist');
    if($conn->connect_error)
    {
        echo("connection failed");
    } 
    else{
        echo("connection successfull");
    }

    //post method
    if(isset($_POST['btnsave'])){
        
        $taskname = $_POST['txtTaskName'];
        $startdate =$_POST['txtStartDate'];
        $enddate =$_POST['txtEndDate'];
        $user=$_POST['txtUser'];
 
    $sql = "INSERT INTO task(task_name,start_date,end_date,user_id) VALUES('$taskname','$startdate','$enddate',$user)";
    
    $ret = $conn->query($sql);
    if($ret)
    {
        echo("inserted successfully");
    }
    else{
        echo("insert failed");
    }

    }
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<form action="create.php" method="post">

    TASK NAME:<input type="text" name="txtTaskName" class="form-control">

    START DATE:<input type="text" name="txtStartDate" class="form-control">

    END DATE:<input type="text" name="txtEndDate" class="form-control">

    USER ID:<input type="number" name="txtUser" class="form-control">  

    <input type="submit" value="submit" name="btnsave" class="btn btn-primary">
    
</form>