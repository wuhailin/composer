<?php
namespace common\model;
use CActiveRecord,
    CDbCriteria,
    CActiveDataProvider;
/**
 * This is the model class for table "members".
 *
 * The followings are the available columns in table 'members':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $encrypt
 * @property string $email
 * @property string $name
 * @property integer $sex
 * @property string $money
 * @property string $regIP
 * @property string $QQ
 * @property string $lastIP
 * @property integer $lastTime
 * @property integer $addtime
 */
class Members extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'members';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, encrypt, name, addtime', 'required'),
			array('sex, lastTime, addtime', 'numerical', 'integerOnly'=>true),
			array('username, password, name', 'length', 'max'=>20),
			array('encrypt', 'length', 'max'=>6),
			array('email', 'length', 'max'=>25),
			array('money', 'length', 'max'=>8),
			array('regIP, lastIP', 'length', 'max'=>15),
			array('QQ', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password, encrypt, email, name, sex, money, regIP, QQ, lastIP, lastTime, addtime', 'safe', 'on'=>'search'),
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
			'username' => '会员帐号',
			'password' => '会员密码',
			'encrypt' => '会员密码加密串',
			'email' => '会员邮箱/用了主键,以后可以登录登录帐号',
			'name' => '会员名称',
			'sex' => '用户性别',
			'money' => 'Money',
			'regIP' => '注册IP',
			'QQ' => 'Qq',
			'lastIP' => '最后登录IP',
			'lastTime' => '最后登录时间',
			'addtime' => '会员注册/增加时间',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('encrypt',$this->encrypt,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('money',$this->money,true);
		$criteria->compare('regIP',$this->regIP,true);
		$criteria->compare('QQ',$this->QQ,true);
		$criteria->compare('lastIP',$this->lastIP,true);
		$criteria->compare('lastTime',$this->lastTime);
		$criteria->compare('addtime',$this->addtime);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Members the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
