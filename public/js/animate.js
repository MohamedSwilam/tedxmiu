export default function animate(selector, speed) {
    var services = $(selector);
    if (services.length > 0) {
        services.waypoint(
            function(direction) {
                if (
                    direction === "down" &&
                    !$(this.element).hasClass("animated")
                ) {
                    var sec = services.find(".to-animate").length,
                        sec = parseInt(sec * 200 + 400);

                    setTimeout(function() {
                        services.find(".to-animate").each(function(k) {
                            var el = $(this);

                            setTimeout(
                                function() {
                                    el.addClass("fadeInUp animated"); //bounceIn
                                },
                                k * 200,
                                "easeInOutExpo"
                            );
                        });
                    }, speed);

                    setTimeout(function() {
                        services.find(".to-animate2").each(function(k) {
                            var el = $(this);

                            setTimeout(
                                function() {
                                    el.addClass("bounceIn animated"); //bounceIn
                                },
                                k * 200,
                                "easeInOutExpo"
                            );
                        });
                    }, sec);

                    $(this.element).addClass("animated");
                }
            },
            { offset: "80%" }
        );
    }
}
