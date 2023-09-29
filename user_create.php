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
        
        $fullname = $_POST['txtFullname'];
        $email =$_POST['txtEmail'];
        $password =$_POST['txtPassword'];
        $type=$_POST['ddlUserType'];
 
    $sql = "INSERT INTO user(fullname,email,password,user_type) VALUES('$fullname','$email','$password',$type)";
    $ret = $conn->query($sql);
    if($ret)
    {
        echo("user created sucessfully");
    }
    else{
        echo("user creation failed");
    }

    }
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<form action="user_create.php" method="post">

    FULLNAME:<input type="text" name="txtFullname" class="form-control" required>

    EMAIL:<input type="email" name="txtEmail" class="form-control" required>

    PASSWORD:<input type="password" name="txtPassword" class="form-control" required>

    USER TYPE:<select name="ddlUserType" class="form-control" required>
           <option selected disabled hidden>Choose User Type</option>
            <option value="1">Admin User</option>
            <option value="2">Normal User</option>
            </select>
    <input type="submit" value="create user" name="btnsave" class="btn btn-primary">
    
</form>