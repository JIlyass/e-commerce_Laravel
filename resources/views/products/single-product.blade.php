@extends('_layouts.master')
@section('content')
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>See more Details</p>
						<h1>Single Product</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- single product -->
	<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="{{url('storage/images/'.$produit[0]->path)}}" alt="profuit_img">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3>{{$produit[0]->nomPr}}</h3>
						<p class="single-product-pricing"><span>par unité</span> {{$produit[0]->prixV}}</p>
						<p>{{$produit[0]->description}} .</p>
						<div class="single-product-form">
							<form action="index.html">
								<input type="number" placeholder="0">
							</form>
							<a href="{{route('produtcs.addToPanier',['idPr'=>$produit[0]->id])}}"  class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
							<p><strong>Categorie: {{$nomCat}}</strong></p>
						</div>
						<h4>Share:</h4>
						<ul class="product-share">
							<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
							<li><a href=""><i class="fab fa-twitter"></i></a></li>
							<li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
							<li><a href=""><i class="fab fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end single product -->

	<!-- more products -->
	<div class="more-products mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Related</span> Products</h3>
					</div>
				</div>
			</div>
			<div class="row">
				@foreach ($dbPrd as $prd)
				<div class="col-lg-4 col-md-6 text-center ">
					<div class="single-product-item">
						<div class="product-image">
							<a href="{{route('produtcs.single-product',['idPr'=>$prd->id])}}"><img src="{{url('storage/images/'.$prd->path)}}" alt="image_produit"></a>
						</div>
						<h3>{{$prd->nomPr}}</h3>
						<p class="product-price"><span>par unité</span> {{$prd->prixV}} </p>
						<a href="{{route('produtcs.addToPanier',['idPr'=>$prd->id])}}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
					</div>
				@endforeach
				
				
			</div>
		</div>
	</div>
	<!-- end more products -->

	<!-- logo carousel -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="assets/img/company-logos/1.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/2.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/3.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/4.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/5.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->
@endsection