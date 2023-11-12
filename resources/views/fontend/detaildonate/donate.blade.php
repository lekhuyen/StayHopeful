    @extends('fontend.site')
    @section('main')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <link rel="stylesheet" href="{{ asset('detaildonate/donate.css') }}">
        <div class="container-fluid" style="padding: 0;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="nav3">
                        <h3>Form</h3>
                    </div>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('detail.thanhtoan') }}" autocomplete="off">
            <div class="container2">
                @csrf
                <div class="formall">
                    <h2 class="mt-4 ">Donate Details</h2>
                    <div class="project p2">
                        <div class="form-check form-switch">
                            <div class="textandanh2"><input class="form-check-input" type="checkbox"
                                    id="flexSwitchCheckDefault" name="andanh" value="Andanh"></div>
                            <div class="textandanh3"><label class="form-check-label" for="flexSwitchCheckDefault">DONATE ẨN
                                    DANH</label></div>
                        </div>
                    </div>
                    <div class="project">
                        <select class="form-select setinput" aria-label="Default select example" name="project"
                            style="border-radius: 20px; background-color: #E8EAEB">
                            <option selected>Chọn Dự Án Muốn Ủng Hộ</option>
                            <option value="Quỷ Từ Thiện">Quỷ từ thiện</option>
                            <option value="Quỷ giúp đỡ thú cưng">Quỷ giúp đỡ thú cưng</option>
                            <option value="Đố bạn biết đấy">Đố bạn biết đấy</option>
                        </select>
                    </div>
                    <div class="project">
                        <select class="form-select setinput" aria-label="Default select example" name="banktype"
                            style="border-radius: 20px; background-color: #E8EAEB" id="banktype">
                            <option selected>Chọn Phương Thức Thanh Toán</option>
                            <option value="Bank">Bank</option>
                            <option value="Momo">Momo</option>
                            <option value="Paypal">Paypal</option>
                        </select>
                    </div>
                    <div class="project" id="bankDropdown" style="display: none;">
                        <select class="form-select setinput" aria-label="Default select example" name="bank"
                            style="border-radius: 20px; background-color: #E8EAEB" id="bankSelect">
                            <option selected>Chọn Ngân Hàng</option>
                            <option value="VIB">VIB</option>
                            <option value="BIDV">BIDV</option>
                            <option value="SCB">SCB</option>
                            <option value="ACB">ACB</option>
                            <option value="OCB">OCB</option>
                        </select>
                    </div>
                    <div class="project" id="momoDropdown" style="display: none;">
                        <select class="form-select setinput" aria-label="Default select example" name="momoSelect"
                            style="border-radius: 20px; background-color: #E8EAEB" id="momoSelect">
                            <option value="momoqr">Momo QR</option>
                            <option value="momocard">Momo Card</option>
                        </select>

                    </div>
                    <div class="project">
                        <div class="input-group setinput">
                            <div class="input-group-prepend">
                                <span class="input-group-text textten" id="inputGroup-sizing-default"
                                    style="padding: 8px;">Tên
                                    của bạn: </span>
                            </div>
                            <input type="text" class="form-control textten2" aria-label="Default" name="name"
                                aria-describedby="inputGroup-sizing-default" style="background-color: #E8EAEB"
                                placeholder="Nhập Tên">
                        </div>
                    </div>
                    <div class="project">
                        <div class="input-group setinput">
                            <div class="input-group-prepend">
                                <span class="input-group-text textten" style="padding: 8px">VND</span>
                            </div>
                            <input type="text" class="form-control " aria-label="Amount (to the nearest dollar)"
                                name="amount" style="background-color: #E8EAEB">
                            <div class="input-group-append">
                                <span class="input-group-text textten2" tyle="padding: 8px">.000</span>
                            </div>
                        </div>

                    </div>
                    <div class="project" id="bankButton">
                        <div class="text-center">
                            <button type="submit" class="btn btn-success setinput" style="width: 30%; border-radius: 20px"
                                name="redirect" id="confirmBtnbank">Xác nhận</button>

                        </div>
                    </div>
                    <div class="project" id="momoButton" style="display: none;">
                        <div class="text-center">
                            <button type="submit" class="btn btn-danger setinput"
                                style="width: 30%; border-radius: 20px" name="payUrl" id="confirmBtnmomo">Xác
                                nhận</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <script>
            $(document).ready(function() {
                $("#banktype").change(function() {
                    var selectedMethod = $(this).val();
                    banktype(selectedMethod);
                });

                $('#bankSelect').change(function() {
                    var bankValue = $(this).val();
                    console.log("Selected bank value: " + bankValue);
                });

                $('#momoSelect').change(function() {
                    var momoValue = $(this).val();
                    console.log("Selected momo value: " + momoValue);
                });

                function banktype(selectedMethod) {
                    console.log("Selected value: " + selectedMethod);
                    if (selectedMethod === "Bank") {
                        $('#bankDropdown').show();
                        $('#momoDropdown').hide();
                        $('#bankButton').show();
                        $('#momoButton').hide();
                    } else if (selectedMethod === 'Momo') {
                        $('#bankDropdown').hide();
                        $('#momoDropdown').show();
                        $('#bankButton').hide();
                        $('#momoButton').show();
                    } else {
                        $('#bankDropdown').hide();
                        $('#momoDropdown').hide();
                        $('#bankButton').show();

                    }
                }
            });
        </script>
    @endsection()
