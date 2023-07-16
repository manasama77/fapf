! function(t) {
    if (t.slickSlider({
            trigger: ".js-slider-banner"
        }).hero(), t.slickSlider({
            trigger: ".js-slider-banner-thumbnail"
        }).thumbnail(), t.slickSlider({
            trigger: ".js-slider-banner-horizontal"
        }).horizontal(), t.slickSlider({
            trigger: ".js-slider-mobile"
        }).mobile(), t(".js-switch-filter").length && t(".js-switch-filter").on("click", (function() {
            let l = t(this).data("target");
            t("#" + l).hasClass("active") ? (t("#" + l).removeClass("active"), t(this).removeClass("active")) : (t("#" + l).addClass("active"), t(this).addClass("active")), t("#" + l + "-mobile").hasClass("show") ? t("#" + l + "-mobile").removeClass("show") : t("#" + l + "-mobile").addClass("show")
        })), t(".js-ok-filter").length && t(".js-ok-filter").on("click", (function() {
            let l = t(this).data("target");
            t("#" + l).hasClass("active") ? (t("#" + l).removeClass("active"), t(".js-switch-filter").removeClass("active")) : (t("#" + l).addClass("active"), t(".js-switch-filter").addClass("active")), t("#" + l + "-mobile").hasClass("show") ? (t("#" + l + "-mobile").removeClass("show"), t(".js-switch-filter").removeClass("active")) : (t("#" + l + "-mobile").addClass("show"), t(".js-switch-filter").addClass("active"))
        })), t(".js-load-more-blog").length && t(".js-data-blog-common").length && t(".js-load-more-blog").bind("click", (function() {
            let l = t(this).data("target"),
                e = t(".js-data-blog-common"),
                i = parseInt(e.attr("data-current-page")),
                s = e.data("endpont"),
                a = e.data("total-page"),
                o = i + 1;
            i < a && t.ajax({
                url: s + "?page=" + o,
                type: "GET",
                dataType: "json",
                cache: !1,
                headers: {
                    "Access-Control-Allow-Origin": "*"
                },
                beforeSend: function() {
                    t(".js-load-more-blog button").attr("disabled", "disabled").html("WAIT ...")
                },
                success: function(i) {
                    i.item.length && (t(l).append(i.item), e.attr("data-current-page", o), i.has_next_page ? t(".js-load-more-blog button").removeAttr("disabled").html("LOAD MORE") : t(".js-load-more-blog").empty())
                },
                error: function(l, e, i) {
                    t(".js-load-more-blog button").removeAttr("disabled").html("LOAD MORE")
                }
            })
        })), t(".js-dropdown").length && t(".c-dropdown__list").length) {
        const l = t(".js-dropdown"),
            e = t(".c-dropdown__list");
        t(document).mouseup((function(t) {
            l.is(t.target) || 0 !== e.has(t.target).length || l.siblings(".c-dropdown__list").removeClass("active")
        })), l.on("click", (l => {
            t(l.target).siblings(".c-dropdown__list").toggleClass("active")
        }))
    }
    if (t(".js-target-filter").length && t("#js-form-filter").length && t(".js-target-filter").bind("click", (function() {
            let l = t(this).data("target"),
                e = t(this).data("value"),
                i = t("#js-form-filter #val-" + l).val();
            if ("country" === l && "all" == e) t("#js-form-filter #val-country, #js-form-filter #val-city").val(""), t("#js-form-filter").submit();
            else if (e !== i) {
                let i = t("#js-form-filter #val-country").val(),
                    s = t("#js-form-filter #val-city").val();
                "country" === l && e != i && s.length > 1 ? (t("#js-form-filter #val-" + l).val(e), t("#js-form-filter #val-city").val("")) : t("#js-form-filter #val-" + l).val(e), t("#js-form-filter").submit()
            }
        })), (t("#js-filter-desktop").length || t("#js-filter-mobile").length) && "undefined" != typeof dataLocations && "undefined" != typeof titleAllCities && "undefined" != typeof titleAllCoutries) {
        let l = '<li class="list-item js-item-country" id="list-item-country-all" data-target="country" data-value="all" data-title="' + titleAllCoutries + '"><a href="javascript:;">' + titleAllCoutries + "</a></li>",
            e = '<li class="list-item js-item-city" id="list-item-city-all" data-target="city" data-value="all" data-title="' + titleAllCities + '"><a href="javascript:;">' + titleAllCities + "</a></li>";
        t.each(dataLocations, (function(t, e) {
            l += '<li class="list-item js-item-country" id="list-item-country-' + e.slug + '" data-target="country" data-value="' + e.slug + '" data-title="' + e.name + '"><a href="javascript:;">' + e.name + "</a></li>"
        })), t("#list-item-country").html(l), t("#list-item-country-mobile").html(l);
        let i = t("#js-form-search #val-country").val();
        t(".js-item-country").bind("click", (function() {
            let l = t(this).data("target"),
                s = t(this).data("value"),
                a = t(this).data("title");
            "all" !== s && s !== i && (t.each(dataLocations, (function(l, i) {
                i.slug === s && t.each(i.child, (function(t, l) {
                    e += '<li class="list-item js-item-city" id="list-item-city-' + l.slug + '" data-target="city" data-value="' + l.slug + '" data-title="' + l.name + '"><a href="javascript:;">' + l.name + "</a></li>"
                }))
            })), t("#list-item-city").html(e), t("#list-item-city-mobile").html(e), e = '<li class="list-item js-item-city" id="list-item-city-all" data-target="city" data-value="all" data-title="' + titleAllCities + '"><a href="javascript:;">' + titleAllCities + "</a></li>"), "all" === s && (t("#list-item-city").html(e), t("#list-item-city-mobile").html(e)), t("#js-form-search #val-" + l).val("all" === s ? "" : s), t("#js-title-" + l).html(a), t("#list-item-" + l + " .list-item").removeClass("active"), t("#list-item-" + l + " #list-item-country-" + s).addClass("active"), t("#list-item-" + l + "-mobile .list-item").removeClass("active"), t("#list-item-" + l + "-mobile #list-item-country-" + s).addClass("active"), t(this).parents(".c-dropdown__list").removeClass("active")
        })), t("body").on("click", ".js-item-city", (function() {
            let l = t(this).data("target"),
                e = t(this).data("value"),
                i = t(this).data("title");
            t("#js-form-search #val-" + l).val("all" === e ? "" : e), t("#js-title-" + l).html(i), t("#list-item-" + l + " .list-item").removeClass("active"), t("#list-item-" + l + " #list-item-city-" + e).addClass("active"), t("#list-item-" + l + "-mobile .list-item").removeClass("active"), t("#list-item-" + l + "-mobile #list-item-city-" + e).addClass("active"), t(this).parents(".c-dropdown__list").removeClass("active")
        }))
    }
    t(".js-show-popup").length && t(".js-close-popup").length && (t(".js-show-popup").bind("click", (function() {
        let l = t(this).data("id"),
            e = t("#" + l).html();
        t("#js-popup-content").html(e), t("#js-popup").addClass("show")
    })), t(".js-close-popup").bind("click", (function() {
        t("#js-popup").removeClass("show"), t("#js-popup-content").html("")
    }))), t(".js-menu-downtop").length && t(".js-menu-downtop").on("click", (function() {
        let l = t(this).data("target");
        t("#js-downtop-" + l).addClass("show")
    })), t(".js-close-menu").length && t(".js-close-menu").on("click", (function() {
        let l = t(this).data("target");
        t("#" + l).removeClass("show"), t(".js-switch-filter").removeClass("active"), t(".c-list-downtop__group .list-item").removeClass("active"), t("#js-form-search #val-country").val(""), t("#js-form-search #val-city").val("")
    })), t(".js-close-downtop").length && t(".js-close-downtop").on("click", (function() {
        let l = t(this).data("target"),
            e = t("#js-common-default-val-menu").data(l);
        t("#js-downtop-" + l + " .c-list-downtop__group .list-item").removeClass("active"), t("#js-downtop-" + l + " .c-list-downtop__group #js-" + l + "-of-" + e).addClass("active"), t("#js-form-filter #val-" + l).val("all" === e ? "" : e), t("#js-downtop-" + l).removeClass("show")
    })), t(".js-menu-item").length && t(".js-menu-item").on("click", (function() {
        let l = t(this).data("target"),
            e = t(this).data("value");
        t("#js-downtop-" + l + " .c-list-downtop__group .list-item").removeClass("active"), t("#js-downtop-" + l + " .c-list-downtop__group #js-" + l + "-of-" + e).addClass("active"), t("#js-form-filter #val-" + l).val("all" === e ? "" : e)
    })), t(".js-ok-downtop").length && t(".js-ok-downtop").on("click", (function() {
        let l = t(this).data("target");
        t("#js-common-default-val-menu").data(l) !== t("#js-form-filter #val-" + l).val() ? (t("#js-downtop-" + l + " .c-menu-downtop__content__footer button").attr("disabled", "disabled"), t("#js-form-filter").submit()) : t("#js-downtop-" + l).removeClass("show")
    })), t(".js-slider-switchtab").length && t(".c-switch-tab__button").on("click", (function() {
        t(".c-switch-tab__content .slick-slider").slick("setPosition")
    }))
}(jQuery); // This is just a sample script. Paste your real code (javascript or HTML) here.

if ('this_is' == /an_example/) {
    of_beautifier();
} else {
    var a = b ? (c % d) : e[f];
}