function flyFormContact() {
    var winX = document.documentElement.clientWidth;
    var winY = document.documentElement.clientHeight;
    var serBlockPosit = document.getElementById("services").getBoundingClientRect().top;
    var wcBlockBtn = document.getElementById("wc-button").getBoundingClientRect().top;
    var contactBlockPosit = document.getElementById("form-sector").getBoundingClientRect().top;
    var fbgBlockBtnPosit = (document.documentElement.clientHeight / 2) - 150;
    $(".fly-button-great").css("top", fbgBlockBtnPosit + "px");
    $(".fly-form-container").css("top", fbgBlockBtnPosit + "px");
    if ( serBlockPosit < wcBlockBtn ) {
        $(".fly-button-great").addClass("fbg-visible");
        $(".fly-button-great").removeClass("fbg-hidden");
    } else {
        if ( winX > 1150 ) {
            ffcHidden();
        } else {
            var latBtnPosit = document.getElementById("wc-button").getBoundingClientRect().top;
            if ( latBtnPosit < 0 ) {
                $(".fly-button-great").addClass("fbg-visible");
            } else {
                ffcHidden();
            }
        }
    }
    if ( contactBlockPosit < winY ) {
        ffcHidden();
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