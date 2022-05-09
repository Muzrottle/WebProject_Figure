<div class="main">
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Cart</h1>
					<ol class="breadcrumb">
						<li><a href="/">Home</a></li>
						<li class="active">cart</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>



<div class="page-wrapper">
  <div class="cart shopping">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="block">
            <div class="product-list">
              @if(Session::has('success_message'))
                <div class="alert alert-success">
                  <strong>Success</strong> {{ Session::get('success_message') }}
                </div>
              @endif
              @if(Cart::count() > 0)
              <form method="post">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="">Item Name</th>
                      <th class="">Item Price</th>
                      <th class="">Quantity</th>
                      <th class="">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach (Cart::content() as $item)
                      <tr class="">
                        <td class="">
                          <div class="product-info">
                            <img width="80" src="{{ asset('images/shop/products') }}/{{ $item->model->image }}" alt="{{ $item->model->name }}" />
                            <a href="{{ route('product.details',['slug'=>$item->model->slug]) }}">{{ $item->model->name }}</a>
                          </div>
                        </td>
                        <td class="">${{ $item->model->regular_price }}</td>
                        <td class="">
                          <div class="quantity-input" style="display:flex; justify-content: space-between; align-items:center; width: 100px;">
                            <a class="btn btn-qty" wire:click.prevent="decreaseQuantity('{{ $item->rowId }}')">-</a>
                            <input style="border:solid 1px; text-align: center; width: 35px; height:35px;" type="text" value="{{ $item->qty }}" name="product-quantity-cart" data-max="20">
                            <a class="btn btn-qty" wire:click.prevent="increaseQuantity('{{ $item->rowId }}')">+</a>
                          </div>
                        </td>
                        <td class="">
                          <a class="product-remove" href="#!" wire:click.prevent="remove('{{ $item->rowId }}')">Remove</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <div>
                  <strong style="margin-left: 2%;">Total</strong>
                  <p style="float: right; margin-right: 3%;">${{ Cart::subtotal() }}</p>
                </div>
              </form>
              <a href="/checkout" style="margin-top: 4%;" class="btn btn-main">Checkout</a>
              @else
                <p>No item in cart.</p>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>