<?php
class MarenasaHeaders extends CActiveRecord
{
    public $adminNames=array('Imagenes de los headers','imagen','imagenes'); // admin interface, singular, plural
    public $downloadExcel=false; // Download Excel
    public $downloadMsCsv=false; // Download MS CSV
    public $downloadCsv=false; // Download CSV
    public $nombre_anterior;
    public $nombre_anterior2;
    public $hideDeleteAction = true;
    public $hideCreateAction = true;
    public $hideListAction = false;
    public $hideUpdateAction = true;
    public function tableName()
    {
        return 'marenasa_headers';
    }
    public function rules()
    {
        return array
        (
            array('seccion, imagen', 'required'),
            array('seccion', 'numerical', 'integerOnly'=>true),
            array('imagen', 'length', 'max'=>100),
            array('id, seccion, imagen', 'safe', 'on'=>'search'),
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

            'imagen' => 'Imagen'
        );
    }
    public function search()
    {
        $criteria=new CDbCriteria;
        $criteria->compare('id',$this->id);
        $criteria->compare('seccion',$this->seccion);
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
            array('seccion', 'chosen'),
            array('imagen', 'image')
        );
    }
    public function seccionChoices()
    {
        return array
        (
            '1' => 'Quienes somos',
            '2' => 'Misión y visión',
            '3' => 'Productos',
            '4' => 'Contacto'
        );
    }
    public function getSeccion($id)
    {
        switch ($id)
        {
            case 1: return 'Quienes somos'; break;
            case 2: return 'Misión y visión'; break;
            case 3: return 'Productos'; break;
            case 4: return 'Contacto'; break;
        }
    }
    public function imagenWidget($nombre)
    {
        $b = Yii::app()->baseUrl;
        return "<div class='imagenWidget' style='background-image:url($b/uploads/marenasaheaders/imagen/$nombre)'></div>";
    }
    public function adminSearch()
    {
        return array
        (
            'columns'=> array
            (
                array
                (
                    'name'=>'seccion',
                    'value'=>'MarenasaHeaders::model()->getSeccion($data->seccion)',
                    'filter'=>''
                ),
                array
                (
                    'name' => 'imagen',
                    'type' => 'raw',
                    'value' => 'MarenasaHeaders::model()->imagenWidget($data->imagen)',
                    'filter' => ''
                )
            )
        );
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
        $cs->registerScriptFile($baseUrl.'/js/ycm/headers/cutImage.js');
    }
    public function css() 
    {
        $baseUrl = Yii::app()->baseUrl;
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile($baseUrl.'/css/plugins/JCrop/jquery.Jcrop.min.css');
        $cs->registerCssFile($baseUrl.'/js/plugins/ColorBox/colorbox.css');
        $cs->registerCssFile($baseUrl.'/css/ycm/headers/cutImage.css');
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
                if(!file_exists($paths[$i]))
                    throw new CHttpException(500,"La imagen no ha sido cargada correctamente");
                if(empty($post['w']) || empty($post['h']))
                    return move_uploaded_file($paths[$i],$paths[$i]);
                $width=$post["divwidth"];
                $height=$post["divheight"];
                $_SESSION["tipo"] = '';
                $_SESSION["creado"] = '';
                $ext = pathinfo($paths[$i], PATHINFO_EXTENSION);
                $type = strtolower($ext);
                if ($type === 'jpeg') {$type = 'jpg';}
                switch($type)
                {
                    case 'bmp': $img_r = imagecreatefromwbmp($paths[$i]); break;
                    case 'gif': $img_r = imagecreatefromgif($paths[$i]); break;
                    case 'jpg': $img_r = imagecreatefromjpeg($paths[$i]); break;
                    case 'png': $img_r = imagecreatefrompng($paths[$i]); break;
                    default : return "Unsupported picture type!, Please use one of the following: bmp, gif, jpg, jpeg or png";
                }
                $_SESSION["tipo"] = $type;
                $dst_r = imagecreatetruecolor( (int)$width, (int)$height );
                $calidad=100;
                if($type == "gif" || $type == "png")
                {
                    $r = imagecolortransparent($dst_r, imagecolorallocatealpha($img_r, 0, 0, 0, 127));
                    $_SESSION["creado"] = $r;
                    imagealphablending($dst_r, false);
                    imagesavealpha($dst_r, true);
                }
                $retorno= imagecopyresampled($dst_r,$img_r,0,0,(int)$post['x'],(int)$post['y'],
                    (int)$width,(int)$height,(int)$post['w'],(int)$post['h']);
                if($retorno === false)
                    return false;
                $n = strpos($paths[$i], "imagen");
                $new_path = substr($paths[$i], 0, $n);
                $new_path = $module->getAttributePath(__CLASS__,'imagen').DIRECTORY_SEPARATOR;
                $new_path = $new_path.$model->imagen;
                switch($type)
                {
                    case 'bmp': $retorno = imagewbmp($dst_r, $new_path); break;
                    case 'gif': $retorno = imagegif($dst_r, $new_path) ; break;
                    case 'jpg': $retorno = imagejpeg($dst_r, $new_path,$calidad); break;
                    case 'png': $retorno = imagepng($dst_r, $new_path) ; break;
                }
                if($retorno === false)
                    return false;
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
     public function allowDelImage(){}
}
