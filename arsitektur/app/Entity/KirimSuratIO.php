<?php

namespace App\Entity;

class KirimSuratIO
{
	public function sendMail($email)
	{
		return 'Register email ' . $email . ' to KirimSurat.io server';
	}
}
