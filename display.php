<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
<div id="create"><a href="create.php">CREATE NEW</a></div>
<form action="display.php" method="post">
	Enter task name : <input type="text" name="txtSearch">
	<input type="submit" name="btnSearch" class="btn btn-info" value="Search">
</form>
<style>
   #create a{
	text-decoration : none;
	color: green;
	font-size:32px;
   }
   #create{
	background-color:aquamarine;
	display:flex;
	justify-content:center;
   }
</style>
<?php
	$conn=new mysqli('localhost','root','','todolist');
	$searchtext = "";
	if(isset($_POST['btnSearch']))
	  $searchtext = $_POST['txtSearch'];	
	$sql="SELECT * FROM task WHERE task_name LIKE '%$searchtext%'";
	$result=$conn->query($sql);

	$list="<table class='table'>
			<tr>
				<th>SN</th> <th>Task Name</th> <th>Start Date</th> <th>End Date</th> <th>User ID</th> <th>Action</th> 
			</tr>";

	$data="";
	$s=1;
	while($row=$result->fetch_assoc()){
		$data=$data."<tr><td>".$s."</td><td>".$row['task_name']."</td><td>".$row['start_date']."</td><td>".$row['end_date']."</td><td>".$row['user_id']."</td><td><a href='delete.php?id=".$row['task_id']."'class='btn btn-danger'>Delete</a> <a href='edit.php?id=".$row['task_id']."'class='btn btn-success'>Edit</a></td></tr>";
		$s++;
	}
	echo $list.$data.'</table>';

?>
