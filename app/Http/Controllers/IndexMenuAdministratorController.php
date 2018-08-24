<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexMenuAdministratorController extends Controller
{
    public function Menu(Request $request)
    {
        $menu = DB::table('menu')
            ->select('id', 'name', 'url', 'visible')
            ->get();

        return view('administrator.menu.menu', [
            'menu' => $menu
        ]);
    }

    public function Add() {
        return view('administrator.menu.add');
    }

    public function AddProve(Request $request) {
        $visible = ($request->input('visible') !== null) ? 1 : 0;
        $url = $request->input('url');
        $name = $request->input('name');

        if ($visible && $url && $name) {
            try {
                DB::table('menu')
                    ->insert([
                        'visible' => $visible,
                        'url' => $url,
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
        return redirect(route('admin.menu'))
            ->with('message', $message);
    }

    public function Modify(Request $request)
    {
        $id = $request->input('id');
        try {
            $menu = DB::table('menu')
                ->select('id', 'name', 'url', 'visible')
                ->where('id','=', $id)
                ->get();
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return view('administrator.menu.modify', [
            'menu' => $menu
        ]);
    }

    public function ModifyProve(Request $request)
    {
        $id = $request->input('id');
        $visible = ($request->input('visible') !== null) ? 1 : 0;
        $url = $request->input('url');
        $name = $request->input('name');

        if ($id && $visible && $url && $name) {
            try {
                DB::table('menu')
                    ->where('id', $id)
                    ->update([
                        'visible' => $visible,
                        'url' => $url,
                        'name' => $name,
                        'updated_at' => now()
                    ]);
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
        return redirect(route('admin.menu'))
            ->with('message', (__('messages.succeedUpdatedRecord')));
    }

    public function Delete(Request $request)
    {
        $id = $request->input('id');
        try {
            $menu = DB::table('menu')
                ->select('id')
                ->where('id','=', $id)
                ->get();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return view('administrator.menu.delete', [
            'menu' => $menu
        ]);

    }

    public function DeleteProve(Request $request)
    {
        $id = $request->input('id');

        if ($id) {
            try {
                DB::table('menu')
                    ->where('id', '=', $id)->delete();
            } catch (\Exception $e)
            {
                return $e->getMessage();
            }

            return redirect(route('admin.menu'))
                ->with('message', (__('messages.succeedDeleteRecord')));

        }
    }
}
