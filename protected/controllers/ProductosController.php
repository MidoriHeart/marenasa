<?php

class ProductosController extends Controller
{
    public function actionIndex()
    {
        $marca = MarenasaProductoCategorias::model()->findAll();

        $this->render('index', array('marca'=>$marca));
    }
    public function actionProductosCategoria()
    {
          $categoria = MarenasaProductoCategorias::model()->findAll();
          $this->render('productoscategoria', array('categoria'=>$categoria));
    }
        public function actionProductosMarca()
    {
          $marcaso = MarenasaProductoMarcas::model()->findAll();
          $this->render('productosmarca', array('marcaso'=>$marcaso));
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
    public function actionGetProductos($id)
    {	
        $criteria = new CDbCriteria();
        $criteria->condition='id_marca ='.(int)$id;
        $productos = MarenasaProductos::model()->findAll($criteria);
        $result['result'] =1;

        $c = count($productos);
        $e=0;
        if( $c > 0 ) {
            foreach($productos as $data) {
                $result['productos'][$e]['articulo'] = $data->articulo;
                $result['productos'][$e]['id'] = $data->id;
                $result['productos'][$e]['imagen'] = $data->imagen;
                $e++;
            }
            // $result['productos'] = $productos;
        }
        else {
            $result['result'] = 0;
        }
        echo json_encode($result);
    }
    public function actionGetProductosMarca($id)
    {   
        $criteria = new CDbCriteria();
        $criteria->condition='id_categoria ='.(int)$id;
        $productos = MarenasaProductos::model()->findAll($criteria);
        $result['result'] =1;

        $c = count($productos);
        $e=0;
        if( $c > 0 ) {
            foreach($productos as $data) {
                $result['productos'][$e]['articulo'] = $data->articulo;
                $result['productos'][$e]['id'] = $data->id;
                $result['productos'][$e]['imagen'] = $data->imagen;
                $e++;
            }
            // $result['productos'] = $productos;
        }
        else {
            $result['result'] = 0;
        }
        echo json_encode($result);
    }
    public function actionSubcategorias($id)
    {
        $subcategorias = MarenasaSubcategoria::model()->findAll("id_categoria = $id");
        $this->render('subcategorias', array('subcategorias'=>$subcategorias));
    }
}