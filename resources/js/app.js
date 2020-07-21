require('./bootstrap');
window.$ = window.jQuery = require('jquery');


window.Cookies = require('js-cookie');

require('jquery-ui');
// require('bootstrap-select');


require('lightgallery');
require('lg-thumbnail');
require('lg-autoplay');
require('lg-video');
require('lg-fullscreen');
require('lg-pager');
require('lg-zoom');
require('lg-hash');
require('lg-share');

//require('pdfjs');
require('./custom');
require('./slick');
require('./components/react/index')
window.stepper = require('materialize-stepper');
window.MStepper = "materialize-stepper/dist/js/mstepper";

window.Vue = require('vue');

window.moment = require('moment');
window.moment.locale('ke');


Vue.component('vuedrop', require('./components/VueDrop.vue').default);

Vue.component('createmodule', require('./components/CreateModule.vue').default);
Vue.component('editmodule', require('./components/EditModule.vue').default);
const app = new Vue({
    el: '#app',
});





$(document).ready(function(){
  $('.slider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2500,
    arrows: false,
    dots: false,
    mobileFirst: true,
    pauseOnHover: false,
    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }
  ]



  });
});
