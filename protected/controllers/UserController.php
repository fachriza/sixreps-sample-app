<?php

class UserController extends Controller
{
    public function actionConnect()
    {

        if (Yii::app()->user->isGuest) {
            $sixreps = new Sixreps(Yii::app()->params['api_host']);   

            if (isset($_GET['code'])) {

                # Get access token
                try {
                    list($body, $info) = $sixreps->post('/oauth/access_token', array(
                        'app_id'        => Yii::app()->params['app_id'],
                        'app_secret'    => Yii::app()->params['app_secret'],
                        'code'          => $_GET['code']
                    ));
                }
                catch (Exception $e) {}                

                $access_token = $body->access_token;

                # Get user profile (in this case just an ID so we can store it on DB)
                try {
                    list($user, $infoUser) = $sixreps->get('/users/me', array(
                        'access_token'  => $access_token,
                    ));
                }
                catch (Exception $e) {}                

                # Check is there any this user ID on table
                if (!$currentUser = $this->_getUserToken($user->id)) {
                    $model = new UserToken;

                    $model->id = $user->id;
                    $model->token = $access_token;

                    $model->save();

                    $currentUser = $model;
                }

                $identity = new UserIdentity($currentUser->id, $currentUser->token);

                if($identity->authenticate()) {

                    Yii::app()->user->login($identity);

                    # Redirect back to homepage
                    $this->redirect('/');

                } else {
                    // Login failed
                }

            } else {
                $this->redirect(Yii::app()->params['api_host'] . 'oauth/authorize?response_type=code&app_id=' . Yii::app()->params['app_id']);
            }
        }

        $this->render('connect');
    }

    public function actionProfile($user_id = NULL, $before_id = NULL) {
        $profile = Users::getProfile($user_id);
        $stream = $this->loadActivities($before_id, $user_id);
        
        $this->render('profile', array('stream' => $stream, 'profile' => $profile));
    }

    # Load current member activities
    protected function loadActivities($before_id, $user_id = NULL)
    {
        $activities = Activities::loadActivitiesByUser($before_id, $user_id);
        return $activities;        
    }

    public function actionLogout() {
        Yii::app()->user->logout();

        # Redirect back to homepage
        $this->redirect('/');
    }

    protected function _getUserToken($id) {

        $model = UserToken::model()->findByPk($id);
        return $model;

    }
}