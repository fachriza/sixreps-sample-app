<?php
    class Bodystatistics extends CActiveRecord
    {

        public function tableName()
        {
            return 'bodystatistics';
        }

        public static function streamBodystat($id)
        {
            if (!empty($id)) {
                $sixreps = new Sixreps(Yii::app()->params['api_host']); 

                # Get stream detail with comment
                try {
                    list($body, $info) = $sixreps->get('/bodystats/' . $id, array(
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