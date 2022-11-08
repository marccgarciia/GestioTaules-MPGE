function clickMe(id, estado) {
    alert(id, estado);
    var result = "<?php Mesa::updateEstado(?>id,estado<?php); ?>"
    document.write(result);
}