<?php

$slash = (PHP_OS_FAMILY == 'Windows') ? '\\' : '/';

return [
	'name' => 'lumut',
	'path' => resource_path(str_replace('/', $slash, 'themes/lumut')),
];
