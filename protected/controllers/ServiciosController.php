<?php

class ServiciosController extends Controller
{
	public function actionIndex()
	{
		$productos = MarenasaProductos::model()->findAll();
		$this->render('index', array('productos'=>$productos));
	}
	public function actionSendCorreo($info, $nombre, $correo, $tel) {
		$splitted_info  = explode("::", $info);
		$total = explode("_",$splitted_info[1]);
		$productos = explode("__", $splitted_info[0]);
		$result['info'] = $info;
		$result['splitted_info'] = $splitted_info;
		$result['total'] = $total;
		$result['productos'] = $productos;
		$result['result'] = 1;
		Yii::import('application.extensions.JPhpMailer.JPhpMailer');
        $mail = new JPhpMailer();
        $mail->IsSMTP();
        $mail->CharSet="UTF-8";
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = 'smtp.gmail.com'; // SMTP a utilizar. Por ej. smtp.elserver.com
        $mail->Username = 'ob.peralta03@gmail.com'; // Correo completo a utilizar
        $mail->Password = 'omarbernardo'; // Contraseña
        $mail->Port = 587; // Puerto a utilizar
        $mail->AddAddress('ob.peralta03@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = 'Presupuesto de marenasa.com';	            
        $mail->From = 'ob.peralta03@gmail.com'; // Desde donde enviamos (Para mostrar)
        $mail->FromName = 'Pedidos en linea de marenasa';
        $body = "<style>
        	.pedido > thead {
        		font-weight: bold;
        		text-align: center;
        	}
        	.pedido > tbody > tr >td:nth-child(2) {
        		text-align: center;
        	}
        </style>";
        $body = $body.'Hola, </br> '.$nombre.
        ' se ha contactado por medio de la pagina web pidiendo una cotización de los siguientes productos: </br>';
        $body = $body.'<table class="pedido"><thead><tr><td>id</td><td><producto/td><td>cantidad</td><td>precio</td><td>subtotal</td></tr></thead><tbody>';
        $i=1;
        $count = count($productos);
        foreach ($productos as $data ) {
        	if($i < $count) {
	        	$datos = explode('-', $data);
		        $body = $body.'<tr>';
		        foreach($datos as $dat) {
			        $body = $body.'<td>'.$dat.'</td>';
		        }
		        $body = $body.'</tr>';
		    }
	        $i++;
        }

        $body = $body.'<tr>';
        foreach($total as $tot){
	        $body = $body.'<td>'.$tot.'</td>';
	    }
        $body = $body.'</tr>';
        $body = $body.'</tbody></table>';
        $body = $body.'<br> sus datos de contacto son: '.
        '<br> Nombre: '.$nombre.
        '<br> telefono: '.$tel.
        '<br> Correo: '.$correo;
		$result['datos'] = $body;
        $mail->Body = $body;
        $exito = $mail->send();
        if(!$exito) {
        	$result['result'] =0;
        }
		echo json_encode($result);

	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}