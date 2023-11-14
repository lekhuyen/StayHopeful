    @extends('fontend.site')
    @section('main')
        <link rel="stylesheet" href="{{ asset('detaildonate(css)/donate.css') }}">
        <div class="container-fluid" style="padding: 0;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="nav3">
                        <h3>Form</h3>
                    </div>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('detail.thanhtoan') }}" >
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
                            style="border-radius: 20px; background-color: #E8EAEB;" id="bankSelect">
                            <option selected>Chọn Ngân Hàng</option>
                            <option value="VIB" data-imagesrc="{{ asset('img/logovib.png') }}">VIB</option>
                            <option value="BIDV" data-imagesrc="{{ asset('img/logobidv.png') }}">BIDV</option>
                            <option value="SCB" data-imagesrc="{{ asset('img/logoscb.png') }}">SCB</option>
                            <option value="ACB" data-imagesrc="{{ asset('img/logoacb.png') }}">ACB</option>
                            <option value="OCB" data-imagesrc="{{ asset('img/logoocb.png') }}">OCB</option>
                            <input type="hidden" name="selectedBank" id="selectedBank" value="">
                        </select>
                    </div>
                    <div class="project" id="momoDropdown" style="display: none;">
                        <select class="form-select setinput" aria-label="Default select example" name="momoSelect"
                            style="border-radius: 20px; background-color: #E8EAEB" id="momoSelect">
                            <option selected>Chọn Phương Thức</option>
                            <option value="momoqr" data-imagesrc="{{ asset('img/logomomo.png') }}">Momo QR</option>
                            <option value="momocard" data-imagesrc="{{ asset('img/logomomo.png') }}">Momo Card</option>
                            <input type="hidden" name="selectedMomo" id="selectedMomo" value="">

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
                    {{-- vnd input --}}
                    <div class="project" id="vndinput">
                        <div class="input-group setinput">
                            <div class="input-group-prepend">
                                <span class="input-group-text textten" style="padding: 8px">VND</span>
                            </div>
                            <input type="text" class="form-control " aria-label="Amount (to the nearest dollar)"
                                name="vnd" style="background-color: #E8EAEB">
                            <div class="input-group-append">
                                <span class="input-group-text textten2" tyle="padding: 8px">.000</span>
                            </div>
                        </div>
                    </div>
                    {{-- paypal input --}}
                    <div class="project" id="paypalinput" style="display: none;">
                        <div class="input-group setinput">
                            <div class="input-group-prepend">
                                <span class="input-group-text textten" style="padding: 8px">USD</span>
                            </div>
                            <input type="text" class="form-control " aria-label="Amount (to the nearest dollar)"
                                name="usd" style="background-color: #E8EAEB" id="usd">
                            <div class="input-group-append">
                                <span class="input-group-text textten2" tyle="padding: 8px">.00</span>
                            </div>
                        </div>
                    </div>
                    {{-- button bank --}}
                    <div class="project" id="bankButton">
                        <div class="text-center">
                            <button type="submit" class="btn btn-success setinput"
                                style="width: 100%; border-radius: 20px" name="redirect" id="confirmBtnbank">Quyên Góp
                                Bank</button>
                        </div>
                    </div>
                    {{-- button momo --}}
                    <div class="project" id="momoButton" style="display: none;">
                        <div class="text-center">
                            <button type="submit" class="btn setinput"
                                style="width: 100%; border-radius: 20px; background: #A51F68; color: #ffffff"
                                name="payUrl" id="confirmBtnmomo">Quyên
                                Góp Momo</button>
                        </div>
                    </div>
                    {{-- button paypal --}}
                    <div class="project" id="paypalButton" style="display: none;">
                        <div class="text-center">
                            <div id="paypal-button-container"></div>
                            <p id="result-message"></p>
                        </div>
                    </div>

                </div>
            </div>
        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.rawgit.com/prashantchaudhary/ddslick/master/jquery.ddslick.min.js">
        </script>
        <script
            src="https://www.paypal.com/sdk/js?client-id=AfiFCexDpQQLaqovZ_V48J5NoDMEwGCV0iRKv3t_raPZ-xYZymXh1L36yhnnCcXLVjTtRYofznakmDUK&components=buttons,marks&disable-funding=credit,card">
        </script>
        <script src="{{ asset('js/paypal.js') }}"></script>
        <script src="{{ asset('js/imageselect.js') }}"></script>

        <script>
            $(document).ready(function() {
                $("#banktype").change(function() {
                    var selectedMethod = $(this).val();
                    banktype(selectedMethod);
                });
                $('#bankSelect').ddslick({
                    width: "100%",
                    imagePosition: "left",
                    onSelected: function(selectedData) {
                        // Set the value to the hidden input
                        $('#selectedBank').val(selectedData.selectedData.value);
                    }
                });
                $('#momoSelect').ddslick({
                    width: "100%",
                    imagePosition: "left",
                    onSelected: function(selectedData) {
                        // Set the value to the hidden input
                        $('#selectedMomo').val(selectedData.selectedData.value);
                    }
                });

                // Bạn có thể cũng thêm một sự kiện change cho dropdown để cập nhật giá trị khi người dùng thay đổi chọn
                $('#bankSelect').change(function() {
                    var bankValue = $(this).val();
                    $('#selectedBank').val(bankValue);
                    console.log(bankValue);
                });

                $('#momoSelect').change(function() {
                    var momoValue = $(this).val();
                    $('#selectedMomo').val(momoValue);
                    console.log(momoValue);

                });

                function banktype(selectedMethod) {
                    console.log("Selected value: " + selectedMethod);
                    if (selectedMethod === "Bank") {
                        $('#bankDropdown').show();
                        $('#momoDropdown').hide();
                        $('#paypalButton').hide();
                        $('#bankButton').show();
                        $('#momoButton').hide();
                        $('#paypalinput').hide();
                        $('#vndinput').show();

                    } else if (selectedMethod === 'Momo') {
                        $('#bankDropdown').hide();
                        $('#momoDropdown').show();
                        $('#bankButton').hide();
                        $('#paypalButton').hide();
                        $('#momoButton').show();
                        $('#paypalinput').hide();
                        $('#vndinput').show();
                    } else if (selectedMethod === 'Paypal') {
                        $('#bankDropdown').hide();
                        $('#momoDropdown').hide();
                        $('#paypalButton').show();
                        $('#bankButton').hide();
                        $('#momoButton').hide();
                        $('#paypalinput').show();
                        $('#vndinput').hide();
                    } else {
                        $('#bankDropdown').hide();
                        $('#momoDropdown').hide();
                        $('#bankButton').show();
                        $('#momoButton').hide();
                        $('#paypalButton').hide();
                        $('#paypalinput').hide();
                        $('#vndinput').show();


                    }
                }
            });
        </script>
    @endsection()
