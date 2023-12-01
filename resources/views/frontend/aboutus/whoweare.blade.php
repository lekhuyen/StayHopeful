
@extends('frontend.site')
@section('title', 'whoweare')
@section('main')

<link rel="stylesheet" href="{{asset('aboutuscss/whoweare.css')}}">
{{-- Our Founder sector --}}
<br>
<br>
<div class="container mt-3 our_founder" data-aos="zoom-in">
    <h2 class="text-center">Our Founder</h2>
    <a href="{{ route('aboutus.index') }}" class="about-us-link" style="display: inline-block; margin-bottom: 10px;">
      <i class="fa fa-arrow-left" style="margin-right: 5px;" ></i> Go Back
    </a>
    <div>
        Welcome to the heart of <strong>StayHopeful</strong>. Behind every impactful initiative and transformative project, there's a team of dedicated individuals committed to making a positive difference. Together, we share a common vision, diverse skills, and an unwavering commitment to creating a world where hope, compassion, and resilience thrive.
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
                Meet John Doe, the visionary behind <strong>StayHopeful</strong>. As the driving force behind the organization's mission, John's passion for making a positive impact has been evident since its inception. His leadership and commitment inspire our team to create a world where hope and compassion thrive. Learn more about John's journey and dedication in the Read More section below.
              </p>
              <a href="{{route("aboutus.johndoe")}}" class="btn btn-info">HEAR STORY</a>
            </div>
        </div>
    </div>
</div>
<hr>
<!-- Team Members sector -->

<!-- Robert Johnson Card -->
<div class="container mt-3">
  <h2>Financial Team</h2>
  <div class="row" data-aos="fade-right">
    <div class="col-md-6">
      <div class="card">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="{{ asset('img/aboutus2.jpg') }}" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Robert Johnson</h5>
              <p class="card-text">Robert Johnson, our Chief Financial Officer, brings extensive experience in finance and strategic planning. His innovative thinking has significantly contributed to our organization's success.</p>
              <p class="card-text"><small class="text-body-secondary">Date of Birth: August 22, 1982</small></p>
              <a href="{{route("aboutus.robertjohnson")}}" class="btn btn-primary">View Details</a>
            </div>
          </div>
        </div>
      </div>
  </div>

  <br>

  <!-- Financial Team Members -->
  <div class="row row-cols-1 row-cols-md-6 g-2" data-aos="fade-right">
    @foreach($teamMembers as $member)
        @if($member->skill === 'Financial Team')
            <div class="col">
                <a href="{{ route('aboutus.whoweare.detail', $member->id) }}" class="card-link">
                    <div class="card h-100">
                        @if ($member->images->count() > 0)
                            <img src="{{ asset($member->images[0]->url_image) }}" class="card-img-top" alt="{{ $member->name }}" style="height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $member->name }}</h5>
                        </div>
                    </div>
                </a>
            </div>
        @endif
    @endforeach
  </div>
</div>

<hr>

<div class="container mt-3">
  <h2>Marketing Team</h2>

  <!-- Jane Smith Card -->
  <div class="row" data-aos="fade-right">
      <div class="col-md-6">
          <div class="card">
              <div class="row g-0">
                  <div class="col-md-4">
                      <img src="{{ asset('img/aboutus2.jpg') }}" class="img-fluid rounded-start" alt="">
                  </div>
                  <div class="col-md-8">
                      <div class="card-body" >
                          <h5 class="card-title">Jane Smith</h5>
                          <p class="card-text">Jane Smith is our Chief Marketing Officer, bringing a creative and strategic approach to our outreach efforts. Her dedication has played a crucial role in expanding our reach and impact.</p>
                          <p class="card-text"><small class="text-body-secondary">Date of Birth: March 10, 1988</small></p>
                          <a href="{{ route('aboutus.janesmith') }}" class="btn btn-primary">View Details</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <br>

  <!-- Marketing Team Members -->
  <div class="row row-cols-1 row-cols-md-6 g-2" data-aos="fade-right">
    @foreach($teamMembers as $member)
        @if($member->skill === 'Marketing Team')
            <div class="col">
                <a href="{{ route('aboutus.whoweare.detail', $member->id) }}" class="card-link">
                  <div class="card h-100">
                    @if ($member->images->count() > 0)
                        <img src="{{ asset($member->images[0]->url_image) }}" class="card-img-top" alt="{{ $member->name }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $member->name }}</h5>
                    </div>
                </div>
                </a>
            </div>
        @endif
    @endforeach
  </div>

