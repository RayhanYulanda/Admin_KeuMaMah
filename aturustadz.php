<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();

    if(!isset($_SESSION['id_admin'])){
        header("location:aturustadz.php");
    }
    $id_admin=$_SESSION['id_admin']
    ?>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Atur Ustadz</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/heroic-features.css" rel="stylesheet">
        <link href="css/style_admin.css" rel="stylesheet">

        <!-- Plugin JavaScript -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <script src="js/classie.js"></script>
        <script src="js/cbpAnimatedHeader.js"></script>

        <!-- Contact Form JavaScript -->
        <script src="js/jqBootstrapValidation.js"></script>
        <script src="js/contact_me.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/agency.js"></script>	

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Panel Admin</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Page Content -->
        <div class="container">

            <!-- Jumbotron Header -->
            <header class="jumbotron hero-spacer">
                <center><h2>Tambah Ustadz</h2></center>
                <form class="form-horizontal" action='' method="POST">
                    <fieldset>
                        <div id="legend">
                            <legend class="">Register</legend>
                        </div>
                        <div class="control-group">
                            <!-- Username -->
                            <label class="control-label"  for="username">Username</label>
                            <div class="controls">
                                <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
                                <p class="help-block">Username can contain any letters or numbers, without spaces</p>
                            </div>
                        </div>

                        <div class="control-group">
                            <!-- E-mail -->
                            <label class="control-label" for="email">E-mail</label>
                            <div class="controls">
                                <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
                                <p class="help-block">Please provide your E-mail</p>
                            </div>
                        </div>

                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" for="password">Password</label>
                            <div class="controls">
                                <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
                                <p class="help-block">Password should be at least 4 characters</p>
                            </div>
                        </div>

                        <div class="control-group">
                            <!-- Password -->
                            <label class="control-label"  for="password_confirm">Password (Confirm)</label>
                            <div class="controls">
                                <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge">
                                <p class="help-block">Please confirm password</p>
                            </div>
                        </div>

                        <div class="control-group">
                            <!-- Button -->
                            <div class="controls">
                                <button class="btn btn-success">Register</button>
                            </div>
                        </div>
                    </fieldset>
                </form>

                <center><a class="btn btn-primary btn-large">Tambah Ustadz</a></center>
            </header>

            <hr>

            <!-- Title -->
            <div class="row">
                <div class="col-lg-12">
                    <h3>List Ustadz</h3>
                </div>
            </div>
            <!-- /.row -->

            <!-- Page Features -->
            <div class="container bootstrap snippet">									
                <div class="row">
                    <?php
        include "koneksi.php";

    $sql_ = "SELECT * FROM ustadz";
    $resultt = mysqli_query($con,$sql_);

    if($resultt === FALSE) { 
        die(mysql_error()); // error handling
    }
                    ?>

                    <hr class="style13">

                    <?php
                    while ($roww = mysqli_fetch_array ($resultt)){
                        echo ("<div class='col-sm-3'>");
                        echo ("<div class='tile-progress tile-cyan'>");
                        echo ("<div class='tile-header'>");
                        echo ("<div class='widget-user-image'>");
                        echo ("<img class='img-circle' src='img/ustadz/$roww[foto]' width='20' height='20' alt='User Avatar'>");
                        echo ("</div></br></br></br>");
                        echo ("<h4>$roww[nama]</h4>");
                        echo ("<h4>$roww[email]</h4>");
                        echo ("<h5>$roww[nohp]</h5>");
                        echo ("</div>");
                        echo ("<div class='tile-progressbar'>");
                        echo ("</div>");
                        echo ("<div class='tile-footer'>");
                        echo ("<center><a href='#' class='open_modal' id='$roww[id]'><button class='btn btn-info'><span class='fa fa-user'></span> Edit Profile</a></button>");
                        echo ("<a href='aturustadz_hapus.php?id=$roww[id]' onclick =\"return confirm('Apakah kamu yakin ingin mendelete data ini?')\"><button type='button' class='btn btn-danger'>Delete</a><span class='glyphicon glyphicon-trash'></span></button></center>");
                        echo ("</div>");
                        echo ("</div>");
                        echo ("</div>");
                    }
                    ?>
                </div>

            </div>
            <!-- /.row -->

            <hr>

            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright &copy; Your Website 2014</p>
                    </div>
                </div>
            </footer>

        </div>
        <!-- /.container -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Modal Popup untuk Edit--> 
        <div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>

        <!-- Javascript untuk popup modal Edit--> 
        <script type="text/javascript">
            $(document).ready(function () {
                $(".open_modal").click(function(e) {
                    var m = $(this).attr("id");
                    $.ajax({
                        url: "aturustadz_modal.php",
                        type: "GET",
                        success: function (ajaxData){
                            $("#ModalEdit").html(ajaxData);
                            $("#ModalEdit").modal('show',{backdrop: 'true'});
                        }
                    });
                });
            });
        </script>    

    </body>

</html>
