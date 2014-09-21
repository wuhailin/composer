<?php

/**
 * This is the model class for table "order".
 *
 * The followings are the available columns in table 'order':
 * @property integer $id
 * @property integer $userID
 * @property string $userType
 * @property string $sn
 * @property double $money
 * @property integer $paymentID
 * @property integer $serverID
 * @property integer $state
 * @property string $successTime
 * @property string $reason
 * @property string $addTime
 */
class Order extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userID, sn, money, paymentID, serverID, addTime', 'required'),
			array('userID, paymentID, serverID, state', 'numerical', 'integerOnly'=>true),
			array('money', 'numerical'),
			array('userType', 'length', 'max'=>45),
			array('sn', 'length', 'max'=>40),
			array('successTime, addTime', 'length', 'max'=>10),
			array('reason', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, userID, userType, sn, money, paymentID, serverID, state, successTime, reason, addTime', 'safe', 'on'=>'search'),
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
			'userID' => '用户ID',
			'userType' => '用户类型',
			'sn' => '订单表',
			'money' => '订单金额',
			'paymentID' => '充值方式',
			'serverID' => '服务器ID',
			'state' => '订单状态',
			'successTime' => '付费时间',
			'reason' => '确认理由',
			'addTime' => '订单创建时间',
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
		$criteria->compare('userID',$this->userID);
		$criteria->compare('userType',$this->userType,true);
		$criteria->compare('sn',$this->sn,true);
		$criteria->compare('money',$this->money);
		$criteria->compare('paymentID',$this->paymentID);
		$criteria->compare('serverID',$this->serverID);
		$criteria->compare('state',$this->state);
		$criteria->compare('successTime',$this->successTime,true);
		$criteria->compare('reason',$this->reason,true);
		$criteria->compare('addTime',$this->addTime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Order the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
