@extends('frontend.site')
@section('title', 'Volunteer Form')
@section('main')

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('general/general.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('volunteercss/volunteer.css') }}">
    {{-- css --}}

    <div class="btn__back">
        <a href="{{ route('project.index') }}" class="btn__go_back">
            <i class="fa fa-long-arrow-left"></i>GO BACK</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            <strong>Success! {{ session('success') }}</strong>
        </div>
    @endif

    <div class="container__voting">
        <div class="row row__voting">
            <h1 class="h1_title__voting">Volunteer Form</h1>
            {{-- @dd( $infouser) --}}
            <div class="voting__form">
                <form action="{{ route('volunteer.store') }}" method="post">
                    @csrf
                    <div class="mb-1 mt-1">
                        <label for="finding_source">Where did you find us?</label>
                        <div class="grid_container_social__network volunteer__finding__source row">
                            <div class="form-check col-md-12 col-sm-12">
                                <input type="radio" class="form-check-input" id="check1" name="finding_source"
                                    value="newspaper" {{ old('finding_source') == 'newspaper' ? 'checked' : '' }} checked>
                                <label class="form-check-label" for="check1">Newspaper</label>
                            </div>
                            <div class="form-check col-md-12 col-sm-12">
                                <input type="radio" class="form-check-input" id="check2" name="finding_source"
                                    value="email" {{ old('finding_source') == 'email' ? 'checked' : '' }}>
                                <label class="form-check-label" for="check2">Email</label>
                            </div>
                            <div class="form-check col-md-12 col-sm-12">
                                <input type="radio" class="form-check-input" id="check3" name="finding_source"
                                    value="advertisement" {{ old('finding_source') == 'advertisement' ? 'checked' : '' }}>
                                <label class="form-check-label" for="check3">Advertisement</label>
                            </div>
                            <div class="form-check col-md-12 col-sm-12">
                                <input type="radio" class="form-check-input" id="check4" name="finding_source"
                                    value="online" {{ old('finding_source') == 'online' ? 'checked' : '' }}>
                                <label class="form-check-label" for="check4">Online Search</label>
                            </div>
                            <div class="form-check col-md-12 col-sm-12">
                                <input type="radio" class="form-check-input" id="check5" name="finding_source"
                                    value="Referred by Friend"
                                    {{ old('finding_source') == 'Referred by Friend' ? 'checked' : '' }}>
                                <label class="form-check-label" for="check5">Referred by Friend</label>
                            </div>
                            <div class="form-check col-md-4 col-sm-6">
                                <input type="radio" class="form-check-input" id="check6" name="finding_source"
                                    value="other" {{ old('finding_source') == 'other' ? 'checked' : '' }}>
                                <label class="form-check-label" for="check6">Other</label>
                            </div>

                        </div>

                        <div class="input-group mb-1 container__personalinfo">
                            <span class="input-group-text">Personal</span>
                            <input type="text" class="form-control voting__label"
                                value="{{ old('name', $user ? $user['name'] : '') }}" id="name" placeholder="Name"
                                {{ $user ? 'readonly' : '' }} name="name">
                            <input type="text" class="form-control voting__label" value="{{ old('phone') }}"
                                id="phone" placeholder="Phone" name="phone">
                            <input type="text" class="form-control voting__label"
                                value="{{ old('email', $user ? $user['email'] : '') }}" id="email" placeholder="Email"
                                {{ $user ? 'readonly' : '' }} name="email">
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
                        <div class="mt-2">
                            <label for="volunteer_before">Have you ever been a part of us before?</label>
                            <div class="container__checkbox">
                                <div class="form-check col-12 col-md-4 col-sm-6">
                                    <input type="radio" class="form-check-input" id="volunteer" name="enrolled"
                                        value="1" checked {{ old('enrolled') == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="volunteer">Already</label>
                                </div>
                                <div class="form-check col-md-4 col-sm-6">
                                    <input type="radio" class="form-check-input" id="nonvolunteer" name="enrolled"
                                        value="0" {{ old('enrolled') == '0' ? 'checked' : '' }}>Not Yet
                                    <label class="form-check-label" for="nonvolunteer"></label>
                                </div>
                            </div>
                        </div>
                        <div class="container" style="margin-left: -10px; width:103%">
                                {{-- <div class="form-floating"> --}}
                                    <label class="form-label" for="votingSelect" style="margin-bottom:5px">Select Project:</label>
                                    <select class="form-select" id="votingSelect" name="project_id">
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
                                    {{-- <label class="form-label" for="votingSelect">Select Project</label> --}}
                                {{-- </div> --}}
                        </div>
                        <div class="description__voting mt-2">
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
                        <div class="relationship_form mt-2">
                            <label for="relationship_form" class="rel__form">Whom should we contact if any emergency
                                arises?</label>
                            <div class="input-group mb-1">
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
                        <button type="submit" class="btn btn-primary voting_form__btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('frontend/login/login')
    @include('frontend/profile/popup_profile')

@endsection
