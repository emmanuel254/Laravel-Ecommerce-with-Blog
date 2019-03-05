
<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('css/style2.css') }}" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" type="text/css" media="all" /> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
<!-- //js -->
 <script src='{{ asset('js/okzoom.js') }}'></script>
  <script>
    $(function(){
      $('#example').okzoom({
        width: 250,
        height: 250,
        border: "1px solid black",
        shadow: "0 0 5px #000"
      });
    });
  </script>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){     
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>
<!-- start-smoth-scrolling -->
</head>
    
<body>
<!-- banner -->
    <div class="banner">
        <div class="w3l_banner_nav_left">
        
        </div>
        <div class="w3l_banner_nav_right">
            <div class="agileinfo_single">
                <h5>charminar pulao basmati rice 5 kg</h5>
                <div class="col-md-4 agileinfo_single_left">
                    <img id="example" src="images/76.png" alt=" " class="img-responsive" width="300px" height="100%" />
                </div>
                <div class="col-md-8 agileinfo_single_right">
                    <div class="rating1">
                        <span class="starRating">
                            <input id="rating5" type="radio" name="rating" value="5">
                            <label for="rating5">5</label>
                            <input id="rating4" type="radio" name="rating" value="4">
                            <label for="rating4">4</label>
                            <input id="rating3" type="radio" name="rating" value="3" checked>
                            <label for="rating3">3</label>
                            <input id="rating2" type="radio" name="rating" value="2">
                            <label for="rating2">2</label>
                            <input id="rating1" type="radio" name="rating" value="1">
                            <label for="rating1">1</label>
                        </span>
                    </div>
                    <div class="w3agile_description">
                        <h4>Description :</h4>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui 
                            officia deserunt mollit anim id est laborum.Duis aute irure dolor in 
                            reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
                            pariatur.</p>
                    </div>
                    <div class="snipcart-item block">
                        <div class="snipcart-thumb agileinfo_single_right_snipcart">
                            <h4>$21.00 <span>$25.00</span></h4>
                        </div>
                        <div class="snipcart-details agileinfo_single_right_details">
                            <form action="#" method="post">
                                <fieldset>
                                    <input type="hidden" name="cmd" value="_cart" />
                                    <input type="hidden" name="add" value="1" />
                                    <input type="hidden" name="business" value=" " />
                                    <input type="hidden" name="item_name" value="pulao basmati rice" />
                                    <input type="hidden" name="amount" value="21.00" />
                                    <input type="hidden" name="discount_amount" value="1.00" />
                                    <input type="hidden" name="currency_code" value="USD" />
                                    <input type="hidden" name="return" value=" " />
                                    <input type="hidden" name="cancel_return" value=" " />
                                    <input type="submit" name="submit" value="Add to cart" class="button" />
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
<!-- //banner -->

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>
</html>