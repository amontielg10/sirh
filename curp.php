
<label id="miLabel">Texto Original</label>
<button onclick="cambiarTexto()">Cambiar Texto</button>
<a href="curp2.php">ir</a>


<script>
function cambiarTexto() {
    // Accede al elemento label por su ID
    var label = document.getElementById("miLabel");
    
    // Cambia el texto del label
    label.textContent = "Nuevo Texto";
}   
</script>


