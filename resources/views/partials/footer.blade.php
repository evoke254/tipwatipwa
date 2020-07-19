<footer class="page-footer darken-3 pt-4" style="background-color: {{env('BROWN')}}">
  <div class="container-fluid">
    <div class="row d-flex justify-content-center">
      <div class="col-md mb-4 animation text-center " data-animation-type="fadeInLeft">
          <h2 class="text-center white-text font-weight-bold short-border ">We are Social:</h2> <br>
      <span style="font-size: 3em" class="green-text text-center">
        
        <a href="https://www.facebook.com/{{env('FACEBOOK')}}"><i class="fab fa-facebook-f fa-fw" style=" color: {{env('LIME')}}"></i></a>
        <a href="https://wa.me/{{env('WHATSAPP')}}"><i class="fab fa-whatsapp fa-fw" style=" color: {{env('LIME')}}"></i></a>
        <a href="https://www.instagram.com/{{env('INSTAGRAM')}}"><i class="fab fa-instagram fa-fw" style=" color: {{env('LIME')}}"></i></a>
        <a href="https://twitter.com/{{env('TWITTER')}}"><i class="fab fa-twitter fa-fw" style=" color: {{env('LIME')}}"></i></a>
         
      </span>
      </div>

      <div class="col-md mb-4 text-center" style=" color: {{env('LIME')}}">
          <h2 class="text-center white-text font-weight-bold short-border ">Contact Info:</h2> <br>
        <p>Mobile: {{env('MOBILE')}} <br>
            Email: {{env('EMAIL')}}</p>
      </div>

    </div>

    <div class="row d-flex justify-content-center">
        <div class="col-md text-center">
          <hr style="color: white;" class="my-1">
          <p>
            Built with <span ><i class="fa fa-heart red-text" aria-hidden="true" ></i></span> by <a href="https://swiftpayafrica.com">Swiftpay Africa</a> | +254 742 968 713 
          </p>
        </div>
    </div>
  </div>
  <div class="footer-copyright text-center py-3">© {{env('APP_NAME')}} - {{ now()->year }}</a>
  </div>
</footer>