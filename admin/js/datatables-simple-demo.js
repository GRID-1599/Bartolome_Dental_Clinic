window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementsByClassName('datatablesSimple')[0];
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
});