<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Control de tiempos</title>
    <link rel="stylesheet" href="css/control_tiempos.css">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/fecha.js"></script>
    <script type="text/javascript" src="js/fecha.js"></script>


</head>
<body>
    <section class="containertitulo">
      <div class="itemtitulo">
        <div class="mifecha">
        <div id="ano" class="ano"></div>
        <div id="dia" class="dia"></div>
        <div id="mes" class="mes"></div>
        </div>
      </div>
      <div class="itemtitulo">
            <h1>CONTROL DE TIEMPOS DE CAMIONES</h1>
      </div>
      <div class="itemtitulo">
            <h1 id="reloj">CONTROL DE TIEMPOS DE CAMIONES</h1>
      </div>

    </section>
    <form name="form_principal" id="form_principal" action="bascula.php" method="POST">
    <section class="container"> <!-- CONTENEDOR DE LA SECCION CENTRAL 2 -->

        <div class="item centrado"><!-- PRIMER SECCION, ES LA SECCION DE "ORDEN" -->
            <div class="item">
                    <h2>Orden</h2>
                    <div class="item">
                        <p >Numero de Carga&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input class="basic-slide" type="number" id="num_carga" name="num_carga" placeholder="Ingrese el numero" ></p>
                    </div>
                    <div class="item">
                        <p class="agregarmargenabajo">Numero de Boleta&nbsp&nbsp&nbsp&nbsp
                        <input class="basic-slide" type="number" name="num_boleta" placeholder="Ingrese el numero"></p>
                    </div>
                    <div class="item">
                        <p>Entrada a Vigilancia
                        <input class="basic-slide" type="text" name="h_entrada_vig" placeholder="Ingrese la hora" pattern="^([01]?[0-9]|2[0-3]):[0-5][0-9]$"></p>
                    </div>
                    <div class="item">
                        <p>Solicitud en Ventas &nbsp
                        <input class="basic-slide" type="text" name="h_solicitud_v" placeholder="Ingrese la hora" pattern="^([01]?[0-9]|2[0-3]):[0-5][0-9]$"></p>
                    </div>
            </div>
        </div><!-- FIN,SECCION DE "ORDEN" -->

        <div class="item centrado"> <!-- SEGUNDA SECCION, ES LA SECCION DE "HORA" -->
                <div class="item">
                        <h2>Hora</h2>
                        <fieldset ><legend>Bascula 1er Pesaje</legend>
                            <div class="item">
                                <p >Primer Pesaje&nbsp&nbsp&nbsp
                                <input class="basic-slide" type="text" id="primerpesaje1" name="primerpesaje1" placeholder="Ingrese la hora" pattern="^([01]?[0-9]|2[0-3]):[0-5][0-9]$"></p>
                            </div>
                            <div class="item">
                                <p >Segundo Pesaje
                                <input class="basic-slide" type="text" id="segundopesaje1" name="segundopesaje1" placeholder="Ingrese la hora" pattern="^([01]?[0-9]|2[0-3]):[0-5][0-9]$"></p>
                            </div>
                        </fieldset>
                        <fieldset class="agregarmargen"><legend>Bascula 2do Pesaje</legend>
                            <div class="item">

                                <p>Primer Pesaje&nbsp&nbsp&nbsp
                                <input class="basic-slide" type="text" id="primerpesaje2" name="primerpesaje2" placeholder="Ingrese la hora" pattern="^([01]?[0-9]|2[0-3]):[0-5][0-9]$"></p>
                            </div>
                            <div class="item">
                                <p>Segundo Pesaje
                                <input class="basic-slide" type="text" id="segundopesaje2" name="segundopesaje2" placeholder="Ingrese la hora" pattern="^([01]?[0-9]|2[0-3]):[0-5][0-9]$"></p>
                            </div>
                        </fieldset>
                </div>
            </div><!-- FIN ,  SECCION DE "HORA" -->

            <div class="item"><!-- TERCERA SECCION, ES LA SECCION DE "CHOFER" -->
                    <div class="item">
                            <h2>Datos del Chofer</h2>

                                <div class="item centrado">
                                    <p >Chofer&nbsp&nbsp&nbsp&nbsp&nbsp
                                    <input class="basic-slide" type="text" id="chofer" name="chofer" placeholder="Ingrese el nombre"></p>
                                </div>
                                <div class="item centrado">
                                    <p >Placas&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    <input class="basic-slide" type="text" id="placas" name="placas" placeholder="Ingrese las placas"></p>
                                </div>

                                <div class="item centrado">
                                        <fieldset><legend>Producto</legend>
                                        <input type="radio" class="checbox" name="producto" value="Harina">HARINA&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br>
                                        <input type="radio" class="checbox" name="producto"  value="Paqueteria">PAQUETERIA<br>
                                        <input type="radio" class="checbox" name="producto"  value="SalyAce" >SAL/ACE&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    </fieldset>
                                </div>
                                </fieldset>
                                <div class="item centrado">

                                    <p>Peso 1&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    <input class="basic-slide" type="text" id="peso1" name="peso1" placeholder="Ingrese el peso"></p>
                                </div>
                                <div class="item centrado">
                                    <p>Fecha de Salida
                                    <input class="fecha" type="date" id="fechasalida" name="fechasalida"  >
                                    </p>
                                </div>
                                <div class="item boton derecha">
                                        <input type="submit" class="botonnaranja" value="Guardar" id="Guardar" name="Guardar">
                                </div>

                    </div>
            </div><!-- FIN, SECCION DE "CHOFER" -->

    </section><!-- FIN DE LA SECCION CENTRAL 2 -->
    </form>


    <section class="container_footer"><!-- footer-->
        <div class="item">
                <div class="item">
                        <h3>REPORTES</h3>
                </div>
                <form name="form_reportes" id="form_reportes" action="reportes\excelreport.php" method="POST">
                    <div class="item-graficos">
                            <div class="item2">
                                <p>Fecha de Inicio
                                <input class="fecha"  type="date" id="fechainicioR" name="fechainicioR" value=""></p>
                            </div>
                            <div class="item2">
                                <p>Fecha de Fin
                                <input class="fecha" type="date" id="fechasalidaR" name="fechasalidaR" value="">
                                </p>
                            </div>
                            <div class="item2 boton">
                            <input type="submit" class="botonnaranja" value="Ver Datos" id="VerDatos" name="Ver Datos">
                              <!--<input type="sumbit" class="botonnaranja" value="Ver Reporte" id="VerReporte" name="Ver Reporte">
                                !-->                          
                            </div>
                    </div>
                </form>
        </div>
 
        <div class="item">
              <div class="item">
                  <h3>VER DATOS INGRESADOS</h3>
              </div>
              <form name="form_graficos" id="form_graficos" action="datos.php" method="POST">
              <div class="item-graficos">
                      <div class="item2">
                          <p>Fecha de Inicio
                          <input class="fecha" type="date" id="fechainicioG" name="fechainicioG" value="2019-06-01"></p>
                      </div>
                      <div class="item2">
                          <p>Fecha de Fin
                          <input class="fecha" type="date" id="fechasalidaG" name="fechasalidaG" >
                          </p>
                      </div>
                      <div class="item2 boton">
                        <input type="submit" class="botonnaranja" value="Ver Datos" id="VerDatos" name="Ver Datos">
                     </div>
              </div>
              </form>
        </div>
    </section>


 <!-- INICIA EL CODIGO PHP -->   
