<?php
     //database connection
    $conn=new mysqli('localhost','root','','todolist');   
    $sql = "SELECT * FROM task WHERE task_id=".$_GET['id'];
    $result = $conn->query($sql);
    $tname =''; $sdate =''; $edate = ''; $uid= '';
    while($row = $result->fetch_assoc()){
        $tname = $row['task_name'];
        $sdate = $row['start_date'];
        $edate = $row['end_date'];
        $uid = $row['user_id'];
    }
    //post method
    if(isset($_POST['btnsave'])){
        $taskname = $_POST['txtTaskName'];
        $startdate =$_POST['txtStartDate'];
        $enddate =$_POST['txtEndDate'];
        $user=$_POST['txtUser'];
   
    $sql = "UPDATE task SET task_name='$taskname',start_date='$startdate',end_date='$enddate',user_id='$user' WHERE task_id=".$_GET['id'];
    $ret = $conn->query($sql);
    if($ret)
    {
      header("Location:display.php");
    }
    else{
        echo("update failed");
    }

    }
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<h2>update form</h2>
<form action="edit.php?id=<?php echo $_GET['id'];?>" method="post">

    TASK NAME:<input type="text" name="txtTaskName" class="form-control" value="<?php echo $tname;?>">

    START DATE:<input type="text" name="txtStartDate" class="form-control" value="<?php echo $sdate;?>">

    END DATE:<input type="text" name="txtEndDate" class="form-control" value="<?php echo $edate;?>">

    USER ID:<input type="number" name="txtUser" class="form-control" value="<?php echo $uid;?>">  

    <input type="submit" value="update" name="btnsave" class="btn btn-primary">
    
</form>