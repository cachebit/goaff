<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use App\Models\Topic;

class TopicPolicy
{
    use HandlesAuthorization;

    public function show_draft(User $user, Topic $topic)
    {
        return $user->may('manage_topics') || $topic->user_id == $user->id;
    }

    public function update(User $user, Topic $topic)
    {
        return $user->may('manage_topics') || $topic->user_id == $user->id;
    }

    public function delete(User $user, Topic $topic)
    {
        return $user->may('manage_topics') || $topic->user_id == $user->id;
    }

    public function recommend(User $user, Topic $topic)
    {
        return $user->may('manage_topics');
    }

    public function wiki(User $user, Topic $topic)
    {
        return $user->may('manage_topics');
    }

    public function pin(User $user, Topic $topic)
    {
        return $user->may('manage_topics');
    }

    public function sink(User $user, Topic $topic)
    {
        return $user->may('manage_topics');
    }

    public function append(User $user, Topic $topic)
    {
        return $user->may('manage_topics') || $topic->user_id == $user->id;
    }

    public function access(User $user, Topic $topic)
    {
      //确定用户与权限
      //确定文章时间和用户会员到期时间
      //返回正确的权限
      if($user->may('visit_admin') || $user->may('manage_users') || $user->may('manage_topics')){
        return true;
      }elseif($user->may('monthly_accessable')){
        return false;
      }elseif($user->may('annually_accessable')){
        return true;
      }

    }
}