</div>





<hr>
<!-- Kai Greene Card -->
<div class="container mt-3">
  <h2>Lead Developer Team</h2>
  <div class="row" data-aos="fade-right">
    <div class="col-md-6">
      <div class="card">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="{{ asset('img/aboutus2.jpg') }}" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Kai Greene</h5>
              <p class="card-text">Kai Greene, our Lead Developer, playing a key role in shaping our technological initiatives. Their expertise has been instrumental in driving our digital transformation.</p>
              <p class="card-text"><small class="text-body-secondary">Date of Birth: May 18, 1989</small></p>
              <a href="{{route("aboutus.kaigreene")}}" class="btn btn-primary">View Details</a>
            </div>
          </div>
        </div>
      </div>
  </div>

  <br>

  <!-- Lead Developer Team Members -->
  <div class="row row-cols-1 row-cols-md-6 g-2" data-aos="fade-right">
    @foreach($teamMembers as $member)
        @if($member->skill === 'Lead Developer Team')
            <div class="col">
                <a href="{{ route('aboutus.whoweare.detail', $member->id) }}" class="card-link">
                  <div class="card h-100">
                    @if ($member->images->count() > 0)
                        <img src="{{ asset($member->images[0]->url_image) }}" class="card-img-top" alt="{{ $member->name }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $member->name }}</h5>
                    </div>
                </div>
                </a>
            </div>
        @endif
    @endforeach
  </div>

</div>

<hr>

<div class="container mt-3">
  <h2>Creative Team</h2>
  <div class="row" data-aos="fade-right">
    <div class="col-md-6">
      <div class="card">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset('img/aboutus2.jpg') }}" class="img-fluid rounded-start" alt="Person's Image">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Oliver Hudson</h5>
                    <p class="card-text">Oliver Hudson serves as our Creative Director, bringing a unique blend of artistic vision and strategic thinking to our projects. Their creativity adds a distinctive touch to our initiatives.</p>
                    <p class="card-text"><small class="text-body-secondary">Date of Birth: January 15, 1985</small></p>
                    <a href="{{route("aboutus.oliverhudson")}}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
    </div>
  </div>

  <br>

  <!-- Creative Team Members -->
  <div class="row row-cols-1 row-cols-md-6 g-2" data-aos="fade-right">
    @foreach($teamMembers as $member)
        @if($member->skill === 'Creative Team')
            <div class="col">
                <a href="{{ route('aboutus.whoweare.detail', $member->id) }}" class="card-link">
                  <div class="card h-100">
                    @if ($member->images->count() > 0)
                        <img src="{{ asset($member->images[0]->url_image) }}" class="card-img-top" alt="{{ $member->name }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $member->name }}</h5>
                    </div>
                </div>
                </a>
            </div>
        @endif
    @endforeach
  </div>
</div>

<hr>

<div class="container mt-3" data-aos="fade-right">
  <h2>Volunteer Member</h2>

  
    <!-- Volunteer Team Members -->
    <div class="row row-cols-1 row-cols-md-6 g-2">
      @foreach($teamMembers as $member)
          @if($member->skill === 'Volunteer')
              <div class="col">
                  <a href="{{ route('aboutus.whoweare.detail', $member->id) }}" class="card-link">
                    <div class="card h-100">
                      @if ($member->images->count() > 0)
                          <img src="{{ asset($member->images[0]->url_image) }}" class="card-img-top" alt="{{ $member->name }}">
                      @endif
                      <div class="card-body">
                          <h5 class="card-title">{{ $member->name }}</h5>
                      </div>
                  </div>
                  </a>
              </div>
          @endif
      @endforeach
    </div>
  </div> 
</div>

    
@include("frontend/login/login");
@endsection





