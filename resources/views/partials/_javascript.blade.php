
    <!-- ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    {{-- <script src="/blog/bootstrap/javascript/jquery-3.3.1.min.js"></script> --}}

    {{-- <script>window.jQuery || document.write('<script src="/blog/bootstrap/javascript/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="/blog/bootstrap/javascript/popper.min.js"></script>
    <script src="/blog/bootstrap/javascript/bootstrap.min.js"></script> --}}
     <!-- jQuery Plugins -->
     {{-- {{ Html::script('js/jquery.min.js') }} --}}
     {{ Html::script('js/bootstrap.min.js') }}
     {{ Html::script('js/slick.min.js') }}
     {{ Html::script('js/nouislider.min.js') }}
     {{ Html::script('js/jquery.zoom.min.js') }}
     {{ Html::script('js/main.js') }}

<!--===============================================================================================-->

     {{-- {{ Html::script('js/fashejs/jquery-3.2.1.min.js') }} --}}
     {{ Html::script('js/fashejs/animsition.min.js') }}
     {{ Html::script('js/fashejs/popper.js') }}
     {{ Html::script('js/fashejs/slick.min.js') }}
     {{ Html::script('js/fashejs/slick-custom.js') }}
     {{ Html::script('js/fashejs/sweetalert.min.js') }}

            <script type="text/javascript">
                $('.block2-btn-addcart').each(function(){
                    var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
                    $(this).on('click', function(){
                        swal(nameProduct, "is added to cart !", "success");
                    });
                });

                $('.block2-btn-addwishlist').each(function(){
                    var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
                    $(this).on('click', function(){
                        swal(nameProduct, "is added to wishlist !", "success");
                    });
                });
            </script>

     {{ Html::script('js/fashejs/main.js') }}


<!--===============================================================================================-->
