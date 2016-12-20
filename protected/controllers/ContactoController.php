<?php

class ContactoController extends Controller
{
	public function actionIndex()
	{
		$contacto = MarenasaContacto::model()->findAll();
		$sucursales = MarenasaSucursales::model()->findAll();
		$this->render('index', array('sucursales'=>$sucursales,'contacto'=>$contacto));
	}
public function actionSendCorreo() {

		
		$result['result'] = 1;
		Yii::import('application.extensions.JPhpMailer.JPhpMailer');
        $mail = new JPhpMailer();
        $mail->IsSMTP();
        $mail->CharSet="UTF-8";
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = 'smtp.gmail.com'; // SMTP a utilizar. Por ej. smtp.elserver.com
        $mail->Username = 'pedidos.marenasa@gmail.com'; // Correo completo a utilizar
        $mail->Password = 'marenasatepic2016'; // Contraseña
        $mail->Port = 587; // Puerto a utilizar
        $mail->AddAddress('pedidos.marenasa@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = 'Dudas y sugerencias marenasa.com';	            
        $mail->From =$_POST["correo"];// Desde donde enviamos (Para mostrar)
        $mail->FromName = $_POST["nombre"];
        $body = $_POST["asunto"]."<br> <br>  Correo del contacto: ".$_POST['correo']."<br> <br> Nombre de Contacto: ".$_POST['nombre'];

		$result['datos'] = $body;
        $mail->Body = $body;
        $exito = $mail->send();
        if(!$exito) {
        	$result['result'] =0;
        }
		echo json_encode($result);

	}
	public function actionSendContactoCorreo() {

		
		$result['result'] = 1;
		Yii::import('application.extensions.JPhpMailer.JPhpMailer');
        $mail = new JPhpMailer();
        $mail->IsSMTP();
        $mail->CharSet="UTF-8";
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'SSL';
        // $mail->Host = 'smtp.secureserver.net'; // SMTP a utilizar. Por ej. smtp.elserver.com
        $mail->Host = 'localhost'; // SMTP a utilizar. Por ej. smtp.elserver.com
        // $mail->Username = 'contact@marenasa.com'; // pedidos.marenasa@gmail.com //  Correo completo a utilizar
        $mail->Username = 'mrnsa@marenasa.com'; // pedidos.marenasa@gmail.com //  Correo completo a utilizar
        // $mail->Password = 'marenasaTepic2016'; // Contraseña contact@marenasa.com marenasaTepic2016
        $mail->Password = 'FP&r2$2kPe1kWP'; // Contraseña contact@marenasa.com marenasaTepic2016
        $mail->Port = 80; // Puerto a utilizar
        $mail->AddAddress('pedidos.marenasa@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = 'Contacto marenasa.com';	            
        $mail->From =$_POST["correo"];// Desde donde enviamos (Para mostrar)
        $mail->FromName = $_POST["nombre"];
        $mail->SMTPDebug = 3;
        if(isset ($_POST['noDcliente'])) {
        	$body = $_POST["asunto"]."<br> <br>  Correo del contacto: ".$_POST['correo']."<br> <br> Nombre de Contacto: ".$_POST['nombre']."<br> <br>  No. de cliente: ".$_POST['noDcliente']."<br> <br> Teléfono: ".$_POST['telefono'];
		}
		else {
	        $body = $_POST["asunto"]."<br> <br>  Correo del contacto: ".$_POST['correo']."<br> <br> Nombre de Contacto: ".$_POST['nombre']."<br> <br>  No. de cliente: No agregado<br> <br> Teléfono: ".$_POST['telefono'];	
		}
		$result[ 'datos'] = $body;
        $mail->Body = $body;
        $exito = $mail->send();
        if(!$exito) {
        	$result['error'] = $mail->ErrorInfo;
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