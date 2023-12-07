@extends('frontend.site')
@section('title', 'Contact')
@section('main')

<link rel="stylesheet" href="{{ asset('contactus/contact.css') }}">

<div class="container mt-6 contactus_first">
  <form method="POST">
      @csrf
      <div class="container" style="margin-top: 100px">
          <div class="row">
              <div class="col-lg-6 col-md-12 col-sm-12 left" style="margin-top: 30px">
                  <h4>Contact Us</h4>
                  <hr>

                  <div class="mb-3 mt-3 contact_input_form">
                      <label for="name" class="form-label">Name:</label>
                      <input type="text" class="form-control input-phone-number" id="name" placeholder="Name" name="name"
                          value="{{ old("name") }}" required>

                  </div>

                  <div class="mb-3 mt-3 contact_input_form">
                      <label for="phoneNumber" class="form-label">Phone Number:</label>
                      <div class="input-group">
                          <input type="hidden" name="countryCode" id="hiddenCountryCode" value="+84">
                          <input type="tel" class="form-control rounded-start input-phone-number" id="phoneNumber"
                              placeholder="Phone Number" name="phoneNumber" value="{{ old("phoneNumber") }}"
                              required>

                      </div>
                  </div>

                  <div class="mb-3 mt-3 contact_input_form">
                      <label for="email" class="form-label">Email:</label>
                      <input type="email" class="form-control input-phone-number" id="email" placeholder="Email" name="email"
                          value="{{ old("email") }}" required>

                  </div>

                  <div class="mb-3 contact_input_form">
                      <label for="message" class="form-label">Message:</label>
                      <textarea type="text" class="form-control textarea input-phone-number" id="message"
                          placeholder="Message" name="message" required>{{ old("message") }}</textarea>

                  </div>

                  <button type="submit" class="btn btn-primary pink-button" style="margin-bottom: 30px">Send</button>

              </div>

              <div class="col-lg-6 col-md-12 col-sm-12 middle contactus_ourcontact">
                  <h4>Our Contact</h4>
                  <hr>
                  <p>Stayhopeful</p>
                  <p>Hotline: <a href="tel:+0987654321" class="contactus_hotline" style="text-decoration: none; color: white;">0987654321</a></p>
                  <p>Email: <a href="mailto:stayhopeful@gmail.com" class="contactus_email" style="text-decoration: none; color: white;">stayhopeful@gmail.com</a></p>
                  <p>Head Office Address: </p>
                  <div class="map-container" style="padding-bottom: 20px">
                      <iframe
                          src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d979.8193604109812!2d106.69962077301636!3d10.79004996076054!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528b558d27b01%3A0xd645560d7278324!2zNy05IMSQLiBNYWkgVGjhu4sgTOG7sXUsIMSQYSBLYW8sIFF14bqtbiAxLCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1701847340971!5m2!1svi!2s"
                          allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </div>
              </div>
          </div>
      </div>
  </form>
</div>


@include("frontend/login/login");
@include('frontend/profile/popup_profile');
@endsection