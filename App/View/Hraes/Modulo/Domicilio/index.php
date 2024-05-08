<br>
<div class="card">
    <div class="card-header">
        <h5 class="modal-title" style="font-weight: bold;color:"><label id="titulo"
                style="font-weight: bold;color:#235B4E">Domicilios</label></h5>
    </div>
    <div class="card-body">
        <div id="accordion">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                            aria-expanded="true" aria-controls="collapseOne">
                            <h6 class="modal-title" style="font-weight: bold;color:"><label id="titulo"
                                    style="font-weight: bold;color:#000000">Domicilio particular</label></h6>
                        </button>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <?php include 'DomicilioP.php' ?>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                            aria-expanded="false" aria-controls="collapseTwo">
                            <h6 class="modal-title" style="font-weight: bold;color:"><label id="titulo"
                                    style="font-weight: bold;color:#000000">Domicilio f&iacutescal</label></h6>
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                        <?php include 'DomicilioF.php' ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" style="background-color:  #235B4E; color: white" class="btn btn-primary"
                onclick="return validarDomicilio();">Guardar</button>
            <input type="hidden" id="id_tbl_domicilios">
        </div>


    </div>
</div>