<?php 
        date_default_timezone_set('America/Mexico_City');
        $link=mysqli_connect("localhost", "root", "pirineos", "controltiempos");

        /*TABLA CARGA */
        $num_carga=$_POST["num_carga"];
        $num_boleta=$_POST["num_boleta"];
        $h_entrada_vig=$_POST["h_entrada_vig"];
        $h_solicitud_v=$_POST["h_solicitud_v"];

        /*TABLA PRIMER PESAJE */
        $primerpesaje1=$_POST["primerpesaje1"];
        $segundopesaje1=$_POST["segundopesaje1"];

        /*TABLA SEGUNDO PESAJE */
        $primerpesaje2=$_POST["primerpesaje2"];
        $segundopesaje2=$_POST["segundopesaje2"];

        /*TABLA DATOS CHOFER */
        $chofer=$_POST["chofer"];
        $placas=$_POST["placas"];
        $producto=$_POST["producto"];
        $peso1=$_POST["peso1"];  
        $fechasalida=$_POST["fechasalida"];

        $fechaactual=date('Y-m-d H:i:s');
        $presionarguardar=$_POST["guardar"];

        /* funcion para analisar los repetidos */
        function Es_repetido($cadenaSql)
        {
            $link=mysqli_connect("localhost", "root", "pirineos", "controltiempos");
            $cantidadrepetidos=mysqli_query($link,$cadenaSql);
            mysqli_data_seek($cantidadrepetidos,0);
            $cantidadderepetidos = mysqli_fetch_row($cantidadrepetidos);
            if($cantidadderepetidos[0] >= 1)$cantidadderepetidos[0]='Si';
            else
            $cantidadderepetidos[0]='No';

            return $cantidadderepetidos[0];
        }

        function Quien_inserto($cadenaSql)
        {
            $link=mysqli_connect("localhost", "root", "pirineos", "controltiempos");
            $quienfue=mysqli_query($link,$cadenaSql);
            mysqli_data_seek($quienfue,0);
            $quien_inserto = mysqli_fetch_row($quienfue);
            if($quien_inserto[0] == 1)$quien_inserto[0]='Bascula';
            if($quien_inserto[0] == 2)$quien_inserto[0]='CedioEmb';

            return $quien_inserto[0];
        }


        /*INSERTAR EN LAS TABLAS */
        
          //ANALISIS DE REPETIDOS   
          $Es_repetido=Es_repetido("select count(*) from carga where num_carga='".$num_carga."'");

           

        if($Es_repetido == 'No' and $num_carga<>0) /* si no es repetido y la orden no es cero, insertaria*/
        {
            /*insertar en la tabla de CARGA */
            $insertarencarga="INSERT INTO carga (num_carga,num_boleta,fecha,h_entrada_vig,h_solicitud_v) VALUES ('$num_carga','$num_boleta','$fechaactual','$h_entrada_vig','$h_solicitud_v')";
            mysqli_query($link,$insertarencarga);

            /*insertar en la tabla de primer pesaje */
            $primerpesaje="INSERT INTO primer_pesaje (num_carga,primer_peso1,segundo_peso1) VALUES ('$num_carga','$primerpesaje1','$segundopesaje1')";
            mysqli_query($link,$primerpesaje);
        
            /*insertar en la tabla de segundo pesaje */
            $segundopesaje="INSERT INTO segundo_pesaje (num_carga,primer_peso2,segundo_peso2) VALUES ('$num_carga','$primerpesaje2','$segundopesaje2')";
            mysqli_query($link,$segundopesaje);
            
            /*insertar en la tabla de chofer */
            $datoschofer="INSERT INTO datos_chofer (num_carga,nombre,placas,producto,peso1,fechasalida) VALUES ('$num_carga','$chofer','$placas','$producto','$peso1','$fechasalida')";
            mysqli_query($link,$datoschofer);

            $quieninserto1="INSERT INTO quieninserto(num_carga,quienfue) VALUES ('$num_carga','1')";
            mysqli_query($link,$quieninserto1);

            //PARA EMBARQUES
            $embarques="INSERT INTO embarques (num_carga,fecha,fecha_insertado,hor_programa,hor_embarques,hor_inicio_carga,hor_termino_carga,hor_salida) VALUES ('$num_carga','','','00:00','00:00','00:00','00:00','00:00')";
            mysqli_query($link,$embarques);

        }
        else /* ES REPETIDO */
        {
        //ANALISIS DE QUIEN FUE LA PERSONA QUE INSERTO 
           $QuienInserto=Quien_inserto("select quienfue from quieninserto where num_carga='".$num_carga."'");

           if($QuienInserto == 'CedioEmb') /*inserto cedi o EMBARQUES */
           {
               
                $sql="UPDATE carga SET h_entrada_vig='".$h_entrada_vig."',h_solicitud_v='".$h_solicitud_v."', num_boleta='".$num_boleta."' WHERE num_carga='".$num_carga."'";
                $resultad=mysqli_query($link,$sql);

                /*insertar en la tabla de primer pesaje */
                $primerpesaje="UPDATE primer_pesaje SET primer_peso1='".$primerpesaje1."',segundo_peso1='".$segundopesaje1."' WHERE num_carga='".$num_carga."'";
        
                mysqli_query($link,$primerpesaje);
            
                /*insertar en la tabla de segundo pesaje */
                $segundopesaje="UPDATE segundo_pesaje SET primer_peso2='".$primerpesaje2."',segundo_peso2='".$segundopesaje2."' WHERE num_carga='".$num_carga."'";
                
                mysqli_query($link,$segundopesaje);
                
                /*insertar en la tabla de chofer */
                $datoschofer="UPDATE datos_chofer SET nombre='".$chofer."',placas='".$placas."',producto='".$producto."',peso1='".$peso1."',fechasalida='".$fechasalida."' WHERE num_carga='".$num_carga."'";
                /*$datoschofer="UPDATE datos_chofer SET (num_carga,nombre,placas,producto,peso1,fechasalida) VALUES ('$num_carga','$chofer','$placas','$producto','$peso1','$fechasalida')";*/
                mysqli_query($link,$datoschofer);

                $sql2="UPDATE quieninserto SET quienfue='0' WHERE num_carga='".$num_carga."'";
                $resultad=mysqli_query($link,$sql2);

           }

           else  /* INDICA QUE INSERTO EL MISMO, ASI QUE SERIA DUPLICADO */
           echo'<script type="text/javascript"> alert("Orden de carga repetida esa orden ya la ingreso. Revise la en el apartado de editar");</script>';
        }
        /*FIN DE INSERTAR */
?>
   
    <script>
        var fechaactual=setfecha();

         document.form_principal.fechasalida.value = fechaactual;

         document.form_reportes.fechainicioR.value = fechaactual;
         document.form_reportes.fechasalidaR.value = fechaactual;

         document.form_graficos.fechainicioG.value = fechaactual;
         document.form_graficos.fechasalidaG.value = fechaactual;


         /*calendario IZQUIERDO*/
         var f=new Date();
         var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
         document.getElementById('ano').innerHTML=f.getFullYear();
         document.getElementById('dia').innerHTML=f.getDate();
         document.getElementById('mes').innerHTML=meses[f.getMonth()];


        /*HORA EN MINUTOS, SEGUNDOS Y HORA*/
         function startTime()
         {
         today=new Date();
         h=today.getHours();
         m=today.getMinutes();
         s=today.getSeconds();
         m=checkTime(m);
         s=checkTime(s);
         document.getElementById('reloj').innerHTML=h+":"+m+":"+s; t=setTimeout('startTime()',500);
         }

         function checkTime(i) {
         if (i<10) {i="0" + i;}
         return i;
         }
         window.onload=function()
         {
         startTime();
         }


   </script>
</body>
</html>

