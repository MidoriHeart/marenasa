<?php

class ServiciosController extends Controller
{
	public function actionIndex()
	{
		$productos = MarenasaProductos::model()->findAll();
		$this->render('index', array('productos'=>$productos));
	}
	public function actionSendCorreo($id, $as, $d, $f) {
		$result['datos'] = $id;
		$result['result'] = 1;

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