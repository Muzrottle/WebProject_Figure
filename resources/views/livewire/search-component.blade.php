<div id=main>
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">Shop</h1>
                        <ol class="breadcrumb">
                            <li><a href="/">Home</a></li>
                            <li class="active">Shop</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
    <section class="products section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="widget">
                        <h4 class="widget-title">Short By</h4>
                        <form method="post" action="#">
                            <select class="form-control" wire:model="sorting">
                                <option value="default">Default sorting</option>
                                <option value="price">Sort by price: low to high</option>
                                <option value="price-desc">Sort by price: high to low</option>
                            </select>
                        </form>
                        <h4 class="widget-title" style="margin-top: 20px;">Item Per Page</h4>
                        <form method="post" action="#">
                            <select class="form-control" wire:model="pagesize">
                                <option value="12" selected="selected">12 per page</option>
                                <option value="18">18 per page</option>
                                <option value="24">24 per page</option>
                                <option value="30">30 per page</option>
                            </select>
                        </form>
                    </div>
                    
                    <div class="widget product-category">
                        <h4 class="widget-title">Categories</h4>
                        <div class="panel-group commonAccordion" id="accordion" role="tablist" aria-multiselectable="true">
                              <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                      <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                          Funko
                                        </a>
                                      </h4>
                                </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <ul>
                                        @foreach ($categories as $category)
                                            <li><a href="{{ route('product.category',['category_slug'=>$category->slug]) }}">{{ $category->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                          </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-9">
                    @if($products->count()>0)
                    
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-md-4">
                                    <div class="product-item">
                                        <div class="product-thumb">
                                            <span class="bage">Sale</span>
                                            <img class="img-responsive" src="{{ asset('images/shop/products') }}/{{ $product->image }}" alt="{{ $product->name }}" />
                                            <div class="preview-meta">
                                                <ul>
                                                    <li>
                                                        <a href="{{ route('product.details',['slug'=>$product->slug]) }}"><i class="tf-ion-ios-search-strong"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#!" ><i class="tf-ion-ios-heart"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->regular_price }})"><i class="tf-ion-android-cart"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h4 style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><a href="{{ route('product.details',['slug'=>$product->slug]) }}">{{ $product->name }}</a></h4>
                                            <p class="price">${{ $product->regular_price }}</p>
                                        </div>
                                    </div>
                                </div>
                                
                            @endforeach
                            
                        </div>	
                    
                    @else
                        <p style="font-size: 18px; margin-left: 10px; margin-top: 10px;">No products found.</p>
                    @endif
                </div>
            
            </div>
            <div class="wrap-pagination-info">
                {{ $products->links() }}
                {{-- <ul class="page-numbers">
                    <li><span class="page-number-item current">1</span></li>
                    <li><a class="page-number-item" href="/">2</a></li>
                    <li><a class="page-number-item" href="/">3</a></li>
                    <li><a class="page-number-item next-link" href="/">Next</a></li>
                </ul> --}}
            </div>
        </div>
    </section>
    <div>