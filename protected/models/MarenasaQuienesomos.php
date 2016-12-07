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
           'img_superior'=>array('class'=>'span5 jcropImageSup'),
           'img_inferior'=>array('class'=>'span5 jcropImageInf'),            
        );

       return $array;
   }
   public function js() {
           $baseUrl = Yii::app()->baseUrl;
           $cs = Yii::app()->getClientScript();        
           $cs->registerScriptFile($baseUrl.'/js/plugins/JCrop/jquery.Jcrop.min.js');
           $cs->registerScriptFile($baseUrl.'/js/plugins/ColorBox/jquery.colorbox.js');
           $cs->registerScriptFile($baseUrl.'/js/ycm/quienesomos/cutImage.js');
           //	$cs->registerScriptFile($baseUrl.'/js/ycm/newgallery/newgallery_idmanager.js');

   }

   public function css() {
           $baseUrl = Yii::app()->baseUrl;
           $cs = Yii::app()->getClientScript();
           $cs->registerCssFile($baseUrl.'/css/plugins/JCrop/jquery.Jcrop.min.css');
           $cs->registerCssFile($baseUrl.'/js/plugins/ColorBox/colorbox.css');
           $cs->registerCssFile($baseUrl.'/css/ycm/historia/cutImage.css');
           $cs->registerCssFile($baseUrl.'/css/historia/historiaYcm.css');
   }
   public function extraPhpBeforeSaveValidate($model='',$post='',$paths='',$module=''){

         
   }

    public function extraHtml() {

       $array = array(
           'img_superior'=>'
                   <!-- # FancyBox y jcrop div # -->
                   <a id="clrbx_sup" href="#jcrop"></a>
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
                   ',

           'img_inferior'=>'
                   <!-- # FancyBox y jcrop div # -->
                   <a id="clrbx_inf" href="#jcrop"></a>
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
   public function extraPhpAfterSaveValidate($model='',$post='',$paths='', $module='')
   {   
   /**
    * guarda una imagen en el directorio especificado con las dimenciones dadas
    * en caso de no tener algun dato lanza un CExeption y no se guarda ninguna imagen
    * devuelve verdadero si la imagen fue almacenada satisfactoriamente en el servidor
    * SOLO FUNCIONA PARA IMAGENES SUBIDAS AL SERVIDOR MEDIANTE HTTP POST
    * @param string $nuevaImagen la imagen destino
    * @param string $imagen la imagen fuente
    * @param string $datos los datos para la imagen deben ser almenos x,y,w,h
    * @return boolean valor de exito(true) o fracaso(false)
    */
    //revisa que los datos de recorte de la imagen fueran enviados
       if($paths != null && $paths != '')
       {
           for($i=0; $i < count($paths); $i++)
           {
               if(!isset($post['x'],$post['y'],$post['w'],$post['h']))
                   throw new CHttpException(400,"No pudo cortar la imagen los parametros de recorte son invalidos");
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
                                       default : return "Unsupported picture type!";
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
                if($i == 0){
                	$imag = $model->img_superior;
                	$pth = 'img_superior';
                }
                else {
                	$imag = $model->img_inferior;
                	$pth = 'img_inferior';
                }
               $n = strpos($paths[$i], $pth);  //variable de imagen
               $new_path = substr($paths[$i], 0, $n);
               //si la imagen es cambiada con un update, toma la imagen anterior y la intenta borrar

               /* Nuevo PATH */
//                $new_path = $module->getAttributePath(__CLASS__,'logo').DIRECTORY_SEPARATOR.'cutted_image'.DIRECTORY_SEPARATOR;
               $new_path = $module->getAttributePath(__CLASS__,$pth).DIRECTORY_SEPARATOR;

               if($this->nombre_anterior2 != null)
                {
                    $baseUrl = Yii::app()->baseUrl;
                    $targetFile = $baseUrl."uploads/marenasaquienesomos/{$pth}/{$this->nombre_anterior2}";
                    unlink(realpath($targetFile));
                }
                 if($this->nombre_anterior != null)
                {
                    $baseUrl = Yii::app()->baseUrl;
                    $targetFile = $baseUrl."uploads/marenasaquienesomos/{$pth}/{$this->nombre_anterior}";
                    unlink(realpath($targetFile));
                }
               $new_path = $new_path.$imag;
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
