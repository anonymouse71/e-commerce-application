@extends('layouts.main')

@section('search-keyword')
	
	<hr>	

	<section id="search-keyword">
	    <h1>Search Results for <span>{{ $keyword }}</span></h1>
	</section><!-- end search-keyword -->

@stop


@section('content')

	<div class="search-results">
		
		@foreach($products as $product)
		<div class="product">
		    <a href="/store/view/{{ $product->id }}">
		        {{ HTML::image('img/product.gif' , 'Product' , array('class'=>'feature' , 'width'=>'240' , 'height'=>'127' )) }}
		    </a>

		    <h3><a href="/store/view/{{ $product->id }}">{{ $product->title }}</a></h3>

		    <p>{{ $product->description }}</p>

		    <h5>
		        Availability: 
		        <span class="{{ Availability::displayClass($product->availability) }}">
		        {{ Availability::display($product->availability) }}
		        </span>
		    </h5>

		    <p>
		        <a href="#" class="cart-btn">
		            <span class="price">${{ $product->price }}</span>
		             {{ HTML::image('img/white-cart.gif' , 'Add to Cart') }}
		              ADD TO CART
		        </a>
		    </p>
		</div>
		@endforeach

	</div>

@stop