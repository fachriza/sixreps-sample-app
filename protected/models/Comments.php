<?php
    class Comments extends CActiveRecord
    {

        public function tableName()
        {
            return 'comments';
        }

        public static function streamComment($id)
        {
            if (!empty($id)) {
                $sixreps = new Sixreps(Yii::app()->params['api_host']); 

                # Get stream detail with comment
                try {
                    list($body, $info) = $sixreps->get('/activities/' . $id . '/comments', array(
                        'access_token' => Yii::app()->user->user_token
                    ));
                }
                catch (Exception $e) {}                

                return $body;

            } else {
                return null;
            }
        }
    }   
?>