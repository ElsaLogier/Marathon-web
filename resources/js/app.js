import './bootstrap';

function scrollHorizontally(e) {
    const content=document.getElementById('content');
    e = window.event || e;
    var delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));
    var scrollSpeed = 60;
    document.documentElement.scrollLeft -= (delta * scrollSpeed);
    document.body.scrollLeft -= (delta * scrollSpeed);
    e.preventDefault();
  }
  if (window.addEventListener) {
    window.addEventListener("mousewheel", scrollHorizontally, false);
    window.addEventListener("DOMMouseScroll", scrollHorizontally, false);
  } else {
    window.attachEvent("onmousewheel", scrollHorizontally);
  }
  function rnd(max) {
    return Math.floor(Math.random() * max);
  }

  
  for (let i = 1; i < 7; i++) {
    var tmp = 'img'+i;
    var currentimg = document.getElementById(tmp);
    currentimg.style.marginRight=(5+rnd(15))+"rem";
    currentimg.style.marginLeft=(5+rnd(7.5))+"rem";
    if(i%2==0){
        currentimg.style.marginTop=-(25+rnd(25))+"vh";
    }else{
        currentimg.style.marginTop=rnd(50)+"vh";
    }
  }
