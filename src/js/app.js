function bannerCambiante() {
    let banner = document.querySelector('.fondo-cambiante');
    const cantidadBanners = 6;

    let bannerInicial = Math.floor(Math.random() * cantidadBanners) + 1;
    banner.classList.add('cambio-' + bannerInicial);

    setInterval(function () {
        // Remueve la clase actual
        banner.classList.remove('cambio-' + bannerInicial);

        // Forzar un repintado
        void banner.offsetWidth;

        // Elige aleatoriamente un nuevo banner
        bannerInicial = (bannerInicial % cantidadBanners) + 1;

        // Agrega la nueva clase
        banner.classList.add('cambio-' + bannerInicial);
    }, 10000);
}


bannerCambiante();
