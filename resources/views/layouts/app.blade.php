<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preview.colorlib.com/theme/moose/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Oct 2023 08:01:55 GMT -->
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link
        href="{{asset("assets/fonts.googleapis.com/css2fd1e.css?family=Poppins:wght@200;300;400;500;600;700;800;900&amp;display=swap")}}"
        rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/font-awesome/4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset("assets/css/animate.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/owl.carousel.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/owl.theme.default.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/magnific-popup.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/flaticon.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">
    <script nonce="d7d115e0-1ce2-47c0-bbe0-b80670eb49af">(function (w, d) {
            !function (a, b, c, d) {
                a[c] = a[c] || {};
                a[c].executed = [];
                a.zaraz = {deferred: [], listeners: []};
                a.zaraz.q = [];
                a.zaraz._f = function (e) {
                    return async function () {
                        var f = Array.prototype.slice.call(arguments);
                        a.zaraz.q.push({m: e, a: f})
                    }
                };
                for (const g of ["track", "set", "debug"]) a.zaraz[g] = a.zaraz._f(g);
                a.zaraz.init = () => {
                    var h = b.getElementsByTagName(d)[0], i = b.createElement(d),
                        j = b.getElementsByTagName("title")[0];
                    j && (a[c].t = b.getElementsByTagName("title")[0].text);
                    a[c].x = Math.random();
                    a[c].w = a.screen.width;
                    a[c].h = a.screen.height;
                    a[c].j = a.innerHeight;
                    a[c].e = a.innerWidth;
                    a[c].l = a.location.href;
                    a[c].r = b.referrer;
                    a[c].k = a.screen.colorDepth;
                    a[c].n = b.characterSet;
                    a[c].o = (new Date).getTimezoneOffset();
                    if (a.dataLayer) for (const n of Object.entries(Object.entries(dataLayer).reduce(((o, p) => ({...o[1], ...p[1]})), {}))) zaraz.set(n[0], n[1], {scope: "page"});
                    a[c].q = [];
                    for (; a.zaraz.q.length;) {
                        const q = a.zaraz.q.shift();
                        a[c].q.push(q)
                    }
                    i.defer = !0;
                    for (const r of [localStorage, sessionStorage]) Object.keys(r || {}).filter((t => t.startsWith("_zaraz_"))).forEach((s => {
                        try {
                            a[c]["z_" + s.slice(7)] = JSON.parse(r.getItem(s))
                        } catch {
                            a[c]["z_" + s.slice(7)] = r.getItem(s)
                        }
                    }));
                    i.referrerPolicy = "origin";
                    i.src = "../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(a[c])));
                    h.parentNode.insertBefore(i, h)
                };
                ["complete", "interactive"].includes(b.readyState) ? zaraz.init() : a.addEventListener("DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document);</script>
</head>
<body>
@include('layouts.components.header')
@yield('content')
@include('layouts.components.footer')
<script src="{{asset("assets/js/jquery.min.js")}}"></script>
<script src="{{asset("assets/js/jquery-migrate-3.0.1.min.js")}}"></script>
<script src="{{asset("assets/js/popper.min.js")}}"></script>
<script src="{{asset("assets/js/bootstrap.min.js")}}"></script>
<script src="{{asset("assets/js/jquery.easing.1.3.js")}}"></script>
<script src="{{asset("assets/js/jquery.waypoints.min.js")}}"></script>
<script src="{{asset("assets/js/jquery.stellar.min.js")}}"></script>
<script src="{{asset("assets/js/owl.carousel.min.js")}}"></script>
<script src="{{asset("assets/js/jquery.magnific-popup.min.js")}}"></script>
<script src="{{asset("assets/js/jquery.animateNumber.min.js")}}"></script>
<script src="{{asset("assets/js/scrollax.min.js")}}"></script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&amp;sensor=false"></script>
<script src="{{asset("assets/js/google-map.js")}}"></script>
<script src="{{asset("assets/js/main.js")}}"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v8b253dfea2ab4077af8c6f58422dfbfd1689876627854"
        integrity="sha512-bjgnUKX4azu3dLTVtie9u6TKqgx29RBwfj3QXYt5EKfWM/9hPSAI/4qcV5NACjwAo8UtTeWefx6Zq5PHcMm7Tg=="
        data-cf-beacon='{"rayId":"811423a3efb2210b","version":"2023.8.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}'
        crossorigin="anonymous"></script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/moose/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Oct 2023 08:02:34 GMT -->
</html>
