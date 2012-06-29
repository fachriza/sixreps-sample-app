<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	public $id;
	public $token;

	public function __construct($id, $token) {
		$this->id = $id;
		$this->token = $token;
	}

	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$userToken = new UserToken;
		$result = $userToken->authenticate($this->id, $this->token);

		$this->_id = $result->id;
		$this->setState('user_token', $result->token);

		return $result;
	}

	public function getId()
    {
        return $this->_id;
    }
}