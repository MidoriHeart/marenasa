<?php

/**
 * This is the model class for table "marenasa_producto_marcas".
 *
 * The followings are the available columns in table 'marenasa_producto_marcas':
 * @property string $id
 * @property string $marca
 * @property string $logo
 *
 * The followings are the available model relations:
 * @property MarenasaProductos[] $marenasaProductoses
 */
class MarenasaProductoMarcas extends MActiveRecord
{
    public $adminNames=array('Marcas de productos','marca de productos','marcas de productos'); // admin interface, singular, plural
    public $downloadExcel=false; // Download Excel
    public $downloadMsCsv=false; // Download MS CSV
    public $downloadCsv=false; // Download CSV
    public $nombre_anterior;
    public $nombre_anterior2;
    public $hideCreateAction = false;
    public $hideListAction = false;
    public $hideUpdateAction = true;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MarenasaProductoMarcas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'marenasa_producto_marcas';
	}

	function behaviors() {
    	return array(
        'file' => array(
            'class'=>'application.modules.ycm.behaviors.FileBehavior',
           ),
        );
    }
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('marca', 'required','message'=>'{attribute} no puede dejarse vacio'),
			array('marca, logo', 'length', 'max'=>100,'message'=>'{attribute} solo puede tener 100 caracter(es)'),
            array('descripcion', 'length', 'max'=>250,'message'=>'{attribute} solo puede tener 250 caracter(es)'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, marca, logo, descripcion', 'safe', 'on'=>'search'),
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
			'marenasaProductoses' => array(self::HAS_MANY, 'MarenasaProductos', 'id_marca'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
            return array(
                    'marca' => 'Marca',
                    'logo' => 'Logo',
                    'descripcion' => 'Descripcion',
            );
	}
	public function attributeWidgets()
    {
        return array
        (
            array('marca', 'textField'),
            array('logo', 'image'),
            array('descripcion', 'textArea'),
        );
    }

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('marca',$this->marca,true);
		$criteria->compare('logo',$this->logo,true);
        $criteria->compare('descripcion',$this->descripcion,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    public function imagenWidget($nombre)
    {
        $b = Yii::app()->baseUrl;
        return "<div class='imagenWidget' style='background-image:url($b/uploads/marenasaproductomarcas/logo/$nombre)'></div>";
    }

	public function extraOptions() 
    {
        $array = array
        (
            'logo'=>array
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
        $cs->registerScriptFile($baseUrl.'/js/ycm/productocategorias/cutImage.js');
    }
    public function css() 
    {
        $baseUrl = Yii::app()->baseUrl;
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile($baseUrl.'/css/plugins/JCrop/jquery.Jcrop.min.css');
        $cs->registerCssFile($baseUrl.'/js/plugins/ColorBox/colorbox.css');
        $cs->registerCssFile($baseUrl.'/css/ycm/productoscategoria/cutImage.css');
        $cs->registerCssFile($baseUrl.'/css/ycm/productoscategoria/list.css');
    }
    public function adminSearch()
    {
        return array
        (
            'columns'=> array
            (
                array
                (
                    'name'=>'marca',
                    'value'=>'$data->marca',
                ),
                array
                (
                    'name' => 'logo',
                    'type' => 'raw',
                    'value' => 'MarenasaProductoMarcas::model()->imagenWidget($data->logo)',
                    'filter' => ''
                ),
                 array
                (
                    'name' => 'descripcion',
                    'value' => '$data->descripcion',
                ),
            )
        );
    }
    public function extraHtml() 
    {
        $array = array
        (
            'logo'=>'
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
                $n = strpos($paths[$i], "logo");  //variable de imagen
                $new_path = substr($paths[$i], 0, $n);
                //si la imagen es cambiada con un update, toma la imagen anterior y la intenta borrar

                /* Nuevo PATH */
//                $new_path = $module->getAttributePath(__CLASS__,'logo').DIRECTORY_SEPARATOR.'cutted_image'.DIRECTORY_SEPARATOR;
                $new_path = $module->getAttributePath(__CLASS__,'logo').DIRECTORY_SEPARATOR;

//                if($this->nombre_anterior2 != null)
//                {
//                    $baseUrl = Yii::app()->baseUrl;
//                    $targetFile = $baseUrl."uploads/marenasaproductomarcas/logo/{$this->nombre_anterior2}";
//                    unlink(realpath($targetFile));
//                }
                $new_path = $new_path.$model->logo;
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
                 'logo' => $model->nombre_anterior
             );
             $update = Yii::app()->db->createCommand()
                 ->update('marenasa_producto_marcas', $columnas, "id = ".(int)$model->id);
        }
    }
    public function afterFind()
    {
        if($this->logo != '' && $this->logo != null)
        {
            $this->nombre_anterior = $this->logo;
            $this->nombre_anterior2 = $this->logo;
        }
        else
        {
            $this->nombre_anterior = null;
            $this->nombre_anterior2 = null;
        }
    }
}