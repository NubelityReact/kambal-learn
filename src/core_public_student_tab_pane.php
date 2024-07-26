<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active text-success" data-toggle="tab" href="#xyz"><i class="icofont icofont-graduate-alt"> Calificaciones</i></a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-success" data-toggle="tab" href="#xcv"><i class="icofont icofont-school-bag"> Grupos</i></a>
    </li>
    <!--    <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#qaws">Reportes</a>
        </li>-->
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div id="xyz" class="tab-pane active">
        <?php include './core_public_student_grades.php'; ?>
    </div>
    <div id="xcv" class="tab-pane fade">
        <?php include './core_public_student_group.php'; ?>
    </div>
    <div id="qaws" class="tab-pane fade">
        Reportes
    </div>
</div>
