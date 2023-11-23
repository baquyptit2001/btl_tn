<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostView;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        $postViews = PostView::query()
            ->selectRaw('DATE(created_at) as date, count(*) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->get();
        $postViews = $postViews->pluck('total', 'date')->toArray();
        $labels = array_keys($postViews);
        $values = array_values($postViews);
        $postViews = [
            'labels' => $labels,
            'values' => $values
        ];
        // get ratio viewers if guest or user of all time (guest: user_id = null, user: user_id != null)
        $userViews = PostView::query()
            ->whereNotNull('user_id')
            ->count();
        $guestViews = PostView::query()
            ->whereNull('user_id')
            ->count();
        return view('admin.pages.statistic.index', compact('postViews', 'userViews', 'guestViews'));
    }
}
