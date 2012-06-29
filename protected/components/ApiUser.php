<?php
/**
 * This is the extended class for CWebUser.
 *
 * @property integer $id
 * @property string $token
 */

class ApiUser extends CWebUser {

    private $_model;

    # Return first name.
    # access it by Yii::app()->user->first_name
    function getProfile(){
        $profile = $this->loadUser();
        return $profile;
    }

    function getThumb_Profile(){
        $avatar = $this->loadAvatar('thumb.profile');
        return $avatar;
    }

    function getThumb_Icon(){
        $avatar = $this->loadAvatar('thumb.icon');
        return $avatar;
    }

    function getThumb_Normal(){
        $avatar = $this->loadAvatar('thumb.normal');
        return $avatar;
    }

    # Load user from API
    protected function loadUser()
    {
        $sixreps = new Sixreps(Yii::app()->params['api_host']);

        try {
            list($body, $info) = $sixreps->get('/users/me', array(
                'access_token' => Yii::app()->user->user_token,
            ));
        }
        catch (Exception $e) {}

        $this->_model = $body;

        return $this->_model;
    }

    # Load user avatar from API
    protected function loadAvatar( $type = NULL )
    {
        $sixreps = new Sixreps(Yii::app()->params['api_host']);

        try {
            list($body, $info) = $sixreps->get('/users/' . Yii::app()->user->id . '/avatars', array(
                'access_token' => Yii::app()->user->user_token,
                'type' => $type
            ));
        }
        catch (Exception $e) {}

        $this->_model = $body;

        return $this->_model;
    }    
}
?>