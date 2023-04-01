<?php

require("inc/config/db.php");

if(isset($_GET['id'])) {

	$del = new Database;

	$param_value_array = $_GET['id'];

	if($send = $del->trashQ(array($param_value_array)) == true) {

		return true;
	}

}

else {

?>

<?php

$data = new Database;

$query = "SELECT * FROM up WHERE type = 'trash' ORDER BY id DESC";

$count = $data->rowsAffected($query);

$use = $data->userDataQuery($query);

?>

<?php if($count < 1) {

    ?>

    <div class="container">

        <div class="row">

            <div class="col-lg-6 col-md-6 col-sm-12 mx-auto">

    <h6 class="mt-3 pt-2 text-center"><strong>Trash is currently empty</strong></h6>

</div>

</div>

</div>

    <?php 

}

else { ?>

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

                    <button id="<?php echo $row['id']?>" class="icon-do btn btn-dark"><i class="fa fa-undo"></i></button>


                </div>

                    <div class="b-r all-shadow-lg">

                    <?php if(strlen($row['name']) > 25) { ?> 

                    <span><i class="fa fa-file-pdf"></i> <?php echo substr($row['name'], 0, 22)?>...</span>

                <?php }

                else { ?>

                    <span><i class="fa fa-file-pdf"></i> <?php echo $row['name']?></span>

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

            		var s = this.previousElementSibling;

            		s.style.display = "block";

            		this.style.display = "none";

            	});

            	$(document).ready(function() {

            	$('.icon-d').on('click', function() {

            		var ID = $(this).attr('id');

            		$.ajax({

            			url: "delete.php",

            			type: "GET",

            			data: "id="+ID,

            			success: function(html) {

            				$('#add_v').load("trash.php");
            			}
            		})
            	})

            });

            $(document).ready(function() {

    $('.icon-do').on('click', function() {

    var ID = $(this).attr('id');

    $.ajax({

        url: "restore.php",

        type: "GET",

        data: "id="+ID,

        success: function(html) {

            $('#add_v').load("trash.php");
        }
    })
})

});

            </script>

            <?php } ?>

            <?php } ?>

            <?php }?>