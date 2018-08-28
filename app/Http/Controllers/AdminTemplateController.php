<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AdminTemplateController extends Controller
{
    public function Index()
    {
        return view('administrator.template.template');
    }

    public function AddLogo()
    {
        return view('administrator.template.addlogo');
    }

    public function AddHeader()
    {
        return view('administrator.template.addheader');
    }

    public function AddLogoProve(Request $request)
    {

    }

    public function AddHeaderProve(Request $request)
    {

        if ($request->hasFile('header')) {
            $file = $request->file('header');
            $url = 'upload/';
            $url .= Storage::disk('upload')->putFile('template', $file);
            $image_name = $file->getClientOriginalName();
            try {
                DB::table('template')
                    ->insert([
                        'url_logo' => $url,
                        'name_logo' => $image_name
                    ]);
            } catch (\Exception $e) {
                return $e->getMessage();
            }

        }
        redirect(route('admin.template'))->with('message', (__('messages.succeedAddedImages')));;
    }
}
