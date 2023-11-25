    @extends('frontend.site')
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
        <form method="POST" action="{{ route('detail.thanhtoan') }}">
            @csrf
            <div class="container">
                <div class="row ">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <div class="formall">
                            <h2 class="mt-4 ">Donate Details</h2>
                            <div class="project p2 ">
                                <div class="form-check form-switch d-flex justify-content-center">
                                    <div class="textandanh2 "><input class="form-check-input" type="checkbox"
                                            id="flexSwitchCheckDefault" name="andanh" value="Andanh"></div>
                                    <div class="textandanh3"><label class="form-check-label" for="flexSwitchCheckDefault"
                                            style="font-size: 15px">ANONYMOUS
                                        </label></div>
                                </div>
                            </div>
                            <div class="project">
                                <select class="form-select setinput" aria-label="Default select example" name="project"
                                    style="border-radius: 20px; background-color: #fbfbfb">
                                    <option selected>Chọn Dự Án Muốn Ủng Hộ</option>
                                    <option value="Quỹ Từ Thiện">Quỹ từ thiện</option>
                                    <option value="Quỹ giúp đỡ thú cưng">Quỹ giúp đỡ thú cưng</option>
                                    <option value="Đố bạn biết đấy">Đố bạn biết đấy</option>
                                </select>
                            </div>
                            <div class="project">
                                <select class="form-select setinput" aria-label="Default select example" name="banktype"
                                    style="border-radius: 20px; background-color: #fbfbfb" id="banktype">
                                    <option selected>Hình Thức Đóng Góp</option>
                                    <option value="Bank">Bank</option>
                                    <option value="Momo">Momo</option>
                                    <option value="Paypal">Paypal</option>
                                    <option value="artifacts">Hiện Vật</option>
                                </select>
                            </div>
                            <div class="project" id="bankDropdown" style="display: none;">
                                <select class="form-select setinput" aria-label="Default select example" name="bank"
                                    style="border-radius: 20px; background-color: #fbfbfb;" id="bankSelect">
                                    <option selected>Chọn Ngân Hàng</option>
                                    <option value="VIB" data-imagesrc="{{ asset('img/logobank/logovib.png') }}">VIB
                                    </option>
                                    <option value="BIDV" data-imagesrc="{{ asset('img/logobank/logobidv.png') }}">BIDV
                                    </option>
                                    <option value="SCB" data-imagesrc="{{ asset('img/logobank/logoscb.png') }}">SCB
                                    </option>
                                    <option value="ACB" data-imagesrc="{{ asset('img/logobank/logoacb.png') }}">ACB
                                    </option>
                                    <option value="OCB" data-imagesrc="{{ asset('img/logobank/logoocb.png') }}">OCB
                                    </option>
                                    <input type="hidden" name="selectedBank" id="selectedBank" value="">
                                </select>
                            </div>
                            <div class="project" id="momoDropdown" style="display: none;">
                                <select class="form-select setinput" aria-label="Default select example" name="momoSelect"
                                    style="border-radius: 20px; background-color: #fbfbfb" id="momoSelect">
                                    <option selected>Chọn Phương Thức</option>
                                    <option value="momoqr" data-imagesrc="{{ asset('img/logobank/logomomo.png') }}">Momo QR
                                    </option>
                                    <option value="momocard" data-imagesrc="{{ asset('img/logobank/logomomo.png') }}">Momo
                                        Card</option>
                                    <input type="hidden" name="selectedMomo" id="selectedMomo" value="">

                                </select>

                            </div>
                            <div class="project">
                                <div class="input-group setinput">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text textten" id="inputGroup-sizing-default"
                                            style="padding: 8px;">Tên</span>
                                    </div>
                                    <input type="text" class="form-control textten2" aria-label="Default" name="name"
                                        aria-describedby="inputGroup-sizing-default" style="background-color: #fbfbfb"
                                        placeholder="Nhập Tên">
                                </div>
                            </div>
                            {{-- vnd input --}}
                            <div class="project" id="vndinput">
                                <div class="input-group setinput">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text textten" style="padding: 8px">VND</span>
                                    </div>
                                    <input type="text" class="form-control "
                                        aria-label="Amount (to the nearest dollar)" name="vnd"
                                        style="background-color: #fbfbfb">
                                    <div class="input-group-append">
                                        <span class="input-group-text textten2" style="padding: 8px">.000</span>
                                    </div>
                                </div>
                            </div>
                            {{-- paypal input --}}
                            <div class="project" id="paypalinput" style="display: none;">
                                <div class="input-group setinput">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text textten" style="padding: 8px">USD</span>
                                    </div>
                                    <input type="text" class="form-control "
                                        aria-label="Amount (to the nearest dollar)" name="usd"
                                        style="background-color: #fbfbfb" id="usd">
                                    <div class="input-group-append">
                                        <span class="input-group-text textten2" style="padding: 8px">.00</span>
                                    </div>
                                </div>
                            </div>
                            {{-- message --}}
                            <div class="project">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                  </div>
                            </div>
                            {{-- button bank --}}
                            {{-- <div class="project" id="bankButton">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success setinput"
                                        style="width: 40%; border-radius: 20px; background: linear-gradient(to left ,#74cbfd, #0890df); border: 2px solid white;
        ;"
                                        name="redirect" id="confirmBtnbank">QUYÊN GÓP
                                    </button>
                                </div>
                            </div> --}}
                            {{-- button momo --}}
                            <div class="project" id="momoButton" style="display: none;">
                                <div class="text-center">
                                    <button type="submit" class="btn setinput"
                                        style="width: 40%; border-radius: 20px;color: #fbfbfb ;background: linear-gradient(to left ,#74cbfd, #0890df); border: 2px solid white;
        ;"
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
                </div>
                @csrf

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
        <script src="{{ asset('js/donate.js') }}"></script>
    @endsection()
