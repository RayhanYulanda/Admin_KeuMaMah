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
                <!--<center><div id="legend"><h2><legend class="">Tambah Ustadz</legend></h2></div></center>-->
                <div class="container">
                    <div class="row">
                        <legend><center><h2>Tambah Ustadz</h2></center></legend>

                        <form class="form-horizontal" action="aturustadz_tambah.php" method="POST">
                            <fieldset>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="textinput">Nama</label>  
                                    <div class="col-md-4">
                                        <input id="textinput" name="nama" class="form-control input-md" type="text">
                                        <span class="help-block"> </span>  
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="textinput">Email</label>  
                                    <div class="col-md-4">
                                        <input id="textinput" name="email" class="form-control input-md" type="text">
                                        <span class="help-block"> </span>  
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="textinput">Password</label>  
                                    <div class="col-md-4">
                                        <input id="textinput" name="password" class="form-control input-md" type="password">
                                        <span class="help-block"> </span>  
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="textinput">No HP</label>  
                                    <div class="col-md-4">
                                        <input id="textinput" name="nohp" class="form-control input-md" required="" type="text">
                                        <span class="help-block"> </span>  
                                    </div>
                                </div>
                                
                                <!-- Button -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="singlebutton"> </label>
                                    <div class="col-md-4">
                                        <button type="submit" id="singlebutton" name="singlebutton" class="btn btn-primary">Tambah Ustadz</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
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
                        echo ("<img class='img-circle' src='img/$roww[foto]' width='20' height='20' alt='User Avatar'>");
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
