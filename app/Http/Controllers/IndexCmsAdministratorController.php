<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexCmsAdministratorController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function Index()
    {
        return view('administrator.index');
    }

    public function Cms()
    {
        try {
            $cms = DB::table('cms')
                ->select('id', 'name', 'html', 'visible')
                ->get();
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
                ->with('message', (__('messages.succeedDeleteRecord')));

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
                        'name' => $name
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
                        'name' => $name
                    ]);
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
        return redirect(route('admin.cms'))
            ->with('message', (__('messages.succeedUpdatedRecord')));
    }
}
