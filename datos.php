<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datos Ingresados</title>
    <link rel="stylesheet" href="css/control_tiempos.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/datos.css">
    <script type="text/javascript" src="js/fecha.js"></script>
    <script type="text/javascript" src="js/fecha.js"></script>


</head>
<body>
    <section class="containertitulo">
      <div class="itemtitulo">
        <div class="mifecha2">
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



    

    <!--INICIA LA IMPRESION DE LOS DATOS

    <section class="container"> -->

                  <div style="text-align:center;" class="espacio">

                  <!-- INICIA EL CODIGO PHP -->
                  <?php
                        date_default_timezone_set('America/Mexico_City');
                        $con=mysqli_connect("localhost", "root", "pirineos", "controltiempos");

                              /*truncar*/
                        function truncateFloat($number, $digitos)
                        {
                        $raiz = 10;
                        $multiplicador = pow ($raiz,$digitos);
                        $resultado = ((int)($number * $multiplicador)) / $multiplicador;
                        return number_format($resultado, $digitos);
            
                        }
                        function RestarHoras($horaini,$horafin)
                        {
                            $f1 = new DateTime($horaini);
                            $f2 = new DateTime($horafin);
                            $d = $f1->diff($f2);
                            return $d->format('%H')*60 + $d->format('%I');
                        }
                        function ConvertiraHorasyMinutos($minutos)
                        {
                              $horas=$minutos/60;
                              $horas_sin_decimal=truncateFloat($horas,0);
                              $minutos=$minutos%60;
                              if($horas_sin_decimal <10)
                              $horas_sin_decimal='0'.$horas_sin_decimal;
                              if($minutos<10)
                              $minutos='0'.$minutos;

                              $horasyminutos=$horas_sin_decimal.":".$minutos;
                              return $horasyminutos;
                        }

                        echo " <table border='1' style='margin: 0 auto;'>";

                        //fila numero 1
                        echo " <tr class='colorencabezado'> ";
                              echo "  <td rowspan='2'>Fecha</td>";  //0
                              echo "  <td rowspan='2'>Entrada a Vigilancia</td>";//1
                              echo "  <td rowspan='2'>Solicitud en Ventas</td>";//2
                              echo "  <td colspan='3'>Bascula 1er pesaje</td>";//3
                              echo "  <td colspan='3'>Bascula 2do pesaje</td>";//4
                              echo "  <td rowspan='2'>Num. de Boleta</td>";//5
                              echo "  <td rowspan='2'>Solicitud de Carga</td>";//6
                              echo "  <td rowspan='2'>Fecha de Salida</td>";//7
                              echo "  <td rowspan='2'>Placas</td>";//8
                              echo "  <td rowspan='2'>Nombre del Chofer</td>";//9
                              echo "  <td colspan='3'>Producto</td>";//3
                              echo "  <td rowspan='2'>Peso 1</td>";//9
                              //DATOS DE CEDI EMBARQUES
                              echo "  <td colspan='5'>Cedi o Embarques</td>";//9
                        echo " </tr>";

                        echo " <tr class='colorencabezado'> ";
                 
                        echo "  <td>1er Peso</td>";//3
                        echo "  <td>2do Peso</td>";//4
                        echo "  <td>Entrada Total P1-P2</td>";//5
                        echo "  <td>1er Peso</td>";//6
                        echo "  <td>2do Peso</td>";//7
                        echo "  <td>Salida Total P1-P2</td>";//8
                        echo "  <td>HNA</td>";  //9
                        echo "  <td>PAQ</td>";  //9
                        echo "  <td>SAL / ACE</td>";  //9
                        //DATOS DE CEDI EMBARQUES
                        echo "<td>Horario de Programa</td>";  //9
                        echo "<td>Hora de llegada</td>";  //9
                        echo "<td>Inicio de Carga</td>";  //9
                        echo "<td>Salida de Carga</td>";  //9
                        echo "<td>Hora de Salida (Factura)</td>";  //9


                  echo " </tr>";

                        $sql="
                        SELECT SUBSTRING(C.fecha,1,10) as fechaInicio,
                              SUBSTRING(C.h_entrada_vig,1,5) as entrada_vig,
                              SUBSTRING(C.h_solicitud_v,1,5) as solicitud_vent,
                              SUBSTRING(PP.primer_peso1,1,5) as primer_peso1,
                              SUBSTRING(PP.segundo_peso1,1,5) as segundo_peso1,
                              TIMESTAMPDIFF(MINUTE,pp.primer_peso1,pp.segundo_peso1) as P1_P2, 
                              SUBSTRING(sp.primer_peso2,1,5) as primer_peso2, 
                              SUBSTRING(sp.segundo_peso2,1,5) as segundo_peso2, 
                              TIMESTAMPDIFF(MINUTE,sp.primer_peso2,sp.segundo_peso2) as P1_P2,
                              c.num_boleta,c.num_carga,dc.fechasalida,dc.placas,dc.nombre,dc.producto,dc.peso1,
                              SUBSTRING(e.hor_programa,1,5) as hor_programa,
                              SUBSTRING(e.hor_embarques,1,5) as hor_embarques, 
                              SUBSTRING(e.hor_inicio_carga,1,5) as hor_inicio_carga,
                              SUBSTRING(e.hor_termino_carga,1,5) as hor_termino_carga,
                              SUBSTRING(e.hor_salida,1,5) as hor_salida  
                        FROM carga c ,primer_pesaje pp, segundo_pesaje sp,datos_chofer dc,embarques e 
                        WHERE c.num_carga=dc.num_carga and c.num_carga=pp.num_carga and c.num_carga=sp.num_carga and c.num_carga=e.num_carga
                        
                        ";
                        $resultado=mysqli_query($con,$sql);
                        while($consulta = mysqli_fetch_array($resultado))
                        {
                              echo " <tr class='colordatos'> ";
                              echo "  <td>".$consulta[0]."</td>";  //0
                              echo "  <td>".$consulta[1]."</td>";//1
                              echo "  <td>".$consulta[2]."</td>";//2
                              echo "  <td>".$consulta[3]."</td>";//8
                              echo "  <td>".$consulta[4]."</td>";//8
                              echo "  <td>".ConvertiraHorasyMinutos(RestarHoras($consulta[3],$consulta[4]))."</td>";//RESTA DE P1-P2
                              echo "  <td>".$consulta[6]."</td>";//8
                              echo "  <td>".$consulta[7]."</td>";//12
                              echo "  <td>".ConvertiraHorasyMinutos(RestarHoras($consulta[6],$consulta[7]))."</td>";//RESTA DE P1-P2
      
                              echo "  <td>".$consulta[9]."</td>";//8
                              echo "  <td>".$consulta[10]."</td>";//12
                              echo "  <td>".$consulta[11]."</td>";//13
                              echo "  <td>".$consulta[12]."</td>";//8
                              echo "  <td>".$consulta[13]."</td>";//12

                              if ($consulta[14] == "Harina"){
                                    echo "  <td>X</td>";//HANRINA
                                    echo "  <td></td>";//PAQUETERIA
                                    echo "  <td></td>";//SAL
                                    }
                              else if ($consulta[14] == "Paqueteria"){
                              echo "  <td></td>";//HANRINA
                              echo "  <td>X</td>";//PAQUETERIA
                              echo "  <td></td>";//SAL
                              }
                              else{
                                    echo "  <td></td>";//HANRINA
                                    echo "  <td></td>";//PAQUETERIA
                                    echo "  <td>X</td>";//SAL
                              }

                              echo "  <td>".$consulta[15]."</td>";//
                              echo "  <td>".$consulta[16]."</td>";//
                              echo "  <td>".$consulta[17]."</td>";//
                              echo "  <td>".$consulta[18]."</td>";//
                              echo "  <td>".$consulta[19]."</td>";//
                              echo "  <td>".$consulta[20]."</td>";//
                             
                              echo " </tr>";
                        }

                        echo "</table>";

                  ?>

                  </div>
    <!--</section>  -->
    
   
    <script>


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

