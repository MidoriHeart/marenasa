<?php

class PromocionesController extends Controller
{
    public $layout='//layouts/column2';
    public function filters()
    {
            return array(
                    'accessControl', // perform access control for CRUD operations
                    'postOnly + delete', // we only allow deletion via POST request
            );
    }
    public function actionIndex()
    {
        $promociones = MarenasaPromociones::model()->findAll();
        $this->render('index',array(
            'promociones'=>$promociones,
        ));
    }
    public function actionHistorial()
    {
        $promociones = MarenasaPromociones::model()->findAll();
        $this->render('historial',array(
            'promociones'=>$promociones,
        ));
    }
}
