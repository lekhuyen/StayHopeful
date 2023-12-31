@extends('frontend.adminpage.index')
@section('admin_content')
@section('title', 'Project Volunteer List')
{{-- css --}}
<link rel="stylesheet" href="{{ asset('general/general.css') }}">
<link rel="stylesheet" href="{{ asset('volunteercss/volunteer_list.css') }}">
{{-- css --}}

<div class="volunteer-detail">
    <h1>Project Volunteer List</h1>
    <div class="container mt-3">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Requirement</th>
                    <th>Status</th>
                    <th>Detail</th>
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
                    <td class="text-center">{{ $item->quantity }}</td>
                    <td style="font-style: oblique">
                        @if ($isActive)
                            <span class="text-danger">Unavailable</span>
                        @else
                            <span class="text-success">Available</span>
                        @endif
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-info btn-lg" data-bs-toggle="modal"
                            data-bs-target="#myModal" data-id="{{ $item->id }}"><i class="fa-solid fa-info"></i>
                        </button>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="general__pagination">
        {{ $projects->links() }}
    </div>

</div>
</div>
<div class="modal" id="myModal">
<div class="modal-dialog modal-xl">
    <div class="modal-content">

        <div class="modal-header">
            <h4 class="modal-title">Volunteer Detail List</h4>
            <button type="button" class="btn btn-danger btn-close" data-bs-dismiss="modal"></button>
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
                            <th>Source</th>
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
                <p class='total__volunteer'></p>
            `)
            let output;
            if (data && data.volunteers.length > 0) {
                $(".table_volunteer").show()
                data.volunteers.map((item, index) => {
                    output += `
                <tr>
                    <td>${item.id}</td>
                    <td>${item.finding_source}</td>
                    <td>${item.enrolled?'Already':'Not Yet'}</td>
                    <td>${item.name}</td>
                    <td>${item.phone}</td>
                    <td>${item.email}</td>
                    <td style="font-style:oblique;">${item.volunteer_description}</td>
                    <td>${item.rel_name}</td>
                    <td style="font-style:oblique; font-weight: bold; color:#eb2f06">${item.rel_phone}</td>
                    <td>${item.rel_relationship}</td>
                </tr>

                `
                });
                $('.volunteer_detail').html(output);
                let totalHtml = `<span>Total Register: ${data.volunteers.length}</span>`
                $('.total__volunteer').html(totalHtml);
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
