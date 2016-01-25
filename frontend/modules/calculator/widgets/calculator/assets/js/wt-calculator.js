
$(document).ready(function(){
    $(".swc-5-price-content").tinyscrollbar({ axis: 'y' });
    $(".swc-6-price-content").tinyscrollbar({ axis: 'y' });
    $(".swc-9-price-content").tinyscrollbar({ axis: 'y' });

    scrollPane();
});

function scrollPane(){
    $('.swc-14-price-content').jScrollPane({
        autoReinitialise: true,
        autoReinitialiseDelay: 500
    });
}


function visibleCalculator() {
    var winX = document.documentElement.clientWidth;
    if ( winX < 760 ) { $(".calc-close").click(); }
}

$("body").on("click", ".tb-btn-calc", function(){
    $(".calculator-container").addClass("calc-show");
    $("body").css("overflow", "hidden");

    $(".sw-container").addClass("content-activate");

});

$("body").on("click", ".calc-close", function() {
    $(".calculator-container").removeClass("calc-show");
    $("body").css("overflow", "visible");

    $(".sw-container").each(function() {
        $(this).removeClass("content-activate");
        $(this).removeClass("win-conversion");
    });
    //$(".substrate-window").removeClass("max-width-window");

});


/* scroll contents update (win-5 и win-9) */
$("body").on("click", ".item-btn-arrow", function() {
    $(this).parent().children(".item-sub-content").toggle(500);

    var windScroll = $(this).data("scroll-window");

    if ( windScroll == 5 ) {
        setTimeout(function () {
            $(".swc-5-price-content").tinyscrollbar().data().plugin_tinyscrollbar.update('relative');
        }, 600);
    }
    if ( windScroll == 9 ) {
        setTimeout(function () {
            $(".swc-9-price-content").tinyscrollbar().data().plugin_tinyscrollbar.update('relative');
        }, 600);
    }

    if ( $(this).hasClass("item-show") ) {
        $(this).removeClass("item-show");
    } else {
        $(this).addClass("item-show");
    }
});
/*/scroll contents update (win-5 и win-9)/*/


/* back */
$("body").on("click", ".btn-back-block", function() {

    var wBack = $(this).data("winback");
	
	overlapping();

    switch (wBack) {

        case 2:

            $(".swc-win-2").removeClass("content-activate");

            $(".swc-win-1").addClass("content-activate");

            break;

        case 3:

            $(".swc-win-3").removeClass("content-activate");

            $(".swc-win-1").addClass("content-activate");

            break;

        case 4:

            $(".swc-win-4").removeClass("content-activate");

            $(".swc-win-1").addClass("content-activate");

            break;

        case 5:

            $(".swc-win-5").removeClass("content-activate");

            $(".swc-win-2").addClass("content-activate");

            break;

        case 6:

            $(".swc-win-6").removeClass("content-activate");

            $(".swc-win-2").addClass("content-activate");

            break;

        case 7:

            $(".swc-win-7").removeClass("content-activate");

            $(".swc-win-3").addClass("content-activate");

            break;

        case 8:

            $(".swc-win-8").removeClass("content-activate");

            $(".swc-win-3").addClass("content-activate");

            break;

        case 9:

            $(".swc-win-9").removeClass("content-activate");

            $(".swc-win-3").addClass("content-activate");

            break;

        case 10:

            $(".swc-win-10").removeClass("content-activate");

            $(".swc-win-3").addClass("content-activate");

            break;

        case 11:

            $(".swc-win-11").removeClass("content-activate");

            $(".swc-win-3").addClass("content-activate");

            break;

        case 12:

            $(".swc-win-12").removeClass("content-activate");

            $(".swc-win-11").addClass("content-activate");

            break;

        case 13:

            $(".swc-win-13").removeClass("content-activate");

            $(".swc-win-12").addClass("content-activate");

            break;

        case 14:

            $(".swc-win-14").removeClass("content-activate");

            setTimeout(function() {
                $(".substrate-window").removeClass("max-width-window");
            }, 500);
            setTimeout(function() {
                $(".swc-win-10").addClass("content-activate");
            }, 1000);

            break;

    }

});
/*/back/*/

/*поверхностное перекрытие окна для предотвращения лишних кликов по другим элементам во время перехода окна*/
function overlapping() {
	$(".window-overlapping").css("display", "block");
	setTimeout(function() { $(".window-overlapping").css("display", "none"); }, 1000);
}
/*/поверхностное перекрытие.../*/

$("body").on("click", ".swc-item", function() {
    if($(this).hasClass("btn-disable"))
        return;
    var next = $(this).data("next");
    var page = $(this).data("page");
    var data = $(this).data("data");
    $.pjax.reload("#pjax-calculator-container", {
        type: 'GET',
        data: {calculator_type: next, page: page, data:data},
        push: false,
        replace: false
    });
});
$("body").on("click", ".btn-back-block", function() {
    if($(this).hasClass("btn-disable"))
        return;
    var prev = $(this).data("prev");
    $.pjax.reload("#pjax-calculator-container", {
        type: 'GET',
        data: {calculator_type: prev},
        push: false,
        replace: false
    });
});
$("#pjax-calculator-container").on('pjax:end', function() {
    setTimeout(function() {
        $(".sw-container").addClass("content-activate");
    }, 500);
})
/*$("body").on("click", ".swc-1-item", function() {
	
	overlapping();

    var dCase = $(this).data("case");

    $(this).addClass("swc-1-item-conversion");

    $(".swc-win-1").addClass("win-conversion");

    setTimeout(function() {
        $(".swc-1-item").each(function() {
            $(this).removeClass("swc-1-item-conversion");
            $(".swc-win-1").removeClass("content-activate");
            $(".swc-win-1").removeClass("win-conversion");
        });
    }, 500);
    switch (dCase) {

        case 1:

            setTimeout(function() {
                $(".swc-win-2").addClass("content-activate");
            }, 500);

            break;

        case 2:

            setTimeout(function() {
                $(".swc-win-3").addClass("content-activate");
            }, 500);

            break;

        case 3:

            setTimeout(function() {
                $(".swc-win-4").addClass("content-activate");
            }, 500);

            break;

    }
});*/

