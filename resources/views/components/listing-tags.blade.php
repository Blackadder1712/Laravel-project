@props(['tagsCsv']) <!--loop through database grab info for tags -->

@php

 $tags = explode(',', $tagsCsv); //split the tag list and put into variable 
    
@endphp



<ul class="flex">
    @foreach($tags as $tag)
    <li
        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
    >
        <a href="/?tag={{$tag}}">{{$tag}}</a> <!--filter and show info from database -->
    </li>
    @endforeach
</ul>