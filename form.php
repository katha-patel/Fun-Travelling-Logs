<?php
$con=mysqli_connect('localhost','root','','travel');
if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $travel = $_POST['travel'];
    $query = "INSERT INTO `users`(`email`, `phone`, `name`, `age`, `travel`) VALUES ('$email','$phone','$name','$age','$travel')";
    $run=mysqli_query($con,$query);
    // if($run)
    // {
    //     echo "Successful";
    // }
    // else
    // {
    //     echo "Your life sucks";
    // }
    //echo $email;
}
if(isset($_GET['id']))
{
  $id=$_GET['id'];
  $query = "DELETE FROM `users` WHERE `id`='$id'";
  $run=mysqli_query($con,$query);
  header('location:form.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Travelling</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>
<body class="bdy">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="#">Travelling</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
				<li class="nav-item active">
	        <a class="nav-link" href="index.html">Back</a>
	      </li>
	    </ul>
	  </div>
	</nav>
<br>
<br>
<div class="opbox">
		<div class="row">
			<div class="col-sm-2 col-md-2 col-xs-2 col-lg-2">
			</div>
			<div class="col-sm-8 col-md-8 col-xs-8 col-lg-8">
		<form action="form.php" method="post" name="form1">
  <div class="col-md-4">
    <label for="exampleInputEmail1" class="form-label">Email address:</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    <small id="emailHelp" class="form-text text-muted">
  Enter valid Email
</small>
  </div>
  <br>
  <div class="col-md-4">
    <label for="exampleInputPassword1" class="form-label">Phone Number:</label>
    <input type="number" name="phone" class="form-control" id="exampleInputPassword1" required>
  </div>
<br>
	  <div class="col-md-4">
	    <label for="validationCustom01" class="form-label">Name:</label>
	    <input type="text" name="name" class="form-control" id="validationCustom01"  required>
	  </div>
    <br>
	  <div class="col-md-4">
	    <label for="validationCustom02" class="form-label">Age:</label>
	    <input type="text" name="age" class="form-control" id="validationCustom02" required>
	  </div>
<br>
	  <div class="col-md-6">
	    <label for="validationCustom03" class="form-label"><b>Where You Wanna Visit </b><i class='fas fa-globe-americas'></i></label>
	    <input type="text" name="travel" class="form-control" id="validationCustom03" required>
	  </div>

	  <br>
	  <div class="col-12">
	    <input class="btn btn-primary" type="submit" value="Submit" onclick="ValidateEmail(document.form1.email); Validatephno(document.form1.phone);" name="submit">
	  </div>

</form>
<br>
<br>
<br>
<div class="table-responsive">
<table class="table table-striped table-hover">
            <thead class="table-dark">
    <tr>
      <th scope="col">#</th>
	  <th scope="col">Email</th>
	  <th scope="col">Phone</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Wanna Visit</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
	  <?php
	  $query1 = "SELECT * FROM `users`";
	  $run1=mysqli_query($con,$query1);
	  $i=1;
	  while($row=mysqli_fetch_assoc($run1))
	  {
	  ?>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['phone']; ?></td>
      <td><?php echo $row['name']; ?></td>
	  <td><?php echo $row['age']; ?></td>
	  <td><?php echo $row['travel']; ?></td>
    <td><a class="btn btn-danger" href="form.php?id=<?php echo $row['id']; ?>"><i class='fas fa-trash' ></i></a></td>
    </tr>
    <?php
	$i=$i+1;
	  }
	?>
  </tbody>
</table>
</div>
</div>
<div class="col-sm-2 col-md-2 col-xs-2 col-lg-2">
</div>
</div>
</div>
<br><br>
  </body>
	<script>

	function ValidateEmail(inputText)
	{
    //console.log(inputText)
	var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
	if(inputText.value.match(mailformat))
	{
	//alert("Valid email address!");
	document.form1.email.focus();
	return (true);
	}
	else
	{
	alert("You have entered an invalid email address!");
	document.form1.email.focus();
	return (false);
	}
	}

  function Validatephno(inputText)
  {
    if(inputText.length==10)
    {
      document.form1.phone.focus();
      return (true);
    }
    else
    {
      alert("You have not entered 10 digit mobile number!");
      document.form1.phone.focus();
      return (false);
    }
  }

	</script>
  </html>
