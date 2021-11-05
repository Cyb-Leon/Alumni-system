<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('./db_connect.php');
ob_start();
if(!isset($_SESSION['system'])){
	$system = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
	foreach($system as $k => $v){
		$_SESSION['system'][$k] = $v;
	}
}
ob_end_flush();
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link rel="stylesheet" 
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/
bootstrap.min.css">
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

  <title><?php echo $_SESSION['system']['name'] ?></title>
 	

<?php include('./header.php'); ?>
<?php 
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

?>
<div>
	<img src="academylogo.png">
</div>
</head>
<style>
	body,html{
		width: 100%;
	    height: 100%;
	    /*background: #007bff;*/
	    background: url(assets/uploads/<?php echo $_SESSION['system']['cover_img'] ?>);
	  background-repeat: no-repeat;
	  background-size: cover;
	  background-position: center;
	}
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 40%;
  border-radius: 10px;
  padding: 20px 10px 20px 10px;
  background-color: rgb(0,0,0,0.4);
  color: orange;
  text-decoration: bold;
   display: block;
    margin-left: auto;
    margin-right: auto;


}
.button{
				  display: inline-block;
				  padding: 5px 25px;
				  font-size: 15px;
				  height: 40px;
				  cursor: pointer;
				  text-align: center;
				  text-decoration: none;
				  outline: none;
				  color: white;
				  background-color:grey;
				  border: none;
				  border-radius: 15px;
				 
				}

				.button:hover {background-color:orange}

				.button:active {
				  background-color: #3e8e41;
				  box-shadow: 0 5px #666;
				  transform: translateY(4px);
				}
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}


.container {
  padding: 10px 12px;
  position: center;
  padding: 200px 0px 100px 0px;
}
.login-form{
	padding: 10px 0px 10px 0px;

}
img {
  max-width: 30%;
  height: auto;
}
</style>

<body>

<div class ="container">
	<div class="card">
		<form id="login-form" >
  						<div class="form-group">
  							<h1 align="center">Admin log in</h1>
  							<label for="username" class="control-label">Username</label>
  							<input type="text" id="username" name="username" class="form-control">
  						</div>
  						<div class="form-group">
  							<label for="password" class="control-label">Password</label>
  							<input type="password" id="password" name="password" class="form-control">
  						</div>
  						<center><button class="button">Login</button></center>
  					</form>
	</div>


	<div class="row">
		<div class="col-md-4 offset-md-4 form">
						
  		</div>
  	</div>
 </div>
   

  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
<script>
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=home';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>	
</html>