<?php

include_once 'Social.php';
class Twitter extends Social
{
	private $tweet;

	public function __construct($username, $tweet)
	{
		parent::__construct($username);
		$this->tweet = $tweet;
	}

	public function getTweet()
	{
		return $this->tweet;
	}
}
