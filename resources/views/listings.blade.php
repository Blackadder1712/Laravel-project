@extends('layout') <!--add this to the layout-->

@section('content') <!--put/wrap in a section-->
    
<div
class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">  <!--grid that holds listings-->

@unless(count($listings) == 0) <!--if there is a listing-->
@foreach($listings as $listing) 
    <div class="bg-gray-50 border border-gray-200 rounded p-6">
        <div class="flex">
            <img
                class="hidden w-48 mr-6 md:block"
                src="{{asset('images/no-image.png')}}"
                alt=""
            />
            <div>
                <h3 class="text-2xl">
                    <a href="show.html">{{$listing->title}}</a><!--dynamic dummy-->
                </h3>
                <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
                <ul class="flex">
                    <li
                        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                    >
                        <a href="#">Laravel</a>
                    </li>
                    <li
                        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                    >
                        <a href="#">API</a>
                    </li>
                    <li
                        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                    >
                        <a href="#">Backend</a>
                    </li>
                    <li
                        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                    >
                        <a href="#">Vue</a>
                    </li>
                </ul>
                <div class="text-lg mt-4">
                    <i class="fa-solid fa-location-dot"></i>{{$listing->location}}
                    
                </div>
            </div>
        </div>
    </div> <!--listing html--->
@endforeach

@else <!--if no listings-->
  <p>No listings found</p>

@endunless <!--end argument-->
</div>



@endsection <!--close content wrapper-->