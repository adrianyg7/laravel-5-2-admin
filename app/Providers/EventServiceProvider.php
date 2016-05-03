<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\SomeListener',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        // $events->listen(\Illuminate\Database\Events\QueryExecuted::class, function ($event) {
        //     $sql = $event->sql;

        //     foreach ($event->bindings as $binding) {
        //         $sql = preg_replace('/\?/', "'{$binding}'", $sql, 1);
        //     }

        //     dump($sql);
        //     // \Log::info($sql);
        // });
    }
}
