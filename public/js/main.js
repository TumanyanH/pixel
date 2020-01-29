$(document).ready(function() {
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        responsiveClass:true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 5000,
        nav: true,
        autoplayHoverPause: true,
        responsive:{
            0:{
                items:1,
                loop: true,
                dots:false
            },
            600:{
                items:1,
                loop: true,
                dots: false
            },
            1000:{
                items:3,
                loop:true,
                dots: false
            },
            1200:{
                items:4,
                loop:true,
                dots: false
            }
        }
    })

    $('.owl-prev').html("<i class='fas fa-chevron-left my_chevron'></i>");
    $('.owl-next').html("<i class='fas fa-chevron-right my_chevron'></i>");
    
});


