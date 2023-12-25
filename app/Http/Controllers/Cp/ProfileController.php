<?php

namespace App\Http\Controllers\Cp;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Http\Controllers\Controller;

class ProfileController extends Controller {

    public function edit() {
        return view('cp.profiles.edit', [
            'user' => user()
        ]);
    }

    public function update(Request $request) {
        $user = user();

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
      

        return redirect(route('cp.profiles.edit'))
                        ->with('success', 'Profile Updated.');
    }

}
