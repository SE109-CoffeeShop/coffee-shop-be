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
        foreach ($forms as $form) {
            $data[] = [
                'id' => $form->id,
                'reason' => $form->reason,
                'start_date' => date('d/m/Y', strtotime($form->start_date)),
                'end_date' => date('d/m/Y', strtotime($form->end_date)),
                'status' => $form->status,
            ];
        }

        return response(json_encode($data));
    }
}