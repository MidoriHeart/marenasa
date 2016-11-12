<?php

class QuienesomosController extends Controller
{
	public function actionIndex()
	{
	//	$model = Quienesomos::model()->findAll();
		$somos = MarenasaQuienesomos::model()->findAll();
		$qs=MarenasaCarruselQS::model()->findAll();
		//print_r($somos);
		$this->render('index',array
			(
				 'somos'=>$somos,
				 'qs' => $qs));
	}

	// Uncomment the following methods and override them if needed
	/*s
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