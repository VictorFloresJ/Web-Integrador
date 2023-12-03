function bannerCambiante(){let e=document.querySelector(".fondo-cambiante");let t=Math.floor(6*Math.random())+1;e.classList.add("cambio-"+t),setInterval((function(){e.classList.remove("cambio-"+t),e.offsetWidth,t=t%6+1,e.classList.add("cambio-"+t)}),1e4)}document.addEventListener("DOMContentLoaded",bannerCambiante);
//# sourceMappingURL=banner.js.map
