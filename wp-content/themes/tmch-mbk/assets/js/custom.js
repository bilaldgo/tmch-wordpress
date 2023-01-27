/**
 *  brands swiper - home
 * */ 
var brandSwiper = new Swiper(".brandSwiper", {
    slidesPerView: 6,
    spaceBetween: 30,
    loop: true,
    disableOnInteraction: true,
    grabCursor: true,
    autoplay: {
        delay: 5000,
    },
    breakpoints: {
        320: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 4,
            spaceBetween: 40,
        },
        1024: {
            slidesPerView: 5,
            spaceBetween: 50,
        },
    },
});

/**
 *  stories swiper - home
 * */ 
var swiperStories = new Swiper(".swiperStories", {
    slidesPerView: 1,
    // spaceBetween: 30,
    loop: true,
    disableOnInteraction: true,
    autoplay: {
        delay: 5000,
    },
});

/**
 *  reviews swiper - about page
 * */ 
var reviewSwiper = new Swiper(".reviewSwiper", {
    slidesPerView: 3,    
    loop: true,
    disableOnInteraction: true,
    grabCursor: true,
    autoplay: {
        delay: 5000,
    },
    pagination: {
        el: "#reviewSwiper-pagination",
        dynamicBullets: true,
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
            
        },
        768: {
            slidesPerView: 2,
            
        },
        1024: {
            slidesPerView: 2,
            
        },
        1280: {
            slidesPerView: 3,            
        },
    },
});
/**
 *  instructor swiper - about page
 * */ 
var instructorSlider = new Swiper(".instructorSlider", {
    slidesPerView: 4,
    spaceBetween: 20,    
    loop: true,
    disableOnInteraction: true,
    grabCursor: true,
    autoplay: {
        delay: 6000,
    },
    navigation: {
        nextEl: "#instructorNext",
        prevEl: "#instructorPrev",
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 20,            
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        1280: {
            slidesPerView: 4,
            spaceBetween: 20,
        },
    },
});
/**
 *  related swiper - cart pages
 * */ 
var relatedSlider = new Swiper(".relatedSlider", {
    slidesPerView: 4,
    spaceBetween: 24,    
    loop: true,
    disableOnInteraction: true,
    grabCursor: true,
    autoplay: {
        delay: 6000,
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 20,            
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        1280: {
            slidesPerView: 4,
            spaceBetween: 20,
        },
    },
});


/**
 *  navbar scroll position settings
 * */ 
window.onscroll = function() {scrollFunction()};
var prevScrollpos = window.pageYOffset;
function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("nav-top").classList.add("scroll-fix");
    } else {
        document.getElementById("nav-top").classList.remove("scroll-fix");
    }
    
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("nav-top").style.top = "0";
      } else {
        document.getElementById("nav-top").style.top = "-80px";
      }
      prevScrollpos = currentScrollPos;
}