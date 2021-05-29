@extends('FrontEnd.master')

@section('title')
FAQs
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
            <h1>FAQs</h1>
            <span>Check out the most frequent questions we get below, to get answers to any of your enquiries:</span>
            <ul>
                <li class="termsTitle privacytitle">1. Do you upload and update content often?</li>
                <li>Answer: We research, get facts, upload and update content every day. Users will detect the arrival of new contents or deals upon visit to the site.  </li>
                
                <li class="termsTitle privacytitle">2. Are the products on your website sold by you?</li>
                <li>Answer: We actually don’t sell the products on our site. Our platform basically provides information about the current deals in the market place, and feature products from different online stores/sellers.</li>
                
                <li class="termsTitle privacytitle">3. What payment methods are accepted?</li>
                <li>Answer: Only the store/seller can properly inform you about their supported payment methods. Kindy contact them</li>
                
                <li class="termsTitle privacytitle">4. What can I do if the product I bought via the deal on your site is faulty?</li>
                <li>Answer: You can contact the store to determine what their return/refund policy is. </li>
                
                <li class="termsTitle privacytitle">5. Can I cancel an order?</li>
                <li>Answer: Kindly contact the store you purchased the product from to process your order cancellation.</li>
                
                <li class="termsTitle privacytitle">6. How do I purchase a product here?</li>
                <li>Answer: All deals listed here comes with the store/seller’s name and a link to the deal on the store's website. To purchase, click on the link and follow the instructions highlighted by the store. You can also contact the store for any enquiries as regards the purchase.</li>
                
                <li class="termsTitle privacytitle">7. Can a certain deal be missing or not featured on your site?</li>
                <li>Answer: All deals are featured here if they are not yet expired. The deals are taken away once they expire. Kindly notify us in case we missed any deal.</li>
                
                <li class="termsTitle privacytitle">8.How are international shipping carried out?</li>
                <li>Answer: You may need to contact the store selling the product to get details about their international shipping procedure.</li>
                
                <li class="termsTitle privacytitle">9. How much is the shipping cost?</li>
                <li>Answer: Kindly contact the store selling the product for this information.</li>
                
                <li class="termsTitle privacytitle">10. Why is the price for a product listed on your site different from that on the seller's website?</li>
                <li>Answer: Deals listed here expire after placement, sometimes within hours. Thus, when this happens, it will cause a difference in the price listed here and that on the store’s website.</li>
                
                <li class="termsTitle privacytitle">11. Why is the coupon you listed here not working?</li>
                <li>Answer: Deals listed here expire after placement, sometimes within hours. Thus, when this happens, it will cause a difference in the price listed here and that on the store’s website.</li>
                
                <li class="termsTitle privacytitle">12. How can I locate a missed deal on your website?</li>
                <li>Answer: You may not be able to locate a deal here after it has expired.</li>
                
                <li class="termsTitle privacytitle">Why do some deals expire before the indicated expiration date?</li>
                <li>Answer: All deals listed come with expiration date. But also, the store may sometimes place a limit to the number of people that can use it. Once the limit has been reached, the deal automatically expires even before the stated expiration date. </li>
                
                <li class="termsTitle privacytitle">Do you offer refund?</li>
                <li>Answer: Kinly contact the store/seller for their refund policy. </li>
                
                <li class="termsTitle privacytitle">What are your Terms and Conditions?</li>
                <li>Answer: Kindly check our Terms and Conditions page</li>
                
                <li class="termsTitle privacytitle">What is your Privacy Policy?</li>
                <li>Answer: Kindly check our Privacy Policy page</li>
                
                <li class="termsTitle privacytitle">How can I contact the company?</li>
                <li>Answer: Kindly check our Contact us page to get our contact information. We would like to hear from you.</li>                   
            </ul>
        </div>
    </section>
</body>

</html>

@endsection