@extends('layouts.app-home')

@include('partials.topnav')

<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel" style="height: auto !important; ">
  <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <div class="view rounded swift-polygon" style="background-image: url({{ asset('storage/images/action-activity-adult-attack-260447.jpg') }}), linear-gradient(to bottom, rgba(255,255,255,1) 0%, rgba(191,189,189,1) 30%, rgba(89,89,89,1) 100%); background-size: cover; background-repeat: no-repeat; background-position: center; height: 450px; max-height: 450px !important" >
            <div class="mask rgba-black-light"></div>
          </div>
        </div>
    </div>
</div>
@include('partials.schedule')
@include('partials.footer')

