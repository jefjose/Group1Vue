@extends('layouts.frontend')
@section('css')
@endsection
@section('scripts')
@endsection
@section('content')
<div class="position-relative overflow-hidden p-3 p-md-5 my-5 text-center bg-primary" style="background: url('{{ asset('storage/images/banner1.png') }}') no-repeat; background-position: center;">
      <div class="col-md-5 p-lg-5 mx-auto my-5">
      <div class="col-lg-4 mt-5 pt-5"></div>
      <div class="col-lg-4 mt-5 pt-5"></div>
        <a class="btn btn-outline-secondary mt-5" href="{{ route('product') }}" style="color: white; border-color: white; background-color: black">View Products</a>
      </div>
    </div>
    <div class="container marketing mt-5">

        <!-- Three columns of text below the carousel -->
        <div class="row text-center mt-5  pb-5">
          <div class="col-lg-4">
            <img class="rounded-circle" src="{{ asset('storage/images/Marmalade.jpg') }}" alt="Generic placeholder image" width="250" height="250" >
            <h2 class="mt-3">Marmalade</h2>
            <p>Indulge your lips in a burst of juicy color with our Marmalade lip tint. Inspired by the sweet tanginess of freshly-made marmalade, this tint delivers a deliciously vibrant hue that glides on smoothly, leaving your lips with a luscious, natural-looking flush.</p>
          
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="{{ asset('storage/images/Vampy.jpg') }}" alt="Generic placeholder image" width="250" height="250" >
            <h2 class="mt-3">Vampy</h2>
            <p>Vampy: Unleash your inner allure with Vampy lip tint. This sultry shade exudes a timeless elegance, perfect for those who dare to make a statement. Whether you're going for a mysterious allure or a bold, confident look, Vampy delivers intense color payoff with a velvety finish.</p>
           
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="{{ asset('storage/images/BrightRed.jpg') }}" alt="Generic placeholder image" width="250" height="250" >
            <h2 class="mt-3">Bright Red</h2>
            <p> Set hearts ablaze with our vibrant Bright Red lip tint. This iconic shade is the epitome of classic glamour, adding a pop of fiery color to your pout. Whether you're painting the town red or simply brightening up your day, this lip tint delivers a bold, confident look that commands attention.</p>
          
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
        <div class="jumbotron p-3 p-md-5 text-white rounded bg-primary">
        <div class="col-md-12 px-0">
          <h1 class="display-4 font-italic">Peachy's Collection</h1>
          <p class="lead my-3"> At Peachy's Collection, we don't just offer products; we deliver an exquisite blend of trendiness, elegance, and olfactory delight.</p>
         
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
            
              <h3 class="mb-0">
                <a class="text-dark">Ferrari Black</a>
              </h3>
              <div class="mb-1 text-muted">Unleash the power of sophistication</div>
              <p class="card-text mb-auto">A fragrance that ignites the senses with its captivating blend of aromatic notes, Ferrari Black exudes confidence and allure. Inspired by the sleek elegance of Ferrari cars, this scent is a timeless masterpiece, designed for those who appreciate the finer things in life. Embrace the journey of luxury with every spritz.</p>
             
            </div>
            <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="{{ asset('storage/images/FerrariBlack.jpg') }}" data-holder-rendered="true">
          </div>
        </div>
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
            
              <h3 class="mb-0">
                <a class="text-dark" >Paris Hilton</a>
              </h3>
              <div class="mb-1 text-muted">Unveil your signature allure</div>
              <p class="card-text mb-auto">A fragrance as radiant and glamorous as its namesake, this scent captures the essence of modern femininity with its delicate floral bouquet and hints of playful sophistication. Embark on a journey through Paris's world of elegance and allure, where every spritz evokes the spirit of confidence and allure. Indulge in the luxury of Paris Hilton perfume and let your inner beauty shine.</p>
          
            </div>
            <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="{{ asset('storage/images/ParisHilton.jpg') }}" data-holder-rendered="true">
          </div>
        </div>
      </div>
      <div class="row mb-5 pb-5 mt-5">
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"  style="height: 500px; width: 100%; display: block;" src="{{ asset('storage/images/MarineSquash.jpg') }}" data-holder-rendered="true">
                <div class="card-body">
                  <p class="card-text">Marine Squash is a refreshing scent designed to evoke the crisp, invigorating aroma of the sea breeze. Blending citrusy notes with hints of oceanic freshness, it imbues your interior with a revitalizing fragrance reminiscent of a coastal getaway.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
               
                    </div>
                 
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"  style="height: 500px; width: 100%; display: block;" src="{{ asset('storage/images/Lemon.jpg') }}" data-holder-rendered="true">
                <div class="card-body">
                  <p class="card-text">Lemon is a zesty scent that captures the vibrant essence of freshly sliced lemons. With its bright and citrusy aroma, it infuses your interior with a burst of energy and positivity. The refreshing scent of lemon revitalizes the air, leaving behind a clean and invigorating ambiance.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
              
                    </div>
                  
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"  style="height: 500px; width: 100%; display: block;" src="{{ asset('storage/images/Shangrila.jpg') }}" data-holder-rendered="true">
                <div class="card-body">
                  <p class="card-text">Embark on a sensory journey to paradise with this captivating fragrance. Inspired by the mythical utopia of Shangri-La, this scent envelopes you in layers of blissful tranquility. Let Shangrila transport you to a realm where peace and beauty reign supreme</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                 
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>

           
            
        
        <!-- /END THE FEATURETTES -->

      </div>
    @endsection