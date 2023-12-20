@extends('frontend.adminpage.index')
@section('admin_content')
@section('title', 'Donate List')
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('general/general.css') }}">
    <link rel="stylesheet" href="{{ asset('admincss/listdonate.css') }}">
    {{-- css --}}

    <div class="container">
        <div class="row" style="margin-bottom: 20px">
            <div class="col-lg-6">
                <div class="search">
                    <div class="search-container">
                        <i class="fas fa-magnifying-glass search-icon"></i>
                        <input type="search" placeholder="Enter Name to Search" id="search" name="search"
                            class="form-control input-search">
                    </div>
                </div>
            </div>
        </div>

        <h1>Donate List</h1>
        <div class="row">
            <div class="col-lg-12 mt-5">
                <div class="form-table">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Phone</td>
                                <td>Project</td>
                                <td>Method</td>
                                <td>Amount</td>
                                <td>Detail
                                    {{-- <div class="question-container">
                                        <i class="fa-solid fa-question btn-outline-info"></i>
                                        <div class="info-tooltip">
                                            Please click the icon to view more
                                        </div>
                                    </div> --}}
                                </td>
                            </tr>
                        </thead>
                        <tbody class="data_all">
                            @foreach ($donateinfo as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->project_id }}</td>
                                    <td>{{ $item->method }}</td>
                                    <td>{{ $item->amount }}</td>
                                    <td class="clickmessage"><a class="btn btn-outline-info btn-lg"><i
                                                class="fa-solid fa-info"></i></a></td>

                                </tr>
                                <tr class="message-hide">
                                    <td colspan="8">{{ $item->message }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tbody id="content" class="searchdata"></tbody>

                    </table>

                    <div class="general__pagination">
                        {{ $donateinfo->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                $value = $(this).val();
                if ($value) {
                    $('.data_all').hide();
                    $('.searchdata').show();
                } else {
                    $('.data_all').show();
                    $('.searchdata').hide();
                }
                $.ajax({
                    type: "GET",
                    url: "/admin/searchlistdonate",
                    data: {
                        'search': $value
                    },
                    success: function(data) {
                        $('#content').html(data);
                    }
                })
            })
        })
    </script>
    <script>
        var clickElements = document.querySelectorAll('.clickmessage');

        clickElements.forEach(function(click) {
            click.addEventListener('click', function() {
                var message = this.parentElement
                    .nextElementSibling;

                if (message) {
                    if (message.style.display === 'none' || message.style.display === '') {
                        message.style.display = 'table-row';
                        message.children[0].colSpan = 8;
                    } else {
                        message.style.display = 'none';
                        message.children[0].colSpan = 1;
                    }
                }
            });
        });
    </script>
@endsection
