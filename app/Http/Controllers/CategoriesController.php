<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Topic;
use App\Models\Link;
use App\Models\Banner;

class CategoriesController extends Controller
{
    public function show($id, Request $request, Topic $topic)
    {
        $category = Category::findOrFail($id);
        $topics   = $topic->getCategoryTopicsWithFilter($request->get('filter', 'default'), $id);
        $links    = Link::allFromCache();
        $banners = Banner::allByPosition();

        $view = 'topics.index';

        return view($view, compact('topics', 'category', 'links', 'banners'));
    }
}
