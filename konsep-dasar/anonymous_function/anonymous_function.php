<?php

	$name = function () {
		return 'Hidayat Chandra';
	};

	function canDoIt($name)
	{
		echo "You can do it {$name}";
	}

	canDoIt($name());
