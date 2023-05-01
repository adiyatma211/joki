@extends('layout.main')
@section('konten')
<!-- shop section -->
<section class="banner_part">
  <div class="container">
      <div class="row align-items-center">
          <div class="col-lg-12">
              <div class="banner_slider owl-carousel">
                  <div class="single_banner_slider">
                      <div class="row">
                          <div class="col-lg-5 col-md-8">
                              <div class="banner_text">
                                  <div class="banner_text_iner">
                                      <h1>Studio & Fotografer Bundling</h1>
                                      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima iure repellat velit, quaerat aliquid pariatur veritatis harum, ea unde eum perspiciatis. Quae atque doloremque nobis doloribus dicta labore eligendi eveniet?</p>
                                      <a href="#" class="btn_2">buy now</a>
                                  </div>
                              </div>
                          </div>
                          <div class="banner_img d-none d-lg-block">
                              <img src="{{asset('shop/img/banner_img.png')}}" alt="">
                          </div>
                      </div>
                  </div><div class="single_banner_slider">
                      <div class="row">
                          <div class="col-lg-5 col-md-8">
                              <div class="banner_text">
                                  <div class="banner_text_iner">
                                      <h1>Studio & Fotografer Bundling</h1>
                                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat iste consequatur obcaecati. Ipsa nam similique esse nostrum amet eius, hic, a aut nobis cum delectus vero harum eveniet. In, aperiam?</p>
                                      <a href="#" class="btn_2">buy now</a>
                                  </div>
                              </div>
                          </div>
                          <div class="banner_img d-none d-lg-block">
                              <img src="{{asset('shop/img/banner_img.png')}}" alt="">
                          </div>
                      </div>
                  </div><div class="single_banner_slider">
                      <div class="row">
                          <div class="col-lg-5 col-md-8">
                              <div class="banner_text">
                                  <div class="banner_text_iner">
                                      <h1>Studio & Fotografer Bundling</h1>
                                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero ipsum mollitia sint laborum minus, inventore doloribus, provident repellat sapiente autem, facilis ut nobis iure iusto deleniti ipsa aperiam similique dolorum.</p>
                                      <a href="#" class="btn_2">buy now</a>
                                  </div>
                              </div>
                          </div>
                          <div class="banner_img d-none d-lg-block">
                              <img src="{{asset('shop/img/banner_img.png')}}" alt="">
                          </div>
                      </div>
                  </div>
                  <!-- <div class="single_banner_slider">
                      <div class="row">
                          <div class="col-lg-5 col-md-8">
                              <div class="banner_text">
                                  <div class="banner_text_iner">
                                      <h1>Cloth $ Wood Sofa</h1>
                                      <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                          suspendisse ultrices gravida. Risus commodo viverra</p>
                                      <a href="#" class="btn_2">buy now</a>
                                  </div>
                              </div>
                          </div>
                          <div class="banner_img d-none d-lg-block">
                              <img src="img/banner_img.png" alt="">
                          </div>
                      </div>
                  </div> -->
              </div>
              <div class="slider-counter"></div>
          </div>
      </div>
  </div>
</section>
<!-- banner part start-->

<!-- feature_part start-->
<section class="feature_part padding_top">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-lg-8">
              <div class="section_tittle text-center">
                  <h2>OurServices</h2>
              </div>
          </div>
      </div>
      <div class="row align-items-center justify-content-between">
          <div class="col-lg-7 col-sm-6">
              <div class="single_feature_post_text">
                  <p>Bundling 1</p>
                  <h3>blablalba</h3>
                  <a href="#" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                  <img src="{{asset('shop/img/feature/feature_1.png')}}" alt="">
              </div>
          </div>
          <div class="col-lg-5 col-sm-6">
              <div class="single_feature_post_text">
                  <p>Premium Quality</p>
                  <h3>Latest foam Sofa</h3>
                  <a href="#" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                  <img src="{{asset('shop/img/feature/feature_2.png')}}" alt="">
              </div>
          </div>
          <div class="col-lg-5 col-sm-6">
              <div class="single_feature_post_text">
                  <p>Premium Quality</p>
                  <h3>Latest foam Sofa</h3>
                  <a href="#" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                  <img src="{{asset('shop/img/feature/feature_3.png')}}" alt="">
              </div>
          </div>
          <div class="col-lg-7 col-sm-6">
              <div class="single_feature_post_text">
                  <p>Premium Quality</p>
                  <h3>Latest foam Sofa</h3>
                  <a href="#" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                  <img src="{{asset('shop/img/feature/feature_4.png')}}" alt="">
              </div>
          </div>
      </div>
  </div>
