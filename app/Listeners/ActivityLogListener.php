<?php

namespace App\Listeners;

use App\Events\ModelCreated;
use App\Events\ModelUpdated;
use App\Events\ModelDeleted;
use App\Events\ModelForceDeleted;
use App\Events\ModelRestored;
use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\Auth;

class ActivityLogListener implements ShouldQueue
{
    /**
     * The event dispatcher instance.
     *
     * @var \Illuminate\Events\Dispatcher
     */
    protected $events;

    /**
     * Create the event listener.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     * @return void
     */
    public function __construct(Dispatcher $events)
    {
        $this->events = $events;
    }

    /**
     * Handle the event.
     *
     * @param  mixed  $event
     * @return void
     */
    public function handle($event)
    {
        // $singularTableName = Str::singular($event->model->getTable());
        $singularTableName = $event->log_table_name;

        if ($event instanceof ModelCreated) {
            $notification = Notification::create([
                'type' => $singularTableName . '_created',
                'message' => 'A new ' . $singularTableName . ' has been created.',
                'auth_id' => Auth::user()->id ?? null,
                'model_info' => json_encode(
                    [
                        'model_id' => $event->model->id,
                        'model_type' => get_class($event->model),
                    ],
                    JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE,
                ),
            ]);
        }

        if ($event instanceof ModelUpdated) {
            $notification = Notification::create([
                'type' => $singularTableName . '_updated',
                'message' => 'A ' . $singularTableName . ' has been updated.',
                'auth_id' => Auth::user()->id ?? null,
                'model_info' => json_encode(
                    [
                        'model_id' => $event->model->id,
                        'model_type' => get_class($event->model),
                    ],
                    JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE,
                ),
            ]);
        }

        if ($event instanceof ModelDeleted) {
            $notification = Notification::create([
                'type' => $singularTableName . '_deleted',
                'message' => 'A ' . $singularTableName . ' has been deleted.',
                'auth_id' => Auth::user()->id ?? null,
                'model_info' => json_encode(
                    [
                        'model_id' => $event->model->id,
                        'model_type' => get_class($event->model),
                    ],
                    JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE,
                ),
            ]);
        }

        if ($event instanceof ModelRestored) {
            $notification = Notification::create([
                'type' => $singularTableName . '_restored',
                'message' => 'A ' . $singularTableName . ' has been restored.',
                'auth_id' => Auth::user()->id ?? null,
                'model_info' => json_encode(
                    [
                        'model_id' => $event->model->id,
                        'model_type' => get_class($event->model),
                    ],
                    JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE,
                ),
            ]);
        }

        if ($event instanceof ModelForceDeleted) {
            $notification = Notification::create([
                'type' => $singularTableName . '_force_deleted',
                'message' => 'A ' . $singularTableName . ' has been force deleted.',
                'auth_id' => Auth::user()->id ?? null,
                'model_info' => json_encode(
                    [
                        'model_id' => $event->model->id,
                        'model_type' => get_class($event->model),
                    ],
                    JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE,
                ),
            ]);
        }
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     * @return void
     */
    public function subscribe($events)
    {
        $events->listen(ModelCreated::class, 'App\Listeners\ActivityLogListener@handle');
        $events->listen(ModelUpdated::class, 'App\Listeners\ActivityLogListener@handle');
        $events->listen(ModelDeleted::class, 'App\Listeners\ActivityLogListener@handle');
        $events->listen(ModelRestored::class, 'App\Listeners\ActivityLogListener@handle');
        $events->listen(ModelForceDeleted::class, 'App\Listeners\ActivityLogListener@handle');
    }
}
