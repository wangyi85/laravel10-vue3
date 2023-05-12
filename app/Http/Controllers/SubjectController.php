<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Subject;
use App\Models\UserSubject;

class SubjectController extends Controller
{
    public function get(Request $request) {
        // $user = DB::table('users')->where('email', $request->input('email'))->where('password', $request->input('password'))->get();
        $user = User::where('email', $request->input('email'))->get();

        if (count($user) == 0) {
            return response()->json([
                'status' => 'success',
                'comment' => 'Invalid user'
            ]);
        } else {
            // $subjects = DB::table('user_subjects')->leftJoin('subjects', 'user_subjects.subject_id', '=', 'subjects.id')->select('subjects.name')->where('user_id', $user[0]->id)->get()->toArray();
            $subjects = UserSubject::leftJoin('subjects', function($join) {
                $join->on('user_subjects.subject_id', '=', 'subjects.id');
            })->select('subjects.name')->where('user_id', $user[0]->id)->get()->toArray();
            if (count($subjects) == 0) {
                return response()->json([
                    'status' => 'empty',
                    'comment' => 'No subjects'
                ]);
            }
            return response()->json([
                'status' => 'success',
                'subjects' => array_column($subjects, 'name')
            ]);
        }
    }
}
