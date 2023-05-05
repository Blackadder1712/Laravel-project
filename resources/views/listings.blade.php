@extends('layout') <!--add this to the layout-->

@section('content') <!--put/wrap in a section-->

@include('partials._hero') <!--include hero html-->
    
<div
class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">  <!--grid that holds listings-->

@unless(count($listings) == 0) <!--if there is a listing-->
@foreach($listings as $listing) 
    <x-listing-card :listing="$listing"/>   <!--attach variable to component and display-->
    
@endforeach

@else <!--if no listings-->
  <p>No listings found</p>

@endunless <!--end argument-->
</div>



@endsection <!--close content wrapper-->