function flyFormContact() {
    var winX = document.documentElement.clientWidth;
    var winY = document.documentElement.clientHeight;
    var fbgBlockBtnPosit = (document.documentElement.clientHeight / 2) - 150;
    $(".fly-button-great").css("top", fbgBlockBtnPosit + "px");
    $(".fly-form-container").css("top", fbgBlockBtnPosit + "px");
    $(".fly-button-great").addClass("fbg-visible");
    $(".fly-button-great").removeClass("fbg-hidden");
    if ( winX < 740 ) {
        $(".fly-button-great").removeClass("fbg-visible");
        $(".fly-button-great").removeClass("fbg-hidden");
        $(".fly-form-container").removeClass("fly-rotate-show");
        $(".fly-form-container").removeClass("fly-rotate-hide");
    } else {
        $(".fly-button-great").addClass("fbg-visible");
        $(".fly-button-great").removeClass("fbg-hidden");
        $(".fly-button-great").removeClass("fbg-rotate");
    }
}
function ffcHidden() {
    if ( $(".fly-button-great").hasClass("fbg-visible") ) {
        $(".fly-button-great").removeClass("fbg-visible");
        $(".fly-button-great").addClass("fbg-hidden");
        $(".fly-button-great").removeClass("fbg-rotate");
        $(".fly-form-container").removeClass("fly-rotate-show");
    }
}
$(".fly-button-great").click(function() {
    $(this).addClass("fbg-rotate");
    $(".fly-form-container").addClass("fly-rotate-show");
});
$(".ffc-btn-close").click(function() {
    setTimeout(function() { $(".fly-button-great").removeClass("fbg-rotate"); }, 600);
    $(".fly-form-container").addClass("fly-rotate-hide");
    setTimeout(function() {
        $(".fly-form-container").removeClass("fly-rotate-hide");
        $(".fly-form-container").removeClass("fly-rotate-show");
    }, 1000);
});
flyFormContact();