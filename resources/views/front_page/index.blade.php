@extends('front_page.layout.main')
@section('container')
@include('front_page.partial.filter')
  @include('front_page.partial.offer')
  <div class="container">
    @include('front_page.partial.trending')
   
    @include('front_page.partial.popular')
    @include('front_page.partial.sales')
  </div>

@endsection