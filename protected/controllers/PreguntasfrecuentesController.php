<?php

class PreguntasfrecuentesController extends Controller
{
    public function actionIndex()
    {
        $categorias = MarenasaPreguntasCategoria::model()->findAll();
        $preguntas = MarenasaPreguntas::model()->findAll();
        $this->render('index', array
            (
                'categorias'=>$categorias,
                'preguntas_freq'=>$preguntas
            ));
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