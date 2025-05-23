class App {
    initComponents() {
        lucide.createIcons(), $(window).on("load", function () {
            $("#status").fadeOut(), $("#preloader").delay(350).fadeOut("slow")
        });
        [...document.querySelectorAll('[data-bs-toggle="popover"]')].map(t => new bootstrap.Popover(t)), [...document.querySelectorAll('[data-bs-toggle="tooltip"]')].map(t => new bootstrap.Tooltip(t)), [...document.querySelectorAll(".offcanvas")].map(t => new bootstrap.Offcanvas(t));
        var t = document.getElementById("toastPlacement");
        t && document.getElementById("selectToastPlacement").addEventListener("change", function () {
            t.dataset.originalClass || (t.dataset.originalClass = t.className), t.className = t.dataset.originalClass + " " + this.value
        });
        [].slice.call(document.querySelectorAll(".toast")).map(function (t) {
            return new bootstrap.Toast(t)
        });
        const n = document.getElementById("liveAlertPlaceholder"),
            e = document.getElementById("liveAlertBtn");
        e && e.addEventListener("click", () => {
            {
                var t = "Nice, you triggered this alert message!",
                    e = "success";
                const a = document.createElement("div");
                a.innerHTML = [`<div class="alert alert-${e} alert-dismissible" role="alert">`, `   <div>${t}</div>`, '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>', "</div>"].join(""), n.append(a)
            }
        }), document.getElementById("app-style").href.includes("rtl.min.css") && (document.getElementsByTagName("html")[0].dir = "rtl")
    }
    initPortletCard() {
        var a = ".card";
        $(document).on("click", '.card a[data-bs-toggle="remove"]', function (t) {
            t.preventDefault();
            var t = $(this).closest(a),
                e = t.parent();
            t.remove(), 0 == e.children().length && e.remove()
        }), $(document).on("click", '.card a[data-bs-toggle="reload"]', function (t) {
            t.preventDefault();
            var t = $(this).closest(a),
                e = (t.append('<div class="card-disabled"><div class="card-portlets-loader"></div></div>'), t.find(".card-disabled"));
            setTimeout(function () {
                e.fadeOut("fast", function () {
                    e.remove()
                })
            }, 500 + 5 * Math.random() * 300)
        })
    }
    initMultiDropdown() {
        $(".dropdown-menu a.dropdown-toggle").on("click", function () {
            var t = $(this).next(".dropdown-menu"),
                t = $(this).parent().parent().find(".dropdown-menu").not(t);
            return t.removeClass("show"), t.parent().find(".dropdown-toggle").removeClass("show"), !1
        })
    }
    initLeftSidebar() {
        var t;
        $(".side-nav").length && (t = $(".side-nav li .collapse"), $(".side-nav li [data-bs-toggle='collapse']").on("click", function (t) {
            return !1
        }), t.on({
            "show.bs.collapse": function (t) {
                var e = $(t.target).parents(".collapse.show");
                $(".side-nav .collapse.show").not(t.target).not(e).collapse("hide")
            }
        }), $(".side-nav a").each(function () {
            var t = window.location.href.split(/[?#]/)[0];
            this.href == t && ($(this).addClass("active"), $(this).parent().addClass("active"), $(this).parent().parent().parent().addClass("show"), $(this).parent().parent().parent().parent().addClass("active"), "sidebar-menu" !== (t = $(this).parent().parent().parent().parent().parent().parent()).attr("id") && t.addClass("show"), $(this).parent().parent().parent().parent().parent().parent().parent().addClass("active"), "wrapper" !== (t = $(this).parent().parent().parent().parent().parent().parent().parent().parent().parent()).attr("id") && t.addClass("show"), (t = $(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().parent()).is("body") || t.addClass("active"))
        }), setTimeout(function () {
            var t, n, i, o, r, s, e = document.querySelector("li.active .active");

            function l() {
                t = s += 20, e = o, a = r;
                var t, e, a = (t /= i / 2) < 1 ? a / 2 * t * t + e : -a / 2 * (--t * (t - 2) - 1) + e;
                n.scrollTop = a, s < i && setTimeout(l, 20)
            }
            null != e && (t = document.querySelector(".sidenav-menu .simplebar-content-wrapper"), e = e.offsetTop - 300, t && 100 < e && (i = 600, o = (n = t).scrollTop, r = e - o, s = 0, l()))
        }, 200))
    }
    initTopbarMenu() {
        $(".navbar-nav").length && ($(".navbar-nav li a").each(function () {
            var t = window.location.href.split(/[?#]/)[0];
            this.href == t && ($(this).addClass("active"), $(this).parent().parent().addClass("active"), $(this).parent().parent().parent().parent().addClass("active"), $(this).parent().parent().parent().parent().parent().parent().addClass("active"))
        }), $(".navbar-toggle").on("click", function () {
            $(this).toggleClass("open"), $("#navigation").slideToggle(400)
        }))
    }
    initfullScreenListener() {
        var t = document.querySelector('[data-toggle="fullscreen"]');
        t && t.addEventListener("click", function (t) {
            t.preventDefault(), document.body.classList.toggle("fullscreen-enable"), document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement ? document.cancelFullScreen ? document.cancelFullScreen() : document.mozCancelFullScreen ? document.mozCancelFullScreen() : document.webkitCancelFullScreen && document.webkitCancelFullScreen() : document.documentElement.requestFullscreen ? document.documentElement.requestFullscreen() : document.documentElement.mozRequestFullScreen ? document.documentElement.mozRequestFullScreen() : document.documentElement.webkitRequestFullscreen && document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT)
        })
    }
    initFormValidation() {
        document.querySelectorAll(".needs-validation").forEach(e => {
            e.addEventListener("submit", t => {
                e.checkValidity() || (t.preventDefault(), t.stopPropagation()), e.classList.add("was-validated")
            }, !1)
        })
    }
    initFormAdvance() {
        jQuery().select2 && $('[data-toggle="select2"]').select2()
    }
    initCustomModalPlugin() {
        $('[data-plugin="custommodal"]').on("click", function (t) {
            t.preventDefault(), new Custombox.modal({
                content: {
                    target: $(this).attr("href"),
                    effect: $(this).attr("data-animation")
                },
                overlay: {
                    color: $(this).attr("data-overlayColor")
                }
            }).open()
        })
    }
    initCounterUp() {
        $(this).attr("data-delay") && $(this).attr("data-delay"), $(this).attr("data-time") && $(this).attr("data-time");
        $('[data-plugin="counterup"]').each(function (t, e) {
            $(this).counterUp({
                delay: 100,
                time: 1200
            })
        })
    }
    initPeityCharts() {
        $('[data-plugin="peity-pie"]').each(function (t, e) {
            var a = $(this).attr("data-colors") ? $(this).attr("data-colors").split(",") : [],
                n = $(this).attr("data-width") ? $(this).attr("data-width") : 20,
                i = $(this).attr("data-height") ? $(this).attr("data-height") : 20;
            $(this).peity("pie", {
                fill: a,
                width: n,
                height: i
            })
        }), $('[data-plugin="peity-donut"]').each(function (t, e) {
            var a = $(this).attr("data-colors") ? $(this).attr("data-colors").split(",") : [],
                n = $(this).attr("data-width") ? $(this).attr("data-width") : 20,
                i = $(this).attr("data-height") ? $(this).attr("data-height") : 20;
            $(this).peity("donut", {
                fill: a,
                width: n,
                height: i
            })
        }), $('[data-plugin="peity-donut-alt"]').each(function (t, e) {
            $(this).peity("donut")
        }), $('[data-plugin="peity-line"]').each(function (t, e) {
            $(this).peity("line", $(this).data())
        }), $('[data-plugin="peity-bar"]').each(function (t, e) {
            var a = $(this).attr("data-colors") ? $(this).attr("data-colors").split(",") : [],
                n = $(this).attr("data-width") ? $(this).attr("data-width") : 20,
                i = $(this).attr("data-height") ? $(this).attr("data-height") : 20;
            $(this).peity("bar", {
                fill: a,
                width: n,
                height: i
            })
        })
    }
    initKnob() {
        $('[data-plugin="knob"]').each(function (t, e) {
            $(this).knob()
        })
    }
    init() {
        this.initComponents(), this.initPortletCard(), this.initMultiDropdown(), this.initLeftSidebar(), this.initTopbarMenu(), this.initfullScreenListener(), this.initFormValidation(), this.initFormAdvance(), this.initCustomModalPlugin(), this.initCounterUp(), this.initPeityCharts(), this.initKnob()
    }
}
class ThemeCustomizer {
    constructor() {
        this.html = document.getElementsByTagName("html")[0], this.config = {}, this.defaultConfig = window.config
    }
    initConfig() {
    }
    changeMenuColor(t) {
        this.config.menu.color = t, this.html.setAttribute("data-menu-color", t), this.setSwitchFromConfig()
    }
    changeLeftbarSize(t, e = !0) {
        this.html.setAttribute("data-sidenav-size", t), e && (this.config.sidenav.size = t, this.setSwitchFromConfig())
    }
    changeLayoutMode(t, e = !0) {
        this.html.setAttribute("data-layout-mode", t), e && (this.config.layout.mode = t, this.setSwitchFromConfig())
    }
    changeLayoutColor(t) {
        this.config.theme = t, this.html.setAttribute("data-bs-theme", t), this.setSwitchFromConfig()
    }
    changeTopbarColor(t) {
        this.config.topbar.color = t, this.html.setAttribute("data-topbar-color", t), this.setSwitchFromConfig()
    }
    resetTheme() {
        this.config = JSON.parse(JSON.stringify(window.defaultConfig)), this.changeMenuColor(this.config.menu.color), this.changeLeftbarSize(this.config.sidenav.size), this.changeLayoutColor(this.config.theme), this.changeLayoutMode(this.config.layout.mode), this.changeTopbarColor(this.config.topbar.color), this._adjustLayout()
    }
    initSwitchListener() {
    }
    showBackdrop() {
        const t = document.createElement("div"),
            e = (t.id = "custom-backdrop", t.classList = "offcanvas-backdrop fade show", document.body.appendChild(t), document.body.style.overflow = "hidden", 767 < window.innerWidth && (document.body.style.paddingRight = "15px"), this);
        t.addEventListener("click", function (t) {
            e.html.classList.remove("sidebar-enable"), e.hideBackdrop()
        })
    }
    hideBackdrop() {
        var t = document.getElementById("custom-backdrop");
        t && (document.body.removeChild(t), document.body.style.overflow = null, document.body.style.paddingRight = null)
    }
    initWindowSize() {
        var e = this;
        window.addEventListener("resize", function (t) {
            e._adjustLayout()
        })
    }
    _adjustLayout() {
    }
    setSwitchFromConfig() {
        sessionStorage.setItem("__UPLON_CONFIG__", JSON.stringify(this.config)), document.querySelectorAll("#theme-settings-offcanvas input[type=radio]").forEach(function (t) {
            t.checked = !1
        });
        var t, e, a, n, i = this.config;
        i && (t = document.querySelector("input[type=radio][name=data-bs-theme][value=" + i.theme + "]"), e = document.querySelector("input[type=radio][name=data-layout-mode][value=" + i.layout.mode + "]"), a = document.querySelector("input[type=radio][name=data-topbar-color][value=" + i.topbar.color + "]"), n = document.querySelector("input[type=radio][name=data-menu-color][value=" + i.menu.color + "]"), i = document.querySelector("input[type=radio][name=data-sidenav-size][value=" + i.sidenav.size + "]"), t && (t.checked = !0), e && (e.checked = !0), a && (a.checked = !0), n && (n.checked = !0), i && (i.checked = !0))
    }
    init() {
        this.initConfig(), this.initSwitchListener(), this.initWindowSize()
    }
}
document.addEventListener("DOMContentLoaded", function (t) {
    (new App).init(), (new ThemeCustomizer).init()
});
