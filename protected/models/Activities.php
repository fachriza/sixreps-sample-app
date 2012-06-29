<?php
    class Activities extends CActiveRecord
    {

        public function tableName()
        {
            return 'activities';
        }

        public static function loadActivitiesByUser($before_id, $user_id = NULL)
        {
            $sixreps = new Sixreps(Yii::app()->params['api_host']);

            try {
                list($body, $info) = $sixreps->get('/activities', array(
                    'access_token' => Yii::app()->user->user_token,
                    'before_id' => $before_id,
                    'user_id' => $user_id
                ));
            }
            catch (Exception $e) {}

            return $body;
        }

        public static function loadActivities($before_id, $type = NULL)
        {
            $sixreps = new Sixreps(Yii::app()->params['api_host']);

            try {
                list($body, $info) = $sixreps->get('/activities', array(
                    'access_token' => Yii::app()->user->user_token,
                    'type' => $type,
                    'before_id' => $before_id
                ));
            }
            catch (Exception $e) {}

            return $body;
        }        
    }   
?>