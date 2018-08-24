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
        return view('administrator.gallery.gallery', [
            'gallery' => 'dd'
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

                /*if($url) {
                    if(DB::table('images')->insert(
                        ['name' => $image_name, 'url' => $url]
                    )) {

                    }
                }*/
            }
        }

        return redirect(route('admin.gallery'));
    }


}
