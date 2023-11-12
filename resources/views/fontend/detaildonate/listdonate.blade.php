@extends('fontend.site')
@section('main')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    {{-- icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- icon --}}
    {{-- ajax --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    {{-- ajax --}}
    <link rel="stylesheet" href="{{ asset('detaildonate/listdonate.css') }}">


    <div class="container-fluid" style="padding: 0;">
        <div class="row">
            <div class="col-lg-12">
                <div class="nav3 ">
                    <div class="input-group mb-3 setinput2">
                        <button class="input-group-text btn-start" id="basic-addon1"><i
                                class="fa-solid fa-microphone"></i></button>
                        <input type="text" class="form-control output" placeholder="Enter Name search"
                            aria-label="Username" aria-describedby="basic-addon1" id="search">
                    </div>
                    <div class="textnav3">
                        <h3>List</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="tableform mt-4">
            <table class="table">
                <thead class="text-center">
                    <tr>
                        <th>Name</th>
                        <th>Project</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody class="text-center ">
                    <tr class="align-top" style="border-radius: 20px; background-color: #A3D48F; ">
                        <td>Username</td>
                        <td>Project Name</td>
                        <td>$$$$$</td>
                        <td>DD/MM/YY</td>
                    </tr>
                    <tr style="border-radius: 20px; background-color: #A3D48F">
                        <td>Username</td>
                        <td>Project Name</td>
                        <td>$$$$$</td>
                        <td>DD/MM/YY</td>
                    </tr>
                    <tr style="border-radius: 20px; background-color: #A3D48F">
                        <td>Username</td>
                        <td>Project Name</td>
                        <td>$$$$$</td>
                        <td>DD/MM/YY</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
    <script src="{{ asset('js/listdonate.js') }}"></script>
    </body>

    </html>
@endsection()
