<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class IndexGalleryAdministratorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Gallery(Request $request)
    {

        $sort = $request->input('sortByParameter');
        $category = $request->input('sortByCategory');

        switch ($sort) {
            case 'nameAsc':
                $columnName = 'name';
                $sortType = 'ASC';
                break;
            case 'nameDesc':
                $columnName = 'name';
                $sortType = 'DESC';
                break;
            case 'dateAsc':
                $columnName = 'created_at';
                $sortType = 'ASC';
                break;
            case 'dateDesc':
                $columnName = 'created_at';
                $sortType = 'DESC';
                break;
            default:
                $columnName = 'created_at';
                $sortType = 'ASC';
                break;
        }

        $query = DB::table('gallery');
        $query->orderBy($columnName, $sortType);
        if (isset($category)) {
            $query->where('category', '=' , $category);
        };
        $images = $query->paginate(12);

        $categories = DB::table('gallery_categories')
            ->select('id', 'name')
            ->where('visible', '=', true)
            ->get();

        $parameters = [
            'nameAsc' => ['Name ascending'],
            'nameDesc' => ['Name descending'],
            'dateAsc' => ['Date ascending'],
            'dateDesc' => ['Date ascending']
        ];

        foreach ($parameters as $key=>$value) {
            if ($key == $sort) {
                $parameters[$key][] = 'selected';
            } else {
                $parameters[$key][] = '';
            }
        }

        $categoriesArray=[];
        foreach ($categories as $key=>$value) {
            if ($value->id == $category) {
                $tempCategory = 'selected';
            } else {
                $tempCategory = '';
            }
            $categoriesArray[] = ['id' => $value->id, 'name' => $value->name, 'selected' => $tempCategory];
        }

        return view('administrator.gallery.gallery', [
            'images' => $images,
            'categories' => $categoriesArray,
            'parameters' => $parameters
        ]);
    }

    public function Add()
    {
        $categories = DB::table('gallery_categories')
            ->select('id', 'name')
            ->where('visible', '=', true)->get();

        return view('administrator.gallery.add', [
            'categories' => $categories
        ]);
    }

    public function AddProve(Request $request) {

        $category = $request->input('sortByCategory');

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
                                'category' => $category,
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
