<div class="footer__graphic"></div>
<div class="footer"> 
    <div class="container"> 
  
        <div class="row">
            <div class="col-md-4">
                 <div class="f-about" style='color: #fff;'>
                    
                    <h4>About as</h4>
                    
                        {!!$site -> short_description!!}
                    <a href="{{route('about_page')}}">More</a>
                    
                </div><!--/f-about-->
                @include('components.support_form')
            </div>

            <div class="col-md-4">
                <div class="f-links">
                    <h4>Links</h4>
                    <ul>
                      <li> <a href="{{route('indoor_list')}}">Indoor climbing</a> </li>
                      <li> <a href="{{route('outdoor_list')}}">Outdoor climbing</a> </li>
                      <li> <a href="{{route('mount_list')}}">Mountainering</a> </li>
                      <li> <a href="{{route('ice_list')}}">Ice and mix</a> </li>
                      <li> <a href="{{route('other_list')}}">Other</a> </li>
                      <li> <a href="{{route('about_page')}}">About as</a> </li>
                      <li> <a href="{{route('login')}}">Login</a> </li>
                      <li> <a href="{{url('sitemap')}}">Sitemap</a> </li>
                    </ul>
                </div><!-- /f-links -->
            </div>

            <div class="col-md-4">
                <div class="flick">
                    <h4>Share</h4>
                    <ul>

                    <!-- AddToAny BEGIN -->
                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                    <a class="a2a_button_facebook"></a>
                    <a class="a2a_button_twitter"></a>
                    <a class="a2a_button_tumblr"></a>
                    </div>
                    <script async src="https://static.addtoany.com/menu/page.js"></script>
                    <!-- AddToAny END -->

                    <!-- https://www.addtoany.com/buttons/for/website -->

                    </ul>
                </div><!-- /flick -->
      
            </div>
            
        </div>
    </div>
</div><!-- /footer -->

<script type="text/javascript">
    // beck to top
    $('body').append('<div id="backToTop" class="btn btn-lg"><span class="glyphicon glyphicon-chevron-up"></span></div>');
        $(window).scroll(function () {
            if ($(this).scrollTop() <= 200) {
                $('#backToTop').fadeOut();
            } else {
                $('#backToTop').fadeIn();
            }
        }); 
    $('#backToTop').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
    // and back to top
</script>    
    
<!--analytics.google.com-->

<!-- Global site tag (gtag.js) - Google Analytics -->
<!--     <script async src="https://www.googletagmanager.com/gtag/js?id=UA-101870435-1"></script>
        <script>
          //window.dataLayer = window.dataLayer || [];
          //function gtag(){dataLayer.push(arguments);}
          //gtag('js', new Date());
        
          //gtag('config', 'UA-101870435-1');
    </script> -->
<!-- And analytics.google.com-->