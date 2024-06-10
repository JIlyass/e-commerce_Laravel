
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




<div class="product-section mt-150 mb-150">
	<div class="container">
		@foreach ($categories as $category)
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
				
		    @endforeach
			<div class="container ">
				
				<a  href="{{route('produtcs.index',['idCat'=>$category->id] )}}" ><button class="btn btn-primary"> Tous les produits</button></a>
			</div>
		</div>
		
		@endforeach
	</div>
</div>





@endsection