<?php
    class Users extends CActiveRecord
    {

        public function tableName()
        {
            return 'users';
        }

        public static function getProfile($user_id = NULL)
        {
            if (!empty($user_id)) {
                $sixreps = new Sixreps(Yii::app()->params['api_host']);

                try {
                    list($body, $info) = $sixreps->get('/users/' . $user_id, array(
                        'access_token' => Yii::app()->user->user_token,
                    ));
                }
                catch (Exception $e) {}

                return $body;              
            } else {
                return NULL;
            }
        }        
    }   
?>