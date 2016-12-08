<?php

/**
 * This is the model class for table "marenasa_quienesomos".
 *
 * The followings are the available columns in table 'marenasa_quienesomos':
 * @property string $id
 * @property string $titulo
 * @property string $subtitulo
 * @property string $imagen
 * @property string $descripcion
 */
class MarenasaQuienesomos extends MActiveRecord
{
    public $adminNames=array('¿Quiénes somos?','¿quiénes somos?','¿quiénes somos?'); // admin interface, singular, plural
    public $downloadExcel=false; // Download Excel
    public $downloadMsCsv=false; // Download MS CSV
    public $downloadCsv=false; // Download CSV
    public $nombre_anterior;
    public $nombre_anterior2;
    public $hideCreateAction = true;
    public $hideListAction = true;
    public $hideDeleteAction = true;  

    function behaviors() {
        return array(
            'file' => array(
                'class'=>'application.modules.ycm.behaviors.FileBehavior',
            ),
        );
    }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'marenasa_quienesomos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define ru-les for those attributes that
		// will receive user inputs.
		return array(
			array('titulo, subtitulo,  descripcion', 'required'),
			array('titulo, subtitulo', 'length', 'max'=>100),
                    array('img_superior, img_inferior', 'file', 'on'=>'insert', 'allowEmpty'=>true, 'types'=>'jpg,jpeg,gif,png', 'maxSize'=>1024*1024*6),
                    array('img_superior, img_inferior', 'file', 'on'=>'update', 'allowEmpty'=>true, 'types'=>'jpg,jpeg,gif,png', 'maxSize'=>1024*1024*6),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, titulo, subtitulo, descripcion, img_superior, img_inferior', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'titulo' => 'Titulo',
			'subtitulo' => 'Subtitulo', 
			'descripcion' => 'Descripcion',
			'img_superior' => 'Imagen superior',
			'img_inferior' => 'Imagen inferior',
		);
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('subtitulo',$this->subtitulo,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('img_superior',$this->descripcion,true);
		$criteria->compare('img_inferior',$this->descripcion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MarenasaQuienesomos the static model class
	 */

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}    
	/*
	* Funcion que regresa los widgets de cada elemento 
	* de la tabla
	* 
	*/
    public function attributeWidgets()
    {
        return array
        (
            array('titulo', 'textField'),
            array('subtitulo', 'textField'),
            array('descripcion', 'textArea'),
            array('img_superior', 'image'),
            array('img_inferior', 'image'),
        );
    }
    public function getImagenSuperior($nombre)
    {
        $b = Yii::app()->baseUrl;
        return "<div class='imgQuienes' style='background-image: url($b/uploads/marenasaquienesomos/img_superior/$nombre)'></div>";
    }
    public function getImagenInferior($nombre)
    {
        $b = Yii::app()->baseUrl;
        return "<div class='imgQuienes' style='background-image: url($b/uploads/marenasaquienesomos/img_inferior/$nombre)'></div>";
    }
    public function adminSearch()
    {
        return array
        (
            'columns'=> array
            (
                array
                (
                    'name'=>'titulo',
                    'value'=>'$data->titulo',
                ),
                array
                (
                    'filter' => '',
                    'name'=>'subtitulo',
                    'value'=>'$data->subtitulo',
                ),
                array
                (
                    'filter' => '',
                    'name'=>'descripcion',
                    'value'=>'$data->descripcion',
                ),
                array
                (
                    'name'=>'img_superior',
                    'value'=>'MarenasaQuienesomos::model()->getImagenSuperior($data->img_superior)',
                    'type' => 'raw',
                    'filter' => ''
                ),
                array
                (
                    'name'=>'img_inferior',
                    'value'=>'MarenasaQuienesomos::model()->getImagenInferior($data->img_inferior)',
                    'type' => 'raw',
                    'filter' => ''
                ),
            )
        );
    }
    public function extraOptions() {
        $array = array(
           'img_superior'=>array('class'=>'span5 jcropImage1', 'data-num'=> 1),
           'img_inferior'=>array('class'=>'span5 jcropImage2', 'data-num'=> 2),            
        );

       return $array;
   }
   public function js() {
           $baseUrl = Yii::app()->baseUrl;
           $cs = Yii::app()->getClientScript();        
           $cs->registerScriptFile($baseUrl.'/js/plugins/JCrop/jquery.Jcrop.min.js');
           $cs->registerScriptFile($baseUrl.'/js/plugins/ColorBox/jquery.colorbox.js');
           $cs->registerScriptFile($baseUrl.'/js/ycm/quienesSomos/cutImage.js');
           $cs->registerScriptFile($baseUrl.'/js/ycm/quienesSomos/cutImage2.js');

   }

   public function css() {
           $baseUrl = Yii::app()->baseUrl;
           $cs = Yii::app()->getClientScript();
           $cs->registerCssFile($baseUrl.'/css/plugins/JCrop/jquery.Jcrop.min.css');
           $cs->registerCssFile($baseUrl.'/js/plugins/ColorBox/colorbox.css');
           $cs->registerCssFile($baseUrl.'/css/ycm/quienesSomos/cutImage.css');
   }
   public function extraPhpBeforeSaveValidate($model='',$post='',$paths='',$module=''){

         
   }

    public function extraHtml() 
    {
       $array = array(
           'img_superior'=>'
                <!-- # FancyBox y jcrop div # -->
                        <a id="clrbx1" href="#jcrop1"></a>
                        <div style="display:none;">
                            <div id="jcrop1">
                                <table>
                                    <tr>
                                        <td id="image_container">
                                         <img src="#" id="selected_image" alt="Imagen seleccionada"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div id="miniPreview" style="">
                                                <img src="#" id="preview1" alt="vista previa" class="jcrop-preview" style="background-color:transparent;" />
                                            </div>
                                            <div class ="boton1">
                                                <input type="button" id="getCrop" value="Recortar Imagen" />
                                                <input type="hidden" id="x1" name="x[1]" value="" /> 
                                                <input type="hidden" id="y1" name="y[1]" value="" /> 
                                                <input type="hidden" id="w1" name="w[1]" value="" /> 
                                                <input type="hidden" id="h1" name="h[1]" value="" /> 
                                                <input type="hidden" id="divwidth1" name="divwidth[1]" value="" /> 
                                                <input type="hidden" id="divheight1" name="divheight[1]" value="" /> 
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
                        ',
           'img_inferior'=>'
                <!-- # FancyBox y jcrop div # -->
                        <a id="clrbx2" href="#jcrop2"></a>
                        <div style="display:none;">
                            <div id="jcrop2">
                                <table>
                                    <tr>
                                        <td id="image_container2">
                                         <img src="#" id="selected_image2" alt="Imagen seleccionada"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div id="miniPreview" style="">
                                                <img src="#" id="preview2" alt="vista previa" class="jcrop-preview" style="background-color:transparent;" />
                                            </div>
                                            <div class="boton2">
                                                <input type="button" id="getCrop2" value="Recortar Imagen" />
                                                <input type="hidden" id="x2" name="x[0]" value="" /> 
                                                <input type="hidden" id="y2" name="y[0]" value="" /> 
                                                <input type="hidden" id="w2" name="w[0]" value="" /> 
                                                <input type="hidden" id="h2" name="h[0]" value="" /> 
                                                <input type="hidden" id="divwidth2" name="divwidth[0]" value="" /> 
                                                <input type="hidden" id="divheight2" name="divheight[0]" value="" /> 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:right;" colspan="2"></td>
                                    </tr>
                                </table>
                            </div>  
                        </div>
                        '
       );
       return $array;
   }
   public function extraPhpAfterSaveValidate($model='',$post='',$paths='', $module='')
   {   
        if(is_array($paths) && count($paths)>0)
        {
           for($i=0; $i < count($paths); $i++)
           $_SESSION['count'] =  count($paths);
            if ( count($paths) === 1)//se revisa si se subio/cambió solo una imagen de las dos existentes en el modelo ( tablas ) 
            {  
                $_SESSION["prueba"] = "Entra a que solo hay una imagen";
                $position = strrpos($paths[$i], 'image2' ); // se inspecciona si es el campo en la tabla de la primera imagen ( image )
                if( !$position ) //si es así, se cambia el valor de el ciclo para que trabaje con las variables de post correspondientes a dicha imagen.
                   $j = $i+1; 
                else
                    $j = $i;
            }
            else {
                $j = $i;
                $_SESSION["prueba"] = "Entra a que hay 2 imagenes";
            }
            if(isset($post['x'][$j]) && $post['x'][$j]!='')
            {
                if(!isset($post['x'][$j],$post['y'][$j],$post['w'][$j],$post['h'][$j]))
                    throw new CHttpException(400,"No pudo cortar la imagen los parametros de recorte son invalidos");
                //revisa que la imagen funte exista en el servidor
                if(!file_exists($paths[$i]))
                    throw new CHttpException(500,"La imagen no ha sido cargada correctamente");
                //si no trae el ancho y el largo intenta mover $imagen a la ruta de $nuevaImagen
                //tal cual sin recortar devido a que los parametros de recorte no son suficientes
                if(empty($post['w'][$j]) || empty($post['h'][$j]))
                {
                    $_SESSION["prueba"] = "Entra a que no hay imagen";
                    return @move_uploaded_file($paths[$i],$paths[$i]);
                }
                //width y height que tendra la imagen generada
                $width=(int)$post["divwidth"][$j];
                $height=(int)$post["divheight"][$j];
                $ext = pathinfo($paths[$i], PATHINFO_EXTENSION);
                $type = strtolower($ext);
                        if ($type === 'jpeg') {$type = 'jpg';}
                        switch($type){
                                case 'bmp': $img_r = imagecreatefromwbmp($paths[$i]); break;
                                case 'gif': $img_r = imagecreatefromgif($paths[$i]); break;
                                case 'jpg': $img_r = imagecreatefromjpeg($paths[$i]); break;
                                case 'png': $img_r = imagecreatefrompng($paths[$i]); break;
                                default : return "Unsupported picture type!";
                        }
                //crea una nueva imagen en memoria del tamaño definido por width y height
                $dst_r = @ImageCreateTrueColor( (int)$width, (int)$height );
                //calidad de la imagen final
                $calidad=100;
                            if($type == "gif" || $type == "png")
                            {
                                $r = imagecolortransparent($dst_r, imagecolorallocatealpha($img_r, 0, 0, 0, 127));
                                imagealphablending($dst_r, false);
                                imagesavealpha($dst_r, true);
                            }          
                //crea una imagen en memoria en base a la imagen fuente con los datos de recorte
                $retorno=@imagecopyresampled($dst_r,$img_r,0,0,(int)$post['x'][$j],(int)$post['y'][$j],
                    (int)$width,(int)$height,(int)$post['w'][$j],(int)$post['h'][$j]);
                //si no logro crear la co[ia de la imagen en memoria
                if($retorno === false)
                {
                    return false;
                }
                //intenta guardar la imagen resultante en el servidor
                 switch($type){
                    case 'bmp': $retorno = imagewbmp($dst_r, $paths[$i]); break;
                    case 'gif': $retorno = imagegif($dst_r, $paths[$i]) ; break;
                    case 'jpg': $retorno = imagejpeg($dst_r, $paths[$i],$calidad); break;
                    case 'png': $retorno = imagepng($dst_r, $paths[$i]) ; break;
                }
                //si no logra crear la imagen en el servidor
                if($retorno === false)
                {
                    return false;
                }
            }
        }
        else
        {
             $columnas = array
             (
                 'img_superior' => $model->nombre_anterior,
                 'img_inferior' => $model->nombre_anterior2,
             );
             $update = Yii::app()->db->createCommand()
                 ->update('marenasa_quienesomos', $columnas, "id = ".(int)$model->id);
        }
    }
    public function afterFind()
    {
        if($this->img_superior != '' && $this->img_superior != null)
        {
            $this->nombre_anterior = $this->img_superior;
        }
        else
        {
            $this->nombre_anterior = null;
        }
        if($this->img_inferior != '' && $this->img_inferior != null)
        {
            $this->nombre_anterior2 = $this->img_inferior;
        }
        else
        {
            $this->nombre_anterior2 = null;
        }
    }
}
