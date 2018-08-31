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

    public function AddItem($itemType)
    {
        return view('administrator.template.additem', [
            'itemType' => $itemType
        ]);
    }

    public function UpdateItem($itemType)
    {
        return view('administrator.template.additem', [
            'itemType' => $itemType
        ]);
    }

    public function DeleteItem($itemType, $itemId)
    {
        return view('administrator.template.deleteitem', [
            'itemId' => $itemId,
            'itemType' => $itemType
        ]);
    }

    public function DeleteItemProve($itemType, $itemId)
    {
        try {
            $urlToFile = DB::table('template')
                ->select('item_url')
                ->where('id', '=', $itemId)
                ->get();
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        if ($urlToFile) {
            foreach ($urlToFile as $image) {
                Storage::disk('public_folder')->delete($image->item_url);
            }

            DB::table('template')
                ->where('id', '=', $itemId)
                ->delete();
        }

        return redirect(route('admin.template'))
            ->with('message', (__('messages.succeedDeletedRecord')));
    }

    public function AddItemProve(Request $request)
    {
        return ($this->addImage($request));
    }


    public function addImage($request)
    {

        //file_type 1 = header, 2 = logo
        $fileType = $request->input('itemType');
        $mimeType = $request->file('file')->getMimeType();

        if (($mimeType  != 'image/jpeg') && ($mimeType  != 'image/png')) {
            return redirect(route('admin.template'))
                ->with('message', (__('failed')));
        }


        try {
            $urlToFile = DB::table('template')
                ->select('item_url')
                ->where('item_type', '=', $fileType)
                ->get();
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        if ($urlToFile) {
            foreach ($urlToFile as $image) {
                Storage::disk('public_folder')->delete($image->item_url);
            }

            DB::table('template')
                ->where('item_type', '=', $fileType)
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
                        'item_type' => $fileType,
                        'updated_at' => now()
                    ]);
            } catch (\Exception $e) {
                return $e->getMessage();
            }

        }
        return redirect(route('admin.template'))
            ->with('message', (__('messages.succeedAddedImages')));
    }
}
