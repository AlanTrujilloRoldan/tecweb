class app {
    constructor() {
        this.hideErrors();
    }

    hideErrors() {
        $('#curp-error, #edad-error, #estado-error, #radPro-error, #radProMejorServicio-error, #numConPublicas-error, #numConPrivadas-error, #rzSaludPublica-error, #rzSaludPrivada-error, #gastoPublico-error, #gastoPrivado-error, #numCliPublicas-error, #numCliPrivadas-error, #serviciosUsados-error, #satisfaccionPublica-error, #satisfaccionPrivada-error, #accesibilidadDistancia-error, #chequeosAnuales-error, #consultasOnline-error, #razonNoVisita-error, #afiliacionSalud-error, #seguroGastos-error, #medicamentosDificultad-error, #mejoras-error').hide();
    }

}

// Inicializar app
$(document).ready(() => {
    new app();
});