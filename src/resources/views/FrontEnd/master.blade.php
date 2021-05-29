<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('/Front') }}/assets/fabicon.png" type="image/png">
    <!-- STYLESHEETS IMPORT START -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    

    <!-- SLIDER IMPORTS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/Front') }}/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/Front') }}/css/slicebox.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/Front') }}/css/custom.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/Front') }}/css/lightbox.min.css" />

    <!-- SLIDER IMPORTS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/Front') }}/css/navbar.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/Front') }}/css/homepage.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/Front') }}/css/Footer.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/Front') }}/css/styles.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/Front') }}/css/allProducts.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/Front') }}/css/responsive.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
    <!-- STYLESHEETS IMPORT END -->
</head>

<body>
<div class="preloader"></div>
    @php
    $siteAds = \App\Models\TopAds::first();
    @endphp
    @if (!empty($siteAds))
    <div class="siteads__div">
        <img class="siteadsclass animate__animated animate__fadeInDown" src="{{ asset("Back/images/banner/".$siteAds->image) }}" height="10%" width="100%">
        <i class="siteaddclose__btn far fa-times-circle"></i>
    </div>
    @endif

    <nav class="nav animate__animated animate__fadeInDown lol">
        <div class="nav__container">
            <div class="logo__header">
                @php
                $siteInfo = \App\Models\SiteInfo::first();
                @endphp

                <div class="logo">
                    <a href="{{ url('/') }}">
                        @isset($siteInfo->logo)
                        <img title="elfclick.com" src="{{ asset("Back/images/logo/".$siteInfo->logo) }}" alt="Logo">
                        @endisset
                    </a>
                </div>
                <div class="store__locator">
                    <p>Help <i class="fas fa-chevron-down"></i></p>
                    <div class="help__menu"></div>
                </div>
                <div class="search__bar">
                    <form method="GET" action="{{ route('search_item') }}" class="search__bar">
                        <input type="search" name="query" placeholder="Search products by title or name" />
                        <button title="Search Product" type="submit" style="border: none">
                            <i class="fas fa-search search__icon" style="font-size: 10px;"></i>
                        </button>
                    </form>
                </div>
                <div class="login__cart__div">
                    <ul>
                        <li><a class="login__btn" href="{{ route('about_us') }}">About elfclick</a></li>
                        <li><a class="login__btn" href="{{ route('contact_us') }}">Contact us</a></li>
                        <li>
                          @if (!empty(Auth::user()))
                            <a title="Logout" class="myCart__btn" href="{!! route('logout') !!}">Logout</a>
                          @else
                            <a class="myCart__btn" href="{!! url('/login') !!}">
                              Signup / Login
                            </a>
                          @endif
                        </li>
                        <li class="myprofile_btn_li">
                          @if (!empty(Auth::user()))
                            <a title="My Profile" class="myprofile_btn" href="{{ route('profile') }}"><i class="fas fa-user"></i></a>
                          @else
                            <a style="display: none;" class="myprofile_btn" href="{{ route('about_us') }}"><i class="fas fa-user"></i></a>
                          @endif
                        </li>
                        <li class="mobileMenu"><i class="fas fa-bars"></i><i style="display: none;" class="fas fa-times"></i></li>
                    </ul>
                </div>
            </div>
        </div>
                <div style="display: none;" class="mobileSearch_bar">
                    <form method="GET" action="{{ route('search_item') }}" class="mobileSearch__bar">
                        <input type="search" name="query" placeholder="Search products by title or name" />
                        <button type="submit" class="mobile__search__icon">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>

        <!-- Mega Menu Started -->
        <div class="nav__category">
            <div class="nav__container nav__category__main__container">
                <div class="menu__items__section">

                      <!-- Nav Computer and Accessories List end -->
                      <ul class="menu">

                      @php
                        $sections = \App\Models\Section::sections();
                      @endphp

                        <li class="computer__nav__list"><a href="#">All Categories</a>
                          <div class="allsubMenu__wrapper">
                            <div class="computer__subCat__nav__list__div subCat__list__div__design computerAbsolutePosition">
                                <div class="row">
                                    @foreach ($sections as $section)
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="{{ route('cate_product',$section['id']) }}">{{ $section['name'] }}</a></li>
                                                @foreach ($section['categories'] as $category)
                                            <li><a href="{{ route('cate_product',$category['id']) }}">{{ $category['name'] }}</a></li>
                                            @endforeach

                                        </ul>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                          </div>
                      </li>
                        @foreach ($sections as $section)
                        <!-- Nav Computer and Accessories List Start -->
                        <li class="computer__nav__list"><a href="#">{{ $section['name'] }}</a>
                            <div class="computer__subCat__nav__list__div subCat__list__div__design computerAbsolutePosition">
                                <div class="row">
                                    @foreach ($section['categories'] as $category)

                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="{{ route('cate_product',$category['id']) }}">{{ $category['name'] }}</a></li>
                                              @foreach ($category['sub_categories'] as $sub)
                                            <li><a href="{{ route('cate_product',$sub['id']) }}">{{ $sub['name'] }} </a></li>
                                            @endforeach

                                        </ul>
                                    </div>
                                  @endforeach
                                </div>

                            </div>
                        </li>
                      {{-- @endif --}}
                        <!-- Nav Computer and Accessories List end -->
                      @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!-- Mega Menu End -->
    </nav>
    <!-- Mobile Menu Start -->
    <div class="nav__container mobilemenuNavContainerVisible">
        <div class="mobileMenu__Container">
            <div class="mobilemenu__wrapper">
            <div class="logprofiledivmobile">
            @if (!empty(Auth::user()))
                <a title="Logout" class="myCart__btn" href="{!! route('logout') !!}">Logout</a>
            @else
                <a class="myCart__btn" href="{!! url('/login') !!}">
                    Signup / Login
                </a>
            @endif
            @if (!empty(Auth::user()))
                <a title="My Profile" class="myprofile_btn" href="{{ route('profile') }}"><i class="fas fa-user"></i></a>
            @else
                <a style="display: none;" class="myprofile_btn" href="{{ route('about_us') }}"><i class="fas fa-user"></i></a>
            @endif
            </div>
                <div class="mobileMenu">
                    @php
                        $sections = \App\Models\Section::sections();                       
                    @endphp
                    @foreach ($sections as $section)
                        <ul class="mobilemenu_cate_ul">
                            <li class="mobileMenu_cate__name"><span>{{ $section['name'] }}</span>
                                <ul class="mobilemenu_sub_cate_ul">
                                    @foreach ($section['categories'] as $category)
                                    <li><a href="{{ route('cate_product',$category['id']) }}">{{ $category['name'] }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
        <!-- Mobile Menu End -->
    

    @yield('content')
    

    <footer class="Footer">
        <div class="container">
            <div class="socialIcons">
                @isset($siteInfo->facebook_link)
                <a href="{{ $siteInfo->facebook_link }}">
                    <i class="fab fa-facebook-f"></i>
                </a>
                @endisset
                @isset($siteInfo->twitter_link)
                <a href="{{ $siteInfo->twitter_link }}">
                    <i class="fab fa-twitter"></i>
                </a>
                @endisset
                @isset($siteInfo->instagram_link)
                <a href="{{ $siteInfo->instagram_link }}">
                    <i class="fab fa-instagram"></i>
                </a>
                @endisset
                @isset($siteInfo->youtube_link)
                <a href="{{ $siteInfo->youtube_link }}">
                    <i class="fab fa-youtube"></i>
                </a>
                @endisset
            </div>
            <div class="footerLicksDiv">
                <a href="{{ route('about_us') }}">About us</a>
                <a href="{{ route('contact_us') }}">Contact us</a>
                <a href="{{ route('terms') }}">Terms & Conditions</a>
                <a href="{{ route('privacy-and-policy') }}">Privacy and Policy</a>
                <a href="{{ route('faqs') }}">FAQs</a>
            </div>
            <div class="app__play__Store__div">
                @isset($siteInfo->app_store_link)
                    <a href="{{ $siteInfo->app_store_link }}">
                        <img src="{{ asset('Front/assets/images/playstore.png') }}" alt="">
                    </a>
                @endisset

                @isset($siteInfo->play_store_link)
                    <a href="{{ $siteInfo->play_store_link }}">
                        <img src="{{ asset('Front/assets/images/appstore.png') }}" alt="">
                    </a>
                @endisset
            </div>
        </div>
    </footer>

    <div class="copyrightSection">
        <div class="container">
            <div class="copyrightDiv">
                <p>Copyright &copy; {{ now()->year }} elfclick.com. All Rights Reserved</p>
            </div>
        </div>
    </div>

    <a href="#" class="toptop">
        <i class="fas fa-chevron-up"></i>                            
    </a>


    <script type="text/javascript" src="{{ asset('/Front') }}/js/modernizr.custom.46884.js"></script>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-app.js"></script>

    <script>
        // Your web app's Firebase configuration
        var firebaseConfig = {
            apiKey: "AIzaSyD8_4pjocuE4Ty8RC4lZCPKhMks4cpz2Vc",
            authDomain: "elfclicks-6f3b2.firebaseapp.com",
            projectId: "elfclicks-6f3b2",
            storageBucket: "elfclicks-6f3b2.appspot.com",
            messagingSenderId: "500940738969",
            appId: "1:500940738969:web:30f948a606572015c30308"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
    </script>
    <script type="text/javascript" src="{{ asset('/Front') }}/js/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.search-icon').click(function() {
                $('.search-icon').toggleClass('active')
                $('.search-boxLol').toggleClass('active')
            })
        });
        /*sub-menu*/

        $(document).ready(function() {
            $('ul li').click(function() {
                $(this).siblings().removeClass('active')
                $(this).toggleClass('active')
            })
        });
        /*menu bar*/
        $(document).ready(function() {
            $('.toggle').click(function() {
                $('.toggle').toggleClass('active')
                $('header').toggleClass('active-menu')
            })
        });
        $('.siteaddclose__btn').click(function(){
            $('.siteadsclass').addClass("siteadshide");
        });
    </script>

    <script type="text/javascript" src="{{ asset('/Front') }}/js/lightbox.min.js"></script>
    <script type="text/javascript" src="{{ asset('/Front') }}/js/jquery.slicebox.js"></script>

    <script type="text/javascript">
        $(function() {

            var Page = (function() {

                var $navArrows = $('#nav-arrows').hide(),
                    $navOptions = $('#nav-options').hide(),
                    $shadow = $('#shadow').hide(),
                    slicebox = $('#sb-slider').slicebox({
                        onReady: function() {

                            $navArrows.show();
                            $navOptions.show();
                            $shadow.show();

                        },
                        orientation: 'h',
                        cuboidsCount: 3
                    }),

                    init = function() {

                        initEvents();

                    },
                    initEvents = function() {

                        // add navigation events
                        $navArrows.children(':first').on('click', function() {

                            slicebox.next();
                            return false;

                        });

                        $navArrows.children(':last').on('click', function() {

                            slicebox.previous();
                            return false;

                        });

                        $('#navPlay').on('click', function() {

                            slicebox.play();
                            return false;

                        });

                        $(window).on('load', function(){
                            function startmySlider(){
                                slicebox.play();
                                return false;
                            }
                            window.setTimeout( startmySlider, 2000 );
                        });

                        $('#navPause').on('click', function() {

                            slicebox.pause();
                            return false;

                        });

                    };

                return {
                    init: init
                };

            })();

            Page.init();

        });
    </script>
    <script>
        $(window).on('load', function(){
            $('.preloader').fadeOut(1000);
        });
        $('#zoom_01').elevateZoom();
    </script>
    <script>
        $(".fas.fa-bars").on('click', function(){
            $('.mobileMenu__Container').addClass("show__mobileMenu__Container");
            $(".fas.fa-times").css("display", "block");
            $(this).css("display","none");
        });
        $(".fas.fa-times").on('click', function(){
            $('.mobileMenu__Container').removeClass("show__mobileMenu__Container");
            $(".fas.fa-bars").css("display","block");
            $(this).css("display", "none");
        });
    </script>
    <script type="text/javascript">
        const totop = document.querySelector(".toptop");
        window.addEventListener("scroll", ()=>{
            if(window.pageYOffset>100){
                totop.classList.add("active");
            }else{
                totop.classList.remove("active");
            }
        })
    </script>
</body>

</html>
