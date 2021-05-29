@extends('BackEnd.master')

@section('title')
   Product | Edit
@endsection

@section('content')

   <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
       <div class="statbox widget box box-shadow">
           <div class="widget-header">
               {{-- display success message--}}
               @if(Session::has('sms'))
                   <div class="alert alert-success alert-dismissible fade show" role="alert">
                       <strong>{{ Session::get('sms') }}</strong>.
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
               @endif
               {{-- display success message--}}
               <div class="row">
                   <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                       <h5>Edit Product</h5>
                       <a class="float-right mb-3" href="{{ route('TodaysdealList') }}">
                           <i class="fas fa-list"></i> Product List
                       </a>
                   </div>
               </div>
           </div>

           {{--<div class="widget-content widget-content-area">--}}
           <div class="offset-1 col-xl-10 col-md-10 col-sm-10 col-10">

               <form action="{!! route('todaysdealsUpdate') !!}" method="post" enctype="multipart/form-data">
                 <input type="hidden" class="form-control" value="{{ $product->id }}" id="product_id" name="product_id">
                   @csrf
                   <div class="form-group">
                       <label for="name">Product Title</label>
                       <input type="text" class="form-control" value="{{ $product->product_name }}" id="name" name="product_name">
                   </div>
                   <div class="form-group">
                       <label for="name">Product Price</label>
                       <input type="text" class="form-control" value="{{ $product->product_price }}" id="name" name="product_price">
                   </div>
                   <div class="form-group">
                       <label for="name">Product Old Price</label>
                       <input type="text" class="form-control" id="name" name="product_price_old" value="{{ $product->product_price_old }}">
                   </div>
                   <div class="form-group">
                       <label for="name">Slug</label>
                       <input type="text" class="form-control" value="{{ $product->product_link }}" id="name" name="product_link">
                   </div>
                   <div class="form-group">
                       <label for="name">Previous Image</label>
                       <img src="{{ asset("Back/images/Product/". $product->product_img ) }}" height="60" width="60" alt="pro-img"><br/>
                       <label for="name">Product Image</label>
                       <input type="file" accept="image/*" value="" class="form-control-file" id="name" name="product_img">
                   </div>
                   {{--<div class="form-group">
                       <label for="name">Product Multiple Image</label>
                       <input type="file" accept="image/*" class="form-control" id="name" name="product_multiple_img[]"
                             value="" multiple>
                   </div>--}}

                   {{--<div class="form-group">
                       <label for="name">Product Size</label>
                       <input type="file" accept="image/*" class="form-control" id="name" name="product_size">
                   </div>

                   <div class="form-group">
                       <label for="name">Product Color</label>
                       <input type="file" accept="image/*" class="form-control" id="name" name="product_color">
                   </div>--}}

                   @php
                     $content = DB::table('contents')->get();
                   @endphp
                   <div class="form-group">
                       <label for="section_id">Content<sup style="color:red;" title="You can skip this">optional</sup></label>
                       <select class="form-control select2" name="content_id" >
                           @foreach($content as $con)
                               <option value="{{ $con->id }}" @if($con->id == $product->content_id) selected @endif>
                                   {{ $con->title }}
                               </option>
                           @endforeach
                       </select>
                   </div>


                  {{-- <div class="form-group">
                       <label class="form-control-plaintext">Product Keyword</label>
                       <input type="text" name="keyword[]" data-role="tagsinput" value="--}}{{--{{ $product->keyword }}--}}{{--"
                              class="form-control" placeholder="type keyword | separated by comma">
                   </div>--}}

                   <div class="form-group">
                       <label  class="form-control-plaintext">Product Meta Description</label>
                       <input type="text" name="product_meta_description" value="{{ $product->product_meta_description }}"
                              class="form-control" id="product_meta_description">
                   </div>

                   <div class="form-group">
                       <label  class="form-control-plaintext">Product Description</label>
                       <textarea rows="5" id="div_editor1" name="product_description">{{ $product->product_description }}</textarea>
                   </div>

                   <button type="submit" class="btn btn-primary ">Update</button>
               </form>
           </div>
       </div>
   </div>
@endsection

@section('style')
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" />
   <!--Rich text editor-->
   <link rel="stylesheet" href="{{ asset('/Back') }}/richtexteditor/rte_theme_default.css" />
   <style>
       .bootstrap-tagsinput{
           margin: 0;
           width: 100%;
           padding: 0.5rem 0.75rem 0;
           font-size: 1rem;
           line-height: 1.25;
           transition: border-color 0.15s ease-in-out;
       }
       .bootstrap-tagsinput .label-info{
           display: inline-block;
           background-color: #375091;
           padding: 0 0.4em 0.15em;
           border-radius: 0.25rem;
           margin-bottom: 0.4em;
           color: #fff;
       }

       .bootstrap-tagsinput input{
           margin-bottom: 0.5em;
           background: no-repeat bottom, 50% calc(100% - 1px);
           background-image: none,none;
           background-size: auto auto;
           width: 70%;
           border: 0;
           height: 36px;
           transition: background 0s ease-out;
           padding-left: 0;
           padding-right: 0;
           border-radius: 0;
           font-size: 14px;

       }
   </style>
@endsection

@section('script')

   {{--========= bootstrap tagsignput script--}}

   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
   <script>
       $(document).ready(function () {
           $('input[name="keyword"]').tagsinput({
               trimValue: true,
               confirmKeys: [44],
               focusClass: ""
           });
       });
   </script>

   {{--========= rich text editor script--}}
   <script type="text/javascript" src="{{ asset('/Back') }}/richtexteditor/rte.js"></script>
   <script type="text/javascript" src='{{ asset('/Back') }}/richtexteditor/plugins/all_plugins.js'></script>
   <script>
       var editor1 = new RichTextEditor("#div_editor1");
       //editor1.setHTMLCode("Use inline HTML or setHTMLCode to init the default content.");
   </script>
@endsection
