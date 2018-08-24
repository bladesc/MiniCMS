<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class IndexGalleryAdministratorController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function Gallery()
    {
        $images = DB::table('gallery')->paginate(12);

        return view('administrator.gallery.gallery', [
            'images' => $images
        ]);
    }

    public function Add()
    {
        return view('administrator.gallery.add');
    }

    public function AddProve(Request $request) {

        if ($request->hasFile('fileToUpload')) {
            for ($i=0; $i<count($request->file('fileToUpload')); $i++)
            {
                $url = 'upload/';
                $url .= Storage::disk('upload')->putFile('gallery', $request->file('fileToUpload')[$i]);

                $image_name = ($request->file('fileToUpload')[$i]->getClientOriginalName());

                if($url) {
                    try {
                        DB::table('gallery')->insert([
                                'name' => $image_name,
                                'url' => $url,
                                'visible' => true,
                                'category' => 0,
                                'created_at' => now(),
                                'updated_at' => now()
                            ]);
                    } catch (\Exception $e) {
                        return $e->getMessage();
                    }
                }
            }
        }

        return redirect(route('admin.gallery'))
            ->with('message', (__('messages.succeedAddedImages')));;
    }

    public function addCategory() {
        return view('administrator.cms.addcategory');
    }

    public function addCategoryProve(Request $request)
    {
        $visible = ($request->input('visible') !== null) ? 1 : 0;
        $name = $request->input('name');

        if ($visible && $name) {
            try {
                DB::table('gallery_categories')
                    ->insert([
                        'visible' => $visible,
                        'name' => $name,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
            } catch (\Exception $e) {
                return $e->getMessage();
            }
            $message = __('messages.succeedUpdatedRecord');
        }
        else {
            $message = __('failed');
        }
        return redirect(route('admin.gallery'))
            ->with('message', $message);
    }


}
