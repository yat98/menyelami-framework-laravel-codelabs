<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use League\CommonMark\CommonMarkConverter;

class MarkdownServiceProvider extends ServiceProvider
{
	protected $markdown;

	/**
	 * Register services.
	 */
	public function register()
	{
		$this->app->singleton('markdown', function () {
			return $this->markdown;
		});
	}

	/**
	 * Bootstrap services.
	 */
	public function boot()
	{
		$this->markdown = new CommonMarkConverter();
	}
}
