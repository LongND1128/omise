$(document).ready(function(){
	new WOW().init();
    var windowsize = $(window).width();
    $(".sidenav > li:has(ul) > a").click(function(){
        var li = $(this).parent('li');
        if(li.hasClass('open')) {
            li.removeClass('open').find('ul').slideUp(500);
        }else {
            li.addClass('open').find('ul').slideDown(500);
        }
        return false;
    });

    $('.navbar-nav > li > a').click(function(){
        if(windowsize>767){
            url = $(this).attr('href');
            location.href=url;
            return true;
        }
    });


    $('.tru').click(function(){
        var sl = $('.cartsing .qty').val();
        if(sl == 1 ) return false;
        sl = sl - 1;
        $('.cartsing .qty').val(sl)
    });
    $('.cong').click(function(){
        var sl = $('.cartsing .qty').val();
        sl++;
        $('.cartsing .qty').val(sl)
    });

    $(".btn-select").each(function (e) {
        var value = $(this).find("ul li.selected").html();
        if (value != undefined) {
            $(this).find(".btn-select-input").val(value);
            $(this).find(".btn-select-value").html(value);
        }
    });

    $('.search-panel .dropdown-menu').find('a').click(function(e) {
        e.preventDefault();
        var param = $(this).attr("href").replace("#","");
        var concept = $(this).text();
        $('#search_concept').text(concept);
        $('#search_param').val(param);
    });

    $('button').click(function(){
        $(this).parents('form').submit();
    });


    // auto hide menu when click outside
    // $(document).click(function(event) {
    //     if(!$(event.target).closest('.navbar').length) {
    //         $(".navbar-collapse").stop().animate({ 'height': '0px' },500, function(){
    //             $(this).removeClass('in').addClass("collapse");
    //         });
    //         $(".navbar-toggle").stop().removeClass('collapsed');
    //     }
    // })
    // toggle menu already show
    $('.navbar-toggle').not('.collapsed').on('click', function(){
        $('.navbar-collapse.in').animate({ 'height': '0px' },500, function(){
            $(this).removeClass('in').addClass("collapse");
        });
    });
    $('.navbar-toggle.collapsed').on('click', function(){
        var id = $(this).attr('data-target');
        $('.navbar-collapse.in').not(id).animate({ 'height': '0px' },500, function(){
            $(this).removeClass('in').addClass("collapse");
        });
    });
    $('.navbar a.dropdown-toggle').on('click', function(e) {
        var $el = $(this);
        var $parent = $(this).offsetParent(".dropdown-menu");
        $(this).parent("li").toggleClass('open');

        if(!$parent.parent().hasClass('nav')) {
            $el.next().css({"top": $el[0].offsetTop, "left": $parent.outerWidth() - 4});
        }
        $('.nav li.open').not($(this).parents("li")).removeClass("open");
        return false;
    });

    // scroll menu
    if($(this).scrollTop() >= $('.wpmn').offset().top){
        $('#main-menu').addClass('truot');
    }else{
        $('#main-menu').removeClass('truot');
    }
    $(window).scroll(function(){
        if($(this).scrollTop() >=$('.wpmn').offset().top){
            $('#main-menu').addClass('truot');
        }else{
            $('#main-menu').removeClass('truot');
        }
    });

});

// function clearMenus() {
//     $(backdrop).remove()
//     $(toggle).each(function (e) {
//       var $parent = getParent($(this))
//       if (!$parent.hasClass('open')) return
//       $parent.trigger(e = $.Event('hide.bs.dropdown'))
//       if (e.isDefaultPrevented()) return
//       // Remove the following line of code for support of multi-level menus
//       //$parent.removeClass('open').trigger('hidden.bs.dropdown')
//     });
// }

// function clearAllMenus() {
//     $(backdrop).remove()
//     $(toggle).each(function (e) {
//       var $parent = getParent($(this))
//       if (!$parent.hasClass('open')) return
//       $parent.trigger(e = $.Event('hide.bs.dropdown'))
//       if (e.isDefaultPrevented()) return
//       $parent.removeClass('open').trigger('hidden.bs.dropdown')
//     });
// }
(function () {
    var previousScroll = 0;
    wf = $(window).width();
    var currentScroll = $(this).scrollTop();
   if (currentScroll > previousScroll){
        if(currentScroll >=120 && previousScroll < 120){
            $('.home .dichvu').slideUp(500);
        }
   } else {
        if(currentScroll <=120 && previousScroll > 120){
            $('.home .dichvu').slideDown(500);
        }
   }
    $(window).scroll(function(){
       var currentScroll = $(this).scrollTop();
       if (currentScroll > previousScroll){
            if(currentScroll >=120 && previousScroll < 120){
                $('.home .dichvu').slideUp(500);
            }
       } else {
            if(currentScroll <=120 && previousScroll > 120){
                $('.home .dichvu').slideDown(500);
            }
       }
       previousScroll = currentScroll;
    });
}());