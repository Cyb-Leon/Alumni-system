<?php 
include 'admin/db_connect.php'; 
   // Page was not reloaded via a button press
?>


<br>
<br>
<br>
<section class="feeds">

<!-- 
<nav class="navbar navbar-light bg-white">
        <form class="form-inline">
            <div class="input-group">
                <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="button" id="button-addon2">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </nav> -->


    <div class="container-fluid gedf-wrapper">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="h5"><?php echo $_SESSION['login_name'] ?></div>
                        <!-- <div class="h7 text-muted">Fullname : Miracles Lee Cross</div> -->
                        <div class="h7">Developer of web applications, JavaScript, PHP, Java, Python, Ruby, Java, Node.js,
                            etc.
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="h6 text-muted">Followers</div>
                            <div class="h5">0</div>
                        </li>
                        <li class="list-group-item">
                            <div class="h6 text-muted">Following</div>
                            <div class="h5">0</div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 gedf-main">

                <!--- \\\\\\\Post-->
                <div class="card gedf-card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Make
                                    a publication</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" id="images-tab" data-toggle="tab" role="tab" aria-controls="images" aria-selected="false" href="#images">Images</a>
                            </li> -->
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                                <div class="form-group">
                                    <label class="sr-only" for="message">post</label>
                                    <textarea class="form-control" id="message" rows="3" placeholder="What are you thinking?"></textarea>
                                </div>

                            </div>
                            <!-- <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Upload image</label>
                                    </div>
                                </div>
                                <div class="py-4"></div>
                            </div> -->
                        </div>
                        <div class="btn-toolbar justify-content-between">
                            <div class="btn-group">
                                <button type="submit" id="new_forum" class="btn btn-primary">share</button>
                            </div>
                            <div class="btn-group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-link dropdown-toggle" style="color:#fc7f2d;" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="fa fa-globe"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">
                                    <a class="dropdown-item" href="#"><i class="fa fa-globe"></i> Public</a>
                                    <a class="dropdown-item" href="#"><i class="fa fa-users"></i> Friends</a>
                                    <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Just me</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Post /////-->
              <?php
                    $event = $conn->query("SELECT f.*,u.name from forum_topics f inner join users u on u.id = f.user_id order by f.id desc");
                    while($row = $event->fetch_assoc()):
                        $trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
                        unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
                        $desc = strtr(html_entity_decode($row['description']),$trans);
                        $desc=str_replace(array("<li>","</li>"), array("",","), $desc);
                        $count_comments=0;
                        $count_comments = $conn->query("SELECT * FROM forum_comments where topic_id = ".$row['id'])->num_rows;
                ?>
            
                <!--- \\\\\\\Post-->
                <div class="card gedf-card" data-id="<?php echo $row['id'] ?>">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                                </div>
                                <div class="ml-2">
                                    <div class="h5 m-0"><?php echo $row['name'] ?></div>
                                    <div class="h7 text-muted">@<?php echo $row['name'] ?></div>
                                </div>
                            </div>
                            <div>
                            <?php if($_SESSION['login_id'] == $row['user_id']): ?>
                                <div class="dropdown">
                                    <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                        <a class="dropdown-item edit_forum" data-id="<?php echo $row['id'] ?>" href="javascript:void(0)">Edit</a>
                        <a class="dropdown-item delete_forum" data-id="<?php echo $row['id'] ?>" href="javascript:void(0)">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <div class="text-muted h7 mb-2"> <i class="far fa-clock"></i>10 min ago</div>
                        <a class="card-link"  style="color:#fc7f2d" href="#">
                            <h5 class="card-title"><?php echo ucwords($row['title']) ?></h5>
                        </a>
                        <br>

                        <p class="card-text">
                        <?php echo strip_tags($desc) ?>
                        </p>
                    </div>
                    <br>
                    <div class="card-footer">
                        <button href="#" class="card-link view_topic" data-id="<?php echo $row['id'] ?>"><i class="fas fa-heart"></i><?php echo $count_comments ?> </button>
                        <button href="#" class="card-link view_topic"  data-id="<?php echo $row['id'] ?>"><i class="fa fa-comments"></i> <?php echo $count_comments ?> </button>
                        <!-- <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a> -->
                    </div>
                     
                </div>         
  
                <!-- Post /////-->
            </div>
            
            <!-- <div class="col-md-3">
                <div class="card gedf-card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
                <div class="card gedf-card">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                card's content.</p>
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
            </div> -->
        </div>
        <?php endwhile; ?>   
    </div>

</section>





<script>
    // $('.card.gallery-list').click(function(){
    //     location.href = "index.php?page=view_gallery&id="+$(this).attr('data-id')
    // })
    $('#new_forum').click(function(){
        uni_modal("New Topic","manage_forum.php",'mid-large')
    })
    $('.view_topic').click(function(){
       location.replace('index.php?page=view_forum&id='+$(this).attr('data-id'))
    })
    $('.edit_forum').click(function(){
        uni_modal("Edit Topic","manage_forum.php?id="+$(this).attr('data-id'),'mid-large')
    })
    $('.gallery-img img').click(function(){
        viewer_modal($(this).attr('src'))
    })
     $('.delete_forum').click(function(){
        _conf("Are you sure to delete this Topic?","delete_forum",[$(this).attr('data-id')],'mid-large')
    })

    function delete_forum($id){
        start_load()
        $.ajax({
            url:'admin/ajax.php?action=delete_forum',
            method:'POST',
            data:{id:$id},
            success:function(resp){
                if(resp==1){
                    alert_toast("Data successfully deleted",'success')
                    setTimeout(function(){
                        location.reload()
                    },1500)

                }
            }
        })
    }
    $('#filter').keypress(function(e){
    if(e.which == 13)
        $('#search').trigger('click')
   })
    $('#search').click(function(){
        var txt = $('#filter').val()
        start_load()
        if(txt == ''){
        $('.Forum-list').show()
        end_load()
        return false;
        }
        $('.Forum-list').each(function(){
            var content = "";
            $(this).find(".filter-txt").each(function(){
                content += ' '+$(this).text()
            })
            if((content.toLowerCase()).includes(txt.toLowerCase()) == true){
                $(this).toggle(true)
            }else{
                $(this).toggle(false)
            }
        })
        end_load()
    })

</script>