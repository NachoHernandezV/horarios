<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Embarques-Cedi</title>
    <link rel="stylesheet" href="css/embarques_cedi.css">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/fecha2.js"></script>

</head>
<body>
    <!----------------------------------Seccion de titulo   -->
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
                    <h1 id="reloj">hola</h1>
            </div>
    </section>
    <!------------------------------FIN  Seccion de titulo   -->


    <form name="form_principal" id="form_principal" action="embarques_cedi.php" method="POST">
    <section class="container"> <!-- CONTENEDOR DE LA SECCION CENTRAL 2 -->
        <div class="item centrado"><!-- PRIMER SECCION, ES LA SECCION DE "ORDEN" -->
            <div class="item">
                    <h2>Orden</h2>
                    <div class="item">
                        <p >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspFecha&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input class="size" type="date" id="fecha" name="fecha" >
                    </div>
                    <div class="item">
                        <p class="agregarmargenabajo">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspOrden de carga &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input class="basic-slide" type="text" name="orden_carga" id="orden_carga" placeholder="Ingrese el numero" ></p>
                    </div>
                    <div class="item">
                        <p>Horario de programa &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input class="basic-slide" type="text" name="h_programa" id="h_programa" placeholder="Ingrese la hora" pattern="^([01]?[0-9]|2[0-3]):[0-5][0-9]$"></p>
                    </div>
                    <div class="item">
                        <p>Hora llegada a Embarques &nbsp
                        <input class="basic-slide" type="text" name="h_llegada_emb" id="h_llegada_emb" placeholder="Ingrese la hora" pattern="^([01]?[0-9]|2[0-3]):[0-5][0-9]$"></p>
                    </div>
                    <div class="item">
                            <p>Inicio de Carga &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <input class="basic-slide" type="text" name="inicio_carga" id="inicio_carga" placeholder="Ingrese la hora" pattern="^([01]?[0-9]|2[0-3]):[0-5][0-9]$"></p>
                        </div>
                    <div class="item">
                            <p>Termino de Carga &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <input class="basic-slide" type="text" name="termino_carga" id="termino_carga" placeholder="Ingrese la hora" pattern="^([01]?[0-9]|2[0-3]):[0-5][0-9]$"></p>
                    </div>
                    <div class="item">
                            <p>Hora Salida (Factura)&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <input class="basic-slide" type="text" name="h_salida" id="h_salida" placeholder="Ingrese la hora" pattern="^([01]?[0-9]|2[0-3]):[0-5][0-9]$"></p>
                    </div>
                    <div class="item boton derecha">
                                        <input type="submit" class="botonnaranja" value="Guardar" id="Guardar" name="Guardar">
                    </div>
            </div> 
        </div><!-- FIN,SECCION DE "ORDEN" -->
    </form>
    
        <div class="item"><!-- TERCERA SECCION, ES LA SECCION DE "CHOFER" -->
            <section class="container_footer"><!-- footer-->
                <div class="item">
                        <div class="item">
                                <h3>REPORTES</h3>
                        </div>
                        <form name="form_reportes" id="form_reportes">
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
                                      <input type="button" class="botonnaranja" value="Ver Reporte" id="VerReporte" name="Ver Reporte">
                                   </div>
                            </div>
                        </form>
                </div>
        
                <div class="item">
                      <div class="item">
                          <h3>GRAFICOS</h3>
                      </div>
                      <form name="form_graficos" id="form_graficos">
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
                                <input type="button" class="botonnaranja" value="Ver Grafico" id="VerGrafico" name="Ver Grafico">
                             </div>
                      </div>
                      </form>
                </div>
            </section>  
        </div><!-- FIN, SECCION DE "CHOFER" -->

    </section><!-- FIN DE LA SECCION CENTRAL 2 -->


    
 <!-- INICIA EL CODIGO PHP -->   
 <?php 
        date_default_timezone_set('America/Mexico_City');
        $link=mysqli_connect("localhost", "root", "pirineos", "controltiempos");

        /*TABLA CARGA */
        $num_carga=$_POST["orden_carga"];
        $fecha=$_POST["fecha"];
       
        $h_programa=$_POST["h_programa"];
        $h_llegada_emb=$_POST["h_llegada_emb"];
        $inicio_carga=$_POST["inicio_carga"];
        $termino_carga=$_POST["termino_carga"];
        $h_salida=$_POST["h_salida"];
    

        $fechaactual=date('Y-m-d H:i:s');
        $presionarguardar=$_POST["Guardar"];


  /*DE AQUI PARA ARRIBA REVISADOOOOOO     2 JULIO 2019

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
            $insertarencarga="INSERT INTO carga (num_carga,num_boleta,fecha,h_entrada_vig,h_solicitud_v) VALUES ('$num_carga','0','00:00','00:00','00:00')";
            mysqli_query($link,$insertarencarga);

            /*insertar en la tabla de primer pesaje */
            $primerpesaje="INSERT INTO primer_pesaje (num_carga,primer_peso1,segundo_peso1) VALUES ('$num_carga','','')";
            mysqli_query($link,$primerpesaje);
            
            /*insertar en la tabla de segundo pesaje */
            $segundopesaje="INSERT INTO segundo_pesaje (num_carga,primer_peso2,segundo_peso2) VALUES ('$num_carga','','')";
            mysqli_query($link,$segundopesaje);
                
            /*insertar en la tabla de chofer */
            $datoschofer="INSERT INTO datos_chofer (num_carga,nombre,placas,producto,peso1,fechasalida) VALUES ('$num_carga','','','','','')";
            mysqli_query($link,$datoschofer);


            /*insertar en la tabla de embarques */
            $embarques="INSERT INTO embarques (num_carga,fecha,fecha_insertado,hor_programa,hor_embarques,hor_inicio_carga,hor_termino_carga,hor_salida) VALUES ('$num_carga','$fecha','$fechaactual','$h_programa','$h_llegada_emb','$inicio_carga','$termino_carga','$h_salida')";
            mysqli_query($link,$embarques);

            $quieninserto1="INSERT INTO quieninserto (num_carga,quienfue) VALUES ('$num_carga','2')";
            mysqli_query($link,$quieninserto1);
        }
        else /* ES REPETIDO */
        {
        //ANALISIS DE QUIEN FUE LA PERSONA QUE INSERTO 
           $QuienInserto=Quien_inserto("select quienfue from quieninserto where num_carga='".$num_carga."'");

           if($QuienInserto == 'Bascula') /*inserto cedi o EMBARQUES */
           {
                $embarques="UPDATE embarques SET num_carga='".$num_carga."',fecha='".$fecha."',fecha_insertado='".$fechaactual."',hor_programa='".$h_programa."',hor_embarques='".$h_llegada_emb."',hor_inicio_carga='".$inicio_carga."',hor_termino_carga='".$termino_carga."',hor_salida='".$h_salida."' "."WHERE num_carga='".$num_carga."'";
                /*$embarques="INSERT INTO embarques (num_carga,fecha,fecha_insertado,hor_programa,hor_embarques,   hor_inicio_carga,     hor_termino_carga,hor_salida) 
                VALUES ('$num_carga','$fecha','$fechaactual','$h_programa','$h_llegada_emb','$inicio_carga','$termino_carga','$h_salida')";*/
                mysqli_query($link,$embarques);

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


         document.form_reportes.fechainicioR.value = fechaactual;
         document.form_reportes.fechasalidaR.value = fechaactual;

         document.form_graficos.fechainicioG.value = fechaactual;
         document.form_graficos.fechasalidaG.value = fechaactual;

         document.form_principal.fecha.value = fechaactual;

         


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
