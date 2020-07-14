$(document).ready(function(){
   $('#blocks-images').hover(
function(){
     $('.pcontent-blocks-txt').removeClass('dsp'); // dsp (display:none)

},
function(){
     $('.pcontent-blocks-txt').addClass('dsp');
});
});