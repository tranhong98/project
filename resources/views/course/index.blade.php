@extends('layouts.manager.index')

@section('title', 'Quản Lý Khoá Học')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title">Quản Lý Khoá Học</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Bảng Điều Khiển</a></li>
                <li class="breadcrumb-item active" aria-current="page">Khoá học</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('courses.create')}}" class="btn btn-success float-right mb-3">Thêm mới</a>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Tên Khoá Học</th>
                            <th>Loại khoá Học</th>
                            <th>Giá Tiền</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td>
                                    {{ $course->name }}
                                </td>
                                <td>
                                    {{ $course->courseType->name ?? ''}}
                                </td>
                                <td>
                                    {{ number_format($course->price) . ' VND' }}
                                </td>
                                <td style="width: 10%;">
                                    <div class="d-flex justify-content-between">
                                        <a class="btn btn-info btn-sm mr-2"
                                           href="{{route('courses.courseDetails.index', $course->id)}}">Bài Học</a>
                                        <a class="btn btn-warning btn-sm mr-2"
                                           href="{{route('courses.edit', $course->id)}}">Sửa</a>
                                        <form action="{{route('courses.destroy',$course->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit">Xoá</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="px-5">
                    <div class="float-right">
                        {{ $courses->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
