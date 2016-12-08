<?php

/**
 * This is the model class for table "marenasa_boletin".
 *
 * The followings are the available columns in table 'marenasa_boletin':
 * @property integer $id
 * @property string $fecha
 * @property string $nombre
 * @property string $archivo
 */
class MarenasaBoletin extends MActiveRecord
{
	public $adminNames=array('Boletin Informativo','boletin','boletines'); // admin interface, singular, plural
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
		return 'marenasa_boletin';
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
			array('fecha, nombre, archivo', 'required'),
			array('nombre, archivo', 'length', 'max'=>200),
			array('archivo', 'file', 'on'=>'insert', 'allowEmpty'=>true, 'types'=>'jpg,jpeg,gif,png,gz,tar,zip,pdf,doc,docx,xls,xlsx,ppt,pptx,pps,ppsx', 'maxSize'=>1024*1024*6),
            array('archivo', 'file', 'on'=>'update', 'allowEmpty'=>true, 'types'=>'jpg,jpeg,gif,png,gz,tar,zip,pdf,doc,docx,xls,xlsx,ppt,pptx,pps,ppsx', 'maxSize'=>1024*1024*6),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fecha, nombre, archivo', 'safe', 'on'=>'search'),
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
			'fecha' => 'Fecha',
			'nombre' => 'Nombre',
			'archivo' => 'Archivo',
		);
	}
	public function attributeWidgets()
    {
        return array
        (
            array('archivo', 'file'),
            array('nombre', 'textField'),
            array('fecha', 'datetime'),


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
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('archivo',$this->archivo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MarenasaBoletin the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	 public function adminSearch()
    {
        return array
        (
            'columns'=> array
            (
                array
                (
                    'name'=>'fecha',
                    'value'=>'$data->fecha',
                ),
                array
                (
                    'name'=>'nombre',
                    'value'=>'$data->nombre',
                ),
                array
                (
                    'name'=>'archivo',
                    'value'=>'$data->archivo',
                ),
                     
            )
        );
    }
}
