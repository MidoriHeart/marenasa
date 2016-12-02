<?php

/**
 * This is the model class for table "marenasa_inicio".
 *
 * The followings are the available columns in table 'marenasa_inicio':
 * @property integer $id
 * @property string $titulo
 * @property string $subtitulo
 */
class MarenasaInicio extends MActiveRecord
{
	public $adminNames=array('Inicio ','inicio','inicios'); // admin interface, singular, plural
    public $downloadExcel=false; // Download Excel
    public $downloadMsCsv=false; // Download MS CSV
    public $downloadCsv=false; // Download CSV
    public $nombre_anterior;
   // public $nombre_anterior2;
    public $hideCreateAction = true;
    public $hideListAction = false;
    public $hideDeleteAction = false; 
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MarenasaProductoCategorias the static model class
	 */	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	} 
	function behaviors() {
    	return array(
        'file' => array(
            'class'=>'application.modules.ycm.behaviors.FileBehavior',
           ),
        );
    }
	public function attributeWidgets()
    {
        return array
        (
            array('titulo', 'textField'),
            array('subtitulo', 'textField'),
        );
    }
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'marenasa_inicio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo, subtitulo', 'required'),

			array('titulo', 'length', 'max'=>150),
			array('subtitulo', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, titulo, subtitulo', 'safe', 'on'=>'search'),
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
		
			'titulo' => 'Titulo',
			'subtitulo' => 'Subtitulo',
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
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('subtitulo',$this->subtitulo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	  public function adminSearch()
    {
        return array
        (
            'columns'=> array
            (
                array
                (
                    'name'=>'titulo',
                    'value'=>'$data->titulo',
                ),
                array
                (
                    'filter' => '',
                    'name'=>'subtitulo',
                    'value'=>'$data->subtitulo',
                ),
            )
        );
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MarenasaInicio the static model class
	 */

}
