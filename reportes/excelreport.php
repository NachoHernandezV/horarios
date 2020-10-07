<?php
//Incluimos librería y archivo de conexión
	require 'Classes/PHPExcel.php';

	//Objeto de PHPExcel
	$objPHPExcel  = new PHPExcel();

	//Propiedades de Documento
	$objPHPExcel->getProperties()->setCreator("Ignacio Hernandez")->setDescription("Reporte de Sistemas");

	//Establecemos la pestaña activa y nombre a la pestaña
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle("Reporte de Sistemas");


	/*MODULO DE RECEPCION DE DATOS*/
	date_default_timezone_set('America/Mexico_City');
	$link=mysqli_connect("localhost", "root", "pirineos", "controltiempos");

	$fechainicio=$_POST["fechainicioR"];
	$fechasalida=$_POST["fechasalidaR"];

	/*FIN DEL MODULO DE RECEPCION*/


	$bordes = array(
     'borders' => array(
      'allborders' => array(
       'style' => PHPExcel_Style_Border::BORDER_THIN
     )
    )
);

	$estiloTituloReporte = array(
    'font' => array(
	'name'      => 'calibri',
	'bold'      => true,
	'italic'    => false,
	'strike'    => false,
	'size' =>17
	),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_NONE
	)
    ),
    'alignment' => array(
	'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	);

	$estiloDatos = array(
		'font' => array(
		'name'      => 'Calibri',
		'bold'      => false,
		'italic'    => false,
		'strike'    => false,
		'size' =>11
		),
		'borders' => array(
		'allborders' => array(
		'style' => PHPExcel_Style_Border::BORDER_NONE
		)
		),
		'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
		)
		);

	$nombresytitulos= array(
		'font' => array(
		'name'      => 'Calibri',
		'bold'      => true,
		'italic'    => false,
		'strike'    => false,
		'size' =>12
	),
		'alignment' => array(
				 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				  'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
		 )
		);


		//COLORES
	$colorceldastitulo = array(
							'fill' => array(
									'type' => PHPExcel_Style_Fill::FILL_SOLID,
									'color' => array('rgb'=>'E4F6C7'),
							),
							'font' => array(
									'bold' => true,
							)
							);
		

		$colorceldas = array(
			'fill' => array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
			'color' => array('rgb'=>'EDF59A'),
					),
					'font' => array(
					'bold' => true,
					)
					);
