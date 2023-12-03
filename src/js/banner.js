document.addEventListener('DOMContentLoaded', bannerCambiante);

function bannerCambiante() {
    let banner = document.querySelector('.fondo-cambiante');
    const cantidadBanners = 6;

    let bannerInicial = Math.floor(Math.random() * cantidadBanners) + 1;

    banner.classList.add('cambio-' + bannerInicial);

    setInterval(function () {
        banner.classList.remove('cambio-' + bannerInicial);
        void banner.offsetWidth;
        bannerInicial = (bannerInicial % cantidadBanners) + 1;
        banner.classList.add('cambio-' + bannerInicial);
    }, 10000);

}