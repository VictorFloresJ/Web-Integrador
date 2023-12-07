document.addEventListener("DOMContentLoaded",()=>{document.cookie.split(";").filter(t=>{const e=t.split("=")[0].trim();return/^producto_\d+_\w+$/.test(e)}).forEach(t=>{const e=t.split("=")[0].trim();document.cookie=e+"=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;"})});
//# sourceMappingURL=limpiarCarrito.js.map
