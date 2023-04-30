<?php

namespace App\Http\Controllers;

use App\Services\HomeService;

class HomeController extends Controller
{

    private $homeService;

    public function __construct(HomeService $homeService)
    {
        $this->homeService = $homeService;
    }

    public function index()
    {
        $groupsCountsData = $this->homeService->getGroupsCountsData();

        return view('pages.home', $groupsCountsData);
    }

    public function getDataAjax()
    {
        $groupsCountsData = $this->homeService->getGroupsCountsData();
        return response()->json([
            ...$groupsCountsData,
            'words' => [
                'groups' => __('home.Groups'),
            ]
        ]);
    }
}