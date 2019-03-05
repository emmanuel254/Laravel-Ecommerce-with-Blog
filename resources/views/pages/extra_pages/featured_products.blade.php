
				
	<!-- New Product -->
	<section class="newproduct bgwhite">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Featured Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">

					   @foreach($products as $featured)

					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
								<img src="{{ asset('products/'.$featured->image) }}" alt="IMG-PRODUCT" width="720px" height="350px">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist fa fa-heart" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">

										<form method="POST" action="{{ url('add_cart') }}">

		                                   <input type="hidden" name="product_id" value="{{ $featured->id }}">
		                                   <input type="hidden" name="_token" value="{{csrf_token()}}">
		                                   <input type="hidden" name="image" value="{{ $featured->image }}">
										   <input type="hidden" value ="1" name="quantity" class="form-control" style="width: 100%" placeholder="Quantity">
		                                   <button type="submit" class="flex-c-m size1 bg4 bo-rad-4 hov1 s-text1 trans-0-4 text-center">Add to Cart </button>

		                               </form>
										<!-- Button -->
										
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="{{ route('products.single',$featured->id.'?category='.$featured->category) }}" class="block2-name dis-block s-text2 p-b-5">
									{{ $featured->title }}
								</a>

								<span class="block2-price">
									Ksh.{{ $featured->price }}
								</span>
								<s class="text-danger"> Ksh.{{ $featured->list_price }}</s>
							</div>
						</div>
					</div>
					
					@endforeach

					

				</div>
			</div>
	</section>
