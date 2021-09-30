<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<title>IrakLi Project</title>
</head>


<?php

  include 'config.php';
  session_start();
  $id=$_SESSION['id'];
  $stmt = $conn->prepare("SELECT * FROM users WHERE id=?");
  $stmt->bind_param('i', $id);
  $stmt->execute();
  
$result = $stmt->get_result();
$row = $result->fetch_assoc();

  ?>
  <body><center>
  <h1>კაბინეტი</h1>
<div class="profile-input-field">
        <form method="post" action="#" >
          <div class="form-group">
            <label>სახელი</label>
            <input type="text" class="form-control" name="fname" style="width:20em;" placeholder="ჩაწერეთ სახელი სრულად" value="<?php echo $row['full_name']; ?>" required />
          </div>
          <div class="form-group">
            <label>სქესი</label>
		  <select class="form-control" style="width:20em;" name="gender">
		  
		  <?php
		  if ($row['gender'] == "კაცი") {
?>
<option value="კაცი" selected>კაცი</option>
  <option value="ქალი">ქალი</option>

<?php
}
	
else

{
	?>
<option value="კაცი">კაცი</option>
  <option value="ქალი" selected>ქალი</option>	
  
  <?php
}	
	?>
</select>
         
          </div>
          <div class="form-group">
            <label>ასაკი</label>
            <input type="number" class="form-control" name="age" style="width:20em;" value="<?php echo $row['age']; ?>">
          </div>
          <div class="form-group">
            <label>მისამართი</label>
            <input type="text" class="form-control" name="address" style="width:20em;" required placeholder="ჩაწერეთ მისამართი" value="<?php echo $row['address']; ?>"></textarea>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" style="width:20em; margin:0;"><br><br>
            <center>
             <a href="logout.php">სისტემიდან გასვლა</a>
           </center>
          </div>
        </form>
      </div>
      </html>
      <?php
      if(isset($_POST['submit'])){
        $fullname = $_POST['fname'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $address = $_POST['address'];
		
		
		$stmt = $conn->prepare("UPDATE users SET full_name = ?, gender = ?, age = ?, address = ? WHERE id = ?");
        $stmt->bind_param("sssss", $fullname, $gender,  $age, $address, $id);
        $stmt->execute();
                    ?>
                     <script type="text/javascript">
            alert("მონაცემები განახლდა");
            window.location = "profile.php";
        </script>
        <?php
             }               
?>
