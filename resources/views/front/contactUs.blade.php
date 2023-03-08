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
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700&family=Nova+Flat&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet"> <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700&family=Nova+Flat&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
      <header class="contactUs_header d-flex justify-content-center align-items-center text-center">
        <p>{{ __('translate.Contact_us_to_discuss_your_project') }}</p>
      </header>
      <!-- end of header -->

      <!-- start your profile -->
      <section class="yourProfile d-flex justify-content-center align-items-center text-center">
        <h3>{{ __('translate.Download_our_profile') }}</h3>
        <button onclick="location.href='{{route('download')}}'">{{ __('translate.Download') }}</button>
        
        {{-- <a href="{{route('download')}}">{{ __('translate.Download') }}</a> --}}
      </section>
      <!-- end of your profile -->

      <!-- Start contact us -->
      <div class="contactUs">
        <div class="sendToUs_container d-flex flex-wrap">
            <div class="form">
                <div class="headline d-flex align-items-end justify-content-between">
                    <h3 class="fw-bold">{{ __('translate.contact_us') }}</h3>
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
                <div class="contact_info text-center">
                    <h3>{{ __('translate.Get_Your_Price_Quotation_Now!') }}</h3>
                    @if (\App::getLocale() == 'ar')
                    <p> @if (isset($settings->address_ar)) {{$settings->address_ar}} @else {{ __('translate.Saudi_Arabia_Dammam_Prince_Nayef_bin_Abdulaziz_Road') }} @endif </p>
                    @else
                    <p> @if (isset($settings->address_en)) {{$settings->address_en}} @else {{ __('translate.Saudi_Arabia_Dammam_Prince_Nayef_bin_Abdulaziz_Road') }} @endif </p>
                    @endif
                    <p><span>{{ __('translate.Phone') }} : </span> @if (isset($settings->mobile)) {{$settings->mobile}} @else +966500000000 @endif</p>
                    <p><span>{{ __('translate.e-mail') }} : </span> @if (isset($settings->email)) {{$settings->email}} @else info@colorcode.sa @endif </p>
                </div>
                <div class="mapContainer">
                    <img src="{{asset('front/assets/images/map.png')}}" alt="">
                </div>
            </div>
        </div>
      </div>
      <!-- end of contact us -->

    <!-- Start Footer -->
    <footer class="footer">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="logoContainer">
                <div class="d-flex footerLogo">
                    <div>
                        <img src="{{asset('front/assets/images/footerLogo.png')}}" alt="">
                    </div>
                    <p>{{__('translate.footer_content')}}</p>
                </div>
                <div class="social mt-2 d-flex">
                  @if (count($social_media) > 0)
                  @foreach($social_media as $social)
                  <a href="{{$social->link}}"><img src="{{asset($social->image)}}" alt=""></a>
                  @endforeach
                    <a href=""> <img src="{{asset('front/assets/images/Facebook.png')}}" alt=""> </a>
                    <a href=""> <img src="{{asset('front/assets/images/insta.png')}}" alt=""> </a>
                    <a href=""> <img src="{{asset('front/assets/images/Twitter.png')}}" alt=""> </a>
                    <a href=""> <img src="{{asset('front/assets/images/youTube.png')}}" alt=""> </a>
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

      <!-- Start contact us message succes -->
      <!-- <div class="SuccesContact d-flex justify-content-center align-items-center">
            <div class="message text-center">
                <h3>Thank you for countact us</h3>
                <p>Your Masseges Done</p>
            </div>
      </div> -->
      <!-- end of contact us message succes -->


    <!-- font awosom -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

    <!-- on scroll animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{asset('front/assets/js/main.js')}}"></script>
</body>
</html>
