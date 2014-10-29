<?php
namespace common\model;

use CActiveRecord,
    CDbCriteria,
    CActiveDataProvider;

/**
 * This is the model class for table "server".
 *
 * The followings are the available columns in table 'server':
 *
 * @property string  $id
 * @property string  $name
 * @property integer $serverID
 * @property integer $gameID
 * @property integer $state
 * @property string  $user
 * @property string  $openTime
 * @property string  $description
 * @property string  $addTime
 * @property Game    $game
 */
class Server extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'server';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, serverID, gameID, openTime, addTime', 'required'),
            array('serverID, gameID, state', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 20),
            array('user', 'length', 'max' => 200),
            array('openTime, addTime', 'length', 'max' => 10),
            array('description', 'length', 'max' => 100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, serverID, gameID, state, user, openTime, description, addTime', 'safe', 'on' => 'search'),
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
            'game' => [static::HAS_ONE, 'common\model\Game', 'gameID']
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id'          => 'ID',
            'name'        => '服务器名称',
            'serverID'    => '官方ID，用来区别服务器',
            'gameID'      => '游戏ID',
            'state'       => '服务器状态',
            'user'        => '服务器测试帐号',
            'openTime'    => '开放时间',
            'description' => '服务器搜索词',
            'addTime'     => '增加时间',
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('serverID', $this->serverID);
        $criteria->compare('gameID', $this->gameID);
        $criteria->compare('state', $this->state);
        $criteria->compare('user', $this->user, true);
        $criteria->compare('openTime', $this->openTime, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('addTime', $this->addTime, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     *
     * @param string $className active record class name.
     * @return Server the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
