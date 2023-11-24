@extends('frontend.site')
@section('title', 'aboutus')
@section('main')



{{-- Mission sector --}}
<div class="container mt-3 about-main" data-aos="zoom-in-down">
    <br>
    <br>
    <br>
    <h1>What is our mission</h1>
    <span>
        At StayHopeful, we are dedicated to creating positive and lasting change in the world.
        Our mission is to extend a helping hand to those facing the challenges of disease, combat animal cruelty, and provide relief in the aftermath of natural disasters.
        We believe in the power of collective compassion to heal, protect, and rebuild lives.
        Through strategic initiatives and community-driven support, we strive to make a meaningful impact, fostering a world where every individual, animal, and community can thrive despite adversity.
        Join us in our mission to bring hope, healing, and resilience to those in need.
    </span>
    <img src="{{ asset('img/aboutus_main.jpg') }}" alt="aboutus_main" class="aboutus-image-main">
</div>

<br>
<br>

{{-- About us sector --}}
<h2>About Us</h2>
<div class="container about-story1" data-aos="zoom-in-left">
    <div class="row row-cols-1 row-cols-md-2 g-10">
        <div class="col story1">
            
            <div>
                <span> As a small group of passionate individuals, we founded <strong>Stay Hope Full</strong> with a shared commitment to making a difference. Inspired by the stories of resilience in the face of adversity, we set out on a mission to combat diseases, end animal cruelty, and respond to natural disasters. Over the years, we've faced challenges head-on, but the stories of transformation keep us driven.</span>
            </div>
            
        </div>

        <div class="col">
            <div><!-- aboutus's Picture 1-->
                <img src="{{ asset('img/aboutus1.jpg') }}" alt="aboutus1" class="aboutus-image1">
            </div>
        </div>
    </div>
</div>

<div class="container about-story2" data-aos="zoom-in-right">
    <div class="row row-cols-1 row-cols-md-2 g-10">
        <div class="col aboutus2">
            <div><!-- aboutus's Picture 2-->
                <img src="{{ asset('img/aboutus2.jpg') }}" alt="aboutus2" class="aboutus-image2">
            </div>
            
        </div>

        <div class="col story2">
            <div>
                <div>
                  <span>Meet <strong>Sarah, a survivor of heart disease</strong>. Through the generosity of donors like you, we were able to provide life-saving treatment and support her on the journey to recovery. Sarah's story is just one example of the impact we can make together.</span>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container about-story3" data-aos="zoom-in-left">
    <div class="row row-cols-1 row-cols-md-2 g-10">
        <div class="col story3">
            <div>
                
                <div>
                    <span>From humble beginnings, our organization has grown, forming partnerships with local communities and international organizations. Together, we've responded to natural disasters, rescued animals from abusive situations, and brought hope to countless lives.</span>
                </div>
            </div>
        </div>

        <div class="col aboutus1">
            <div><!-- aboutus's Picture 3-->
                <img src="{{ asset('img/aboutus3.jpg') }}" alt="aboutus3" class="aboutus-image3">
            </div>
        </div>
    </div>
</div>

<div class="container about-story4" data-aos="zoom-in-right">
    <div class="row row-cols-1 row-cols-md-2 g-10">
        <div class="col aboutus2">
            <div><!-- aboutus's Picture 4-->
                <img src="{{ asset('img/aboutus4.jpg') }}" alt="aboutus4" class="aboutus-image4">
            </div>
            
        </div>

        <div class="col story4">
            <div>
                <div>
                  <span>Our commitment to transparency means that every donation you make goes directly to where it's needed most. We envision a future where diseases are eradicated, animals are treated with compassion, and communities stand resilient in the face of disasters.</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container about-story5" data-aos="fade-up">
    <div class="row row-cols-1 row-cols-md-2 g-10">
        <div class="col story5">
            <div>
                <div>
                    <span>Join us on this incredible journey. Your support can be the turning point in someone's life, and together, we can create a world where every individual, human or animal, has the opportunity to thrive</span>
                </div>
            </div>
        </div>

        <div class="col aboutus1">
            <div><!-- aboutus's Picture 5-->
                <img src="{{ asset('img/aboutus5.jpg') }}" alt="aboutus5" class="aboutus-image5">
            </div>
        </div>
    </div>
</div>

