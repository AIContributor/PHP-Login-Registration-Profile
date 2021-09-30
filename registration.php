<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<title>IrakLi Project</title>
</head>

<body><center>
  <h1>რეგისტრაცია</h1>
<div class="reg-input-field">
        <form method="post" action="#" >
          <div class="form-group">
            <label>სრული სახელი</label>
            <input type="text" class="form-control" name="fname" style="width:20em;" placeholder="ჩაწერეთ სრული სახელი" required />
          </div>
          <div class="form-group">
            <label>თქვენი სქესი:</label>

<select class="form-control" style="width:20em;" name="gender">
  <option value="კაცი">კაცი</option>
  <option value="ქალი">ქალი</option>
</select>
          </div>
          <div class="form-group">
            <label>ასაკი</label>
            <input type="number" class="form-control" name="age" style="width:20em;" placeholder="ჩაწერეთ თქვენი ასაკი">
          </div>
          <div class="form-group">
            <label>მისამართი</label>
            <input type="text" class="form-control" name="address" style="width:20em;" required placeholder="ჩაწერეთ თქვენი მისამართი"></textarea>
          </div>
          <div class="form-group">
            <label>იუზერი</label>
            <input type="text" class="form-control" name="user" style="width:20em;" placeholder="ჩაწერეთ თქვენი იუზერი">
          </div><div class="form-group">
            <label>პაროლი</label>
            <input type="Password" class="form-control" name="pass" style="width:20em;" required  placeholder="ჩაწერეთ თქვენი პაროლი">
          </div>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary submitBtn" style="width:20em; margin:0;" /><br><br>
             <center>
             <a href="index.php">ავტორიზაცია</a>
           </center>
          </div>
        </form>
      </div>
      </html>
      <?php
      include 'config.php';
if(isset($_POST['submit'])){
$fname = $_POST['fname'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$address = $_POST['address'];
$user = $_POST['user'];
$pass = $_POST['pass'];

$stmt = $conn->prepare("INSERT INTO users (username, password, full_name, gender, age, address) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $user, $pass, $fname, $gender, $age, $address);

$stmt->execute();


$stmt->close();
$conn->close();

                ?>
                <script type="text/javascript">
            alert("თქვენ წარმატებით დარეგისტრირდით.");
            window.location = "index.php";
        </script>
		</center></body>
                <?php
}
	 ?>
	  
	  
