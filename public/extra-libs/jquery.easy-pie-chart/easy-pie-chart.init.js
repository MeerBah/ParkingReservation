! function($) {
    "use strict";

    var EasyPieChart = function() {};

    EasyPieChart.prototype.init = function() {
            //initializing various types of easy pie charts
            $('.easy-pie-chart-1').easyPieChart({
                easing: 'easeOutBounce',
                barColor: '#40c4ff',
                lineWidth: 3,
                animate: 1000,
                lineCap: 'square',
                trackColor: '#e5e5e5',
                onStep: function(from, to, percent) {
                    $(this.el).find('.percent').text(Math.round(percent));
                }
            });
            $('.easy-pie-chart-2').easyPieChart({
                easing: 'easeOutBounce',
                barColor: '#55ce63',
                lineWidth: 3,
                trackColor: false,
                lineCap: 'butt',
                onStep: function(from, to, percent) {
                    $(this.el).find('.percent').text(Math.round(percent));
                }
            });
            $('.easy-pie-chart-3').easyPieChart({
                easing: 'easeOutBounce',
                barColor: '#2961ff',
                lineWidth: 3,
                lineCap: 'square',
                trackColor: false,
                onStep: function(from, to, percent) {
                    $(this.el).find('.percent').text(Math.round(percent));
                }
            });
            $('.easy-pie-chart-4').easyPieChart({
                easing: 'easeOutBounce',
                barColor: '#40c4ff',
                lineWidth: 3,
                scaleColor: false,
                onStep: function(from, to, percent) {
                    $(this.el).find('.percent').text(Math.round(percent));
                }
            });
            $('.easy-pie-chart-5').easyPieChart({
                easing: 'easeOutBounce',
                barColor: '#55ce63',
                lineWidth: 3,
                scaleColor: false,
                onStep: function(from, to, percent) {
                    $(this.el).find('.percent').text(Math.round(percent));
                }
            });
            $('.easy-pie-chart-6').easyPieChart({
                easing: 'easeOutBounce',
                barColor: '#2961ff',
                lineWidth: 3,
                scaleColor: false,
                onStep: function(from, to, percent) {
                    $(this.el).find('.percent').text(Math.round(percent));
                }
            });
        },
        //init
        $.EasyPieChart = new EasyPieChart, $.EasyPieChart.Constructor = EasyPieChart
}(window.jQuery),

//initializing
function($) {
    "use strict";
    $.EasyPieChart.init()
}(window.jQuery);