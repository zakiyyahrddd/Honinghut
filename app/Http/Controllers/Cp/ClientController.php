<?php

namespace App\Http\Controllers\Cp;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            checkPermission($this->user, 'clients');
            return $next($request);
        });
    }

    public function index()
    {
        return view('cp.client.index', [
            'apps' => Client::orderBy('created_at', 'DESC')->paginate(10)
        ]);
    }

    public function create()
    {
        return view('cp.client.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'Nama harus diisi !',
            ]
        );
        $app = Client::create([
            'name' => $request->name,
        ]);
        return redirect(route('cp.clients.index'))
            ->with('success', 'Client berhasil ditambahkan.');
    }

    public function show()
    {
        abort(404);
    }

    public function edit(Client $client)
    {
        return view('cp.client.edit', [
            'app' => $client
        ]);
    }

    public function update(Request $request, Client $client)
    {
        $request->validate(
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'Nama harus diisi !',
            ]
        );
        $client->update([
            'name' => $request->name,
        ]);

        return redirect(route('cp.clients.index'))
            ->with('success', 'Client berhasil diubah.');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect(route('cp.clients.index'))
            ->with('success', 'Client berhasil dihapus.');
    }
}
