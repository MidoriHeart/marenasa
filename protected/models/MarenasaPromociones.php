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
                    array('id_producto, fecha_inicio, fecha_final, porcentaje', 'required'),
                    array('id_producto, porcentaje', 'numerical', 'integerOnly'=>true),
                    array('fecha_inicio, fecha_final', 'length', 'max'=>100),
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
                    'id' => 'ID',
                    'id_producto' => 'Producto',
                    'fecha_inicio' => 'Fecha de inicio',
                    'fecha_final' => 'Fecha final',
                    'porcentaje' => 'Porcentaje de promoci&oacute;n',
            );
    }
    public function attributeWidgets()
    {
        return array
        (
            array('id_producto', 'chosen'),
            array('fecha_inicio', 'date'),
            array('fecha_final', 'date'),
            array('porcentaje', 'textField'),
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
    public function adminSearch()
    {
        return array
        (
            'columns'=> array
            (
                array
                (
                    'name'=>'id_producto',
                    'value'=>'MarenasaPromociones::model()->getProducto($data->id_producto)',
                ),
                array
                (
                    'name'=>'fecha_inicio',
                    'value'=>'$data->fecha_inicio',
                ),
                array
                (
                    'name'=>'fecha_final',
                    'value'=>'$data->fecha_final',
                ),
                array
                (
                    'name'=>'porcentaje',
                    'value'=>'$data->porcentaje',
                ),
            )
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
    }
    public function js() 
    {
    }
    public function css() 
    {
    }
    public function extraHtml() 
    {
    }
    public function extraPhpBeforeSaveValidate($model='',$post='',$paths='',$module='')
    {
    }
    public function extraPhpAfterSaveValidate($model='',$post='',$paths='', $module='')
    {   
    }
    public function afterFind()
    {
    }
}
