<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<title>IrakLi Project</title>
</head>

<body><center>
  <h1>ავტორიზაცია</h1>
<div class="input-field">
        <form method="post" action="#">
          <div class="form-group">
            <label>იუზერი</label>
            <input type="text" class="form-control" name="user" style="width:20em;" placeholder="ჩაწერეთ თქვენი იუზერი" required />
          </div>
          <div class="form-group">
            <label>პაროლი</label>
            <input type="password" class="form-control" name="pass" style="width:20em;" placeholder="ჩაწერეთ თქვენი პაროლი" required />
          </div>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary submitBtn" style="width:20em; margin:0;" /><br><br>
            <center>
             <a href="registration.php">რეგისტრაცია</a>
           </center>
          </div>
          
        </form>
      </div>
      </html>
      <?php
      session_start();
      include 'config.php';
	  
   if(isset($_POST['submit'])){
   $user = $_POST['user'];
   $pass = $_POST['pass'];
   $id = 0;

    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username=? AND password=? LIMIT 1");
    $stmt->bind_param('ss', $user, $pass);
    $stmt->execute();
    $stmt->bind_result($id, $user, $pass);
    $stmt->store_result();

	 
    if($stmt->num_rows == 1)
        {
           if($stmt->fetch())
            {
               
                   $_SESSION['Logged'] = 1;
                   $_SESSION['id'] = $id;
                   $_SESSION['username'] = $user;
                  ?>
				    <script>
      alert('წარმატებით შეხვედით სისტემაში');
      document.location='profile.php'
    </script>
				  <?php
                   exit();


    }
    else {
        echo "იუზერის და პაროლის კომბინაცია არასწორია!";
    }
    $stmt->close();
}
   }
$conn->close();
	  ?>

	  </center>
</body>
