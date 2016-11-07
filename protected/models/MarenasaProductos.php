<?php

/**
 * This is the model class for table "marenasa_productos".
 *
 * The followings are the available columns in table 'marenasa_productos':
 * @property string $id
 * @property string $id_categoria
 * @property string $id_marca
 * @property string $articulo
 * @property string $dimensiones
 * @property string $imagen
 * @property double $precio
 *
 * The followings are the available model relations:
 * @property MarenasaProductoCategorias $idCategoria
 * @property MarenasaProductoMarcas $idMarca
 */
class MarenasaProductos extends MActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MarenasaProductos the static model class
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
		return 'marenasa_productos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_categoria, id_marca, articulo', 'required','message'=>'{attribute} no puede dejarse vacio'),
			array('precio', 'numerical','message'=>'{attribute} debe ser numerico'),
			array('id_categoria, id_marca', 'length', 'max'=>11,'message'=>'{attribute} solo puede tener 11 caracter(es)'),
			array('articulo, dimensiones, imagen', 'length', 'max'=>150,'message'=>'{attribute} solo puede tener 150 caracter(es)'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_categoria, id_marca, articulo, dimensiones, imagen, precio', 'safe', 'on'=>'search'),
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
			'idCategoria' => array(self::BELONGS_TO, 'MarenasaProductoCategorias', 'id_categoria'),
			'idMarca' => array(self::BELONGS_TO, 'MarenasaProductoMarcas', 'id_marca'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_categoria' => 'Id Categoria',
			'id_marca' => 'Id Marca',
			'articulo' => 'Articulo',
			'dimensiones' => 'Dimensiones',
			'imagen' => 'Imagen',
			'precio' => 'Precio',
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
		$criteria->compare('id_categoria',$this->id_categoria,true);
		$criteria->compare('id_marca',$this->id_marca,true);
		$criteria->compare('articulo',$this->articulo,true);
		$criteria->compare('dimensiones',$this->dimensiones,true);
		$criteria->compare('imagen',$this->imagen,true);
		$criteria->compare('precio',$this->precio);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}