//// FIN DE LOS COLORES





	$objPHPExcel->getActiveSheet()->getStyle('A2')->applyFromArray($estiloTituloReporte);
	$objPHPExcel->getActiveSheet()->setCellValue('A2','CONTROL DE TIEMPOS DE CAMIONES EN PLANTA (SALAMANCA)');
	$objPHPExcel->getActiveSheet()->mergeCells('A2:T2');

	//establecer el ancho de las columnas
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(11);
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(11);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(11);

	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(6);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(6);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(11); //

	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(6);
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(6);
	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(11);

	$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(11);
	$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(11);
	$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(11);
	$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(11);
	$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(18);

	$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(7);
	$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(7);
	$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(7);

	$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(11);
	$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(12);
	$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(12);
	$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(12);
	$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(12);
	$objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(12);

	$objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(12);
	$objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(12);
	$objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(12);
	$objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(12);
	$objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(12);
	$objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(12);
	$objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setWidth(12);
	$objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(12);
	$objPHPExcel->getActiveSheet()->getColumnDimension('AF')->setWidth(12);

	//DEFINIR ALTURA
	$objPHPExcel->getActiveSheet()->getRowDimension('5')->setRowHeight(31);


	//FIN ANCHO DE LAS COLUMNAS

	//poner color a los comentarios destacados
	$objPHPExcel->getActiveSheet()->getStyle('A3:AF5')->getFill()
			->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,
			'startcolor' => array('rgb' => 'ABD7AC')
			));

			//estilos
	$objPHPExcel->getActiveSheet()->getStyle('A3:AF5')->applyFromArray($bordes); 
	$objPHPExcel->getActiveSheet()->getStyle('A3:AF5')->applyFromArray($nombresytitulos);
	$objPHPExcel->getActiveSheet()->getStyle('A3:AF5')->getAlignment()->setWrapText(true); //PARA QUE FUNCIONE EL \n (SALTO DE LINEA)
	// fin ESTILOS

	$objPHPExcel->getActiveSheet()->setCellValue('A3', 'Fecha');
	$objPHPExcel->getActiveSheet()->mergeCells('A3:A5');

	$objPHPExcel->getActiveSheet()->setCellValue('B3', "Entrada a \n Vigilancia");
	$objPHPExcel->getActiveSheet()->mergeCells('B3:B5');

	$objPHPExcel->getActiveSheet()->setCellValue('C3', "Solicitud \nen Ventas");
	$objPHPExcel->getActiveSheet()->mergeCells('C3:C5');

	//
	$objPHPExcel->getActiveSheet()->setCellValue('D3', "Bascula 1er pesaje");
	$objPHPExcel->getActiveSheet()->mergeCells('D3:F3');

	$objPHPExcel->getActiveSheet()->setCellValue('D4', "1er \nPeso");
	$objPHPExcel->getActiveSheet()->mergeCells('D4:D5');

	$objPHPExcel->getActiveSheet()->setCellValue('E4', "2do \nPeso");
	$objPHPExcel->getActiveSheet()->mergeCells('E4:E5');

	$objPHPExcel->getActiveSheet()->setCellValue('F4', "Entrada \nTotal \nP1-P2");
	$objPHPExcel->getActiveSheet()->mergeCells('F4:F5');



	$objPHPExcel->getActiveSheet()->setCellValue('G3', 'Bascula 2do pesaje');
	$objPHPExcel->getActiveSheet()->mergeCells('G3:I3');

	$objPHPExcel->getActiveSheet()->setCellValue('G4', "1er \nPeso");
	$objPHPExcel->getActiveSheet()->mergeCells('G4:G5');

	$objPHPExcel->getActiveSheet()->setCellValue('H4', "2do \nPeso");
	$objPHPExcel->getActiveSheet()->mergeCells('H4:H5');

	$objPHPExcel->getActiveSheet()->setCellValue('I4', "Entrada \nTotal \nP1-P2");
	$objPHPExcel->getActiveSheet()->mergeCells('I4:I5');



	$objPHPExcel->getActiveSheet()->setCellValue('J3', "Num. de\nBoleta");
	$objPHPExcel->getActiveSheet()->mergeCells('J3:J5');

	$objPHPExcel->getActiveSheet()->setCellValue('K3', "Solicitud\nde Carga");
	$objPHPExcel->getActiveSheet()->mergeCells('K3:K5');

	$objPHPExcel->getActiveSheet()->setCellValue('L3', "Fecha de\nSalida");
	$objPHPExcel->getActiveSheet()->mergeCells('L3:L5');

	$objPHPExcel->getActiveSheet()->setCellValue('M3', 'Placas');
	$objPHPExcel->getActiveSheet()->mergeCells('M3:M5');

	$objPHPExcel->getActiveSheet()->setCellValue('N3', "Nombre\ndel Chofer");
	$objPHPExcel->getActiveSheet()->mergeCells('N3:N5');



	$objPHPExcel->getActiveSheet()->setCellValue('O3', 'Producto');
	$objPHPExcel->getActiveSheet()->mergeCells('O3:Q3');

	$objPHPExcel->getActiveSheet()->setCellValue('O4', 'HNA');
	$objPHPExcel->getActiveSheet()->mergeCells('O4:O5');

	$objPHPExcel->getActiveSheet()->setCellValue('P4', 'PAQ');
	$objPHPExcel->getActiveSheet()->mergeCells('P4:P5');

	$objPHPExcel->getActiveSheet()->setCellValue('Q4', "SAL\n/\nACE");
	$objPHPExcel->getActiveSheet()->mergeCells('Q4:Q5');
	
	$objPHPExcel->getActiveSheet()->setCellValue('R3', 'Peso 1');
	$objPHPExcel->getActiveSheet()->mergeCells('R3:R5');



	$objPHPExcel->getActiveSheet()->setCellValue('S3', "Cedi o Embarques");
	$objPHPExcel->getActiveSheet()->mergeCells('S3:W3');

	$objPHPExcel->getActiveSheet()->setCellValue('S4', "Horario de\n Programa");
	$objPHPExcel->getActiveSheet()->mergeCells('S4:S5');

	$objPHPExcel->getActiveSheet()->setCellValue('T4', "Hora de\nllegada");
	$objPHPExcel->getActiveSheet()->mergeCells('T4:T5');

	$objPHPExcel->getActiveSheet()->setCellValue('U4', "Inicio\nde Carga");
	$objPHPExcel->getActiveSheet()->mergeCells('U4:U5');

	$objPHPExcel->getActiveSheet()->setCellValue('V4', "Salida \nde Carga");
	$objPHPExcel->getActiveSheet()->mergeCells('V4:V5');

	$objPHPExcel->getActiveSheet()->setCellValue('W4', "Hora\nde Salida\n (Factura)");
	$objPHPExcel->getActiveSheet()->mergeCells('W4:W5');

