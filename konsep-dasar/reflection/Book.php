<?php

abstract class Script
{
}
interface publishable
{
}
interface printable
{
}
class Book extends Script implements publishable, printable
{
	private $author;
	private $title;

	public function __construct($title = "Anonymous", Author $author)
	{
		$this->title = $title;
		$this->author = $author;
	}

	public function __toString()
	{
		return <<<"EOT"
        Judul Buku : {$this->title}
        Penulis : {$this->author->getName()}
        Alamat : {$this->author->getAddress()}
        EOT;
	}
}
