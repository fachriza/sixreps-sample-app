<?php
    class Bodyprogress extends CActiveRecord
    {

        public function tableName()
        {
            return 'bodyprogress';
        }

        public static function streamBodyprogressAlbum($id)
        {
            if (!empty($id)) {
                $sixreps = new Sixreps(Yii::app()->params['api_host']); 

                # Get stream detail with comment
                try {
                    list($body, $info) = $sixreps->get('/bodyprogress/albums/' . $id . '/photos', array(
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