{{-- call to action sector --}}
<div class="container mt-3 call_to_action">
    <h3>Join Us in Making a Difference!</h3>
    <p>Together, we can create positive change and make a lasting impact. Your support matters.</p>
    <br>

    <div class="row row-cols-1 row-cols-md-3 g-4">

        <div class="col" data-aos="fade-left" data-aos-duration="1000">
            <div class="card">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg"  width="100" height="100" viewBox="0 0 512 512">
                        <style>svg{fill:#15b5f9}</style><path d="M256 48a160 160 0 1 1 0 320 160 160 0 1 1 0-320zm0 368A208 208 0 1 0 256 0a208 208 0 1 0 0 416zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.6-64-64-64c-13.6 18.2-29.8 34.3-48 48h48c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V416c0-8.8 7.2-16 16-16h48c-18.2-13.7-34.3-29.8-48-48zM276 104c0-11-9-20-20-20s-20 9-20 20v14c-7.6 1.7-15.2 4.4-22.2 8.5c-13.9 8.3-25.9 22.8-25.8 43.9c.1 20.3 12 33.1 24.7 40.7c11 6.6 24.7 10.8 35.6 14l1.7 .5c12.6 3.8 21.8 6.8 28 10.7c5.1 3.2 5.8 5.4 5.9 8.2c.1 5-1.8 8-5.9 10.5c-5 3.1-12.9 5-21.4 4.7c-11.1-.4-21.5-3.9-35.1-8.5c-2.3-.8-4.7-1.6-7.2-2.4c-10.5-3.5-21.8 2.2-25.3 12.6s2.2 21.8 12.6 25.3c1.9 .6 4 1.3 6.1 2.1l0 0 0 0c8.3 2.9 17.9 6.2 28.2 8.4V312c0 11 9 20 20 20s20-9 20-20V298.2c8-1.7 16-4.5 23.2-9c14.3-8.9 25.1-24.1 24.8-45c-.3-20.3-11.7-33.4-24.6-41.6c-11.5-7.2-25.9-11.6-37.1-15l-.7-.2c-12.8-3.9-21.9-6.7-28.3-10.5c-5.2-3.1-5.3-4.9-5.3-6.7c0-3.7 1.4-6.5 6.2-9.3c5.4-3.2 13.6-5.1 21.5-5c9.6 .1 20.2 2.2 31.2 5.2c10.7 2.8 21.6-3.5 24.5-14.2s-3.5-21.6-14.2-24.5c-6.5-1.7-13.7-3.4-21.1-4.7V104z"/>
                    </svg>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Donate Now to Save Lives</h5>
                    <p class="card-text">Your contribution can make a life-saving impact. By donating now, you help us provide crucial support and resources to those in need. Join us in the fight against diseases, and let's make a difference together.</p>
                    <br>
                    <a href="#">Sign In</a></p>
                </div>
            </div>
        </div>

        <div class="col" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">

            <div class="card" ata-aos="fade-up" data-aos-duration="3000">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 640 512">
                        <style>svg{fill:#15b5f9}</style><path d="M396.6 6.5L235.8 129.1c9.6 1.8 18.9 5.8 27 12l168 128c13.2 10.1 22 24.9 24.5 41.4l6.2 41.5H608c9.3 0 18.2-4.1 24.2-11.1s8.8-16.4 7.4-25.6l-24-160c-1.2-8.2-5.6-15.7-12.3-20.7l-168-128c-11.5-8.7-27.3-8.7-38.8 0zm-153.2 160c-11.5-8.7-27.3-8.7-38.8 0l-168 128c-6.6 5-11 12.5-12.3 20.7l-24 160c-1.4 9.2 1.3 18.6 7.4 25.6S22.7 512 32 512H224V352l96 160h96c9.3 0 18.2-4.1 24.2-11.1s8.8-16.4 7.4-25.6l-24-160c-1.2-8.2-5.6-15.7-12.3-20.7l-168-128z"/>
                    </svg>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Join Our Community for Exclusive Updates.</h5>
                    <p class="card-text">Become a part of our community to receive exclusive updates and be the first to know about our impactful initiatives.</p>
                    <br>
                    <a href="#">Sign In</a></p>
                </div>
            </div>
        </div>

        <div class="col" class="col" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="400">
            
            <div class="card">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 640 512">
                        <style>svg{fill:#15b5f9}</style><path d="M544 248v3.3l69.7-69.7c21.9-21.9 21.9-57.3 0-79.2L535.6 24.4c-21.9-21.9-57.3-21.9-79.2 0L416.3 64.5c-2.7-.3-5.5-.5-8.3-.5H296c-37.1 0-67.6 28-71.6 64H224V248c0 22.1 17.9 40 40 40s40-17.9 40-40V176c0 0 0-.1 0-.1V160l16 0 136 0c0 0 0 0 .1 0H464c44.2 0 80 35.8 80 80v8zM336 192v56c0 39.8-32.2 72-72 72s-72-32.2-72-72V129.4c-35.9 6.2-65.8 32.3-76 68.2L99.5 255.2 26.3 328.4c-21.9 21.9-21.9 57.3 0 79.2l78.1 78.1c21.9 21.9 57.3 21.9 79.2 0l37.7-37.7c.9 0 1.8 .1 2.7 .1H384c26.5 0 48-21.5 48-48c0-5.6-1-11-2.7-16H432c26.5 0 48-21.5 48-48c0-12.8-5-24.4-13.2-33c25.7-5 45.1-27.6 45.2-54.8v-.4c-.1-30.8-25.1-55.8-56-55.8c0 0 0 0 0 0l-120 0z"/>
                    </svg>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Support Our Cause Volunteer Today</h5>
                    <p class="card-text">Join us in supporting our cause and contribute to positive change. Your dedication can help us bring hope, healing, and resilience to those who need it most.</p>
                    <a href="#">Sign In</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Our Founder sector --}}
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
                <a href="{{route("aboutus.johndoe")}}" class="btn btn-primary">HEAR JOHN DOE's STORY</a>
            </div>
        </div>
    </div>
</div>
<hr>
<!-- Team Members sector -->
<div class="container mt-3">

    <div data-aos="zoom-out-up">
        <h2 class="text-center">Our Team</h2>
        <span>
            Welcome to the heart of <strong>Stay Hopeful</strong>. Our dedicated team shares a common vision, diverse skills, and an unwavering commitment to creating a world where hope, compassion, and resilience thrive.
        </span>
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
<hr>
{{-- volunteer sector --}}
<div class="container volunteer" >
    <div class="row row-cols-1 row-cols-md-2 g-10 volunteer" data-aos="zoom-in-right">
        <div class="col left-volunteer">
            <div>
                <img src="{{ asset('img/aboutus6.jpg') }}" alt="aboutus4" class="aboutus-image6">
            </div>
            
        </div>

        <div class="col right-volunteer" data-aos="zoom-in-left">
            <div>
                <div>
                    <h3>Change the world with us</h3>
                    <span>We are hiring! Explore our openings and join the team</span>
                    <a href="#">Careers</a>
                </div>
            </div>
        </div>
    </div>
</div>

@include("frontend/login/login");
@endsection