<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Topic;
use App\Models\Banner;
use App\Models\Role;
use Illuminate\Http\Request;
use Rss;
use Purifier;
use Phphub\Handler\EmailHandler;
use Jrean\UserVerification\Facades\UserVerification;
use Auth;

class PagesController extends Controller
{
    public function test()
    {
        return view('test');
    }

    public function home(Topic $topic, Request $request)
    {
        if (Auth::check()) {
            return app(ActivityController::class)->index($request);
        } else {
            $topics = $topic->getTopicsWithFilter('free');

            $banners = Banner::allByPosition();
            return view('pages.home', compact('topics', 'banners'));
        }
    }

    public function about()
    {
        return view('pages.about');
    }

    // public function composer(Request $request)
    // {
    //     return app(TopicsController::class)->show(4484, $request, true);
    // }

    public function wildcard($name, Request $request)
    {
        return app(BlogsController::class)->show($name);
    }

    public function wiki(Request $request)
    {
        return app(TopicsController::class)->show(config('phphub.wiki_topic_id'), $request, true);
    }

    public function search(Request $request)
    {
        $query = Purifier::clean($request->input('q'), 'search_q');

        if ($request->user_id) {
            $user = User::findOrFail($request->user_id);
            $topics = Topic::search($query, null, true)->withoutBlocked()->withoutBoardTopics()->withoutDraft()->byWhom($user->id)->paginate(30);
            $users = collect([]);
        }

        $filterd_noresult = isset($topics) ? $topics->total() == 0 : false;

        if ( ! $request->user_id || ($request->user_id && $topics->total() == 0)) {
            $user = $request->user_id ? $user : new User;
            $users = User::search($query, null, true)->orderBy('last_actived_at', 'desc')->limit(5)->get();
            $topics = Topic::search($query, null, true)->withoutBlocked()->withoutBoardTopics()->withoutDraft()->paginate(30);
        }

        return view('pages.search', compact('users', 'user', 'query', 'topics', 'filterd_noresult'));
    }

    public function feed()
    {
        $topics = Topic::excellent()->recent()->limit(20)->get();

        $channel =[
            'title'       => 'Affren.com Affilaite最新国外干货教程',
            'description' => 'Affren 致力于第一时间分享国外 Affiliate Marketing 和 Media Buy 干货网文，让您紧跟节奏赚美元。',
            'link'        => url(route('feed')),
        ];

        $feed = Rss::feed('2.0', 'UTF-8');

        $feed->channel($channel);

        foreach ($topics as $topic) {
            $feed->item([
                'title'             => $topic->title,
                'description|cdata' => str_limit($topic->body, 200),
                'link'              => $topic->link(),
                'pubDate'           => date('Y-m-d', strtotime($topic->created_at)),
                ]);
        }

        return response($feed, 200, array('Content-Type' => 'text/xml'));
    }

    public function sitemap()
    {
        return app('Phphub\Sitemap\Builder')->render();
    }

    public function hallOfFames()
    {
        $users = User::byRolesName('HallOfFame');
        return view('pages.hall_of_fame', compact('users'));
    }

    public function utc()
    {
        $time = 14;
        $utcs = [
          ['utc'=>'+8', 'timezone'=>'Asia/Shanghai', 'data'=> $time <= 16? $time+8 : $time+8-24],
          ['utc'=>'+9', 'timezone'=>'Asia/Seoul', 'data'=> $time <= 15? $time+9 : $time+9-24],
          ['utc'=>'+10', 'timezone'=>'Australia/Brisbane', 'data'=> $time <= 14? $time+10 : $time+10-24],
          ['utc'=>'+11', 'timezone'=>'Austrailia/Melbourne', 'data'=> $time <= 13? $time+11 : $time+11-24],
          ['utc'=>'+12', 'timezone'=>'Pacific/Tarawa', 'data'=> $time <= 12? $time+12 : $time+12-24],
          ['utc'=>'-11', 'timezone'=>'Pacific/Niue', 'data'=> $time <= 11? $time-11+24 : $time-11],
          ['utc'=>'-10', 'timezone'=>'Pacific/Honolulu', 'data'=> $time <= 10? $time-10+24 : $time-10],
          ['utc'=>'-9', 'timezone'=>'America/Anchorage', 'data'=> $time <= 9? $time-9+24 : $time-9],
          ['utc'=>'-8', 'timezone'=>'America/Los Angeles', 'data'=> $time <= 8? $time-8+24 : $time-8],
          ['utc'=>'-7', 'timezone'=>'America/Phoneix', 'data'=> $time <= 7? $time-7+24 : $time-7],
          ['utc'=>'-6', 'timezone'=>'America/Chicago', 'data'=> $time <= 6? $time-6+24 : $time-6],
          ['utc'=>'-5', 'timezone'=>'America/New York', 'data'=> $time <= 5? $time-5+24 : $time-5],
          ['utc'=>'-4', 'timezone'=>'America/Argentina/San Juan', 'data'=> $time <= 4? $time-4+24 : $time-4],
          ['utc'=>'-3', 'timezone'=>'America/Argentina/Buenos Aires', 'data'=> $time <= 3? $time-3+24 : $time-3],
          ['utc'=>'-2', 'timezone'=>'Atlantic/South Georgia', 'data'=> $time <= 2? $time-2+24 : $time-2],
          ['utc'=>'-1', 'timezone'=>'Atlantic/Azores', 'data'=> $time <= 1? $time-1+24 : $time-1],
          ['utc'=>'0', 'timezone'=>'Europe/London', 'data'=> $time],
          ['utc'=>'+1', 'timezone'=>'Europe/Berlin', 'data'=> $time <= 23? $time+1 : $time+23-24],
          ['utc'=>'+2', 'timezone'=>'Europe/Athens', 'data'=> $time <= 22? $time+2 : $time+2-24],
          ['utc'=>'+3', 'timezone'=>'Europe/Istanbul', 'data'=> $time <= 21? $time+3 : $time+3-24],
          ['utc'=>'+4', 'timezone'=>'Asia/Baku', 'data'=> $time <= 20? $time+4 : $time+4-24],
          ['utc'=>'+5', 'timezone'=>'Asia/Karachi', 'data'=> $time <= 19? $time+5 : $time+5-24],
          ['utc'=>'+6', 'timezone'=>'Asia/Omsk', 'data'=> $time <= 18? $time+6 : $time+6-24],
          ['utc'=>'+7', 'timezone'=>'Asia/Ho Chi Minh', 'data'=> $time <= 17? $time+7 : $time+7-24],
        ];

        return view('pages.utc', compact('utcs'));
    }
}
