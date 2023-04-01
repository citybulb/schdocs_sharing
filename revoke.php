<div class="col-lg-6 col-md-6 col-sm-10 mx-auto mb-4">

   <div class="wi-85">

      <div id="noti"></div>

<form id="fgrant" method="post">

      <label>Select Document</label>
                
<select id="grant_file" class="form-control userIn" name="grant_file">

<?php

require("db.php");

$perm = new Database;

$query = "SELECT * FROM up WHERE type = 'In use'";

$getD = $perm->userDataQuery($query);

while ($row = $getD->fetch_assoc()) {

?>
      <option value="<?php echo $row['id']?>" class="userIn"><?php echo $row['name']?></option>

      <?php }?>

</select>

<div class="pt-5">

<h6><strong>Revoke for?</strong></h6>

<input type="checkbox" id="grant_imt" class="cbox" name="grant_dept[]" value="">

<label>IMT</label>

<input type="checkbox" id="grant_css" class="cbox" name="grant_dept[]" value="">

<label>CSS</label>

<input type="checkbox" id="grant_cpt" class="cbox" name="grant_dept[]" value="">

<label>CPT</label>

</div>

<button id="proceed" class="proc mt-3 btn btn-green all-shadow-lg mx-auto">Proceed</button>

</form>

</div>

</div>

<script>

                  $('#fgrant').on('submit', function(e) {

                        e.preventDefault();

                        $('#proceed').css("opacity","0.3");

                        $('#proceed').html("<i class='fas fa-spinner fa-spin'></i> Processing");

                        var imt = $('#grant_imt');

                        var css = $('#grant_css');

                        var cpt = $('#grant_cpt');

                        var id = $('#grant_file').val();

                        if(imt.is(':checked')) {

                              imt.val('IMT');
                        }

                        if(css.is(':checked')) {

                              css.val('CSS');
                        }

                        if(cpt.is(':checked')) {

                              cpt.val('CPT');
                        }


                        $.ajax({

                              url: "rperm.php",

                              type: "POST",

                              data: {id: id, imt: imt.val(), css: css.val(), cpt: cpt.val()},

                              success: function(html) {

                                    setTimeout(function() {

                                    $('#proceed').css("opacity","1");

                                    $('#proceed').html("Proceed");

                                    $('#noti').html(html).show().fadeOut(2000);

                                    imt.val("");

                                    css.val("");

                                    cpt.val("");

                                    $('#fgrant')[0].reset();

                              }, 2000);

                              }
                        })
                  })
</script>