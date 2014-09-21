<?php
namespace common\model;
/**
 * This is the model class for table "game".
 *
 * The followings are the available columns in table 'game':
 * @property integer $id
 * @property string $name
 * @property integer $type
 * @property integer $status
 * @property string $site
 * @property integer $ratio
 * @property string $picture
 * @property string $content
 * @property string $keyword
 * @property string $description
 * @property integer $orderNO
 * @property string $addTime
 */
class Game extends \CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'game';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, type, status, picture, addtime', 'required'),
			array('type, status, ratio, orderNO', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>20),
			array('site, addtime', 'length', 'max'=>10),
			array('keyword, description', 'length', 'max'=>100),
			array('content', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, type, status, site, ratio, picture, content, keyword, description, orderNO, addtime', 'safe', 'on'=>'search'),
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
			'name' => '游戏名称',
			'type' => '游戏类型',
			'status' => '游戏状态',
			'site' => '游戏拼音简称',
			'ratio' => '交易比例',
			'picture' => '焦点图片',
			'content' => '游戏介绍',
			'keyword' => '关键词',
			'description' => '搜索词',
			'orderNO' => '排序',
			'addTime' => 'Addtime',
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
	 * @return \CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new \CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('status',$this->status);
		$criteria->compare('site',$this->site,true);
		$criteria->compare('ratio',$this->ratio);
		$criteria->compare('picture',$this->picture,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('keyword',$this->keyword,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('orderNO',$this->orderNO);
		$criteria->compare('addTime',$this->addTime,true);

		return new \CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Game the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
