class ViewController {
    constructor(vistasSelector, navId) {
        this.vistas = document.querySelectorAll(vistasSelector);
        this.nav = document.getElementById(navId);
        this.vistaActual = null;
    }

    mostrarVista(idVista) {
        const logueado = sessionStorage.getItem('admin_sesion');

        if (!logueado && idVista !== 'vista-login') {
            idVista = 'vista-login';
        }

        this.vistas.forEach(vista => {
            if (vista.id === idVista) {
                vista.classList.remove('oculto');
            } else {
                vista.classList.add('oculto');
            }
        });

        this.vistaActual = idVista;
        this.actualizarNav(Boolean(logueado));
    }

    actualizarNav(logueado) {
        if (!this.nav) return;

        if (logueado) {
            this.nav.classList.remove('oculto');
        } else {
            this.nav.classList.add('oculto');
        }
    }
}