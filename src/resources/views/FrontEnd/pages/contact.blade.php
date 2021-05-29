@extends('FrontEnd.master')

@section('title')
Contact us
@endsection

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('/Front') }}/css/contact.css" />
</head>

<body>

    <section class="container">
        <div class="contactustextwrapper">
            <h1>Contact us</h1>
            <p>You can check our FAQs page for answers to our most frequent questions.</p>
            <p>But in case you have more enquiries about any of our services, terms and conditions or policies, kindly reach out to us via:</p>
            <p>Email: support@elfclick.com</p>
            <p>We are very much eager to get in touch with you</p>
        </div>
    </section>


    <!-- testing content -->
    <section class="container">
        <form class="my-form" action="{{ route('customer_message') }}" method="post">
            @csrf
            <div class="my-form-wrapper">
                <h1>Get in touch!</h1>
                <hr />
                <ul>
                    <li>
                        <div class="grid grid-2">
                            <div>
                                <span class="requiredspan">*</span>
                                <input class="inputboxStyle" type="text" name="name" placeholder="First Name" required>
                            </div>
                            <div>
                                <span class="requiredspan">*</span>
                                <input class="inputboxStyle" type="text" placeholder="Last Name" required>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="grid grid-2">
                            <div>
                                <span class="requiredspan">*</span>
                                <input class="inputboxStyle" type="email" name="email" placeholder="Email" required>
                            </div>
                            <div>
                                <span class="requiredspan requiredspan2">.</span>
                                <input class="inputboxStyle" type="text" name="number" placeholder="Phone Number">
                            </div>
                        </div>
                    </li>
                    <li>
                        <div><span class="requiredspan">*</span>
                            <textarea class="inputboxStyle" name="message" placeholder="Message..." required=""></textarea>
                        </div>
                    </li>
                    <li>
                        <input type="checkbox" id="terms">
                        <label for="terms">I have read and agreed with <a href="{{ route('terms') }}">the terms and conditions.</a></label>
                    </li>
                    <li>
                        <div class="grid grid-3">
                            <div class="required-msg">REQUIRED FIELDS</div>
                            <button class="btn-grid contactinfosendbtn" type="submit" value="Submit" disabled>
                                <span class="back">
                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/email-icon.svg" alt="">
                                </span>
                                <span class="front">SUBMIT</span>
                            </button>
                            <button class="btn-grid contactinfosendbtn" type="reset" disabled>
                                <span class="back">
                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/eraser-icon.svg" alt="">
                                </span>
                                <span class="front">RESET</span>
                            </button>
                        </div>
                    </li>
                </ul>
            </div>
        </form>
    </section>
    <!-- testing content -->

    <script>
        const checkbox = document.querySelector('.my-form input[type="checkbox"]');
        const btns = document.querySelectorAll(".my-form button");

        checkbox.addEventListener("change", function() {
            const checked = this.checked;
            for (const btn of btns) {
                checked ? (btn.disabled = false) : (btn.disabled = true);
            }
        });
    </script>
</body>

</html>

@endsection