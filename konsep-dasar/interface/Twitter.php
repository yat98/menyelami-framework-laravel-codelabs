<?php

class Twitter implements Likeable
{
	private $user;
	private $favourite;
	private $tweet;

	public function __construct($user, $tweet)
	{
		$this->user = $user;
		$this->tweet = $tweet;
	}

	public function platform()
	{
		return 'Twitter';
	}

	public function tweet()
	{
		return $this->tweet;
	}

	public function user()
	{
		return $this->user;
	}

	public function favourite()
	{
		$this->favourite++;
	}

	public function totalFavourite()
	{
		return $this->favourite;
	}

	public function like()
	{
		return $this->favourite();
	}

	public function totalLike()
	{
		return $this->totalFavourite();
	}
}
