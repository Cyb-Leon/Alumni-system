<?php include 'admin/db_connect.php' ?>
<?php
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM forum_topics where id=".$_GET['id'])->fetch_array();
	foreach($qry as $k =>$v){
		$$k = $v;
	}
}

?>
<style>
	body {
		height: 100%;
  margin: 0;
  background: gray;
     background:black;
      background: grey;
}

.card {
    border: none;
    position: relative;
    overflow: hidden;
    border-radius: 8px;
    cursor: pointer
}

.card:before {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    width: 4px;
    height: 100%;
    background-color: grey;
    transform: scaleY(1);
    transition: all 0.5s;
    transform-origin: bottom
}

.card:after {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    width: 4px;
    height: 100%;
    background-color: orange;
    transform: scaleY(0);
    transition: all 0.5s;
    transform-origin: bottom
}

.card:hover::after {
    transform: scaleY(1)
}

.fonts {
    font-size: 11px
}

.social-list {
    display: flex;
    list-style: none;
    justify-content: center;
    padding: 0
}

.social-list li {
    padding: 10px;
    color: #8E24AA;
    font-size: 19px
}

.buttons button:nth-child(1) {
    border: 1px solid #8E24AA !important;
    color: #8E24AA;
    height: 40px
}

.buttons button:nth-child(1):hover {
    border: 1px solid #8E24AA !important;
    color: #fff;
    height: 40px;
    background-color: grey
}

.buttons button:nth-child(2) {
    border: 1px solid #8E24AA !important;
    background-color: black;
    color: #fff;
    height: 40px
}
</style>
<div class="">
<?php
						$fpath = 'admin/assets/uploads';
						$alumni = $conn->query("SELECT firstname, avatar, loginstatus, Concat(lastname,', ',firstname) as names FROM alumnus_bio");
						 $row = $alumni->fetch_assoc();
						?>
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            <div class="card p-3 py-4">
                <div class="text-center"> <img src="<?php echo $fpath . '/' . $row['avatar'] ?>" width="100" class="rounded-circle"> </div>
                <div class="text-center mt-3" > <span class="bg-secondary p-1 px-4 rounded text-white">Graduate</span>
                    <h5 class="mt-2 mb-0">Mike Williams</h5> <span>Software Developer</span>
                    <div class="px-4 mt-1">
                        <p class="fonts" style="color: #f37521; font-weight: bold;">Software Development trainee and a graduate </p>
                    </div>
                    <div class="buttons"> <button class="text-light btn px-4">Message</button></div>
                </div>
            </div>
        </div>
    </div>

</div>
<div id="modal-form-edit" class="modal hide" tabindex="-1">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="blue bigger">Products</h4>
</div>

<div class="modal-body overflow-visible">
    <div class="row-fluid">

        <div class="vspace"></div>

        <div class="span7">
            <div class="control-group">
                <label class="control-label" for="form-field-username">Product Name</label>

                <div class="controls">
                    <input type="text" name="product_name" placeholder="Product Name" value="" id="product_name" /> 
                </div>
            </div>

<script>
	$('.text-jqte').jqte();
	$('#manage-forum').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'admin/ajax.php?action=save_forum',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp == 1){
					alert_toast("Data successfully saved.",'success')
					setTimeout(function(){
						location.reload()
					},1000)
				}
			}
		})
	})
</script>