</section>
<!-- upcoming_event part start-->

<!-- product_list start-->
<section class="product_list section_padding">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-lg-12">
              <div class="section_tittle text-center">
                  <h2>awesome <span>shop</span></h2>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-lg-12">
              <div class="product_list_slider owl-carousel">
                  <div class="single_product_list_slider">
                      <div class="row align-items-center justify-content-between">
                          <div class="col-lg-3 col-sm-6">
                              <div class="single_product_item">
                                  <img src="{{asset('shop/img/product/product_1.png')}}" alt="">
                                  <div class="single_product_text">
                                      <h4>Quartz Belt Watch</h4>
                                      <h3>$150.00</h3>
                                      <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-3 col-sm-6">
                              <div class="single_product_item">
                                  <img src="{{asset('shop/img/product/product_1.png')}}" alt="">
                                  <div class="single_product_text">
                                      <h4>Quartz Belt Watch</h4>
                                      <h3>$150.00</h3>
                                      <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-3 col-sm-6">
                              <div class="single_product_item">
                                  <img src="{{asset('shop/img/product/product_1.png')}}" alt="">
                                  <div class="single_product_text">
                                      <h4>Quartz Belt Watch</h4>
                                      <h3>$150.00</h3>
                                      <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-3 col-sm-6">
                              <div class="single_product_item">
                                  <img src="{{asset('shop/img/product/product_1.png')}}" alt="">
                                  <div class="single_product_text">
                                      <h4>Quartz Belt Watch</h4>
                                      <h3>$150.00</h3>
                                      <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-3 col-sm-6">
                              <div class="single_product_item">
                                  <img src="{{asset('shop/img/product/product_1.png')}}" alt="">
                                  <div class="single_product_text">
                                      <h4>Quartz Belt Watch</h4>
                                      <h3>$150.00</h3>
                                      <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-3 col-sm-6">
                              <div class="single_product_item">
                                  <img src="{{asset('shop/img/product/product_1.png')}}" alt="">
                                  <div class="single_product_text">
                                      <h4>Quartz Belt Watch</h4>
                                      <h3>$150.00</h3>
                                      <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-3 col-sm-6">
                              <div class="single_product_item">
                                  <img src="{{asset('shop/img/product/product_1.png')}}" alt="">
                                  <div class="single_product_text">
                                      <h4>Quartz Belt Watch</h4>
                                      <h3>$150.00</h3>
                                      <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-3 col-sm-6">
                              <div class="single_product_item">
                                  <img src="{{asset('shop/img/product/product_1.png')}}" alt="">
                                  <div class="single_product_text">
                                      <h4>Quartz Belt Watch</h4>
                                      <h3>$150.00</h3>
                                      <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="single_product_list_slider">
                      <div class="row align-items-center justify-content-between">
                          <div class="col-lg-3 col-sm-6">
                              <div class="single_product_item">
                                  <img src="{{asset('shop/img/product/product_1.png')}}" alt="">
                                  <div class="single_product_text">
                                      <h4>Quartz Belt Watch</h4>
                                      <h3>$150.00</h3>
                                      <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-3 col-sm-6">
                              <div class="single_product_item">
                                  <img src="{{asset('shop/img/product/product_1.png')}}" alt="">
                                  <div class="single_product_text">
                                      <h4>Quartz Belt Watch</h4>
                                      <h3>$150.00</h3>
                                      <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-3 col-sm-6">
                              <div class="single_product_item">
                                  <img src="{{asset('shop/img/product/product_1.png')}}" alt="">
                                  <div class="single_product_text">
                                      <h4>Quartz Belt Watch</h4>
                                      <h3>$150.00</h3>
                                      <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-3 col-sm-6">
                              <div class="single_product_item">
                                  <img src="{{asset('shop/img/product/product_1.png')}}" alt="">
                                  <div class="single_product_text">
                                      <h4>Quartz Belt Watch</h4>
                                      <h3>$150.00</h3>
                                      <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-3 col-sm-6">
                              <div class="single_product_item">
                                  <img src="{{asset('shop/img/product/product_1.png')}}" alt="">
                                  <div class="single_product_text">
                                      <h4>Quartz Belt Watch</h4>
                                      <h3>$150.00</h3>
                                      <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-3 col-sm-6">
                              <div class="single_product_item">
                                  <img src="{{asset('shop/img/product/product_1.png')}}" alt="">
                                  <div class="single_product_text">
                                      <h4>Quartz Belt Watch</h4>
                                      <h3>$150.00</h3>
                                      <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-3 col-sm-6">
                              <div class="single_product_item">
                                  <img src="{{asset('shop/img/product/product_1.png')}}" alt="">
                                  <div class="single_product_text">
                                      <h4>Quartz Belt Watch</h4>
                                      <h3>$150.00</h3>
                                      <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-3 col-sm-6">
                              <div class="single_product_item">
                                  <img src="{{asset('shop/img/product/product_1.png')}}" alt="">
                                  <div class="single_product_text">
                                      <h4>Quartz Belt Watch</h4>
                                      <h3>$150.00</h3>
                                      <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- product_list part start-->

