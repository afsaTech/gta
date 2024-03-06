<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NotificationController extends Controller
{
    public function getUnreadNotifications()
    {
        $notifications = Notification::latest()
            ->whereNull('read_at')
            ->get();

        return response()->json($notifications);
    }

    public function markAsRead(Notification $notification)
    {
        $notification->markAsRead();

        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * Show the notification.
     *
     * @param \App\Models\Notification $notification
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show(Notification $notification)
    {
        $modelInfo = json_decode($notification->model_info);

        if (!isset($modelInfo->model_type) || !isset($modelInfo->model_id)) {
            return redirect()->route('dashboard.home');
        }

        $modelClass = $modelInfo->model_type;
        $modelId = $modelInfo->model_id;

        $model = $modelClass::find($modelId);

        if (!$model) {
            return redirect()->route('dashboard.home');
        }

        return redirect()->to($model->getTable() . '/' . 'show/' . $model->id);
    }
}
