<?php

/**
 * This is the model class for table "picture".
 *
 * The followings are the available columns in table 'picture':
 * @property string $id
 * @property string $model
 * @property string $objectID
 * @property string $url
 * @property integer $audit
 * @property string $addTime
 */
class Picture extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'picture';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('url, addTime', 'required'),
			array('audit', 'numerical', 'integerOnly'=>true),
			array('model', 'length', 'max'=>45),
			array('objectID, addTime', 'length', 'max'=>10),
			array('url', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, model, objectID, url, audit, addTime', 'safe', 'on'=>'search'),
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
			'model' => '模型',
			'objectID' => '对象ID',
			'url' => '路径',
			'audit' => '审核',
			'addTime' => '创建时间',
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
		$criteria->compare('model',$this->model,true);
		$criteria->compare('objectID',$this->objectID,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('audit',$this->audit);
		$criteria->compare('addTime',$this->addTime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Picture the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
