
$(".top-section").addClass("show-section");

/**/

$(".item-photo").click(function() {
    $(".popup-container").addClass("popup-show");
    $(".popup-container").focus();
    $("body, html").css("overflow", "hidden");
    var itemInfo = $(this).children(".popup-description").html();
    $(".popup-past-description")[0].innerHTML = itemInfo;
});

$(".close-popup").click(function() {
    $(".popup-container").removeClass("popup-show");
    $("body, html").css("overflow", "normal");
});

$(".loader-img").addClass("loader-none");