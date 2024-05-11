<footer class="ftco-footer ftco-section" id="footer">
  <div class="row heading-section ftco-animate justify-content-center">
    <h3 class="subheading" style="font-size: xx-large;">Contact Us</h3>
</div>
    <section class="ftco-section contact-section">
        <div class="container">
          @php
          $contact=\App\Models\Contact::first(); 
          @endphp
          <div class="row block-9">
            <div class="col-md-4 contact-info ftco-animate bg-light p-4">
                <div class="row">
                    <div class="col-md-12 mb-4">
                    <h2 class="h4">Contact Information</h2>
                  </div>
                  <div class="col-md-12 mb-3">
                    <p><span>Address:</span> {{$contact->address}}</p>
                  </div>
                  <div class="col-md-12 mb-3">
                    <p><span>Phone:</span> <a href="tel://{{$contact->phone}}">{{$contact->phone}}</a></p>
                  </div>
                  <div class="col-md-12 mb-3">
                    <p><span>Email:</span> <a href="mailto:{{$contact->address}}">{{$contact->email}}</a></p>
                  </div>
                          </div>
                      </div>
                      <div class="col-md-1"></div>
                      <div class="col-md-6 ftco-animate">
                        <form action="{{url("sendEmail")}}" class="contact-form" method="post">
                          @csrf
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                  <input type="text" name="name" class="form-control" placeholder="Your Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <input type="email"  name="email" class="form-control" placeholder="Your Email">
                                </div>
                                </div>
                          </div>
                          <div class="form-group">
                            <input type="text" name="subject" class="form-control" placeholder="Subject">
                          </div>
                          <div class="form-group">
                            <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                          </div>
                          <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                          </div>
                        </form>
                      </div>
          </div>
        </div>
  </section>
    <div class="map">             
    <iframe style="width:100%;height:300px" id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d27901.752675559914!2d31.078291239571552!3d29.05488887791967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d29.031627!2d31.1137432!4m5!1s0x145a27b7c733c069%3A0x3eac9a2550d5d71e!2zMzNIUSs3Vjcg2YXYr9ix2LPZhyDYudmE2Yog2KjZhiDYp9io2Yog2LfYp9mE2Kgg2KfZhNir2KfZhtmI2YrZhyDYqNmG2YrZhtiMINmC2LPZhSDYqNmG2Ykg2LPZiNmK2YHYjCwgQmVuaSBTdWVmLCBCZW5pIFN1ZWYgR292ZXJub3JhdGXigK0!3m2!1d29.0781539!2d31.089668399999997!5e0!3m2!1sen!2seg!4v1691407175716!5m2!1sen!2seg" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
</div>
    <div class="container" style="text-align: center;">
        <div class="row d-flex">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <ul class="ftco-footer-social list-unstyled float-lft mt-3">
                        <li class="ftco-animate"><a target="_blank" href="{{$contact->twitter}}"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a target="_blank" href="{{$contact->facebook}}"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a target="_blank" href="{{$contact->instagram}}"><span class="icon-instagram"></span></a></li>
                        <li class="ftco-animate"><a target="_blank" href="{{$contact->whatsapp}}"><span class="icon-whatsapp"></span></a></li>
                        <li class="ftco-animate"><a target="_blank" href="{{$contact->youtube}}"><span class="icon-youtube"></span></a></li>
                        <li class="ftco-animate"><a target="_blank" href="{{$contact->snapchat}}"><span class="icon-snapchat"></span></a></li>
                        <li class="ftco-animate"><a target="_blank" href="{{$contact->google_plus}}"><span class="icon-google-plus"></span></a></li>
                      </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p class="mb-0">
                    </script> This template is made by rania badawy <i class="icon-heart" aria-hidden="true"></i>
                </p>
            </div>
        </div>
    </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
            stroke="#F96D00" />
    </svg></div>


<script src="{{asset('user')}}/js/jquery.min.js"></script>
<script src="{{asset('user')}}/js/jquery-migrate-3.0.1.min.js"></script>
<script src="{{asset('user')}}/js/popper.min.js"></script>
<script src="{{asset('user')}}/js/bootstrap.min.js"></script>
<script src="{{asset('user')}}/js/jquery.easing.1.3.js"></script>
<script src="{{asset('user')}}/js/jquery.waypoints.min.js"></script>
<script src="{{asset('user')}}/js/jquery.stellar.min.js"></script>
<script src="{{asset('user')}}/js/owl.carousel.min.js"></script>
<script src="{{asset('user')}}/js/jquery.magnific-popup.min.js"></script>
<script src="{{asset('user')}}/js/aos.js"></script>
<script src="{{asset('user')}}/js/jquery.animateNumber.min.js"></script>
<script src="{{asset('user')}}/js/bootstrap-datepicker.js"></script>
<script src="{{asset('user')}}/js/jquery.timepicker.min.js"></script>
<script src="{{asset('user')}}/js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
</script>
<script src="{{asset('user')}}/js/google-map.js"></script>
<script src="{{asset('user')}}/js/main.js"></script>
</body>

</html>