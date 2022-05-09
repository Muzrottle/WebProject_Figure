<div id=main> 
  <section class="single-product">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<ol class="breadcrumb">
					<li><a href="/">Home</a></li>
					<li><a href="/shop">Shop</a></li>
					<li class="active">Single Product</li>
				</ol>
			</div>
		</div>
		<div class="row mt-20">
			<div class="col-md-5">
				<div class="single-product-slider">
					<div id='carousel-custom' class='carousel slide' data-ride='carousel'>
						<div class='carousel-outer'>
							<!-- me art lab slider -->
							<div class='carousel-inner '>
								<div class='item active'>
									<img src='{{ asset('images/shop/products') }}/{{ $product->image }}' alt='{{ $product->name }}' data-zoom-image="{{ asset('images/shop/products') }}/{{ $product->image }}" />
								</div>
							</div>
							
							<!-- sag sol -->
							<a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
								<i class="tf-ion-ios-arrow-left"></i>
							</a>
							<a class='right carousel-control' href='#carousel-custom' data-slide='next'>
								<i class="tf-ion-ios-arrow-right"></i>
							</a>
						</div>
						
						<!-- thumb -->
						<ol class='carousel-indicators mCustomScrollbar meartlab'>
							<li data-target='#carousel-custom' data-slide-to='0' class='active'>
								<img src='{{ asset('images/shop/products') }}/{{ $product->image }}' alt='{{ $product->name }}' />
							</li>
						</ol>
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<div class="single-product-details">
					<h2>{{ $product->name }}</h2>
					<p class="product-price">${{ $product->regular_price }}</p>
					
					<p class="product-description mt-20">
                        {{ $product->description }}
                    </p>
					<a href="#" class="btn btn-main mt-20"  wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->regular_price }})">Add To Cart</a>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="products related-products section">
	<div class="container">
		<div class="row">
			<div class="title text-center">
				<h2>Related Products</h2>
			</div>
		</div>
		<div class="row">
            @foreach ($related_products as $r_product)
			<div class="col-md-3">
				<div class="product-item">
					<div class="product-thumb">
						<span class="bage">Sale</span>
						<img class="img-responsive" src="{{ asset('images/shop/products') }}/{{ $r_product->image }}" alt="{{ $r_product->name }}" />
						<div class="preview-meta">
							<ul>
								<li>
                                    <a href="{{ route('product.details',['slug'=>$r_product->slug]) }}"><i class="tf-ion-ios-search"></i></a>
								</li>
								<li>
			                        <a href="#" ><i class="tf-ion-ios-heart"></i></a>
								</li>
								<li>
									<a href="#!" wire:click.prevent="store({{ $r_product->id }},'{{ $r_product->name }}',{{ $r_product->regular_price }})"><i class="tf-ion-android-cart"></i></a>
								</li>
							</ul>
                      	</div>
					</div>
					<div class="product-content">
						<h4><a href="{{ route('product.details',['slug'=>$r_product->slug]) }}">{{ $r_product->name }}</a></h4>
						<p class="price">${{ $r_product->regular_price }}</p>
					</div>
				</div>
			</div>
            @endforeach
		</div>
	</div>
</section>



<!-- Modal -->
<div class="modal product-modal fade" id="product-modal">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<i class="tf-ion-close"></i>
	</button>
  	<div class="modal-dialog " role="document">
    	<div class="modal-content">
	      	<div class="modal-body">
	        	<div class="row">
	        		<div class="col-md-8">
	        			<div class="modal-image">
		        			<img class="img-responsive" src="{{ asset('images/shop/products/modal-product.jpg')}}" />
	        			</div>
	        		</div>
	        		<div class="col-md-3">
	        			<div class="product-short-details">
	        				<h2 class="product-title">GM Pendant, Basalt Grey</h2>
	        				<p class="product-price">$200</p>
	        				<p class="product-short-description">
	        					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem iusto nihil cum. Illo laborum numquam rem aut officia dicta cumque.
	        				</p>
	        				<a href="#!" class="btn btn-main">Add To Cart</a>
	        				<a href="#!" class="btn btn-transparent">View Product Details</a>
	        			</div>
	        		</div>
	        	</div>
	        </div>
    	</div>
  	</div>
</div>
</div>