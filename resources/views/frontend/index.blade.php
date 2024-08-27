@extends('frontend.layouts.app')



@section('title', 'Home')

@section('content')

          <!-- Main Banner --->
    <section class="sec-space sec-space-m main-banner pt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div>
                        <span class="circle-1"></span>
                        <span class="circle-2"></span>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="banner-img">
                        <img src="{{asset('frontend')}}/images/yellow-banner-gif.gif" alt="animated-gif">
                    </div>
                    <div class="banner-content text-center">
                        <p class="sub-text">Hey there, creative folks!</p>
                        <p class="sub-text">We’re launching soon...</p>
                        <p class="sub-text">One place to make all your tasks</p>
                        <h1>A PIECE OF CAKE !</h1>
                    </div>
                </div>
                <div class="col-md-2">
                    <div>
                        <span class="circle-3"></span>
                        <span class="circle-4"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Grid Section --->
    <section class="sec-content sec-space">
        <div class="container">
            <div class="row">
                <div class=" col-xl-4 col-lg-12 col-md-12 mb-md-4 mb-lg-0 mb-4">
                    <div class="card">
                        <img src="{{asset('frontend')}}/images/1.gif" alt="animated-gif-content">
                        <div>
                            <h5 class="mt-4">Blast Off to Productivity</h5>
                            <p class="mb-0">Because life’s too short for boring tools! We believe in turning “Ugh,
                                work!” to “Let’s do some work!”. Don’t believe that’s possible? Let us introduce you to
                                Kaykewalk.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-12 col-md-12 mb-md-4 mb-lg-0 mb-4">
                    <div class="card">
                        <img src="{{asset('frontend')}}/images/2.gif" alt="animated-gif-content2">
                        <div>
                            <h5 class="mt-4">Go with the Work-flow</h5>
                            <p class="mb-0">Kaykewalk is crafted for rebels, dreamers, and those who appreciate a touch of flair and simplicity in their workflow—essentially, straightforward efficiency with no unnecessary frills!</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-12 col-md-12">
                    <div class="card">
                        <img src="{{asset('frontend')}}/images/3.gif" alt="animated-gif-content3">
                        <div>
                            <h5 class="mt-4">Gear up for collaboration</h5>
                            <p class="mb-0">We are currently in the development stage, perfecting every screw so that
                                this ultimate organizing & management tool redefines the way you conquer your day with
                                its easy-to-use and lively interface.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Animated Section --->
    <section class="animated-sec sec-space sec-space-m">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div>
                        <span class="circle-1"></span>
                        <span class="circle-2"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <span class="circle-3"></span>
                    </div>
                    <div>
                        <p class="mb-0 sub-text">We promise your productivity will soar. Prepare for Kaykewalk and turn every project into a piece of cake.</p>
                    </div>
                    <div>
                        <span class="circle-4"></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div>
                        <span class="circle-5"></span>
                        <span class="circle-6"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>


        <!--- Join Us --->
    <div class="bg-light sec-space sec-space-m">
        <div class="container">
            <div class="row">
                <div class=" col-12 col-md-10 mx-auto">
                    <div class="join-us text-center">
                        <p class="mb-0 sub-text">Ready to join a buzzing community of like-minded pros where creativity thrives? Dive in with our newsletter for an exclusive pass!</p>
                        <button class="btn btn-primary mt-5" data-bs-toggle="modal" data-bs-target="#subscribeModal">Subscribe</button>
                    </div>
                    <!--- Contact Modal Popup --->
                    <div class="modal fade"  id="subscribeModal" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="text-end">
                               
                                <button type="button" class="btn-cross" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i></button>
                            </div>
                            <div class="modal-body px-4 pt-0 pb-4">
                                    <div class="form-header">
                                        <img src="{{asset('frontend')}}/images/form-icon.png" alt="img-fluid form-icon">
                                        <h5 class="text-dark mb-2">Welcome  to Kaykewalk</h5>
                                    </div>
                                    <form method="POST" action="{{route('viewContactUs')}}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-6 mb-4">
                                                <div class="form-group">
                                                   <label for="" class="pb-2"><strong>Full Name</strong></label>
                                                    <input type="text" class="form-control" id="name" value="{{ old('name') }}" name="name" placeholder="Enter Your Full Name" required>
                                                </div>
                                                @error('name')    
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            
                                            <div class="col-6 mb-4">
                                                <div class="form-group">
                                                    <label for="" class="pb-2"><strong>Email</strong></label>
                                                    <input type="email" class="form-control" id="email" value="{{ old('email') }}" name="email" placeholder="Work Email" required>
                                                 
                                                </div>
                                                @error('email')    
                                                 <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-6 mb-4">
                                                <div class="form-group">
                                                    <label class="pb-2"><strong>Company Name</strong></label>
                                                    <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name') }}" placeholder="Enter Your Company Name" required>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-6 mb-4">
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
                                                    <textarea name="message" id="" cols="3" rows="3" class="form-control" placeholder="Enter Your Message Here" required>{{ old('message') }}</textarea> 
                                                </div>
                                                @error('message')    
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                           
                                            
                                            <div class="col-12 text-center col-lg-6 mx-auto">
                                                <Button type="submit" class="btn btn-primary btn-subscribe" >Subscribe</Button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




<script>
    document.addEventListener("DOMContentLoaded", function() {
    
      var modal = document.getElementById("subscribeModal");
  
      function showModal() {
        var modalInstance = new bootstrap.Modal(modal);
        modalInstance.show();
      }
  
     
      function hideModal() {
        var modalInstance = new bootstrap.Modal(modal);
        modalInstance.hide();
      }
  
      // Call the showModal function if needed
      // For example, if there are validation errors, call showModal

      
            @if ($errors->any())
                showModal();
            @endif
       
  
      // You can also call hideModal when you need to hide the modal
    });
  </script>

@yield('scripts')