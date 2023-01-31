<?php

namespace App\Http\Controllers;

use App\Models\CourseUser;
use Illuminate\Http\Request;

class CourseUserController extends Controller
{
    public function index()
    {
        $courseUsers = CourseUser::with(['user', 'course'])->paginate(5);

        return view('course_user.index', compact('courseUsers'));
    }

    public function destroy($id)
    {
        CourseUser::destroy($id);

        return redirect()->route('courseUser.index');
    }

    public function update(Request $request, $id)
    {
        CourseUser::find($id)->update([
            'status' => $request->get('status'),
        ]);

        return redirect()->route('courseUser.index');
    }
}
