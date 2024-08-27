@extends('frontend.layouts.app')
@section('title', 'Contact Us')
@section('content')
<section class=" page-banner contact-banner">
   <img src="{{asset('frontend')}}/images/Contact-Banner.jpg">
</section>
<section class="sec-space sec-space-m">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner-title">
                    <h1>Contact Us</h1>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class=" col-12 col-xl-6 mx-auto mb-5">
               
                <h5 class="sub-heading mb-0">We're here for anything you need. Just drop us a quick message below. We'll get back in 24 hrs</h5>
            </div>
        </div>
        <div class="row">
            <div class=" col-12 col-xl-8 mx-auto">
                 <div class="contact-us">
                        <div class="form-header">
                                <img src="{{asset('frontend')}}/images/form-icon.png" alt="img-fluid form-icon">
                                <h5 class="text-dark sub-heading mb-2">Welcome to Kaykewalk</h5>
                        </div>
                    <form method="POST" action="{{route('viewContactUs')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="" class="pb-2"><strong>Full Name</strong></label>
                                        <input type="text" class="form-control" id="name" value="{{ old('name') }}" name="name" placeholder="Enter Your Full Name" required>
                                    </div>
                                    @error('name')    
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="" class="pb-2"><strong>Email</strong></label>
                                        <input type="email" class="form-control" id="email" value="{{ old('email') }}" name="email" placeholder="Work Email" required>
                                        
                                    </div>
                                    @error('email')    
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="pb-2"><strong>Company Name</strong></label>
                                        <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name') }}" placeholder="Enter Your Company Name" required>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="" class="pb-2"><strong>Phone No</strong></label>
                                        <input type="number" class="form-control" id="phone" value="{{ old('phone') }}"  name="phone" placeholder="Enter Your Number" required>
                                        
                                    </div>
                                    @error('phone')    
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                    <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                        <label for="" class="pb-2"><strong>Message</strong></label>
                                        <textarea name="message" id="" cols="4" rows="3" class="form-control" placeholder="Enter Your Message Here" required>{{ old('message') }}</textarea> 
                                    </div>
                                    @error('message')    
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                
                                <div class="col-md-6 mx-auto text-center">
                                    <Button type="submit" class="btn btn-primary btn-subscribe" >Contact Us</Button>
                                </div>
                            </div>
                    </form>
                 </div>
            </div>
        </div>
    </div>

</section>
<section class="sec-space pt-0">
<div class="container">
    <div class="row">
        <div class=" col-12 col-xl-8 mx-auto">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-xl-4 mb-4 mb-xl-0">
                    <div class="contact-details text-center">
                        <div>
                            <span class="bx bx-envelope"></span>
                        </div>
                        <div>
                            <h5>Email</h5>
                            <p>Our friendly team is here to help</p>
                        </div>
                        <div>
                            <a href="mailto:hello@kaykewalk.com">hello@kaykewalk.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-4 mb-4 mb-xl-0">
                    <div class="contact-details text-center">
                        <div>
                            <span class="bx bx-map"></span>
                        </div>
                        <div>
                            <h5>Location</h5>
                            <p>Come Say hello to our office HQ</p>
                        </div>
                        <div>
                            <a href="">250 Consumers Road North York, ON M2J 4V6 Canada.</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-4">
                <div class="contact-details text-center">
                        <div>
                            <span class="bx bx-phone"></span>
                        </div>
                        <div>
                            <h5>Phone</h5>
                            <p>Monday to Friday 10am to 5pm</p>
                        </div>
                        <div>
                            <a href="tel:+1(647)8748762">+1 (647) 874 8762</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection