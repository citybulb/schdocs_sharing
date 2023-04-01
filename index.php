<?php 

require("inc/config/auth.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SCH DOCS"> 
    <meta name="keywords" content="SCH DOCS">
    
    <title>SCH DOCS</title>

    <link rel="stylesheet" href="src/css/style.css">
    <script src="src/js/jquery.min.js"></script>
    <script src="src/js/bootstrap.min.js"></script>
    <script src="src/js/slick.min.js"></script>
    <script src="src/js/carousel.js"></script>
    
</head>

<?php if($userInfo['type'] == 'Staff') {?>

<body>

    <div class="b-overlay" style="display: none">

        <div>

        <div class="b-load">

        </div>

        </div>

    </div>

 <!-- Header -->

 <div class="navbar header">

    <div class="container-fluid">

        <a class="navbar-brand" href="#">

            <span>SCH DOCS</span>

          </a>

    <div class="s-i">

         <form method="get">

    <div class="input-group">

        <div class="input-group-prepend">

            <button class="btn btn-white"><i class="fa fa-search"></i></button>

        </div>

    <input id="search" type="text" class="form-control userIn" placeholder="Search Documents">

</div>

</form>

</div>



<div class="img-c"><h4 class="text-center mt-3"><strong><?php echo substr($userInfo['name'], 0, 1)?></strong></h4></div>



</div>

</div>

<!-- Navigation and main content -->

    <div class="b-cont">

<nav class="sidebar all-shadow-lg">

<div class="mt-4 pt-3">

    <form id="upload" method="post">

    <div id="vfy" class="mt-2 upload-btn-wrapper">

    <button id="up" class="btn btn-gr mx-auto mb-4 all-shadow-lg"><i class="ml-2 fa fa-plus"></i> <span class="mr-2">Upload</span></button>

    <input type="file" name="fid" id="fid" name="file" accept=".ppt,.pdf,.doc,.pptx">

</div>

</form>

    <a id="mydocs" class="active-t" href="#drive"><i class="fab fa-google-drive mr-2"></i> My Document</a>

    <a id="recent" href="#recent"><i class="fa fa-clock mr-2"></i> Recent Uploads</a>

    <a id="trash" href="#thrash"><i class="fa fa-trash-alt mr-2"></i> Trash</a>

    <a id="grant" class="drp-btn" href="#grant"><i id="i_c" class="fa fa-check-circle mr-2"></i> Grant Access</a>

     <a id="logout" href="logout.php"><i class="fas fa-sign-out-alt mr-2"></i> Logout</a>

</div>

    </nav>

    <div class="oside">

        <div class="container">

            <div id="data" class="row pt-4">

                <div class="col-lg-6 col-md-6 col-sm-10 mx-auto">

                   <div class="wi-70 mall bg-gr p-2 all-shadow">

                    <h6 class="text-center txt-u mt-2"><i class="fa fa-file-alt"></i> Total Documents</h6>

                    <h4 id="get_docs" class="text-center"><?php $query = "SELECT * FROM up"; echo $getData->numRows($query)?></h4>

                </div>

                </div>

                <div class="col-lg-6 col-md-6 col-sm-10 mx-auto">

                   <div class="wi-85 mall bg-r p-2 all-shadow">

                   <h6 class="text-center txt-u mt-2"><i class="fa fa-star"></i> Your Dept. Documents</h6>

                    <h4 id="dept_docs" class="text-center">
                        
                        <?php

                    $access = $userInfo['dept'];

                    $query = "SELECT * FROM up WHERE type = 'In use' && access LIKE '%$access%'";

                    echo $getData->numRows($query);

                    ?>

                    </h4>

                </div>

                </div>

            </div>

            <h6 id="t-ap" class="pt-5">My Document <i class="fa fa-caret-down"></i></h6>

            <div id="add_v" class="row o-f pt-2">

                <script type="text/javascript">

                    cur = "docs";

                    $('#add_v').load("ajaxl.php");

                </script>      

<!-- End parent divs -->

</div>

</div>

</div>

</div>

<script>

        $('#upload').on('change',function(e) {

            e.preventDefault();

            $('.b-overlay').show();

            $.ajax({

url: "aupload.php",

type: "POST",

data:  new FormData(this),

contentType: false,

cache: false,

processData: false,

success: function(html){

setTimeout(function() {

$('.b-overlay').fadeOut(2000);

$('#add_v').load("ajaxl.php");

$('#fid')[0].reset();

}, 2000);

},

});

 });

$('#trash').click(function() {

    cur = "trash";

    $('#t-ap').html("Trash <i class='fa fa-caret-down'></i>");

    $('#add_v').load("trash.php");

     $(this).addClass("active-t");

    $('#mydocs').removeClass("active-t");

    $('#recent').removeClass("active-t");

    $('#grant').removeClass("active-t");


});

$('#recent').click(function() {

    cur = "recent";

    $('#t-ap').html("Recent <i class='fa fa-caret-down'></i>");

    $('#add_v').load("recent.php");

    $(this).addClass("active-t");

    $('#mydocs').removeClass("active-t");

    $('#trash').removeClass("active-t");

    $('#grant').removeClass("active-t");
});

$('#mydocs').click(function() {

    cur = "docs";

    $('#t-ap').html("My Document <i class='fa fa-caret-down'></i>");

    $('#add_v').load("ajaxl.php");

    $(this).addClass("active-t");

    $('#recent').removeClass("active-t");

    $('#trash').removeClass("active-t");

    $('#grant').removeClass("active-t");
});

$('#grant').click(function() {

    cur = "grant";

    $('#t-ap').html("Permissions - Grant <i class='fa fa-caret-down'></i>");

    $('#add_v').load("perms.php");

    $(this).addClass("active-t");

    $('#recent').removeClass("active-t");

    $('#trash').removeClass("active-t");

    $('#mydocs').removeClass("active-t");
});

setInterval(function() {

    $.ajax({

        url: "get_docs.php",

        type: "GET",

        success: function(response) {

            $('#get_docs').html(response);
        }
    })

}, 1000);

setInterval(function() {

    $.ajax({

        url: "dept_docs.php",

        type: "GET",

        success: function(response) {

            $('#dept_docs').html(response);
        }
    })

}, 1000);

$('#search').on('keyup', function() {

    $('#t-ap').html("Search <i class='fa fa-caret-down'></i>");

        if(this.value == "") {

            if(cur == "trash") {

                $('#t-ap').html("Trash <i class='fa fa-caret-down'></i>");

                $('#add_v').load("trash.php");
            }

            else if(cur == "recent") {

                $('#t-ap').html("Recent <i class='fa fa-caret-down'></i>");

                $('#add_v').load("recent.php");
            }

            else if(cur == "docs") {

                $('#t-ap').html("My Document <i class='fa fa-caret-down'></i>");

                $('#add_v').load("ajaxl.php");
            }

            else if(cur == "grant") {

                $('#t-ap').html("Permissions - Grant <i class='fa fa-caret-down'></i>");

                $('#add_v').load("perms.php");
            }

        }

        else {

            var q = $(this).val();

            $.ajax({

                url: "search.php",

                type: "GET",

                data: "q="+q,

                success: function(html) {

                    $('#add_v').html(html);
                }
            })
        }
    })

</script>

</body>

<?php }

else {?>

    <body>

 <!-- Header -->

 <div class="navbar header">

    <div class="container-fluid">

        <a class="navbar-brand" href="#">

            <span>SCH DOCS</span>

          </a>

    <div class="s-i">

    <div class="input-group">

        <div class="input-group-prepend">

            <button class="btn btn-white"><i class="fa fa-search"></i></button>

        </div>

    <input type="text" class="form-control userIn" placeholder="Search Documents">

</div>

</div>

<div class="img-c"><h4 class="text-center mt-3"><strong><?php echo substr($userInfo['name'], 0, 1)?></strong></h4></div>



</div>

</div>

<!-- Navigation and main content -->

    <div class="b-cont">

<nav class="sidebar all-shadow-lg">

<div class="mt-4 pt-3">

    <a id="mydocs" class="active-t" href="#drive"><i class="fab fa-google-drive mr-2"></i> Shared With Me</a>

    <a id="recent" href="#drive"><i class="fa fa-clock mr-2"></i> Recent Shares</a>

     <a id="logout" href="logout.php"><i class="fas fa-sign-out-alt mr-2"></i> Logout</a>

</div>

    </nav>

    <div class="oside">

        <div class="container">

            <div id="data" class="row pt-4">

                <div class="col-lg-6 col-md-6 col-sm-10 mx-auto">

                   <div class="wi-70 mall bg-gr p-2 all-shadow">

                    <h6 class="text-center txt-u mt-2"><i class="fa fa-file-alt"></i> All Documents</h6>

                    <h4 id="get_docs" class="text-center"><?php $query = "SELECT * FROM up"; echo $getData->numRows($query)?></h4>

                </div>

                </div>

                <div class="col-lg-6 col-md-6 col-sm-10 mx-auto">

                   <div class="wi-85 mall bg-r p-2 all-shadow">

                   <h6 class="text-center txt-u mt-2"><i class="fa fa-star"></i> Your Dept. Documents</h6>

                    <h4 id="dept_docs" class="text-center">

                    <?php

                    $access = $userInfo['dept'];

                    $query = "SELECT * FROM up WHERE type = 'In use' && access LIKE '%$access%'";

                    echo $getData->numRows($query);

                    ?>

                    </h4>

                </div>

                </div>

            </div>

            <h6 id="t-ap" class="pt-5">Shared With Me <i class="fa fa-caret-down"></i></h6>

            <div id="add_v" class="row o-f pt-2">

                <script type="text/javascript">

                    $('#add_v').load("ajaxl.php");

                </script>      

<!-- End parent divs -->

</div>

</div>

</div>

</div>

<script>

$('#recent').click(function() {

    $('#t-ap').html("Recent Share<i class='fa fa-caret-down'></i>");

    $('#add_v').load("recent.php");

    $(this).addClass("active-t");

    $('#mydocs').removeClass("active-t");

    $('#trash').removeClass("active-t");
});

$('#mydocs').click(function() {

    $('#t-ap').html("Shared With Me <i class='fa fa-caret-down'></i>");

    $('#add_v').load("ajaxl.php");

    $(this).addClass("active-t");

    $('#recent').removeClass("active-t");

    $('#trash').removeClass("active-t");
});

setInterval(function() {

    $.ajax({

        url: "get_docs.php",

        type: "GET",

        success: function(response) {

            $('#get_docs').html(response);
        }
    })

}, 1000);

setInterval(function() {

    $.ajax({

        url: "dept_docs.php",

        type: "GET",

        success: function(response) {

            $('#dept_docs').html(response);
        }
    })

}, 1000);

</script>

</body>

<?php }?>