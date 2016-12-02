<?php

/**
 * This is the model class for table "marenasa_contacto".
 *
 * The followings are the available columns in table 'marenasa_contacto':
 * @property integer $id
 * @property string $descripcion
 * @property string $numero
 * @property string $otronumero
 * @property string $email
 * @property string $fax
 */
class MarenasaContacto extends MActiveRecord
{
	public $adminNames=array('Contacto','contacto','contactos'); // admin interface, singular, plural
    public $downloadExcel=false; // Download Excel
    public $downloadMsCsv=false; // Download MS CSV
    public $downloadCsv=false; // Download CSV
    public $nombre_anterior;
    public $nombre_anterior2;
    public $hideCreateAction = true;
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
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'marenasa_contacto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('descripcion, numero, otronumero, email, fax', 'required'),
			array('descripcion', 'length', 'max'=>400),
			array('numero, otronumero, fax', 'length', 'max'=>100),
			array('email', 'length', 'max'=>150),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, descripcion, numero, otronumero, email, fax', 'safe', 'on'=>'search'),
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

			'descripcion' => 'Descripcion',
			'numero' => 'Numero',
			'otronumero' => 'Otronumero',
			'email' => 'Email',
			'fax' => 'Fax',
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
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('otronumero',$this->otronumero,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('fax',$this->fax,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MarenasaContacto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	 	public function attributeWidgets()
    {
        return array
        (
            array('descripcion', 'textArea'),
            array('numero', 'textField'),
            array('otronumero', 'textField'),
            array('email', 'textField'),
            array('fax', 'textField'),


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
                    'name'=>'descripcion',
                    'value'=>'$data->descripcion',
                ),
                array
                (
                    'name'=>'numero',
                    'value'=>'$data->numero',
                ),
                                array
                (
                    'name'=>'otronumero',
                    'value'=>'$data->otronumero',
                ),
                array
                (
                    'name'=>'email',
                    'value'=>'$data->email',
                ),
                   array
                (
                    'name'=>'fax',
                    'value'=>'$data->fax',
                ),               
            )
        );
    }
}
