<?php

/**
 * This is the model class for table "marenasa_quienesomos".
 *
 * The followings are the available columns in table 'marenasa_quienesomos':
 * @property string $id
 * @property string $titulo
 * @property string $subtitulo
 * @property string $imagen
 * @property string $descripcion
 */
class MarenasaQuienesomos extends MActiveRecord
{
    public $adminNames=array('¿Quiénes somos?','¿quiénes somos?','¿quiénes somos?'); // admin interface, singular, plural
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
		return 'marenasa_quienesomos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define ru-les for those attributes that
		// will receive user inputs.
		return array(
			array('titulo, subtitulo,  descripcion', 'required'),
			array('titulo, subtitulo', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, titulo, subtitulo, descripcion', 'safe', 'on'=>'search'),
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
			'descripcion' => 'Descripcion',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('subtitulo',$this->subtitulo,true);
		$criteria->compare('descripcion',$this->descripcion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MarenasaQuienesomos the static model class
	 */

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}    
	/*
	* Funcion que regresa los widgets de cada elemento 
	* de la tabla
	* 
	*/
	public function attributeWidgets()
    {
        return array
        (
            array('titulo', 'textField'),
            array('subtitulo', 'textField'),

            array('descripcion', 'textArea'),
        );
    }
    public function getImagen($nombre)
    {
        $b = Yii::app()->baseUrl;
        return "<div class='imgQuienes' style='background-image: url($b/uploads/marenasaquienesomos/imagen/$nombre)'></div>";
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
                array
                (
                    'filter' => '',
                    'name'=>'descripcion',
                    'value'=>'$data->descripcion',
                ),
            )
        );
    }
}
