<?php

class ProductosController extends Controller
{
    public function actionIndex()
    {
            $marca = MarenasaProductoMarcas::model()->findAll();
            $this->render('index', array('marca'=>$marca));
    }
    public function actionbuscador()
    {
        $categorias = MarenasaProductos::model()->id_categoriaChoices();
        $marcas = MarenasaProductos::model()->id_marcaChoices();
        $productos = MarenasaProductos::model()->findAll();
        $this->render('buscador', array
        (
            'categorias'    => $categorias,
            'marcas'        => $marcas,
            'productos'     => $productos,
        ));
    }
}