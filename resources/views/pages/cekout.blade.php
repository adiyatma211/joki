@extends('layout.main')
@section('konten')
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>Producta Checkout</h2>
              <p>Home <span>-</span> Shop Single</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!--================Checkout Area =================-->
  <section class="checkout_area padding_top">
    <div class="container">
      <div class="returning_customer">
        <div class="check_title">
          <h2>
            Returning Customer?
            <a href="#">Click here to login</a>
          </h2>
        </div>
        <p>
          If you have shopped with us before, please enter your details in the
          boxes below. If you are a new customer, please proceed to the
          Billing & Shipping section.
        </p>
        <form class="row contact_form" action="#" method="post" novalidate="novalidate">
          <div class="col-md-6 form-group p_star">
            <input type="text" class="form-control" id="name" name="name" value=" " />
            <span class="placeholder" data-placeholder="Username or Email"></span>
          </div>
          <div class="col-md-6 form-group p_star">
            <input type="password" class="form-control" id="password" name="password" value="" />
            <span class="placeholder" data-placeholder="Password"></span>
          </div>
          <div class="col-md-12 form-group">
            <button type="submit" value="submit" class="btn_3">
              log in
            </button>
            <div class="creat_account">
              <input type="checkbox" id="f-option" name="selector" />
              <label for="f-option">Remember me</label>
            </div>
            <a class="lost_pass" href="#">Lost your password?</a>
          </div>
        </form>
      </div>
      {{-- <div class="cupon_area">
        <div class="check_title">
          <h2>
            Have a coupon?
            <a href="#">Click here to enter your code</a>
          </h2>
        </div>
        <input type="text" placeholder="Enter coupon code" />
        <a class="tp_btn" href="#">Apply Coupon</a>
      </div> --}}
      <div class="billing_details">
        <div class="row">
          <div class="col-lg-8">
            <h3>Billing Details</h3>
            <form class="row contact_form" action="#" method="post" novalidate="novalidate">
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="first" name="name" />
                <span class="placeholder" data-placeholder="First name"></span>
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="last" name="name" />
                <span class="placeholder" data-placeholder="Last name"></span>
              </div>
              {{-- <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="company" name="company" placeholder="Company name" />
              </div> --}}
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="number" name="number" />
                <span class="placeholder" data-placeholder="Phone number"></span>
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="email" name="compemailany" />
                <span class="placeholder" data-placeholder="Email Address"></span>
              </div>
              {{-- <div class="col-md-12 form-group p_star">
                <select class="country_select">
                  <option value="1">Country</option>
                  <option value="2">Country</option>
                  <option value="4">Country</option>
                </select>
              </div> --}}
              <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" id="add1" name="add1" />
                <span class="placeholder" data-placeholder="Address line 01"></span>
              </div>
              {{-- <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" id="add2" name="add2" />
                <span class="placeholder" data-placeholder="Address line 02"></span>
              </div> --}}
              {{-- <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" id="city" name="city" />
                <span class="placeholder" data-placeholder="Town/City"></span>
              </div> --}}
              {{-- <div class="col-md-12 form-group p_star">
                <select class="country_select">
                  <option value="1">District</option>
                  <option value="2">District</option>
                  <option value="4">District</option>
                </select>
              </div> --}}
              {{-- <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode/ZIP" />
              </div> --}}
              <div class="col-md-12 form-group">
                <div class="creat_account">
                  {{-- <input type="checkbox" id="f-option2" name="selector" />
                  <label for="f-option2">Create an account?</label> --}}
                </div>
              </div>
              <div class="col-md-12 form-group">
                <div class="creat_account">
                  <h3>Detail Costumer</h3>
                  {{-- <input type="checkbox" id="f-option3" name="selector" />
                  <label for="f-option3">Tuliskan Detail ?</label> --}}
                </div>
                <textarea class="form-control" name="message" id="message" rows="1"
                  placeholder="Order Notes"></textarea>
              </div>
            </form>
          </div>
          <div class="col-lg-4">
            <div class="order_box">
              <h2>Your Order</h2>
              <ul class="list">
                <li>
                  <a href="#">Product
                    <span>Total</span>
                  </a>
                </li>
                <li>
                  <a href="#">Fresh Blackberry
                    <span class="middle">x 02</span>
                    <span class="last">$720.00</span>
                  </a>
                </li>
                <li>
                  <a href="#">Fresh Tomatoes
                    <span class="middle">x 02</span>
                    <span class="last">$720.00</span>
                  </a>
                </li>
                <li>
                  <a href="#">Fresh Brocoli
                    <span class="middle">x 02</span>
                    <span class="last">$720.00</span>
                  </a>
                </li>
              </ul>
              <ul class="list list_2">
                <li>
                  <a href="#">Subtotal
                    <span>$2160.00</span>
                  </a>
                </li>
                <li>
                  <a href="#">Shipping
                    <span>Flat rate: $50.00</span>
                  </a>
                </li>
                <li>
                  <a href="#">Total
                    <span>$2210.00</span>
                  </a>
                </li>
              </ul>
              <div class="payment_item">
                {{-- <div class="radion_btn">
                  <input type="radio" id="f-option5" name="selector" />
                  <label for="f-option5">Check payments</label>
                  <div class="check"></div>
                </div>
                <p>
                  Please send a check to Store Name, Store Street, Store Town,
                  Store State / County, Store Postcode.
                </p> --}}
              </div>
              <div class="payment_item active">
                {{-- <div class="radion_btn">
                  <input type="radio" id="f-option6" name="selector" />
                  <label for="f-option6">Paypal </label>
                  <img src="img/product/single-product/card.jpg" alt="" />
                  <div class="check"></div>
                </div>
                <p>
                  Please send a check to Store Name, Store Street, Store Town,
                  Store State / County, Store Postcode.
                </p> --}}
              </div>
              <div class="creat_account">
                <input type="checkbox" id="f-option4" name="selector" />
                <label for="f-option4">I’ve read and accept the </label>
                <a href="#">terms & conditions*</a>
              </div>
              <a class="btn_3" href="#">Proceed to Paypal</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection