<?php

/**
 * This is the model class for table "marenasa_preguntas".
 *
 * The followings are the available columns in table 'marenasa_preguntas':
 * @property integer $id
 * @property integer $id_marenasa
 * @property string $pregunta
 * @property string $respuesta
 */
class MarenasaPreguntas extends MActiveRecord
{
	public $adminNames=array('Preguntas','pregunta','preguntas'); // admin interface, singular, plural
    public $downloadExcel=false; // Download Excel
    public $downloadMsCsv=false; // Download MS CSV
    public $downloadCsv=false; // Download CSV
    public $nombre_anterior;
    public $nombre_anterior2;
    public $hideCreateAction = false;
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
		return 'marenasa_preguntas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, id_marenasa, pregunta, respuesta', 'required'),
			array('id, id_marenasa', 'numerical', 'integerOnly'=>true),
			array('pregunta', 'length', 'max'=>100),
			array('respuesta', 'length', 'max'=>1000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_marenasa, pregunta, respuesta', 'safe', 'on'=>'search'),
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
			'id_marenasa' => 'Id Marenasa',
			'pregunta' => 'Pregunta',
			'respuesta' => 'Respuesta',
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
		$criteria->compare('id_marenasa',$this->id_marenasa);
		$criteria->compare('pregunta',$this->pregunta,true);
		$criteria->compare('respuesta',$this->respuesta,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MarenasaPreguntas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function attributeWidgets()
    {
        return array
        (
            array('pregunta', 'textArea'),
            array('respuesta', 'textArea'),
        );
    }
    public function adminSearch()
    {
        return array
        (
            'columns'=> array
            (
                array
                (
                    'name'=>'pregunta',
                    'value'=>'$data->pregunta',
                ),
                array
                (
                    'name'=>'respuesta',
                    'value'=>'$data->respuesta',
                ),
            )
        );
    }
}
