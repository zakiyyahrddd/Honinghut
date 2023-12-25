<?php

namespace App\Http\Controllers\Cp;

use App\Models\Content;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Controllers\Controller;
use App\Models\ContentPreview;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            checkPermission($this->user, 'contents');
            return $next($request);
        });
    }

    public function index()
    {
        $client = Client::get();
        return view('cp.content.index', [
			'clients' => $client
		]);

    }


    public function show($client)

    {


        return view('cp.content.show', [


            'clients' => $client,
            'content_preview' => ContentPreview::where('client_id', $client->id)
               ->orderBy('created_at', 'DESC')
                ->paginate(10)
        ]);
    }

}
