<?php

namespace App\Http\ViewComposer;

use Illuminate\View\View;

class AppNameComposer
{
	public function compose(View $view)
	{
		$view->with('app_name', 'Quote App V2.4');
	}
}
