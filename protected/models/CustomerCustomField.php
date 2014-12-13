<?php

/**
 * This is the model class for table "customer_custom_field".
 *
 * The followings are the available columns in table 'customer_custom_field':
 * @property integer $id
 * @property string $field_name
 * @property integer $field_category_id
 * @property integer $field_maxsize
 * @property integer $lob_id
 */
class CustomerCustomField extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'customer_custom_field';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('field_name, field_category_id, field_maxsize, lob_id', 'required'),
            array('field_category_id, field_maxsize, lob_id', 'numerical', 'integerOnly' => true),
            array('field_name', 'length', 'max' => 45),
            /*
              //Example username
              array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u',
              'message'=>'Username can contain only alphanumeric
              characters and hyphens(-).'),
              array('username','unique'),
             */
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, field_name, field_category_id, field_maxsize, lob_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'Field_Category' => array(self::BELONGS_TO, 'FieldCategoryTable', 'field_category_id'),
            'CustomerCustomFieldAssignment' => array(self::HAS_ONE, 'CustomerCustomFieldAssignmentTable', 'customer_custom_field_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'field_name' => 'Field Name',
            'field_category_id' => 'Field Category',
            'field_maxsize' => 'Field Maxsize',
            'lob_id' => 'Lob',
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
        $criteria->compare('field_name', $this->field_name, true);
        $criteria->compare('field_category_id', $this->field_category_id);
        $criteria->compare('field_maxsize', $this->field_maxsize);
        $criteria->compare('lob_id', $this->lob_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return CustomerCustomField the static model class
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

}
