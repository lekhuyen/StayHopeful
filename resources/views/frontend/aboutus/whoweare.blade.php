
@extends('frontend.site')
@section('title', 'whoweare')
@section('main')

<link rel="stylesheet" href="{{asset('aboutuscss/whoweare.css')}}">
{{-- Our Founder sector --}}
<br>
<br>
<div class="container mt-3 our_founder" data-aos="zoom-in">
    <h2 class="text-center">Our Founder</h2>
    <div>
        Welcome to the heart of <strong>Stay Hope full</strong>. Behind every impactful initiative and transformative project, there's a team of dedicated individuals committed to making a positive difference. Together, we share a common vision, diverse skills, and an unwavering commitment to creating a world where hope, compassion, and resilience thrive.
    </div>

    <div class="container mt-5">

        <div class="row mt-4">
            <!-- Founder's Picture -->
            <div class="col-md-4 text-center">
                <img class="img-fluid rounded-circle founder-img" src="{{ asset('img/aboutus_founder.jpg') }}" alt="founder">
            </div>

            <!-- Introduction -->
            <div class="col-md-8">
              <br>
              <br>
              <br>
              <p class="text-justify">
                Meet John Doe, the visionary behind <strong>Stay hope full</strong>. As the driving force behind the organization's mission, John's passion for making a positive impact has been evident since its inception. His leadership and commitment inspire our team to create a world where hope and compassion thrive. Learn more about John's journey and dedication in the Read More section below.
              </p>
              <a href="{{route("aboutus.johndoe")}}">HEAR JOHN DOE's STORY</a>
            </div>
        </div>
    </div>
</div>
<hr>
<!-- Team Members sector -->
<div class="container mt-3">

    <div data-aos="zoom-out-up">
        <h2>Our Team</h2>
    </div>

    <br>
    <div class="row row-cols-1 row-cols-md-2 g-4" >
      <div class="col">
        <div class="card">
          <div class="row g-0">
            <div class="col-md-4" data-aos="fade-up-right" data-aos-delay="200">
              <img src="{{ asset('img/aboutus2.jpg') }}" class="img-fluid rounded-start" alt="">
            </div>
            <div class="col-md-8">
              <div class="card-body" data-aos="fade-up-right" data-aos-delay="200">
                <h5 class="card-title">Jane Smith</h5>
                <p class="card-text">Jane Smith is our Chief Marketing Officer, bringing a creative and strategic approach to our outreach efforts. Her dedication has played a crucial role in expanding our reach and impact.</p>
                <p class="card-text"><small class="text-body-secondary">Date of Birth: March 10, 1988</small></p>
                <a href="{{route("aboutus.janesmith")}}" class="btn btn-primary">View Details</a>
              </div>
            </div>
          </div>
        </div>
    </div>
  
    <div class="col">
        <div class="card">
          <div class="row g-0">
            <div class="col-md-4" data-aos="fade-up-left" data-aos-delay="400">
              <img src="{{ asset('img/aboutus2.jpg') }}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body" data-aos="fade-up-left" data-aos-delay="400">
                <h5 class="card-title">Robert Johnson</h5>
                <p class="card-text">Robert Johnson, our Chief Financial Officer, brings extensive experience in finance and strategic planning. His innovative thinking has significantly contributed to our organization's success.</p>
                <p class="card-text"><small class="text-body-secondary">Date of Birth: August 22, 1982</small></p>
                <a href="{{route("aboutus.robertjohnson")}}" class="btn btn-primary">View Details</a>
              </div>
            </div>
          </div>
        </div>
    </div>
  
    <div class="col">
        <div class="card">
          <div class="row g-0">
            <div class="col-md-4" data-aos="fade-down-right" data-aos-delay="500">
              <img src="{{ asset('img/aboutus2.jpg') }}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body" data-aos="fade-down-right" data-aos-delay="500">
                <h5 class="card-title">Kai Greene</h5>
                <p class="card-text">Kai Greene, our Lead Developer, playing a key role in shaping our technological initiatives. Their expertise has been instrumental in driving our digital transformation.</p>
                <p class="card-text"><small class="text-body-secondary">Date of Birth: May 18, 1989</small></p>
                <a href="{{route("aboutus.kaigreene")}}" class="btn btn-primary">View Details</a>
              </div>
            </div>
          </div>
        </div>
    </div>

    <div class="col">
        <div class="card">
            <div class="row g-0">
                <div class="col-md-4" data-aos="fade-down-left" data-aos-delay="700">
                    <img src="{{ asset('img/aboutus2.jpg') }}" class="img-fluid rounded-start" alt="Person's Image">
                </div>
                <div class="col-md-8">
                    <div class="card-body" data-aos="fade-down-left" data-aos-delay="700">
                        <h5 class="card-title">Oliver Hudson</h5>
                        <p class="card-text">liver Hudson serves as our Creative Director, bringing a unique blend of artistic vision and strategic thinking to our projects. Their creativity adds a distinctive touch to our initiatives.</p>
                        <p class="card-text"><small class="text-body-secondary">Date of Birth: January 15, 1985</small></p>
                        <a href="{{route("aboutus.oliverhudson")}}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    
@include("frontend/login/login");
@endsection





