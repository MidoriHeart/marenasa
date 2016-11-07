<?php

/**
 * This is the model class for table "marenasa_producto_categorias".
 *
 * The followings are the available columns in table 'marenasa_producto_categorias':
 * @property string $id
 * @property string $categoria
 * @property string $imagen
 *
 * The followings are the available model relations:
 * @property MarenasaProductos[] $marenasaProductoses
 */
class MarenasaProductoCategorias extends MActiveRecord
{
	public $adminNames=array('Categorías de productos','categoria de prodcto','categorías de productos'); // admin interface, singular, plural
    public $downloadExcel=false; // Download Excel
    public $downloadMsCsv=false; // Download MS CSV
    public $downloadCsv=false; // Download CSV
    public $nombre_anterior;
    public $nombre_anterior2;
    public $hideCreateAction = false;
    public $hideListAction = false;
    public $hideDeleteAction = false; 
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MarenasaProductoCategorias the static model class
	 */ 
	function behaviors() {
    	return array(
        'file' => array(
            'class'=>'application.modules.ycm.behaviors.FileBehavior',
           ),
        );
    }
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function attributeWidgets()
    {
        return array
        (
            array('categoria', 'textField'),
            array('imagen', 'image'),
        );
    }
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'marenasa_producto_categorias';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('categoria', 'required','message'=>'{attribute} no puede dejarse vacio'),
			array('categoria, imagen', 'length', 'max'=>100,'message'=>'{attribute} solo puede tener 100 caracter(es)'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, categoria, imagen', 'safe', 'on'=>'search'),
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
			'marenasaProductoses' => array(self::HAS_MANY, 'MarenasaProductos', 'id_categoria'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'categoria' => 'Categoría',
			'imagen' => 'imágen',
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
		$criteria->compare('categoria',$this->categoria,true);
		$criteria->compare('imagen',$this->imagen,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    public function imagenWidget($nombre)
    {
        $b = Yii::app()->baseUrl;
        return "<div class='imagenWidget' style='background-image:url($b/uploads/marenasaproductocategorias/imagen/$nombre)'></div>";
    }
    public function adminSearch()
    {
        return array
        (
            'columns'=> array
            (
                array
                (
                    'name'=>'categoria',
                    'value'=>'$data->categoria',
                ),
                array
                (
                    'name' => 'imagen',
                    'type' => 'raw',
                    'value' => 'MarenasaProductoCategorias::model()->imagenWidget($data->imagen)',
                    'filter' => ''
                ),
            )
        );
}