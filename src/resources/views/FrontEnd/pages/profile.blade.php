@extends('FrontEnd.master')

@section('title')
My Profile
@endsection

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('/Front') }}/css/contact.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/Front') }}/css/profile.css" />
</head>

<body>

    @php
    $auth = Auth::user();
    @endphp
    @if (!empty($auth))
    @php
    $user = DB::table('users')->where('id', Auth::id())->get();
    $activites = DB::table('activities')->where('user_id', Auth::id())->orderBy('id', 'desc')->get();
    $count = count($activites);
    @endphp
    @foreach($user as $user)
    <section class="container">
        <div class="contactustextwrapper">
            <div class="profilewrapper">
                <div class="profileuserpicdiv">
                    <img src="{{ asset('Back/images/userpic/user-profile-svgrepo-com.svg') }}" alt="">
                </div>
                <div class="profileuserinfodiv">
                    <span>User Name: <span>{{ $user->name }}</span></span>
                    <span>User Email: <span>{{ $user->email }}</span></span>
                    <span>Total Viewed : <span>@php echo $count @endphp Products</span></span>
                </div>
            </div>
        </div>
    </section>
    @endforeach
    @endforelse

    @php
    $auth = Auth::user();
    @endphp
    @if (!empty($auth))
    @php
    $activites = DB::table('activities')->where('user_id', Auth::id())->orderBy('id', 'desc')->get();
    $activites = DB::table('activities')->where('user_id', Auth::id())->orderBy('id', 'desc')->get();
    $count = count($activites);
    @endphp
    <section class="container animate__animated animate__fadeInUp">
        <div class="recommended__title">
            <h3>Your Browsing History (@php echo $count @endphp)</h3>
        </div>

        <div class="recommended__container">
            <div class="row">
                @forelse ($activites as $products)
                @php
                $productDetails = DB::table('products')->where('id', $products->product_id)->first();
                @endphp
                <div class="recommended__Items col-md-4 col-sm-6 col-12">
                    <a href="{{ route('view',$productDetails->slug) }}" class="recommended__content">
                        <div class="recommendedImg">
                            <img src="{{ asset("Back/images/product/".$productDetails->product_img) }}" alt="">
                            {{-- {{ asset("Back/images/product/".$pro->product_img) }} --}}
                        </div>
                        <div class="recommended__items__details">
                            <p>{{ $productDetails->product_name }}</p>
                            <span>${{ $productDetails->product_price }}</span><span class="discountPrice">${{ $productDetails->product_price_old }}</span>

                            <p class="youSaveP">You save $ {{ $productDetails->product_price_old - $productDetails->product_price }}</p>
                        </div>
                    </a>
                </div>
                @empty
                <div class="recommended__Items col-md-4 col-sm-6 col-12">
                    <div class="recommended__content">
                        <div class="recommended__items__details">
                            <p>Oops... No products in history</p>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>
    @endif
</body>

</html>

@endsection