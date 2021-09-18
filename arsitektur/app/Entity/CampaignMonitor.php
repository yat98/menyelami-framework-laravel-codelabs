<?php

namespace App\Entity;

class CampaignMonitor
{
	public function add($email)
	{
		return 'Subscribe ' . $email . ' to campaign monitor server';
	}
}
