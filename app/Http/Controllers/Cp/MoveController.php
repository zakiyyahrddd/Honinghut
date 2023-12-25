<?php

namespace App\Http\Controllers\Cp;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MoveController extends Controller
{

    public function menu(Request $request) {
        $currentMenu = Menu::findOrFail($request->id);
        $currentMenuOrder = $currentMenu->order;
        if ($request->type == 'up') {
            $previousMenu = $currentMenu->previous();
            $currentMenu->update([
                'order' => $previousMenu->order
            ]);
            $previousMenu->update([
                'order' => $currentMenuOrder
            ]);
        }

        if ($request->type == 'down') {
            $nextMenu = $currentMenu->next();
            $currentMenu->update([
                'order' => $nextMenu->order
            ]);
            $nextMenu->update([
                'order' => $currentMenuOrder
            ]);
        }

        return response()->json([
                    'status' => 'Success'
        ]);
    }

    public function submenu(Request $request) {
        $currentMenu = Menu::findOrFail($request->id);
        $currentMenuOrder = $currentMenu->order;
        if ($request->type == 'up') {
            $previousMenu = $currentMenu->previoussub();
            $currentMenu->update([
                'order' => $previousMenu->order
            ]);
            $previousMenu->update([
                'order' => $currentMenuOrder
            ]);
        }

        if ($request->type == 'down') {
            $nextMenu = $currentMenu->nextsub();
            $currentMenu->update([
                'order' => $nextMenu->order
            ]);
            $nextMenu->update([
                'order' => $currentMenuOrder
            ]);
        }

        return response()->json([
                    'status' => 'Success'
        ]);
    }
}
