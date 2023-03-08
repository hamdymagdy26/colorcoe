<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
                  @if (\App::getLocale() == 'en')
                  <a style="margin-right: 50px" href="{{ route('locale.setting', 'ar') }}" class="lang"> {{ __('translate.Ar') }} </a>
                  @endif
                  @if (\App::getLocale() == 'ar')
                  <a style="margin-right: 50px" href="{{ route('locale.setting', 'en') }}" class="lang"> {{ __('translate.En') }} </a>
                  @endif
                </li>
            </ul>
          </div>
        </div>
    </nav>
      <!-- End of NavBar -->

      <!-- Start header -->
    <header class="aboutUs_header d-flex flex-column justify-content-center align-items-center text-center">
        <h2>{{ __('translate.about_us') }}</h2>
        @if (isset($setting->about_us))
        <p>{!! $setting->about_us !!}.</p>
        @else
        <p>{{__('translate.lorem')}}</p>
        @endif
    </header>
      <!-- end of header -->
      <section class="aboutUs_info d-flex flex-wrap">
            <div class="img_container whoWeAreImg">
                <img src="{{asset('front/assets/images/desk.jpg')}}" alt="">
            </div>
            <div class="info_container whoWeAreContent text-center d-flex justify-content-center align-items-center flex-column">
                <h3>{{ __('translate.Who_are_We?') }}</h3>
                @if (isset($setting->who_are_we))
                <p>{{ strip_tags(\Illuminate\Support\Str::limit($setting->who_are_we, 200))}}</p>
                @else
                <p>{{__('translate.lorem')}}</p>
                @endif
                <button><i class="fa-solid fa-download"></i>{{ __('translate.Download') }}</button>
            </div>
            <div class="info_container vision text-center d-flex justify-content-center align-items-center flex-column">
                <h3>{{ __('translate.Vision') }}</h3>
                @if (isset($setting->vision))
                <p>{{ strip_tags(\Illuminate\Support\Str::limit($setting->vision, 200))}}</p>
                @else
                <p>{{__('translate.lorem')}}</p>
                @endif
            </div>
            <div class="img_container visionImg">
                <img src="{{asset('front/assets/images/vision.png')}}" alt="">
            </div>
            <div class="img_container missionImg">
                <img src="{{asset('front/assets/images/mission.png')}}" alt="">
            </div>
            <div class="info_container mission text-center d-flex justify-content-center align-items-center flex-column">
                <h3>{{ __('translate.Mission') }}</h3>
                @if (isset($setting->mission))
                <p>{{ strip_tags(\Illuminate\Support\Str::limit($setting->mission, 200))}}</p>
                @else
                <p>{{__('translate.lorem')}}</p>
                @endif
            </div>
      </section>

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
                    <p>{{ $footer_info ?? __('translate.footer_content')}}</p>                </div>
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
    <script src="{{asset('front/assets/js/main.js"></script>
</body>
</html>
