@extends('frontend.site')
@section('title', 'Volunteer Enrollment Poll')
@section('main')
    <link rel="stylesheet" href="{{ asset('volunteercss/volunteer.css') }}">

    <div class="container__voting">
        <div class="row__voting">
            <div class="col-lg-12 d-flex justify-content-center">
                <div class="voting__form">
                    <h1 class="title__voting">Volunteer Form</h1>
                    <form action="#" method="post">
                        @csrf
                        <div class="mb-3 mt-3">
                            <label for="finding_source">Where did you find us?</label>
                            <div class="grid_container_social__network">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="check1" name="option1"
                                        value="something" checked>
                                    <label class="form-check-label" for="check1">Newspaper</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="check2" name="option2"
                                        value="something">
                                    <label class="form-check-label" for="check2">Email</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="check3" name="option3"
                                        value="something">
                                    <label class="form-check-label">Advertisement</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="check4" name="option4"
                                        value="something">
                                    <label class="form-check-label">Online Search</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="check5" name="option5"
                                        value="something">
                                    <label class="form-check-label">Referred by Friend</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="check6" name="option6"
                                        value="something">
                                    <label class="form-check-label">Other</label>
                                </div>
                            </div>

                            <div class="input-group mb-3 container__personalinfo">
                                <span class="input-group-text">Personal</span>
                                <input type="text" class="form-control voting__label" id="name" placeholder="Name" name="name">
                                <input type="text" class="form-control voting__label" id="phone" placeholder="Phone"
                                    name="phone">
                                <input type="text" class="form-control voting__label" id="email" placeholder="Email"
                                    name="email">
                            </div>


                            <label for="volunteer_before">Have you ever been a part of us before?</label>
                            <div class="container__checkbox">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="volunteer" name="volunteer_radio"
                                        value="volunteer" checked>
                                    <label class="form-check-label" for="volunteer">Already</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="nonvolunteer" name="volunteer_radio"
                                        value="nonvolunteer">Not Yet
                                    <label class="form-check-label" for="nonvolunteer"></label>
                                </div>
                            </div>

                            <div class="form-floating container__availdays">
                                <select class="form-select" id="sel1" name="sellist">
                                    <option><a href="#">Monday</a></option>
                                    <option><a href="#">Tuesday</a></option>
                                    <option><a href="#">Wednesday</a></option>
                                    <option><a href="#">Thursday</a></option>
                                    <option><a href="#">Friday</a></option>
                                    <option><a href="#">Saturday</a></option>
                                    <option><a href="#">Sunday</a></option>
                                </select>
                                <label for="sel1" class="form-label voting__label">Which days are you available?</label>
                            </div>

                            <div class="form-donate-info">
                                <div class="form-info-detail">
                                    <div class="form-floating">
                                        <select class="form-select" id="votingSelect"
                                            aria-label="Floating label select example" name="project">
                                            <option selected>Select Project</option>
                                            {{-- @foreach ($projects as $item)
                                                <option value="{{$item->id}}">{{$item->title}}</option>
                                            @endforeach --}}
                                        </select>
                                        <label for="votingSelect" class="voting__label">Which projects are you interested in
                                            volunteering?</label>
                                    </div>
                                </div>
                            </div>
                            <div class="description__voting">
                                <div class="description__voting_detail">
                                    <span class="description__voting_title">Tell us why you want to be a volunteer:</span>
                                    <div class="description__voting_content">
                                        <textarea class="form-control voting__label" placeholder="Write your thoughts here" id="voting_description"
                                            name="voting_description" style="height: 80px"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="relationship_form">
                                <label for="relationship_form">If you are involved with us as a Volunteer and an emgergency
                                    arises, whom should we
                                    contact?</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Relatives</span>
                                    <input type="text" class="form-control voting__label" id="name1" placeholder="Name"
                                        name="name">
                                    <input type="text" class="form-control voting__label" id="phone1" placeholder="Phone"
                                        name="phone">
                                    <input type="text" class="form-control voting__label" id="relationship"
                                        placeholder="Relationship" name="relationship">
                                </div>
                            </div>
                            <button type="submit" class="voting_form__btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('frontend/login/login');
@endsection
