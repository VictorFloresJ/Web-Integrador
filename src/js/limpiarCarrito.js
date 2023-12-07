document.addEventListener('DOMContentLoaded', () => {
    const cookies = document.cookie.split(';');

    const cookiesAEliminar = cookies.filter(cookie => {
        const cookieParts = cookie.split('=');
        const nombreCookie = cookieParts[0].trim();
        return /^producto_\d+_\w+$/.test(nombreCookie);
    });

    cookiesAEliminar.forEach(cookie => {
        const cookieParts = cookie.split('=');
        const nombreCookie = cookieParts[0].trim();

        document.cookie = `${nombreCookie}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
    });

});
