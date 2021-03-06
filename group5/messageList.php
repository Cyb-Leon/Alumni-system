<?php

namespace MyApp;

use ChatUser;

include 'admin/db_connect.php';
//require('./admin/chat.php');
//require __DIR__ . '/vendor/autoload.php';

// $ChatUser = new ChatUser();

// $ChatUser->setUserId($_SESSION['login_id']);
// $ChatUser->setUserStatus('online');
// $ChatUser->updateUserStatus();


?>


<style>
	body,
	html {
		height: 100%;
		margin: 0;
		background: gray;
		background: black;
		background: grey;
	}

	.chat {
		margin-top: auto;
		margin-bottom: auto;
	}

	.card {
		height: 500px;
		border-radius: 15px !important;
		background-color: rgba(0, 0, 0, 0.4) !important;
	}

	.contacts_body {
		padding: 0.75rem 0 !important;
		overflow-y: auto;
		white-space: nowrap;
	}

	.msg_card_body {
		overflow-y: auto;
	}

	.card-header {
		border-radius: 15px 15px 0 0 !important;
		border-bottom: 0 !important;
	}

	.card-footer {
		border-radius: 0 0 15px 15px !important;
		border-top: 0 !important;
	}

	.container {
		align-content: center;
	}

	.search {
		border-radius: 15px 0 0 15px !important;
		background-color: rgba(0, 0, 0, 0.3) !important;
		border: 0 !important;
		color: white !important;
	}

	.search:focus {
		box-shadow: none !important;
		outline: 0px !important;
	}

	.type_msg {
		background-color: rgba(0, 0, 0, 0.3) !important;
		border: 0 !important;
		color: white !important;
		height: 60px !important;
		overflow-y: auto;
	}

	.type_msg:focus {
		box-shadow: none !important;
		outline: 0px !important;
	}

	.attach_btn {
		border-radius: 15px 0 0 15px !important;
		background-color: rgba(0, 0, 0, 0.3) !important;
		border: 0 !important;
		color: white !important;
		cursor: pointer;
	}

	.send_btn {
		border-radius: 0 15px 15px 0 !important;
		background-color: rgba(0, 0, 0, 0.3) !important;
		border: 0 !important;
		color: white !important;
		cursor: pointer;
	}

	.search_btn {
		border-radius: 0 15px 15px 0 !important;
		background-color: rgba(0, 0, 0, 0.3) !important;
		border: 0 !important;
		color: white !important;
		cursor: pointer;
	}

	.contacts {
		list-style: none;
		padding: 0;
	}

	.contacts li {
		width: 100% !important;
		padding: 5px 10px;
		margin-bottom: 15px !important;
	}

	.active {
		background-color: rgba(0, 0, 0, 0.3);
	}

	.user_img {
		height: 70px;
		width: 70px;
		border: 1.5px solid #f5f6fa;

	}

	.user_img_msg {
		height: 40px;
		width: 40px;
		border: 1.5px solid #f5f6fa;

	}

	.img_cont {
		position: relative;
		max-height: 70px;
		width: 40%;
		border-radius: 50%;
	}

	.img_cont_msg {
		height: 40px;
		width: 40px;
	}

	.online_icon {
		position: absolute;
		height: 15px;
		width: 15px;
		background-color: #4cd137;
		border-radius: 50%;
		bottom: 0.2em;
		right: 0.4em;
		border: 1.5px solid white;
	}

	.offline {
		background-color: #c23616 !important;
	}

	.user_info {
		margin-top: auto;
		margin-bottom: auto;
		margin-left: 15px;
	}

	.user_info span {
		font-size: 20px;
		color: white;
	}

	.user_info p {
		font-size: 10px;
		color: rgba(255, 255, 255, 0.6);
	}

	.video_cam {
		margin-left: 50px;
		margin-top: 5px;
	}

	.video_cam span {
		color: white;
		font-size: 20px;
		cursor: pointer;
		margin-right: 20px;
	}

	.msg_cotainer {
		margin-top: auto;
		margin-bottom: auto;
		margin-left: 10px;
		border-radius: 25px;
		background-color: #82ccdd;
		padding: 10px;
		position: relative;
	}

	.msg_cotainer_send {
		margin-top: auto;
		margin-bottom: auto;
		margin-right: 10px;
		border-radius: 25px;
		background-color: #78e08f;
		padding: 10px;
		position: relative;
	}

	.msg_time {
		position: absolute;
		left: 0;
		bottom: -15px;
		color: rgba(255, 255, 255, 0.5);
		font-size: 10px;
	}

	.msg_time_send {
		position: absolute;
		right: 0;
		bottom: -15px;
		color: rgba(255, 255, 255, 0.5);
		font-size: 10px;
	}

	.msg_head {
		position: relative;
	}

	#action_menu_btn {
		position: absolute;
		right: 10px;
		top: 10px;
		color: white;
		cursor: pointer;
		font-size: 20px;
	}

	.action_menu {
		z-index: 1;
		position: absolute;
		padding: 15px 0;
		background-color: rgba(0, 0, 0, 0.5);
		color: white;
		border-radius: 15px;
		top: 30px;
		right: 15px;
		display: none;
	}

	.action_menu ul {
		list-style: none;
		padding: 0;
		margin: 0;
	}

	.action_menu ul li {
		width: 100%;
		padding: 10px 15px;
		margin-bottom: 5px;
	}

	.action_menu ul li i {
		padding-right: 10px;

	}

	.action_menu ul li:hover {
		cursor: pointer;
		background-color: rgba(0, 0, 0, 0.2);
	}

	@media(max-width: 576px) {
		.contacts_card {
			margin-bottom: 15px !important;
		}
	}
