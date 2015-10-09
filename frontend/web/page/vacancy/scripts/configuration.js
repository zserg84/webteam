
$(".top-section").addClass("show-section");

setTimeout(function() { $(".vacancy-content").addClass("show-content"); }, 400);

$(".item-vacancy").click(function() {
    var vacancy = $(this).data('vacancy');

    $(".popup-container").addClass("popup-show");
    $(".popup-container").focus();

    $('#hiddenVacancy').val(vacancy);
    var vacancyInfo = $(this).children(".hidden-vacancy-content").html();
    $(".popup-past-description")[0].innerHTML = vacancyInfo;
});
$(".close-popup").click(function() {
    $(".popup-container").removeClass("popup-show");
});

$(".loader-img").addClass("loader-none");