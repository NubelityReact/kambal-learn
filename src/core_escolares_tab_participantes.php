<div class="card card-border-danger">
    <div class="card-body">
        <div class="d-flex mb-3">
            <div class="p-2">
                <div class="page-header-title">
                    <i class="icofont icofont-school-bag bg-c-orenge card1-icon"></i>
                    <div class="d-inline">
                        <h4>Participantes del Grupo</h4>
                        <a href="core_escolares_grupo.php"><span><p class="pe-7s-back-2"></p> Regresar</span></a>
                        <span class="subcabecera"></span>
                    </div>
                </div>
            </div>
            <div class="p-2 ml-auto">
                <div class="btn-group">
                    <a href="core_reporte_asistencia.php?GrupoId=<?php echo $_GET['GrupoId']; ?>" target="_blank" onclick="window.open(this.href, this.target, 'width=1000,height=500'); return false;" class="btn btn-primary btn-sm" title="Imprimir Lista de asistencia"><i class="pe-7s-print"></i> Imprimir lista de asistencia</a>
                    <button type="button" data-toggle="modal" data-target="#Alumno" class="btn btn-success btn-sm" title="Inscribir alumnos a este grupo"><i class="pe-7s-users"></i> Inscribir Alumnos</button>          
                    <button type="button" data-toggle="modal" data-target="#editaGrupo" class="btn btn-danger btn-sm" title="Ajustes de grupo"><i class="pe-7s-config"></i></button>                   
                </div>
            </div>
        </div>
        <div id="tableAlumno"></div>
    </div>
</div>

