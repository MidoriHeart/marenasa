<?php

class ProductosController extends Controller
{
	public function actionIndex()
	{
		$marca = MarenasaProductoMarcas::model()->findAll();

		$this->render('index', array('marca'=>$marca));
	}
	public function actionGetProductos($id)
	{	
			$criteria = new CDbCriteria();
			$criteria->condition='id_marca ='.(int)$id;
			$productos = MarenasaProductos::model()->findAll($criteria);
			echo json_encode($productos);
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