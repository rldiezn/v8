<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>.:Empresa :.</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    
    <!--CSS STYLE-->
    <link rel="stylesheet" href="css/bootstrap.css">    
    <link rel="stylesheet" href="css/iconos_css.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/templatemo_style.css">	

    <style type="text/css" title="currentStyle">
    @import "js/plugPaginador/media/css/demo_page.css";
    @import "js/plugPaginador/media/css/demo_table_jui.css";
    @import "js/plugPaginador/media/css/themes/ui-lightness/jquery-ui-1.8.4.custom.css";

    </style>




<?php 
    include("php/function.php");
    $detalle = admin_contenido("vocho");
   
    $titulo_head = buscar_admin_contenido($detalle,  "titulo-page");
    $imagen = buscar_admin_contenido($detalle,  "imagen-1");
    $food = buscar_admin_contenido($detalle,  "food-1");
    $nombreForm1 = buscar_admin_contenido($detalle,  "titulo-form-1");
    $nombreForm2 = buscar_admin_contenido($detalle,  "titulo-form-2");

?>

</head>

<body>
   
    <div id="front">
        <div class="site-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <div >
                            <h1>
                            	<a rel="nofollow"><?php echo $titulo_head; ?></a>
                            </h1>
                        </div> <!-- /.logo -->
                    </div> <!-- /.col-md-4 -->
                    <div class="col-md-8 col-sm-6 col-xs-6">
                        <a href="#" class="toggle-menu"><i class="fa fa-bars"></i></a>
                        <div class="main-menu">
                            <ul>
                                <li><a class="" href="#front">INICIO</a></li>
                                <li><a class="current" href="#services">CONTACTO</a></li>
                            </ul>
                        </div> <!-- /.main-menu -->
                    </div> <!-- /.col-md-8 -->
                </div> <!-- /.row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="responsive">
                            <div style="display: none;" class="main-menu">
                                <ul>
                                    <li><a class="" href="#front">INICIO</a></li>
                                    <li><a class="" href="#services">CONTACTO</a></li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /.container -->
        </div> <!-- /.site-header -->
    </div> <!-- /#front -->

    <div class="site-slider">
        <div style="max-width: 100%;" class="bx-wrapper">
        <div style="width: 100%; overflow: hidden; position: relative; height: 532px;" class="bx-viewport">
        <ul style="width: auto; position: relative;" class="bxslider">
            <li style="float: none; list-style: none outside none; position: absolute; width: 1288px; z-index: 50; display: block;">
                <img src="images/background.jpg" alt="slider image 1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <div class="slider-caption">
                                <h2>s</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
           
        </ul>
        </div>
        	
        </div> <!-- /.bxslider -->

    </div> <!-- /.site-slider -->

    <div id="services" class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div id="module-msj"><h1 class="section-title"><?php echo $nombreForm1; ?></h1></div>
                </div> <!-- /.col-md-12 -->
            </div> <!-- /.row -->
            <div class="row" style="margin-left: 32%;">
                <form id="form_bocho" name="form_bocho" class="formulario" action="#" method="post">
                    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                    <thead>
                    <tr >
                    <th >
                    #   
                    </th>
                    <th>
                    Acción 
                    </th>
                    <th>
                    Nombre Vendedor 
                    </th>
                    <th>
                    Telefono
                    </th> 
                    <th>
                    Vehiculo
                    </th>    
                    <th>
                    foto
                    </th>
                    </tr>
                    <tfoot>
                    <tr >
                    <th >
                    #   
                    </th>
                    <th>
                    Acción 
                    </th>
                    <th>
                    Nombre Vendedor 
                    </th>
                    <th>
                    Telefono
                    </th> 
                    <th>
                    Vehiculo
                    </th>    
                    <th>
                    foto
                    </th>
                    </tr>
                    </tfoot>
                    </thead>

                    <tr class="odd gradeC">
                    <td >
                    1
                    </td>
                    <td >
                    2
                    </td>
                    <td >
                    nombre
                    </td>
                    <td >
                    nombre
                    </td>
                    <td >
                    nombre
                    </td>
                    <td >
                    456
                    </td>  

                    </tr>
                    </table>
                </form> 
              
            </div> <!-- /.row -->

            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /#services -->

    <div id="contact" class="content-section" style="margin-top:40px">
        <div class="container">
        <br><br><br><br><br><br><br><br><br>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div id="module-msj-venderdor"><h1 class="section-title"><?php echo $nombreForm2; ?></h1></div> 
                </div> <!-- /.col-md-12 -->
            </div> <!-- /.row -->
                <div class="row" style="margin-left: 32%;">
                <form id="form_vendedor" name="form_vendedor" action="#" method="post">
                <div id="hiddenVal">
                    <input type="hidden" id="id_bocho" name="id_bocho" />
                </div>
                     <div  class="col-md-6 col-sm-6">
                        <div class="row contact-form">
                            <fieldset class="col-md-12 ">
                                <input id="inpNombre" name="inpNombre" placeholder="Nombre" type="text">
                                <span id="inpNombre-id" class="callout border-callout error" >
                                   
                                </span>
                            </fieldset>
                            <fieldset class="col-md-12">
                                <input id="inpCorreo" name="inpCorreo" placeholder="Correo" type="text">
                                <span id="inpCorreo-id" class="callout border-callout error" >
                                    
                                </span>                                
                            </fieldset>
                            <fieldset class="col-md-12">
                                <input id="inpTelefono" name="inpTelefono" placeholder="Tlf Contacto" type="text">
                                <span id="inpTelefono-id" class="callout border-callout error">
                                    
                                </span>                                
                            </fieldset>
                            <fieldset class="col-md-12">
                                <input type="button" id="btnVendedor" class="btn btn-primary btn-lg"  role="button" value="GUARDAR"/>

                            </fieldset>
                        </div> <!-- /.contact-form -->
                    
                </form>        
                    </div> <!-- /.col-md-6 -->
            </div> <!-- /.row -->       
        </div> <!-- /.container -->
    </div> <!-- /#services -->


    <div class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <span>Copyright © <a href="#"><?php echo $food; ?></a>  </span>
                </div> <!-- /.col-md-6 -->
                <div class="col-md-6 col-sm-6">
                    <ul class="social">
                        <li><a href="#" class="fa fa-facebook"></a></li>
                        <li><a href="#" class="fa fa-twitter"></a></li>
                        <li><a href="#" class="fa fa-instagram"></a></li>
                        <li><a href="#" class="fa fa-linkedin"></a></li>
                        <li><a href="#" class="fa fa-rss"></a></li>
                    </ul>
                </div> <!-- /.col-md-6 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.site-footer -->
    <script src="js/jquery-1.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main_002.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bocho.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/bootstrap-dialog.js"></script>
    <script type="text/javascript" language="javascript" src="js/plugPaginador/media/js/jquery.dataTables.js"></script>
</body>
</html>