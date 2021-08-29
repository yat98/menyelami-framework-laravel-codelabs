<?php

include 'Likeable.php';

class Facebook implements Likeable
{
	private $status;
	private $user;
	private $like;

	public function __construct($user, $status)
	{
		$this->user = $user;
		$this->status = $status;
	}

	public function platform()
	{
		return 'Facebook';
	}

	public function status()
	{
		return $this->status;
	}

	public function user()
	{
		return $this->user;
	}

	public function like()
	{
		$this->like++;
	}

	public function totalLike()
	{
		return $this->like;
	}
}
