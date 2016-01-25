
function itemVisible() {
    setTimeout(function() { $(".s-1").addClass("item-visible"); }, 0);
    setTimeout(function() { $(".s-2").addClass("item-visible"); }, 300);
    setTimeout(function() { $(".s-3").addClass("item-visible"); }, 600);
    setTimeout(function() { $(".s-4").addClass("item-visible"); }, 900);
    setTimeout(function() { $(".s-5").addClass("item-visible"); }, 1200);
    setTimeout(function() { $(".s-6").addClass("item-visible"); }, 1500);
}
itemVisible();

$("a[href^='#']").click( function(){
    var itemPosition = $(this).attr("href");
    var yTop = 60;
    $(this).next().toggle("normal");
    $("html, body").animate({ scrollTop: $(itemPosition).offset().top - yTop }, 500);
    return false;
});

$(".wt-btn-ser").click(function() {
    $(".popup-container").addClass("popup-show");
    $(".popup-container").focus();
    $("body, html").css("overflow", "hidden");
});
$(".close-popup").click(function() {
    $(".popup-container").removeClass("popup-show");
    $("body, html").css("overflow", "normal");
});

$(".loader-img").addClass("loader-none");