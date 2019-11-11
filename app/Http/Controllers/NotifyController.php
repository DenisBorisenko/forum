<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class NotifyController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('JWT');
//    }
    public function index()
    {
        $user = User::findOrFail(auth()->id());
        return [
            'read' => auth()->user()->readNotifications(),
            'unread' => auth()->user()->unReadNotifications(),
        ];
    }
}
