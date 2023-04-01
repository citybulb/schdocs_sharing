<?php

require("inc/config/ajaxload.php");

?>

<?php if($userInfo['type'] == 'Staff') {

$access = $userInfo['dept'];

$query = "SELECT * FROM up WHERE type = 'In use' ORDER BY id DESC LIMIT 16";

$use = $data->userDataQuery($query);

?>


<?php while ($row = $use->fetch_assoc()) { 

$img_dir = "docs/".$row['name'];

$img_ext = strtolower(pathinfo($img_dir,PATHINFO_EXTENSION));

?>

<div class="col-lg-3 col-md-3 col-sm-10 mb-4">

                    <div class="wi-85">

                        <?php 

                        if($img_ext == "pdf") {?>

                    <div id="prev" class="img-up p-3">

                    <img src="src/icons/pdf.png" class="block mx-auto" width="70px" height="70px">

                </div>

                <?php }

                else if($img_ext == "pptx" || $img_ext == "ppt") {?>

                    <div id="prev" class="img-up p-3">

                    <img src="src/icons/ppt.png" class="block mx-auto" width="70px" height="70px">

                </div>

                <?php }

                else if($img_ext == "doc" || $img_ext == "docx") {?>

                    <div id="prev" class="img-up p-3">

                    <img src="src/icons/word.png" class="block mx-auto" width="70px" height="70px">

                </div>

                <?php }?>


                    <div id="dow" class="img-up-h">

                    <button id="<?php echo $row['id']?>" class="icon-d btn btn-dark"><i class="fa fa-trash-alt"></i></button>

                    <button id="download" class="icon-do btn btn-dark"><a href="docs/<?php echo $row['name']?>"><i class="fa fa-cloud-download-alt"></i></a></button>


                </div>

                    <div class="b-r shadow">

                    	<?php if(strlen($row['name']) > 25) { ?> 

                    <span></i> <?php echo substr($row['name'], 0, 22)?>...</span>

                <?php }

                else { ?>

                	<span></i> <?php echo $row['name']?></span>

                <?php }?>

                    <br>

                    <small class="text-muted">Uploaded on <?php echo date('j-F h:i:a', strtotime($row['time']))?></small>

                    </div>

                </div>

            </div>

            <script>

            	$(".img-up").on("mouseover", function() {

            		var s = this.nextElementSibling;

            		this.style.display = "none";

            		s.style.display = "block";

            	});

            	$(".img-up-h").on("mouseleave", function() {

            		var y = this.previousElementSibling;

            		this.style.display = "none";

            		y.style.display = "block";

            	});

            	$(document).ready(function() {

            	$('.icon-d').on('click', function() {

            		var ID = $(this).attr('id');

            		$.ajax({

            			url: "trash.php",

            			type: "GET",

            			data: "id="+ID,

            			success: function(html) {

            				$('#add_v').load("ajaxl.php");
            			}
            		})
            	})

            });

            </script>

            <?php } ?>

        <?php }

        else {

$access = $userInfo['dept'];

$query = "SELECT * FROM up WHERE type = 'In use' && access LIKE '%$access%' ORDER BY id DESC LIMIT 16";

$aff = $data->rowsAffected($query);

$use = $data->userDataQuery($query);

        ?>

        <?php if($aff == false) {?>

            <div class="col-lg-8 col-md-8 col-sm-10 mt-3 mx-auto">

            <h6 class="text-center"><strong>No document have been shared with your Department.</strong></h6>

        <?php }

        else {?>

            <?php while ($row = $use->fetch_assoc()) {

$img_dir = "docs/".$row['name'];

$img_ext = strtolower(pathinfo($img_dir,PATHINFO_EXTENSION));

?>

<div class="col-lg-3 col-md-3 col-sm-10 mb-4">

                    <div class="wi-85">

                    <?php 

                        if($img_ext == "pdf") {?>

                    <div id="prev" class="img-up p-3">

                    <img src="src/icons/pdf.png" class="block mx-auto" width="70px" height="70px">

                </div>

                <?php }

                else if($img_ext == "pptx" || $img_ext == "ppt") {?>

                    <div id="prev" class="img-up p-3">

                    <img src="src/icons/ppt.png" class="block mx-auto" width="70px" height="70px">

                </div>

                <?php }

                else if($img_ext == "doc" || $img_ext == "docx") {?>

                    <div id="prev" class="img-up p-3">

                    <img src="src/icons/word.png" class="block mx-auto" width="70px" height="70px">

                </div>

                <?php }?>
                
                    <div id="dow" class="img-up-h">

                    <button id="download" class="mx-auto icon-do btn btn-dark"><a href="docs/<?php echo $row['name']?>"><i class="fa fa-cloud-download-alt"></i></a></button>


                </div>

                    <div class="b-r all-shadow-lg">

                        <?php if(strlen($row['name']) > 25) { ?> 

                    <span> <?php echo substr($row['name'], 0, 22)?>...</span>

                <?php }

                else { ?>

                    <span> <?php echo $row['name']?></span>

                <?php }?>

                    <br>

                    <small class="text-muted">Uploaded on <?php echo date('j-F h:i:a', strtotime($row['time']))?></small>

                    </div>

                </div>

            </div>

            <script>

                $(".img-up").on("mouseover", function() {

                    var s = this.nextElementSibling;

                    this.style.display = "none";

                    s.style.display = "block";

                });

                $(".img-up-h").on("mouseleave", function() {

                    var y = this.previousElementSibling;

                    this.style.display = "none";

                    y.style.display = "block";

                });

            </script>

            <style>

                .icon-do {

                    position: unset !important;

                    top: unset !important;

                    left: unset !important;
                }

            </style>

            <?php } ?>

            <?php }?>

            <?php }?>