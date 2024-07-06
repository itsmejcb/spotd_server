<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Http\Requests\Notification\NotificationRequest;
use App\Services\Notification\NotificationService;

class NotificationController extends Controller
{
    protected $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }
    // to view the profile info
    public function fetchNotification(NotificationRequest $request)
    {
        $user = $this->notificationService->fetchNotification($request->validated());

        return $request->jsonResponse($user);
    }
}