//CAMPOS CREADOS CON FORMULAS
	$objPHPExcel->getActiveSheet()->setCellValue('X3', "Vigilancia \n a Ventas");
	$objPHPExcel->getActiveSheet()->mergeCells('X3:X5');


	$objPHPExcel->getActiveSheet()->setCellValue('Y3', "Ventas\nSanidad\nBascula");
	$objPHPExcel->getActiveSheet()->mergeCells('Y3:Y5');

	$objPHPExcel->getActiveSheet()->setCellValue('Z3', "Salida de\nbascula\npesaje 1\nal anden");
	$objPHPExcel->getActiveSheet()->mergeCells('Z3:Z5');

	$objPHPExcel->getActiveSheet()->setCellValue('AA3', "Anden a\nInicio\nde Carga");
	$objPHPExcel->getActiveSheet()->mergeCells('AA3:AA5');

	$objPHPExcel->getActiveSheet()->setCellValue('AB3', "Tiempo\nReal de\nCarga");
	$objPHPExcel->getActiveSheet()->mergeCells('AB3:AB5');

	$objPHPExcel->getActiveSheet()->setCellValue('AC3', "Tiempo\nDe\nFactura");
	$objPHPExcel->getActiveSheet()->mergeCells('AC3:AC5');

	$objPHPExcel->getActiveSheet()->setCellValue('AD3', "Llegada\nAnden-\nSalida\nAnden");
	$objPHPExcel->getActiveSheet()->mergeCells('AD3:AD5');

	$objPHPExcel->getActiveSheet()->setCellValue('AE3', "Salida de\nanden a\nbascula\n2do peso");
	$objPHPExcel->getActiveSheet()->mergeCells('AE3:AE5');

	$objPHPExcel->getActiveSheet()->setCellValue('AF3', "Tiempo\nGlobal");
	$objPHPExcel->getActiveSheet()->mergeCells('AF3:AF5');










				function truncateFloat($number, $digitos)
			{
					$raiz = 10;
					$multiplicador = pow ($raiz,$digitos);
					$resultado = ((int)($number * $multiplicador)) / $multiplicador;
					return number_format($resultado, $digitos);

			}
	/*funcion para restar horas*/
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

				if($horas_sin_decimal == 0)
					$horas="00";
				if($horas_sin_decimal < 10 and $horas_sin_decimal != 0)
					$horas="0".$horas_sin_decimal;

					if($minutos == 0)
						$minutos="00";
					if($minutos < 10 and $minutos != 0)
						$minutos="0".$minutos;

				$horasyminutos=$horas.":".$minutos;

				return $horasyminutos;
			}

			function sumarhoras($hora1,$hora2,$hora3,$hora4,$hora5,$hora6,$hora7)
			{
				$horas1=substr($hora1, 0, 2);  // obtener hora 1
				$horas2=substr($hora2, 0, 2);  // obtener hora 2
				$horas3=substr($hora3, 0, 2);  // obtener hora 3
				$horas4=substr($hora4, 0, 2);  // obtener hora 4
				$horas5=substr($hora5, 0, 2);  // obtener hora 5
				$horas6=substr($hora6, 0, 2);  // obtener hora 6
				$horas7=substr($hora7, 0, 2);  // obtener hora 7

				$minuto1=substr($hora1, 3, 2);  // obtener minutos 1
				$minuto2=substr($hora2, 3, 2);  // obtener minutos  2
				$minuto3=substr($hora3, 3, 2);  // obtener minutos  3
				$minuto4=substr($hora4, 3, 2);  // obtener minutos  4
				$minuto5=substr($hora5, 3, 2);  // obtener minutos  5
				$minuto6=substr($hora6, 3, 2);  // obtener minutos  6
				$minuto7=substr($hora7, 3, 2);  // obtener minutos  7
			
				$sumaHoras= (int)$horas1 + (int)$horas2 +(int)$horas3 + (int)$horas4 +(int)$horas5 + (int)$horas6 + (int)$horas7;
				$sumaMinutos= (int)$minuto1 + (int)$minuto2 +(int)$minuto3 + (int)$minuto4 +(int)$minuto5 + (int)$minuto6 + (int)$minuto7;

				$horas=(int)($sumaMinutos/60); // convertir los minutos a horas
				$minutos=$sumaMinutos%60;  // sacar los minutos

				$sumaHoras=$sumaHoras+$horas;

				if($sumaHoras<10)
				$sumaHoras="0".$sumaHoras;

				if($minutos<10)
				$minutos="0".$minutos;


				return $sumaHoras.":".$minutos;
			}

			//ANALIZADOR DE ORDENES FUERA DE TIEMPO
			function OrdenfueradeTiempoSioNo($fechaSolicitud,$FechaInicio)
			{
				if($fechaSolicitud != $FechaInicio)
				return $FueradeTiempo=1;
				else
				return $FueradeTiempo=0;
			}
	//

	//insertar todos los datos de LA Base
	$consultasql="
	SELECT 
		SUBSTRING(C.fecha,1,10) as fechaInicio,
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
	WHERE c.num_carga=dc.num_carga and c.num_carga=pp.num_carga and c.num_carga=sp.num_carga and c.num_carga=e.num_carga and c.fecha 
	between '$fechainicio' and '$fechasalida'
	";

	$resultad=mysqli_query($link,$consultasql);
	$numerodelinea=6;
	$Letras = array("B", "C", "D","E", "F", "G", "H","I", "J", "K", "L","M");
	$tempContador=0;
		/*$objPHPExcel->getActiveSheet()->setCellValue('C7',$consultasql);*/
	while($ConsultaGeneral = mysqli_fetch_array($resultad)){

	$objPHPExcel->getActiveSheet()->setCellValue('A'.$numerodelinea,$ConsultaGeneral['0']);
	$objPHPExcel->getActiveSheet()->setCellValue('B'.$numerodelinea,$ConsultaGeneral['1']);
	$objPHPExcel->getActiveSheet()->setCellValue('C'.$numerodelinea,$ConsultaGeneral['2']);
	$objPHPExcel->getActiveSheet()->setCellValue('D'.$numerodelinea,$ConsultaGeneral['3']);
	$objPHPExcel->getActiveSheet()->setCellValue('E'.$numerodelinea,$ConsultaGeneral['4']);
	
	$RestaD_E=ConvertiraHorasyMinutos(RestarHoras($ConsultaGeneral[3],$ConsultaGeneral[4]));
	$objPHPExcel->getActiveSheet()->setCellValue('F'.$numerodelinea,$RestaD_E);

	$objPHPExcel->getActiveSheet()->setCellValue('G'.$numerodelinea,$ConsultaGeneral['6']);
	$objPHPExcel->getActiveSheet()->setCellValue('H'.$numerodelinea,$ConsultaGeneral['7']);

	$RestaG_H=ConvertiraHorasyMinutos(RestarHoras($ConsultaGeneral[6],$ConsultaGeneral[7]));
	$objPHPExcel->getActiveSheet()->setCellValue('I'.$numerodelinea,$RestaG_H);

	$objPHPExcel->getActiveSheet()->setCellValue('J'.$numerodelinea,$ConsultaGeneral['9']);
	$objPHPExcel->getActiveSheet()->setCellValue('K'.$numerodelinea,$ConsultaGeneral['10']);
	$objPHPExcel->getActiveSheet()->setCellValue('L'.$numerodelinea,$ConsultaGeneral['11']);
	$objPHPExcel->getActiveSheet()->setCellValue('M'.$numerodelinea,$ConsultaGeneral['12']);
	$objPHPExcel->getActiveSheet()->setCellValue('N'.$numerodelinea,$ConsultaGeneral['13']);

	if ($ConsultaGeneral[14] == "Harina"){
		$objPHPExcel->getActiveSheet()->setCellValue('O'.$numerodelinea,'X');
		}
  else if ($ConsultaGeneral[14] == "Paqueteria"){
	$objPHPExcel->getActiveSheet()->setCellValue('P'.$numerodelinea,'X');
  }
  else{
	$objPHPExcel->getActiveSheet()->setCellValue('Q'.$numerodelinea,'X');
  }

	$objPHPExcel->getActiveSheet()->setCellValue('R'.$numerodelinea,$ConsultaGeneral['15']);
	$objPHPExcel->getActiveSheet()->setCellValue('S'.$numerodelinea,$ConsultaGeneral['16']);
	$objPHPExcel->getActiveSheet()->setCellValue('T'.$numerodelinea,$ConsultaGeneral['17']);
	$objPHPExcel->getActiveSheet()->setCellValue('U'.$numerodelinea,$ConsultaGeneral['18']);
	$objPHPExcel->getActiveSheet()->setCellValue('V'.$numerodelinea,$ConsultaGeneral['19']);
	$objPHPExcel->getActiveSheet()->setCellValue('W'.$numerodelinea,$ConsultaGeneral['20']);

	// CAMPOS DE FORMULAS
		$RestaparacolumnaX=ConvertiraHorasyMinutos(RestarHoras($ConsultaGeneral[1],$ConsultaGeneral[2]));
	$objPHPExcel->getActiveSheet()->setCellValue('X'.$numerodelinea,$RestaparacolumnaX); //C-B
		$RestaparacolumnaY=ConvertiraHorasyMinutos(RestarHoras($ConsultaGeneral[2],$ConsultaGeneral[3]));
	$objPHPExcel->getActiveSheet()->setCellValue('Y'.$numerodelinea,$RestaparacolumnaY); //D-C
		$RestaparacolumnaZ=ConvertiraHorasyMinutos(RestarHoras($ConsultaGeneral[4],$ConsultaGeneral[17]));
	$objPHPExcel->getActiveSheet()->setCellValue('Z'.$numerodelinea,$RestaparacolumnaZ); //T-E


	$objPHPExcel->getActiveSheet()->setCellValue('AA'.$numerodelinea,ConvertiraHorasyMinutos(RestarHoras($ConsultaGeneral[17],$ConsultaGeneral[18]))); //U-T
	$objPHPExcel->getActiveSheet()->setCellValue('AB'.$numerodelinea,ConvertiraHorasyMinutos(RestarHoras($ConsultaGeneral[18],$ConsultaGeneral[19]))); //V-U
	$objPHPExcel->getActiveSheet()->setCellValue('AC'.$numerodelinea,ConvertiraHorasyMinutos(RestarHoras($ConsultaGeneral[19],$ConsultaGeneral[20]))); //W-V

		$RestaparacolumnaAD=ConvertiraHorasyMinutos(RestarHoras($ConsultaGeneral[17],$ConsultaGeneral[20]));
	$objPHPExcel->getActiveSheet()->setCellValue('AD'.$numerodelinea,$RestaparacolumnaAD); //W-T
		$RestaparacolumnaAE=ConvertiraHorasyMinutos(RestarHoras($ConsultaGeneral[6],$ConsultaGeneral[20]));
	$objPHPExcel->getActiveSheet()->setCellValue('AE'.$numerodelinea,$RestaparacolumnaAE); //G-W
	
	//suma de TODOS
	$objPHPExcel->getActiveSheet()->setCellValue('AF'.$numerodelinea,sumarhoras($RestaD_E,$RestaG_H,$RestaparacolumnaX,$RestaparacolumnaY,$RestaparacolumnaZ,$RestaparacolumnaAD,$RestaparacolumnaAE) ); //G-W


	++$numerodelinea;
	}

	$numerodelinea=$numerodelinea-1;
	$objPHPExcel->getActiveSheet()->getStyle('A6:AF'.$numerodelinea)->applyFromArray($bordes);  //PARA PONER BORDES
	$objPHPExcel->getActiveSheet()->getStyle('A6:AF'.$numerodelinea)->applyFromArray($estiloDatos);  //CENTRAR LOS DATOS
	$objPHPExcel->getActiveSheet()->getStyle('D3')->applyFromArray($colorceldas);  //COLOR
	$objPHPExcel->getActiveSheet()->getStyle('G3')->applyFromArray($colorceldas);  //COLOR
	$objPHPExcel->getActiveSheet()->getStyle('O3')->applyFromArray($colorceldas);  //COLOR
	$objPHPExcel->getActiveSheet()->getStyle('S3')->applyFromArray($colorceldas);  //COLOR  $colorceldastitulo
	//$objPHPExcel->getActiveSheet()->getStyle('A2')->applyFromArray($colorceldastitulo);


	$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');


	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment;filename="Reporte.xlsx"');
	header('Cache-Control: max-age=0');

	$writer->save('php://output');
?>