</style>
<div class="jumbotron" id="about_us_header_4">



	<div class="overlay" id="overlay">

	</div>

</div>
<!-- <header class="masthead">
    <div class="container-fluid h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end mb-4 page-title">
                <h3 class="text-white">messages</h3>
                <hr class="divider my-4" />
              
            </div>
            
        </div>
    </div>
</header> -->

<div class="container-fluid h-100">
	<div class="row justify-content-center h-100">
		<div class="col-md-4 col-xl-3 chat">
			<div class="card mb-sm-3 mb-md-0 contacts_card">
				<div class="card-header">
					<div class="input-group">
						<input type="text" placeholder="Search..." name="" class="form-control search" id="search">
						<div class="input-group-prepend">
							<span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
						</div>
					</div>
				</div>
				<div class="card-body contacts_body">
					<ui class="contacts">
						<?php
						$fpath = 'admin/assets/uploads';
						$alumni = $conn->query("SELECT firstname, avatar, loginstatus, Concat(lastname,', ',firstname) as names FROM alumnus_bio");
						while ($row = $alumni->fetch_assoc()) :
						?>

							<li class="active">
								<div class="d-flex bd-highlight">
									<div class="img_cont img-responsive">
										<span><img class="img_cont" src="<?php echo $fpath . '/' . $row['avatar'] ?>" alt="avator"></span>
										<span class="online_icon"></span>
									</div>
									<a id="name">
										<div class="user_info">
											<span class="spanmessagel" style="font-size: large;
									font-weight: bold;"><?php echo ucwords($row['names']) ?></span>

											<p><span class="spanmessages" style="font-size: small;
									font-weight: light;"><?php echo $row['firstname'] ?></span> is <span style="font-size: small;
									font-weight: light;" class="onlinespanm"><?php echo $row['loginstatus'] ?></span></p>
										</div>
									</a>
								</div>
							</li>

						<?php endwhile; ?>

					</ui>
				</div>
				<div class="card-footer"></div>
			</div>
		</div>
		<div class="col-md-8 col-xl-6 chat">
			<div class="card">
				<div class="card-header msg_head">
					<div class="d-flex bd-highlight">
						<div class="img_cont">
							<!-- <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img"> -->
							<span class="online_icon"></span>
						</div>
						<div class="user_info">
							<span>Ramahadi</span>
							<p>1767 Messages</p>
						</div>

					</div>
					<span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
					<div class="action_menu">

					</div>
				</div>
				<div class="card-body msg_card_body">
					<div class="d-flex justify-content-start mb-4">
						<div class="img_cont_msg">
							<!-- <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg"> -->
						</div>
						<div class="msg_cotainer">
							Hi, how are you John?
							<span class="msg_time">8:40 AM, Today</span>
						</div>
					</div>
					<div class="d-flex justify-content-end mb-4">
						<div class="msg_cotainer_send">
							Hi Ramahadi i am good tnx how about you?
							<span class="msg_time_send">8:55 AM, Today</span>
						</div>
						<div class="img_cont_msg">

						</div>
					</div>
					<div class="d-flex justify-content-start mb-4">
						<div class="img_cont_msg">
							<!-- <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg"> -->
						</div>
						<div class="msg_cotainer">
							I am good too, thank you for your the file you have sent
							<span class="msg_time">9:00 AM, Today</span>
						</div>
					</div>
					<div class="d-flex justify-content-end mb-4">
						<div class="msg_cotainer_send">
							You are welcome
							<span class="msg_time_send">9:05 AM, Today</span>
						</div>
						<div class="img_cont_msg">

						</div>
					</div>
					<div class="d-flex justify-content-start mb-4">
						<div class="img_cont_msg">

						</div>
						<div class="msg_cotainer">
							I am looking for your next files
							<span class="msg_time">9:07 AM, Today</span>
						</div>
					</div>
					<div class="d-flex justify-content-end mb-4">
						<div class="msg_cotainer_send">
							Ok, thank you have a good day
							<span class="msg_time_send">9:10 AM, Today</span>
						</div>
						<div class="img_cont_msg">

						</div>
					</div>
					<div class="d-flex justify-content-start mb-4">
						<div class="img_cont_msg">

						</div>
						<div class="msg_cotainer">
							Bye, see you
							<span class="msg_time">9:12 AM, Today</span>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<div class="input-group">
						<div class="input-group-append">
							<span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
						</div>
						<textarea name="" class="form-control type_msg" placeholder="Type your message..."></textarea>
						<div class="input-group-append">
							<span class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<script>
	$('#name').click(function() {
		uni_modal("Profile", "messageprof.php?", 'mid-large')
	})

	var conn = new WebSocket('ws://localhost:8080');
	conn.onopen = function(e) {
		console.log("Connection established!");
	};

	conn.onmessage = function(e) {
		console.log(e.data);
	};

	conn.onclose = function(e) {
		console.log('connection closed');
	};
</script>

<?php
