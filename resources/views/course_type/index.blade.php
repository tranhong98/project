@extends('layouts.manager.index')

@section('title', 'Quản Lý Thể Loại')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title">Quản Lý Thể Loại</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Bảng Điều Khiển</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thể Loại</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('course-types.create')}}" class="btn btn-success float-right mb-3">Thêm mới</a>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Tên Thể Loại</th>
                            <th>Số Khóa Học</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($courseTypes as $courseType)
                            <tr>
                                <td>
                                    {{ $courseType->name }}
                                </td>
                                <td>
                                    {{ count($courseType->courses) }}
                                </td>
                                <td style="width: 10%;">
                                    <div class="d-flex justify-content-between">
                                        <a class="btn btn-warning btn-sm mr-2"
                                           href="{{route('course-types.edit', $courseType->id)}}">Sửa</a>
                                        <form action="{{route('course-types.destroy',$courseType->id)}}" method="POST">
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
                        {{ $courseTypes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
