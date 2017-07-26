jQuery(document).ready(function($){
 
 
    var custom_uploader;
 
 
    $('#upload_image_button').click(function(e) {
 
        e.preventDefault();
 
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
 
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
 
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            $('#upload_image').val(attachment.url);
        });
 
        //Open the uploader dialog
        custom_uploader.open();
 
    });


    var custom_uploader2;
 
 
    $('#upload_image_button2').click(function(e) {
 
        e.preventDefault();
 
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader2) {
            custom_uploader2.open();
            return;
        }
 
        //Extend the wp.media object
        custom_uploader2 = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
 
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader2.on('select', function() {
            attachment = custom_uploader2.state().get('selection').first().toJSON();
            $('#upload_image2').val(attachment.url);
        });
 
        //Open the uploader dialog
        custom_uploader2.open();
 
    });



   var custom_uploader3;
 
 
    $('#upload_image_button3').click(function(e) {
 
        e.preventDefault();
 
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader3) {
            custom_uploader3.open();
            return;
        }
 
        //Extend the wp.media object
        custom_uploader3 = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
 
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader3.on('select', function() {
            attachment = custom_uploader3.state().get('selection').first().toJSON();
            $('#upload_image3').val(attachment.url);
        });
 
        //Open the uploader dialog
        custom_uploader3.open();
 
    });

   var custom_uploader4;
 
 
    $('#upload_image_button4').click(function(e) {
 
        e.preventDefault();
 
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader4) {
            custom_uploader4.open();
            return;
        }
 
        //Extend the wp.media object
        custom_uploader4 = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
 
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader4.on('select', function() {
            attachment = custom_uploader4.state().get('selection').first().toJSON();
            $('#upload_image4').val(attachment.url);
        });
 
        //Open the uploader dialog
        custom_uploader4.open();
 
    });
 
 
});




/* http://www.menucool.com/tabbed-content Free to use. Version 2013.3.13 */

var tabs=function(){var b=function(c,a){var b=new RegExp("(^| )"+a+"( |$)");return b.test(c.className)?true:false},j=function(a,c){if(!b(a,c))if(a.className=="")a.className=c;else a.className+=" "+c},h=function(a,b){var c=new RegExp("(^| )"+b+"( |$)");a.className=a.className.replace(c,"$1");a.className=a.className.replace(/ $/,"")},g=function(c,b){var a=document.getElementsByTagName("html");if(a)a[0].scrollTop+=b},e=function(){var b=window.location.pathname;if(b.indexOf("/")!=-1)b=b.split("/");var a=b[b.length-1]||"root";if(a.indexOf(".")!=-1)a=a.substring(0,a.indexOf("."));if(a>20)a=a.substring(a.length-19);return a},d=e(),c=function(a){this.a=0;this.b=[];this.c=[];this.d=[];this.e=0;this.f(a)};c.prototype={g:function(b){var c=new RegExp(d+b+"=(\\d+)"),a=document.cookie.match(c);return a?a[1]:this.h()},h:function(){for(var a=0,c=this.d.length;a<c;a++)if(b(this.d[a],"selected"))return a;return 0},j:function(d,c){for(var b=d.getAttribute("rel"),a=0;a<this.b.length;a++)if(this.b[a].getAttribute("rel")==b){j(this.b[a].parentNode,"selected");c&&this.e&&this.k(this.a,a)}else h(this.b[a].parentNode,"selected");this.l(b)},k:function(a,b){document.cookie=d+a+"="+b+"; path=/"},l:function(b){for(var a=0;a<this.c.length;a++)this.c[a].style.display=this.c[a].id==b?"block":"none"},m:function(a){if(a.id)for(var b=0;b<this.b.length;b++)if(this.b[b].getAttribute("rel")==a.id)return this.b[b];return a.parentNode.nodeName!="BODY"?this.m(a.parentNode):null},n:function(d,c){var a=document.getElementById(d);if(a){var b=this.m(a);if(b){this.j(b,0);if(!c)setTimeout(function(){a.scrollIntoView();g(a,-120)},0);else setTimeout(function(){window.scrollTo(0,0)},0);return 1}else return 0}},f:function(a){this.a=a.i;this.b=a.getElementsByTagName("a");this.d=a.getElementsByTagName("li");for(var b=0;b<this.b.length;b++)if(this.b[b].getAttribute("rel")){this.c.push(document.getElementById(this.b[b].getAttribute("rel")));var f=this;this.b[b].onclick=function(){f.j(this,1);return false}}var e=a.getAttribute("persist")||"";this.e=e.toLowerCase()=="true"?1:0;var d=window.location.hash;if(d&&d.length>1)if(this.n(d.substring(1),window.location.search.indexOf("noscroll=true")>-1))return;var c=this.e?parseInt(this.g(a.i)):this.h();if(c>=this.b.length)c=0;this.j(this.b[c],0)}};var a=[],i=function(d){var b=false;function a(){if(b)return;b=true;setTimeout(d,4)}if(document.addEventListener)document.addEventListener("DOMContentLoaded",a,false);else if(document.attachEvent){try{var e=window.frameElement!=null}catch(f){}if(document.documentElement.doScroll&&!e){function c(){if(b)return;try{document.documentElement.doScroll("left");a()}catch(d){setTimeout(c,10)}}c()}document.attachEvent("onreadystatechange",function(){document.readyState==="complete"&&a()})}if(window.addEventListener)window.addEventListener("load",a,false);else window.attachEvent&&window.attachEvent("onload",a)},f=function(){for(var e=document.getElementsByTagName("ul"),d=0,f=e.length;d<f;d++)if(b(e[d],"tabs")){e[d].i=a.length;a.push(new c(e[d]))}};i(f);return{open:function(c,d){for(var b=0;b<a.length;b++)a[b].n(c,d)}}}()




function close_pop()
{
document.getElementById('overlay1').style.visibility='hidden';
document.getElementById('top_block1').style.right='-100%';
document.getElementById('top_block1').style.visibility='hidden';
}

function pop()
{
document.getElementById('overlay1').style.visibility='visible';
document.getElementById('top_block1').style.right='0%';
document.getElementById('top_block1').style.visibility='visible';
} 