<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lk_developer".
 *
 * @property string $developer_id
 * @property string $account
 * @property string $password
 * @property string $create_time
 */
class Developer extends \yii\db\ActiveRecord
{
    public $verificationCode = '';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%developer}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['account', 'required', 'message' => '请输入账号', 'on' => ['login']],
            ['password', 'required', 'message' => '请输入密码', 'on' => ['login']],
            ['password', 'validatePass'],
            ['verificationCode', 'required', 'message' => '请输入验证码', 'on' => ['login']],
            ['verificationCode', 'captcha', 'message' => '验证码错误', 'on' => 'login', 'captchaAction' => '/center/login/captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'developer_id' => 'Developer ID',
            'account' => '账号',
            'password' => '密码',
            'create_time' => 'Create Time',
        ];
    }

    public function validatePass()
    {
        if (!$this->hasErrors()) {
            $res = self::find()->where('account = :account and password = :password', [':account' => $this->account, ':password' => md5($this->password)])->one();
            $this->developer_id = $res['developer_id'];
            if (is_null($res)) {
                $this->addError('password', '账号或密码错误');
                return false;
            }
            return true;
        }
    }

    public function login($data)
    {
        $this->scenario = 'login';
        if ($this->load($data) && $this->validate()) {
            $session = Yii::$app->session;
            $session->set('account', $this->account);
            $session->set('developer_id', $this->developer_id);
            $this->updateAll(['login_time' => time(), 'login_ip' => ip2long(Yii::$app->request->userIP)], 'developer_id= :developer_id',[':developer_id'=>$this->developer_id]);
            return $session->get('developer_id');
        }
        return false;
    }


}
