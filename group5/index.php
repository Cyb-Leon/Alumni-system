<!DOCTYPE html>

<html lang="en">

<?php

session_start();

include('admin/db_connect.php');

ob_start();

$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();

foreach ($query as $key => $value) {

  if (!is_numeric($key))

    $_SESSION['system'][$key] = $value;
}

ob_end_flush();

include('header.php');





?>



<style>
  /* header.masthead {

		  background: url(admin/assets/uploads/<?php echo $_SESSION['system']['cover_img'] ?>);

		  background-repeat: no-repeat;

		  background-size: cover;

		} */



  #viewer_modal .btn-close {

    position: absolute;

    z-index: 999999;

    /*right: -4.5em;*/

    background: unset;

    color: white;

    border: unset;

    font-size: 27px;

    top: 0;

  }

  #viewer_modal .modal-dialog {

    width: 80%;

    max-width: unset;

    height: calc(90%);

    max-height: unset;

  }

  #viewer_modal .modal-content {

    background: grey;

    border: unset;

    height: calc(100%);

    display: flex;

    align-items: center;

    justify-content: center;

  }

  #viewer_modal img,
  #viewer_modal video {

    max-height: calc(100%);

    max-width: calc(100%);

  }

  /* body {
    /*removed the color footer here from important gray to footer.css light black 

    background: #d3d3d3 !important;

  } */







  a.jqte_tool_label.unselectable {

    height: auto !important;

    min-width: 4rem !important;

    padding: 5px
  }

  /*

a.jqte_tool_label.unselectable {

    height: 22px !important;

}*/
</style>

<body id="page-top">

  <!-- Navigation-->

  <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">

    <div class="toast-body text-white">

    </div>

  </div>

  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">

    <div class="container">

      <!-- <a class="navbar-brand js-scroll-trigger" href="./"><img src="academylogo.png" width="300" height="70"></a> -->
      <a class="navbar-brand" href="index.php?page=home"><img src="mindworx-logo.png" style="
    width: 200px;
" /></a>
      <!---navbar-toggler-icon-->
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-bars ms-m"></i></button>

      <div class="collapse navbar-collapse" id="navbarResponsive">

        <ul class="navbar-nav ml-auto my-2 my-lg-0">

          <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home">Home</a></li>


          <?php if (isset($_SESSION['login_id'])) : ?>



            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=forum">News feed</a></li>
<li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=messageList">Messages</a></li>
<li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=webinar">Webinar</a></li>


          <?php endif; ?>
		  

          <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=about">About</a></li>

          <?php if (!isset($_SESSION['login_id'])) : ?>

            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#" id="login">Login</a></li>

          <?php else : ?>

            <li class="nav-item">

              <div class=" dropdown mr-4">

                <a href="#" class="nav-link js-scroll-trigger" id="account_settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['login_name'] ?> <i class="fa fa-angle-down"></i></a>

                <div class="dropdown-menu" aria-labelledby="account_settings" style="left: -2.5em;">

                  <a class="dropdown-item" href="index.php?page=my_account" id="manage_my_account"><i class="fa fa-cog"></i> Manage Account</a>

                  <a class="dropdown-item" href="admin/ajax.php?action=logout2"><i class="fa fa-power-off"></i> Logout</a>

                </div>

              </div>

            </li>

          <?php endif; ?>





        </ul>

      </div>

    </div>

  </nav>



  <?php

  $page = isset($_GET['page']) ? $_GET['page'] : "home";

  include $page . '.php';

  ?>





  <div class="modal fade" id="confirm_modal" role='dialog'>

    <div class="modal-dialog modal-md" role="document">

      <div class="modal-content">

        <div class="modal-header">

          <h5 class="modal-title">Confirmation</h5>

        </div>

        <div class="modal-body">

          <div id="delete_content"></div>

        </div>

        <div class="modal-footer">

          <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>

      </div>

    </div>

  </div>

  <div class="modal fade" id="uni_modal" role='dialog'>

    <div class="modal-dialog modal-md" role="document">

      <div class="modal-content">
        <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-header">

          <h5 class="modal-title"></h5>

        </div>

        <div class="modal-body">

        </div>

        <div class="modal-footer">

          <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

        </div>

      </div>

    </div>

  </div>

  <div class="modal fade" id="uni_modal_right" role='dialog'>

    <div class="modal-dialog modal-full-height  modal-md" role="document">

      <div class="modal-content">

        <div class="modal-header">

          <h5 class="modal-title"></h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span class="fa fa-arrow-righ t"></span>

          </button>

        </div>

        <div class="modal-body">

        </div>

      </div>

    </div>

  </div>

  <div class="modal fade" id="viewer_modal" role='dialog'>

    <div class="modal-dialog modal-md" role="document">

      <div class="modal-content">

        <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>

        <img src="" alt="">

      </div>

    </div>

  </div>

  <div id="preloader"></div>
  <!-- Site footer -->
  <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <h6>About</h6>
          <p class="text-justify"> <small>
          The
