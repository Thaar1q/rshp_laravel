<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 */
	public function register(): void
	{
		//
	}

	/**
	 * Bootstrap any application services.
	 */
	public function boot(): void
	{
		// Custom Blade directive for date formatting
		Blade::directive('formatDate', function ($expression) {
			return "<?php echo {$expression} ? \\Carbon\\Carbon::parse({$expression})->format('d/m/Y') : '-'; ?>";
		});

		Blade::directive('formatDateTime', function ($expression) {
			return "<?php echo {$expression} ? \\Carbon\\Carbon::parse({$expression})->format('d/m/Y H:i') : '-'; ?>";
		});

		// Custom Blade directive for role checking
		Blade::if('hasRole', function ($roleName) {
			return auth()->check() && auth()->user()->hasActiveRole($roleName);
		});
	}
}
