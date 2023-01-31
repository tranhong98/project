@extends('layouts.manager.index')

@section('title', 'Quản Lý Khoá Học')
@section('breadcrumb')
<div class="page-header">
    <h3 class="page-title">Quản Lý Khoá Học</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Bảng Điều Khiển</a></li>
            <li class="breadcrumb-item "><a href="{{route('course-types.index')}}">Quản Lý Khoá Học</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh Sách Bài Học</li>
        </ol>
    </nav>
</div>
@endsection
@section('content')
<div class="row">

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-align-items-center">
                    <h4 class="card-title">Danh Sách Bài Học</h4>
                    <a href="{{route('courses.courseDetails.create', $course->id)}}" class="btn btn-success float-right mb-3">Thêm mới</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tên Bài Học</th>
                                <th>Nội Dung</th>
                                <th>Miêu Tả</th>
                                <!-- <th>Ảnh</th> -->
                                <th>Video</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courseDetails as $step)
                            <tr>
                                <td>
                                    {{ $step->name }}
                                </td>
                                <td>
                                    {{ $step->content }}
                                </td>
                                <td>
                                    {{ $step->description }}
                                </td>
                                <!-- <td>
                                        <img style="border-radius: unset"
                                             src="{{ assetStorage($step->image) }}"
                                             alt="">
                                    </td> -->
                                <td>
                                    <div class="video">
                                        <iframe width="320" height="150" src="{{ $step->video }}"></iframe>
                                    </div>
                                </td>
                                <td style="width: 10%;">
                                    <div class="d-flex justify-content-center">
                                        <a class="btn btn-warning btn-sm mr-2" href="{{route('courses.courseDetails.edit',['course_id'=>$course->id,'courseDetail_id'=>$step->id])}}">Sửa</a>
                                        <div>
                                            <form action="{{route('courses.courseDetails.destroy', ['course_id'=> $course->id, 'courseDetail_id'=>$step->id])}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger btn-sm" type="submit">Xoá</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="px-5">
                <div class="float-right">
                    {{ $courseDetails->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
