
@extends('_layouts.master')
@section('content')
    
{{-- Free shepin , .... --}}
<div class="list-section pt-80 pb-80">
	<div class="container">

		<div class="row">
			<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
				<div class="list-box d-flex align-items-center">
					<div class="list-icon">
						<i class="fas fa-shipping-fast"></i>
					</div>
					<div class="content">
						<h3>Free Shipping</h3>
						<p>When order over $75</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
				<div class="list-box d-flex align-items-center">
					<div class="list-icon">
						<i class="fas fa-phone-volume"></i>
					</div>
					<div class="content">
						<h3>24/7 Support</h3>
						<p>Get support all day</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="list-box d-flex justify-content-start align-items-center">
					<div class="list-icon">
						<i class="fas fa-sync"></i>
					</div>
					<div class="content">
						<h3>Refund</h3>
						<p>Get refund within 3 days!</p>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>


@foreach ($categories as $category)

<div class="product-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="section-title">	
					<h3><span class="orange-text">Tous ce qu'est </span> {{$category->nomCat}}</h3>
					<p> {{$category->description}}</p>
				</div>
			</div>
		</div>
		
		<div class="row">
		    @foreach($category->produits as $product)  
			{{-- {{dd($product)}} --}}
			    <div class="col-lg-4 col-md-6 text-center">
				    <div class="single-product-item">
					    <div class="product-image">
							
							
						   <a href="{{route('produtcs.single-product',['idPr'=>$product->id])}}"> <img src="{{url("storage/images/".DB::table('produits_images')
											->where('produit_id', $product->id)
											->where('isOfficiel', 1)
											->value('path') )}}" alt=""> </a>
					    </div>
					    <h3>{{$product->nomPr}}</h3>
					    <p class="product-price"><span>Par antité</span> {{$product->prixV}} dhs </p>
					    <a href="{{route('produtcs.addToPanier',['idPr'=>$product->id])}}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
				    </div>
			    </div>
				<div>
					<a href="{{route('produtcs.index')}}" > <button class="btn btn-primary">Plus de produit de cette categorie</button></a>
				</div>
		    @endforeach
			
		</div>
	</div>
</div>
@endforeach



{{-- 
<!-- product section -->
@for ($i = 0; $i < count($db_cat); $i++)
	

<div class="product-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="section-title">	
					<h3><span class="orange-text">Tous ce qu'est </span> {{$db_cat[$i]->nomCat}}</h3>
					<p> {{$db_cat[$i]->description}}</p>
				</div>
			</div>
		</div>
		
		<div class="row">
			@for ($j = 0; $j <= 3; $j++)
				@if($db_prd[$j]->categorie_id==$db_cat[$i]->id)
					<div class="col-lg-4 col-md-6 text-center">
						<div class="single-product-item">
							<div class="product-image">
								<a href="single-product.html"><img src="{{url("storage/images/".$db_prd[$j]->path)}}" alt="product_img"></a>
							</div>
							<h3>{{$db_prd[$j]->nomPr}}</h3>
							<p class="product-price"><span>Par antité</span> {{$db_prd[$j]->prixV}} dhs </p>
							<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
						</div>
					</div>
				@endif
			@endfor 
			
			
			
			
		</div>
	</div>
</div>

@endfor --}}
<!-- end product section -->

<!-- cart banner section :: l3orod --> 
<section class="cart-banner pt-100 pb-100">
	<div class="container">
		<div class="row clearfix">
			<!--Image Column-->
			<div class="image-column col-lg-6">
				<div class="image">
					<div class="price-box">
						<div class="inner-price">
							<span class="price">
								<strong>30%</strong> <br> off per kg
							</span>
						</div>
					</div>
					<img src="assets/img/a.jpg" alt="">
				</div>
			</div>
			<!--Content Column-->
			<div class="content-column col-lg-6">
				<h3><span class="orange-text">Deal</span> of the month</h3>
				<h4>Hikan Strwaberry</h4>
				<div class="text">Quisquam minus maiores repudiandae nobis, minima saepe id, fugit ullam similique! Beatae, minima quisquam molestias facere ea. Perspiciatis unde omnis iste natus error sit voluptatem accusant</div>
				<!--Countdown Timer-->
				<div class="time-counter"><div class="time-countdown clearfix" data-countdown="2020/2/01"><div class="counter-column"><div class="inner"><span class="count">00</span>Days</div></div> <div class="counter-column"><div class="inner"><span class="count">00</span>Hours</div></div>  <div class="counter-column"><div class="inner"><span class="count">00</span>Mins</div></div>  <div class="counter-column"><div class="inner"><span class="count">00</span>Secs</div></div></div></div>
				<a href="cart.html" class="cart-btn mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
			</div>
		</div>
	</div>
</section>
<!-- end cart banner section -->


@endsection