<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AdminTemplateController extends Controller
{
    public function Index()
    {
        try {
            $templateImages = DB::table('template')
                ->get();
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return view('administrator.template.template', [
            'templateImages' => $templateImages
        ]);
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
        return ($this->addImage($request, 2));
    }

    public function AddHeaderProve(Request $request)
    {
       return ($this->addImage($request, 1));
    }

    public function addImage($request, $file_type)
    {

        //file_type 1 = header, 2 = logo
        try {
            $urlToFile = DB::table('template')
                ->select('item_url')
                ->where('item_type', '=', $file_type)
                ->get();
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        if ($urlToFile) {
            foreach ($urlToFile as $image) {
                Storage::disk('public_folder')->delete($image->item_url);
            }

            DB::table('template')
                ->where('item_type', '=', $file_type)
                ->delete();
        }

        //upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $url = 'upload/';
            $url .= Storage::disk('upload')->putFile('template', $file);
            $image_name = $file->getClientOriginalName();
            try {
                DB::table('template')
                    ->insert([
                        'item_url' => $url,
                        'item_name' => $image_name,
                        'item_type' => $file_type,
                        'updated_at' => now()
                    ]);
            } catch (\Exception $e) {
                return $e->getMessage();
            }

        }
        return redirect(route('admin.template'))->with('message', (__('messages.succeedAddedImages')));;
    }
}
