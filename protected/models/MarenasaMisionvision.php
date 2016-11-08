<?php

/**
 * This is the model class for table "marenasa_misionvision".
 *
 * The followings are the available columns in table 'marenasa_misionvision':
 * @property integer $id
 * @property string $mision
 * @property string $vision
 */
class MarenasaMisionvision extends CActiveRecord
{
	public $adminNames=array('Mision y Vision','mision y vision','mision y vision'); // admin interface, singular, plural
    public $downloadExcel=false; // Download Excel
    public $downloadMsCsv=false; // Download MS CSV
    public $downloadCsv=false; // Download CSV
    public $nombre_anterior;
    public $nombre_anterior2;
    public $hideCreateAction = false;
    public $hideListAction = true;
    public $hideDeleteAction = true; 

	/**
	 * @return string the associated database table name
	 */
	    function behaviors() {
    return array(
        'file' => array(
            'class'=>'application.modules.ycm.behaviors.FileBehavior',
           ),
        );
    }
	public function tableName()
	{
		return 'marenasa_misionvision';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, mision, vision', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('mision, vision', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, mision, vision', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'mision' => 'Mision',
			'vision' => 'Vision',
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
		$criteria->compare('mision',$this->mision,true);
		$criteria->compare('vision',$this->vision,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MarenasaMisionvision the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
