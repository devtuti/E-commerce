@extends('front.layout')
@section('title') 
Products
 @endsection
@section('content')

<div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
            @foreach($products as $product)
               <div class="carousel-item active">
                  <div class="container">
                     <h1 class="fashion_taital">Parfume Fashion</h1>
                     <div class="fashion_section_2">
                        <div class="row">
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">{{$product->product_name}}</h4>
                                 <p class="price_text">Price  <span style="color: #262626;">{{$product->p_price}} руб</span></p>
                                 <div class="tshirt_img"><img src="{{asset('product/'.$product->p_photo)}}"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="{{route('add.cart', $product->id)}}">Add to cart</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                 </div>
                              </div>
                           </div>
                           
                           
                        </div>
                     </div>
                  </div>
               </div>
             @endforeach
              
            </div>
            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
            </a>
         </div>


@endsection