(function () {
        var $window = $(window).flexslider();
        function getWindowSize() {
            var winX = document.documentElement.clientWidth;
            return winX;
        }
        function getGridSize() {
            var winX = getWindowSize();
            return (winX < 700) ? 1 : (winX < 780) ? 1 : 1;
        }
        function getGridSizePortfolio() {
            var winX = getWindowSize();
            return (winX < 750) ? 1 : (winX < 1150) ? 2 : 2;
        }
        $window.load(function () {
            $('.comment-container').flexslider({
                randomize: false,
                animation: "slide",
                animationSpeed: 600,
                slideshowSpeed: 4000,
                animationLoop: true,
                itemWidth: 126,
                itemMargin: 0,
                controlNav: false,
                move: 1,
                minItems: getGridSize(),
                maxItems: getGridSize(),
                start: function (slider) {
                    $('body').removeClass('loading');
                    flexsliderComment = slider;
                }
            });
            $('.portfolio-slides').flexslider({
                randomize: false,
                animation: "slide",
                animationSpeed: 600,
                slideshowSpeed: 4000,
                animationLoop: true,
                itemWidth: 126,
                itemMargin: 0,
                directionNav: false,
                controlNav: true,
                move: 1,
                minItems: getGridSizePortfolio(),
                maxItems: getGridSizePortfolio(),
                start: function (slider) {
                    $('body').removeClass('loading');
                    flexsliderPortfolio = slider;
                }
            });
        });
        $window.resize(function () {
            var gridSize = getGridSize();
            flexsliderComment.vars.minItems = gridSize;
            flexsliderComment.vars.maxItems = gridSize;
            flexsliderComment.update();
            flexsliderComment.slides.width(flexsliderComment.computedW);
            if(flexsliderComment.last < flexsliderComment.slides.length - 1){
                flexsliderComment.flexAnimate(0);
            }
            var gridSizePortfolio = getGridSizePortfolio();
            flexsliderPortfolio.vars.minItems = gridSizePortfolio;
            flexsliderPortfolio.vars.maxItems = gridSizePortfolio;
            flexsliderPortfolio.update();
            flexsliderPortfolio.slides.width(flexsliderPortfolio.computedW);
            if(flexsliderPortfolio.last < flexsliderPortfolio.slides.length - 1){
                flexsliderPortfolio.flexAnimate(0);
            }
        });
}());
