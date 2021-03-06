<?php
namespace common\model;

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 *
 * @property integer     $id
 * @property integer     $pid
 * @property string      $typeName
 * @property string      $typeDir
 * @property integer     $orderNO
 * @property string      $keyword
 * @property string      $description
 * @property integer     $enabled
 * @property Category    $parent
 * @property array|null  $children
 * @property array|null  $article
 */
class Category extends \CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'category';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('typeName', 'required'),
            array('pid, orderNO, enabled', 'numerical', 'integerOnly' => true),
            array('typeName, typeDir', 'length', 'max' => 20),
            array('keyword, description', 'length', 'max' => 45),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, pid, typeName, typeDir, orderNO, keyword, description, enabled', 'safe', 'on' => 'search'),
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
            'parent'   => [self::HAS_ONE, 'common\model\Category', 'pid', 'condition' => 't.enabled = 1'],
            'children' => [
                self::HAS_MANY,
                'common\model\Category',
                'pid',
                'condition' => 't.enabled = 1',
                'order'     => 'orderNO DESC, id'
            ],
            'article'  => [self::HAS_MANY, 'common\model\Article', 'category']
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id'          => 'ID',
            'pid'         => '父ID',
            'typeName'    => '栏目名称',
            'typeDir'     => '栏目子目录',
            'orderNO'     => '排序',
            'keyword'     => 'Keyword',
            'description' => 'Description',
            'enabled'     => '是否显示',
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

        $criteria = new \CDbCriteria;
        $criteria->compare('id', $this->id);
        $criteria->compare('pid', $this->pid);
        $criteria->compare('typeName', $this->typeName, true);
        $criteria->compare('typeDir', $this->typeDir, true);
        $criteria->compare('orderNO', $this->orderNO);
        $criteria->compare('keyword', $this->keyword, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('enabled', $this->enabled);
        return new \CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     *
     * @param string $className active record class name.
     * @return Category the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
