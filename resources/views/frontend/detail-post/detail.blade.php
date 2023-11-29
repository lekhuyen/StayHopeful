@extends('frontend.comment.comment')

@section('detail-post')

    @section('post-title')
        <div class="container">
            <div class="row">
                <div class="col-lg-12 post-title">
                    <h2>{{$project->title}}</h2>
                </div>
        </div>
    @endsection


    <div class="col-lg-8 post-detail-1">
        {{-- <h4>Tuy đoạn đường từ nhà ra điểm bán chưa đầy 2km nhưng anh Minh phải mất rất nhiều thời gian và
            sức lực mới có thể hoàn thành, đó là chưa kể những ngày thời tiết Sài Gòn đổ mưa hay nắng gắt,
            anh càng vất vả hơn. Ấy vậy mà đều đặn mỗi ngày trên chiếc xe lăn anh Minh vẫn cần cù bán từng
            tờ vé số.
        </h4> --}}

        <span>{{strip_tags($project->description)}}</span>
        @foreach ($project->images as $image)
            <img src="{{asset($image->image)}}" alt="">
        @endforeach
        {{-- <span>Mỗi ngày anh Minh bán được khoảng 100-150 tờ vé số, tiền thuê trọ hàng tháng đã hết 1,5
            triệu nên anh phải chi tiêu tiết kiệm để gửi tiền về hỗ trợ thêm cho mẹ. Anh Minh từng có xe
            lắc nhưng xe đã hư hỏng không dùng được, hiện tại anh di chuyển bằng xe lăn nên đi lại rất hạn
            chế trong khi người bán vé số ngày càng đông, anh càng khó bán hơn. Với số tiền ít ỏi kiếm được
            mỗi ngày anh Minh không dám mơ ước đến một phương tiện mới nhưng anh rất mong ước, nếu có được
            xe điện anh sẽ đi xa hơn, cố gắng bán thêm vé số và tiết kiệm được phần nào sức lực của bản thân.

            Trước hoàn cảnh và sự nỗ lực của anh Minh, Quỹ Bông Sen hy vọng sẽ vận động được 12.000.000 đồng
            để sớm mang tin vui đến cho anh, hy vọng phương tiện mới sẽ hỗ trợ tốt cho anh trên con đường
            mưu sinh phía trước.
            <br>
            Để tránh rủi ro bị lừa qua điện thoại, Quỹ không công khai số điện thoại của người được hỗ trợ. Mọi đóng góp vui lòng liên hệ đến Quỹ Từ thiện Bông Sen – Lầu 5 số 7- 9 -11 Mai Thị Lựu, P.Đa Kao, Q1, TP.HCM – ĐT: (028) 39107612
            Số tài khoản VNĐ:
            Tên Tài Khoản: Quỹ Từ Thiện Bông Sen
            TK1: 0371000481127 – Ngân hàng Vietcombank – Chi nhánh Tân Định
            TK2: 508317 – Ngân hàng ACB – Chi Nhánh Sài Gòn
            Nội dung: Tên Nhà hảo tâm + ủng hộ chiếc xe số 63
            Danh sách Nhà hảo tâm đóng góp:
            1. Nhà hảo tâm Ẩn Danh hỗ trợ 200000 đồng
            2. Nhà hảo tâm TRAN CHAU KIM LONG hỗ trợ 300000 đồng
            3. Nhà hảo tâm YEN TRANG KHANH DUY hỗ trợ 500000 đồng
            4. Nhà hảo tâm DIEU SAM hỗ trợ 100000 đồng
            5. Nhà hảo tâm PHAM HOANG VIET hỗ trợ 1000000 đồng
            6. Nhà hảo tâm Truong Hoang Phuc hỗ trợ 100000 đồng
            7. Nhà hảo tâm VO BACH NGOC hỗ trợ 200000 đồng
            8. Nhà hảo tâm VINH hỗ trợ 300000 đồng
            9. Nhà hảo tâm Phước Lộc Hùng Huỳnh hỗ trợ 1000000 đồng
            10. Nhà hảo tâm HUY hỗ trợ 1000000 đồng
            11. Nhà hảo tâm HUYNH QUANG HUY hỗ trợ 200000 đồng
            12. Nhà hảo tâm DO VAN HIEP hỗ trợ 100000 đồng
            13. Nhà hảo tâm Ẩn Danh hỗ trợ 100000 đồng
            14. Nhà hảo tâm CU BA BUI THI VIET hỗ trợ 2000000 đồng
            Nhà hảo tâm Truong Nhu Nhan hỗ trợ 200000 đồng
        </span> --}}
        <div class="donate_link">
            <a href="#">DONATE</a>
        </div>
        <div class="comment-access">
            <a href="#">LOGIN TO LEAVE A COMMENT</a>
        </div>
        <div class="comment-icon">
            <i class="fa-regular fa-comment"></i>
            <span>2</span>
        </div>
    </div>
    @include("frontend/login/login")
    <script src="{{asset('js/countdonate.js')}}"></script>

@endsection
