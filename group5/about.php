<div class="jumbotron" id="about_us_header_2">
    <div class="overlay" id="overlay">
        <div class="container">


<br>
            <h3 class="display-5 mt-5 text-white">About Us</h3>
            <p class="text-white">
                We have put in hardwork to provide you with
                a platform to keep you close with fellow mindworx alumni.
            </p>

            <a type="button" href="index.php?page=careers" class="btn btn-outline-warning">Careers</a>
            <a type="button" href="index.php?page=alumni_list" class="btn btn-outline-warning">Alumni</a>
            <a type="button" href="index.php?page=alumni_list" class="btn btn-outline-warning">Clients</a>
        </div>
    </div>

</div>
<section class="page-section" style="background-color:white">



    <div class="container">
        <?php echo html_entity_decode($_SESSION['system']['about_content'])
        ?>

    </div>
</section>