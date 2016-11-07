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

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('marca, logo', 'required','message'=>'{attribute} no puede dejarse vacio'),
			array('marca, logo', 'length', 'max'=>100,'message'=>'{attribute} solo puede tener 100 caracter(es)'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, marca, logo', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'marca' => 'Marca',
			'logo' => 'Logo',
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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}