Alumni Management System is a simple PHP/MySQL project that helps a certain university/college school manages its
alumni data. This project has 2 sides of users UI (user interface), which are the admin side/school management and the
alumnus/alumna&rsquo;s side. The admin side can manage all the list of job posted, alumni list, events, forum topics,
and the gallery. The alumni site can create an account (to be verified by admin), post a job opportunity, create a
forum topic, and join to other forums, commit to participate in an upcoming event such as
homecoming.</small>
          <?php //echo html_entity_decode($_SESSION['system']['about_content']) ?> </p>
        </div>

        <div class="col-xs-6 col-md-3">

        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Quick Links</h6>
          <ul class="footer-links">
            <li><a href="index.php?page=about">About Us</a></li>
            <li><a href="index.php?page=gallery">Our Clients</a></li>
              <li><a href=" index.php?page=alumni_list">Alumni</a></li>
            <li><a href="index.php?page=careers">Careers</a></li>
            <li><a href="#">Contact Us</a></li>
          </ul>
        </div>
      </div>
      <hr>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <p class="copyright-text">Copyright &copy; 2021 All Rights Reserved by
            <a href="#"><?php echo $_SESSION['system']['name'] ?> </a>.
          </p>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <ul class="social-icons">
            <li><a class="facebook" href="#"><i class="fab fa-facebook"></i></a></li>
            <li><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a class="linkedin" href="#"><i class="fab fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>




  <?php include('footer.php') ?>

</body>

<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
         -->
<script type="text/javascript">
  $('#login').click(function() {

    uni_modal("Login", 'login.php')

  })
</script>


<?php $conn->close() ?>



</html>



<!-- <footer class=" py-5">
            <div class="container">

                <div class="row justify-content-center">

                    <div class="col-lg-8 text-center">

                        <h2 class="mt-0 text-white">Contact us</h2>

                        <hr class="divider my-4" />

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">

                        <i class="fas fa-phone fa-3x mb-3 text-muted"></i>

                        <div class="text-white"><?php //echo $_SESSION['system']['contact'] 
                                                ?></div>

                                                </div>
                            
                                                <div class="col-lg-4 mr-auto text-center">
                            
                                                    <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                            
                                                     Make sure to change the email address in BOTH the anchor text and the link target below!
                            
                                                    <a class="d-block" href="mailto:<?php //echo $_SESSION['system']['email'] ?>"><?php  //echo $_SESSION['system']['email'] ?></a>
                            
                                                </div>
                            
                                            </div>
                            
                                        </div>
                            
                                        <br>
                            
                                        <div class="container"><div class="small text-center text-muted">Copyright © 2020 - | <a href="https://www.sourcecodester.com/" target="_blank">Sourcecodester</a></div></div>
                            
                                    </footer  > -->