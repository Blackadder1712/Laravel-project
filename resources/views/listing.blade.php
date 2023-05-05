@extends('layout') <!--add this to the layout-->

@section('content') <!--put/wrap in a section-->

<h2>
    {{$listing['title']}}
</h2> <!--display listing and each listings items -->
<p>
    {{$listing['description']}}
</p>

@endsection