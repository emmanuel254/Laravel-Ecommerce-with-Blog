</div>
	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45 footer-widt">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30 text-center">
					YOU CAN ALSO GET TO US HERE !
				</h4>

				<div>
					<p class="s-text7 w-size27 text-center">
						Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
					</p>

					<div class="flex-m p-t-30">
						<a href="#" class="fs-18 color1 p-r-20"><i class="fa fa-facebook"></i></a>
						<a href="#" class="fs-18 color1 p-r-20"><i class="fa fa-instagram"></i></a>
						<a href="#" class="fs-18 color1 p-r-20"><i class="fa fa-pinterest-p"></i></a>
						<a href="#" class="fs-18 color1 p-r-20"><i class="fa fa-snapchat-ghost"></i></a>
						<a href="#" class="fs-18 color1 p-r-20"><i class="fa fa-youtube-play"></i></a>
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					our products
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="{{ route('shopping.index') }}">All Products</a>
					</li>

					@foreach($categories as $category)

					<li class="p-b-9">
						<a href="{{ route('categories',$category->id) }}" class="s-text7">{{ $category->name }}</a>
					</li>

					@endforeach
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Pages
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">Search</a>
					</li>

					<li class="p-b-9">
						<a href="{{ url('about') }}" class="s-text7">About Us</a>
					</li>

					<li class="p-b-9">
						<a href="{{ url('contact') }}" class="s-text7">Contact Us</a>
					</li>

					<li class="p-b-9">
						<a href="{{ url('blog') }}" class="s-text7">Our Blog</a>
					</li>

					<li class="p-b-9">
						<a href="{{ route('questions') }}" class="s-text7">Ask a Question</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Help
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="{{ route('chat.index') }}" class="s-text7">Speak With a doctor</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Track Order
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Shipping
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							FAQs
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Newsletter
				</h4>

				<form>
					<div class="effect1 w-size9">
						<input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
						<span class="effect1-line"></span>
					</div>

					<div class="w-size2 p-t-20">
						<!-- Button -->
						<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
							Subscribe
						</button>
					</div>

				</form>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
			<a href="#">
				<img class="h-size2" src="{{ asset('img/images/icons/paypal.png') }}" alt="IMG-PAYPAL">
			</a>

			<a href="#">
				<img class="h-size2" src="{{ asset('img/images/icons/visa.png') }}" alt="IMG-VISA">
			</a>

			<a href="#">
				<img class="h-size2" src="{{ asset('img/images/icons/mastercard.png') }}" alt="IMG-MASTERCARD">
			</a>

			<a href="#">
				<img class="h-size2" src="{{ asset('img/images/icons/express.png') }}" alt="IMG-EXPRESS">
			</a>

			<a href="#">
				<img class="h-size2" src="{{ asset('img/images/icons/discover.png') }}" alt="IMG-DISCOVER">
			</a>

			<div class="t-center s-text8 p-t-20">
				Copyright © 2019 All rights reserved. | This Site is made by <i class="fa fa-heart-o" aria-hidden="true"></i><a href="#" target="_blank">Emmanuel Chesire</a>
			</div>
		</div>
	</footer>
