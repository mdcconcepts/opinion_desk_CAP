<?php

/**
 * This is the model class for table "customer_custom_field_assignment_table".
 *
 * The followings are the available columns in table 'customer_custom_field_assignment_table':
 * @property integer $id
 * @property integer $customer_custom_field_id
 * @property integer $user_id
 */
class CustomerCustomFieldAssignmentTable extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'customer_custom_field_assignment_table';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('customer_custom_field_id, user_id', 'required'),
            array('customer_custom_field_id, user_id', 'numerical', 'integerOnly' => true),
            /*
              //Example username
              array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u',
              'message'=>'Username can contain only alphanumeric
              characters and hyphens(-).'),
              array('username','unique'),
             */
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, customer_custom_field_id, user_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'Customer_Custom_Fields_Val' => array(self::BELONGS_TO, 'CustomerCustomField', 'customer_custom_field_id'),
            'sub_data_field' => array(self::HAS_MANY, 'SubCustomerCustomFieldAssignment', 'customer_custom_field_assignment_id'),
            'Customer_Custom_Fields' => array(self::HAS_MANY, 'CustomerCustomFieldData', 'customer_custom_field_assignment_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'customer_custom_field_id' => 'Customer Custom Field',
            'user_id' => 'User',
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
        $criteria->compare('customer_custom_field_id', $this->customer_custom_field_id);
        $criteria->compare('user_id', $this->user_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return CustomerCustomFieldAssignmentTable the static model class
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

//    public function beforeDelete() {
//        $userId = 0;
//        if (null != Yii::app()->user->id)
//            $userId = (int) Yii::app()->user->id;
//
//        return false;
//    }

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

    public function getDataFromPK() {
        $user_id = Yii::app()->user->id;
        $criteria = new CDbCriteria;
        $criteria->condition = "user_id=" . $user_id;
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