<!-- awesome_shop start-->
<section class="our_offer section_padding">
  <div class="container">
      <div class="row align-items-center justify-content-between">
          <div class="col-lg-6 col-md-6">
              <div class="offer_img">
                  <img src="img/offer_img.png" alt="">
              </div>
          </div>
          <div class="col-lg-6 col-md-6">
              <div class="offer_text">
                  <h2>Weekly Sale on
                      60% Off All Products</h2>
                  <div class="date_countdown">
                      <div id="timer">
                          <div id="days" class="date"></div>
                          <div id="hours" class="date"></div>
                          <div id="minutes" class="date"></div>
                          <div id="seconds" class="date"></div>
                      </div>
                  </div>
                  <div class="input-group">
                      <input type="text" class="form-control" placeholder="enter email address"
                          aria-label="Recipient's username" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                          <a href="#" class="input-group-text btn_2" id="basic-addon2">book now</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- awesome_shop part start-->

<!-- product_list part start-->
<section class="product_list best_seller section_padding">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-lg-12">
              <div class="section_tittle text-center">
                  <h2>Best Sellers <span>shop</span></h2>
              </div>
          </div>
      </div>
      <div class="row align-items-center justify-content-between">
          <div class="col-lg-12">
              <div class="best_product_slider owl-carousel">
                  <div class="single_product_item">
                      <img src="{{asset('shop/img/product/product_1.png')}}" alt="">
                      <div class="single_product_text">
                          <h4>Quartz Belt Watch</h4>
                          <h3>$150.00</h3>
                      </div>
                  </div>
                  <div class="single_product_item">
                      <img src="{{asset('shop/img/product/product_1.png')}}" alt="">
                      <div class="single_product_text">
                          <h4>Quartz Belt Watch</h4>
                          <h3>$150.00</h3>
                      </div>
                  </div>
                  <div class="single_product_item">
                      <img src="{{asset('shop/img/product/product_1.png')}}" alt="">
                      <div class="single_product_text">
                          <h4>Quartz Belt Watch</h4>
                          <h3>$150.00</h3>
                      </div>
                  </div>
                  <div class="single_product_item">
                      <img src="{{asset('shop/img/product/product_1.png')}}" alt="">
                      <div class="single_product_text">
                          <h4>Quartz Belt Watch</h4>
                          <h3>$150.00</h3>
                      </div>
                  </div>
                  <div class="single_product_item">
                      <img src="{{asset('shop/img/product/product_1.png')}}" alt="">
                      <div class="single_product_text">
                          <h4>Quartz Belt Watch</h4>
                          <h3>$150.00</h3>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- product_list part end-->

