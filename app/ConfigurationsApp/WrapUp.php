<?php

namespace App\ConfigurationsApp;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WrapUp
{
    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response("", 204);
    }

    public function getForms(Request $request) {
        $request->validate([
            'id' => 'required',
        ]);
        $employeeId = $request->input('id');

        $forms = DB::table('request_form')->where('sender_id', $employeeId)->get()->toArray();

        $data = [];

        return response(json_encode($data));
    }
}