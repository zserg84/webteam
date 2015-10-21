
function itemVisible() {
    setTimeout(function() { $(".s-1").addClass("item-visible"); }, 0);
    setTimeout(function() { $(".s-2").addClass("item-visible"); }, 300);
    setTimeout(function() { $(".s-3").addClass("item-visible"); }, 600);
    setTimeout(function() { $(".s-4").addClass("item-visible"); }, 900);
    setTimeout(function() { $(".s-5").addClass("item-visible"); }, 1200);
    setTimeout(function() { $(".s-6").addClass("item-visible"); }, 1500);
}
itemVisible();

var anc = window.location.hash.replace("#","");
if(anc)
    slice($('#'+anc));

function slice(el){
    var itemPosition = $(el).attr("href");
    if (typeof itemPosition == 'undefined') return;
    var yTop = 60;
    $(el).next().toggle("normal");
    $("html, body").animate({ scrollTop: $(itemPosition).offset().top - yTop }, 500);
}

$("a[href^='#']").click( function(){
    slice(this);
    return false;
});

$(".wt-btn-ser").click(function() {
    var service = $(this).data('service');
    $('#hiddenService').val(service);
    $(".popup-container").addClass("popup-show");
    $(".popup-container").focus();
    //$("body, html").css("overflow", "hidden");
});
$(document).on("click", ".close-popup", function() {
    $(".popup-container").removeClass("popup-show");
    //$("body, html").css("overflow", "normal");
});

$(".loader-img").addClass("loader-none");