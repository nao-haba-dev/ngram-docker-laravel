<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * 検索
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $query = Shop::query();
        $freeWord = $request->input('free_word');

        if ($freeWord) {
            $query->whereRaw("match(`free_word`) against (? IN BOOLEAN MODE)", $freeWord);
        }

        $shops = $query
            ->select(['id', 'name', 'age', 'gender_id'])
            ->paginate(20, ['*'], 'page', 1);

        $param = collect($request->input());
        $shops->appends($request->input());

        return view('index', ['shops' => $shops, 'parameters' => $param]);
    }
}
