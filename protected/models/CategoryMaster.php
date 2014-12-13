<?php

/**
 * This is the model class for table "category_master".
 *
 * The followings are the available columns in table 'category_master':
 * @property integer $id
 * @property integer $lob_id
 * @property string $category_name
 */
class CategoryMaster extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'category_master';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('lob_id, category_name', 'required'),
            array('lob_id', 'numerical', 'integerOnly' => true),
            array('category_name', 'length', 'max' => 100),
            /*
              //Example username
              array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u',
              'message'=>'Username can contain only alphanumeric
              characters and hyphens(-).'),
              array('username','unique'),
             */
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, lob_id, category_name', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'CategoryMaster' => array(self::HAS_ONE, 'LobMaster', 'id'),
            'CategoryMaster' => array(self::HAS_MANY, 'QuestionMaster', 'category_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'lob_id' => 'Lob',
            'category_name' => 'Category Name',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('lob_id', $this->lob_id);
        $criteria->compare('category_name', $this->category_name, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return CategoryMaster the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function beforeSave() {
        $userId = 0;
        if (null != Yii::app()->user->id)
            $userId = (int) Yii::app()->user->id;

        if ($this->isNewRecord) {
            
        } else {
            
        }


        return parent::beforeSave();
    }

    public function beforeDelete() {
        $userId = 0;
        if (null != Yii::app()->user->id)
            $userId = (int) Yii::app()->user->id;

        return false;
    }

    public function afterFind() {

        parent::afterFind();
    }

    public function defaultScope() {
        /*
          //Example Scope
          return array(
          'condition'=>"deleted IS NULL ",
          'order'=>'create_time DESC',
          'limit'=>5,
          );
         */
        $scope = array();


        return $scope;
    }

    public static function getCategoryTypes() {
        $user_id = Yii::app()->user->id;
        $list = Yii::app()->db->createCommand(
                        'SELECT `id`,`category_name` FROM `category_master` WHERE `lob_id`'
                        . ' in (SELECT `lob` FROM `profiles` WHERE `user_id`=' . $user_id . ')')->queryAll();
        foreach ($list as $item) {
            echo '  <option value="' . $item['id'] . '">' . $item['category_name'] . '</option>';
        }
    }

}
