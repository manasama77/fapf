! function(e) {
    e.slickSlider = function(t) {
        let i = {
            options: e.extend({
                animated: !0,
                duration: 500,
                direction: "left",
                trigger: ""
            }, t),
            dataConfig: function(e) {
                return {
                    dot: e.data("slider-dot") || !1,
                    arrows: e.data("slider-arrows") || !1,
                    row: e.data("slider-row") || 1
                }
            },
            arrowConfig: function() {
                const t = e(".js-arrow-slider-next"),
                    i = e(".js-arrow-slider-prev"),
                    s = function(t, i) {
                        document.querySelector(t + " .slick-current") && document.querySelector(t + " .slick-current").nextSibling && document.querySelector(t + " .slick-current").nextSibling.nextSibling ? e(i).removeClass("slick-disabled") : e(i).addClass("slick-disabled")
                    },
                    o = function(t, i) {
                        document.querySelector(t + " .slick-current") && document.querySelector(t + " .slick-current").previousSibling ? e(i).removeClass("slick-disabled") : e(i).addClass("slick-disabled")
                    };
                t.on("click", (function() {
                    let t = e(this).data("slider-next");
                    e(t).slick("slickNext"), s(t, this), o(t, e(this).siblings())
                })), i.on("click", (function() {
                    let t = e(this).data("slider-prev");
                    e(t).slick("slickPrev"), s(t, e(this).siblings()), o(t, this)
                }))
            },
            heroSLider: function() {
                let t = i.options.trigger,
                    s = i.dataConfig(e(t));
                e(t).children().length > 1 && e(t).slick({
                    autoplay: !0,
                    autoplaySpeed: 4e3,
                    infinite: !0,
                    arrows: s.arrows,
                    dots: s.dot,
                    fade: !0,
                    cssEase: "linear",
                    prevArrow: '<button type="button" class="slick-prev"></button>',
                    nextArrow: '<button type="button" class="slick-next"></button>'
                })
            },
            thumbnailSLider: function() {
                let t = i.options.trigger,
                    s = i.dataConfig(e(t));
                e(t).children().length > 1 && e(t).slick({
                    autoplaySpeed: 4e3,
                    infinite: !0,
                    dots: s.dot,
                    slidesToScroll: 1,
                    prevArrow: '<button type="button" class="slick-prev"></button>',
                    nextArrow: '<button type="button" class="slick-next"></button>',
                    responsive: [{
                        breakpoint: 768,
                        settings: {
                            arrows: !1,
                            slidesToShow: 1,
                            infinite: !1
                        }
                    }]
                })
            },
            horizontalSlider: function() {
                let t = i.options.trigger,
                    s = i.dataConfig(e(t));
                e(t).children().length > 1 && e(t).slick({
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    dots: s.dot,
                    infinite: !1,
                    arrows: !1,
                    centerPadding: "0",
                    responsive: [{
                        breakpoint: 768,
                        settings: {
                            dots: !0,
                            arrows: !1,
                            slidesToShow: 1
                        }
                    }]
                }), i.arrowConfig()
            },
            mobileSlider: function() {
                let t = i.options.trigger;
                i.dataConfig(e(t)), e(t).slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    mobileFirst: !0,
                    dots: !0,
                    infinite: !1,
                    arrows: !1,
                    asNavFor: "",
                    responsive: [{
                        breakpoint: 767,
                        settings: "unslick"
                    }]
                })
            }
        };
        return {
            hero: i.heroSLider,
            thumbnail: i.thumbnailSLider,
            horizontal: i.horizontalSlider,
            mobile: i.mobileSlider
        }
    }, e(".js-side-menu").length && e(".js-side-menu").on("click", (function() {
        let t = e(this).data("target");
        e("#" + t).hasClass("active") ? e("#" + t).removeClass("active") : e("#" + t).addClass("active")
    })), e("[data-toggle]").length && e("[data-toggle]").on("click", (function() {
        let t = e(this).data("toggle"),
            i = e(this).data("toggle-disactive");
        i ? (e(i).removeClass("active"), e(t).toggleClass("active")) : e(t).toggleClass("active")
    })), e(".js-file-upload").length && e(".js-file-upload").on("change", (function() {
        let t = e(this).data("target"),
            i = e(this).val().split("\\").pop();
        e(t).val(i), e("#" + t).length && e("#" + t).val(i)
    })), e("[data-form-captcha]").submit((function(t) {
        var i = grecaptcha.getResponse();
        i && e(this).find('input[name="captcha"]').val(i), e(this).parsley().validate(), e(this).parsley().isValid() && e(this).find('button[type="submit"]').text("Please wait...")
    })), window.Parsley.addValidator("maxFileSize", {
        validateString: function(e, t, i) {
            if (!window.FormData) return console.log("error"), !0;
            var s = i.$element[0].files,
                o = 1e6 * t;
            return console.log(o), 1 != s.length || s[0].size <= o
        },
        requirementType: "integer",
        messages: {
            en: "This file should not be larger than %s Kb",
            id: "FIle tidak boleh lebih besar dari %s Kb"
        }
    });
    const t = new LazyLoad({
        elements_selector: ".lazy"
    });
    t && t.update()
}(jQuery);