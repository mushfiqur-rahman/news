<?php
session_start();

$cn = mysqli_connect("localhost", "root", "", "dbus_002");

function ms($value)
{
	global $cn;
	return mysqli_real_escape_string($cn, $value);
}

include('component/accountManager.php');

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Prothom Alo</title>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
 <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="css/style.css"/>
    <script src="ckeditor/ckeditor.js"></script>
    <script src="ckeditor/samples/js/sample.js"></script>
<!--    <link rel="stylesheet" href="ckeditor/samples/css/samples.css">-->
<!--    <link rel="stylesheet" href="ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">-->
</head>
<body>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class=" col-md-12 col-sm-4 text-center">
                <div class="header-image">
                    <h1>News</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main">
	<div class="menu ">
		<?php include('component/menu.php'); ?>
	</div>
	<div class="content ">
		<?php
		include('component/controller.php');
		?>
	</div>
</div>


<div class="container-fluid bg-black ">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 text-center">
                <footer>
                    <p>&copy; All Rights Reserved 2018</p>
                </footer>
            </div>
        </div>
    </div>
</div>

<!------Back To Top Button Start----->
<div>
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top"
       role="button" title="Click to return on the top page"
       data-toggle="tooltip" data-placement="left">
        <span class="glyphicon glyphicon-chevron-up"><i class="fal fa-chevron-up"></i><img src="img/top.png" alt=""></span></a>
</div>

<script src="js/jquery-3.2.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>