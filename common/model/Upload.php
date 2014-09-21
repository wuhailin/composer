<?php

/**
 * This is the model class for table "upload".
 *
 * The followings are the available columns in table 'upload':
 * @property string $id
 * @property string $directory
 * @property string $sha1
 * @property string $suffix
 * @property integer $exists
 * @property string $addTime
 */
class Upload extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'upload';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('directory, sha1, addTime', 'required'),
			array('exists', 'numerical', 'integerOnly'=>true),
			array('directory', 'length', 'max'=>50),
			array('sha1', 'length', 'max'=>40),
			array('suffix, addTime', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, directory, sha1, suffix, exists, addTime', 'safe', 'on'=>'search'),
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
			'directory' => '文件保存目录',
			'sha1' => '保存文件sha1值，可以有效防止多余文件',
			'suffix' => '文件后缀',
			'exists' => '文件是否存在，如不存在下次 再删除该数据',
			'addTime' => '增加时间',
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
		$criteria->compare('directory',$this->directory,true);
		$criteria->compare('sha1',$this->sha1,true);
		$criteria->compare('suffix',$this->suffix,true);
		$criteria->compare('exists',$this->exists);
		$criteria->compare('addTime',$this->addTime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Upload the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
