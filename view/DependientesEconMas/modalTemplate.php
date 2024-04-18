<div class="modal fade" id="exampleModalPlantilla" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Descargar plantilla</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="../../php/PlantillaC/DescargarPlantilla.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="inputCity">Seleccione el documento</label><label style="color:red">*</label><br>
                        <select class="form-control" aria-label="Default select example" id="id_cat_plantilla"
                            name="id_cat_plantilla" required>
                            <option value="" selected="true">Seleccione</option>
                            <option value="1" >Doc. Carga masiva (Dependientes económicos)</option>
                            <option value="2" >Doc. Carga masiva (Pago juguetes)</option>
                        </select>
                    </div>

                    </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    style="background-color: #cb9f52; border:none; outline:none; color: white;">Cancelar</button>
                <button type="submit" class="btn btn-secondary"
                    style="background-color: #cb9f52; border:none; outline:none; color: white;">Descargar</button>
                </form>
            </div>
        </div>
    </div>
</div>