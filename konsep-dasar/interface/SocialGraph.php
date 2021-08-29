<?php

class SocialGraph
{
	public function compareLike(Likeable $social1, Likeable $social2)
	{
		if ($social1->totalLike() > $social2->totalLike()) {
			echo "Status {$social1->platform()} {$social1->user()} more popular than {$social2->platform()} {$social2->user()} \n";
		} elseif ($social1->totalLike() < $social2->totalLike()) {
			echo "Status {$social1->platform()} {$social2->user()} more popular than {$social2->platform()} {$social1->user()} \n";
		} else {
			echo "Both status are equally popular \n";
		}
	}
}
