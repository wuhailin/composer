<?php
namespace common\model;
/**
 * This is the model class for table "article".
 *
 * The followings are the available columns in table 'article':
 * @property string $id
 * @property integer $category
 * @property integer $type
 * @property string $orderNO
 * @property integer $click
 * @property string $title
 * @property string $shortTitle
 * @property string $color
 * @property integer $creator
 * @property string $source
 * @property string $picture
 * @property string $senddate
 * @property string $keyword
 * @property integer $scores
 * @property integer $goodpost
 * @property integer $notpost
 * @property string $description
 * @property string $addTime
 */
class Article extends \CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'article';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category, click, title, color, creator, picture, addTime', 'required'),
			array('category, type, click, creator, scores, goodpost, notpost', 'numerical', 'integerOnly'=>true),
			array('orderNO, senddate, addTime', 'length', 'max'=>10),
			array('title', 'length', 'max'=>60),
			array('shortTitle, source, keyword', 'length', 'max'=>30),
			array('color', 'length', 'max'=>7),
			array('picture', 'length', 'max'=>100),
			array('description', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, category, type, orderNO, click, title, shortTitle, color, creator, source, picture, senddate, keyword, scores, goodpost, notpost, description, addTime', 'safe', 'on'=>'search'),
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
			'category' => '栏目ID',
			'type' => '类别ID',
			'orderNO' => '排序ID',
			'click' => '点击率',
			'title' => '标题',
			'shortTitle' => '短标题',
			'color' => '标题颜色',
			'creator' => '作者',
			'source' => '来源',
			'picture' => '图片',
			'senddate' => '发送时间',
			'keyword' => 'Keyword',
			'scores' => '踩',
			'goodpost' => '顶',
			'notpost' => '可否评论',
			'description' => 'Desc',
			'addTime' => 'Add Time',
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

		$criteria=new \CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('category',$this->category);
		$criteria->compare('type',$this->type);
		$criteria->compare('orderNO',$this->orderNO,true);
		$criteria->compare('click',$this->click);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('shortTitle',$this->shortTitle,true);
		$criteria->compare('color',$this->color,true);
		$criteria->compare('creator',$this->creator);
		$criteria->compare('source',$this->source,true);
		$criteria->compare('picture',$this->picture,true);
		$criteria->compare('senddate',$this->senddate,true);
		$criteria->compare('keyword',$this->keyword,true);
		$criteria->compare('scores',$this->scores);
		$criteria->compare('goodpost',$this->goodpost);
		$criteria->compare('notpost',$this->notpost);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('addTime',$this->addTime,true);

		return new \CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort' => [
                'defaultOrder' => 'addTime DESC',
            ]
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Article the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
