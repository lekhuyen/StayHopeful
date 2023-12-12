@extends('frontend.adminpage.index')
@section('admin_content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('volunteercss/volunteer_list.css') }}">

    <div class="volunteer-detail">
        <h1>Project Volunteer</h1>
        <div class="container mt-3">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $item)
                        @php
                            $isActive = false; // Khởi tạo biến kiểm tra active
                        @endphp
                        @foreach ($summedCounts as $key2 => $itemPro)
                            @if ($item['id'] === $key2)
                                @if ($item['quantity'] === $itemPro)
                                    @php
                                        $isActive = true; // Nếu có giá trị giống nhau, đặt isActive thành true
                                    @endphp
                                @break

                                {{-- // Thoát khỏi vòng lặp khi tìm thấy giá trị giống nhau --}}
                            @endif
                        @endif
                    @endforeach
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td><span>{{ $isActive ? 'Unavailable' : 'Available' }}</span></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal"
                                data-bs-target="#myModal" data-id="{{ $item->id }}"><i class="fa-solid fa-info"></i>
                            </button>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$projects->links()}}
    </div>
</div>
<div class="modal" id="myModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Volunteer List</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body body__volunteer">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/spin.js/2.3.2/spin.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            $.ajax({
                url: "volunteer/detail/" + id,
                method: 'GET',
                success: function(response) {
                    console.log("response volkun", response.volunteers);
                    handleShowList(response);
                }
            });
        })

        function handleShowList(data) {
            $('.body__volunteer').html(`
            <table class="table table_volunteer">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Finding Source</th>
                            <th>Enrolled</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Description</th>
                            <th>Relative Name</th>
                            <th>Relative Phone</th>
                            <th>Relative Relationship</th>
                        </tr>
                    </thead>
                    <tbody class="volunteer_detail">
                    </tbody>
                </table>
            `)
            let output;
            if (data && data.volunteers.length > 0) {
                $(".table_volunteer").show()
                data.volunteers.map((item, index) => {
                    output += `
                <tr>
                    <td>${item.id}</td>
                    <td>${item.finding_source}</td>
                    <td>${item.enrolled}</td>
                    <td>${item.name}</td>
                    <td>${item.phone}</td>
                    <td>${item.email}</td>
                    <td>${item.volunteer_description}</td>
                    <td>${item.rel_name}</td>
                    <td>${item.rel_phone}</td>
                    <td>${item.rel_relationship}</td>
                </tr>
                `
                });
                $('.volunteer_detail').html(output);
            } else {
                $('.body__volunteer').html(
                "<p class='text-center'>Have no volunteer register for this project yet.</p>");
            }


            return output;
        }
    });
</script>

@include('frontend/login/login')
@include('frontend/profile/popup_profile')
@endsection
