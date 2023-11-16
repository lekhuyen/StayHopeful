@extends('frontend.site')
@section('title', 'Contact')
@section('main')


<div class="container mt-3">
    <form method="POST">
      @csrf
      <div class="container mt-5">
        <div class="row">
          <div class="col-lg-6 col-md-12 col-sm-12 left">
            <h4>Contact Us</h4>
            <hr>
            <div class="mb-3 mt-3">
              <label for="name">Name:</label>
              <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{old("name")}}">
              @error('name')
                    <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
      
            <div class="mb-3 mt-3">
              <label for="countryCode">Country Code:</label>
              <div class="input-group">
                <div class="btn-group">
                  <button type="button" class="btn btn-outline-secondary pink-button" id="selectedCountryCode">+84 (Vietnam)</button>
                  <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split pink-dropdown-item"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      <span class="visually-hidden">Toggle Dropdown</span>
                  </button>
  
                  <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#" data-code="+84">+84 (Vietnam)</a></li>
                      <li><a class="dropdown-item" href="#" data-code="+1">+1 (USA)</a></li>
                      <li><a class="dropdown-item" href="#" data-code="+44">+44 (UK)</a></li>
                      <!-- Add more country codes as needed -->
                  </ul>
  
                </div>
  
                <input type="hidden" name="countryCode" id="hiddenCountryCode" value="+84">
                <input type="text" class="form-control rounded-start" id="phoneNumber" placeholder="Phone Number" name="phoneNumber" value="{{old("phoneNumber")}}">
              </div>
              @error('phoneNumber')
                    <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
  
            <div class="mb-3 mt-3">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{old("email")}}">
              @error('email')
                    <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
      
            <div class="mb-3">
                <label for="message">Message:</label>
                <textarea type="text" class="form-control textarea"
                id="message" placeholder="Message" name="message">{{old("message")}}</textarea>
                @error('message')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
      
            <button type="submit" class="btn btn-primary pink-button">Send</button>
            
          </div>
          
          <div class="col-lg-6 col-md-12 col-sm-12 middle">
            <h4>Our Contact</h4>
            <hr>
            <p>Stayhopful</p>
            <p>Hotline: <a href="tel:+0987654321">0987654321</a></p>
            <p>Email: <a href="mailto:stayhopful@gmail.com">stayhopful@gmail.com</a></p>
            <p>Trụ sở chính: </p>
            <div class="map-container">
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d823.8609185302755!2d106.70858875101122!3d10.813985461549624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1700053839649!5m2!1sen!2s" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>
      </div>
    </form>
</div>

@endsection