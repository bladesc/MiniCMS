<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $templateImages = DB::table('template')->get();
        $templateImagesArray = [];

        foreach ($templateImages as $templateImage) {
            switch ($templateImage->item_type) {
                case 1:
                    $templateImagesArray['logo'] = $templateImage;
                    break;
                case 2:
                    $templateImagesArray['header'] = $templateImage;
                    break;
                default:
                    break;
            }
        }

        view::share('templateImages', $templateImagesArray);

    }
}
