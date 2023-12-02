@extends('frontend.site')
@section('title', 'StayHopeful')
@section('main')
    {{-- keenslider --}}
    <link href="https://cdn.jsdelivr.net/npm/keen-slider@6.8.6/keen-slider.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('indexcss/indexdonate.css') }}">
    {{-- keenslider --}}
    <!-- carosel -->

    <div class="PostSlide">
        <div class="innerContainer active">
            <div class="slider">
                @foreach ($slider as $item)
                    <div class="slide">
                        <div style="background:url('{{ $item->url_image }}')">
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="handles">
                <span class="prev">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" style="margin-left: 30px"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.0001 19.92L8.48009 13.4C7.71009 12.63 7.71009 11.37 8.48009 10.6L15.0001 4.07999"
                            stroke="rgb(55 65 81/1)" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </svg>
                </span>
                <span class="next">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" style="margin-right: 30px"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.99991 19.92L15.5199 13.4C16.2899 12.63 16.2899 11.37 15.5199 10.6L8.99991 4.07999"
                            stroke="rgb(55 65 81/1)" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </svg>
                </span>
            </div>
            <div class="dots">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="donate-home">
                    <div class="donate-user-index">
                        <div class="keen-slider" id="my-keen-slider" data-keen-slider-v>
                            {{-- content donate user --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section>
        <div class="container section-title-1-0">
            <div class="row">
                <div class="col-lg-12 section-title-1">
                    <div class="section-title_video">
                        <h4>RECENT PROJECTS</h4>
                    </div>
                    <div>
                        <a href="{{ route('project.index', 1) }}">SEE MORE</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- card -->
    <div class="container">
        <div class="row">
            @foreach ($projects as $project)
                <div class=" col-xxl-4 col-xl-4 col-lg-6 large ">
                    <a href="{{ route('detail.post', $project->id) }}" class="a-card">
                        <div class="card card_wapper" style="width: 26rem;">
                            @if ($project->status == 0)
                                <div class="project-status">ON GOING</div>
                            @else
                                <div class="project-status-finish">FINISHED</div>
                            @endif
                            <img src="{{ asset($project->images[0]->image) }}" class="card-img-top card-img-top-1"alt="...">
                            <div class="card-body card-body-1">
                                <h5 class="card-title card-title-1" data-i18n="text1">{{ $project->title }}</h5>
                                <div class="cart-description-post">
                                    <p class="card-text card-text-1-1" data-i18n="text2">
                                        {{ strip_tags($project->description) }}</p>
                                </div>
                                <p class="card-title-child">
                                    Received:
                                    <span>
                                        {{ number_format($project->money2) }}
                                    </span>
                                </p>
                                <p class="card-title-child-1">
                                    Goals:
                                    <span>
                                        {{ number_format($project->money) }}
                                    </span>
                                </p>
                                <a href="{{ route('detail.post', $project->id) }}"
                                    class="btn btn-primary btn-primary-1">Details</a>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>


    <!-- su kien gan nhat -->

    <section>
        <div class="container section-title-1-0">
            <div class="row">
                <div class="col-lg-12 section-title-1">
                    <div class="section-title_video">
                        <h4>FINISHED PROJECTS</h4>
                    </div>
                    <div>
                        <a href="{{ route('project.index', 1) }}">SEE MORE</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- card -->
    <div class="container">
        <div class="row">
            @foreach ($project_finish as $project)
                <div class="col-xxl-3 col-xl-3">
                    <a href="{{ route('detail.post', $project->id) }}" class="a-card">
                        <div class="card card_wapper" style="width: 19.5rem;">
                            @if ($project->status == 0)
                                <div class="project-status">ON GOING</div>
                            @else
                                <div class="project-status-finish">FINISHED</div>
                            @endif
                            <img src="{{ asset($project->images[0]->image) }}"
                                class="card-img-top card-img-top-1"alt="...">
                            <div class="card-body">
                                <h5 class="card-title card-title-1" data-i18n="text1">{{ $project->title }}</h5>
                                <div class="cart-description-post">
                                    <p class="card-text card-text-1-1" data-i18n="text2">
                                        {{ strip_tags($project->description) }}
                                    </p>
                                </div>
                                <p class="card-title-child">
                                    Received:
                                    <span>
                                        {{ number_format($project->money2) }}
                                    </span>
                                </p>
                                <p class="card-title-child-1">
                                    Goals:
                                    <span>
                                        {{ number_format($project->money) }}
                                    </span>
                                </p>
                                <a href="{{ route('detail.post', $project->id) }}"
                                    class="btn btn-primary btn-primary-1">Details</a>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach




        </div>
    </div>

    <!-- video -->
    <section>
        <div class="container section-title-1-0">
            <div class="row">
                <div class="col-lg-12 section-title-1">
                    <div class="section-title_video">
                        <h4>VIDEO GALLERY</h4>
                    </div>
                    <div>
                        <a href="{{ route('video.index') }}">SEE MORE</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            @foreach ($videos as $video)
                <div class="col-lg-4 col-md-6 col-sm-4 video_status">
                    <video id="myVideo" src="{{ asset($video->video) }}" controls width="400"
                        height="200"></video>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container-fluid" style="background-color: rgb(36,90,190); margin-top: 100px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div style="color: white; padding-top: 30px; border-bottom: 1px solid #fff">
                        <h3>STAYHOPEFUL ALREADY HELPED:</h3>
                    </div>
                </div>
                <div class="col-lg-12" style="display: flex; align-content: center">
                    <div class="statistical">
                        <div class="project-count">
                            <i class="fa-solid fa-globe"></i>
                            <span>123</span>
                        </div>
                        <span style="font-size: 18px;">CASES</span>
                    </div>
                    <div class="statistical">
                        <div class="total-money">
                            <i class="fa-regular fa-face-smile"></i>
                            <span>123.456.789</span>
                        </div>
                        <span style="font-size: 18px;">USD</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session('isVerified'))
        @include('frontend/login/login', ['isVerified', true]);
    @else
        @include('frontend/login/login');
    @endif
    <script src="https://cdn.jsdelivr.net/npm/keen-slider@6.8.6/keen-slider.min.js"></script>
    <script src="{{ asset('js/getuserdonate.js') }}"></script>
    <script>
        var autoplayIntervalInSeconds = 3;


        class PostSlider {

            constructor(containerElement, autoplayIntervalInSeconds) {
                this.container = containerElement;
                if (!this.container) {
                    throw new Error(`Container not found.`);
                }

                this.slider = this.container.querySelector('.slider');
                this.prevBtn = this.container.querySelector('.handles .prev');
                this.nextBtn = this.container.querySelector('.handles .next');

                this.sLiderWidth = this.slider.clientWidth;
                this.oneSLideWidth = this.container.querySelector('.slide:nth-child(2)').clientWidth;
                this.sildesPerPage = Math.trunc(this.sLiderWidth / this.oneSLideWidth);
                this.slideMargin = ((this.sLiderWidth - (this.sildesPerPage * this.oneSLideWidth)) / (this
                    .sildesPerPage * 2)).toFixed(5);
                this.changeSlidesMargins();

                // Assign this.dots before calling bindDotClickHandlers
                this.dots = this.container.querySelectorAll('.dots span');
                this.bindDotClickHandlers();

                this.makeSliderScrollable();
                this.prevBtn.addEventListener('click', () => this.prevSlider());
                this.nextBtn.addEventListener('click', () => this.nextSlider());

                this.createDots();
                this.setActiveDotByScroll();

                this.autoplayInterval = null;
                this.autoplayDelay = autoplayIntervalInSeconds * 1000;

                this.startAutoplay()
                this.container.addEventListener('mouseenter', () => this.pauseAutoplay());
                this.container.addEventListener('mouseleave', () => this.startAutoplay());

                return this;
            }
            changeSlidesMargins() {
                const slides = this.container.querySelectorAll('.slide');
                if (this.oneSLideWidth * 2 > this.sLiderWidth) {
                    this.slideMargin = 1;
                    this.oneSLideWidth = this.oneSLideWidth + (this.sLiderWidth - this.oneSLideWidth - 2);
                    slides.forEach(slide => {
                        slide.style.margin = "0 " + this.slideMargin + "px";
                        slide.style.minWidth = this.oneSLideWidth + "px";
                    });

                } else {
                    slides.forEach(slide => {
                        slide.style.margin = "0 " + this.slideMargin + "px";
                    });
                }
            }


            scrollToPosition(position, smooth = true) {
                const currentPosition = this.slider.scrollLeft;
                const newPosition = currentPosition + position;

                this.slider.scrollTo({
                    top: 0,
                    left: newPosition,
                    behavior: smooth ? 'smooth' : 'instant'
                });


                setTimeout(() => {
                    this.snapToNearestSlide();
                }, 300);
            }
            scrollWithDots(pos) {
                this.slider.scrollTo({
                    top: 0,
                    left: pos,
                    behavior: "smooth"
                });
            }

            handleDotClick(index) {
                const position = index * (this.slider.getBoundingClientRect()['width']);
                this.scrollWithDots(position);
            }

            changeActiveDot(i) {
                for (let j = 0; j < this.dots.length; j++) {
                    this.dots[j].classList.remove('active');
                }
                this.dots[i].classList.add('active');
            }


            bindDotClickHandlers() {
                for (let i = 0; i < this.dots.length; i++) {
                    this.dots[i].addEventListener('click', () => {
                        console.log('Dot clicked:', i);
                        this.handleDotClick(i);
                    });
                }
            }
            snapToNearestSlide() {

                const currentPosition = this.slider.scrollLeft;
                const nearestLeftScroll = Math.round(currentPosition / (this.oneSLideWidth + (this.slideMargin * 2))) *
                    (this.oneSLideWidth + (this.slideMargin * 2));
                this.slider.scrollTo({
                    left: nearestLeftScroll,
                    behavior: 'smooth'
                });
            }
            makeSliderScrollable() {
                let isDragging = false;
                let startPosition;
                let startScrollPosition;

                this.slider.addEventListener('mousedown', (event) => startDrag(event));
                this.slider.addEventListener('touchstart', (event) => startDrag(event));

                const startDrag = (event) => {
                    isDragging = true;
                    startPosition = event.clientX || event.touches[0].clientX;
                    startScrollPosition = this.slider.scrollLeft;

                    document.addEventListener('mousemove', drag);
                    document.addEventListener('touchmove', drag);
                    document.addEventListener('mouseup', endDrag);
                    document.addEventListener('touchend', endDrag);
                };

                const drag = (event) => {
                    if (isDragging) {
                        const currentX = event.clientX || event.touches[0].clientX;
                        const deltaX = currentX - startPosition;
                        this.slider.scrollLeft = startScrollPosition - deltaX;
                    }
                };

                const endDrag = () => {
                    if (isDragging) {
                        isDragging = false;
                        const currentPosition = this.slider.scrollLeft;
                        const nearestLeftScroll = Math.round(currentPosition / (this.oneSLideWidth + (this
                            .slideMargin * 2))) * (this.oneSLideWidth + (this.slideMargin * 2));
                        this.slider.scrollTo({
                            left: nearestLeftScroll,
                            behavior: 'smooth'
                        });

                        document.removeEventListener('mousemove', drag);
                        document.removeEventListener('touchmove', drag);
                        document.removeEventListener('mouseup', endDrag);
                        document.removeEventListener('touchend', endDrag);
                    }
                };
            }

            setActiveDotByScroll() {
                this.dots = this.container.querySelectorAll('.dots span');
                this.slider.addEventListener('scroll', () => {
                    const scrollLeft = this.slider.scrollLeft;
                    const currentIndex = Math.trunc((Math.abs(scrollLeft) + 2) / this.slider.clientWidth);



                    for (let i = 0; i < this.dots.length; i++) {
                        this.dots[i].classList.remove('active');
                    }

                    this.dots[currentIndex].classList.add('active');

                    this.prevBtn.style.opacity = Math.abs(scrollLeft) < 1 ? '0' :
                        '1'; /*it means there is no element before so it would hide prev button*/
                    this.nextBtn.style.opacity = Math.abs(scrollLeft) + 2 >= this.slider.scrollWidth - this
                        .slider.clientWidth ? '0' :
                        '1'; /*it means there is no element after so it would hide next button*/
                });
            }


            nextSlider() {
                const totalWidth = this.slider.scrollWidth;
                const currentScroll = this.slider.scrollLeft;
                const nextScroll = currentScroll + this.oneSLideWidth + (this.slideMargin * 2);

                if (nextScroll + this.slider.clientWidth > totalWidth) {
                    // If next slide goes beyond the end, scroll to the beginning
                    this.slider.scrollTo({
                        left: 0,
                        behavior: 'smooth'
                    });
                } else {
                    this.scrollToPosition(this.oneSLideWidth + (this.slideMargin * 2));
                }
            }

            prevSlider() {
                const currentScroll = this.slider.scrollLeft;
                const prevScroll = currentScroll - (this.oneSLideWidth + (this.slideMargin * 2));

                if (prevScroll < 0) {
                    // If previous slide goes before the beginning, scroll to the end
                    this.slider.scrollTo({
                        left: this.slider.scrollWidth - this.slider.clientWidth,
                        behavior: 'smooth'
                    });
                } else {
                    this.scrollToPosition(-1 * (this.oneSLideWidth + (this.slideMargin * 2)));
                }
            }

            createDots() {
                const dotCount = Math.floor(this.slider.scrollWidth / this.slider.clientWidth);
                const dotsContainer = this.container.querySelector('.dots');
                dotsContainer.innerHTML = '';

                for (let i = 0; i < dotCount; i++) {
                    const dot = document.createElement('span');
                    dot.addEventListener('click', () => {
                        // this.changeActiveDot(i);
                        this.handleDotClick(i);
                    });

                    if (i === 0) {
                        dot.classList.add('active');
                    }

                    dotsContainer.appendChild(dot);
                }
            }

            startAutoplay() {
                this.autoplayInterval = setInterval(() => {
                    this.nextSlider();
                }, this.autoplayDelay);
            }

            pauseAutoplay() {
                clearInterval(this.autoplayInterval);
            }
        }


        window.addEventListener('load', function() {
            var container = document.querySelector('.PostSlide .innerContainer');
            new PostSlider(container, 3);
        })
    </script>
@stop()
