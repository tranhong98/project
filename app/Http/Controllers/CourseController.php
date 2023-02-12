<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseDetailStoreRequest;
use App\Http\Requests\CourseStoreRequest;
use App\Http\Requests\CourseUpdateRequest;
use App\Models\Course;
use App\Models\CourseDetail;
use App\Models\CourseType;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('courseType')->paginate(5);

        return view('course.index', compact('courses'));
    }

    public function create()
    {
        $courseTypes = CourseType::all();

        return view('course.create', compact('courseTypes'));
    }

    public function store(CourseStoreRequest $request)
    {
        Course::create($request->only('name', 'course_type_id', 'price'));

        return redirect()->route('courses.index');
    }

    public function edit($id)
    {
        $course = Course::find($id)->load('courseType');
        $courseTypes = CourseType::all();

        return view('course.edit', compact('course', 'courseTypes'));
    }

    public function update(CourseUpdateRequest $request, $id)
    {
        Course::where('id', $id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'course_type_id' => $request->course_type_id,
        ]);

        return redirect()->route('courses.index');
    }

    public function destroy($id)
    {
        Course::destroy($id);

        return redirect()->route('courses.index');
    }

    public function courseDetail($courseId)
    {
        $courseDetails = CourseDetail::where('course_id', $courseId)->paginate(5);
        $course = Course::find($courseId);

        return view('course.courseDetail.index', compact('course', 'courseDetails'));
    }

    public function courseDetailCreate($courseId)
    {
        $course = Course::find($courseId)->load('courseDetails');

        return view('course.courseDetail.create', compact('course'));
    }

    public function courseDetailStore($courseId, CourseDetailStoreRequest $request)
    {
        CourseDetail::create([
            'course_id' => $courseId,
            'name' => $request->name,
            'content' => $request->content,
            'description' => $request->description,
            'video' => $request->video,
        ]);
        return redirect()->route('courses.courseDetails.index', $courseId);
    }

    public function courseDetailDelete($courseId,  $courseDetailId)
    {
        CourseDetail::destroy($courseDetailId);

        return redirect()->route('courses.courseDetails.index', $courseId);
    }

    public function courseDetailEdit(Request $request, $courseId, $stepId)
    {
        $step = CourseDetail::find($stepId);
        $course = Course::find($courseId);
        return view('course.courseDetail.edit', compact('course', 'step'));
    }

    public function courseDetailUpdate($courseId, Request $request, $stepId)
    {
        CourseDetail::where('course_id', $courseId)->where('id', $stepId)->update([
            'course_id' => $courseId,
            'name' => $request->name,
            'content' => $request->content,
            'description' => $request->description,
            'video' => $request->video,
        ]);

        return redirect()->route('courses.courseDetails.index', $courseId);
    }
}
