function scrollfade_in_up(o,a,e,s){$(window).height()<450&&(e/=4),$(window).scroll(function(){$(o).each(function(){var o=$(window).scrollTop(),t=$(this).offset().top,c=($(this).outerHeight(),$(window).outerHeight()),l=c-e,n=1+(o-t+l)/a;top_calc=s-n,$(this).css({opacity:n}),$(this).css({top:top_calc+"rem"});var i=$(this).data("section"),d=$(this).data("accent-offset");$(".accent."+i).css({opacity:n}),n>"1"?$(this).css({opacity:1}):n<"0"&&$(this).css({opacity:0}),top_calc>=s?$(this).css({top:s+"rem"}):top_calc<"0"&&$(this).css({top:0}),$(this).offset().top-$(window).scrollTop()<d?$(".accent."+i).css("opacity",0):($(".accent."+i).css("opacity",n),n>"1"?$(".accent."+i).css({opacity:1}):n<"0"&&$(".accent."+i).css({opacity:0}))})}).scroll()}$=jQuery.noConflict(),$(document).ready(function(){var o,a;a=$("#wrapper"),o=a.width(),$(window).resize(function(){a.width()!=o&&(o=a.width(),a.width())}),$("#main-nav .anchor a").click(function(){var o=$(this).attr("href");o=o.split("#")[1],o+="-scroll",$("html,body").animate({scrollTop:$("#"+o).offset().top},800)}),bg_colors=["blue","red","yellow","grey"],$("#who-scroll").waypoint(function(o){"down"===o&&($.each(bg_colors,function(o,a){$("body").removeClass(a)}),$("body").addClass("blue"),$("header a").removeClass("active"),$("header .who-nav a").addClass("active"))},{offset:"0"}),$("#who-scroll").waypoint(function(o){"up"===o&&($.each(bg_colors,function(o,a){$("body").removeClass(a)}),$("body").addClass("blue"),$("header a").removeClass("active"),$("header .who-nav a").addClass("active"))},{offset:"-25%"}),$("#where-scroll").waypoint(function(o){"down"===o&&($.each(bg_colors,function(o,a){$("body").removeClass(a)}),$("body").addClass("red"),$("header a").removeClass("active"),$("header .where-nav a").addClass("active"))},{offset:"25%"}),$("#where-scroll").waypoint(function(o){"up"===o&&($.each(bg_colors,function(o,a){$("body").removeClass(a)}),$("body").addClass("red"),$("header a").removeClass("active"),$("header .where-nav a").addClass("active"))},{offset:"-25%"}),$("#what-scroll").waypoint(function(o){"down"===o&&($.each(bg_colors,function(o,a){$("body").removeClass(a)}),$("body").addClass("yellow"),$("header a").removeClass("active"),$("header .what-nav a").addClass("active"))},{offset:"25%"}),$("#what-scroll").waypoint(function(o){"up"===o&&($.each(bg_colors,function(o,a){$("body").removeClass(a)}),$("body").addClass("yellow"),$("header a").removeClass("active"),$("header .what-nav a").addClass("active"))},{offset:"-25%"}),$("#contact-scroll").waypoint(function(o){"down"===o&&($.each(bg_colors,function(o,a){$("body").removeClass(a)}),$("body").addClass("grey"),$("header a").removeClass("active"),$("header .contact-nav a").addClass("active"))},{offset:"25%"}),$("#contact-scroll").waypoint(function(o){"up"===o&&($.each(bg_colors,function(o,a){$("body").removeClass(a)}),$("body").addClass("grey"),$("header a").removeClass("active"),$("header .contact-nav a").addClass("active"))},{offset:"-25%"}),scrollfade_in_up($(".fade-in-out-scroll"),100,300,2.5),setTimeout(function(){$(".fade-in-load").css("opacity",1)},600)}),$(window).load(function(){if(document.location.href.split("#")[1]){var o=document.location.href.split("#")[1];o="#"+o+"-scroll",$("html,body").animate({scrollTop:$(o).offset().top},800)}});