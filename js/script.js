/*global $,owl,smoothScroll,AOS,alert*/
$(document).ready(function () {
    "use strict";

    /* ---------------------------------------------
     Loader Screen
    --------------------------------------------- */
    $(window).load(function () {
        $("body").css('overflow-y', 'auto');
        $('#loading').fadeOut(1000);
    });

    $('[data-tool="tooltip"]').tooltip({
        trigger: 'hover',
        animate: true,
        delay: 50,
        container: 'body'
    });

    /* ---------------------------------------------
     Scrool To Top Button Function
    --------------------------------------------- */
    //    $(window).scroll(function () {
    //        if ($(this).scrollTop() > 500) {
    //            $(".toTop").css("right", "20px");
    //        } else {
    //            $(".toTop").css("right", "-100px");
    //        }
    //    });

    $(".toTop").click(function () {
        $("html,body").animate({
            scrollTop: 0
        }, 500);
        return false;
    });

    //customize the header
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.main-head').addClass('sticky');
        } else {
            $('.main-head').removeClass('sticky');
        }
    });

    $('[data-fancybox]').fancybox();

    $(".brands-slider").owlCarousel({
        nav: true,
        loop: true,
        navText: ["", ""],
        dots: true,
        autoplay: 4000,
        items: 4,
        autoplayHoverPause: true,
        center: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    });


    $(".h-slider").owlCarousel({
        nav: false,
        loop: true,
        dots: true,
        autoplay: 5000,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        items: 1
    });

    AOS.init({
        once: true
    });

    $('select').niceSelect();

    $('#data-table-th').DataTable({
        searching: false,
        paging: true,
        info: false,
        responsive: true,
        "language": {
            "decimal": "",
            "emptyTable": "لا توجد بيانات",
            "info": "Showing _START_ to _END_ of _TOTAL_ entries",
            "infoEmpty": "Showing 0 to 0 of 0 entries",
            "infoFiltered": "(filtered from _MAX_ total entries)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Show _MENU_ entries",
            "loadingRecords": "جاري التحميل...",
            "processing": "جاري...",
            "search": "بحث:",
            "zeroRecords": "لا توجد نتائج مطابقة",
            "paginate": {
                "first": "الاول",
                "last": "الاخير",
                "next": "",
                "previous": ""
            },
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            }
        }
    });

    $('.login-form .form-group .form-control').focus(function () {
        $(this).parents('.form-group').addClass('focused');
    });

    $('.login-form .form-group .form-control').blur(function () {
        var inputValue = $(this).val();
        if (inputValue == "") {
            //    $(this).removeClass('filled');
            $(this).parents('.form-group').removeClass('focused');
        }
    });
    
//    $('.login-inner').width(window.innerWidth);
    $('.login-inner').height(window.innerHeight);
    
    $('.off-sidebar').click(function () {
        $('.sidebar').toggleClass('off');
        $('.wrap-content').toggleClass('shifted'); 
    });
    
    $('.del').click(function () {
        $(this).parent().remove();
    });
    
    $('.on-sidebar').click(function () {
        $('.sidebar').toggleClass('on');
        $('.overlay-s').toggleClass('on');
    });
    
    $('.overlay-s').click(function () {
        $('.sidebar').removeClass('on');
        $('.overlay-s').removeClass('on');
    });
    
        var loadFile = function (event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
    
        // Register Steps
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
        var $target = $(e.target);
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {
        var $active = $('.case-head .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);
    });

    $(".prev-step").click(function (e) {
        var $active = $('.case-head .nav-tabs li.active');
        prevTab($active);
    });


    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }

    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    }

});
$(function() {
    var Accordion = function(el, multiple) {
        this.el = el || {};
        this.multiple = multiple || false;

        // Variables privadas
        var links = this.el.find('.link');
        // Evento
        links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
    }

    Accordion.prototype.dropdown = function(e) {
        var $el = e.data.el;
        $this = $(this),
            $next = $this.next();

        $next.slideToggle();
        $this.parent().toggleClass('open');

        if (!e.data.multiple) {
            $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
        };
    }

    var accordion = new Accordion($('#accordion'), false);
});
