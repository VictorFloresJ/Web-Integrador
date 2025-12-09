document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.precio').forEach(el => {
        const usd = parseFloat(el.getAttribute('data-usd'));
        const divisa = localStorage.getItem('divisa') || 'USD';
        const tasa = parseFloat(localStorage.getItem('valorDivisa')) || 1;
        const convertido = (usd * tasa).toFixed(2);
        const conComas = parseFloat(convertido).toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        el.textContent = `$${conComas} ${divisa}`;
    });
});
