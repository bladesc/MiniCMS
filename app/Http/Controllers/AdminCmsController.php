<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCmsController extends Controller
{

    public function Index()
    {
        return view('administrator.index');
    }

    public function Cms(Request $request)
    {
        $sort = $request->input('sortByParameter');

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
                $columnName = 'id';
                $sortType = 'ASC';
                break;
        }

        try {
            $query = DB::table('cms');
            $query->orderBy($columnName, $sortType);
            if (isset($category)) {
                $query->where('category', '=' , $category);
            };
            $cms = $query->paginate(12);
            if (isset($sort)) {
                $cms->appends('sortByParameter', $sort);
            };

        } catch (\Exception $e) {
            return $e->getMessage();
        }


        return view('administrator.cms.cms', [
            'cms' => $cms
        ]);
    }

    public function Delete(Request $request)
    {
        $id = $request->input('id');
        try {
            $cms = DB::table('cms')
                ->select('id')
                ->where('id','=', $id)
                ->get();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return view('administrator.cms.delete', [
            'cms' => $cms
        ]);

    }

    public function DeleteProve(Request $request)
    {
        $id = $request->input('id');

        if ($id) {
            try {
                DB::table('cms')
                    ->where('id', '=', $id)->delete();
            } catch (\Exception $e)
            {
                return $e->getMessage();
            }


            return redirect(route('admin.cms'))
                ->with('message', (__('messages.succeedDeletedRecord')));

        }
    }

    public function Add() {
        return view('administrator.cms.add');
    }

    public function AddProve(Request $request) {
        $visible = ($request->input('visible') !== null) ? 1 : 0;
        $html = $request->input('html');
        $name = $request->input('name');

        if ($visible && $html && $name) {
            try {
                DB::table('cms')
                    ->insert([
                        'visible' => $visible,
                        'html' => $html,
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
        return redirect(route('admin.cms'))
            ->with('message', $message);
    }

    public function Modify(Request $request)
    {
        $id = $request->input('id');
        try {
            $cms = DB::table('cms')
                ->select('id', 'name', 'html', 'visible')
                ->where('id','=', $id)
                ->get();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return view('administrator.cms.modify', [
            'cms' => $cms
        ]);
    }

    public function ModifyProve(Request $request)
    {
        $id = $request->input('id');
        $visible = ($request->input('visible') !== null) ? 1 : 0;
        $html = $request->input('html');
        $name = $request->input('name');

        if ($id && $visible && $html && $name) {
            try {
                DB::table('cms')
                    ->where('id', $id)
                    ->update([
                        'visible' => $visible,
                        'html' => $html,
                        'name' => $name,
                        'updated_at' => now()
                    ]);
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
        return redirect(route('admin.cms'))
            ->with('message', (__('messages.succeedUpdatedRecord')));
    }
}
