<?php
class MarenasaSubcategoria extends CActiveRecord
{
    public $adminNames=array('Subcategorias','subcategoria','subcategorias'); // admin interface, singular, plural
    public $downloadExcel=false; // Download Excel
    public $downloadMsCsv=false; // Download MS CSV
    public $downloadCsv=false; // Download CSV
    public $nombre_anterior;
    public $nombre_anterior2;
    public $hideCreateAction = false;
    public $hideListAction = false;
    public $hideUpdateAction = true;
    public function tableName()
    {
        return 'marenasa_subcategoria';
    }
    public function rules()
    {
        return array
        (
            array('id_categoria, nombre, descripcion, imagen', 'required'),
            array('id, id_categoria', 'numerical', 'integerOnly'=>true),
            array('nombre, imagen', 'length', 'max'=>100),
            array('imagen', 'file', 'on'=>'insert', 'allowEmpty'=>true, 'types'=>'jpg,jpeg,gif,png', 'maxSize'=>1024*1024*6),
            array('imagen', 'file', 'on'=>'update', 'allowEmpty'=>true, 'types'=>'jpg,jpeg,gif,png', 'maxSize'=>1024*1024*6),
            array('id, id_categoria, nombre, descripcion, imagen', 'safe', 'on'=>'search'),
        );
    }
    function behaviors() 
    {
    	return array
        (
            'file' => array
            (
                'class'=>'application.modules.ycm.behaviors.FileBehavior',
            ),
        );
    }
    public function relations()
    {
        return array();
    }
    public function attributeLabels()
    {
        return array
        (
            'id' => 'ID',
            'id_categoria' => 'Categor&iacute;a',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripción',
            'imagen' => 'Imagen',
        );
    }
    public function search()
    {
        $criteria=new CDbCriteria;
        $criteria->compare('id',$this->id);
        $criteria->compare('id_categoria',$this->id_categoria);
        $criteria->compare('nombre',$this->nombre,true);
        $criteria->compare('descripcion',$this->descripcion,true);
        $criteria->compare('imagen',$this->imagen,true);
        return new CActiveDataProvider($this, array
        (
            'criteria'=>$criteria,
        ));
    }
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    public function attributeWidgets()
    {
        return array
        (
            array('nombre', 'textField'),
            array('id_categoria', 'chosen'),
            array('descripcion', 'textArea'),
            array('imagen', 'image'),
        );
    }
    public function id_categoriaChoices()
    {
        $model = MarenasaProductoCategorias::model()->findAll();
        $return = array();
        if(count($model > 0))
        {
            foreach ($model as $data)
            {
                $return[$data->id] = $data->categoria;
            }
        }
        return $return;
    }
    public function getCategoria($id)
    {
        return MarenasaProductoCategorias::model()->findByPk($id)->categoria;
    }
    public function getImagen($nombre)
    {
        $b = Yii::app()->baseUrl;
        return "<div class='imgSub' style='background-image: url($b/uploads/marenasasubcategoria/imagen/$nombre)'></div>";
    }
    public function allowDelImage()
    {
        
    }
    public function adminSearch()
    {
        return array
        (
            'columns'=> array
            (
                array
                (
                    'name'=>'nombre',
                    'value'=>'$data->nombre',
                ),
                array
                (
                    'name'      =>'id_categoria',
                    'value'     =>'MarenasaSubcategoria::model()->getCategoria($data->id_categoria)',
                    'filter'    => MarenasaSubcategoria::model()->id_categoriaChoices()
                ),
                array
                (
                    'name'=>'descripcion',
                    'value'=>'$data->descripcion',
                ),
                array
                (
                    'filter'    => '',
                    'name'      =>'imagen',
                    'value'     =>'MarenasaSubcategoria::model()->getImagen($data->imagen)',
                    'type'      => 'raw',
                )
            )
        );
    }
    public function extraOptions() 
    {
        $array = array(
           'imagen'=>array('class'=>'span5 jcropImage'),            
        );
        return $array;
    }
    public function js() 
    {
        $baseUrl = Yii::app()->baseUrl;
        $cs = Yii::app()->getClientScript();        
        $cs->registerScriptFile($baseUrl.'/js/plugins/JCrop/jquery.Jcrop.min.js');
        $cs->registerScriptFile($baseUrl.'/js/plugins/ColorBox/jquery.colorbox.js');
        $cs->registerScriptFile($baseUrl.'/js/ycm/productocategorias/cutImageSub.js');
    }
    public function css() 
    {
        $baseUrl = Yii::app()->baseUrl;
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile($baseUrl.'/css/plugins/JCrop/jquery.Jcrop.min.css');
        $cs->registerCssFile($baseUrl.'/js/plugins/ColorBox/colorbox.css');
        $cs->registerCssFile($baseUrl.'/css/ycm/productoscategoria/cutImageSub.css');
    }
    public function extraPhpBeforeSaveValidate($model='',$post='',$paths='',$module=''){}
    public function extraHtml() 
    {
        $array = array(
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
                                        <input type="hidden" id="divwidth" name="divwidth" value=""/> 
                                        <input type="hidden" id="divheight" name="divheight" value=""/> 
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
           if(is_array($paths) && count($paths)>0)
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
                   $n = strpos($paths[$i], "imagen");  //variable de imagen
                   $new_path = substr($paths[$i], 0, $n);
                   //si la imagen es cambiada con un update, toma la imagen anterior y la intenta borrar

                   /* Nuevo PATH */
   //                $new_path = $module->getAttributePath(__CLASS__,'logo').DIRECTORY_SEPARATOR.'cutted_image'.DIRECTORY_SEPARATOR;
                   $new_path = $module->getAttributePath(__CLASS__,'imagen').DIRECTORY_SEPARATOR;

                   /* if($nombre_anterior2 != null)
                    {
                        $baseUrl = Yii::app()->baseUrl;
                        $targetFile = $baseUrl."uploads/marenasainiciocarrucel/imagen/{$nombre_anterior2}";
                        unlink(realpath($targetFile));
                    }*/
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
    }
    public function afterFind()
    {
        if($this->imagen != '' && $this->imagen != null)
        {
            $this->nombre_anterior = $this->imagen;
            $nombre_anterior2 = $this->imagen;
        }
        else
        {
            $this->nombre_anterior = null;
            $nombre_anterior2 = null;
        }
    }
}