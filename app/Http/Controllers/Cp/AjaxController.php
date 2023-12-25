<?php

namespace App\Http\Controllers\Cp;
use App\Models\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class AjaxController extends Controller
{

    public function destroyFile(Request $request)
    {
        File::findOrFail($request->id)->delete();
        echo TRUE;
    }

}
