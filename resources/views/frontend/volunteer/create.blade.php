@extends('frontend.site')
@section('title', 'Volunteer Form')
@section('main')

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('volunteercss/volunteer.css') }}">
    {{-- css --}}
    
    <div class="container__voting mt-5">
        <div class="row row__voting">
            <h1 class="h1_title__voting">Volunteer Form</h1>
            @if (session('success'))
                <div class="alert alert-success">
                    <strong>Success! {{ session('success') }}</strong>
                </div>
            @endif
            <div class="voting__form">
                <form action="{{ route('volunteer.store') }}" method="post">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="finding_source">Where did you find us?</label>
                        <div class="grid_container_social__network">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="check1" name="finding_source"
                                    value="newspaper" {{ old('finding_source') == 'newspaper' ? 'checked' : '' }} checked>
                                <label class="form-check-label" for="check1">Newspaper</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="check2" name="finding_source"
                                    value="email" {{ old('finding_source') == 'email' ? 'checked' : '' }}>
                                <label class="form-check-label" for="check2">Email</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="check3" name="finding_source"
                                    value="advertisement" {{ old('finding_source') == 'advertisement' ? 'checked' : '' }}>
                                <label class="form-check-label" for="check3">Advertisement</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="check4" name="finding_source"
                                    value="online" {{ old('finding_source') == 'online' ? 'checked' : '' }}>
                                <label class="form-check-label" for="check4">Online Search</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="check5" name="finding_source"
                                    value="Referred by Friend"
                                    {{ old('finding_source') == 'Referred by Friend' ? 'checked' : '' }}>
                                <label class="form-check-label" for="check5">Referred by Friend</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="check6" name="finding_source"
                                    value="other" {{ old('finding_source') == 'other' ? 'checked' : '' }}>
                                <label class="form-check-label" for="check6">Other</label>
                            </div>

                        </div>

                        <div class="input-group mb-3 container__personalinfo">
                            <span class="input-group-text">Personal</span>
                            <input type="text" class="form-control voting__label"
                                value="{{ old('name', $user ? $user['name'] : '') }}" id="name" placeholder="Name"
                                {{ $user ? 'readonly' : '' }} name="name">
                            <input type="text" class="form-control voting__label" id="phone" placeholder="Phone"
                                {{ $user ? 'readonly' : '' }} name="phone"
                                value="{{ old('phone', $user ? $user['phone'] : '') }}">
                            <input type="text" class="form-control voting__label" id="email" placeholder="Email"
                                {{ $user ? 'readonly' : '' }} name="email"
                                value="{{ old('email', $user ? $user['email'] : '') }}">
                        </div>
                        <div>
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            @error('phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <label for="volunteer_before">Have you ever been a part of us before?</label>
                        <div class="container__checkbox">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="volunteer" name="enrolled" value="1"
                                    checked {{ old('enrolled') == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="volunteer">Already</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="nonvolunteer" name="enrolled"
                                    value="0" {{ old('enrolled') == '0' ? 'checked' : '' }}>Not Yet
                                <label class="form-check-label" for="nonvolunteer"></label>
                            </div>
                        </div>

                        <div class="form-donate-info">
                            <div class="form-info-detail">
                                <div class="form-floating">
                                    <select class="form-select" id="votingSelect"
                                        aria-label="Floating label select example" name="project_id">
                                        <option selected>Select Project</option>
                                        @foreach ($projects as $item)
                                            @php
                                                $isActive = false; // Khởi tạo biến kiểm tra active
                                            @endphp
                                            @php
                                                $isActive = false; // Khởi tạo biến kiểm tra active
                                                $count = 0;
                                            @endphp
                                            @foreach ($volunteers as $itemPro)
                                                @if ($item->id === $itemPro->project_id)
                                                    @php
                                                        $count++;
                                                    @endphp
                                                    @if ($count >= $item->quantity)
                                                        @php
                                                            $isActive = true; // Nếu có giá trị giống nhau, đặt isActive thành true
                                                        @endphp
                                                        {{-- @break --}}
                                                    @endif
                                                @endif
                                            @endforeach
                                            <option value="{{ $item->id }}"
                                                {{ $project_id == $item->id ? 'selected' : '' }}
                                                {{ $isActive ? 'disabled' : '' }}>{{ $item->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="votingSelect" class="voting__label">Which projects are you interested
                                        in
                                        volunteering?</label>
                                </div>
                            </div>
                        </div>
                        <div class="description__voting">
                            <div class="description__voting_detail">
                                <span class="description__voting_title">Tell us why you want to be a volunteer:</span>
                                <div class="description__voting_content">
                                    <textarea class="form-control voting__label" placeholder="Write your thoughts here" id="voting_description"
                                        name="volunteer_description" style="height: 80px">{{ old('volunteer_description') }}</textarea>
                                    @error('volunteer_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="relationship_form">
                            <label for="relationship_form">If you are involved with us as a Volunteer and an emgergency
                                arises, whom should we
                                contact?</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Relatives</span>
                                <input type="text" class="form-control voting__label" id="name1"
                                    placeholder="Name" name="rel_name" value="{{ old('rel_name') }}">
                                <input type="text" class="form-control voting__label" id="phone1"
                                    placeholder="Phone" name="rel_phone" value="{{ old('rel_phone') }}">
                                <input type="text" class="form-control voting__label" id="relationship"
                                    placeholder="Relationship" name="rel_relationship"
                                    value="{{ old('rel_relationship') }}">
                            </div>
                            <div>
                                @error('rel_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                @error('rel_phone')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                @error('rel_relationship')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="voting_form__btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('frontend/login/login')
    @include('frontend/profile/popup_profile')
@endsection
