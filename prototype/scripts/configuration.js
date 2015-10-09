
/* menu navigate effect */
$(document).mousemove(function (e){
    var mcBox = $(".menu-cell");
    if (!mcBox.is(e.target) && mcBox.has(e.target).length === 0) {
        $(".nav-item-underline").removeClass("m-hover");
        setTimeout(function () { $(".nav-item-underline").css({ width: "54px" }); }, 300);
    }
});
$(".menu-cell").mouseenter(function() {
    setTimeout(function () {
        $(".nav-item-underline").addClass("m-hover");
    }, 300);
});
$(".nav-item").mouseenter(function() {
    var itemPos = $(this).position();
    var itemSize = $(this).innerWidth();
    $(".nav-item-underline").css({ left : itemPos.left + "px" });
    if ( $(".nav-item-underline").hasClass("m-hover") ) {
        $(".nav-item-underline").css({ width: itemSize + "px" });
    } else {
        setTimeout(function () {
            $(".nav-item-underline").css({ width: itemSize + "px" });
        }, 300);
    }
});
/*/menu navigate effect/*/

/* language effect block */
$(document).mousedown(function (e){
    var langBox = $(".tb-lang-list");
    if (!langBox.is(e.target) && langBox.has(e.target).length === 0) { langBox.removeClass("ll-show"); }
});
$(".tb-lang-block").click(function() {
    if ( $(".tb-lang-list").hasClass("ll-show") ) {
        $(".tb-lang-list").removeClass("ll-show");
    } else {
        $(".tb-lang-list").addClass("ll-show");
    }
});
/*/language effect block/*/

$("a[href^='#']").click( function(){
    var modulePosition = $(this).attr("href");
    var yTop = 60;
    $("html, body").animate({ scrollTop: $(modulePosition).offset().top - yTop }, 800);
    return false;
});

/* real container */
$(".wcr-real").click(function() {
    $(".real-container").addClass("real-show");
    $("body, html").css("overflow", "hidden");
});
$(".real-btn-close").click(function() {
    $(".real-container").removeClass("real-show");
    $("body, html").css("overflow", "visible");
});
/*/real container/*/

function resetServiceEffect() {
    $(".sc-item-icon").each(function() {
        $(this).removeClass("sc-icon-show");
    });
    $(".sc-item-name").each(function() {
        $(this).removeClass("in-show");
    });
}

function resetPortfolioEffect() {
    $(".port-upper-cell").each(function() {
        $(this).removeClass("port-show");
    });
    $(".port-lower-cell").each(function() {
        $(this).removeClass("port-show");
    });
}

function resetTeamEffect() {
    $(".team-container").each(function() {
        $(this).removeClass("team-show-effect");
    });
}

