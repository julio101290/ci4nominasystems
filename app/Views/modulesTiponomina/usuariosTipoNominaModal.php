<!-- Modal Usuarios por tipo nomina -->
<div class="modal fade" id="modalUsuariosPorTipoNomina" tabindex="-1" role="dialog" aria-labelledby="modalUsuarioTipoNomina" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal Usuarios Por Tipo nomina</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="tabla-usuariosTipoNomina" class="table table-striped table-hover va-middle tabla-usuariosTipoNomina">
                                <thead>
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>

            </div>
        </div>
    </div>
</div>



<?= $this->section('js') ?>


<script>
    var tablaUsuarios = $('#tabla-usuariosTipoNomina').DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        order: [
            [0, 'asc']
        ],

        ajax: {
            url: `<?= base_url('admin/tiposNomina/usuariosPorTipoNomina') ?>/` + "0",
            method: 'GET',
            dataType: "json"

        },
        columnDefs: [{
                orderable: false,
                targets: [1],
                searchable: false,
                targets: [1]

            }],
        columns: [{
                'data': 'username'
            },

            {
                "data": function (data) {

                    if (data.status == "on") {

                        return `<td class="text-right py-0 align-middle">
                         <div class="btn-group btn-group-sm">
                             <button class="btn btn-success btnActivate" status="on"  idEmpresa="${data.idEmpresa}" idTipoNomina="${data.idTipoNomina}" idUsuario="${data.id}" idTipoNominaUsuario="${data.idTipoNominaUsuario}" idUser="${data.id}">ON</button>
                             
                         </div>
                         </td>`;


                    } else {

                        return `<td class="text-right py-0 align-middle">
                         <div class="btn-group btn-group-sm">
                             <button class="btn btn-danger btnActivate" status="off" idEmpresa="${data.idEmpresa}"  idTipoNominaUsuario="${data.idTipoNominaUsuario}" idUsuario="${data.id}"  idTipoNomina="${data.idTipoNomina}" >OFF</button>
                             
                         </div>
                         </td>`;


                    }

                }
            }
        ]
    })


    //CARGA CONSULTAS ANTERIORES
    /**
     * Carga datos actualizar
     */
    $(".tableTiponomina").on("click", ".btn-users", function () {

        var empresa = $(this).attr("data-id");

      
        tablaUsuarios.ajax.url(`<?= base_url('admin/tiposNomina/usuariosPorTipoNomina') ?>/` + empresa).load();


    });


    /**
     * Guarda derecho
     */

    $(".tabla-usuariosTipoNomina").on("click", ".btnActivate", function () {


        var statusActual = $(this).attr("status");
        var idTipoNominaUsuarioUsuario = $(this).attr("idTipoNominaUsuario");
        var idUsuario = $(this).attr("idUsuario");
        var idEmpresa = $(this).attr("idEmpresa");
        var idTipoNomina = $(this).attr("idTipoNomina");
        
        if (statusActual == "on") {

            var status = "off";
        } else {

            var status = "on";

        }



        var datos = new FormData();
        datos.append("idUsuario", idUsuario);
        datos.append("id", idTipoNominaUsuarioUsuario);
        datos.append("idTipoNomina", idTipoNomina);
        datos.append("idEmpresa", idEmpresa);
        datos.append("status", status);


        $.ajax({

            url: "<?= base_url('admin/tiposNominasPorUsuario/activarDesactivar') ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {

                if (respuesta == "ok") {
                    
                    
                    tablaUsuarios.ajax.url(`<?= base_url('admin/tiposNomina/usuariosPorTipoNomina') ?>/` + idTipoNomina).load();
                  

                } else {

                    Toast.fire({
                        icon: 'error',
                        title: respuesta,
                    });


                }



            }
        });
    })
</script>


<?= $this->endSection() ?>