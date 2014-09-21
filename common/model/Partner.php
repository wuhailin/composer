<?php

/**
 * This is the model class for table "partner".
 *
 * The followings are the available columns in table 'partner':
 * @property integer $id
 * @property string $agent
 * @property string $name
 * @property string $loginKey
 * @property string $payKey
 * @property string $otherKey
 * @property string $domain
 * @property string $pass
 * @property string $encrypt
 * @property string $games
 * @property integer $status
 * @property string $validity
 * @property string $remark
 * @property string $addtime
 */
class Partner extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'partner';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('agent, loginKey, payKey, otherKey, domain, pass, encrypt, addtime', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('agent, name, domain, pass', 'length', 'max'=>20),
			array('loginKey, payKey, otherKey', 'length', 'max'=>50),
			array('encrypt', 'length', 'max'=>6),
			array('games', 'length', 'max'=>200),
			array('validity, addtime', 'length', 'max'=>10),
			array('remark', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, agent, name, loginKey, payKey, otherKey, domain, pass, encrypt, games, status, validity, remark, addtime', 'safe', 'on'=>'search'),
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
			'agent' => '合作方代码',
			'name' => '名称',
			'loginKey' => '登录密钥',
			'payKey' => '充值密钥',
			'otherKey' => 'Other Key',
			'domain' => '官方域名',
			'pass' => '后台登录密码',
			'encrypt' => '密码加密串',
			'games' => '合作游戏ID',
			'status' => '合作状态',
			'validity' => '合作期限',
			'remark' => '备注信息',
			'addtime' => '注册时间',
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
		$criteria->compare('agent',$this->agent,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('loginKey',$this->loginKey,true);
		$criteria->compare('payKey',$this->payKey,true);
		$criteria->compare('otherKey',$this->otherKey,true);
		$criteria->compare('domain',$this->domain,true);
		$criteria->compare('pass',$this->pass,true);
		$criteria->compare('encrypt',$this->encrypt,true);
		$criteria->compare('games',$this->games,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('validity',$this->validity,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('addtime',$this->addtime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Partner the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