/* pursuing menu */
function pursuingMenu() {

    var winX = document.documentElement.clientWidth;
    var serviceContTop = document.getElementById("services").getBoundingClientRect().top;
    var serviceContHeight = document.getElementById("services").getBoundingClientRect().height;

    if ( serviceContTop < 70 ) {
        $("#ni-services").addClass("mn-active");
        if ( (serviceContTop + serviceContHeight) < 70 ) {
            $(".nav-item").each(function() {
                $(this).removeClass("mn-active");
            });
            $("#ni-services").removeClass("mn-active");
        }
    } else {
        $("#ni-services").removeClass("mn-active");
    }

    var portfolioContTop = document.getElementById("portfolio").getBoundingClientRect().top;
    var portfolioContHeight = document.getElementById("portfolio").getBoundingClientRect().height;

    if ( portfolioContTop < 70 ) {
        $("#ni-portfolio").addClass("mn-active");
        if ( (portfolioContTop + portfolioContHeight) < 70 ) {
            $(".nav-item").each(function() {
                $(this).removeClass("mn-active");
            });
            $("#ni-portfolio").removeClass("mn-active");
        }
    } else {
        $("#ni-portfolio").removeClass("mn-active");
    }

    var teamContTop = document.getElementById("team").getBoundingClientRect().top;
    var teamContHeight = document.getElementById("team").getBoundingClientRect().height;

    if ( teamContTop < 70 ) {
        $("#ni-team").addClass("mn-active");
        if ( (teamContTop + teamContHeight) < 70 ) {
            $(".nav-item").each(function() {
                $(this).removeClass("mn-active");
            });
            $("#ni-team").removeClass("mn-active");
        }
    } else {
        $("#ni-team").removeClass("mn-active");
    }

    var commentContTop = document.getElementById("comment").getBoundingClientRect().top;
    var commentContHeight = document.getElementById("comment").getBoundingClientRect().height;

    if ( commentContTop < 70 ) {
        $("#ni-comment").addClass("mn-active");
        if ( (commentContTop + commentContHeight) < 70 ) {
            $(".nav-item").each(function() {
                $(this).removeClass("mn-active");
            });
            $("#ni-comment").removeClass("mn-active");
        }
    } else {
        $("#ni-comment").removeClass("mn-active");
    }

    var contactsContTop = document.getElementById("contacts").getBoundingClientRect().top;
    var contactsContHeight = document.getElementById("contacts").getBoundingClientRect().height;

    if ( contactsContTop < 70 ) {
        $("#ni-contacts").addClass("mn-active");
        if ( (contactsContTop + contactsContHeight) < 70 ) {
            $(".nav-item").each(function() {
                $(this).removeClass("mn-active");
            });
            $("#ni-contacts").removeClass("mn-active");
        }
    } else {
        $("#ni-contacts").removeClass("mn-active");
    }

    if ( winX > 1150 ) {
        $(".footer-lamp-block").animate({ top: -(contactsContTop / 3) + "px" }, 0, "linear");
    } else {
        $(".footer-lamp-block").css("top", "0");
    }

}
/*/pursuing menu/*/

/* fly form contact */
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
/*/fly form contact/*/

/*var body = document.body, timer;*/

$(window).scroll(function(){

    /**/
    /*
    clearTimeout(timer);
    if(!body.classList.contains('scroll-disable-hover')) {
        body.classList.add('scroll-disable-hover')
    }

    timer = setTimeout(function(){
        body.classList.remove('scroll-disable-hover')
    },300);
    */
    /**/

    $(".tb-lang-list").removeClass("ll-show");

    var winX = document.documentElement.clientWidth;
    var scrollTop = $(window).scrollTop();


    if ( scrollTop > 1 ) {
        $(".top-bar").addClass("top-bar-move");
    } else {
        $(".top-bar").removeClass("top-bar-move");
    }

    if ( winX > 1150 ) {
        $(".welcome-container").animate({ top: -(scrollTop / 3) + "px" }, 0, "linear");
    }

    var screenCenter = (document.documentElement.clientHeight/2)+100;
    /* services */
    var serBlockPosit = document.getElementById("services").getBoundingClientRect().top;

    if ( serBlockPosit < screenCenter ) {
        $(".sc-item-icon").each(function() {
            $(this).addClass("sc-icon-show");
        });
        $(".sc-item-name").each(function() {
            $(this).addClass("in-show");
        });
    } else {
        resetServiceEffect();
    }
    /*/services/*/
    /* portfolio */
    var portBlockPosit = document.getElementById("portfolio").getBoundingClientRect().top;

    if ( portBlockPosit < screenCenter ) {
        $(".port-upper-cell").each(function() {
            $(this).addClass("port-show");
        });
        $(".port-lower-cell").each(function() {
            $(this).addClass("port-show");
        });
    } else {
        resetPortfolioEffect();
    }
    /*/portfolio/*/
    /* team */
    var teamBlockPosit = document.getElementById("team").getBoundingClientRect().top;

    if ( teamBlockPosit < screenCenter ) {
        $(".team-container").each(function() {
            $(this).addClass("team-show-effect");
        });
    } else {
        resetTeamEffect();
    }
    /*/team/*/

    pursuingMenu();

    flyFormContact();

});

$(window).resize(function(){

    $(".tb-lang-list").removeClass("ll-show");

    flyFormContact();

});

$(".loader-img").addClass("loader-none");