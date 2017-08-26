<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use DB;
use Carbon\Carbon;
use App\Models\MembershipLog;

class MembershipsController extends Controller
{
    public function index()
    {
        if(auth()->check() && auth()->id() == 1){
          $users = User::where('id', '>', '1')->orderBy('id', 'desc')->get();

          $memberships = DB::select('select * from roles');

          return view('memberships.index', compact('users', 'memberships'));
        }

        return redirect('/');
    }

    public function update(Request $request, $userId)
    {
      $this->validate($request, [
        'membership' => 'required',
        'membership_cost' => 'required|numeric'
      ]);


      if(auth()->check() && auth()->id() == 1){
        //找到需要变更的用户
        $user = User::findOrFail($userId);

        //用户需要变更成的会员组ID，来自request，不会是null
        $requestMembershipId = DB::table('roles')
          ->where('name', $request->membership)
          ->first()->id;

        //清理其余会员ID记录
        $userMemberships = DB::table('role_user')
          ->where('user_id', $userId)->get();

        foreach($userMemberships as $userMembership){
          if($userMembership->role_id == 4 || $userMembership->role_id == 5 || $userMembership->role_id == 6 || $userMembership->role_id == 7){
              DB::table('role_user')
              ->where('user_id', $userMembership->user_id)
              ->where('role_id', $userMembership->role_id)
              ->delete();
          }
        }

        //更新ID
        DB::table('role_user')
          ->insert([
            'user_id' => $userId,
            'role_id' => $requestMembershipId
          ]);

        $membership_cost= $user->membership_cost + $request->membership_cost;

        $user->update([
          'membership_started_at' => Carbon::now(),
          'membership_expired_at' => $request->membership == 'Premium' ? Carbon::now()->addMonth() : Carbon::now()->addYear(),
          'membership' => $request->membership,
          'membership_cost' => $membership_cost,
        ]);

        $this->membershipLog($user, $request);

        return redirect()->route('memberships.index');
      }

      return redirect('/');
    }

    protected function membershipLog(User $user, Request $request){
      MembershipLog::create([
        'user_id' => $user->id,
        'membership' => $request->membership,
        'membership_started_at' => $user->membership_started_at,
        'membership_expired_at' => $user->membership_expired_at,
        'membership_cost' => $request->membership_cost,
      ]);
    }
}
