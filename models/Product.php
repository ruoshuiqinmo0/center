<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lk_product".
 *
 * @property string $product_id
 * @property string $product_no 产品编号
 * @property string $name 产品名称
 * @property string $package 包名
 * @property int $status 状态:0无效；1有效
 * @property string $update_time 更新时间
 * @property string $create_time
 * @property string $developer_id 开发者id
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['product_no','string','length'=>10,'message'=>'长度必须为10位'],
            ['name','string','length'=>[5,30],'message'=>'包名长度在5~30之间'],
            ['package','string','length'=>[5,30],'message'=>'包名长度在5~30之间'],
            ['sign','string','length'=>[1,28],'message'=>'签名长度最大32位'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_no' => '产品编号',
            'name' => '产品名称',
            'package' => '包名',
            'status' => 'Status',
        ];
    }

    public function add($data){
        if($this->load($data) && $this->validate()){
            $session = Yii::$app->session;
            $this->developer_id = $session->get('developer_id');
            $this->sign = $session->get('developer_id').$this->sign;
            $this->create_time = time();
            if( $this->save()){
                return true;
            }
        }
        return false;
    }
}
