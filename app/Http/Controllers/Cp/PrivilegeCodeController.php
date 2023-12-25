<?php

namespace App\Http\Controllers\Cp;

use App\Models\PrivilegeCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PrivilegeCodeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            checkPermission($this->user, 'privilege-codes');
            return $next($request);
        });
    }

    public function index()
    {
		$privilegeCode = PrivilegeCode::get();
        return view('cp.privilege-code.index', [
			'privilegeCode' => $privilegeCode,
            'codes' => PrivilegeCode::orderBy('parent', 'ASC')
                ->orderBy('order', 'ASC')
                ->paginate(10),
				
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cp.privilege-code.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'parent' => 'required',
            'name' => 'required',
            'route_name' => 'required',
            'description' => 'required',
            'icon' => 'required',
            'order' => 'required',
        ]);
        PrivilegeCode::create([
            'parent' => $request->parent,
            'name' => $request->name,
            'route_name' => $request->route_name,
            'description' => $request->description,
            'icon' => $request->icon,
            'order' => $request->order,
        ]);
        return redirect(route('cp.privilege-codes.index'))
            ->with('success', 'Privilege code berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PrivilegeCode $privilegeCode)
    {
        return view('cp.privilege-code.show', [
            'code' => $privilegeCode
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PrivilegeCode $privilegeCode)
    {
        return view('cp.privilege-code.edit', [
            'code' => $privilegeCode
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PrivilegeCode $privilegeCode)
    {
        $this->validate($request, [
            'parent' => 'required',
            'name' => 'required',
            'route_name' => 'required',
            'description' => 'required',
            'icon' => 'required',
            'order' => 'required',
        ]);
        $privilegeCode->update([
            'parent' => $request->parent,
            'name' => $request->name,
            'route_name' => $request->route_name,
            'description' => $request->description,
            'icon' => $request->icon,
            'order' => $request->order,
        ]);
        return redirect(route('cp.privilege-codes.index'))
            ->with('success', 'Privilege code berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrivilegeCode $privilegeCode)
    {
		echo $privilegeCode;
    //     $privilegeCode->delete();
    //     return redirect(route('cp.privilege-codes.index'))
    //         ->with('success', 'Privilege code berhasil dihapus.');
     }
}
