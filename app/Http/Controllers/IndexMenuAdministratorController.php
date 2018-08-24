<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexMenuAdministratorController extends Controller
{
    public function Menu()
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
        return redirect(route('admin.menu'))
            ->with('message', $message);
    }
}
