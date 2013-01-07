<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex($before_id = NULL)
	{
		if (Yii::app()->user->isGuest) {
			$this->render('index');
		} else {
			$stream = $this->loadActivities($before_id);
			$this->render('home-activities', array('stream' => $stream));
		}
	}

    # Body Statistic Page
    public function actionBodystats($before_id = NULL)
    {
        if (Yii::app()->user->isGuest) {
            $this->render('index');
        } else {
            $stream = $this->loadActivities($before_id, 'bodystatistic,bodystatistic_edit');
            $this->render('home-activities', array('stream' => $stream));
        }
    }

    # Body Statistic Page
    public function actionBodyprogress($before_id = NULL)
    {
        if (Yii::app()->user->isGuest) {
            $this->render('index');
        } else {
            $stream = $this->loadActivities($before_id, 'bodyprogress_photo');
            $this->render('home-activities', array('stream' => $stream));
        }
    }

    # Body Statistic Page
    public function actionWorkout($before_id = NULL)
    {
        if (Yii::app()->user->isGuest) {
            $this->render('index');
        } else {
            $stream = $this->loadActivities($before_id, 'workout_did');
            $this->render('home-activities', array('stream' => $stream));
        }
    }

    # Update status
    public function actionPostStatus()
    {
    	$sixreps = new Sixreps(Yii::app()->params['api_host']);

        try {
            list($body, $info) = $sixreps->post('/activities', array(
                'access_token' => Yii::app()->user->user_token,
                'user_id' => Yii::app()->user->id,
                'body' => $_POST['status']
            ));
        }
        catch (Exception $e) {}    	
    	
    	if (isset($body->error)) {
    		$return['status'] = false;
    	} else {
    		$return['status'] = true;
    		$return['activity_id'] = $body->id;
    	}

    	echo json_encode($return);
    	die();
    }

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

    /*
    ** Get stream
    */
    protected function loadActivities($before_id, $type = NULL)
    {
        $activities = Activities::loadActivities($before_id, $type);
        return $activities;
    }
}