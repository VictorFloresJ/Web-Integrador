function bannerCambiante(){let a=document.querySelector(".fondo-cambiante");let t=Math.floor(6*Math.random())+1;a.classList.add("cambio-"+t),setInterval((function(){a.classList.remove("cambio-"+t),a.offsetWidth,t=t%6+1,a.classList.add("cambio-"+t)}),1e4)}bannerCambiante();
//# sourceMappingURL=app.js.map
