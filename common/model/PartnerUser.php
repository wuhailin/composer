<?php

/**
 * This is the model class for table "partner_user".
 *
 * The followings are the available columns in table 'partner_user':
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $encrypt
 * @property string $email
 * @property string $money
 * @property integer $pid
 * @property integer $sid
 * @property string $lastIP
 * @property string $lastTime
 * @property string $addIP
 * @property string $addtime
 */
class PartnerUser extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'partner_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, encrypt, pid, sid, lastTime, addtime', 'required'),
			array('pid, sid', 'numerical', 'integerOnly'=>true),
			array('username, password', 'length', 'max'=>20),
			array('encrypt', 'length', 'max'=>6),
			array('email', 'length', 'max'=>30),
			array('money, lastIP, lastTime, addIP, addtime', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password, encrypt, email, money, pid, sid, lastIP, lastTime, addIP, addtime', 'safe', 'on'=>'search'),
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
			'username' => '用户帐号',
			'password' => '密码',
			'encrypt' => '加密串',
			'email' => 'Email',
			'money' => 'Money',
			'pid' => '联运商ID',
			'sid' => '注册服务器',
			'lastIP' => 'Last Ip',
			'lastTime' => 'Last Time',
			'addIP' => '注册IP',
			'addtime' => 'Addtime',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('encrypt',$this->encrypt,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('money',$this->money,true);
		$criteria->compare('pid',$this->pid);
		$criteria->compare('sid',$this->sid);
		$criteria->compare('lastIP',$this->lastIP,true);
		$criteria->compare('lastTime',$this->lastTime,true);
		$criteria->compare('addIP',$this->addIP,true);
		$criteria->compare('addtime',$this->addtime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PartnerUser the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
