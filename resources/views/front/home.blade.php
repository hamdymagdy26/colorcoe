<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700&family=Nova+Flat&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet"> <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700&family=Nova+Flat&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet"> <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700&family=Nova+Flat&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link href="{{asset('front/assets/libraries/fontawesome-free-6.2.0-web/css/fontawesome.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/libraries/fontawesome-free-6.2.0-web/css/brands.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/libraries/fontawesome-free-6.2.0-web/css/solid.css')}}" rel="stylesheet">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
    />
    <!-- on scroll animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('front/assets/style/style.css')}}">
    @if (\App::getLocale() == 'ar')
    <link rel="stylesheet" href="{{asset('front/assets/style/ArStyle.css')}}">
    @endif

    <title>color code</title>
</head>

<body>

    <!-- Start NavBar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="{{route('home')}}"> <img src="{{asset('front/assets/images/logo.png')}}" alt=""> </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
              <?php 
              $url = explode('/', \URL::current());
              $current = end($url);
            ?>
            @foreach($pages as $page)
            <li class="nav-item">
              <a class="nav-link @if($current == $page->slug) activeA @endif" href="{{url($page->slug)}}">{{ $page->title }}</a>
            </li>
            @endforeach
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0 lang">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fw-bold" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('translate.En') }}
                    </a>
                    <ul class="dropdown-menu">
                      <li class="dropdown-item"><a href="{{ route('locale.setting', 'en') }}">
                        {{ __('translate.En') }} </a></li>
                      <li class="dropdown-item">
                        <a href="{{ route('locale.setting', 'ar') }}">{{ __('translate.Ar') }}</a> </li>
                    </ul>
                </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End of NavBar -->

      <!-- start Carousel -->
      <div id="carouselExampleDark" class="headerCarousel carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          @if (count($sliders) > 0)
            @foreach($sliders as $slider)
              <div class="carousel-item active" data-bs-interval="10000">
                <img src="{{asset($slider->image)}}" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                  <h2>{{$slider->title}}</h2>
                  <div class="h5Line"></div>
                  <p>{{ strip_tags(\Illuminate\Support\Str::limit($slider->content, 200))}}</p>
                  <a target="_blank" href="{{$slider->link}}" class="exploreNow">{{ __('translate.explore_now') }}</a>
                </div>
              </div>
            @endforeach
          @else
          <div class="carousel-item active" data-bs-interval="10000">
            <img src="{{asset('front/assets/images/homePageBanar_whit.png')}}" class="d-block w-100" alt="...">
            <div class="carousel-caption">
              <h2>{{__('translate.slider_header')}}</h2>
              <div class="h5Line"></div>
              <p>{{ __('translate.slider_content')}}.</p>
              <a href="#" class="exploreNow">{{__('translate.slider_button')}}</a>
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="{{asset('front/assets/images/homePageBanar_whit.png')}}" class="d-block w-100" alt="...">
            <div class="carousel-caption">
                <h2>{{__('translate.slider_header')}}</h2>
                <div class="h5Line"></div>
                <p>{{ __('translate.slider_content')}}.</p>
                <a href="#" class="exploreNow">{{__('translate.slider_button')}}</a>
            </div>
          </div>
          <div class="carousel-item">
            <img src="{{asset('front/assets/images/homePageBanar_whit.png')}}" class="d-block w-100" alt="...">
            <div class="carousel-caption">
                <h2>{{__('translate.slider_header')}}</h2>
                <div class="h5Line"></div>
                <p>{{ __('translate.slider_content')}}.</p>
                <a href="#" class="exploreNow">{{__('translate.slider_button')}}</a>
              </div>
          </div>
          @endif
        </div>
        <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button> -->
        <!-- <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button> -->
      </div>
      <!-- End of Carousel -->

      <!-- Start About Us -->
      <section class="about_us">
        <div class="container">
            <div class="headLine d-flex align-items-end">
                <h2>{{ __('translate.about_us') }}</h2>
                <div class="headLine_line"></div>
            </div>
            @if (\App::getLocale() == 'ar')
              <?php $about = $settings->about_us_ar ??  trans('translate.AbriefaboutusP'); ?>
              @else
              <?php $about = $settings->about_us_en ?? trans('translate.AbriefaboutusP') ; ?>
              @endif
            <div class="content">
              <p>{{ strip_tags(\Illuminate\Support\Str::limit($about, 200)) ?? __('translate.about_us_content') }}</p>
            </div>
            <a href="{{route('about')}}" class="fw-bold">{{ __('translate.learn_more') }}</a>
        </div>
      </section>
      <!-- End of About Us -->

      <!-- Start projects Carousel -->
      <section class="projects">
        <div id="carouselExampleCaptions" class="projectsCarousel carousel slide" data-bs-ride="false">
            <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('front/assets/images/home_project_banar_black.png')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                  <h2>{{ __('translate.our_Projects') }}</h2>
                  <a href="{{route('our_projects')}}">{{ __('translate.View_all_projects') }}</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('front/assets/images/home_project_banar_black.png')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                  <h2>Our Project</h2>
                  <a href="{{route('our_projects')}}">{{ __('translate.View_all_projects') }}</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('front/assets/images/home_project_banar_black.png')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                  <h2>Our Project</h2>
                  <a href="{{route('our_projects')}}">{{ __('translate.View_all_projects') }}</a>
                </div>
            </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="counts ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 text-center mb-5">
                      <h3>+{{$settings->clients_no ?? 10}}</h3>
                        <h4 class="fw-bold">{{ __('translate.No_of_clients') }}</h4>
                    </div>
                    <div class="col-lg-4 text-center mb-5">
                      <h3>+{{$settings->projects_no ?? 10}}</h3>
                        <h4 class="fw-bold">{{ __('translate.Total_Project') }}</h4>
                    </div>
                    <div class="col-lg-4 text-center mb-5">
                        <h3>+{{$settings->testomnials_no ?? 10}}</h3>
                        <h4 class="fw-bold">{{ __('translate.experience') }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
      <!-- End of projects Carousel -->

      <!-- Start Testimonial -->
      <section class="testimonial">
        <h2 class="text-center">{{ __('translate.Testimonial') }}</h2>
        <div id="carouselExampleInterval" class="testimonialCarousel carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner h-100">
              @if (count($testimonials->get()) > 0)
              <div class="carousel-item active h-100" data-bs-interval="10000">
                  <div class="d-block w-100 h-100  d-flex justify-content-center align-items-center">
                      <div class="contentContainer text-center">
                          <h2>{{ $testimonials->first()->title }}</h2>
                          <p>{{strip_tags(\Illuminate\Support\Str::limit($testimonials->first()->content, 200))}}</p>
                          <a href="#" class="fw-bold">{{$testimonials->first()->author}}</a>
                      </div>
                  </div>
              </div>
              @foreach($testimonials->skip(1)->get() as $testimonial)
                <div class="carousel-item h-100" data-bs-interval="10000">
                    <div class="d-block w-100 h-100  d-flex justify-content-center align-items-center">
                        <div class="contentContainer text-center">
                            <h2>{{ $testimonial->title }}</h2>
                            <p>{{strip_tags(\Illuminate\Support\Str::limit($testimonial->content, 200))}}</p>
                            <a href="#" class="fw-bold">{{$testimonial->author}}</a>
                        </div>
                    </div>
                </div>
              @endforeach
              @else
                <div class="carousel-item h-100 active" data-bs-interval="2000">
                    <div class="d-block w-100 h-100  d-flex justify-content-center align-items-center">
                        <div class="contentContainer text-center">
                            <h2>{{__('translate.testomany_title')}}</h2>
                            <p>{{__('translate.testomany_content')}}</p>
                            <a href="#" class="fw-bold">{{ __('translate.Clients_from_ECD') }}</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item h-100">
                    <div class="d-block w-100 h-100 d-flex justify-content-center align-items-center">
                        <div class="contentContainer text-center">
                            <h2>{{__('translate.testomany_title')}}</h2>
                            <p>{{__('translate.testomany_content')}}</p>
                            <a href="#" class="fw-bold">{{ __('translate.Clients_from_ECD') }}</a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <i class="fa-sharp fa-solid fa-arrow-left"></i>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <i class="fa-sharp fa-solid fa-arrow-right"></i>
                <span class="visually-hidden">Next</span>
            </button>
          </div>
      </section>
      <!-- End of Testimonial -->


      <!-- Start send to us -->
      <section class="sendToUs">
        <div class="sendToUs_container d-flex flex-wrap">
            <div class="form">
                <div class="headline d-flex align-items-end justify-content-between">
                    <h3 class="fw-bold">{{ __('translate.Send_to_us') }}</h3>
                    <div class="headLine_line"></div>
                </div>
                <form action="" class="d-flex justify-content-between flex-wrap">
                    <input type="text" class="halfWidth" placeholder="{{ __('translate.Name') }}">
                    <input type="phone" class="halfWidth" placeholder="{{ __('translate.Phone_number') }}">
                    <input type="email" class="halfWidth" placeholder="{{ __('translate.Email') }}">
                    <input type="text" class="halfWidth" placeholder="{{ __('translate.Company_name') }}">
                    <input type="text" placeholder="{{ __('translate.Adress') }}" class="w-100">
                    <textarea placeholder="{{ __('translate.Description') }}" class="w-100"></textarea>
                    <div class="form_actions w-100">
                        <button class="text-center">{{ __('translate.send_message') }}</button>
                    </div>
                </form>
            </div>
            <div class="map">
                <img src="{{asset('front/assets/images/map.png')}}" alt="">
            </div>
        </div>
      </section>
      <!-- End of send to us -->

      <!-- Start our clients -->
      <section class="ourClients">
        <div class="container">
            <div class="headLine d-flex align-items-end">
                <h2>{{ __('translate.Our_Clients') }}</h2>
                <div class="headLine_line"></div>
            </div>
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                  <?php $first_clients = \App\Models\Client::all()->take(4) ?>
                    @foreach($first_clients as $client)
                      <div class="swiper-slide">
                          <div class="img_container">
                              <img src="{{asset($client->image)}}" alt="">
                          </div>
                      </div>
                    @endforeach
                    <?php $second_clients =  \App\Models\Client::all()->skip(4)->take(4); ?>
                    @if (count($second_clients) > 0)
                    @foreach($second_clients as $client)
                      <div class="swiper-slide">
                          <div class="img_container">
                              <img src="{{asset($client->image)}}" alt="">
                          </div>
                      </div>
                    @endforeach
                    @endif
                    
                    <?php $third_clients =  \App\Models\Client::all()->skip(8)->take(4); ?>
                    @if (count($third_clients) > 0)
                    @foreach($third_clients as $client)
                      <div class="swiper-slide">
                          <div class="img_container">
                              <img src="{{asset($client->image)}}" alt="">
                          </div>
                      </div>
                    @endforeach
                    @endif

                    <?php $fourth_clients =  \App\Models\Client::all()->skip(12)->take(4); ?>
                    @if (count($fourth_clients) > 0)
                    @foreach($fourth_clients as $client)
                      <div class="swiper-slide">
                          <div class="img_container">
                              <img src="{{asset($client->image)}}" alt="">
                          </div>
                      </div>
                    @endforeach
                    @endif

                    <?php $fifth_clients =  \App\Models\Client::all()->skip(16)->take(4); ?>
                    @if (count($fifth_clients) > 0)
                    @foreach($fifth_clients as $client)
                      <div class="swiper-slide">
                          <div class="img_container">
                              <img src="{{asset($client->image)}}" alt="">
                          </div>
                      </div>
                    @endforeach
                    @endif

                    <?php $sixth_clients =  \App\Models\Client::all()->skip(20)->take(4); ?>
                    @if (count($sixth_clients) > 0)
                    @foreach($sixth_clients as $client)
                      <div class="swiper-slide">
                          <div class="img_container">
                              <img src="{{asset($client->image)}}" alt="">
                          </div>
                      </div>
                    @endforeach
                    @endif
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
      </section>
      <!-- End of our clients -->

      <!-- Start Footer -->
      <footer class="footer">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="logoContainer">
                <div class="d-flex footerLogo">
                    <div>
                        <img src="{{asset('front/assets/images/footerLogo.png')}}" alt="">
                    </div>

                    @if (\App::getLocale() == 'ar')
                    <?php $footer_info = $settings->footer_info_ar ?? trans('translate.footerP') ; ?>
                    @else
                    <?php $footer_info = $settings->footer_info_en ?? trans('translate.footerP') ; ?>
                    @endif
                    <p>{{ $footer_info ?? __('translate.footer_content')}}</p>
                </div>
                <div class="social mt-2 d-flex">
                  @if (count($social_media) > 0)
                  @foreach($social_media as $social)
                  <a href="{{$social->link}}"><img src="{{asset($social->image)}}" alt=""></a>
                  @endforeach
                  @else
                  <a href=""><img src="{{asset('front/assets/images/Facebook.png')}}" alt=""></a>
                  <a href=""><img src="{{asset('front/assets/images/insta.png')}}" alt=""></a>
                  <a href=""><img src="{{asset('front/assets/images/Twitter.png')}}" alt=""></a>
                  <a href=""><img src="{{asset('front/assets/images/youTube.png')}}" alt=""></a>
                  @endif

                </div>
                <div>

                </div>
            </div>
            <div class="links">
                <ul class="d-flex flex-wrap">
                  @foreach($pages as $page)
                  <li><a href="{{url($page->slug)}}" @if($current == $page->slug) class="activeA" @endif>{{ $page->title }}</a></li>
                  @endforeach
                </ul>
            </div>
        </div>
        <div class="footerLine"></div>
        <div class="copyRights">
            <p>{{ __('translate.All_Right_Reserved') }}</p>
        </div>
      </footer>
      <!-- End of Footer -->


    <!-- font awosom -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 4,
        spaceBetween: 30,
        slidesPerGroup: 4,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    </script>
    <!-- on scroll animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{asset('front/assets/js/main.js')}}"></script>
</body>
</html>
