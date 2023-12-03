@extends('frontend.site')
@section('title', 'About Us')
@section('main')

  <br>
  <br>
  <div class="container mt-3">
    <h2 class="mb-4">Team Member Information</h2>
    <a href="{{ route('aboutusteam.index') }}" class="about-us-link" style="display: inline-block; margin-bottom: 10px; text-decoration: none;">
      <i class="fa fa-arrow-left" style="margin-right: 5px;"></i>Go Back
    </a>
    <form method="POST" enctype="multipart/form-data" action="{{ route('aboutusteam.store') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{old("name")}}">
        </div>
        
        <div class="mb-3">
            <label for="age" class="form-label">Age:</label>
            <input type="number" class="form-control" id="age" placeholder="Enter age" name="age" value="{{old("age")}}">
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email:</label>
          <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="{{old("email")}}">
        </div>

        <div class="mb-3">
          <label for="skill" class="form-label">Skill:</label>
          <select class="form-control" id="skill" name="skill">
            <option value="Marketing Team" @selected(old("skill")== "Marketing Team")>Marketing Team</option>
            <option value="Financial Team" @selected(old("skill")== "Financial Team")>Financial Team</option>
            <option value="Lead Developer Team" @selected(old("skill")== "Lead Developer Team")>Lead Developer Team</option>
            <option value="Creative Team" @selected(old("skill")== "Creative Team")>Creative Team</option>
            <option value="Volunteer" @selected(old("skill")== "Volunteer")>Volunteer</option>
          </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea type="text" class="form-control" id="description" placeholder="Enter description" name="description">{{old("description")}}</textarea>
        </div>

        <div class="mb-3">
            <label for="images" class="form-label">Image:</label>
            <input type="file" class="form-control" id="images" multiple name="images[]"/>
        </div>

        <div class="mb-3">
            <div class="form-check">
                <input type="radio" class="form-check-input" id="radio1" name="status" value="1" checked @checked(old("status") == "1")>
                <label class="form-check-label" for="radio1">Active</label>
            </div>

            <div class="form-check">
                <input type="radio" class="form-check-input" id="radio2" name="status" value="0" @checked(old("status") == "0")>
                <label class="form-check-label" for="radio2">Inactive</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

@include('frontend/login/login');
@endsection