<!-- subscribe_area part start-->
<section class="subscribe_area section_padding">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-lg-7">
              <div class="subscribe_area_text text-center">
                  <h5>Join Our Newsletter</h5>
                  <h2>Subscribe to get Updated
                      with new offers</h2>
                  <div class="input-group">
                      <input type="text" class="form-control" placeholder="enter email address"
                          aria-label="Recipient's username" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                          <a href="#" class="input-group-text btn_2" id="basic-addon2">subscribe now</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!--::subscribe_area part end::-->

<!-- subscribe_area part start-->
<section class="client_logo padding_top">
  <div class="container">
      <div class="row align-items-center">
          <div class="col-lg-12">
              <div class="single_client_logo">
                  <img src="img/client_logo/client_logo_1.png" alt="">
              </div>
              <div class="single_client_logo">
                  <img src="img/client_logo/client_logo_2.png" alt="">
              </div>
              <div class="single_client_logo">
                  <img src="img/client_logo/client_logo_3.png" alt="">
              </div>
              <div class="single_client_logo">
                  <img src="img/client_logo/client_logo_4.png" alt="">
              </div>
              <div class="single_client_logo">
                  <img src="img/client_logo/client_logo_5.png" alt="">
              </div>
              <div class="single_client_logo">
                  <img src="img/client_logo/client_logo_3.png" alt="">
              </div>
              <div class="single_client_logo">
                  <img src="img/client_logo/client_logo_1.png" alt="">
              </div>
              <div class="single_client_logo">
                  <img src="img/client_logo/client_logo_2.png" alt="">
              </div>
              <div class="single_client_logo">
                  <img src="img/client_logo/client_logo_3.png" alt="">
              </div>
              <div class="single_client_logo">
                  <img src="img/client_logo/client_logo_4.png" alt="">
              </div>
          </div>
      </div>
  </div>
</section>
<!--::subscribe_area part end::-->

<!--::footer_part start::-->
<footer class="footer_part">
  <div class="container">
      <div class="row justify-content-around">
          <div class="col-sm-6 col-lg-2">
              <div class="single_footer_part">
                  <h4>Top Products</h4>
                  <ul class="list-unstyled">
                      <li><a href="">Managed Website</a></li>
                      <li><a href="">Manage Reputation</a></li>
                      <li><a href="">Power Tools</a></li>
                      <li><a href="">Marketing Service</a></li>
                  </ul>
              </div>
          </div>
          <div class="col-sm-6 col-lg-2">
              <div class="single_footer_part">
                  <h4>Quick Links</h4>
                  <ul class="list-unstyled">
                      <li><a href="">Jobs</a></li>
                      <li><a href="">Brand Assets</a></li>
                      <li><a href="">Investor Relations</a></li>
                      <li><a href="">Terms of Service</a></li>
                  </ul>
              </div>
          </div>
          <div class="col-sm-6 col-lg-2">
              <div class="single_footer_part">
                  <h4>Features</h4>
                  <ul class="list-unstyled">
                      <li><a href="">Jobs</a></li>
                      <li><a href="">Brand Assets</a></li>
                      <li><a href="">Investor Relations</a></li>
                      <li><a href="">Terms of Service</a></li>
                  </ul>
              </div>
          </div>
          <div class="col-sm-6 col-lg-2">
              <div class="single_footer_part">
                  <h4>Resources</h4>
                  <ul class="list-unstyled">
                      <li><a href="">Guides</a></li>
                      <li><a href="">Research</a></li>
                      <li><a href="">Experts</a></li>
                      <li><a href="">Agencies</a></li>
                  </ul>
              </div>
          </div>
          <div class="col-sm-6 col-lg-4">
              <div class="single_footer_part">
                  <h4>Newsletter</h4>
                  <p>Heaven fruitful doesn't over lesser in days. Appear creeping
                  </p>
                  <div id="mc_embed_signup">
                      <form target="_blank"
                          action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                          method="get" class="subscribe_form relative mail_part">
                          <input type="email" name="email" id="newsletter-form-email" placeholder="Email Address"
                              class="placeholder hide-on-focus" onfocus="this.placeholder = ''"
                              onblur="this.placeholder = ' Email Address '">
                          <button type="submit" name="submit" id="newsletter-submit"
                              class="email_icon newsletter-submit button-contactForm">subscribe</button>
                          <div class="mt-10 info"></div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
      
  </div>
@endsection