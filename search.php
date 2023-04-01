<?php

require("inc/config/search.php");

if($userInfo['type'] == 'Staff') {

if ($rcount == 0) {

    ?>

    <div class="col-lg-6 mx-auto">

<h6 class="text-center"><i class="fa fa-exclamation-triangle"></i> <strong>Oops! Your search is invalid.</strong></h6>

</div>

<?php }

else { ?>

<?php while ($use = $run->fetch_assoc()) {

$img_dir = "docs/".$use['name'];

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

                    <button id="<?php echo $use['id']?>" class="icon-d btn btn-dark"><i class="fa fa-trash-alt"></i></button>

                    <button id="download" class="icon-do btn btn-dark"><a href="docs/<?php echo $use['name']?>"><i class="fa fa-cloud-download-alt"></i></a></button>


                </div>

                    <div class="b-r all-shadow-lg">

                    	<?php if(strlen($use['name']) > 25) { ?> 

                    <span><i class="fa fa-file-pdf"></i> <?php echo substr($use['name'], 0, 22)?>...</span>

                <?php }

                else { ?>

                	<span><i class="fa fa-file-pdf"></i> <?php echo $use['name']?></span>

                <?php }?>

                    <br>

                    <small class="text-muted">Uploaded on <?php echo date('j-F h:i:a', strtotime($use['time']))?></small>

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

        <?php }?>

    <?php }

}?>


    