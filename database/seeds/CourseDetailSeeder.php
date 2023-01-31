<?php

use App\Models\CourseDetail;
use Illuminate\Database\Seeder;

class CourseDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            [
                'name' => 'Khoá học Word',
                'content' => 'Giới thiệu về Word',
                'description' => `Các phiên bản Word thông dụng. Nên dùng phiên bản nào?
                                Các thành phần chính trên giao diện Word
                                Cách lưu file Word. Các định dạng lưu file Word phổ biến`,
                'video' => 'https://www.youtube.com/watch?v=JaMQif8VUCs&ab_channel=Tr%C3%A1iT%C3%A1oXanh',
            ],
            [
                'name' => 'Khoá học Word',
                'content' => 'Các cài đặt chung cần biết khi sử dụng Word',
                'description' => `Đặt tên người soạn thảo văn bản
                Bật/Tắt chức năng kiểm tra lỗi chính tả
                Tuỳ chỉnh chức năng tự động lưu file
                Thay đổi đơn vị đo của thanh thước kẻ`,
                'video' => 'https://www.youtube.com/watch?v=JaMQif8VUCs&ab_channel=Tr%C3%A1iT%C3%A1oXanh',
            ],

        ];
    }
}
