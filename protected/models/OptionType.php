<?php

/**
 * This is the model class for table "option_type".
 *
 * The followings are the available columns in table 'option_type':
 * @property integer $id
 * @property string $option_type
 */
class OptionType extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'option_type';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('option_type', 'required'),
            array('option_type', 'length', 'max' => 65),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, option_type', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'OptionType' => array(self::HAS_MANY, 'QuestionMaster', 'option_type_id'),
//            'OptionType' => array(self::HAS_MANY, 'OptionMaster', 'option_type_id', 'option_master_ibfk_1')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'id',
            'option_type' => 'Option Type',
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
        $criteria->compare('option_type', $this->option_type, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return OptionType the static model class
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

    public static function getOptionTypes() {
        $list = Yii::app()->db->createCommand('SELECT `id`,`option_type` FROM `option_type`')->queryAll();
        foreach ($list as $item) {
            echo '  <option value="' . $item['id'] . '">' . $item['option_type'] . '</option>';
        }
    }

}
