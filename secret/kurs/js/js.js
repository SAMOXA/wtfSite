var noSiganlBlinked = false;

function linear(progress) {
  return progress;
}

function animate(opts) {
  var start = new Date;
  var delta = opts.delta || linear;
  var timer = setInterval(function() {
    var progress = (new Date - start) / opts.duration;
    if (progress > 1) progress = 1;
    opts.step( delta(progress) );
    if (progress == 1) {
      clearInterval(timer);
      opts.complete && opts.complete();
    }
  }, opts.delay || 13);
  return timer;
}

function noSignalBlink_i(){
  var signals = document.getElementsByClassName('no-signal');
  if(signals.length == 0){
    return;
  }
  var to, from, duration;
  if(noSiganlBlinked){
    to = 0;
    from = 1;
    duration = 500;
  }else{
    to = 1;
    from = 0;
    duration = 50;
  }
  animate({
    delay: 20,
    duration: duration,
    step: function(delta){
      var result = (to-from) * delta + from;
      var i;
      for(i=0;i<signals.length;i++){
        signals[i].style.opacity = result;
      }
    }
  })
  noSiganlBlinked = !noSiganlBlinked;
}

function noSignalBlink(){
  setInterval(noSignalBlink_i, 500);
}

function overlay_show(obj){
  var overlay = document.getElementsByClassName('overlay')[0];
  overlay.style.zIndex = 1;
  var target = document.getElementsByName('overlay_body')[0];
  var to, from, duration;
  to = 1;
  from = 0;
  duration = 1000;
  animate({
    delay: 20,
    duration: duration,
    step: function(delta){
      var result = (to-from) * delta + from;
      var i;
      overlay.style.opacity = result;
    },
    complete: function(){
      overlay.name = obj.name;
    }
  })
  target.src = "labs/" + obj.name + "/index.html";
}

function overlayHide(){
  var overlay = document.getElementsByClassName('overlay')[0];
  var target = document.getElementsByName('overlay_body')[0];
  if(overlay == undefined){
    return;
  }
  var to, from, duration;
  to = 0;
  from = 1;
  duration = 500;
  animate({
    delay: 20,
    duration: duration,
    step: function(delta){
      var result = (to-from) * delta + from;
      var i;
      overlay.style.opacity = result;
    },
    complete: function(){
      overlay.style.zIndex = -1;
      target.src = "";
      overlay.name = "";
    }
  })
}

function setCookie(name, value, expire) {  
  document.cookie = name + "=" + escape(value) + ((expire == null) ? "" : ("; expires=" + expire.toGMTString()));
}

function getCookie(Name){   
  var search = Name + "=";
  if(document.cookie.length > 0){
    var offset = document.cookie.indexOf(search);
    if(offset != -1){
      offset += search.length;
      var end = document.cookie.indexOf(";", offset);
      if(end == -1){
        end = document.cookie.length;
      }
      return unescape(document.cookie.substring(offset, end));
    }
  }
}

function iVant(){
  var overlay = document.getElementsByClassName('overlay')[0];
  var old = overlay.name;
  if(getCookie("userName") == undefined || getCookie("userName") == ""){
    var target = document.getElementsByName('overlay_body')[0];
    setCookie("old", old);
    target.src = "reg.html";
  }else{
    setCookie("cartSize", parseInt(getCookie("cartSize"))+1);
    setCookie("cart"+getCookie("cartSize"), old);
  }
}

function register(){
  var lol = document.getElementById('lol');
  setCookie("userName", lol.value);
  setCookie("cartSize", 0);
  setCookie("old", "");
  document.location = "labs/" + getCookie("old") + "/index.html";
}

function userRegistred(){
  var reged = document.getElementsByClassName('reged')[0];
  if(reged == undefined){
    return;
  }
  if(getCookie("userName") == undefined || getCookie("userName") == ""){
    reged.innerHTML = "<p class=\"no-signal\">Вы не зарегестрированы</p>";
  }else{
    reged.innerHTML = "<p class=\"yes-signal\">ALL IS OK</p>";
  }
  var i;
  var str = "";
  for(i=0;i<parseInt(getCookie("cartSize"));i++){
    str += "<li>";
    str += getCookie("cart" + (i+1));
    str += "</li>";
  }
  var target = document.getElementsByClassName('to')[0];
  target.innerHTML = str;
}

function init(){
  noSignalBlink();
  userRegistred();
}

window.onload = init;