<?php

/**
 * This is the model class for table "marenasa_ofertas".
 *
 * The followings are the available columns in table 'marenasa_ofertas':
 * @property integer $id
 * @property integer $id_producto
 * @property string $fecha_inicio
 * @property string $fecha_final
 * @property integer $porcentaje
 *
 * The followings are the available model relations:
 * @property MarenasaProductos $idProducto
 */
class MarenasaPromociones extends MActiveRecord
{
    public $adminNames=array('Promociones','promoción','promociones'); // admin interface, singular, plural
    public $downloadExcel=false; // Download Excel
    public $downloadMsCsv=false; // Download MS CSV
    public $downloadCsv=false; // Download CSV
    public $nombre_anterior;
    public $nombre_anterior2;
    public $hideCreateAction = false;
    public $hideListAction = false;
    public $hideUpdateAction = true;
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
            return 'marenasa_promociones';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
            // NOTE: you should only define rules for those attributes that
            // will receive user inputs.
            return array(
                    array('fecha_final', 'required'),
                    array('id_producto, porcentaje', 'numerical', 'integerOnly'=>true),
                    array('fecha_inicio, fecha_final, imagen', 'length', 'max'=>100),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, id_producto, fecha_inicio, fecha_final, porcentaje', 'safe', 'on'=>'search'),
            );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
            // NOTE: you may need to adjust the relation name and the related
            // class name for the relations automatically generated below.
            return array(
                    'idProducto' => array(self::BELONGS_TO, 'MarenasaProductos', 'id_producto'),
            );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
            return array(
//                    'id' => 'ID',
//                    'id_producto' => 'Producto',
//                    'fecha_inicio' => 'Fecha de inicio',
                    'imagen' => 'Imagen',
                    'fecha_final' => 'Fecha final',
//                    'porcentaje' => 'Porcentaje de promoci&oacute;n',
            );
    }
    public function attributeWidgets()
    {
        return array
        (
//            array('id_producto', 'chosen'),
//            array('fecha_inicio', 'date'),
            array('imagen', 'image'),
            array('fecha_final', 'date'),
//            array('porcentaje', 'textField'),
        );
    }
    public function id_productoChoices()
    {
        $productos = MarenasaProductos::model()->findAll();
        $return = array();
        foreach($productos as $data)
            $return[$data->id] = $data->articulo;
        return $return;
    }
    public function getProducto($id)
    {
        return MarenasaProductos::model()->findByPk($id)->articulo;
    }
    public function getProductoImagen($id)
    {
        return MarenasaProductos::model()->findByPk($id)->imagen;
    }
    public function imagenWidget($nombre)
    {
        $b = Yii::app()->baseUrl;
        return "<div class='imagenWidget' style='background-image:url($b/uploads/marenasapromociones/imagen/$nombre)'></div>";
    }
    public function adminSearch()
    {
        return array
        (
            'columns'=> array
            (
//                array
//                (
//                    'name'=>'id_producto',
//                    'value'=>'MarenasaPromociones::model()->getProducto($data->id_producto)',
//                ),
//                array
//                (
//                    'name'=>'fecha_inicio',
//                    'value'=>'$data->fecha_inicio',
//                ),
                array
                (
                    'name' => 'imagen',
                    'type' => 'raw',
                    'value' => 'MarenasaPromociones::model()->imagenWidget($data->imagen)',
                    'filter' => ''
                ),
                array
                (
                    'name'=>'fecha_final',
                    'value'=>'$data->fecha_final',
                    'filter'=>''
                ),
//                array
//                (
//                    'name'=>'porcentaje',
//                    'value'=>'$data->porcentaje',
//                ),
            )
        );
    }
    public function getMeses()
    {
        echo '
            <option>Seleccionar</option>
            <option value="2016-01-01">Enero 2016</option>
            <option value="2016-08-01">Febrero 2016</option>
            <option value="2016-02-01">Marzo 2016</option>
            <option value="2016-03-01">Abril 2016</option>
            <option value="2016-04-01">Mayo 2016</option>
            <option value="2016-05-01">Junio 2016</option>
            <option value="2016-06-01">Julio 2016</option>
            <option value="2016-07-01">Agosto 2016</option>
            <option value="2016-09-01">Septiembre 2016</option>
            <option value="2016-10-01">Octubre 2016</option>
            <option value="2016-11-01">Noviembre 2016</option>
            <option value="2016-12-01">Diciembre 2016</option>';
    }
    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
            // @todo Please modify the following code to remove attributes that should not be searched.

            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);
            $criteria->compare('id_producto',$this->id_producto);
            $criteria->compare('fecha_inicio',$this->fecha_inicio,true);
            $criteria->compare('fecha_final',$this->fecha_final,true);
            $criteria->compare('porcentaje',$this->porcentaje);

            return new CActiveDataProvider($this, array(
                    'criteria'=>$criteria,
            ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return MarenasaOfertas the static model class
     */
    public static function model($className=__CLASS__)
    {
            return parent::model($className);
    }
    public function extraOptions() 
    {
        $array = array
        (
            'imagen'=>array
            (
                'class'=>'span5 jcropImage'
            ),            
        );
        return $array;
    }
    public function js() 
    {
        $baseUrl = Yii::app()->baseUrl;
        $cs = Yii::app()->getClientScript();        
        $cs->registerScriptFile($baseUrl.'/js/plugins/JCrop/jquery.Jcrop.min.js');
        $cs->registerScriptFile($baseUrl.'/js/plugins/ColorBox/jquery.colorbox.js');
        $cs->registerScriptFile($baseUrl.'/js/ycm/promociones/cutImage.js');
    }
    public function css() 
    {
        $baseUrl = Yii::app()->baseUrl;
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile($baseUrl.'/css/plugins/JCrop/jquery.Jcrop.min.css');
        $cs->registerCssFile($baseUrl.'/js/plugins/ColorBox/colorbox.css');
        $cs->registerCssFile($baseUrl.'/css/ycm/promociones/cutImage.css');
    }
    public function extraHtml() 
    {
        $array = array
        (
            'imagen'=>'
                <!-- # FancyBox y jcrop div # -->
                    <a id="clrbx" href="#jcrop"></a>
                    <div style="display:none;">
                        <div id="jcrop">
                            <table>
                                <tr>
                                    <td id="image_container">
                                    <img src="#" id="selected_image" alt="Imagen seleccionada"/>
                                    </td>
                                                                </tr>
                                                                <tr>
                                    <td>
                                    <div id="miniPreview" style="">
                                        <img src="#" id="preview" alt="vista previa" class="jcrop-preview" style="background-color:transparent;" />
                                    </div>
                                    <div id="miniButton">
                                        <input type="button" id="getCrop" value="Recortar Imagen" />
                                        <input type="hidden" id="x" name="x" value="" /> 
                                        <input type="hidden" id="y" name="y" value="" /> 
                                        <input type="hidden" id="w" name="w" value="" /> 
                                        <input type="hidden" id="h" name="h" value="" /> 
                                        <input type="hidden" id="divwidth" name="divwidth" value="" /> 
                                        <input type="hidden" id="divheight" name="divheight" value="" /> 
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:right;" colspan="2">
                                    </td>
                                </tr>
                            </table>
                        </div>  
                    </div>
                    '
            );
        return $array;
    }
    public function extraPhpBeforeSaveValidate($model='',$post='',$paths='',$module='')
    {
    }
    public function extraPhpAfterSaveValidate($model='',$post='',$paths='', $module='')
    {   
        if($paths != null && $paths != '')
        {
            for($i=0; $i < count($paths); $i++)
            {
                if(!isset($post['x'],$post['y'],$post['w'],$post['h']))
                    throw new CHttpException(400,"No fue posible recortar la imagen, los parametros de recorte son invalidos");
                //revisa que la imagen funte exista en el servidor
                if(!file_exists($paths[$i]))
                    throw new CHttpException(500,"La imagen no ha sido cargada correctamente");
                //si no trae el ancho y el largo intenta mover $imagen a la ruta de $nuevaImagen
                //tal cual sin recortar devido a que los parametros de recorte no son suficientes
                if(empty($post['w']) || empty($post['h'])){
                    return move_uploaded_file($paths[$i],$paths[$i]);
                }
                //width y height que tendra la imagen generada
                $width=$post["divwidth"];
                $height=$post["divheight"];
                //crea una copia de la imagen en memoria
                $_SESSION["tipo"] = '';
                $_SESSION["creado"] = '';
                $ext = pathinfo($paths[$i], PATHINFO_EXTENSION);
                $type = strtolower($ext);
                if ($type === 'jpeg') {$type = 'jpg';}
                switch($type){
                        case 'bmp': $img_r = imagecreatefromwbmp($paths[$i]); break;
                        case 'gif': $img_r = imagecreatefromgif($paths[$i]); break;
                        case 'jpg': $img_r = imagecreatefromjpeg($paths[$i]); break;
                        case 'png': $img_r = imagecreatefrompng($paths[$i]); break;
                        default : return "Unsupported picture type!, Please use one of the following: bmp, gif, jpg, jpeg or png";
                }
                $_SESSION["tipo"] = $type;
                //crea una nueva imagen en memoria del tamaño definido por width y height
                $dst_r = imagecreatetruecolor( (int)$width, (int)$height );
                //calidad de la imagen final
                $calidad=100;
                // intentamos preservar la transparencia
                if($type == "gif" || $type == "png"){
                        $r = imagecolortransparent($dst_r, imagecolorallocatealpha($img_r, 0, 0, 0, 127));
                        $_SESSION["creado"] = $r;
                        imagealphablending($dst_r, false);
                        imagesavealpha($dst_r, true);
                }
                //crea una imagen en memoria en base a la imagen fuente con los datos de recorte
                $retorno= imagecopyresampled($dst_r,$img_r,0,0,(int)$post['x'],(int)$post['y'],
                    (int)$width,(int)$height,(int)$post['w'],(int)$post['h']);
                //si no logro crear la co[ia de la imagen en memoria
                if($retorno === false){
                    return false;
                }
                $n = strpos($paths[$i], "imagen");  //variable de imagen
                $new_path = substr($paths[$i], 0, $n);
                //si la imagen es cambiada con un update, toma la imagen anterior y la intenta borrar

                /* Nuevo PATH */
//                $new_path = $module->getAttributePath(__CLASS__,'imagen').DIRECTORY_SEPARATOR.'cutted_image'.DIRECTORY_SEPARATOR;
                $new_path = $module->getAttributePath(__CLASS__,'imagen').DIRECTORY_SEPARATOR;

//                if($this->nombre_anterior2 != null)
//                {
//                    $baseUrl = Yii::app()->baseUrl;
//                    $targetFile = $baseUrl."uploads/marenasaproductomarcas/imagen/{$this->nombre_anterior2}";
//                    unlink(realpath($targetFile));
//                }
                $new_path = $new_path.$model->imagen;
                //intenta guardar la imagen resultante en el servidor
                                switch($type){
                                        case 'bmp': $retorno = imagewbmp($dst_r, $new_path); break;
                                        case 'gif': $retorno = imagegif($dst_r, $new_path) ; break;
                                        case 'jpg': $retorno = imagejpeg($dst_r, $new_path,$calidad); break;
                                        case 'png': $retorno = imagepng($dst_r, $new_path) ; break;
                                }
                if($retorno === false){
                    return false;
                }
            }
        }
        else
        {
             $columnas = array
             (
                 'imagen' => $model->nombre_anterior
             );
             $update = Yii::app()->db->createCommand()
                 ->update('marenasa_promociones', $columnas, "id = ".(int)$model->id);
        }
    }
    public function afterFind()
    {
        if($this->imagen != '' && $this->imagen != null)
        {
            $this->nombre_anterior = $this->imagen;
            $this->nombre_anterior2 = $this->imagen;
        }
        else
        {
            $this->nombre_anterior = null;
            $this->nombre_anterior2 = null;
        }
    }
}
