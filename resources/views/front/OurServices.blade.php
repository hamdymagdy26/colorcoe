<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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

      <!-- Start header -->
      <header class="our_servicesHeader ourProjects_header flex-column d-flex justify-content-center align-items-center text-center">
        <h3>{{ __('translate.our_services') }}</h3>
        @if (isset($services->content))
        <p>{!! \Illuminate\Support\Str::limit($services->content, 200) !!}.</p>
        @else
        <p>{{__('translate.lorem')}}</p>
        @endif
      </header>
      <!-- end of header -->

      <!-- Start our services -->
      <div class="ourServices">
        <div class="container">
            <h2 class="text-center">{{ __('translate.our_services') }}</h2>
            <div class="ourServices_container d-flex justify-content-between flex-wrap">

              @if (count($service_information) > 0)
              @foreach($service_information as $service)
                <div class="service">
                  <div class="img_container">
                    <img src="{{asset($service->image)}}" alt="">
                  </div>
                  <div class="serviceContent">
                    <h3 class="text-center">{{$service->title}}</h3>
                    <p>{!! \Illuminate\Support\Str::limit($service->content, 200) !!}.</p>
                  </div>
                </div>
              @endforeach

              @else
              <div class="service">
                <div class="img_container">
                  <img src="{{asset('front/assets/images/InteriorDesign.png')}}" alt="">
                </div>
                <div class="serviceContent">
                  <h3 class="text-center">{{ __('translate.Interior_Design') }}</h3>
                  <p>{{__('translate.lorem')}}</p>
                </div>
              </div>

              <div class="service">
                <div class="img_container">
                  <img src="{{asset('front/assets/images/LandscapeDesign.png')}}" alt="">
                </div>
                <div class="serviceContent">
                  <h3 class="text-center">{{ __('translate.Landscape_Design') }}</h3>
                  <p>{{__('translate.lorem')}}</p>
                </div>
              </div>

              <div class="service">
                <div class="img_container">
                  <img src="{{asset('front/assets/images/Furnishing.png')}}" alt="">
                </div>
                <div class="serviceContent">
                  <h3 class="text-center">{{ __('translate.Furnishing') }}</h3>
                  <p>{{__('translate.lorem')}}</p>
                </div>
              </div>

              <div class="service">
                <div class="img_container">
                  <img src="{{asset('front/assets/images/editMArk.png')}}" alt="">
                </div>
                <div class="serviceContent">
                  <h3 class="text-center">{{ __('translate.Execution') }}</h3>
                  <p>{{__('translate.lorem')}}</p>
                </div>
              </div>

              <div class="service">
                <div class="img_container">
                  <img src="{{asset('front/assets/images/Supervision.png')}}" alt="">
                </div>
                <div class="serviceContent">
                  <h3 class="text-center">{{ __('translate.Supervision') }}</h3>
                  <p>{{__('translate.lorem')}}</p>
                </div>
              </div>

              <div class="service">
                <div class="img_container">
                  <img src="{{asset('front/assets/images/VisualIdentityDesign.png')}}" alt="">
                </div>
                <div class="serviceContent">
                  <h3 class="text-center">{{ __('translate.Visual_Identity_Design') }}</h3>
                  <p>{{__('translate.lorem')}}</p>
                </div>
              </div>
              @endif

            </div>
          </div>
      </div>
      <!-- end of our services -->



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

    <!-- on scroll animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{asset('front/assets/js/main.js')}}"></script>
</body>
</html>
