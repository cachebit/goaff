<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MembershipLog;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MembershipLogsController extends Controller
{
    public function index($userId)
    {
      if(auth()->check() && auth()->id() == 1){
        $logs = MembershipLog::where('user_id', $userId)->latest()->get();
        return view('memberships.log' ,compact('logs'));
      }
      return redirect('/')  ;
    }
}
