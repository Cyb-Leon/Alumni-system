<?php
include 'admin/db_connect.php';
?>
<style>
    #portfolio .img-fluid {
        width: calc(100%);
        height: 30vh;
        z-index: -1;
        position: relative;
        padding: 1em;
    }

    .event-list {
        cursor: pointer;
    }

    span.hightlight {
        background: grey;
    }

    .banner {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 26vh;
        width: calc(30%);
    }

    .banner img {
        width: calc(100%);
        height: calc(100%);
        cursor: pointer;
    }

    .event-list {
        cursor: pointer;
        border: unset;
        flex-direction: inherit;
    }

    .event-list .banner {
        width: calc(40%)
    }

    .event-list .card-body {
        width: calc(60%)
    }

    .event-list .banner img {
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
        min-height: 50vh;
    }

    span.hightlight {
        background: grey;
    }

    .banner {
        min-height: calc(100%)
    }
</style>
<!-- <aside class="alert alert-dismissible covid-19-information fade show text-center" role="alert"> <div class="row"> <div class="col-lg-12"> <span class="fw-bold">Stay Informed! </span><span>Visit the SA Department of Health's Website for COVID-19 updates:</span> <a href="http://sacoronavirus.co.za" target="_blank"> <span class="badge bg-dark fw-bold">sacoronavirus.co.za</span> </a> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div> </div> </aside> -->
<!-- <header>
     <div class="masthead-subheading">Welcome to <?php //echo $_SESSION['system']['name']; ?> </div>
        <div class="masthead-heading text-uppercase">Ready to build your future?</div>
</header> -->
<section class="home-section ">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner image-container">
            <div class="carousel-item active">            
              <img src="assets/img/slide1.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 >Share experiance</h5>
                    <p >Offer help and ideas to other alumni, or share your job timeline.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/img/slide2.jpeg" class="d-block w-100 "  alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Build your career</h5>
                    <p>Find amazing opportunities from companies.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/img/slide3.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Community</h5>
                    <p>Connect with other alumni with simmilar ambitions.</p>
                </div>
            </div>

            <div class="overlay" id="overlay"></div>

        </div>
        <!-- <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a> -->
    </div>
</section>

<div id="the-events" class="py-5 bg-light service-27">
    <div class="container">
        <div class="row">
            <!-- column -->
            <div class="col-lg-6 align-self-center">
                <span class="badge badge-info rounded-pill px-3 py-1 font-weight-light">What is Offered</span>
                <h4 class="my-3">Everything you need to kick start your career and impove your skills, all in one app</h4>
                <p class="mt-3">We have put in hardwork to provide you with a platform to keep you close with fellow mindworx alumni.</p>
                <div class="row">
                    <div class="col-md-6 mt-4">
												<span class="text-info-gradiant display-5">Networking</span>
                        <h6 class="font-weight-medium my-3">A community of alumni with skills</h6>
                        <p>This app will allow you to share work opportunities or find one through a community of already working alumni.</p>
                        <a class="linking font-weight-medium" href="#f27">Interested!</a>
                    </div>
                    <div class="col-md-6 mt-4">
                        <span class="text-info-gradiant display-5">Events</span>
                        <h6 class="font-weight-medium my-3">Engage in some of our intenal company advice</h6>
                        <p>Choose to participate in many of our alumni webnairs for conversations regarding external company talent pools and skill improvement mentoring.</p>
                        <a class="linking font-weight-medium" href="#f27">Interested!</a>
                    </div>
                </div>
            </div>
            <!-- column -->
            <div class="col-lg-6 text-center">
                <img src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/features/feature27/img1.png" class="img-fluid" alt="wrapkit" />
            </div>
        </div>
    </div>
</div>

<!-- <div class="container mt-3 pt-2">
    <h4 class="text-center text-white">Upcoming Events</h4>
    <hr class="divider">
    <?php
    $event = $conn->query("SELECT * FROM events where date_format(schedule,'%Y-%m%-d') >= '" . date('Y-m-d') . "' order by unix_timestamp(schedule) asc");
    while ($row = $event->fetch_assoc()) :
        $trans = get_html_translation_table(HTML_ENTITIES, ENT_QUOTES);
        unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
        $desc = strtr(html_entity_decode($row['content']), $trans);
        $desc = str_replace(array("<li>", "</li>"), array("", ","), $desc);
    ?>
        <div class="card event-list" data-id="<?php echo $row['id'] ?>">
            <div class='banner'>
                <?php if (!empty($row['banner'])) : ?>
                    <img src="admin/assets/uploads/<?php echo ($row['banner']) ?>" alt="">
                <?php endif; ?>
            </div>
            <div class="card-body">
                <div class="row  align-items-center justify-content-center text-center h-100">
                    <div class="">
                        <h3><b class="filter-txt"><?php echo ucwords($row['title']) ?></b></h3>
                        <div><small>
                                <p><b><i class="fa fa-calendar"></i> <?php echo date("F d, Y h:i A", strtotime($row['schedule'])) ?></b></p>
                            </small></div>
                        <hr>
                        <larger class="truncate filter-txt"><?php echo strip_tags($desc) ?></larger>
                        <br>
                        <hr class="divider" style="max-width: calc(80%)">
                        <button class="btn btn-primary float-right read_more" data-id="<?php echo $row['id'] ?>">Read More</button>
                    </div>
                </div>


            </div>
        </div>
        <br>
    <?php endwhile; ?>

</div> -->

<!--events start-->

  	  
        <?php include './webinar.php' ?>
<!--events end-->
                    <br>
                    <br>

        <!-- Clients-->

        <h4 class=" text-center" >Our Clients</h4>
        <div class="py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="images/netbk.png" alt="..." /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="images/media24-logo.png" alt="..." /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="images/discovery.png" alt="..." /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="images/ey.png" alt="..." /></a>
                    </div>
                </div>
            </div>
        </div>
<script>
    $('.read_more').click(function() {
        location.href = "index.php?page=view_event&id=" + $(this).attr('data-id')
    })
    $('.banner img').click(function() {
        viewer_modal($(this).attr('src'))
    })
    $('#filter').keyup(function(e) {
        var filter = $(this).val()

        $('.card.event-list .filter-txt').each(function() {
            var txto = $(this).html();
            txt = txto
            if ((txt.toLowerCase()).includes((filter.toLowerCase())) == true) {
                $(this).closest('.card').toggle(true)
            } else {
                $(this).closest('.card').toggle(false)

            }
        })
    })
</script>