<?php
# Planet VaSlibre
/* -------------------------------------------------------
Script  bajo los términos y Licencia
GNU GENERAL PUBLIC LICENSE
Ver Terminos en:
http://www.gnu.org/copyleft/gpl.html
Desarrollo y Programacion: Hector A. Mantellini (Xombra)
Diseño: Angel Cruz (Abr4xas)

VASLIBRE
http://vaslibre.org.ve
-------------------------------------------------------- */
include 'include/config.php';
include 'include/core.php';
$expira = time() - $timecache;
$vidafile =  filemtime($urlcache);
VERIFICA_CACHE($urlcache,$expira,$vidafile);
include 'sitemap.php';
echo '
<!DOCTYPE html>
<html lang="'.$lenguaje.'">
 <head>
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="themes/'.$theme.'/css/style.css" rel="stylesheet" type="text/css" />
  <title>'.$nombre_sitio.'</title>';
  META($nombre_sitio,$descripcion,$latitud,$longitud,$urlplanet,$ExpStr,$glus,$activar,$twitter,$wot,$bing,$yahoo,$google,$alexa,$lenguaje,$theme); 
echo '
   <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js">
     </script> <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> 
   <![endif]-->
 </head>
<body>';
flush();
echo
 '<noscript>
	<p>Debe habilitar el uso de Javascript, para poder usar muchas de las funciones del sitio</p>
  </noscript>
  <div class="container">
			  <header>';  
		          include "themes/$theme/header.php";
              echo'
			  </header>
              <section>';
		          include "themes/$theme/content.php";
               echo'
               </section>
			  <footer>';
		           include "themes/$theme/footer.php";
                echo'
			  </footer> 
			  <div id="end">';
	  		    COOKIES();
			    HCARD($latitud,$longitud,$nombre_sitio,$urlplanet,$ciudad,$provincia,$pais);
			    GoogleAnalytics($UA, $dominio);
			  echo'
			  </div>
  </div>
  <script defer type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script defer type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  <script defer type="text/javascript" src="js/js.js"></script>
  <script defer type="text/javascript" src="themes/'.$theme.'/js/custom.js"></script>';
echo '
</body>
</html>';
BUFFER_FIN();
if ($expira >= $vidafile)
  { CREA_CACHE($urlcache,$buffer); }
BORRAR_VARIABLES();
?>
