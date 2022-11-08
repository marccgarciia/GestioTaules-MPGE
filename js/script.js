function clickMe(id, estado) {
    alert(id, estado);
    var result = ' <?php Mesa::updateEstado(' + id + ',' + estado + ');?> '
    document.write(result);
}