<div class="jumbotron" id="about_us_header_3">

    <!-- <hr class="divider"> -->
    <!-- <div class="overlay" id="overlay">
    </div> -->

</div>


<div class="container mt-3 pt-2">
    <hr>
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

</div>

<script>
        $('.read_more').click(function() {
        location.href = "index.php?page=view_event&id=" + $(this).attr('data-id')
    })
</script>