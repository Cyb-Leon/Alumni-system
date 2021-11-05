<?php 
include 'admin/db_connect.php'; 

?>

<header class="masthead">
    <div class="container-fluid h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end mb-4 page-title">
                <h3 class="text-white">messages</h3>
                <hr class="divider my-4" />
              
            </div>
            
        </div>
    </div>
</header>

<div class="h-3">

</div>
<div class=" p-5 border rounded bg-secondary" style="margin: 5rem;">
    <form action="" method="POST" id="createmessage" name="createmessage">

        <div class="m-2 p-1">
            <h4 class="text-white">TO:</h3>
            <select class="custom-select">
              <option selected>select User</option>
              <?php 
                $course = $conn->query("SELECT * FROM users order by username asc");
                while($row=$course->fetch_assoc()):
                ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['username'] ?></option>
                    
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label class="text-white m-2 p2" for="FormControlTextarea1">Enter Subject</label>
            <input name="subject" type="text" class="form-control" id="subject" placeholder="e.g Change of address">

          </div>
        <div class="form-group">
            <label class="text-white m-2 p2" for="FormControlTextarea1">Enter Message</label>
            <textarea name="content" class="form-control" id="FormControlTextarea1" placeholder="e.g Good day!" rows="3"></textarea>
          </div>
          
          
          <div>
            <button class="btn btn-success m-2 send" type="submit" name="send" >Send Message</button>
          </div>
    </form>
          
</div>

<script>
    
    // $('.send').click(function(){
    //     if(isset($_POST['createmessage'])){
    //     require 'PHPMailerAutoload.php';

    //     $mail = new PHPMailer;
        
    //     $mail->SMTPDebug = 3;                               // Enable verbose debug output
        
    //     $mail->isSMTP();                                      // Set mailer to use SMTP
    //     $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    //     $mail->SMTPAuth = true;                               // Enable SMTP authentication
    //     $mail->Username = 'moheanerj@gmail.com';                 // SMTP username
    //     $mail->Password = 'Rj$19963980';                           // SMTP password
    //     $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    //     $mail->Port = 587;                                    // TCP port to connect to
        
    //     $mail->setFrom('moheanerj@gmail.com', 'Ramahadi');
    //     $mail->addAddress($_POST['email'], $_POST['email']);     // Add a recipient

    //     $mail->addReplyTo('moheanerj@gmail.com', 'Send from the browser');

        
    //     // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //     // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    //     $mail->isHTML(true);                                  // Set email format to HTML
        
    //     $mail->Subject = $_POST['subject'];
    //     $mail->Body    = $_POST['content'];
    //     $mail->AltBody = $_POST['content'];
        
    //     if(!$mail->send()) {
    //         echo 'Message could not be sent.';
    //         echo 'Mailer Error: ' . $mail->ErrorInfo;
    //     } else {
    //         echo 'Message has been sent';
    //     }
    // }
    // })

    $('#createmessage').submit(function(e){
		e.preventDefault()
		$('#createmessage button[type="submit"]').attr('disabled',true).html('Sending message...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'admin/ajax.php?action=messages',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
			},
			
		})
	})
	
</script>