$("body").on("click", ".swc-2-item", function() {
	
	overlapping();

    var dCase = $(this).data("case");

    $(this).addClass("swc-2-item-conversion");

    setTimeout(function() {
        $(".swc-2-item").each(function() {
            $(this).removeClass("swc-2-item-conversion");
            $(".swc-win-2").removeClass("content-activate");
        });
    }, 500);
    switch (dCase) {

        case 1:

            setTimeout(function() {
                $(".swc-win-5").addClass("content-activate");
            }, 500);

            break;

        case 2:

            setTimeout(function() {
                $(".swc-win-6").addClass("content-activate");
            }, 500);

            break;

    }


});

/*$("body").on("click", ".swc-3-item", function() {
	
	overlapping();

    var dCase = $(this).data("case");

    $(this).addClass("swc-3-item-conversion");

    setTimeout(function() {
        $(".swc-3-item").each(function() {
            $(this).removeClass("swc-3-item-conversion");
            $(".swc-win-3").removeClass("content-activate");
        });
    }, 500);
    switch (dCase) {

        case 1:

            setTimeout(function() {
                $(".swc-win-7").addClass("content-activate");
            }, 500);

            break;

        case 2:

            setTimeout(function() {
                $(".swc-win-8").addClass("content-activate");
            }, 500);

            break;

        case 3:

            setTimeout(function() {
                $(".swc-win-9").addClass("content-activate");
            }, 500);

            break;

        case 4:

            setTimeout(function() {
                $(".swc-win-10").addClass("content-activate");
            }, 500);

            break;

        case 5:

            setTimeout(function() {
                $(".swc-win-11").addClass("content-activate");
            }, 500);

            break;

    }

});*/

/**/

$("body").on("click", ".swc-10-button", function() {

    if ( $(this).hasClass("win-moving14") ) {
		
		overlapping();

        $(".swc-win-10").removeClass("content-activate");

        setTimeout(function () {
            $(".substrate-window").addClass("max-width-window");
        }, 500);
        setTimeout(function () {
            $(".swc-win-14").addClass("content-activate");
        }, 1000);

    }

});

$("body").on("click", ".swc-11-button", function() {

    if ( $(this).hasClass("btn-disable") == false ) {
		
		overlapping();

        $(".swc-win-11").removeClass("content-activate");

        setTimeout(function () {
            $(".swc-win-12").addClass("content-activate");
        }, 500);

    }

});

$("body").on("click", ".swc-12-button", function() {

    if ( $(this).hasClass("win-moving14") ) {
		
		overlapping();

        $(".swc-win-12").removeClass("content-activate");

        setTimeout(function () {
            $(".substrate-window").addClass("max-width-window");
        }, 500);
        setTimeout(function () {
            $(".swc-win-14").addClass("content-activate");
        }, 1000);

    }

});

function winMoving(winFrom, winTo) {

    var winFadeFrom = $(".swc-win-"+winFrom);
    var winShowTo = $(".swc-win-"+winTo);
	
	overlapping();

    winFadeFrom.removeClass("content-activate");
    setTimeout(function() {
        winShowTo.addClass("content-activate");
    }, 500);

    if ( winFrom == 14 ) {
        setTimeout(function() {
            $(".substrate-window").removeClass("max-width-window");
        }, 500);
    }
}


/*win6*/
$("body").on("click", ".qty-max", function() {
    var qty = parseInt( $(this).parent().children(".desk-qty").text() ) + 1;
    $(this).parent().children(".desk-qty").text(qty);
});
$("body").on("click", ".qty-min", function() {
    var qty = parseInt( $(this).parent().children(".desk-qty").text() ) - 1;
    if ( qty < 0 ) { qty = 0; }
    $(this).parent().children(".desk-qty").text(qty);
});
/*/win6/*/

/*win11*/
$("body").on("click", ".sd-check-block", function() {
    var check = 0;
    var qtyInput = 0;
    $(this).parent().parent().parent().children("li").children(".social-description").children(".sd-check-block").children("input").each(function() { qtyInput = parseInt(qtyInput) + 1; });
    $(this).parent().parent().parent().children("li").children(".social-description").children(".sd-check-block").children("input").each(function() {
        if ( $(this).prop("checked") ) {
            check = parseInt(check) + 1;
        } else {
            check = parseInt(check) - 1;
        }
    });
    if ( check == qtyInput ) { $(".swc-11-button").removeClass("btn-disable"); } else { $(".swc-11-button").addClass("btn-disable"); }
});
/*/win11/*/

/*win14*/
$("body").on("click", ".t-count-btn-max", function() {
    var qty = parseInt( $(this).parent().children(".t-count-qty").text() ) + 1;
    $(this).parent().children(".t-count-qty").text(qty);
});
$("body").on("click", ".t-count-btn-min", function() {
    var qty = parseInt( $(this).parent().children(".t-count-qty").text() ) - 1;
    if ( qty < 0 ) { qty = 0; }
    $(this).parent().children(".t-count-qty").text(qty);
});
/*/win14/*/

/**/

$(window).resize(function() {

    $('.jspPane').css({ left : "0" });

    visibleCalculator();

});