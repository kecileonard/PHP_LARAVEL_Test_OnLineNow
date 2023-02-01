@extends('layouts.front')

@section('title')
   OnLineNow
@endsection

@section('content')

	@include('layouts.inc.slider')

    <div class="container">

    </div>

@endsection

@section('scripts')
<script>
	$('.featured-carousel').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    dots:false,
	    responsive:{
	        0:{
	            items:1
	        },
	        600:{
	            items:3
	        },
	        1000:{
	            items:3
	        }
	    }
	})
</script>
@endsection
