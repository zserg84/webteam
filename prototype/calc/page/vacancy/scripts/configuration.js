
$(".top-section").addClass("show-section");

setTimeout(function() { $(".vacancy-content").addClass("show-content"); }, 400);

$(".item-vacancy").click(function() {
    $(".popup-container").addClass("popup-show");
    $(".popup-container").focus();
    $("body, html").css("overflow", "hidden");
    var vacancyInfo = $(this).children(".hidden-vacancy-content").html();
    $(".popup-past-description")[0].innerHTML = vacancyInfo;
});
$(".close-popup").click(function() {
    $(".popup-container").removeClass("popup-show");
    $("body, html").css("overflow", "normal");
});

$(".loader-img").addClass("loader-none");