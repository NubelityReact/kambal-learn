<?php

/**
 * Description of Kambal
 *
 * @author Ing. Bernabe Gutierrez Rodriguez
 */
class Kambal {

    public $idiControlEscolar; //usuario de control escolar logueado
    public $NombreControlEscolar; //Nombre de control escolar logueado
    public $Instituto; //Nombre del instituto
    public $InstitutoEmail; //Nombre del instituto

    public function __construct() {
        include '../BackEndSAP/session.php';
        date_default_timezone_set($forcetimezone);
        $this->idiControlEscolar = $globalIdiUsurio;
        $this->NombreControlEscolar = $globalNombre;
        $this->Instituto = $fullname;
        $this->InstitutoEmail = $globaEmail;
        error_reporting(0);
        $method = $_SERVER['REQUEST_METHOD'];
        switch ($method) {
            case 'GET'://consulta             
                $action = $_GET['action'];
                if ($action == 'getEstatusAspirante') {
                    $this->enum_values('tbregistro_generales', 'estatus');
                }
                if ($action == 'getCarreraByIdiCampus') {
                    $this->getCarreraByIdiCampus();
                }
                if ($action == 'getMotivosAspirante') {
                    $this->getMotivosAspirante();
                }
                if ($action == 'getcardAlumnoById') {
                    $this->getcardAlumnoById();
                }
                if ($action == 'redirectToProfile') {
                    $this->redirectToProfile();
                }
                if ($action == 'getAlumnoById') {
                    $this->getAlumnoById();
                }
                if ($action == 'getcDocumentosGenerales') {
                    $this->getcDocumentosGenerales();
                }
                if ($action == 'getDocumentosProfe') {
                    $this->getDocumentosProfe();
                }
                if ($action == 'getcDocumentos') {
                    $this->getcDocumentos();
                }
                if ($action == 'get_cat_docs') {
                    $this->get_cat_docs();
                }
                if ($action == 'get_cat_docs_id') {
                    $this->get_cat_docs_id();
                }
                if ($action == 'getAlumnosByCarreraId') {
                    $this->getAlumnosByCarreraId();
                }
                if ($action == 'getnewSatudent') {
                    $this->getnewSatudent();
                }
                if ($action == 'getManPerson') {
                    $this->getManPerson();
                }
                if ($action == 'getWomanPerson') {
                    $this->getWomanPerson();
                }
                if ($action == 'cobroAlumnoDiplo') {
                    $this->cobroAlumnoDiplo();
                }
                if ($action == 'getPlantel') {
                    $this->getPlantel();
                }
                if ($action == 'getMatriculaAlumnoByID') {
                    $this->getMatriculaAlumnoByID();
                }
                if ($action == 'getDatosGenerales') {
                    $this->getDatosGenerales();
                }
                if ($action == 'getAspirantes') {
                    $this->getAspirantes();
                }
                if ($action == 'getAspirantesById') {
                    $this->getAspirantesById();
                }
                if ($action == 'getProfesores') {
                    $this->getProfesores();
                }
                if ($action == 'getOferta') {
                    $this->getOferta();
                }
                if ($action == 'getNivel') {
                    $this->getNivel();
                }
                if ($action == 'getcGrados_NivelId') {
                    $this->getcGrados_NivelId();
                }
                if ($action == 'getcGrados_NivelIdSuspended') {
                    $this->getcGrados_NivelIdSuspended();
                }
                if ($action == 'getNivelbyId') {
                    $this->getNivelbyId();
                }
                if ($action == 'getcCarrerasbyID') {
                    $this->getcCarrerasbyID();
                }
                if ($action == 'getcGrados_GradosId') {
                    $this->getcGrados_GradosId();
                }
                if ($action == 'getPeriodoByGrupoId') {
                    $this->getPeriodoByGrupoId();
                }
                if ($action == 'getbMateriasbyID') {
                    $this->getbMateriasbyID();
                }
                if ($action == 'getTurno') {
                    $this->getTurno();
                }
                if ($action == 'getTurnoActive') {
                    $this->getTurnoActive();
                }
                if ($action == 'getTurnoAll') {
                    $this->getTurnoAll();
                }
                if ($action == 'getcardAlumno') {
                    $this->getcardAlumno();
                }
                if ($action == 'getcardAlumnoAll') {
                    $this->getcardAlumnoAll();
                }
                if ($action == 'getAlumnoByCarreraAndGradoAndPlantel') {
                    $this->getAlumnoByCarreraAndGradoAndPlantel();
                }
                if ($action == 'getcardAlumnoByMatricula') {
                    $this->getcardAlumnoByMatricula();
                }
                if ($action == 'getGeneralesbyID') {
                    if (empty($_GET["idigenerales"])) {
                        echo "codigo is required ";
                    } else {
                        $idi = $_GET["idigenerales"];
                        $this->getDatosGeneralesbyId($idi);
                    }
                }
                if ($action == 'getDatosProfesorbyId') {
                    if (empty($_GET["idiprofesor"])) {
                        echo "idiprofesor is required ";
                    } else {
                        $idi = $_GET["idiprofesor"];
                        $this->getDatosProfesorbyId($idi);
                    }
                }
                if ($action == 'getTutoresByID') {
                    if (empty($_GET["idialumno"])) {
                        echo "idialumno is required ";
                    } else {
                        $idi = $_GET["idialumno"];
                        $this->getTutoresByID($idi);
                    }
                }
                if ($action == 'getOfertabyID') {
                    if (empty($_GET["idioferta"])) {
                        echo "idioferta is required ";
                    } else {
                        $idi = $_GET["idioferta"];
                        $this->getOfertaById($idi);
                    }
                }
                if ($action == 'getImageAlumnoByID') {
                    if (empty($_GET["idialumno"])) {
                        echo "idialumno is required ";
                    } else {
                        $idialumno = $_GET["idialumno"];
                        $this->getImageAlumnoByID($idialumno);
                    }
                }
                if ($action == 'getImageProfesorByID') {
                    if (empty($_GET["idiprofesor"])) {
                        echo "idiprofesor is required ";
                    } else {
                        $idiprofesor = $_GET["idiprofesor"];
                        $this->getImageProfesorByID($idiprofesor);
                    }
                }
                if ($action == 'getSignUserByID') {
                    if (empty($_GET["idiprofesor"])) {
                        echo "idiprofesor is required ";
                    } else {
                        $idiprofesor = $_GET["idiprofesor"];
                        $this->getSignUserByID($idiprofesor);
                    }
                }
                if ($action == 'getUserSAEM') {
                    $this->getUserSAEM();
                }
                if ($action == 'getUserSAEMByID') {
                    $this->getUserSAEMByID();
                }
                if ($action == 'getCiclo') {
                    $this->getCiclo();
                }
                if ($action == 'getCicloActive') {
                    $this->getCicloActive();
                }
                if ($action == 'getCicloByEstatus') {
                    $this->getCicloByEstatus();
                }
                if ($action == 'getPlanPago') {
                    $this->getPlanPago();
                }
                if ($action == 'getRole') {
                    $this->getRole();
                }
                if ($action == 'getCategoriaPermision') {
                    $this->getCategoriaPermision();
                }
                if ($action == 'getPermisions') {
                    $this->getPermisions();
                }
                if ($action == 'getRoleAsPermision') {
                    $this->getRoleAsPermision();
                }
                if ($action == 'getCicloByID') {
                    $this->getCicloByID();
                }
                if ($action == 'getcGradosByIdcCarrera') {
                    $this->getcGradosByIdcCarrera();
                }
                if ($action == 'getCicloByAbrev') {
                    $this->getCicloByAbrev();
                }
                if ($action == 'countAllAlumno') {
                    $this->countAllAlumno();
                }
                if ($action == 'countAllAspiirante') {
                    $this->countAllAspiirante();
                }
                if ($action == 'countStudentByCampusId') {
                    $this->countStudentByCampusId();
                }
                if ($action == 'getcardAlumnoMatricula') {
                    $this->getcardAlumnoMatricula();
                }
                if ($action == 'getVencimiento') {
                    $this->getVencimiento();
                }
                if ($action == 'getGrupos') {
                    $this->getGrupos();
                }
                if ($action == 'gettbGrupos_idicarrera') {
                    $this->gettbGrupos_idicarrera();
                }
                if ($action == 'getGruposCoursedByIdiAlumno') {
                    $this->getGruposCoursedByIdiAlumno();
                }
                if ($action == 'getHorasHorario') {
                    $this->getHorasHorario();
                }
                if ($action == 'getVencimientoByID') {
                    $this->getVencimientoByID();
                }
                if ($action == 'getGradosByID') {
                    $this->getGradosByID();
                }
                if ($action == 'getMateriasByCarreraAndGradoID') {
                    $this->getMateriasByCarreraAndGradoID();
                }
                if ($action == 'gettbMaterias_MateriaId') {
                    $this->gettbMaterias_MateriaId();
                }
                if ($action == 'getNivelbyAlumnoId') {
                    $this->getNivelbyAlumnoId();
                }
                if ($action == 'getCiclosyAlumnoId') {
                    $this->getCiclosyAlumnoId();
                }
                if ($action == 'getCalificacionesyAlumnoId') {
                    $this->getCalificacionesyAlumnoId();
                }
                if ($action == 'getCalificacionesByGrupoIdANDPeriodoID') {
                    $this->getCalificacionesByGrupoIdANDPeriodoID();
                }
                if ($action == 'getPromedioAlumnoId') {
                    $this->getPromedioAlumnoId();
                }
                if ($action == 'getcAulas') {
                    $this->getcAulas();
                }
                if ($action == 'getcAulasbyidicampus') {
                    $this->getcAulasbyidicampus();
                }
                if ($action == 'getbAlumnoGrupoByIdGrupo') {
                    $this->getbAlumnoGrupoByIdGrupo();
                }
                if ($action == 'getDetailGroupById') {
                    $this->getDetailGroupById();
                }
                if ($action == 'getcHorasByTurnoID') {
                    $this->getcHorasByTurnoID();
                }
                if ($action == 'getHorarioEscolarByGrupoId') {
                    $this->getHorarioEscolarByGrupoId();
                }
                if ($action == 'getCilosCoursedByIdiAlumno') {
                    $this->getCilosCoursedByIdiAlumno();
                }
                if ($action == 'getMateriasByGradoId') {
                    $this->getMateriasByGradoId();
                }
                if ($action == 'getcTipoEvaluacionPeriodo') {
                    $this->getcTipoEvaluacionPeriodo();
                }
                //DAMIAN HERNANDEZ MERINO
                if ($action == 'getCampus') {
                    $this->getCampus();
                }
                if ($action == 'getCampusbyidicampus') {
                    $this->getCampusbyidicampus();
                }
                if ($action == 'getCampusbycTurnoId') {
                    $this->getCampusbycTurnoId();
                }
                if ($action == 'getcSituacion') {
                    $this->getcSituacion();
                }
                if ($action == 'getSituacionbyId') {
                    $this->getSituacionbyId();
                }
                if ($action == 'getAulasbyId') {
                    $this->getAulasbyId();
                }
                if ($action == 'getcarrera_idicampus') {
                    $this->getcarrera_idicampus();
                }
                if ($action == 'getGradosByIdCarrera') {
                    $this->getGradosByIdCarrera();
                }
                if ($action == 'getcGradosbyId') {
                    $this->getcGradosbyId();
                }
                if ($action == 'getcGradosbyIdcarrera') {
                    $this->getcGradosbyIdcarrera();
                }
                if ($action == 'getcNivelesbyidicampus') {
                    $this->getcNivelesbyidicampus();
                }
                if ($action == 'getcNiveles') {
                    $this->getcNiveles();
                }
                if ($action == 'getcNivelesbyIdNiveles') {
                    $this->getcNivelesbyIdNiveles();
                }
                if ($action == 'getcarrerabyId') {
                    $this->getcarrerabyId();
                }
                if ($action == 'getAllCarreras') {
                    $this->getAllCarreras();
                }
                if ($action == 'getcarrerabyNivelId') {
                    $this->getcarrerabyNivelId();
                }
                if ($action == 'getMateriasByNivelIDAndCarreraIdAndGradoId') {
                    $this->getMateriasByNivelIDAndCarreraIdAndGradoId();
                }
                if ($action == 'getcGradobyIDcarreraID') {
                    $this->getcGradobyIDcarreraID();
                }
                if ($action == 'getcTablaMateriaId') {
                    $this->getcTablaMateriaId();
                }
                if ($action == 'getgradobyId') {
                    $this->getgradobyId();
                }
                if ($action == 'getgradobyNivelId') {
                    $this->getgradobyNivelId();
                }
                if ($action == 'getprofesorId') {
                    $this->getprofesorId();
                }
                if ($action == 'getGradosByidicarrera') {
                    $this->getGradosByidicarrera();
                }
                if ($action == 'get_notifications_id') {
                    $this->get_notifications_id();
                }
                if ($action == 'get_notifications') {
                    $this->get_notifications();
                }
                if ($action == 'get_notifications_events') {
                    $this->get_notifications_events();
                }
                if ($action == 'get_notifications_targets') {
                    $this->get_notifications_targets();
                }
                if ($action == 'getNivelbyCampus') {
                    $this->getNivelbyCampus();
                }
                if ($action == 'get_oferta_form') {
                    $this->get_oferta_form();
                }
                if ($action == 'get_oferta_form_fields') {
                    $this->get_oferta_form_fields();
                }
                if ($action == 'gettbButtonPyament') {
                    $this->gettbButtonPyament();
                }
                if ($action == 'gettbButtonPyamentId') {
                    $this->gettbButtonPyamentId();
                }
                if ($action == 'gettbCustomForm') {
                    $this->gettbCustomForm();
                }
                if ($action == 'gettbCustomFormId') {
                    $this->gettbCustomFormId();
                }
                if ($action == 'gettbCustomFormInputsIdicustomform') {
                    $this->gettbCustomFormInputsIdicustomform();
                }
                if ($action == 'tbCustomFormInputsIdicustomformActive') {
                    $this->tbCustomFormInputsIdicustomformActive();
                }
                if ($action == 'gettbCustomFormContent') {
                    $this->gettbCustomFormContent();
                }

                //ENDGET
                break;
            case 'POST'://inserta
                $action = $_POST['action'];
                if ($action == 'add_oferta_form') {
                    $this->add_oferta_form();
                }
                if ($action == 'add_notifications') {
                    $this->add_notifications();
                }
                if ($action == 'suspended_notification') {
                    $this->suspended_notification();
                }
                if ($action == 'delete_notification') {
                    $this->delete_notification();
                }
                if ($action == 'send_notification') {
                    $this->send_notification();
                }
                if ($action == 'sendEmail') {
                    $this->sendEmail();
                }
                if ($action == 'addCarrera') {
                    $this->addCarrera();
                }
                if ($action == 'updateCarrera') {
                    $this->updateCarrera();
                }
                if ($action == 'suspended_carrera') {
                    $this->suspended_carrera();
                }
                if ($action == 'deleted_carrera') {
                    $this->deleted_carrera();
                }
                if ($action == 'setEstatusAspirante') {
                    $this->setEstatusAspirante();
                }
                if ($action == 'setMotivosAspirante') {
                    $this->setMotivosAspirante();
                }
                if ($action == 'addGeneral') {
                    $this->addDatosGenerales();
                }
                if ($action == 'addNewRole') {
                    $this->addNewRole();
                }
                if ($action == 'addRoleAsPermision') {
                    $this->addRoleAsPermision();
                }
                if ($action == 'deletPermision') {
                    $this->deletPermision();
                }
                if ($action == 'deleteRole') {
                    $this->deleteRole();
                }
                if ($action == 'updateEditPermision') {
                    $this->updateEditPermision();
                }
                if ($action == 'deletePlan') {
                    $this->deletePlan();
                }
                if ($action == 'success_user_create_moodle') {
                    $this->success_user_create_moodle();
                }
                if ($action == 'putGenerales') {
                    $this->updateDatosGenerales();
                }
                if ($action == 'addAlumno') {
                    $this->addAlumno();
                }
                if ($action == 'setTutor') {
                    $this->setTutor();
                }
                if ($action == 'addDocumentos') {
                    $this->addDocumentos();
                }
                if ($action == 'updateImageAlumnoByIDArchivo') {
                    $this->updateImageAlumnoByIDArchivo();
                }
                if ($action == 'updateImageProfesorById') {
                    $this->updateImageProfesorById();
                }
                if ($action == 'updateSignProfesorById') {
                    $this->updateSignProfesorById();
                }
                if ($action == 'reinscription') {
                    $this->reinscription();
                }
                if ($action == 'profesor') {
                    $this->profesor();
                }
                if ($action == 'borrarProf') {
                    $this->borrarProf();
                }
                if ($action == 'borrarUserSAEM') {
                    $this->borrarUserSAEM();
                }
                if ($action == 'borrarAspirante') {
                    $this->borrarAspirante();
                }
                if ($action == 'addUserSAEM') {
                    $this->addUserSAEM();
                }
                if ($action == 'updateUSerSAEM') {
                    $this->updateUSerSAEM();
                }
                if ($action == 'beca') {
                    $this->beca();
                }
                if ($action == 'student_upload_file') {
                    $this->student_upload_file();
                }
                if ($action == 'teacher_upload_file') {
                    $this->teacher_upload_file();
                }
                if ($action == 'addCiclo') {
                    $this->addCiclo();
                }
                if ($action == 'updateCiclo') {
                    $this->updateCiclo();
                }
                if ($action == 'updateEstatusByIdiAlumno') {
                    $this->updateEstatusByIdiAlumno();
                }
                if ($action == 'updateCodigoCredencialByIdiAlumno') {
                    $this->updateCodigoCredencialByIdiAlumno();
                }
                if ($action == 'addVencimiento') {
                    $this->addVencimiento();
                }
                if ($action == 'addPeriodo') {
                    $this->addPeriodo();
                }
                if ($action == 'deleteFechaPago') {
                    $this->deleteFechaPago();
                }
                if ($action == 'updateVencimiento') {
                    $this->updateVencimiento();
                }
                if ($action == 'updateSignByIdiAlumno') {
                    $this->updateSignByIdiAlumno();
                }
                if ($action == 'addGrupoEscolar') {
                    $this->addGrupoEscolar();
                }
                if ($action == 'updateGrupoEscolar') {
                    $this->updateGrupoEscolar();
                }
                if ($action == 'GrupoEscolarInexist') {
                    $this->GrupoEscolarInexist();
                }
                if ($action == 'enrolStudent') {
                    $this->enrolStudent();
                }
                if ($action == 'unrolStudent') {
                    $this->unrolStudent();
                }
                if ($action == 'setProfesorGruposId') {
                    $this->setProfesorGruposId();
                }
                if ($action == 'addtbHorarioGrupo') {
                    $this->addtbHorarioGrupo();
                }
                if ($action == 'deleteHorarioGrupo') {
                    $this->deleteHorarioGrupo();
                }
                if ($action == 'limpiarFilaHorarioGrupo') {
                    $this->limpiarFilaHorarioGrupo();
                }
                if ($action == 'addHorasHorario') {
                    $this->addHorasHorario();
                }
                if ($action == 'updateHorasHorario') {
                    $this->updateHorasHorario();
                }
                if ($action == 'UpdateNotaAlumno') {
                    $this->UpdateNotaAlumno();
                }
                if ($action == 'deleteHora') {
                    $this->deleteHora();
                }
                if ($action == 'addtbCalificacionesFromRevalidacion') {
                    $this->addtbCalificacionesFromRevalidacion();
                }
                if ($action == 'deltbCalificacionesById') {
                    $this->deltbCalificacionesById();
                }
                if ($action == 'deleteDocument') {
                    $this->deleteDocument();
                }
                if ($action == 'deleteTutor') {
                    $this->deleteTutor();
                }
                if ($action == 'deleteDocumentProfe') {
                    $this->deleteDocumentProfe();
                }
                if ($action == 'editaDocumento') {
                    $this->editaDocumento();
                }
                if ($action == 'deletePeriodo') {
                    $this->deletePeriodo();
                }
                // DAMIAN HERNANDEZ MERINO
                if ($action == 'delete_cat_doc') {
                    $this->delete_cat_doc();
                }
                if ($action == 'deleteCampus') {
                    $this->deleteCampus();
                }
                if ($action == 'suspended_cat_doc') {
                    $this->suspended_cat_doc();
                }
                if ($action == 'suspended_campus') {
                    $this->suspended_campus();
                }
                if ($action == 'updateCampus') {
                    $this->updateCampus();
                }
                if ($action == 'addCampus') {
                    $this->addCampus();
                }
                if ($action == 'addcTurno') {
                    $this->addcTurno();
                }
                if ($action == 'updatecTurno') {
                    $this->updatecTurno();
                }
                if ($action == 'deletecTurno') {
                    $this->deletecTurno();
                }
                if ($action == 'suspended_turno') {
                    $this->suspended_turno();
                }
                if ($action == 'addcSituacion') {
                    $this->addcSituacion();
                }
                if ($action == 'deletecSituacion') {
                    $this->deletecSituacion();
                }
                if ($action == 'updatecSituacion') {
                    $this->updatecSituacion();
                }
                if ($action == 'addAulas') {
                    $this->addAulas();
                }
                if ($action == 'deleteAula') {
                    $this->deleteAula();
                }
                if ($action == 'updateAula') {
                    $this->updateAula();
                }
                if ($action == 'addcGrados') {
                    $this->addcGrados();
                }
                if ($action == 'updatecGrados') {
                    $this->updatecGrados();
                }
                if ($action == 'deletecGrados') {
                    $this->deletecGrados();
                }
                if ($action == 'suspendedcGrados') {
                    $this->suspendedcGrados();
                }
                if ($action == 'addcNiveles') {
                    $this->addcNiveles();
                }
                if ($action == 'deletecNiveles') {
                    $this->deletecNiveles();
                }
                if ($action == 'suspended_cNiveles') {
                    $this->suspended_cNiveles();
                }
                if ($action == 'updatecNiveles') {
                    $this->updatecNiveles();
                }
                if ($action == 'addTablaMateria') {
                    $this->addTablaMateria();
                }
                if ($action == 'deleteTablaMateria') {
                    $this->deleteTablaMateria();
                }
                if ($action == 'updateTablaMaterias') {
                    $this->updateTablaMaterias();
                }
                if ($action == 'updateProfesor') {
                    $this->updateProfesor();
                }
                if ($action == 'add_notifications_targets') {
                    $this->add_notifications_targets();
                }
                if ($action == 'delete_carrera') {
                    $this->delete_carrera();
                }
                if ($action == 'carrera_file_remove') {
                    $this->carrera_file_remove();
                }
                if ($action == 'suspended_Grupo') {
                    $this->suspended_Grupo();
                }
                if ($action == 'deleteGrupo') {
                    $this->deleteGrupo();
                }
                if ($action == 'suspended_idigenerales') {
                    $this->suspended_idigenerales();
                }
                if ($action == 'deleteidigenerales') {
                    $this->deleteidigenerales();
                }
                if ($action == 'add_tbMaterias') {
                    $this->add_tbMaterias();
                }
                if ($action == 'deleted_tbMaterias') {
                    $this->deleted_tbMaterias();
                }
                if ($action == 'suspended_tbMaterias') {
                    $this->suspended_tbMaterias();
                }
                if ($action == 'restore_password') {
                    $this->restore_password();
                }
                if ($action == 'add_cDocumentos') {
                    $this->add_cDocumentos();
                }
                if ($action == 'add_tbButtonPyament') {
                    $this->add_tbButtonPyament();
                }
                if ($action == 'suspendedtbButtonPyament') {
                    $this->suspendedtbButtonPyament();
                }
                if ($action == 'deletetbButtonPyament') {
                    $this->deletetbButtonPyament();
                }
                if ($action == 'add_tbCustomFormInputs') {
                    $this->add_tbCustomFormInputs();
                }
                if ($action == 'add_tbCustomForm') {
                    $this->add_tbCustomForm();
                }
                if ($action == 'deletedtbCustomFormInputs') {
                    $this->deletedtbCustomFormInputs();
                }
                if ($action == 'suspendedtbCustomFormInputs') {
                    $this->suspendedtbCustomFormInputs();
                }
                if ($action == 'add_custom_form') {
                    $this->add_custom_form();
                }
                //ENDPOST
                break;
            case 'PUT':
                echo 'METODO NO SOPORTADO';
                break;
            case 'DELETE'://elimina
                echo 'METODO NO SOPORTADO';
                break;
            default://metodo NO soportado
                echo 'METODO NO SOPORTADO';
                break;
        }
    }

    function get_oferta_form_fields() {
        $errorMSG = "";
        //get input string idicarrera
        if (empty($_GET["idicarrera"])) {
            $errorMSG .= "idicarrera is required ";
        } else {
            $idicarrera = $_GET["idicarrera"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                                        oferta_form.idioferta,
                                        oferta_form.idicarrera,
                                        oferta_form.idiform,
                                        carrera.nombre,
                                        form_datos_generales.name,
                                        form_datos_generales.category
                                        FROM
                                        oferta_form
                                        INNER JOIN carrera ON oferta_form.idicarrera = carrera.idicarrera
                                        INNER JOIN form_datos_generales ON oferta_form.idiform = form_datos_generales.idiform
                                        WHERE oferta_form.idicarrera = $idicarrera ORDER BY oferta_form.idiform ASC";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * añade un registro a la tabla de notifications_targets
     * created by bennderodriguez
     */
    function add_oferta_form() {
        $errorMSG = "";
        //post input string idicarrera
        if (empty($_POST["idicarrera"])) {
            $errorMSG .= "idicarrera is required ";
        } else {
            $idicarrera = $_POST["idicarrera"];
        }
        //post input string idiform
        if (empty($_POST["idiform"])) {
            $errorMSG .= "idiform is required ";
        } else {
            $idiform = $_POST["idiform"];
        }
        //post input string $query_event
        if (empty($_POST["query_event"])) {
            $errorMSG .= "query_event is required ";
        } else {
            $query_event = $_POST["query_event"];
        }
        // run query
        if ($errorMSG == "") {
            if ($query_event == 'insert') {
                $sql = "INSERT INTO notifications_targets (idinotification,idigenerales,idievent) VALUES ('$idinotification','$idigenerales','$idievent');";

                $sql = "INSERT INTO oferta_form (idicarrera,idiform) VALUES ('$idicarrera','$idiform')";
            }if ($query_event == 'delete') {
                $sql = "DELETE FROM oferta_form WHERE idicarrera = '$idicarrera' AND idiform = '$idiform';";
            }
            include "./conexion.php";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function get_oferta_form() {
        $errorMSG = "";
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            //$sql = "SELECT user.idiuser, user.idirole, user.estatus,user.email,  role.role, user.Nombre, user.apellido_paterno, user.apellido_materno, user.user, user.password,user.email from user, role WHERE user.idirole = role.idirole and user.idiuser = $idiuser and user.categoria='admin'";
            $sql = "SELECT
                                        form_datos_generales.idiform,
                                        form_datos_generales.deleted,
                                        form_datos_generales.suspended,
                                        form_datos_generales.name,
                                        form_datos_generales.description,
                                        form_datos_generales.category,
                                        form_datos_generales.created
                                        FROM
                                        form_datos_generales
                                        WHERE form_datos_generales.deleted = 0 
                                        AND form_datos_generales.suspended = 0";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getNivelbyCampus() {
        $errorMSG = '';
        //idicampus
        if (empty($_GET["idicampus"])) {
            $errorMSG = "idicampus is required ";
        } else {
            $idicampus = $_GET["idicampus"];
        }

        if ($errorMSG == '') {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                    cNiveles.NivelId,
                    cNiveles.deleted,
                    cNiveles.suspended,
                    cNiveles.Descripcion,
                    cNiveles.Abreviatura,
                    cNiveles.created 
                    FROM
                    cNiveles 
                    WHERE
                    cNiveles.deleted = 0 
                    AND cNiveles.suspended = 0 ";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            echo $errorMSG;
        }
    }

    function delete_carrera() {
        $errorMSG = "";
        //post input string idicarrera
        if (empty($_POST["idicarrera"])) {
            $errorMSG .= "idicarrera is required ";
        } else {
            $idicarrera = $_POST["idicarrera"];
        }

        // run query
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE carrera SET deleted = '1' WHERE idicarrera = '$idicarrera'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * añade un registro a la tabla de notifications_targets
     * created by bennderodriguez
     */
    function add_notifications_targets() {
        $errorMSG = "";
        //post input string idinotification
        if (empty($_POST["idinotification"])) {
            $errorMSG .= "idinotification is required ";
        } else {
            $idinotification = $_POST["idinotification"];
        }
        //post input string idigenerales
        if (empty($_POST["idigenerales"])) {
            $errorMSG .= "idigenerales is required ";
        } else {
            $idigenerales = $_POST["idigenerales"];
        }
        //post input string idievent
        if (empty($_POST["idievent"])) {
            $errorMSG .= "idievent is required ";
        } else {
            $idievent = $_POST["idievent"];
        }
        //post input string $query_event
        if (empty($_POST["query_event"])) {
            $errorMSG .= "query_event is required ";
        } else {
            $query_event = $_POST["query_event"];
        }
        // run query
        if ($errorMSG == "") {
            if ($query_event == 'insert') {
                $sql = "INSERT INTO notifications_targets (idinotification,idigenerales,idievent) VALUES ('$idinotification','$idigenerales','$idievent');";
            }if ($query_event == 'delete') {
                $sql = "DELETE FROM notifications_targets WHERE idinotification = '$idinotification' AND idigenerales = '$idigenerales' AND idievent = '$idievent';";
            }
            include "./conexion.php";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function get_notifications_targets() {
        $errorMSG = "";
        //get input string idinotification
        if (empty($_GET["idinotification"])) {
            $errorMSG .= "idinotification is required ";
        } else {
            $idinotification = $_GET["idinotification"];
        }
        if (empty($_GET["idievent"])) {
            $errorMSG .= "idievent is required ";
        } else {
            $idievent = $_GET["idievent"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                                        notifications_targets.iditarget,
                                        notifications_targets.idievent,
                                        notifications.idinotification,
                                        notifications.name,
                                        datos_generales.idigenerales,
                                        datos_generales.deleted,
                                        datos_generales.suspended,
                                        datos_generales.nombre,
                                        datos_generales.apellido_paterno,
                                        datos_generales.apellido_materno,
                                        datos_generales.email
                                        FROM
                                        notifications_targets
                                        INNER JOIN notifications ON notifications_targets.idinotification = notifications.idinotification
                                        INNER JOIN datos_generales ON notifications_targets.idigenerales = datos_generales.idigenerales
                                        WHERE notifications.idinotification = '$idinotification' AND notifications_targets.idievent = '$idievent'";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function get_notifications_events() {
        $errorMSG = "";
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                                        notifications_events.idievent,
                                        notifications_events.suspended,
                                        notifications_events.deleted,
                                        notifications_events.name,
                                        notifications_events.description,
                                        notifications_events.comments,
                                        notifications_events.created
                                        FROM
                                        notifications_events
                                        WHERE notifications_events.suspended = 0 AND
                                        notifications_events.deleted = 0;";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * añade un registro a la tabla de notifications
     * created by bennderodriguez
     */
    function add_notifications() {
        $errorMSG = '';
        $query_files = '';
        //post input string name
        if (empty($_POST["name"])) {
            $errorMSG .= "name is required ";
        } else {
            $name = $_POST["name"];
        }
        //post input string description
        if (empty($_POST["description"])) {
            $description = '';
        } else {
            $description = $_POST["description"];
        }
        //post input string comments
        if (empty($_POST["comments"])) {
            $comments = '';
        } else {
            $comments = $_POST["comments"];
        }
        //post input string subject
        if (empty($_POST["subject"])) {
            $errorMSG .= "subject is required ";
        } else {
            $subject = $_POST["subject"];
        }
        //post input string message
        if (empty($_POST["message"])) {
            $errorMSG .= "message is required ";
        } else {
            $message = $_POST["message"];
        }
        //post input string sender_email
        if (empty($_POST["sender_email"])) {
            $errorMSG .= "sender_email is required ";
        } else {
            $sender_email = $_POST["sender_email"];
        }
        //post input string sender_name
        if (empty($_POST["sender_name"])) {
            $errorMSG .= "sender_name is required ";
        } else {
            $sender_name = $_POST["sender_name"];
        }
        //post input string query_action
        if (empty($_POST["query_action"])) {
            $errorMSG .= "query_action is required ";
        } else {
            $query_action = $_POST["query_action"];
        }
        //post input string files
        if (0 < $_FILES['file']['error']) {
            $query_files .= 'Error: ' . $_FILES['file']['error'];
        } else {
            // A list of permitted file extensions
            $allowed = array('pdf');
            $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $tamanio = $_FILES['file']['size'];

            if (!in_array(strtolower($extension), $allowed) || $tamanio > 5242880) {// 5 MB (this size is in bytes)
                $query_files .= 'Solamente se permiten archivos en formato PDF con un tamaño máximo de 5 Mb';
            } else {
                $nombre = $_FILES['file']['name'];
                $tipo = $_FILES['file']['type'];
                $image = $_FILES['file']['tmp_name'];
                $archivo = addslashes(file_get_contents($image));
            }
        }

        // run query
        if ($errorMSG == "") {
            if ($query_action == 'insert') {
                include "./conexion.php";
                $sql = "INSERT INTO notifications (name, description, comments, subject, message, sender_email, sender_name) VALUES 
                                      ('$name','$description','$comments','$subject','$message','$sender_email','$sender_name')";
                if ($conn->query($sql) === TRUE) {
                    if ($query_files == '') {
                        $idinotification = $conn->insert_id;
                        $this->notification_file_update($idinotification, $archivo, $nombre, $tamanio, $tipo);
                    } else {
                        echo 'success';
                    }
                } else {
                    echo "Error: " . $conn->error;
                }
                $conn->close();
            }if ($query_action == 'update') {
                //post input string idinotification
                if (empty($_POST["idinotification"])) {
                    $errorMSG .= "idinotification is required to update row ";
                } else {
                    $idinotification = $_POST["idinotification"];
                }
                if ($errorMSG == '') {
                    include "./conexion.php";
                    $sql = "UPDATE notifications SET name = '$name', description = '$description', comments = '$comments', subject = '$subject', message = '$message', sender_email = '$sender_email', sender_name = '$sender_name' WHERE idinotification = '$idinotification'";
                    if ($conn->query($sql) === TRUE) {
                        if ($query_files == '') {
                            $this->notification_file_update($idinotification, $archivo, $nombre, $tamanio, $tipo);
                        } else {
                            echo 'success';
                        }
                    } else {
                        echo "Error: " . $conn->error;
                    }
                    $conn->close();
                } else {
                    echo $errorMSG;
                }
            }
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function notification_file_update($idinotification, $files, $files_name, $files_size, $files_type) {
        include './touploadfile.php';
        $sql = "UPDATE notifications SET files = '$files', files_name = '$files_name', files_size = '$files_size', files_type = '$files_type' WHERE idinotification = $idinotification";
        if ($conn->query($sql) === TRUE) {
            echo 'success';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    function get_notifications_id() {
        $errorMSG = "";
        if (empty($_GET["idinotification"])) {
            $errorMSG .= 'idinotification is required ';
        } else {
            $idinotification = $_GET["idinotification"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                                        notifications.idinotification,
                                        notifications.suspended,
                                        notifications.deleted,
                                        notifications.name,
                                        notifications.description,
                                        notifications.comments,
                                        notifications.subject,
                                        notifications.message,
                                        notifications.sender_email,
                                        notifications.sender_name,
                                        notifications.created,
                                        notifications.files_name
                                        FROM
                                        notifications
                                        WHERE notifications.idinotification = $idinotification";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function get_notifications() {
        $errorMSG = "";
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                                        notifications.idinotification,
                                        notifications.suspended,
                                        notifications.deleted,
                                        notifications.name,
                                        notifications.description,
                                        notifications.comments,
                                        notifications.subject,
                                        notifications.message,
                                        notifications.sender_email,
                                        notifications.sender_name,
                                        notifications.created,
                                        notifications.files_name
                                        FROM
                                        notifications WHERE
                                        notifications.deleted = 0";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * suspende un registro a la tabla de notifications
     * created by bennderodriguez
     */
    function suspended_notification() {
        $errorMSG = "";
        //post input string idinotification
        if (empty($_POST["idinotification"])) {
            $errorMSG .= "idinotification is required ";
        } else {
            $idinotification = $_POST["idinotification"];
        }
        //post input string suspended
        if (empty($_POST["suspended"])) {
            $suspended = '0';
        } else {
            $suspended = $_POST["suspended"];
        }

        // run query
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE notifications SET suspended = '$suspended' WHERE idinotification = '$idinotification'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function delete_notification() {
        $errorMSG = "";
        //post input string idinotification
        if (empty($_POST["idinotification"])) {
            $errorMSG .= "idinotification is required ";
        } else {
            $idinotification = $_POST["idinotification"];
        }

        // run query
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE notifications SET deleted = '1' WHERE idinotification = '$idinotification'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function send_notification() {
        $errorMSG = "";
        if (empty($_POST["idinotification"])) {
            $errorMSG .= 'idinotification is required ';
        } else {
            $idinotification = $_POST["idinotification"];
        }
        if (empty($_POST["notifications_to"])) {
            $errorMSG .= 'notifications_to is required ';
        } else {
            $notifications_to = $_POST["notifications_to"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "SELECT
                                        notifications.idinotification,
                                        notifications.suspended,
                                        notifications.deleted,
                                        notifications.name,
                                        notifications.description,
                                        notifications.comments,
                                        notifications.subject,
                                        notifications.message,
                                        notifications.sender_email,
                                        notifications.sender_name,
                                        notifications.created,
                                        notifications.files_name,
                                        notifications.files,
                                        notifications.files_size,
                                        notifications.files_type
                                        FROM
                                        notifications
                                        WHERE notifications.idinotification = $idinotification 
                                        AND notifications.suspended = 0";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $idinotification = $row["idinotification"];
                    $subject = $row["subject"];
                    $message = $row["message"];
                    $sender_email = $row["sender_email"];
                    $sender_name = $row["sender_name"];
                    $files_name = $row["files_name"];
                    $files = $row["files"];
                }
                $basedir = './upload/';
                file_put_contents($basedir . $files_name, $files);
                $files = array($basedir . $files_name);
                $request_mail = $this->multi_attach_mail($notifications_to, $subject, $message, $sender_email, $sender_name, $files);
                if ($request_mail) {
                    echo "success";
                } else {
                    echo "Ocurrio un error al enviar el correo al destinatario: $notifications_to";
                }
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * displaying mysql enum values in php
     * You can get an array of all possible enum values using the following function:
     * @param type $table_name
     * @param type $column_name
     * @return string
     */
    function enum_values($table_name, $column_name) {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT COLUMN_TYPE 
                                FROM INFORMATION_SCHEMA.COLUMNS
                                WHERE TABLE_NAME = '$table_name' 
                                AND COLUMN_NAME = '$column_name' ";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $enum_list = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE']) - 6))));
                //$rows['data'][] = $enum_list;
            }
            foreach ($enum_list as $val => $val_value) {
                $data = array(
                    "value" => "$val_value",
                );
                $rows['data'][] = $data;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function sendEmail() {
        $errorMSG = "";
        //to
        if (empty($_POST["name"])) {
            $errorMSG .= "name is required ";
        } else {
            $name = $_POST["name"];
        }
        //email
        if (empty($_POST["email"])) {
            $errorMSG .= "email is required ";
        } else {
            $to = $_POST["email"];
        }
        //        //archivo
        //        if (empty($_POST["archivo"])) {
        //            $errorMSG .= "archivo is required ";
        //        } else {
        //            $archivo = "";
        //        }
        //message
        if (empty($_POST["message"])) {
            $errorMSG .= "message is required ";
        } else {
            $message = $_POST["message"];
        }

        if ($errorMSG == "") {
            //email variables
            $from = $this->InstitutoEmail;
            $from_name = $this->Instituto;

            //attachment files path array
            $files = array('./cfdi/UCP' . $factura . '.pdf', './cfdi/UCP' . $factura . '.xml');
            $subject = 'Aprovecha y Estudia en línea Ahora!';
            $html_content = "<h1>$this->Instituto</h1> $name $message";

            //call multi_attach_mail() function and pass the required arguments
            //$send_email = multi_attach_mail($to, $subject, $html_content, $from, $from_name, $files);
            //$send_email = multi_attach_mail($to, $subject, $html_content, $from, $from_name, $files);
            $send_email = mail($to, $subject, $html_content);

            //print message after email sent
            echo $send_email ? "Correo Enviado Correctamente" : "No se pudo enviar el correo!";
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function setEstatusAspirante() {
        $errorMSG = "";
        if (empty($_POST["estatus"])) {
            $errorMSG = "estatus is required ";
        } else {
            $estatus = $_POST["estatus"];
        }
        if (empty($_POST["idigenerales"])) {
            $errorMSG = "idigenerales is required ";
        } else {
            $idigenerales = $_POST["idigenerales"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE tbregistro_generales SET estatus = '$estatus' WHERE idigenerales = '$idigenerales'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error : " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function setMotivosAspirante() {
        $errorMSG = "";
        if (empty($_POST["idiregistromotivo"])) {
            $errorMSG = "idiregistromotivo is required ";
        } else {
            $idiregistromotivo = $_POST["idiregistromotivo"];
        }
        if (empty($_POST["idigenerales"])) {
            $errorMSG = "idigenerales is required ";
        } else {
            $idigenerales = $_POST["idigenerales"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE tbregistro_generales SET idiregistromotivo = '$idiregistromotivo' WHERE idigenerales = '$idigenerales'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error : " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    // Actualiza la tabla tbCalificaciones dato el CalificacionId y la nueva calificacion
    function UpdateNotaAlumno() {
        $errorMSG = "";
        //CalificacionId
        if (empty($_POST["CalificacionId"])) {
            $errorMSG .= "CalificacionId is required ";
        } else {
            $CalificacionId = $_POST["CalificacionId"];
        }
        //Promedio
        if (empty($_POST["Promedio"])) {
            $Promedio = "0";
        } else {
            $Promedio = $_POST["Promedio"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE tbCalificaciones SET Promedio = $Promedio WHERE CalificacionId = $CalificacionId";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function xss($data) {
        $data = htmlspecialchars(addslashes(stripslashes(strip_tags(trim($data)))));
        return $data;
    }

    //cocnsulta el la tabla de clicos escolares
    function getMotivosAspirante() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT * FROM tbregistro_motivo";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getCiclo() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT * FROM cliclo ORDER BY cliclo.estatus ASC";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getCicloActive() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT
                                    cliclo.idiciclo,
                                    cliclo.deleted,
                                    cliclo.suspended,
                                    cliclo.NivelId,
                                    cliclo.PlantelId,
                                    cliclo.abrev,
                                    cliclo.ciclo,
                                    cliclo.inicio,
                                    cliclo.termino,
                                    cliclo.fecha,
                                    cliclo.limite_inscipcion,
                                    cliclo.estatus
                                    FROM
                                    cliclo
                                    WHERE
                                    cliclo.deleted = 0 AND
                                    cliclo.suspended = 0";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getCicloByEstatus() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT
                                    cliclo.idiciclo,
                                    cliclo.deleted,
                                    cliclo.suspended,
                                    cliclo.NivelId,
                                    cliclo.PlantelId,
                                    cliclo.abrev,
                                    cliclo.ciclo,
                                    cliclo.inicio,
                                    cliclo.termino,
                                    cliclo.fecha,
                                    cliclo.limite_inscipcion,
                                    cliclo.estatus 
                                    FROM
                                    cliclo 
                                    WHERE
                                    cliclo.deleted = 0 
                                    AND cliclo.suspended = 0";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getcAulas() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT * FROM cAulas";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getcAulasbyidicampus() {
        $errorMSG = "";
        //idiciclo
        if (empty($_GET["idicampus"])) {
            $errorMSG = "idicampus is required ";
        } else {
            $idicampus = $_GET["idicampus"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM cAulas WHERE idicampus=$idicampus";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    //get catalogo planes de pago
    function getPlanPago() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT
                plan_pago.idiplan,
                plan_pago.deleted,
                plan_pago.suspended,
                plan_pago.created,
                plan_pago.clave,
                plan_pago.descripcion,
                plan_pago.estatus 
                FROM
                plan_pago 
                WHERE
                plan_pago.deleted = 0 
                AND plan_pago.suspended =0";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getRole() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT * FROM role where estatus = 'Activo'";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getCategoriaPermision() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT DISTINCT categoria FROM permiso ORDER BY categoria ASC";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getPermisions() {
        $errorMSG = "";
        //getPermisions
        if (empty($_GET["categoria"])) {
            $errorMSG = "categoria is required ";
        } else {
            $categoria = $_GET["categoria"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM permiso WHERE categoria = '$categoria'";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getRoleAsPermision() {
        $errorMSG = "";
        //idirole
        if (empty($_GET["idirole"])) {
            $errorMSG = "idirole is required ";
        } else {
            $idirole = $_GET["idirole"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                                    role_as_permiso.idirol_permiso,
                                    permiso.descripcion,
                                    permiso.categoria,
                                    role.role,
                                    role.idirole,
                                    permiso.idipermiso
                                    FROM
                                    role_as_permiso
                                    INNER JOIN role ON role_as_permiso.idirole = role.idirole
                                    INNER JOIN permiso ON role_as_permiso.idipermiso = permiso.idipermiso
                                    WHERE role.idirole = $idirole ORDER BY permiso.categoria ASC";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    //consulta la tabla de cliclos escolares por idperiodo
    function getCicloByID() {
        $errorMSG = "";
        //idiciclo
        if (empty($_GET["idiciclo"])) {
            $errorMSG = "idiciclo is required ";
        } else {
            $idiciclo = $_GET["idiciclo"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM cliclo where idiciclo = $idiciclo";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getcGradosByIdcCarrera() {
        $errorMSG = "";
        //CarreraId
        if (empty($_GET["CarreraId"])) {
            $errorMSG = "CarreraId is required ";
        } else {
            $CarreraId = $_GET["CarreraId"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                    cGrados.GradosId,
                    cGrados.NivelId,
                    cGrados.deleted,
                    cGrados.suspended,
                    cGrados.Descripcion,
                    cGrados.Abreviatura,
                    cGrados.created,
                    cNiveles.Descripcion AS nivel,
                    carrera.nombre,
                    carrera.idicarrera
                    FROM
                    cGrados
                    INNER JOIN cNiveles ON cGrados.NivelId = cNiveles.NivelId
                    INNER JOIN carrera ON carrera.NivelId = cNiveles.NivelId
                    WHERE carrera.idicarrera = $CarreraId";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    //consulta la tabla de cliclos escolares por la abreviatura del periodo 192, 201 etc
    function getCicloByAbrev() {
        $errorMSG = "";
        //idiciclo
        if (empty($_GET["abrev"])) {
            $errorMSG = "abrev is required ";
        } else {
            $abrev = $_GET["abrev"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM cliclo where abrev = '$abrev'";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    // * Consulta el ultimo id de la tabla matrucila para obtener el consecutivo
    function getLastIdMatricula() {
        //SELECT MAX(idiventa) FROM venta
        include './conexion.php';
        $sql = "SELECT MAX(idimatricula) FROM matricula";
        $result = $conn->query($sql);
        $rows = null;
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows = $row["MAX(idimatricula)"];
            }
            return $rows;
        } else {
            if (empty($rows)) {
                $rows = 1;
                return $rows;
            } else {
                return $rows;
            }
        }
        $conn->close();
    }

    //retorna el numero de carrera necesario para formar la matricula
    function getNumero_Carrera($idiCarrera) {
        $numero = "";
        include './conexion.php';
        $sql = "select numero_carrera from carrera WHERE idicarrera= $idiCarrera";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $numero = $row["numero_carrera"];
            }
            return $numero;
        } else {
            return "";
        }
        $conn->close();
    }

    //retourna retorna la ultima matricuala agregada de la tabal matricula
    function getMatriculaByID($id) {
        //SELECT MAX(idiventa) FROM venta
        include './conexion.php';
        $sql = "SELECT matricula FROM matricula WHERE idimatricula = $id";
        $result = $conn->query($sql);
        $rows = "";
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows = $row["matricula"];
            }
            return $rows;
        } else {
            return "0 results";
        }
        $conn->close();
    }

    //consulta los datos generales de una persona basado en el ID
    function getDatosGeneralesbyId($idi) {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT * FROM datos_generales WHERE idigenerales =" . $idi;
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    //retorna la tabla de trofesores filtrada por idiprofesor
    function getDatosProfesorbyId($idi) {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT
                                    profesor.idiprofesor,
                                    profesor.idicampus,
                                    campus.campus,
                                    profesor.Clave,
                                    profesor.estatus,
                                    profesor.nombre,
                                    profesor.apellido_paterno,
                                    profesor.apellido_materno,
                                    profesor.genero,
                                    profesor.edad,
                                    profesor.curp,
                                    profesor.rfc,
                                    profesor.nss,
                                    profesor.email,
                                    profesor.telefono,
                                    profesor.movil,
                                    profesor.email2,
                                    profesor.pais,
                                    profesor.ciudad,
                                    profesor.direccion,
                                    profesor.municipio,
                                    profesor.cp,
                                    profesor.cedula,
                                    profesor.grado,
                                    profesor.perfil,
                                    profesor.infoadicional,
                                    profesor.tiposangre,
                                    profesor.alergias,
                                    profesor.fecha,
                                    profesor.fecha_nacimiento,
                                    profesor.emergencias,
                                    profesor.imagen_perfil,
                                    profesor.imagen_firma
                                    FROM
                                    profesor
                                    INNER JOIN campus ON profesor.idicampus = campus.idicampus
                                    WHERE
                                    profesor.idiprofesor = $idi";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    //devuelve la lista de tutores del estudiante por idiestudiante
    function getTutoresByID($idialumno) {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT
                tutor.iditutor,
                tutor.idialumno,
                tutor.deleted,
                tutor.parentesco,
                tutor.nombre,
                tutor.apellidos,
                tutor.telefono,
                tutor.celular,
                tutor.email,
                tutor.email2,
                tutor.pais,
                tutor.cuidad,
                tutor.cp,
                tutor.direccion,
                tutor.addinfo,
                tutor.fecha
                FROM
                tutor
                WHERE
                tutor.deleted = 0 
                AND tutor.idialumno = $idialumno";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    //consulta la table de datos generales y muestra la lista de pre inscripciones
    function getDatosGenerales() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT
                                    datos_generales.idigenerales,
                                    datos_generales.idimedio,
                                    datos_generales.deleted,
                                    datos_generales.suspended,
                                    datos_generales.estatus,
                                    datos_generales.nombre,
                                    datos_generales.apellido_paterno,
                                    datos_generales.apellido_materno,
                                    datos_generales.genero,
                                    datos_generales.estado_civil,
                                    datos_generales.edad,
                                    datos_generales.curp,
                                    datos_generales.rfc,
                                    datos_generales.nss,
                                    datos_generales.email,
                                    datos_generales.telefono,
                                    datos_generales.movil,
                                    datos_generales.email2,
                                    datos_generales.pais,
                                    datos_generales.ciudad,
                                    datos_generales.direccion,
                                    datos_generales.municipio,
                                    datos_generales.cp,
                                    datos_generales.escegreso,
                                    datos_generales.nivelegreso,
                                    datos_generales.entidad_fed,
                                    datos_generales.fecha_inicio,
                                    datos_generales.fechaegreso,
                                    datos_generales.cedula,
                                    datos_generales.infoadicional,
                                    datos_generales.tiposangre,
                                    datos_generales.alergias,
                                    datos_generales.fecha_nacimiento,
                                    datos_generales.interes,
                                    datos_generales.turno,
                                    datos_generales.emergencias,
                                    datos_generales.created,
                                    cMedioContacto.medio
                                    FROM
                                    datos_generales
                                    INNER JOIN cMedioContacto ON datos_generales.idimedio = cMedioContacto.idimedio
                                    WHERE datos_generales.estatus = 'pre-inscrito' AND
                                    datos_generales.deleted = 0
                                    ORDER BY datos_generales.idigenerales DESC";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getAspirantesById() {
        $errorMSG = "";
        //doc_nacimiento
        if (empty($_GET["idigenerales"])) {
            $errorMSG .= "idigenerales is required ";
        } else {
            $idigenerales = $_GET["idigenerales"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                                        datos_generales.idigenerales,
                                        datos_generales.idimedio,
                                        datos_generales.deleted,
                                        datos_generales.suspended,
                                        datos_generales.estatus,
                                        datos_generales.nombre,
                                        datos_generales.apellido_paterno,
                                        datos_generales.apellido_materno,
                                        datos_generales.genero,
                                        datos_generales.estado_civil,
                                        datos_generales.edad,
                                        datos_generales.curp,
                                        datos_generales.rfc,
                                        datos_generales.nss,
                                        datos_generales.email,
                                        datos_generales.telefono,
                                        datos_generales.movil,
                                        datos_generales.email2,
                                        datos_generales.pais,
                                        datos_generales.ciudad,
                                        datos_generales.direccion,
                                        datos_generales.municipio,
                                        datos_generales.cp,
                                        datos_generales.escegreso,
                                        datos_generales.nivelegreso,
                                        datos_generales.entidad_fed,
                                        datos_generales.fecha_inicio,
                                        datos_generales.fechaegreso,
                                        datos_generales.cedula,
                                        datos_generales.infoadicional,
                                        datos_generales.tiposangre,
                                        datos_generales.alergias,
                                        datos_generales.fecha_nacimiento,
                                        datos_generales.interes,
                                        datos_generales.turno,
                                        datos_generales.emergencias,
                                        datos_generales.created 
                                        FROM
                                        datos_generales 
                                        WHERE
                                        datos_generales.idigenerales = $idigenerales";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getAspirantes() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT
                                    datos_generales.idigenerales,
                                    datos_generales.estatus,
                                    datos_generales.nombre,
                                    datos_generales.apellido_paterno,
                                    datos_generales.apellido_materno,
                                    datos_generales.genero,
                                    datos_generales.edad,
                                    datos_generales.curp,
                                    datos_generales.rfc,
                                    datos_generales.nss,
                                    datos_generales.email,
                                    datos_generales.telefono,
                                    datos_generales.movil,
                                    datos_generales.email2,
                                    datos_generales.pais,
                                    datos_generales.ciudad,
                                    datos_generales.direccion,
                                    datos_generales.municipio,
                                    datos_generales.cp,
                                    datos_generales.escegreso,
                                    datos_generales.nivelegreso,
                                    datos_generales.fechaegreso,
                                    datos_generales.infoadicional,
                                    datos_generales.tiposangre,
                                    datos_generales.alergias,
                                    datos_generales.fecha,
                                    datos_generales.fecha_nacimiento,
                                    datos_generales.interes,
                                    datos_generales.turno,
                                    datos_generales.emergencias,
                                    datos_generales.idimedio,
                                    tbregistro_generales.idiregistro,
                                    tbregistro_generales.idiregistromotivo,
                                    tbregistro_generales.send_promotions,
                                    tbregistro_generales.tipo_registro,
                                    tbregistro_generales.estatus as estatus2,
                                    tbregistro_generales.medio_contacto,
                                    tbregistro_generales.comentarios,
                                    tbregistro_generales.last_update,
                                    tbregistro_motivo.motivo
                                    FROM
                                    datos_generales
                                    INNER JOIN tbregistro_generales ON tbregistro_generales.idigenerales = datos_generales.idigenerales
                                    INNER JOIN tbregistro_motivo ON tbregistro_generales.idiregistromotivo = tbregistro_motivo.idiregistromotivo
                                    WHERE datos_generales.estatus = 'pre-inscrito'
                                    ORDER BY idigenerales DESC";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function countAllAlumno() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT COUNT(*) as total from alumno";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getProfesores() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT
                            p.imagen_perfil,
                            p.idiprofesor,
                            c.campus AS plantel,
                            p.nombre,
                            p.apellido_paterno,
                            p.apellido_materno,
                            p.estatus
                            FROM
                            profesor AS p,
                            campus AS c 
                            WHERE
                            p.idicampus = c.idicampus
                            order by idiprofesor desc";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function borrarProf() {
        $errorMSG = "";
        //idiprofesor
        if (empty($_POST["idiprofesor"])) {
            $errorMSG = "idiprofesor is required ";
        } else {
            $idiprofesor = $_POST["idiprofesor"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            // sql to delete a record
            $sql = "DELETE FROM profesor WHERE idiprofesor=$idiprofesor";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function deleteRole() {
        $errorMSG = "";
        if (empty($_POST["idirole"])) {
            $errorMSG = "idirole is required ";
        } else {
            $idirole = $_POST["idirole"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE role SET estatus = 'Inactivo' WHERE idirole = $idirole";
            if ($conn->query($sql) === TRUE) {
                echo "El Rol se elimino correctamente";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function updateEditPermision() {
        $errorMSG = "";
        if (empty($_POST["idirole"])) {
            $errorMSG = "idirole is required ";
        } else {
            $idirole = $_POST["idirole"];
        }
        if (empty($_POST["edit"])) {
            $errorMSG = "edit is required ";
        } else {
            $edit = $_POST["edit"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE role SET edit = $edit WHERE idirole = $idirole";
            if ($conn->query($sql) === TRUE) {
                echo "Permiso acualizado Correctamente";
            } else {
                echo "Error : " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function deletePlan() {
        $errorMSG = "";
        if (empty($_POST["idiplan"])) {
            $errorMSG = "idiplan is required ";
        } else {
            $idiplan = $_POST["idiplan"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE plan_pago SET estatus = 'bloqueado', deleted = 1 WHERE idiplan = $idiplan";
            if ($conn->query($sql) === TRUE) {
                echo "El Plan de pago se elimino correctamente";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function borrarUserSAEM() {
        $errorMSG = "";
        //idiprofesor
        if (empty($_POST["idiuser"])) {
            $errorMSG = "idiuser is required ";
        } else {
            $idiuser = $_POST["idiuser"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            // sql to delete a record
            $sql = "DELETE FROM tbuser WHERE idiuser = $idiuser";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function borrarAspirante() {
        $errorMSG = "";
        //idiprofesor
        if (empty($_POST["idigenerales"])) {
            $errorMSG = "idigenerales is required ";
        } else {
            $idigenerales = $_POST["idigenerales"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            // sql to delete a record
            $sql = "DELETE FROM datos_generales WHERE idigenerales=$idigenerales";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getnewSatudent() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT count(*) as total FROM alumno where estatus = 'Nuevo Ingreso' and cuatrimestre = '1'";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getManPerson() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT count(*) as total FROM datos_generales where genero = 'Masculino'";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getcDocumentos() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT
                                    cDocumentos.ididocumento,
                                    cDocumentos.deleted,
                                    cDocumentos.suspended,
                                    cDocumentos.type,
                                    cDocumentos.description,
                                    cDocumentos.comments
                                    FROM
                                    cDocumentos
                                    WHERE 
                                    cDocumentos.deleted = 0 AND
                                    cDocumentos.suspended = 0 AND
                                    cDocumentos.type = 'Alumno'";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getWomanPerson() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT count(*) as total FROM datos_generales where genero = 'Femenino'";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function countAllAspiirante() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT count(*) as total FROM datos_generales where estatus = 'pre-inscrito'";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function countStudentByCampusId() {
        $idicampus = $_GET["idicampus"];
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT
                                COUNT(*) as total
                                FROM
                                alumno
                                INNER JOIN campus ON alumno.idicampus = campus.idicampus
                                WHERE campus.idicampus = $idicampus";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    //En cuanto se crea un alumno, guarda la foto tomada en la tabla archivo con el id del estudiante
    function addImageAlumno($last_id) {
        $var = null;
        $errorMSG = "";
        //idicarrera
        if (empty($_POST["image"])) {
            $fileName = 'usermix.jpg';
        } else {
            $img = $_POST["image"];
            $fileName = uniqid() . '.png';
            $folderPath = "upload/";
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $file = $folderPath . $fileName;
            $contenido = addslashes($image_base64);
            file_put_contents($file, $image_base64);
        }
        if (empty($_POST["signaturePicture"])) {
            $signaturePicture = "empty_sing.png";
        } else {
            $signaturePicture = $_POST["signaturePicture"];
        }

        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE alumno SET perfil = '$fileName' WHERE idialumno = '$last_id';";
            $sql .= "UPDATE alumno SET firma = '$signaturePicture' WHERE idialumno = '$last_id';";
            if ($conn->multi_query($sql) === TRUE) {
                //echo "success";
                $var = true;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                $var = false;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
                $var = false;
            } else {
                echo $errorMSG;
                $var = false;
            }
        }
        return $var;
    }

    function getImageAlumnoByID($idialumno) {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT perfil, firma FROM alumno WHERE idialumno = $idialumno";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getImageProfesorByID($idiprofesor) {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT imagen_perfil, idiprofesor, nombre, apellido_paterno, apellido_materno FROM profesor WHERE idiprofesor = $idiprofesor";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getSignUserByID($idiprofesor) {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT imagen_firma FROM profesor WHERE idiprofesor = $idiprofesor";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function updateImageAlumnoByIDArchivo() {
        $errorMSG = "";
        //idiarchivo
        if (empty($_POST["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_POST["idialumno"];
        }
        //image
        if (empty($_POST["image"])) {
            $errorMSG .= "image is required ";
        } else {
            $img = $_POST["image"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $img = $_POST['image'];
            $folderPath = "upload/";
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = uniqid() . '.png';
            $file = $folderPath . $fileName;
            $contenido = addslashes($image_base64);
            file_put_contents($file, $image_base64);

            $sql = "UPDATE alumno SET perfil = '" . $fileName . "' WHERE idialumno = $idialumno";
            if ($conn->query($sql) === TRUE) {
                echo "Imagen Actualizada";
            } else {
                echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function updateImageProfesorById() {
        $errorMSG = "";
        //idiarchivo
        if (empty($_POST["idiprofesor"])) {
            $errorMSG = "idiprofesor is required ";
        } else {
            $idiprofesor = $_POST["idiprofesor"];
        }
        //image
        if (empty($_POST["image"])) {
            $errorMSG .= "image is required ";
        } else {
            $img = $_POST["image"];
        }
        if ($errorMSG == "") {
            $img = $_POST['image'];
            $folderPath = "upload/";
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = uniqid() . '.png';
            $file = $folderPath . $fileName;
            $contenido = addslashes($image_base64);
            file_put_contents($file, $image_base64);

            include './conexion.php';
            $sql = "UPDATE profesor SET imagen_perfil = '" . $fileName . "' WHERE idiprofesor = $idiprofesor;";
            if ($conn->query($sql) === TRUE) {
                echo "Imagen Actualizada";
            } else {
                echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function updateSignProfesorById() {
        $errorMSG = "";
        if (empty($_POST["idiprofesor"])) {
            $errorMSG = "idiprofesor is required ";
        } else {
            $idiprofesor = $_POST["idiprofesor"];
        }
        if (empty($_POST["sign"])) {
            $errorMSG = "sign is required ";
        } else {
            $sign = $_POST["sign"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE profesor SET imagen_firma ='$sign' WHERE idiprofesor = '$idiprofesor'";
            if ($conn->query($sql) === TRUE) {
                echo "Firma actualizada";
            } else {
                echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function addDatosGenerales() {
        $errorMSG = "";
        //estatus
        if (empty($_POST["estatus"])) {
            $estatus = "";
        } else {
            $estatus = $_POST["estatus"];
        }
        //nombre
        if (empty($_POST["nombre"])) {
            $errorMSG = "nombre is required ";
        } else {
            $nombre = $_POST["nombre"];
        }
        //apellidos
        if (empty($_POST["apellido_paterno"])) {
            $errorMSG .= "apellido_paterno is required ";
        } else {
            $apellido_paterno = $_POST["apellido_paterno"];
        }
        if (empty($_POST["apellido_materno"])) {
            $apellido_materno = "";
        } else {
            $apellido_materno = $_POST["apellido_materno"];
        }
        //genero
        if (empty($_POST["genero"])) {
            $genero = "";
        } else {
            $genero = $_POST["genero"];
        }
        //edad
        if (empty($_POST["edad"])) {
            $edad = "18";
        } else {
            $edad = $_POST["edad"];
        }
        //curp
        if (empty($_POST["curp"])) {
            $curp = "";
        } else {
            $curp = $_POST["curp"];
        }
        //rfc
        if (empty($_POST["rfc"])) {
            $rfc = "";
        } else {
            $rfc = $_POST["rfc"];
        }
        //nss
        if (empty($_POST["nss"])) {
            $nss = "";
        } else {
            $nss = $_POST["nss"];
        }
        //email
        if (empty($_POST["email"])) {
            $email = "";
        } else {
            $email = $_POST["email"];
        }
        //telefono
        if (empty($_POST["telefono"])) {
            $telefono = "";
        } else {
            $telefono = $_POST["telefono"];
        }
        //movil
        if (empty($_POST["movil"])) {
            $movil = "";
        } else {
            $movil = $_POST["movil"];
        }
        //email2
        if (empty($_POST["email2"])) {
            $email2 = "";
        } else {
            $email2 = $_POST["email2"];
        }
        //pais
        if (empty($_POST["pais"])) {
            $pais = "";
        } else {
            $pais = $_POST["pais"];
        }
        //ciudad
        if (empty($_POST["ciudad"])) {
            $ciudad = "";
        } else {
            $ciudad = $_POST["ciudad"];
        }
        //direccion
        if (empty($_POST["direccion"])) {
            $direccion = "";
        } else {
            $direccion = $_POST["direccion"];
        }
        //num
        if (empty($_POST["num"])) {
            $num = "";
        } else {
            $num = "#" . $_POST["num"] . " ";
        }
        //municipio
        if (empty($_POST["municipio"])) {
            $municipio = "";
        } else {
            $municipio = $_POST["municipio"];
        }
        //cp
        if (empty($_POST["cp"])) {
            $cp = null;
        } else {
            $cp = $_POST["cp"];
        }
        //escegreso
        if (empty($_POST["escegreso"])) {
            $escegreso = "";
        } else {
            $escegreso = $_POST["escegreso"];
        }
        //nivelegreso
        if (empty($_POST["nivelegreso"])) {
            $nivelegreso = "";
        } else {
            $nivelegreso = $_POST["nivelegreso"];
        }
        //fechaegreso
        if (empty($_POST["fechaegreso"])) {
            $fechaegreso = "";
        } else {
            $fechaegreso = $_POST["fechaegreso"];
        }
        //infoadicional
        if (empty($_POST["infoadicional"])) {
            $infoadicional = "";
        } else {
            $infoadicional = $_POST["infoadicional"];
        }
        //tiposangre
        if (empty($_POST["tiposangre"])) {
            $tiposangre = "";
        } else {
            $tiposangre = $_POST["tiposangre"];
        }
        //alergias
        if (empty($_POST["alergias"])) {
            $alergias = "";
        } else {
            $alergias = $_POST["alergias"];
        }
        //fecha_nacimiento
        if (empty($_POST["fecha_nacimiento"])) {
            $fecha_nacimiento = date("Y/m/d");
        } else {
            $fecha_nacimiento = $_POST["fecha_nacimiento"];
        }
        //interes
        if (empty($_POST["interes"])) {
            $interes = "";
        } else {
            $interes = $_POST["interes"];
        }
        //turno
        if (empty($_POST["turno"])) {
            $turno = "";
        } else {
            $turno = $_POST["turno"];
        }
        //emergencias
        if (empty($_POST["emergencias"])) {
            $emergencias = "";
        } else {
            $emergencias = $_POST["emergencias"];
        }
        //idimedio
        if (empty($_POST["idimedio"])) {
            $idimedio = "";
        } else {
            $idimedio = $_POST["idimedio"];
        }

        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO datos_generales (estatus, nombre, apellido_paterno, apellido_materno, genero, edad, curp, rfc, nss, email, telefono, movil, email2, pais, ciudad, direccion, municipio, cp, escegreso, nivelegreso, fechaegreso, infoadicional, tiposangre, alergias, fecha_nacimiento, interes, turno, emergencias, idimedio) VALUES "
                    . "                         ('" . $estatus . "', '" . strtoupper($nombre) . "', '" . strtoupper($apellido_paterno) . "', '" . strtoupper($apellido_materno) . "','" . $genero . "', '" . $edad . "', '" . $curp . "', '" . $rfc . "', '" . $nss . "','" . $email . "', '" . $telefono . "', '" . $movil . "', '" . $email2 . "', '" . $pais . "', '" . $ciudad . "', '" . $num . $direccion . "', '" . $municipio . "', '" . $cp . "', '" . $escegreso . "', '" . $nivelegreso . "', '" . $fechaegreso . "', '" . $infoadicional . "', '" . $tiposangre . "', '" . $alergias . "', '" . $fecha_nacimiento . "','" . $interes . "','" . $turno . "', '" . $emergencias . "', '$idimedio');";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function updateDatosGenerales() {
        $errorMSG = "";
        //post input string nombre
        if (empty($_POST["nombre"])) {
            $errorMSG .= "nombre is required ";
        } else {
            $nombre = $_POST["nombre"];
        }
        //post input string apellido_paterno
        if (empty($_POST["apellido_paterno"])) {
            $apellido_paterno = null;
        } else {
            $apellido_paterno = $_POST["apellido_paterno"];
        }
        //post input string apellido_materno
        if (empty($_POST["apellido_materno"])) {
            $apellido_materno = null;
        } else {
            $apellido_materno = $_POST["apellido_materno"];
        }
        //post input string estado_civil
        if (empty($_POST["estado_civil"])) {
            $estado_civil = 'Sin especificar';
        } else {
            $estado_civil = $_POST["estado_civil"];
        }
        //post input string genero
        if (empty($_POST["genero"])) {
            $genero = 'Sin especificar';
        } else {
            $genero = $_POST["genero"];
        }
        //post input string edad
        if (empty($_POST["edad"])) {
            $edad = '18';
        } else {
            $edad = $_POST["edad"];
        }
        //post input string curp
        if (empty($_POST["curp"])) {
            $curp = null;
        } else {
            $curp = $_POST["curp"];
        }
        //post input string rfc
        if (empty($_POST["rfc"])) {
            $rfc = null;
        } else {
            $rfc = $_POST["rfc"];
        }
        //post input string nss
        if (empty($_POST["nss"])) {
            $nss = null;
        } else {
            $nss = $_POST["nss"];
        }
        //post input string email
        if (empty($_POST["email"])) {
            $errorMSG .= "email is required ";
        } else {
            $email = $_POST["email"];
        }
        //post input string telefono
        if (empty($_POST["telefono"])) {
            $telefono = null;
        } else {
            $telefono = $_POST["telefono"];
        }
        //post input string movil
        if (empty($_POST["movil"])) {
            $movil = null;
        } else {
            $movil = $_POST["movil"];
        }
        //post input string email2
        if (empty($_POST["email2"])) {
            $email2 = null;
        } else {
            $email2 = $_POST["email2"];
        }
        //post input string pais
        if (empty($_POST["pais"])) {
            $pais = null;
        } else {
            $pais = $_POST["pais"];
        }
        //post input string ciudad
        if (empty($_POST["ciudad"])) {
            $ciudad = null;
        } else {
            $ciudad = $_POST["ciudad"];
        }
        //post input string direccion
        if (empty($_POST["direccion"])) {
            $direccion = null;
        } else {
            $direccion = $_POST["direccion"];
        }
        //post input string municipio
        if (empty($_POST["municipio"])) {
            $municipio = null;
        } else {
            $municipio = $_POST["municipio"];
        }
        //post input string cp
        if (empty($_POST["cp"])) {
            $cp = null;
        } else {
            $cp = $_POST["cp"];
        }
        //post input string escegreso
        if (empty($_POST["escegreso"])) {
            $escegreso = null;
        } else {
            $escegreso = $_POST["escegreso"];
        }
        //post input string nivelegreso
        if (empty($_POST["nivelegreso"])) {
            $nivelegreso = null;
        } else {
            $nivelegreso = $_POST["nivelegreso"];
        }
        //post input string entidad_fed
        if (empty($_POST["entidad_fed"])) {
            $entidad_fed = null;
        } else {
            $entidad_fed = $_POST["entidad_fed"];
        }
        //post input string fecha_inicio
        if (empty($_POST["fecha_inicio"])) {
            $fecha_inicio = null;
        } else {
            $fecha_inicio = $_POST["fecha_inicio"];
        }
        //post input string fechaegreso
        if (empty($_POST["fechaegreso"])) {
            $fechaegreso = null;
        } else {
            $fechaegreso = $_POST["fechaegreso"];
        }
        //post input string infoadicional
        if (empty($_POST["infoadicional"])) {
            $infoadicional = null;
        } else {
            $infoadicional = $_POST["infoadicional"];
        }
        //post input string tiposangre
        if (empty($_POST["tiposangre"])) {
            $tiposangre = '';
        } else {
            $tiposangre = $_POST["tiposangre"];
        }
        //post input string alergias
        if (empty($_POST["alergias"])) {
            $alergias = null;
        } else {
            $alergias = $_POST["alergias"];
        }
        //post input string fecha_nacimiento
        if (empty($_POST["fecha_nacimiento"])) {
            $fecha_nacimiento = null;
        } else {
            $fecha_nacimiento = $_POST["fecha_nacimiento"];
        }
        //post input string lugar_nacimiento
        if (empty($_POST["lugar_nacimiento"])) {
            $lugar_nacimiento = null;
        } else {
            $lugar_nacimiento = $_POST["lugar_nacimiento"];
        }
        //post input string interes
        if (empty($_POST["interes"])) {
            $interes = null;
        } else {
            $interes = $_POST["interes"];
        }
        //post input string emergencias
        if (empty($_POST["emergencias"])) {
            $emergencias = null;
        } else {
            $emergencias = $_POST["emergencias"];
        }
        //comentarios
        if (empty($_POST["comentarios"])) {
            $comentarios = null;
        } else {
            $comentarios = $_POST["comentarios"];
        }
        //post input string query_action
        if (empty($_POST["query_action"])) {
            $errorMSG .= "query_action is required ";
        } else {
            $query_action = $_POST["query_action"];
        }

        // run query
        if ($errorMSG == "") {
            if ($query_action == 'update') {
                //post input string idigenerales
                if (empty($_POST["idigenerales"])) {
                    $errorMSG = "idigenerales is required ";
                } else {
                    $idigenerales = $_POST["idigenerales"];
                }
                if ($errorMSG == "") {
                    include "./conexion.php";
                    $sql = "UPDATE datos_generales SET nombre = '$nombre', apellido_paterno = '$apellido_paterno', apellido_materno = '$apellido_materno', estado_civil = '$estado_civil', genero = '$genero', edad = '$edad', curp = '$curp', rfc = '$rfc', nss = '$nss', email = '$email', telefono = '$telefono', movil = '$movil', email2 = '$email2', pais = '$pais', ciudad = '$ciudad', direccion = '$direccion', municipio = '$municipio', cp = '$cp', escegreso = '$escegreso', nivelegreso = '$nivelegreso', entidad_fed = '$entidad_fed', fecha_inicio = '$fecha_inicio', fechaegreso = '$fechaegreso', infoadicional = '$infoadicional', tiposangre = '$tiposangre', alergias = '$alergias', fecha_nacimiento = '$fecha_nacimiento', emergencias = '$emergencias' WHERE idigenerales = '$idigenerales';";
                    if ($conn->query($sql) === TRUE) {
                        echo 'success';
                    } else {
                        echo "Error: " . $conn->error;
                    }
                    $conn->close();
                } else {
                    if ($errorMSG == "") {
                        echo "Something went wrong :(";
                    } else {
                        echo $errorMSG;
                    }
                }
            }
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function addDocumentos() {
        $errorMSG = "";
        //doc_nacimiento
        if (empty($_POST["doc_nacimiento"])) {
            $doc_nacimiento = "no";
        } else {
            $doc_nacimiento = $_POST["doc_nacimiento"];
        }
        if (empty($_POST["doc_nacimiento_copia"])) {
            $doc_nacimiento_copia = "no";
        } else {
            $doc_nacimiento_copia = $_POST["doc_nacimiento_copia"];
        }
        //doc_certificado
        if (empty($_POST["doc_certificado"])) {
            $doc_certificado = "no";
        } else {
            $doc_certificado = $_POST["doc_certificado"];
        }
        if (empty($_POST["doc_certificado_copia"])) {
            $doc_certificado_copia = "no";
        } else {
            $doc_certificado_copia = $_POST["doc_certificado_copia"];
        }
        //doc_curp
        if (empty($_POST["doc_curp"])) {
            $doc_curp = "no";
        } else {
            $doc_curp = $_POST["doc_curp"];
        }
        if (empty($_POST["doc_curp_copia"])) {
            $doc_curp_copia = "no";
        } else {
            $doc_curp_copia = $_POST["doc_curp_copia"];
        }
        //doc_ine
        if (empty($_POST["doc_ine"])) {
            $doc_ine = "no";
        } else {
            $doc_ine = $_POST["doc_ine"];
        }
        if (empty($_POST["doc_ine_copia"])) {
            $doc_ine_copia = "no";
        } else {
            $doc_ine_copia = $_POST["doc_ine_copia"];
        }
        //doc_fotos
        if (empty($_POST["doc_fotos"])) {
            $doc_fotos = "no";
        } else {
            $doc_fotos = $_POST["doc_fotos"];
        }
        //doc_comprobante
        if (empty($_POST["doc_comprobante"])) {
            $doc_comprobante = "no";
        } else {
            $doc_comprobante = $_POST["doc_comprobante"];
        }
        if (empty($_POST["doc_comprobante_copia"])) {
            $doc_comprobante_copia = "no";
        } else {
            $doc_comprobante_copia = $_POST["doc_comprobante_copia"];
        }
        //idialumno
        if (empty($_POST["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_POST["idialumno"];
        }

        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE alumno SET doc_nacimiento = '" . $doc_nacimiento . "', doc_nacimiento_copia = '$doc_nacimiento_copia', doc_certificado = '" . $doc_certificado . "',doc_certificado_copia = '" . $doc_certificado_copia . "', doc_curp = '" . $doc_curp . "', doc_curp_copia = '" . $doc_curp_copia . "', doc_ine = '" . $doc_ine . "', doc_ine_copia = '" . $doc_ine_copia . "', doc_fotos = '" . $doc_fotos . "', doc_comprobante = '" . $doc_comprobante . "', doc_comprobante_copia = '" . $doc_comprobante_copia . "'  WHERE alumno.idialumno = " . $idialumno;
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    //Actualiza el estatus de una persona de Pre-Inscrito a Inscrito
    function UpdateEstatusGeneral($idigeneral) {
        include './conexion.php';
        $sql = "UPDATE datos_generales SET estatus = 'Inscrito' WHERE datos_generales.idigenerales = " . $idigeneral . ";";
        if ($conn->query($sql) === TRUE) {
            //echo "Estatus Updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    //consulta la table de ccarrera
    function getOferta() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT
                                carrera.idicarrera,
                                carrera.NivelId,
                                carrera.idicampus,
                                carrera.idinotification,
                                carrera.deleted,
                                carrera.suspended,
                                carrera.nombre,
                                carrera.description,
                                carrera.salary,
                                carrera.available,
                                cNiveles.Descripcion as nivel
                                FROM
                                carrera
                                INNER JOIN cNiveles ON carrera.NivelId = cNiveles.NivelId
                                WHERE
                                carrera.deleted = 0 AND
                                carrera.suspended = 0";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getNivel() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT
                cNiveles.NivelId,
                cNiveles.deleted,
                cNiveles.suspended,
                cNiveles.Descripcion,
                cNiveles.Abreviatura,
                cNiveles.created
                FROM
                cNiveles
                WHERE 
                cNiveles.deleted = 0 AND
                cNiveles.suspended = 0";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getcGrados_NivelId() {
        $errorMSG = "";
        //doc_nacimiento
        if (empty($_GET["NivelId"])) {
            $errorMSG .= "NivelId is required ";
        } else {
            $NivelId = $_GET["NivelId"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                                        cGrados.GradosId,
                                        cGrados.NivelId,
                                        cGrados.deleted,
                                        cGrados.suspended,
                                        cGrados.Descripcion,
                                        cGrados.Abreviatura 
                                        FROM
                                        cGrados 
                                        WHERE
                                        cGrados.NivelId = $NivelId 
                                        AND cGrados.deleted = 0 
                                        AND cGrados.suspended = 0";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getcGrados_NivelIdSuspended() {
        $errorMSG = "";
        //doc_nacimiento
        if (empty($_GET["NivelId"])) {
            $errorMSG .= "NivelId is required ";
        } else {
            $NivelId = $_GET["NivelId"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                                        cGrados.GradosId,
                                        cGrados.NivelId,
                                        cGrados.deleted,
                                        cGrados.suspended,
                                        cGrados.Descripcion,
                                        cGrados.Abreviatura 
                                        FROM
                                        cGrados 
                                        WHERE
                                        cGrados.NivelId = $NivelId 
                                        AND cGrados.deleted = 0 ";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getNivelbyId() {
        $errorMSG = "";
        //doc_nacimiento
        if (empty($_GET["NivelId"])) {
            $errorMSG .= "NivelId is required ";
        } else {
            $NivelId = $_GET["NivelId"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM cNiveles where NivelId = $NivelId";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getcCarrerasbyID() {
        $errorMSG = "";
        //doc_nacimiento
        if (empty($_GET["NivelId"])) {
            $errorMSG .= "NivelId is required ";
        } else {
            $NivelId = $_GET["NivelId"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM carrera where NivelId = $NivelId";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getcGrados_GradosId() {
        $errorMSG = "";
        //GradosId
        if (empty($_GET["GradosId"])) {
            $errorMSG .= "GradosId is required ";
        } else {
            $GradosId = $_GET["GradosId"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                                        cGrados.GradosId,
                                        cGrados.NivelId,
                                        cGrados.deleted,
                                        cGrados.suspended,
                                        cGrados.Descripcion,
                                        cGrados.Abreviatura,
                                        cGrados.created
                                        FROM
                                        cGrados
                                        WHERE
                                        cGrados.GradosId = $GradosId";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getbMateriasbyID() {
        $errorMSG = "";
        //doc_nacimiento
        if (empty($_GET["CarreraId"])) {
            $errorMSG .= "CarreraId is required ";
        } else {
            $CarreraId = $_GET["CarreraId"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT m.MateriaId, g.Descripcion as GradoId, m.Clave, m.Nombre from tbMaterias as m, cGrados as g WHERE m.GradoId = g.GradosId AND m.CarreraId = $CarreraId";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getTurnoAll() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT * FROM cTurno";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getcTipoEvaluacionPeriodo() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT * FROM cTipoEvaluacionPeriodo";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getTurno() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT
                                    cTurno.TurnoId,
                                    cTurno.deleted,
                                    cTurno.suspended,
                                    cTurno.Descripcion,
                                    cTurno.created
                                    FROM
                                    cTurno
                                    WHERE
                                    cTurno.deleted =0";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getTurnoActive() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT
                                    cTurno.TurnoId,
                                    cTurno.deleted,
                                    cTurno.suspended,
                                    cTurno.Descripcion,
                                    cTurno.created
                                    FROM
                                    cTurno
                                    WHERE
                                    cTurno.suspended =0 AND
                                    cTurno.deleted =0";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getPlantel() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT * FROM campus";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getOfertaById($id) {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT * FROM carrera where idicarrera = " . $id;
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getcardAlumno() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT
                datos_generales.idigenerales,
                datos_generales.nombre,
                datos_generales.apellido_paterno,
                datos_generales.apellido_materno,
                datos_generales.email,
                alumno.idialumno,
                alumno.matricula,
                alumno.cuatrimestre,
                alumno.cuatrimestres_trasncurridos,
                alumno.beca_colegiatura,
                alumno.generacion,
                carrera.idicarrera,
                carrera.nombre AS carrera,
                cNiveles.Descripcion AS categoria,
                datos_generales.nombre AS nomalu,
                credencial.codigo_credencial,
                credencial.idimoodle,
                credencial.moodle_request,
                datos_generales.deleted,
                datos_generales.suspended,
                cTurno.Descripcion AS turno,
                datos_generales.estatus
                FROM
                datos_generales
                INNER JOIN alumno ON alumno.idigenerales = datos_generales.idigenerales
                INNER JOIN carrera ON alumno.idicarrera = carrera.idicarrera
                INNER JOIN cNiveles ON carrera.NivelId = cNiveles.NivelId
                INNER JOIN credencial ON credencial.idialumno = alumno.idialumno
                INNER JOIN cTurno ON alumno.TurnoId = cTurno.TurnoId
                WHERE
                datos_generales.deleted = 0 AND
                datos_generales.suspended = 0";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getcardAlumnoAll() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT
                                    alumno.idialumno,
                                    alumno.idigenerales,
                                    alumno.idicarrera,
                                    alumno.TurnoId,
                                    alumno.idiuser,
                                    alumno.matricula,
                                    alumno.generacion,
                                    alumno.cuatrimestre,
                                    alumno.cuatrimestres_trasncurridos,
                                    alumno.alta,
                                    alumno.beca_colegiatura,
                                    alumno.rfc_factura,
                                    alumno.uso_factura,
                                    alumno.razon_social,
                                    alumno.perfil,
                                    alumno.firma,
                                    datos_generales.deleted,
                                    datos_generales.suspended,
                                    datos_generales.estatus,
                                    datos_generales.nombre,
                                    datos_generales.apellido_paterno,
                                    datos_generales.apellido_materno,
                                    datos_generales.genero,
                                    datos_generales.estado_civil,
                                    datos_generales.edad,
                                    datos_generales.curp,
                                    datos_generales.rfc,
                                    datos_generales.nss,
                                    datos_generales.email,
                                    datos_generales.telefono,
                                    datos_generales.movil,
                                    carrera.nombre AS carrera,
                                    cNiveles.Descripcion AS cNiveles,
                                    cTurno.Descripcion AS cTurno 
                                    FROM
                                    alumno
                                    INNER JOIN datos_generales ON alumno.idigenerales = datos_generales.idigenerales
                                    INNER JOIN carrera ON alumno.idicarrera = carrera.idicarrera
                                    INNER JOIN cNiveles ON carrera.NivelId = cNiveles.NivelId
                                    INNER JOIN cTurno ON alumno.TurnoId = cTurno.TurnoId 
                                    WHERE
                                    datos_generales.deleted = 0 
                                    ORDER BY alumno.idialumno DESC";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getAlumnoByCarreraAndGradoAndPlantel() {
        $errorMSG = "";
        //doc_nacimiento
        if (empty($_GET["idicarrera"])) {
            $idicarrera = '';
        } else {
            $idicarrera = 'AND alumno.idicarrera = ' . $_GET["idicarrera"];
        }

        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                                    alumno.idialumno,
                                    alumno.idigenerales,
                                    alumno.idicarrera,
                                    alumno.TurnoId,
                                    alumno.idiuser,
                                    alumno.matricula,
                                    alumno.generacion,
                                    alumno.cuatrimestre,
                                    alumno.cuatrimestres_trasncurridos,
                                    alumno.alta,
                                    alumno.beca_colegiatura,
                                    alumno.rfc_factura,
                                    alumno.uso_factura,
                                    alumno.razon_social,
                                    alumno.perfil,
                                    alumno.firma,
                                    datos_generales.deleted,
                                    datos_generales.suspended,
                                    datos_generales.estatus,
                                    datos_generales.nombre,
                                    datos_generales.apellido_paterno,
                                    datos_generales.apellido_materno,
                                    datos_generales.genero,
                                    datos_generales.estado_civil,
                                    datos_generales.edad,
                                    datos_generales.curp,
                                    datos_generales.rfc,
                                    datos_generales.nss,
                                    datos_generales.email,
                                    datos_generales.telefono,
                                    datos_generales.movil,
                                    carrera.nombre AS carrera,
                                    cNiveles.Descripcion AS cNiveles,
                                    cTurno.Descripcion AS cTurno 
                                    FROM
                                    alumno
                                    INNER JOIN datos_generales ON alumno.idigenerales = datos_generales.idigenerales
                                    INNER JOIN carrera ON alumno.idicarrera = carrera.idicarrera
                                    INNER JOIN cNiveles ON carrera.NivelId = cNiveles.NivelId
                                    INNER JOIN cTurno ON alumno.TurnoId = cTurno.TurnoId 
                                    WHERE
                                    datos_generales.deleted = 0 $idicarrera";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getcardAlumnoById() {
        $errorMSG = "";
        //idialumno
        if (empty($_GET["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_GET["idialumno"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                                        alumno.idialumno,
                                        alumno.idigenerales,
                                        alumno.idicarrera,
                                        alumno.TurnoId,
                                        alumno.idiuser,
                                        alumno.matricula,
                                        alumno.generacion,
                                        alumno.cuatrimestre,
                                        alumno.cuatrimestres_trasncurridos,
                                        alumno.alta,
                                        alumno.beca_colegiatura,
                                        alumno.estatus,
                                        alumno.rfc_factura,
                                        alumno.uso_factura,
                                        alumno.razon_social,
                                        alumno.perfil,
                                        alumno.firma,
                                        carrera.nombre AS carrera,
                                        cNiveles.Descripcion AS cNiveles,
                                        credencial.iSiteCode,
                                        credencial.codigo_credencial,
                                        credencial.idimoodle,
                                        credencial.moodle_request,
                                        credencial.vigencia,
                                        datos_generales.nombre,
                                        datos_generales.apellido_paterno,
                                        datos_generales.apellido_materno,
                                        datos_generales.email,
                                        cTurno.Descripcion AS turno,
                                        campus.campus
                                        FROM
                                        alumno
                                        INNER JOIN carrera ON alumno.idicarrera = carrera.idicarrera
                                        INNER JOIN cNiveles ON carrera.NivelId = cNiveles.NivelId
                                        INNER JOIN credencial ON credencial.idialumno = alumno.idialumno
                                        INNER JOIN datos_generales ON alumno.idigenerales = datos_generales.idigenerales
                                        INNER JOIN cTurno ON alumno.TurnoId = cTurno.TurnoId
                                        INNER JOIN campus ON carrera.idicampus = campus.idicampus
                                        WHERE
                                        alumno.idialumno = $idialumno";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function redirectToProfile() {
        $errorMSG = "";
        //idialumno
        if (empty($_GET["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_GET["idialumno"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                                    alumno.idialumno,
                                    datos_generales.idigenerales
                                    FROM
                                    alumno
                                    INNER JOIN datos_generales ON alumno.idigenerales = datos_generales.idigenerales
                                    WHERE
                                    alumno.idialumno = $idialumno ";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getAlumnosByCarreraId() {
        $errorMSG = "";
        //idialumno
        if (empty($_GET["idicarrera"])) {
            $errorMSG = "idicarrera is required ";
        } else {
            $idicarrera = $_GET["idicarrera"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT alumno.idialumno, alumno.matricula, datos_generales.nombre, datos_generales.apellido_paterno, datos_generales.apellido_materno, alumno.carrera, alumno.generacion, alumno.cuatrimestre, alumno.cuatrimestres_trasncurridos, alumno.turno, alumno.estatus FROM datos_generales, alumno WHERE datos_generales.idigenerales = alumno.idigenerales AND alumno.idicarrera = $idicarrera ORDER BY datos_generales.apellido_paterno ASC";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getAlumnoById() {
        $errorMSG = "";
        //idialumno
        if (empty($_GET["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_GET["idialumno"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT alumno.idialumno, alumno.matricula, datos_generales.nombre, datos_generales.apellido_paterno, datos_generales.apellido_materno, alumno.carrera, alumno.generacion, alumno.cuatrimestre, alumno.cuatrimestres_trasncurridos, alumno.turno, alumno.estatus FROM datos_generales, alumno WHERE datos_generales.idigenerales = alumno.idigenerales AND alumno.idialumno = $idialumno";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getcDocumentosGenerales() {
        $errorMSG = "";
        //idialumno
        if (empty($_GET["idigenerales"])) {
            $errorMSG = "idigenerales is required ";
        } else {
            $idigenerales = $_GET["idigenerales"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                                        cDocumentosGenerales.ididocgral,
                                        cDocumentosGenerales.ididocumento,
                                        cDocumentosGenerales.idigenerales,
                                        cDocumentosGenerales.deleted,
                                        cDocumentosGenerales.suspended,
                                        cDocumentosGenerales.files_name,
                                        cDocumentosGenerales.files_size,
                                        cDocumentosGenerales.files_type,
                                        cDocumentosGenerales.created,
                                        cDocumentos.description,
                                        cDocumentos.type
                                        FROM
                                        cDocumentosGenerales
                                        INNER JOIN cDocumentos ON cDocumentosGenerales.ididocumento = cDocumentos.ididocumento
                                        WHERE cDocumentosGenerales.idigenerales = $idigenerales";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getDocumentosProfe() {
        $errorMSG = "";
        //idialumno
        if (empty($_GET["idiprofesor"])) {
            $errorMSG = "idiprofesor is required ";
        } else {
            $idiprofesor = $_GET["idiprofesor"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                                        cDocumentosProfe.DocumentoProfeId,
                                        cDocumentosProfe.DocumentoSolicitadoId,
                                        cDocumentosProfe.idiprofesor,
                                        cDocumentosProfe.Entregado,
                                        cDocumentos.Descripcion
                                        FROM
                                        cDocumentosProfe
                                        INNER JOIN cDocumentos ON cDocumentosProfe.DocumentoSolicitadoId = cDocumentos.DocumentoId
                                        WHERE
                                        cDocumentosProfe.idiprofesor = $idiprofesor";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getcardAlumnoMatricula() {
        $errorMSG = "";
        //matricula
        if (empty($_GET["matricula"])) {
            $errorMSG = "matricula is required ";
        } else {
            $matricula = $_GET["matricula"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                    alumno.idialumno,
                    alumno.idigenerales,
                    alumno.idicarrera,
                    alumno.TurnoId,
                    alumno.idiuser,
                    alumno.matricula,
                    alumno.generacion,
                    alumno.cuatrimestre,
                    alumno.cuatrimestres_trasncurridos,
                    alumno.alta,
                    alumno.beca_colegiatura,
                    alumno.rfc_factura,
                    alumno.uso_factura,
                    alumno.razon_social,
                    alumno.perfil,
                    alumno.firma,
                    datos_generales.deleted,
                    datos_generales.suspended,
                    datos_generales.estatus,
                    datos_generales.nombre,
                    datos_generales.apellido_paterno,
                    datos_generales.apellido_materno,
                    datos_generales.genero,
                    datos_generales.estado_civil,
                    datos_generales.edad,
                    datos_generales.curp,
                    datos_generales.rfc,
                    datos_generales.nss,
                    datos_generales.email,
                    datos_generales.telefono,
                    datos_generales.movil,
                    carrera.nombre AS carrera,
                    cNiveles.Descripcion AS cNiveles,
                    cTurno.Descripcion AS cTurno,
                    carrera.NivelId,
                    carrera.idicarrera,
                    cNiveles.NivelId,
                    cTurno.TurnoId
                    FROM
                    alumno
                    INNER JOIN datos_generales ON alumno.idigenerales = datos_generales.idigenerales
                    INNER JOIN carrera ON alumno.idicarrera = carrera.idicarrera
                    INNER JOIN cNiveles ON carrera.NivelId = cNiveles.NivelId
                    INNER JOIN cTurno ON alumno.TurnoId = cTurno.TurnoId
                    WHERE
                    datos_generales.deleted = 0 AND
                    alumno.matricula = '$matricula'";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getcardAlumnoByMatricula() {
        $errorMSG = "";
        //idialumno
        if (empty($_GET["matricula"])) {
            $errorMSG = "matricula is required ";
        } else {
            $matricula = $_GET["matricula"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                                    alumno.carrera,
                                    datos_generales.nombre,
                                    datos_generales.apellido_paterno,
                                    datos_generales.apellido_materno,
                                    alumno.matricula,
                                    alumno.generacion,
                                    alumno.cuatrimestre,
                                    alumno.cuatrimestres_trasncurridos,
                                    alumno.turno,
                                    credencial.idicredencial,
                                    credencial.codigo_credencial,
                                    credencial.vigencia,
                                    credencial.estatus,
                                    credencial.bloqueo,
                                    alumno.beca_colegiatura,
                                    datos_generales.rfc,
                                    datos_generales.email 
                                    FROM
                                    alumno,
                                    credencial,
                                    datos_generales 
                                    WHERE
                                    datos_generales.idigenerales = alumno.idigenerales 
                                    AND credencial.idialumno = alumno.idialumno 
                                    AND alumno.matricula = '$matricula'";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getMatriculaAlumnoByID() {
        $errorMSG = "";
        //idialumno
        if (empty($_GET["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_GET["idialumno"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT matricula from alumno where idialumno = $idialumno";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function addDataCredencial($idialumno) {
        $var = null;
        $errorMSG = "";
        //codigo_credencial
        if (empty($_POST["iSiteCode"])) {
            $iSiteCode = "";
        } else {
            $iSiteCode = $_POST["iSiteCode"];
        }
        //codigo_credencial
        if (empty($_POST["codigo_credencial"])) {
            $codigo_credencial = "";
        } else {
            $codigo_credencial = $_POST["codigo_credencial"];
        }

        //estatus
        if (empty($_POST["estatus"])) {
            $estatus = "";
        } else {
            $estatus = $_POST["estatus"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO credencial (idialumno, iSiteCode, codigo_credencial, estatus, fecha_mod) VALUES  ('" . $idialumno . "', '$iSiteCode','" . $codigo_credencial . "', 'Activo', CURRENT_TIMESTAMP);";
            if ($conn->query($sql) === TRUE) {
                // echo "success";
                $var = true;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                $var = false;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                $var = false;
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
                $var = false;
            }
        }
        return $var;
    }

    function setTutor() {
        $errorMSG = "";
        //idialumno
        if (empty($_POST["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_POST["idialumno"];
        }
        //parentesco
        if (empty($_POST["parentesco"])) {
            $errorMSG .= "parentesco is required ";
        } else {
            $parentesco = $_POST["parentesco"];
        }
        //nombre
        if (empty($_POST["nombre"])) {
            $errorMSG .= "nombre is required ";
        } else {
            $nombre = $_POST["nombre"];
        }
        //apellidos
        if (empty($_POST["apellidos"])) {
            $errorMSG .= "apellidos is required ";
        } else {
            $apellidos = $_POST["apellidos"];
        }
        //telefono
        if (empty($_POST["telefono"])) {
            $telefono = "";
        } else {
            $telefono = $_POST["telefono"];
        }
        //celular
        if (empty($_POST["celular"])) {
            $celular = "";
        } else {
            $celular = $_POST["celular"];
        }
        //email
        if (empty($_POST["email"])) {
            $email = "";
        } else {
            $email = $_POST["email"];
        }
        //email2
        if (empty($_POST["email2"])) {
            $email2 = "";
        } else {
            $email2 = $_POST["email2"];
        }
        //pais
        if (empty($_POST["pais"])) {
            $pais = "";
        } else {
            $pais = $_POST["pais"];
        }
        //cuidad
        if (empty($_POST["cuidad"])) {
            $cuidad = "";
        } else {
            $cuidad = $_POST["cuidad"];
        }
        //cp
        if (empty($_POST["cp"])) {
            $cp = "";
        } else {
            $cp = $_POST["cp"];
        }
        //direccion
        if (empty($_POST["direccion"])) {
            $direccion = "";
        } else {
            $direccion = $_POST["direccion"];
        }
        //addinfo
        if (empty($_POST["addinfo"])) {
            $addinfo = "";
        } else {
            $addinfo = $_POST["addinfo"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO tutor (idialumno, parentesco, nombre, apellidos, telefono, celular, email, email2, pais, cuidad, cp, direccion, addinfo) VALUES "
                    . "('" . $idialumno . "', '" . $parentesco . "', '" . $nombre . "', '" . $apellidos . "', '" . $telefono . "', '" . $celular . "', '" . $email . "', '" . $email2 . "', '" . $pais . "', '" . $cuidad . "', '" . $cp . "', '" . $direccion . "', '" . $addinfo . "')";
            if ($conn->query($sql) === TRUE) {
                echo "success";
                $var = true;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                $var = false;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function comparaCicloVencido($fecha) {
        if (empty($fecha)) {
            return false;
        } else {
            echo $hoy = date("Y-m-d");
            if ($hoy > $fecha) {
                return true;
            } else {
                return false;
            }
        }
    }

    function descuento($price, $descuento) {
        $precioReal = "";
        $descuentoReal = ($price * $descuento) / 100;
        $precioReal = $price - $descuentoReal;
        return $precioReal;
    }

    function recargo($price, $recargo) {
        $precioReal = "";
        $descuentoReal = ($price * $recargo) / 100;
        $precioReal = $price + $descuentoReal;
        return $precioReal;
    }

    function generarFolioPago() {
        include './conexion.php';
        $cons = $this->lastIdVenta(); //consecutivo de venta
        $key = $this->generarCodigo(6); //string de 6 numeros
        $folio = $key . '-' . $cons;
        $sql = "INSERT INTO venta (folio) VALUES ('" . strtoupper($folio) . "')";
        if ($conn->query($sql) === TRUE) {
            $last_id = $conn->insert_id; // devuelve el id de registro
            return $last_id;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    function getFolioPagoByID($idiventa) {
        //SELECT MAX(idiventa) FROM venta
        include './conexion.php';
        $sql = "SELECT folio FROM venta WHERE idiventa = $idiventa";
        $result = $conn->query($sql);
        $rows = null;
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows = $row["folio"];
            }
            return $rows;
        } else {
            return $row + 1;
        }
        $conn->close();
    }

    function getSubtotal($idiventa, $idialumno) {
        include './conexion.php';
        $sql = "SELECT SUM(total) as subtotal FROM venta_as_servicio WHERE idiventa = " . $idiventa . " and idialumno = " . $idialumno;
        $result = $conn->query($sql);
        $rows = null;
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows = $row["subtotal"];
            }
            return $rows;
        }
        $conn->close();
    }

    function lastIdVenta() {
        //SELECT MAX(idiventa) FROM venta
        include './conexion.php';
        $sql = "SELECT MAX(idiventa) FROM venta";
        $result = $conn->query($sql);
        $rows = null;
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows = $row["MAX(idiventa)"];
            }
            return $rows;
        } else {
            return $row + 1;
        }
        $conn->close();
    }

    function getPrecioServicioByID($idiservicio) {
        //SELECT MAX(idiventa) FROM venta
        include './conexion.php';
        $sql = "SELECT precio FROM servicios WHERE idiservicio = $idiservicio";
        $result = $conn->query($sql);
        $rows = null;
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows = $row["precio"];
            }
            return $rows;
        }
        $conn->close();
    }

    function generarCodigo($longitud) {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern) - 1;
        for ($i = 0; $i < $longitud; $i++)
            $key .= $pattern{mt_rand(0, $max)};
        return "UCP-" . $key;
    }

    /**
     * 
     * @param type $idialumno
     * @param type $cuatrimestre
     * @param type $periodo
     * @param type $idiplan
     */
    function setPaymentPlan($idialumno, $cuatrimestre, $periodo, $idiplan) {
        include './conexion.php';
        //Agrega las parcialidades
        $sql = "INSERT INTO venta_as_servicio ( idiservicio, precio, descuento, total, periodo, comentario, recargo, fecha_limite, idiuser, idialumno, unidad ) SELECT s.idiservicio, s.precio, s.descuento, s.precio AS total, c.ciclo AS periodo, UPPER( CONCAT( s.Descripcion,' ', v.mVence ) ) AS comentario, v.porcentaje_cargo AS recargo, v.fecha_limite AS fecha_limite, $this->idiControlEscolar, $idialumno, 1 FROM plan_pago AS p, cliclo AS c, cNiveles AS n, cTurno AS t, servicios AS s, vencimiento AS v WHERE v.idiplan = p.idiplan AND v.idiciclo = c.idiciclo AND v.NivelId = n.NivelId AND v.TurnoId = t.TurnoId AND v.idiservicio = s.idiservicio AND v.idiplan = $idiplan;";
        if ($conn->query($sql) === TRUE) {
            //echo 'payment plan are set';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    //Crea un alumno de nuevo ingreso
    function addAlumno() {
        $errorMSG = "";
        //idigenerales
        if (empty($_POST["idigenerales"])) {
            $errorMSG .= "idigenerales is required ";
        } else {
            $idigenerales = $_POST["idigenerales"];
        }
        //idicarrera
        if (empty($_POST["idicarrera"])) {
            $errorMSG .= "idicarrera is required ";
        } else {
            $idicarrera = $_POST["idicarrera"];
        }
        //TurnoId
        if (empty($_POST["TurnoId"])) {
            $errorMSG .= "TurnoId is required ";
        } else {
            $TurnoId = $_POST["TurnoId"];
        }
        if (empty($_POST["periodo"])) {
            $errorMSG .= "periodo is required ";
        } else {
            $periodo = $_POST["periodo"];
        }
        //codigo_credencial
        if (empty($_POST["codigo_credencial"])) {
            $codigo_credencial = "";
        } else {
            $codigo_credencial = $_POST["codigo_credencial"];
        }
        if (empty($_POST["image"])) {
            //$errorMSG = "Capture la foto del estudiante! ";
            $img = null;
            $var = false;
        } else {
            $img = $_POST["image"];
        }
        //moodle
        if (empty($_POST["moodle"])) {
            $moodle = "no";
        } else {
            $moodle = $_POST["moodle"];
        }
        //beca_colegiatura
        if (empty($_POST["beca_colegiatura"])) {
            $beca_colegiatura = "0";
        } else {
            $beca_colegiatura = $_POST["beca_colegiatura"];
        }
        //idiplan
        if (empty($_POST["idiplan"])) {
            $errorMSG .= "idiplan is required ";
        } else {
            $idiplan = $_POST["idiplan"];
        }

        if ($errorMSG == "") {
            $matricula = "$periodo$idicarrera$idigenerales";
            include './conexion.php';
            $sql = "INSERT INTO alumno (idigenerales, idicarrera, TurnoId, matricula, generacion, beca_colegiatura) VALUES ('$idigenerales', '$idicarrera', '$TurnoId', '$matricula', '$periodo', '$beca_colegiatura');";
            if ($conn->query($sql) === TRUE) {
                $last_id = $conn->insert_id; // devuelve el id de registro
                $this->addImageAlumno($last_id); //guardamos la foto del alumno
                $this->addDataCredencial($last_id); //Guardamos los datos de la credencial del estudiante
                $this->UpdateEstatusGeneral($idigenerales); //actualiza el estatus a Inscrito en la table de Datos Generales
                //Agrega colegiaturas
                $this->setPaymentPlan($last_id, intval(0), $periodo, $idiplan);
                //setPaymentPlan($idialumno, $cuatrimestre, $periodo, $idiplan)
                //$this->restore_password_idigenerales($last_id, '123456789');

                $rows = array();
                $data = array(
                    'idigenerales' => $idigenerales,
                    'idialumno' => $last_id,
                    'matricula' => $matricula,
                );

                $rows['data'][] = $data;
                header('Content-Type: application/json');
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    //reinscribe un alumno existente
    function reinscription() {
        $errorMSG = "";
        //idialumno
        if (empty($_POST["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_POST["idialumno"];
        }
        //matricula
        if (empty($_POST["matricula"])) {
            $errorMSG .= "matricula is required ";
        } else {
            $matricula = $_POST["matricula"];
        }
        //carrera
        if (empty($_POST["carrera"])) {
            $errorMSG .= "carrera is required ";
        } else {
            $carrera = $_POST["carrera"];
        }
        //cuatrimestre
        if (empty($_POST["cuatrimestre"])) {
            $errorMSG .= "cuatrimestre is required ";
        } else {
            $cuatrimestre = $_POST["cuatrimestre"];
        }
        //promovido
        if (empty($_POST["promovido"])) {
            $errorMSG .= "promovido is required ";
        } else {
            $promovido = $_POST["promovido"];
        }
        //generacion
        //        if (empty($_POST["generacion"])) {
        //            $errorMSG .= "generacion is required ";
        //        } else {
        //            $generacion = $_POST["generacion"];
        //        }
        //generacion
        if (empty($_POST["periodo"])) {
            $errorMSG .= "";
        } else {
            $periodo = $_POST["periodo"];
        }
        //turno
        if (empty($_POST["TurnoId"])) {
            $errorMSG .= "TurnoId is required ";
        } else {
            $TurnoId = $_POST["TurnoId"];
        }
        //beca_colegiatura
        if (empty($_POST["beca_colegiatura"])) {
            $beca_colegiatura = "0";
        } else {
            $beca_colegiatura = $_POST["beca_colegiatura"];
        }
        //termino
        if (empty($_POST["termino"])) {
            $termino = "";
        } else {
            $termino = $_POST["termino"];
        }
        //categoria
        if (empty($_POST["categoria"])) {
            $errorMSG .= "categoria is required ";
        } else {
            $categoria = $_POST["categoria"];
        }
        //idiplan
        if (empty($_POST["idiplan"])) {
            $errorMSG .= "idiplan is required ";
        } else {
            $idiplan = $_POST["idiplan"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE alumno SET cuatrimestre = '$promovido', cuatrimestres_trasncurridos = '$cuatrimestre', TurnoId = '$TurnoId ' WHERE alumno.idialumno = $idialumno";
            if ($conn->query($sql) === TRUE) {
                echo "Alumno reinscrito";
                $this->reinscripcion_set_credencial(); //Actualiza datos de la credencial
                //Agregamos el cobro automatico al estudiante
                $this->setPaymentPlan($idialumno, intval($cuatrimestre), $periodo, $idiplan);
                //setPaymentPlan($idialumno, $cuatrimestre, $periodo, $idiplan)
                //$this->set
            } else {
                echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function reinscripcion_set_credencial() {
        $errorMSG = "";
        //idialumno
        if (empty($_POST["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_POST["idialumno"];
        }
        //vigencia
        if (empty($_POST["vigencia"])) {
            $errorMSG .= "vigencia is required ";
        } else {
            $vigencia = $_POST["vigencia"];
        }
        //codigo_credencial
        if (empty($_POST["iSiteCode"])) {
            $iSiteCode = "";
        } else {
            $iSiteCode = $_POST["iSiteCode"];
        }
        //codigo_credencial
        if (empty($_POST["codigo_credencial"])) {
            $codigo_credencial = "";
        } else {
            $codigo_credencial = $_POST["codigo_credencial"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE credencial SET iSiteCode = '$iSiteCode', codigo_credencial = '" . $codigo_credencial . "', vigencia = '" . $vigencia . "' WHERE credencial.idialumno = $idialumno";
            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    //funcion que actualiza los parametros de moodle en la tabla credencial
    function success_user_create_moodle() {
        $errorMSG = "";
        //idialumno
        if (empty($_POST["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_POST["idialumno"];
        }
        //id moodle
        if (empty($_POST["id"])) {
            $errorMSG .= "id is required ";
        } else {
            $id = $_POST["id"];
        }
        //username
        if (empty($_POST["matricula"])) {
            $errorMSG .= "matricula is required ";
        } else {
            $matricula = $_POST["matricula"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE credencial SET idimoodle = '$id', moodle_request = '$matricula' WHERE credencial.idialumno = $idialumno";
            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function profesor() {
        $errorMSG = "";
        //nombre
        if (empty($_POST["nombre"])) {
            $errorMSG = "nombre is required ";
        } else {
            $nombre = $_POST["nombre"];
        }
        //apellidos
        if (empty($_POST["apellido_paterno"])) {
            $errorMSG .= "apellido_paterno is required ";
        } else {
            $apellido_paterno = $_POST["apellido_paterno"];
        }
        if (empty($_POST["apellido_materno"])) {
            $apellido_materno = "";
        } else {
            $apellido_materno = $_POST["apellido_materno"];
        }
        //genero
        if (empty($_POST["genero"])) {
            $genero = "";
        } else {
            $genero = $_POST["genero"];
        }
        //edad
        if (empty($_POST["edad"])) {
            $edad = "18";
        } else {
            $edad = $_POST["edad"];
        }
        //curp
        if (empty($_POST["curp"])) {
            $curp = "";
        } else {
            $curp = $_POST["curp"];
        }
        //rfc
        if (empty($_POST["rfc"])) {
            $rfc = "";
        } else {
            $rfc = $_POST["rfc"];
        }
        //nss
        if (empty($_POST["nss"])) {
            $nss = "";
        } else {
            $nss = $_POST["nss"];
        }
        //email
        if (empty($_POST["email"])) {
            $email = "";
        } else {
            $email = $_POST["email"];
        }
        //telefono
        if (empty($_POST["telefono"])) {
            $telefono = "";
        } else {
            $telefono = $_POST["telefono"];
        }
        //movil
        if (empty($_POST["movil"])) {
            $movil = "";
        } else {
            $movil = $_POST["movil"];
        }
        //email2
        if (empty($_POST["email2"])) {
            $email2 = "";
        } else {
            $email2 = $_POST["email2"];
        }
        //pais
        if (empty($_POST["pais"])) {
            $pais = "";
        } else {
            $pais = $_POST["pais"];
        }
        //ciudad
        if (empty($_POST["ciudad"])) {
            $ciudad = "";
        } else {
            $ciudad = $_POST["ciudad"];
        }
        //direccion
        if (empty($_POST["direccion"])) {
            $direccion = "";
        } else {
            $direccion = $_POST["direccion"];
        }
        //num
        if (empty($_POST["num"])) {
            $num = "";
        } else {
            $num = "#" . $_POST["num"] . " ";
        }
        //municipio
        if (empty($_POST["municipio"])) {
            $municipio = "";
        } else {
            $municipio = $_POST["municipio"];
        }
        //cp
        if (empty($_POST["cp"])) {
            $cp = null;
        } else {
            $cp = $_POST["cp"];
        }
        //escegreso
        if (empty($_POST["cedula"])) {
            $cedula = "";
        } else {
            $cedula = $_POST["cedula"];
        }
        //nivelegreso
        if (empty($_POST["grado"])) {
            $grado = "";
        } else {
            $grado = $_POST["grado"];
        }
        //fechaegreso
        if (empty($_POST["perfil"])) {
            $perfil = "";
        } else {
            $perfil = $_POST["perfil"];
        }
        //infoadicional
        if (empty($_POST["infoadicional"])) {
            $infoadicional = "";
        } else {
            $infoadicional = $_POST["infoadicional"];
        }
        //tiposangre
        if (empty($_POST["tiposangre"])) {
            $tiposangre = "";
        } else {
            $tiposangre = $_POST["tiposangre"];
        }
        //alergias
        if (empty($_POST["alergias"])) {
            $alergias = "";
        } else {
            $alergias = $_POST["alergias"];
        }
        //fecha_nacimiento
        if (empty($_POST["fecha_nacimiento"])) {
            $fecha_nacimiento = date("Y/m/d");
        } else {
            $fecha_nacimiento = $_POST["fecha_nacimiento"];
        }
        //interes
        if (empty($_POST["interes"])) {
            $interes = "";
        } else {
            $interes = $_POST["interes"];
        }
        //turno
        if (empty($_POST["turno"])) {
            $turno = "";
        } else {
            $turno = $_POST["turno"];
        }
        //emergencias
        if (empty($_POST["emergencias"])) {
            $emergencias = "";
        } else {
            $emergencias = $_POST["emergencias"];
        }
        //plantel
        if (empty($_POST["idicampus"])) {
            $idicampus = "";
        } else {
            $idicampus = $_POST["idicampus"];
        }

        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO profesor (estatus, nombre, apellido_paterno, apellido_materno, genero, edad, curp, rfc, nss, email, telefono, movil, email2, pais, ciudad, direccion, municipio, cp, cedula, grado, perfil, infoadicional, tiposangre, alergias, fecha_nacimiento, emergencias, idicampus) VALUES "
                    . "                  ('1', '" . strtoupper($nombre) . "', '" . strtoupper($apellido_paterno) . "', '" . strtoupper($apellido_materno) . "', '" . $genero . "', '" . $edad . "', '" . strtoupper($curp) . "', '" . strtoupper($rfc) . "', '" . strtoupper($nss) . "', '" . $email . "', '" . $telefono . "', '" . $movil . "', '" . $email2 . "', '" . $pais . "', '" . $ciudad . "', '" . $direccion . "', '" . $municipio . "', '" . $cp . "', '" . strtoupper($cedula) . "', '" . $grado . "', '" . $perfil . "', '" . $infoadicional . "', '" . $tiposangre . "', '" . $alergias . "', '" . $fecha_nacimiento . "', '$emergencias', '" . $idicampus . "')";
            if ($conn->query($sql) === TRUE) {
                $last_id = $conn->insert_id;
                //echo "success";
                $rows = array();
                $data = array(
                    'estatus' => 'success',
                    'idiprofesor' => $last_id,
                );
                $rows['data'][] = $data;
                header('Content-Type: application/json');
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function addRoleAsPermision() {
        $errorMSG = "";
        //idirole
        if (empty($_POST["idirole"])) {
            $errorMSG = "idirole is required ";
        } else {
            $idirole = $_POST["idirole"];
        }
        if (empty($_POST["idipermiso"])) {
            $errorMSG = "idipermiso is required ";
        } else {
            $idipermiso = $_POST["idipermiso"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO role_as_permiso(idirole, idipermiso) VALUES ($idirole, $idipermiso)";
            if ($conn->query($sql) === TRUE) {
                echo "Privilegio asignado correctamente";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function addNewRole() {
        $errorMSG = "";
        //role
        if (empty($_POST["role"])) {
            $errorMSG = "role is required ";
        } else {
            $role = $_POST["role"];
        }
        //edit
        if (empty($_POST["edit"])) {
            $errorMSG = "edit is required ";
        } else {
            $edit = $_POST["edit"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO role(role, edit) VALUES ('$role', '$edit')";
            if ($conn->query($sql) === TRUE) {
                echo "Rol creado correctamente";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function deletPermision() {
        $errorMSG = "";
        //idirole
        if (empty($_POST["idirol_permiso"])) {
            $idirol_permiso = "idirol_permiso is required ";
        } else {
            $idirol_permiso = $_POST["idirol_permiso"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "DELETE FROM role_as_permiso WHERE idirol_permiso = $idirol_permiso";
            if ($conn->query($sql) === TRUE) {
                echo "Privilegio recovado correctamente";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getUserSAEMByID() {
        $errorMSG = "";
        //idialumno
        if (empty($_GET["idiuser"])) {
            $errorMSG = "idiuser is required ";
        } else {
            $idiuser = $_GET["idiuser"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            //$sql = "SELECT user.idiuser, user.idirole, user.estatus,user.email,  role.role, user.Nombre, user.apellido_paterno, user.apellido_materno, user.user, user.password,user.email from user, role WHERE user.idirole = role.idirole and user.idiuser = $idiuser and user.categoria='admin'";
            $sql = "SELECT
                                        tbuser.idiuser,
                                        tbuser.idigenerales,
                                        tbuser.idirole,
                                        tbuser.`user`,
                                        tbuser.`password`,
                                        tbuser.estatus,
                                        tbuser.categoria,
                                        role.role,
                                        role.edit,
                                        datos_generales.nombre,
                                        datos_generales.apellido_paterno,
                                        datos_generales.apellido_materno,
                                        datos_generales.email
                                        FROM
                                        tbuser
                                        INNER JOIN role ON tbuser.idirole = role.idirole
                                        INNER JOIN datos_generales ON tbuser.idigenerales = datos_generales.idigenerales
                                        WHERE tbuser.idiuser = $idiuser";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getUserSAEM() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT
                                    tbuser.idiuser,
                                    tbuser.idigenerales,
                                    tbuser.idiconfig,
                                    tbuser.idirole,
                                    tbuser.user,
                                    tbuser.estatus,
                                    tbuser.categoria,
                                    datos_generales.idigenerales,
                                    datos_generales.nombre,
                                    datos_generales.apellido_paterno,
                                    datos_generales.apellido_materno,
                                    datos_generales.email,
                                    role.role,
                                    role.edit,
                                    campus.campus 
                                    FROM
                                    tbuser
                                    INNER JOIN datos_generales ON tbuser.idigenerales = datos_generales.idigenerales
                                    INNER JOIN role ON tbuser.idirole = role.idirole
                                    INNER JOIN campus ON tbuser.idicampus = campus.idicampus 
                                    WHERE
                                    tbuser.categoria = 'admin'
                                    ORDER BY
                                    idiuser DESC";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function addUserSAEM() {
        $errorMSG = "";
        //Nombre
        if (empty($_POST["Nombre"])) {
            $errorMSG = "Nombre is required ";
        } else {
            $Nombre = $_POST["Nombre"];
        }
        //apellido_paterno
        if (empty($_POST["apellido_paterno"])) {
            $errorMSG .= "apellido_paterno is required ";
        } else {
            $apellido_paterno = $_POST["apellido_paterno"];
        }
        //apellido_materno
        if (empty($_POST["apellido_materno"])) {
            $errorMSG .= "apellido_materno is required ";
        } else {
            $apellido_materno = $_POST["apellido_materno"];
        }
        //email
        if (empty($_POST["email"])) {
            $errorMSG .= "email is required ";
        } else {
            $email = $_POST["email"];
        }
        //rol
        if (empty($_POST["idirole"])) {
            $errorMSG .= "idirole is required ";
        } else {
            $idirole = $_POST["idirole"];
        }
        //user
        if (empty($_POST["user"])) {
            $errorMSG .= "user is required ";
        } else {
            $user = $_POST["user"];
        }
        //password
        if (empty($_POST["sena"])) {
            $errorMSG .= "Contraseña is required ";
        } else {
            $sena = $_POST["sena"];
        }

        if ($errorMSG == "") {
            include './conexion.php';
            //$sql = "INSERT INTO user (idirole, Nombre, apellido_paterno, apellido_materno, user, password, email, estatus, categoria) VALUES "
            //        . "('" . $idirole . "', '" . strtoupper($Nombre) . "', '" . strtoupper($apellido_paterno) . "', '" . strtoupper($apellido_materno) . "', '" . $user . "', '" . $sena . "', '" . $email . "', 'Activo', 'admin')";

            $sql = "INSERT INTO datos_generales (estatus, nombre, apellido_paterno, apellido_materno, email) values "
                    . "('normal', '" . strtoupper($Nombre) . "', '" . strtoupper($apellido_paterno) . "', '" . strtoupper($apellido_materno) . "', '$email')";
            if ($conn->query($sql) === TRUE) {
                //echo "success";
                $last_id = $conn->insert_id;
                try {
                    $sql2 = "INSERT tbuser (idigenerales, idirole, user, password, estatus, categoria) values ('$last_id', '$idirole', '$user', '$sena', 'Activo', 'admin');";
                    if ($conn->query($sql2) === TRUE) {
                        echo "success";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                } catch (Exception $exc) {
                    echo $exc->getTraceAsString();
                }
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function updateUSerSAEM() {
        $errorMSG = "";
        //idiuser
        if (empty($_POST["idiuser"])) {
            $errorMSG .= "idiuser is required ";
        } else {
            $idiuser = $this->xss($_POST["idiuser"]);
        }
        //idigenerales
        if (empty($_POST["idigenerales"])) {
            $errorMSG .= "idigenerales is required ";
        } else {
            $idigenerales = $this->xss($_POST["idigenerales"]);
        }
        //Nombre
        if (empty($_POST["Nombre"])) {
            $errorMSG .= "Nombre is required ";
        } else {
            $Nombre = $this->xss($_POST["Nombre"]);
        }
        //apellido_paterno
        if (empty($_POST["apellido_paterno"])) {
            $errorMSG .= "apellido_paterno is required ";
        } else {
            $apellido_paterno = $this->xss($_POST["apellido_paterno"]);
        }
        //apellido_materno
        if (empty($_POST["apellido_materno"])) {
            $errorMSG .= "apellido_materno is required ";
        } else {
            $apellido_materno = $this->xss($_POST["apellido_materno"]);
        }
        //email
        if (empty($_POST["email"])) {
            $errorMSG .= "email is required ";
        } else {
            $email = $this->xss($_POST["email"]);
        }
        //user
        if (empty($_POST["user"])) {
            $errorMSG .= "user is required ";
        } else {
            $user = $this->xss($_POST["user"]);
        }
        //idiuser
        if (empty($_POST["idirole"])) {
            $errorMSG .= "idirole is required ";
        } else {
            $idirole = $this->xss($_POST["idirole"]);
        }
        //estatus
        if (empty($_POST["estatus"])) {
            $errorMSG .= "estatus is required ";
        } else {
            $estatus = $this->xss($_POST["estatus"]);
        }
        if (empty($_POST["psd"])) {
            $errorMSG .= "password is required ";
        } else {
            $pwd = $this->xss($_POST["psd"]);
            $pwd_sha256 = hash('sha256', $pwd);
            $pwd_statement = ", password='$pwd_sha256'";
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            //$sql = "UPDATE user SET idirole = '$idirole', password='$pwd', Nombre = '$Nombre', apellido_paterno = '$apellido_paterno', apellido_materno = '$apellido_materno', user = '$user', email = '$email', estatus = '$estatus' WHERE user.idiuser = $idiuser";
            $sql = "UPDATE tbuser SET idirole = '$idirole', password='$pwd', user = '$user', estatus = '$estatus' WHERE tbuser.idiuser = $idiuser;";
            $sql .= "UPDATE datos_generales SET  nombre = '$Nombre', apellido_paterno = '$apellido_paterno', apellido_materno = '$apellido_materno', email = '$email' WHERE datos_generales.idigenerales = $idigenerales";
            if ($conn->multi_query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function beca() {
        $errorMSG = "";
        //idialumno
        if (empty($_POST["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_POST["idialumno"];
        }
        //beca_colegiatura
        if (empty($_POST["beca_colegiatura"])) {
            $beca_colegiatura = "0";
        } else {
            $beca_colegiatura = $_POST["beca_colegiatura"];
        }

        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE alumno SET beca_colegiatura = '$beca_colegiatura' WHERE alumno.idialumno = " . $idialumno . ";";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    //Funcion que guarda en el servidor los dcumentos personales del estudiante
    function student_upload_file() {
        $errorMSG = "";
        // A list of permitted file extensions
        $allowed = array('pdf');
        //$idigenerales
        if (empty($_POST["idigenerales"])) {
            $errorMSG = "idigenerales is required ";
        } else {
            $idigenerales = $_POST["idigenerales"];
        }
        //tipo ididocumento
        if (empty($_POST["ididocumento"])) {
            $errorMSG .= "ididocumento is required ";
        } else {
            $ididocumento = $_POST["ididocumento"];
        }

        if ($errorMSG == "") {
            if (0 < $_FILES['file']['error']) {
                echo 'Error: ' . $_FILES['file']['error'];
            } else {
                // A list of permitted file extensions
                $allowed = array('pdf');
                $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                $tamanio = $_FILES['file']['size'];

                if (!in_array(strtolower($extension), $allowed) || $tamanio > 5242880) {// 5 MB (this size is in bytes)
                    echo 'Solamente se permiten archivos en formato PDF con un tamaño máximo de 5 Mb';
                } else {
                    $nombre = $_FILES['file']['name'];
                    $tipo = $_FILES['file']['type'];
                    $image = $_FILES['file']['tmp_name'];
                    $archivo = addslashes(file_get_contents($image));
                    //$archivo = file_get_contents($image);

                    include './touploadfile.php';
                    //$sql = "INSERT INTO cDocumentosAlumnos(DocumentoSolicitadoId, AlumnoId, Entregado, tamanio, tipo, archivo) VALUES ('$DocumentoId', '$AlumnoId', '1', '$tamanio', '$tipo', '$archivo')";
                    $sql = "INSERT INTO cDocumentosGenerales (ididocumento, idigenerales,  files, files_name, files_size, files_type) VALUES ('$ididocumento', '$idigenerales',  '$archivo', '$nombre', '$tamanio', '$tipo')";
                    if ($conn->query($sql) === TRUE) {
                        echo "success";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                    $conn->close();
                }
            }
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function teacher_upload_file() {
        $errorMSG = "";
        // A list of permitted file extensions
        $allowed = array('pdf');
        //idialumno
        if (empty($_POST["idiprofesor"])) {
            $errorMSG = "idiprofesor is required ";
        } else {
            $idiprofesor = $_POST["idiprofesor"];
        }
        //tipo documentoId
        if (empty($_POST["DocumentoId"])) {
            $errorMSG .= "DocumentoId is required ";
        } else {
            $DocumentoId = $_POST["DocumentoId"];
        }

        if ($errorMSG == "") {
            if (0 < $_FILES['file']['error']) {
                echo 'Error: ' . $_FILES['file']['error'];
            } else {
                // A list of permitted file extensions
                $allowed = array('pdf');
                $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                $tamanio = $_FILES['file']['size'];

                if (!in_array(strtolower($extension), $allowed) || $tamanio > 5242880) {// 5 MB (this size is in bytes)
                    echo 'Solamente se permiten archivos en formato PDF con un tamaño máximo de 5 Mb';
                } else {
                    $nombre = $_FILES['file']['name'];
                    $tipo = $_FILES['file']['type'];
                    $image = $_FILES['file']['tmp_name'];
                    $archivo = addslashes(file_get_contents($image));
                    //$archivo = file_get_contents($image);

                    include './touploadfile.php';
                    $sql = "INSERT INTO cDocumentosProfe(DocumentoSolicitadoId, idiprofesor, Entregado, tamanio, tipo, archivo) VALUES ('$DocumentoId', '$idiprofesor', '1', '$tamanio', '$tipo', '$archivo')";
                    if ($conn->query($sql) === TRUE) {
                        echo "success";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                    $conn->close();
                }
            }
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function addCiclo() {
        $errorMSG = "";
        //abrev
        if (empty($_POST["abrev"])) {
            $errorMSG = "abrev is required ";
        } else {
            $abrev = $_POST["abrev"];
        }
        //ciclo
        if (empty($_POST["ciclo"])) {
            $errorMSG .= "ciclo is required ";
        } else {
            $ciclo = $_POST["ciclo"];
        }
        //inicio
        if (empty($_POST["inicio"])) {
            $errorMSG .= "inicio is required ";
        } else {
            $inicio = $_POST["inicio"];
        }
        //termino
        if (empty($_POST["termino"])) {
            $errorMSG .= "termino is required ";
        } else {
            $termino = $_POST["termino"];
        }
        //limite_inscipcion
        if (empty($_POST["limite_inscipcion"])) {
            $errorMSG .= "limite_inscipcion is required ";
        } else {
            $limite_inscipcion = $_POST["limite_inscipcion"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO cliclo (abrev, ciclo, inicio, termino, limite_inscipcion) VALUES ('$abrev', '$ciclo', '$inicio', '$termino', '$limite_inscipcion')";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function updateCiclo() {
        $errorMSG = "";
        //abrev
        if (empty($_POST["abrev"])) {
            $errorMSG = "abrev is required ";
        } else {
            $abrev = $_POST["abrev"];
        }
        //ciclo
        if (empty($_POST["ciclo"])) {
            $errorMSG .= "ciclo is required ";
        } else {
            $ciclo = $_POST["ciclo"];
        }
        //inicio
        if (empty($_POST["inicio"])) {
            $errorMSG .= "inicio is required ";
        } else {
            $inicio = $_POST["inicio"];
        }
        //termino
        if (empty($_POST["termino"])) {
            $errorMSG .= "termino is required ";
        } else {
            $termino = $_POST["termino"];
        }
        //idiciclo
        if (empty($_POST["idiciclo"])) {
            $errorMSG .= "idiciclo is required ";
        } else {
            $idiciclo = $_POST["idiciclo"];
        }
        //limite_inscipcion
        if (empty($_POST["limite_inscipcion"])) {
            $errorMSG .= "limite_inscipcion is required ";
        } else {
            $limite_inscipcion = $_POST["limite_inscipcion"];
        }
        //idiciclo
        if (empty($_POST["estatus"])) {
            $errorMSG .= "estatus is required ";
        } else {
            $estatus = $_POST["estatus"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE cliclo SET  estatus ='$estatus' ,abrev = '$abrev', ciclo = '$ciclo', inicio = '$inicio', termino = '$termino', limite_inscipcion='$limite_inscipcion' WHERE cliclo.idiciclo = $idiciclo";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    //genera matricula escolar y
    function setMatricula() {
        $errorMSG = "";
        //generacion
        if (empty($_POST["generacion"])) {//ciclo escolar
            $errorMSG = "generacion is required ";
        } else {
            $generacion = $_POST["generacion"];
            $rep = str_replace("-", "", $generacion);
        }
        //clave
        if (empty($_POST["clave"])) {//Plantel
            $errorMSG .= "clave is required ";
        } else {
            $clave = $_POST["clave"];
        }
        //nivel
        if (empty($_POST["nivel"])) {//nivel de estudios
            $errorMSG .= "nivel is required ";
        } else {
            $nivel = $_POST["nivel"];
        }
        //idiCarrera
        if (empty($_POST["idiCarrera"])) {//Numero de carrera
            $errorMSG .= "idiCarrera is required ";
        } else {
            $idiCarrera = $_POST["idiCarrera"];
        }
        $numeroConsecutivo = $this->getLastIdMatricula(); //numero Consecutivo
        if ($numeroConsecutivo == null) {
            $numeroConsecutivo = 1;
        } else {
            $numeroConsecutivo;
        }
        // redirect to success page
        if ($errorMSG == "") {
            $numero_carrera = $this->getNumero_Carrera($idiCarrera);
            $matriculaEscolar = substr($rep, -3) . $clave . $nivel . $numero_carrera . $numeroConsecutivo;
            include './conexion.php';
            $sql = "INSERT INTO matricula (matricula, ciclo_escolar, plantel, nivel, carrera, consecutivo) VALUES ('" . $matriculaEscolar . "', '" . $generacion . "', '" . $clave . "', '" . $nivel . "', '" . $idiCarrera . "', '" . $numeroConsecutivo . "')";
            if ($conn->query($sql) === TRUE) {
                $last_id = $conn->insert_id; //recupero ultimo id insertado
                //$actualyMatricula = getMatriculaByID($last_id); //consulto la matrucula del ultimo id y lo almaceno en $actualyMatricula
                $actualyMatricula = $this->getMatriculaByID($last_id); //consulto la matrucula del ultimo id y lo almaceno en $actualyMatricula
                return $actualyMatricula; //retono la matricula
            } else {
                return "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                return "Something went wrong :(";
            } else {
                return $errorMSG;
            }
        }
    }

    function updateEstatusByIdiAlumno() {
        $errorMSG = "";
        //idialumno
        if (empty($_POST["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_POST["idialumno"];
        }
        //estatus
        if (empty($_POST["estatus"]) || is_null($_POST["estatus"])) {
            $errorMSG .= "estatus is required ";
        } else {
            $estatus = $_POST["estatus"];
            if ($estatus != 'Activo') {
                $bloqueoCredencial = 2;
                $estatusCredencial = 'Bloqueado';
            } else {
                $bloqueoCredencial = 1;
                $estatusCredencial = 'Activo';
            }
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE alumno SET estatus='$estatus' WHERE idialumno='$idialumno';";
            $sql .= "UPDATE credencial SET estatus='$estatusCredencial', bloqueo=$bloqueoCredencial, fecha_mod = CURRENT_TIMESTAMP WHERE idialumno='$idialumno';";

            if ($conn->multi_query($sql) === TRUE) {
                echo "Alumno actualizado con el estatus: $estatus";
            } else {
                echo "Error updating record: " . $conn->error;
            }

            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function updateCodigoCredencialByIdiAlumno() {
        $errorMSG = "";
        //idialumno
        if (empty($_POST["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_POST["idialumno"];
        }
        //estatus
        if (empty($_POST["iSiteCode"]) || is_null($_POST["iSiteCode"])) {
            $errorMSG = "NULL";
        } else {
            $iSiteCode = $_POST["iSiteCode"];
        }
        //estatus
        if (empty($_POST["codigo_credencial"]) || is_null($_POST["codigo_credencial"])) {
            $errorMSG = "NULL";
        } else {
            $codigo_credencial = $_POST["codigo_credencial"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE alumno SET codigo_credencial='$codigo_credencial' WHERE idialumno='$idialumno';";
            $sql .= "UPDATE credencial SET estatus='Activo', bloqueo=1,iSiteCode = '$iSiteCode', codigo_credencial = '$codigo_credencial', fecha_mod = CURRENT_TIMESTAMP WHERE idialumno='$idialumno';";
            if ($conn->multi_query($sql) === TRUE) {
                echo "Alumno actualizado con el número de credencial : $codigo_credencial";
            } else {
                echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function addPeriodo() {
        $errorMSG = "";
        //FechaInicio
        if (empty($_POST["FechaInicio"])) {
            $errorMSG = "FechaInicio is required ";
        } else {
            $FechaInicio = $_POST["FechaInicio"];
        }
        //FechaFin
        if (empty($_POST["FechaFin"])) {
            $errorMSG .= "FechaFin is required ";
        } else {
            $FechaFin = $_POST["FechaFin"];
        }
        //Descripcion
        if (empty($_POST["Descripcion"])) {
            $errorMSG .= "Descripcion is required ";
        } else {
            $Descripcion = strtoupper($_POST["Descripcion"]);
        }
        //Abreviatura
        if (empty($_POST["Abreviatura"])) {
            $errorMSG .= "Abreviatura is required ";
        } else {
            $Abreviatura = strtoupper($_POST["Abreviatura"]);
        }
        //TipoEvaluacionId
        if (empty($_POST["TipoEvaluacionId"])) {
            $errorMSG .= "TipoEvaluacionId is required ";
        } else {
            $TipoEvaluacionId = $_POST["TipoEvaluacionId"];
        }
        //CicloId
        if (empty($_POST["CicloId"])) {
            $errorMSG .= "CicloId is required ";
        } else {
            $CicloId = $_POST["CicloId"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO tbPeriodo (  FechaInicio, FechaFin, Descripcion, Abreviatura, TipoEvaluacionId, Estatus, CicloId, CambioAutomatico, BloqueId ) VALUES ( '$FechaInicio', '$FechaFin', '$Descripcion', '$Abreviatura', '$TipoEvaluacionId', '1', $CicloId, 1, NULL )";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error creating record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getPeriodoByGrupoId() {
        $errorMSG = "";
        //GrupoId
        if (empty($_GET["CicloId"])) {
            $errorMSG .= "CicloId is required ";
        } else {
            $CicloId = $_GET["CicloId"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM tbPeriodo where CicloId = $CicloId AND Estatus = '1'";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function addVencimiento() {
        $errorMSG = "";
        //data
        if (empty($_POST["idiplan"])) {
            $errorMSG .= "idiplan is required ";
        } else {
            $idiplan = $_POST["idiplan"];
        }
        //idiciclo
        if (empty($_POST["idiciclo"])) {
            $errorMSG .= "idiciclo is required ";
        } else {
            $idiciclo = $_POST["idiciclo"];
        }
        if (empty($_POST["NivelId"])) {
            $errorMSG .= "NivelId is required ";
        } else {
            $NivelId = $_POST["NivelId"];
        }
        if (empty($_POST["TurnoId"])) {
            $errorMSG .= "TurnoId is required ";
        } else {
            $TurnoId = $_POST["TurnoId"];
        }
        //idiservicio
        if (empty($_POST["idiservicio"])) {
            $errorMSG .= "idiservicio is required ";
        } else {
            $idiservicio = $_POST["idiservicio"];
        }
        //fecha_limite
        if (empty($_POST["fecha_limite"])) {
            $fecha_limite = '2119-01-01';
        } else {
            $fecha_limite = $_POST["fecha_limite"];
        }
        //porcentaje_cargo
        if (empty($_POST["porcentaje_cargo"])) {
            $porcentaje_cargo = '0';
        } else {
            $porcentaje_cargo = $_POST["porcentaje_cargo"];
        }
        //mVence
        if (empty($_POST["mVence"])) {
            $mVence = '';
        } else {
            $mVence = $_POST["mVence"];
        }

        $vigencia = true;
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO vencimiento (idiplan, idiciclo ,NivelId, TurnoId, idiservicio, fecha_limite, porcentaje_cargo, mVence, vigencia) VALUES ('$idiplan', '$idiciclo','$NivelId', '$TurnoId', '$idiservicio', '" . $fecha_limite . " 23:55:00', '$porcentaje_cargo', '$mVence', $vigencia);";
            if ($conn->multi_query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error creating record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function updateVencimiento() {
        $errorMSG = "";
        //idiservicio
        if (empty($_POST["midivencimiento"])) {
            $errorMSG .= "midivencimiento is required ";
        } else {
            $idivencimiento = $_POST["midivencimiento"];
        }
        //mVence
        if (empty($_POST["mmVence"])) {
            $errorMSG .= "mmVence is required ";
        } else {
            $mVence = $_POST["mmVence"];
        }
        //porcentaje_cargo
        if (empty($_POST["mporcentaje_cargo"])) {
            $errorMSG .= "mporcentaje_cargo is required ";
        } else {
            $porcentaje_cargo = $_POST["mporcentaje_cargo"];
        }
        //fecha_limite
        if (empty($_POST["mfecha_limite"])) {
            $errorMSG .= "mfecha_limite is required ";
        } else {
            $fecha_limite = $_POST["mfecha_limite"];
        }
        $vigencia = true;
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE vencimiento SET mVence = '$mVence', porcentaje_cargo= '$porcentaje_cargo', fecha_limite = '$fecha_limite' where idivencimiento = $idivencimiento";
            if ($conn->multi_query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getVencimientoByID() {
        $errorMSG = "";
        //idivencimiento
        if (empty($_GET["idivencimiento"])) {
            $errorMSG = NULL;
        } else {
            $idivencimiento = $_GET["idivencimiento"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT v.idivencimiento, p.clave, p.descripcion as plan, c.ciclo, n.Descripcion as nivel, t.Descripcion as turno, s.descripcion as servicio, s.precio, v.porcentaje_cargo as recargo, v.mVence as mes, v.fecha_limite as vencimiento FROM plan_pago as p, cliclo as c, cNiveles as n, cTurno as t, servicios as s, vencimiento as v WHERE v.idiplan = p.idiplan AND v.idiciclo = c.idiciclo AND v.NivelId = n.NivelId AND v.TurnoId = t.TurnoId AND v.idiservicio = s.idiservicio AND v.idivencimiento = $idivencimiento";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getGrupos() {
        $errorMSG = "";
        //        //idivencimiento
        //        if (empty($_GET["idicarrera"])) {
        //            $errorMSG = 'idicarrera is required';
        //        } else {
        //            $idicarrera = $_GET["idicarrera"];
        //        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                                        tbGrupos.GrupoId,
                                        tbGrupos.idicarrera,
                                        tbGrupos.GradosId,
                                        tbGrupos.idiciclo,
                                        tbGrupos.TurnoId,
                                        tbGrupos.deleted,
                                        tbGrupos.suspended,
                                        tbGrupos.Clave,
                                        tbGrupos.Descripcion,
                                        tbGrupos.created,
                                        carrera.nombre AS carrera,
                                        cGrados.Descripcion AS cGrados,
                                        cliclo.ciclo,
                                        cTurno.Descripcion as cTurno
                                        FROM
                                        tbGrupos
                                        INNER JOIN carrera ON tbGrupos.idicarrera = carrera.idicarrera
                                        INNER JOIN cGrados ON tbGrupos.GradosId = cGrados.GradosId
                                        INNER JOIN cliclo ON tbGrupos.idiciclo = cliclo.idiciclo
                                        INNER JOIN cTurno ON tbGrupos.TurnoId = cTurno.TurnoId
                                        WHERE  tbGrupos.deleted = 0";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function gettbGrupos_idicarrera() {
        $errorMSG = "";
        if (empty($_GET["idicarrera"])) {
            $tbGrupos_idicarrera = '';
        } else {
            $idicarrera = $_GET["idicarrera"];
            $tbGrupos_idicarrera = "AND tbGrupos.idicarrera = $idicarrera";
        }
        if (empty($_GET["idiciclo"])) {
            $tbGrupos_idiciclo = '';
        } else {
            $idiciclo = $_GET["idiciclo"];
            $tbGrupos_idiciclo = "AND tbGrupos.idiciclo = $idiciclo";
        }
        if (empty($_GET["TurnoId"])) {
            $tbGrupos_TurnoId = '';
        } else {
            $TurnoId = $_GET["TurnoId"];
            $tbGrupos_TurnoId = "AND tbGrupos.TurnoId = $TurnoId";
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                                        tbGrupos.GrupoId,
                                        tbGrupos.idicarrera,
                                        tbGrupos.GradosId,
                                        tbGrupos.idiciclo,
                                        tbGrupos.TurnoId,
                                        tbGrupos.deleted,
                                        tbGrupos.suspended,
                                        tbGrupos.Clave,
                                        tbGrupos.Descripcion,
                                        tbGrupos.created,
                                        carrera.nombre AS carrera,
                                        cGrados.Descripcion AS cGrados,
                                        cliclo.ciclo,
                                        cTurno.Descripcion AS cTurno 
                                        FROM
                                        tbGrupos
                                        INNER JOIN carrera ON tbGrupos.idicarrera = carrera.idicarrera
                                        INNER JOIN cGrados ON tbGrupos.GradosId = cGrados.GradosId
                                        INNER JOIN cliclo ON tbGrupos.idiciclo = cliclo.idiciclo
                                        INNER JOIN cTurno ON tbGrupos.TurnoId = cTurno.TurnoId 
                                        WHERE
                                        tbGrupos.deleted = 0 
                                        AND tbGrupos.deleted = 0 
                                        $tbGrupos_idicarrera
                                        $tbGrupos_idiciclo 
                                        $tbGrupos_TurnoId";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getGruposCoursedByIdiAlumno() {
        $errorMSG = "";
        if (empty($_GET["idialumno"])) {
            $errorMSG = 'idialumno is required';
        } else {
            $idialumno = $_GET["idialumno"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                                        tbAlumnoGrupo.AlumnoGruposId,
                                        tbAlumnoGrupo.idialumno,
                                        tbAlumnoGrupo.GrupoId,
                                        tbAlumnoGrupo.MateriaId,
                                        tbAlumnoGrupo.SituacionAsignacionId,
                                        tbAlumnoGrupo.Estatus,
                                        tbGrupos.idicarrera,
                                        tbGrupos.GradosId,
                                        tbGrupos.idiciclo,
                                        tbGrupos.TurnoId,
                                        tbGrupos.deleted,
                                        tbGrupos.suspended,
                                        tbGrupos.Clave,
                                        tbGrupos.Descripcion,
                                        tbGrupos.created,
                                        cGrados.Descripcion AS grado,
                                        cliclo.ciclo
                                        FROM
                                        tbAlumnoGrupo
                                        INNER JOIN tbGrupos ON tbAlumnoGrupo.GrupoId = tbGrupos.GrupoId
                                        INNER JOIN cGrados ON tbGrupos.GradosId = cGrados.GradosId
                                        INNER JOIN cliclo ON tbGrupos.idiciclo = cliclo.idiciclo
                                        WHERE
                                        tbAlumnoGrupo.idialumno = $idialumno";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getHorasHorario() {
        $errorMSG = "";
        //NivelId
        if (empty($_GET["NivelId"])) {
            $errorMSG = 'NivelId is required';
        } else {
            $NivelId = $_GET["NivelId"];
        }
        //NivelId
        if (empty($_GET["TurnoId"])) {
            $errorMSG = 'TurnoId is required';
        } else {
            $TurnoId = $_GET["TurnoId"];
        }

        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM cHorasHorario WHERE NivelId = $NivelId AND TurnoId = $TurnoId ORDER BY HoraInicial ASC";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getVencimiento() {
        $errorMSG = "";
        //idicarrera
        if (empty($_GET["idiplan"])) {
            $errorMSG = 'Idiplan is required';
        } else {
            $idiplan = $_GET["idiplan"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT v.idivencimiento, p.clave, p.descripcion as plan, c.ciclo, n.Descripcion as nivel, t.Descripcion as turno, s.descripcion as servicio, s.precio, v.porcentaje_cargo as recargo, v.mVence as mes, v.fecha_limite as vencimiento FROM plan_pago as p, cliclo as c, cNiveles as n, cTurno as t, servicios as s, vencimiento as v WHERE v.idiplan = p.idiplan AND v.idiciclo = c.idiciclo AND v.NivelId = n.NivelId AND v.TurnoId = t.TurnoId AND v.idiservicio = s.idiservicio AND v.idiplan = $idiplan";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function deleteFechaPago() {
        $errorMSG = "";
        //idiprofesor
        if (empty($_POST["idivencimiento"])) {
            $errorMSG = "idivencimiento is required ";
        } else {
            $idivencimiento = $_POST["idivencimiento"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            // sql to delete a record
            $sql = "DELETE FROM vencimiento WHERE idivencimiento = $idivencimiento";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function deletePeriodo() {
        $errorMSG = "";
        //PeriodoId
        if (empty($_POST["PeriodoId"])) {
            $errorMSG = "PeriodoId is required ";
        } else {
            $PeriodoId = $_POST["PeriodoId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            // sql to delete a record
            //$sql = "DELETE FROM tbPeriodo WHERE PeriodoId = $PeriodoId";
            $sql = "UPDATE tbPeriodo SET Estatus = '0' WHERE PeriodoId = $PeriodoId";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * añade un registro a la tabla de carrera
     * created by bennderodriguez
     */
    function addCarrera() {
        $errorMSG = "";
        $query_files = '';
        //idicampus
        if (empty($_POST["idicampus"])) {
            $errorMSG = " idicampus is required ";
        } else {
            $idicampus = $_POST["idicampus"];
        }
        //NivelId
        if (empty($_POST["NivelId"])) {
            $errorMSG .= " NivelId is required ";
        } else {
            $NivelId = $_POST["NivelId"];
        }
        //nombre
        if (empty($_POST["nombre"])) {
            $errorMSG .= " nombre is required ";
        } else {
            $nombre = $_POST["nombre"];
        }
        //post input string description
        if (empty($_POST["description"])) {
            $description = '';
        } else {
            $description = $_POST["description"];
        }
        //post input string comments
        if (empty($_POST["comments"])) {
            $comments = '';
        } else {
            $comments = $_POST["comments"];
        }
        //post input string working_day
        if (empty($_POST["working_day"])) {
            $errorMSG .= "working_day is required ";
        } else {
            $working_day = $_POST["working_day"];
        }
        //post input string salary
        if (empty($_POST["salary"])) {
            $errorMSG .= "salary is required ";
        } else {
            $salary = $_POST["salary"];
        }
        //post input string message
        if (empty($_POST["message"])) {
            $errorMSG .= "message is required ";
        } else {
            $message = $_POST["message"];
        }
        //available
        if (empty($_POST["available"])) {
            $available = '0';
        } else {
            $available = $_POST["available"];
        }
        //NivelId
        if (empty($_POST["deadline"])) {
            $deadline = null;
        } else {
            $deadline = $_POST["deadline"];
        }
        //post input string query_action
        if (empty($_POST["query_action"])) {
            $errorMSG .= "query_action is required ";
        } else {
            $query_action = $_POST["query_action"];
        }
        //post input string lms_course_id
        if (empty($_POST["lms_course_id"])) {
            $lms_course_id = 0;
        } else {
            $lms_course_id = $_POST["lms_course_id"];
        }
        //post input string idinotification
        if (empty($_POST["idinotification"])) {
            $errorMSG .= "idinotification is required ";
        } else {
            $idinotification = $_POST["idinotification"];
        }

        //post input string files
        if (0 < $_FILES['file']['error']) {
            $query_files .= ' Error: ' . $_FILES['file']['error'];
        } else {
            // A list of permitted file extensions
            $allowed = array('pdf');
            $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $tamanio = $_FILES['file']['size'];

            if (!in_array(strtolower($extension), $allowed) || $tamanio > 1048576) {// 5 MB (this size is in bytes)
                $query_files .= ' Solamente se permiten archivos en formato PDF con un tamaño máximo de 1 Mb ';
            } else {
                $name_file = $_FILES['file']['name'];
                $tipo = $_FILES['file']['type'];
                $image = $_FILES['file']['tmp_name'];
                $archivo = addslashes(file_get_contents($image));
            }
        }
        //runn query
        if ($errorMSG == "") {
            if ($query_action == 'insert') {
                include './conexion.php';
                $sql = "INSERT INTO carrera (NivelId, idicampus, nombre, description, comments, working_day, salary, message, available, deadline, lms_course_id, idinotification) VALUES ('$NivelId', '$idicampus', '$nombre', '$description', '$comments', '$working_day', '$salary', '$message', '$available','$deadline', '$lms_course_id', '$idinotification')";
                if ($conn->query($sql) === TRUE) {
                    $last_id = $conn->insert_id;
                    $this->carrera_update_image($last_id);
                    if ($query_files == '') {
                        $this->carrera_file_update($last_id, $archivo, $name_file, $tamanio, $tipo);
                    } else {
                        echo 'success';
                    }
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
            }if ($query_action == 'update') {
                //idicarrera
                if (empty($_POST["idicarrera"])) {
                    $errorMSG .= "idicarrera is required ";
                } else {
                    $idicarrera = $_POST["idicarrera"];
                }
                if ($errorMSG == '') {
                    include "./conexion.php";
                    $sql = "UPDATE carrera SET nombre = '$nombre', description = '$description', comments = '$comments', working_day = '$working_day', salary = '$salary', message = '$message', available = '$available', deadline = '$deadline', last_update=now(), lms_course_id = '$lms_course_id', idinotification = '$idinotification' WHERE idicarrera = '$idicarrera'";
                    if ($conn->query($sql) === TRUE) {
                        $this->carrera_update_image($idicarrera);
                        if ($query_files == '') {
                            $this->carrera_file_update($idicarrera, $archivo, $name_file, $tamanio, $tipo);
                        } else {
                            echo 'success';
                        }
                    } else {
                        echo "Error: " . $conn->error;
                        echo "\n Evite usar comillas sencillas ('): ";
                    }
                    $conn->close();
                } else {
                    echo $errorMSG;
                }
            }
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function carrera_file_update($idicarrera, $files, $files_name, $files_size, $files_type) {
        include './touploadfile.php';
        $sql = "UPDATE carrera SET files = '$files', files_name = '$files_name', files_size = '$files_size', files_type = '$files_type' WHERE idicarrera = '$idicarrera'";
        if ($conn->query($sql) === TRUE) {
            echo 'success';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    function carrera_update_image($last_id) {
        $errorMSG = '';
        $allow = array("jpg", "jpeg", "gif", "png");

        $todir = '../asset/images/izzi/';

        if (!!$_FILES['rvoe']['tmp_name']) { // is the file uploaded yet?
            $info = explode('.', strtolower($_FILES['rvoe']['name'])); // whats the extension of the file

            if (in_array(end($info), $allow)) { // is this file allowed
                if (move_uploaded_file($_FILES['rvoe']['tmp_name'], $todir . basename($_FILES['rvoe']['name']))) {
                    // the file has been moved correctly
                    $fileName = $_FILES['rvoe']['name'];
                }
            } else {
                // error this file ext is not allowed
                $errorMSG .= ' Error la extensión del archivo no está permitido ';
            }
        }

        if ($errorMSG == "") {
            if (empty($fileName) || $fileName == null || $fileName == '') {
                //noting to do...
            } else {
                include './conexion.php';
                $sql = "UPDATE carrera SET rvoe = '$fileName' WHERE idicarrera = '$last_id';";
                if ($conn->multi_query($sql) === TRUE) {
                    //echo "success";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
            }
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
        return $var;
    }

    function updateCarrera() {
        $errorMSG = "";
        //idicarrera
        if (empty($_POST["idicarrera"])) {
            $errorMSG = " idicarrera is required ";
        } else {
            $idicarrera = $_POST["idicarrera"];
        }
        //idicampus
        if (empty($_POST["idicampus"])) {
            $errorMSG = " idicampus is required ";
        } else {
            $idicampus = $_POST["idicampus"];
        }
        //numero_carrera
        if (empty($_POST["numero_carrera"])) {
            $errorMSG .= " numero_carrera is required ";
        } else {
            $numero_carrera = $_POST["numero_carrera"];
        }
        //nivel
        if (empty($_POST["nivel"])) {
            $errorMSG .= " nivel is required ";
        } else {
            $nivel = $_POST["nivel"];
        }
        //categoria
        if (empty($_POST["categoria"])) {
            $errorMSG .= " categoria is required ";
        } else {
            $categoria = $_POST["categoria"];
        }
        //clave
        if (empty($_POST["clave"])) {
            $errorMSG .= " clave is required ";
        } else {
            $clave = $_POST["clave"];
        }
        //nombre
        if (empty($_POST["nombre"])) {
            $errorMSG .= " nombre is required ";
        } else {
            $nombre = $_POST["nombre"];
        }
        //rvoe
        if (empty($_POST["rvoe"])) {
            $rvoe = '';
        } else {
            $rvoe = $_POST["rvoe"];
        }
        //duracion
        if (empty($_POST["duracion"])) {
            $errorMSG .= " duracion is required ";
        } else {
            $duracion = $_POST["duracion"];
        }
        //NivelId
        if (empty($_POST["NivelId"])) {
            $errorMSG .= " NivelId is required ";
        } else {
            $NivelId = $_POST["NivelId"];
        }

        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE carrera set idicampus = '$idicampus', numero_carrera = '$numero_carrera', nivel = '$nivel', categoria = '$categoria', clave = '$clave', nombre = '$nombre', rvoe = '$rvoe', duracion = '$duracion', NivelId = '$NivelId' WHERE idicarrera = '$idicarrera'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function suspended_carrera() {
        $errorMSG = "";
        if (empty($_POST["idicarrera"])) {
            $errorMSG = "idicarrera is required ";
        } else {
            $idicarrera = $_POST["idicarrera"];
        }
        if (empty($_POST["suspended"])) {
            $suspended = '0';
        } else {
            $suspended = $_POST["suspended"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE carrera SET suspended = '$suspended' WHERE idicarrera = '$idicarrera'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error : " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function deleted_carrera() {
        $errorMSG = "";
        if (empty($_POST["idicarrera"])) {
            $errorMSG = "idicarrera is required ";
        } else {
            $idicarrera = $_POST["idicarrera"];
        }
        if (empty($_POST["deleted"])) {
            $deleted = '0';
        } else {
            $deleted = $_POST["deleted"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE carrera SET deleted = '$deleted' WHERE idicarrera = '$idicarrera'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error : " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getGradosByID() {
        $errorMSG = "";
        //idiprofesor
        if (empty($_GET["idicarrera"])) {
            $errorMSG = "idicarrera is required ";
        } else {
            $idicarrera = $_GET["idicarrera"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                    cGrados.GradosId,
                    cGrados.NivelId,
                    cGrados.deleted,
                    cGrados.suspended,
                    cGrados.Descripcion,
                    cGrados.Abreviatura,
                    cGrados.created,
                    cNiveles.Descripcion as nivel,
                    carrera.idicarrera,
                    carrera.nombre as carrera
                    FROM
                    cGrados
                    INNER JOIN cNiveles ON cGrados.NivelId = cNiveles.NivelId
                    INNER JOIN carrera ON carrera.NivelId = cNiveles.NivelId
                    WHERE carrera.idicarrera= $idicarrera";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                $rows['error'][] = "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                $rows['error'][] = "Something went wrong :(";
            } else {
                $rows['error'][] = $errorMSG;
            }
        }
    }

    function getMateriasByCarreraAndGradoID() {
        $errorMSG = "";
        //idiprofesor
        if (empty($_GET["idicarrera"])) {
            $errorMSG = "idicarrera is required ";
        } else {
            $idicarrera = $_GET["idicarrera"];
        }
        if (empty($_GET["GradosId"])) {
            $errorMSG .= "GradosId is required ";
        } else {
            $GradosId = $_GET["GradosId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                    tbMaterias.MateriaId,
                    tbMaterias.deleted,
                    tbMaterias.suspended,
                    tbMaterias.idicarrera,
                    tbMaterias.GradosId,
                    tbMaterias.DescripcionPlan,
                    tbMaterias.Nombre,
                    tbMaterias.Clave,
                    tbMaterias.Creditos,
                    tbMaterias.Unidades,
                    tbMaterias.HorasSemana,
                    tbMaterias.TipoEvaluacionId,
                    cGrados.Descripcion AS grado,
                    carrera.nombre AS carrera,
                    cNiveles.Descripcion AS nivel,
                    cNiveles.NivelId,
                    carrera.idicampus,
                    campus.campus 
            FROM
                    tbMaterias
                    INNER JOIN cGrados ON tbMaterias.GradosId = cGrados.GradosId
                    INNER JOIN carrera ON tbMaterias.idicarrera = carrera.idicarrera
                    INNER JOIN cNiveles ON cGrados.NivelId = cNiveles.NivelId 
                    AND carrera.NivelId = cNiveles.NivelId
                    INNER JOIN campus ON carrera.idicampus = campus.idicampus 
            WHERE
                    tbMaterias.deleted = 0 
                    AND tbMaterias.idicarrera = $idicarrera
                    AND tbMaterias.GradosId = $GradosId";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo '0 results';
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo 'Something went wrong :(';
            } else {
                echo $errorMSG;
            }
        }
    }

    function gettbMaterias_MateriaId() {
        $errorMSG = "";
        //MateriaId
        if (empty($_GET["MateriaId"])) {
            $errorMSG = "MateriaId is required ";
        } else {
            $MateriaId = $_GET["MateriaId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                    tbMaterias.MateriaId,
                    tbMaterias.deleted,
                    tbMaterias.suspended,
                    tbMaterias.idicarrera,
                    tbMaterias.GradosId,
                    tbMaterias.DescripcionPlan,
                    tbMaterias.Nombre,
                    tbMaterias.Clave,
                    tbMaterias.Creditos,
                    tbMaterias.Unidades,
                    tbMaterias.HorasSemana,
                    tbMaterias.TipoEvaluacionId,
                    cGrados.Descripcion AS grado,
                    carrera.nombre AS carrera,
                    cNiveles.Descripcion AS nivel,
                    cNiveles.NivelId,
                    carrera.idicampus,
                    campus.campus 
                    FROM
                    tbMaterias
                    INNER JOIN cGrados ON tbMaterias.GradosId = cGrados.GradosId
                    INNER JOIN carrera ON tbMaterias.idicarrera = carrera.idicarrera
                    INNER JOIN cNiveles ON cGrados.NivelId = cNiveles.NivelId 
                    AND carrera.NivelId = cNiveles.NivelId
                    INNER JOIN campus ON carrera.idicampus = campus.idicampus
                    WHERE tbMaterias.MateriaId = $MateriaId";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                $rows['error'][] = "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                $rows['error'][] = "Something went wrong :(";
            } else {
                $rows['error'][] = $errorMSG;
            }
        }
    }

    function getMateriasByGradoId() {
        $errorMSG = "";
        if (empty($_GET["GradosId"])) {
            $errorMSG = "GradosId is required ";
        } else {
            $GradosId = $_GET["GradosId"];
        }
        if (empty($_GET["idicarrera"])) {
            $errorMSG .= "idicarrera is required ";
        } else {
            $idicarrera = $_GET["idicarrera"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                    tbMaterias.MateriaId,
                    tbMaterias.deleted,
                    tbMaterias.suspended,
                    tbMaterias.idicarrera,
                    tbMaterias.GradosId,
                    tbMaterias.DescripcionPlan,
                    tbMaterias.Nombre,
                    tbMaterias.Clave,
                    tbMaterias.Creditos,
                    tbMaterias.Unidades,
                    tbMaterias.HorasSemana,
                    tbMaterias.TipoEvaluacionId
                    FROM
                    tbMaterias
                    WHERE
                    tbMaterias.deleted = 0 AND
                    tbMaterias.suspended = 0 AND
                    tbMaterias.GradosId = $GradosId AND tbMaterias.idicarrera = $idicarrera";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                $rows['error'][] = "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                $rows['error'][] = "Something went wrong :(";
            } else {
                $rows['error'][] = $errorMSG;
            }
        }
    }

    function addtbCalificacionesFromRevalidacion() {
        $errorMSG = "";
        //NivelId
        if (empty($_POST["NivelId"])) {
            $errorMSG = "NivelId is required ";
        } else {
            $NivelId = $_POST["NivelId"];
        }
        //CarreraId
        if (empty($_POST["idicarrera"])) {
            $errorMSG .= "idicarrera is required ";
        } else {
            $CarreraId = $_POST["idicarrera"];
        }
        //$MateriaId
        if (empty($_POST["MateriaId"])) {
            $errorMSG .= "MateriaId is required ";
        } else {
            $MateriaId = $_POST["MateriaId"];
        }
        //CicloId
        if (empty($_POST["CicloId"])) {
            $errorMSG .= "CicloId is required ";
        } else {
            $CicloId = $_POST["CicloId"];
        }
        //PeriodoId
        if (empty($_POST["PeriodoId"])) {
            $PeriodoId = '1';
        } else {
            $PeriodoId = $_POST["PeriodoId"];
        }
        //AlumnoId
        if (empty($_POST["idialumno"])) {
            $errorMSG .= "idialumno is required ";
        } else {
            $AlumnoId = $_POST["idialumno"];
        }
        //Promedio
        if (empty($_POST["Promedio"])) {
            $Promedio = "0";
        } else {
            $Promedio = $_POST["Promedio"];
        }
        //GrupoId
        if (empty($_POST["GrupoId"])) {
            $GrupoId = 'NULL';
        } else {
            $GrupoId = $_POST["GrupoId"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO tbCalificaciones (NivelId, CarreraId, MateriaId, CicloId, PeriodoId, AlumnoId, Promedio, GrupoId) VALUES "
                    . "                 ('$NivelId', '$CarreraId', '$MateriaId', '$CicloId', '$PeriodoId', '$AlumnoId','$Promedio', $GrupoId);";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function deltbCalificacionesById() {
        $errorMSG = "";
        //CalificacionId
        if (empty($_POST["CalificacionId"])) {
            $errorMSG .= "CalificacionId is required ";
        } else {
            $CalificacionId = $_POST["CalificacionId"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "DELETE FROM tbCalificaciones WHERE CalificacionId = $CalificacionId";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function deleteDocument() {
        $errorMSG = "";
        if (empty($_POST["ididocgral"])) {
            $errorMSG .= "ididocgral is required ";
        } else {
            $ididocgral = $_POST["ididocgral"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "DELETE FROM cDocumentosGenerales WHERE ididocgral = $ididocgral";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function deleteTutor() {
        $errorMSG = "";
        if (empty($_POST["iditutor"])) {
            $errorMSG .= "iditutor is required ";
        } else {
            $iditutor = $_POST["iditutor"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE tutor SET deleted = 1 WHERE iditutor = $iditutor";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function deleteDocumentProfe() {
        $errorMSG = "";
        //CalificacionId
        if (empty($_POST["DocumentoProfeId"])) {
            $errorMSG .= "DocumentoProfeId is required ";
        } else {
            $DocumentoProfeId = $_POST["DocumentoProfeId"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "DELETE FROM cDocumentosProfe WHERE DocumentoProfeId = $DocumentoProfeId";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function editaDocumento() {
        $errorMSG = "";
        //CalificacionId
        if (empty($_POST["DocumentoAlumnoId"])) {
            $errorMSG .= "DocumentoAlumnoId is required ";
        } else {
            $DocumentoAlumnoId = $_POST["DocumentoAlumnoId"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE cDocumentosAlumnos SET Entregado = 1 WHERE DocumentoAlumnoId = $DocumentoAlumnoId";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getNivelbyAlumnoId() {
        $errorMSG = "";
        //idiprofesor
        if (empty($_GET["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_GET["idialumno"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT DISTINCT c.NivelId, n.Descripcion FROM tbCalificaciones AS c, cNiveles AS n WHERE c.NivelId = n.NivelId AND AlumnoId = $idialumno";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                $rows['error'][] = "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                $rows['error'][] = "Something went wrong :(";
            } else {
                $rows['error'][] = $errorMSG;
            }
        }
    }

    function getCiclosyAlumnoId() {
        $errorMSG = "";
        //idiprofesor
        if (empty($_GET["NivelId"])) {
            $errorMSG = "NivelId is required ";
        } else {
            $NivelId = $_GET["NivelId"];
        }
        if (empty($_GET["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_GET["idialumno"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT DISTINCT g.CicloId, g.Descripcion FROM tbCalificaciones AS c, tbCiclos AS g WHERE g.CicloId = c.CicloId AND c.NivelId = $NivelId and c.AlumnoId = $idialumno";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                $rows['error'][] = "0 results";
                print json_encode($rows, JSON_PRETTY_PRINT);
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                $rows['error'][] = "Something went wrong :(";
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                $rows['error'][] = $errorMSG;
                print json_encode($rows, JSON_PRETTY_PRINT);
            }
        }
    }

    function getCalificacionesyAlumnoId() {
        $errorMSG = '';
        $andCiclo = '';
        $andPeriodo = '';
        if (empty($_GET["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_GET["idialumno"];
        }
        if (empty($_GET["idiciclo"])) {
            $andCiclo .= '';
        } else {
            $idiciclo = $_GET["idiciclo"];
            $andCiclo .= " AND tbCalificaciones.CicloId = $idiciclo ";
        }
        if (empty($_GET["PeriodoId"])) {
            $andPeriodo .= '';
        } else {
            $PeriodoId = $_GET["PeriodoId"];
            $andPeriodo .= " AND tbCalificaciones.PeriodoId = $PeriodoId ";
        }

        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                    tbCalificaciones.CalificacionId,
                    tbCalificaciones.NivelId,
                    tbCalificaciones.CarreraId,
                    tbCalificaciones.GrupoId,
                    tbCalificaciones.MateriaId,
                    tbCalificaciones.CicloId,
                    tbCalificaciones.PeriodoId,
                    tbCalificaciones.AlumnoId,
                    tbCalificaciones.Promedio,
                    cliclo.ciclo,
                    tbPeriodo.Descripcion AS tipo_evaluacion,
                    tbMaterias.Nombre AS materia,
                    cGrados.GradosId,
                    cGrados.Descripcion AS grado
                    FROM
                    tbCalificaciones
                    INNER JOIN cliclo ON tbCalificaciones.CicloId = cliclo.idiciclo
                    INNER JOIN tbPeriodo ON tbCalificaciones.PeriodoId = tbPeriodo.PeriodoId
                    INNER JOIN tbMaterias ON tbCalificaciones.MateriaId = tbMaterias.MateriaId
                    INNER JOIN cGrados ON tbMaterias.GradosId = cGrados.GradosId
                    WHERE
                    tbCalificaciones.AlumnoId = $idialumno 
                    $andCiclo
                    $andPeriodo";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                $rows['empty_data'][] = "0 results";
                print json_encode($rows, JSON_PRETTY_PRINT);
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                $rows['error'][] = "Something went wrong :(";
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                $rows['error'][] = $errorMSG;
                print json_encode($rows, JSON_PRETTY_PRINT);
            }
        }
    }

    //     * Muestra las calificaciones del grupo en el periodo correspondiente
    function getCalificacionesByGrupoIdANDPeriodoID() {
        $errorMSG = "";
        $andPeriodo = "";
        if (empty($_GET["GrupoId"])) {
            $errorMSG = "GrupoId is required ";
        } else {
            $GrupoId = $_GET["GrupoId"];
        }
        if (empty($_GET["MateriaId"])) {
            $andPeriodo .= "";
        } else {
            $MateriaId = $_GET["MateriaId"];
            $andMateria .= " and tbCalificaciones.MateriaId = $MateriaId";
        }
        if (empty($_GET["PeriodoId"])) {
            $andPeriodo .= "";
        } else {
            $PeriodoId = $_GET["PeriodoId"];
            $andPeriodo .= " and tbCalificaciones.PeriodoId = $PeriodoId";
        }

        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                    tbCalificaciones.CalificacionId,
                    tbCalificaciones.NivelId,
                    tbCalificaciones.CarreraId,
                    tbCalificaciones.GrupoId,
                    tbCalificaciones.MateriaId,
                    tbCalificaciones.CicloId,
                    tbCalificaciones.PeriodoId,
                    tbCalificaciones.AlumnoId,
                    tbCalificaciones.Promedio,
                    alumno.matricula,
                    datos_generales.nombre,
                    datos_generales.apellido_paterno,
                    datos_generales.apellido_materno,
                    tbPeriodo.Descripcion AS periodo
                    FROM
                    tbCalificaciones
                    INNER JOIN alumno ON tbCalificaciones.AlumnoId = alumno.idialumno
                    INNER JOIN datos_generales ON alumno.idigenerales = datos_generales.idigenerales
                    INNER JOIN tbPeriodo ON tbCalificaciones.PeriodoId = tbPeriodo.PeriodoId
                    WHERE
                    tbCalificaciones.GrupoId = $GrupoId $andPeriodo $andMateria";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                $rows['error'][] = "0 results";
                print json_encode($rows, JSON_PRETTY_PRINT);
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                $rows['error'][] = "Something went wrong :(";
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                $rows['error'][] = $errorMSG;
                print json_encode($rows, JSON_PRETTY_PRINT);
            }
        }
    }

    function getPromedioAlumnoId() {
        $errorMSG = "";
        $andCiclo = "";
        if (empty($_GET["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_GET["idialumno"];
        }
        if (empty($_GET["idiciclo"])) {
            $andCiclo .= "";
        } else {
            $idiciclo = $_GET["idiciclo"];
            $andCiclo .= " AND cl.idiciclo = $idiciclo";
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            //$sql = "SELECT c.CalificacionId, m.Clave, g.Descripcion as cuatri,m.Nombre, p.Descripcion, c.Promedio from tbCalificaciones as c, tbMaterias as m, tbPeriodo as p, tbGrupos as g WHERE g.GrupoId = c.GrupoId and  p.PeriodoId=c.PeriodoId and m.MateriaId = c.MateriaId and c.NivelId = $NivelId and c.AlumnoId = $idialumno and c.CicloId = $CicloId";
            $sql = "SELECT
                    AVG( c.Promedio ) as promedioGral
                    FROM
                    tbCalificaciones AS c,
                    tbMaterias AS m
                    INNER JOIN cGrados ON m.GradoId = cGrados.GradosId,
                    tbPeriodo AS p
                    INNER JOIN cTipoEvaluacionPeriodo ON p.TipoEvaluacionId = cTipoEvaluacionPeriodo.TipoEvaluacionPeriodoId,
                    alumno AS a,
                    cliclo AS cl 
                    WHERE
                    c.MateriaId = m.MateriaId 
                    AND c.PeriodoId = p.PeriodoId 
                    AND c.AlumnoId = a.idialumno 
                    AND c.CicloId = cl.idiciclo 
                    AND p.TipoEvaluacionId = 1
                    AND c.AlumnoId = $idialumno $andCiclo 
                    ORDER BY
                    m.Clave ASC";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                $rows['error'][] = "0 results";
                print json_encode($rows, JSON_PRETTY_PRINT);
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                $rows['error'][] = "Something went wrong :(";
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                $rows['error'][] = $errorMSG;
                print json_encode($rows, JSON_PRETTY_PRINT);
            }
        }
    }

    //     * retorna los ciclos cursados por un estudiante en donde se hayan asentado calificaciones
    function getCilosCoursedByIdiAlumno() {
        $errorMSG = "";
        if (empty($_GET["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_GET["idialumno"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT DISTINCT cliclo.ciclo, cliclo.idiciclo from tbCalificaciones, cliclo WHERE cliclo.idiciclo =tbCalificaciones.CicloId and AlumnoId = $idialumno ;";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                $rows['error'][] = "0 results";
                print json_encode($rows, JSON_PRETTY_PRINT);
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                $rows['error'][] = "Something went wrong :(";
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                $rows['error'][] = $errorMSG;
                print json_encode($rows, JSON_PRETTY_PRINT);
            }
        }
    }

    function updateSignByIdiAlumno() {
        $errorMSG = "";
        //idialumno
        if (empty($_POST["idialumno"])) {
            $errorMSG = "idialumno is required ";
        } else {
            $idialumno = $_POST["idialumno"];
        }
        if (empty($_POST["sign"])) {
            $errorMSG = "sign is required ";
        } else {
            $sign = $_POST["sign"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE alumno SET firma ='$sign' WHERE idialumno='$idialumno';";
            if ($conn->query($sql) === TRUE) {
                echo "Firma actualizada";
            } else {
                echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function updateGrupoEscolar() {
        $errorMSG = "";
        //Clave
        if (empty($_POST["GrupoId"])) {
            $errorMSG .= "GrupoId is required ";
        } else {
            $GrupoId = $_POST["GrupoId"];
        }
        //Clave
        if (empty($_POST["Clave"])) {
            $errorMSG .= "Clave is required ";
        } else {
            $Clave = strtoupper($_POST["Clave"]);
        }
        //Descripcion
        if (empty($_POST["Descripcion"])) {
            $errorMSG .= "Descripcion is required ";
        } else {
            $Descripcion = strtoupper($_POST["Descripcion"]);
        }
        //NivelId
        if (empty($_POST["idinivel"])) {
            $errorMSG .= "idinivel is required ";
        } else {
            $idinivel = $_POST["idinivel"];
        }
        //CicloId
        if (empty($_POST["CicloId"])) {
            $errorMSG .= "CicloId is required ";
        } else {
            $CicloId = $_POST["CicloId"];
        }
        //CarreraId
        if (empty($_POST["CarreraId"])) {
            $errorMSG .= "CarreraId is required ";
        } else {
            $CarreraId = $_POST["CarreraId"];
        }
        //GradoId
        if (empty($_POST["GradosId"])) {
            $errorMSG .= "GradosId is required ";
        } else {
            $GradosId = $_POST["GradosId"];
        }
        //AulaId
        if (empty($_POST["AulaId"])) {
            $errorMSG .= "AulaId is required ";
        } else {
            $AulaId = $_POST["AulaId"];
        }
        //TurnoId
        if (empty($_POST["TurnoId"])) {
            $errorMSG .= "TurnoId is required ";
        } else {
            $TurnoId = $_POST["TurnoId"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE tbGrupos SET Clave = '$Clave' , Descripcion = '$Descripcion', NivelId =  $idinivel, CicloId = $CicloId, GradoId = $GradosId, CarreraId = $CarreraId, AulaId = $AulaId, TurnoId = $TurnoId WHERE GrupoId = $GrupoId";
            if ($conn->query($sql) === TRUE) {
                header('Content-Type: text/html; charset=utf-8');
                echo "success";
                $this->eliminaMatrizHorario($GrupoId);
                $this->creaMatrizHorario($GrupoId, $idinivel, $TurnoId);
            } else {
                echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function addGrupoEscolar() {
        $errorMSG = "";
        //query_action
        if (empty($_POST["query_action"])) {
            $errorMSG .= "query_action is required ";
        } else {
            $query_action = $_POST["query_action"];
        }
        //NivelId
        if (empty($_POST["NivelId"])) {
            $errorMSG .= "NivelId is required ";
        } else {
            $NivelId = $_POST["NivelId"];
        }
        //idicarrera
        if (empty($_POST["idicarrera"])) {
            $errorMSG .= "idicarrera is required ";
        } else {
            $idicarrera = $_POST["idicarrera"];
        }
        //NivelId
        if (empty($_POST["GradosId"])) {
            $errorMSG .= "GradosId is required ";
        } else {
            $GradosId = $_POST["GradosId"];
        }
        //idiciclo
        if (empty($_POST["idiciclo"])) {
            $errorMSG .= "idiciclo is required ";
        } else {
            $idiciclo = $_POST["idiciclo"];
        }
        //TurnoId
        if (empty($_POST["TurnoId"])) {
            $errorMSG .= "TurnoId is required ";
        } else {
            $TurnoId = $_POST["TurnoId"];
        }
        //Clave
        if (empty($_POST["Clave"])) {
            $errorMSG .= "Clave is required ";
        } else {
            $Clave = strtoupper($_POST["Clave"]);
        }
        //Descripcion
        if (empty($_POST["Descripcion"])) {
            $errorMSG .= "Descripcion is required ";
        } else {
            $Descripcion = strtoupper($_POST["Descripcion"]);
        }

        // redirect to success page
        if ($errorMSG == "") {
            if ($query_action == 'insert') {
                include './conexion.php';
                $sql = "INSERT INTO tbGrupos (idicarrera, GradosId, idiciclo, TurnoId, Clave, Descripcion) VALUES ('$idicarrera', '$GradosId', '$idiciclo', '$TurnoId', '$Clave', '$Descripcion')";
                if ($conn->query($sql) === TRUE) {
                    //echo "success";
                    $MyGrupo = $conn->insert_id;
                    $this->creaMatrizHorario($MyGrupo, $NivelId, $TurnoId);
                } else {
                    echo "Error updating record: " . $conn->error;
                }
                $conn->close();
            }
            if ($query_action == 'update') {
                //GrupoId
                if (empty($_POST["GrupoId"])) {
                    $errorMSG .= "Descripcion is required ";
                } else {
                    $GrupoId = $_POST["GrupoId"];
                }
                if ($errorMSG == "") {
                    include './conexion.php';
                    $sql = "UPDATE tbGrupos SET idicarrera ='$idicarrera', GradosId = '$GradosId', idiciclo = '$idiciclo', TurnoId = '$TurnoId', Clave = '$Clave', Descripcion = '$Descripcion' WHERE GrupoId = $GrupoId";
                    if ($conn->query($sql) === TRUE) {
                        //echo "success";
                        //$MyGrupo = $conn->insert_id;
                        //$this->creaMatrizHorario($MyGrupo, $NivelId, $TurnoId);
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }
                    $conn->close();
                } else {
                    echo $errorMSG;
                }
            }
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    //     * Esta funcion crea la matriz de horario escolar desde la interfaz grafica en caso de que no aparezca en la pantalla
    function GrupoEscolarInexist() {
        $errorMSG = "";
        //Clave
        if (empty($_POST["GrupoId"])) {
            $errorMSG .= "GrupoId is required ";
        } else {
            $GrupoId = $_POST["GrupoId"];
        }
        //NivelId
        if (empty($_POST["idinivel"])) {
            $errorMSG .= "idinivel is required ";
        } else {
            $idinivel = $_POST["idinivel"];
        }
        //TurnoId
        if (empty($_POST["TurnoId"])) {
            $errorMSG .= "TurnoId is required ";
        } else {
            $TurnoId = $_POST["TurnoId"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            $this->eliminaMatrizHorario($GrupoId);
            $this->creaMatrizHorario($GrupoId, $idinivel, $TurnoId);
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function creaMatrizHorario($MyGrupo, $idinivel, $TurnoId) {
        include './conexion.php';
        $sql = "INSERT INTO tbHorarioGrupo ( GrupoId, HorarioId ) SELECT $MyGrupo, HoraHorarioId FROM cHorasHorario WHERE NivelId = $idinivel AND TurnoId = $TurnoId";
        if ($conn->query($sql) === TRUE) {
            header('Content-Type: application/json');
            $data = array(
                'success' => 1,
                'GrupoId' => $MyGrupo
            );
            $rows['data'][] = $data;
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "Error tbHorarioGrupo: " . $conn->error;
        }
        $conn->close();
    }

    function eliminaMatrizHorario($GrupoId) {
        include './conexion.php';
        $sql = "DELETE FROM tbHorarioGrupo WHERE GrupoId = $GrupoId";
        if ($conn->query($sql) === TRUE) {
            echo 'success';
        } else {
            echo "Error eliminaMatrizHorario: " . $conn->error;
        }
        $conn->close();
    }

    function getbAlumnoGrupoByIdGrupo() {
        $errorMSG = "";
        //GrupoId
        if (empty($_GET["GrupoId"])) {
            $errorMSG = "GrupoId is required ";
        } else {
            $GrupoId = $_GET["GrupoId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                                    tbAlumnoGrupo.AlumnoGruposId,
                                    alumno.idialumno,
                                    alumno.matricula AS Matricula,
                                    alumno.idigenerales,
                                    datos_generales.nombre AS Nombre,
                                    datos_generales.apellido_paterno AS Apellido_Paterno,
                                    datos_generales.apellido_materno AS Apellido_Materno,
                                    datos_generales.email,
                                    credencial.idicredencial
                                    FROM
                                    tbAlumnoGrupo
                                    INNER JOIN alumno ON tbAlumnoGrupo.idialumno = alumno.idialumno
                                    INNER JOIN datos_generales ON alumno.idigenerales = datos_generales.idigenerales
                                    INNER JOIN credencial ON credencial.idialumno = alumno.idialumno
                                    WHERE
                                    tbAlumnoGrupo.GrupoId = $GrupoId 
                                    ORDER BY
                                    Apellido_Paterno ASC";

            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getDetailGroupById() {
        $errorMSG = "";
        //GrupoId
        if (empty($_GET["GrupoId"])) {
            $errorMSG = "GrupoId is required ";
        } else {
            $GrupoId = $_GET["GrupoId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                    tbGrupos.GrupoId,
                    tbGrupos.idicarrera,
                    tbGrupos.GradosId,
                    tbGrupos.idiciclo,
                    tbGrupos.TurnoId,
                    tbGrupos.deleted,
                    tbGrupos.suspended,
                    tbGrupos.Clave AS grupo,
                    tbGrupos.Descripcion,
                    tbGrupos.created,
                    carrera.nombre AS carrera,
                    cGrados.Descripcion AS grado,
                    cliclo.ciclo,
                    cTurno.Descripcion AS turno,
                    carrera.NivelId
                    FROM
                    tbGrupos
                    INNER JOIN carrera ON tbGrupos.idicarrera = carrera.idicarrera
                    INNER JOIN cGrados ON tbGrupos.GradosId = cGrados.GradosId
                    INNER JOIN cliclo ON tbGrupos.idiciclo = cliclo.idiciclo
                    INNER JOIN cTurno ON tbGrupos.TurnoId = cTurno.TurnoId
                    WHERE
                    tbGrupos.GrupoId = $GrupoId";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    //Enrola a un estudante a un grupo
    function enrolStudent() {
        $errorMSG = "";
        //idialumno
        if (empty($_POST["idialumno"])) {
            $errorMSG .= "idialumno is required ";
        } else {
            $idialumno = $_POST["idialumno"];
        }
        //GrupoId
        if (empty($_POST["GrupoId"])) {
            $errorMSG .= "GrupoId is required ";
        } else {
            $GrupoId = $_POST["GrupoId"];
        }

        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO tbAlumnoGrupo (idialumno, GrupoId) VALUES ('$idialumno', '$GrupoId')";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function unrolStudent() {
        $errorMSG = "";
        //idialumno
        if (empty($_POST["idialumno"])) {
            $errorMSG .= "idialumno is required ";
        } else {
            $idialumno = $_POST["idialumno"];
        }

        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "DELETE FROM tbAlumnoGrupo WHERE idialumno = '$idialumno'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getcHorasByTurnoID() {
        $errorMSG = "";
        //GrupoId
        if (empty($_GET["TurnoId"])) {
            $errorMSG = "TurnoId is required ";
        } else {
            $TurnoId = $_GET["TurnoId"];
        }
        //GrupoId
        if (empty($_GET["NivelId"])) {
            $errorMSG = "NivelId is required ";
        } else {
            $NivelId = $_GET["NivelId"];
        }
        //CarreraId
        if (empty($_GET["CarreraId"])) {
            $errorMSG = "CarreraId is required ";
        } else {
            $CarreraId = $_GET["CarreraId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            //$sql = "SELECT * FROM cHorasHorario WHERE TurnoID ='$TurnoId' AND NivelId = '$NivelId' and CarreraId = '$CarreraId' ORDER BY HoraHorarioId ASC";
            $sql = "SELECT * FROM cHorasHorario WHERE TurnoID ='$TurnoId' AND NivelId = '$NivelId' ORDER BY HoraInicial ASC";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function setProfesorGruposId() {
        $errorMSG = "";
        //GrupoId
        if (empty($_POST["GrupoId"])) {
            $errorMSG = "GrupoId is required ";
        } else {
            $GrupoId = $_POST["GrupoId"];
        }
        //MateriaId
        if (empty($_POST["MateriaId"])) {
            $errorMSG .= "MateriaId is required ";
        } else {
            $MateriaId = $_POST["MateriaId"];
        }
        //MaestroId
        if (empty($_POST["MaestroId"])) {
            $errorMSG .= "MaestroId is required ";
        } else {
            $MaestroId = $_POST["MaestroId"];
        }

        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO tbProfesoresGrupos (ProfesoresId, GrupoId, MateriaId) VALUES ('$MaestroId', '$GrupoId', '$MateriaId');";
            if ($conn->multi_query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function addtbHorarioGrupo() {
        $errorMSG = "";
        $updateQuery = "";
        //GrupoId
        if (empty($_POST["GrupoId"])) {
            $errorMSG = "GrupoId is required ";
        } else {
            $GrupoId = $_POST["GrupoId"];
        }
        //HorarioId
        if (empty($_POST["HorarioId"])) {
            $errorMSG .= "HorarioId is required ";
        } else {
            $HorarioId = $_POST["HorarioId"];
        }
        //Lun
        if (empty($_POST["Lun"])) {
            $Lun = 0;
            $AulaLunId = 0;
        } else {
            $Lun = 1;
            //AulaLunId
            if (empty($_POST["Aula"])) {
                $errorMSG .= "Aula del dia Lunes is required ";
            } else {
                $AulaLunId = $_POST["Aula"];
            }
            //MateriaId
            if (empty($_POST["MateriaId"])) {
                $errorMSG .= "MateriaId is required ";
            } else {
                $asgLunId = $_POST["MateriaId"];
            }
            //MaestroId
            if (empty($_POST["MaestroId"])) {
                $profLunId = "-";
            } else {
                $profLunId = $_POST["MaestroId"];
            }
            $updateQuery = "UPDATE tbHorarioGrupo SET Lun = '1', AulaLunId = '$AulaLunId', profLunId = '$profLunId', asgLunId = '$asgLunId' WHERE tbHorarioGrupo.HorarioId = $HorarioId;";
        }
        //Mar
        if (empty($_POST["Mar"])) {
            $Mar = 0;
            $AulaMarId = 0;
        } else {
            $Mar = 1;
            //AulaMarId
            if (empty($_POST["Aula"])) {
                $errorMSG .= "Aula del dia martes is required ";
            } else {
                $AulaMarId = $_POST["Aula"];
            }
            //MaestroId
            if (empty($_POST["MaestroId"])) {
                $profMarId = "-";
            } else {
                $profMarId = $_POST["MaestroId"];
            }
            //MateriaId
            if (empty($_POST["MateriaId"])) {
                $errorMSG .= "MateriaId is required ";
            } else {
                $asgMarId = $_POST["MateriaId"];
            }
            $updateQuery .= "UPDATE tbHorarioGrupo SET Mar = '1', AulaMarId = '$AulaMarId', profMarId = '$profMarId', asgMarId = '$asgMarId' WHERE tbHorarioGrupo.HorarioId = $HorarioId;";
        }
        //Mie
        if (empty($_POST["Mie"])) {
            $Mie = 0;
            $AulaMieId = 0;
        } else {
            $Mie = 1;
            //AulaMieId
            if (empty($_POST["Aula"])) {
                $errorMSG .= "Aula del dia miercoles is required ";
            } else {
                $AulaMieId = $_POST["Aula"];
            }
            //MaestroId
            if (empty($_POST["MaestroId"])) {
                $profMieId = "-";
            } else {
                $profMieId = $_POST["MaestroId"];
            }
            //MateriaId
            if (empty($_POST["MateriaId"])) {
                $errorMSG .= "MateriaId is required ";
            } else {
                $asgMieId = $_POST["MateriaId"];
            }
            $updateQuery .= "UPDATE tbHorarioGrupo SET Mie = '1', AulaMieId = '$AulaMieId', profMieId = '$profMieId', asgMieId = '$asgMieId' WHERE tbHorarioGrupo.HorarioId = $HorarioId;";
        }
        //Jue
        if (empty($_POST["Jue"])) {
            $Jue = 0;
            $AulaJueId = 0;
        } else {
            $Jue = 1;
            //AulaJueId
            if (empty($_POST["Aula"])) {
                $errorMSG .= "Aula del dia jueves is required ";
            } else {
                $AulaJueId = $_POST["Aula"];
            }
            //MaestroId
            if (empty($_POST["MaestroId"])) {
                $profJueId = "-";
            } else {
                $profJueId = $_POST["MaestroId"];
            }
            //MateriaId
            if (empty($_POST["MateriaId"])) {
                $errorMSG .= "MateriaId is required ";
            } else {
                $asgJueId = $_POST["MateriaId"];
            }
            $updateQuery .= "UPDATE tbHorarioGrupo SET Jue = '1', AulaJueId = '$AulaJueId', profJueId = '$profJueId', asgJueId = '$asgJueId' WHERE tbHorarioGrupo.HorarioId = $HorarioId;";
        }
        //Vie
        if (empty($_POST["Vie"])) {
            $Vie = 0;
            $AulaVieId = 0;
        } else {
            $Vie = 1;
            //AulaVieId
            if (empty($_POST["Aula"])) {
                $errorMSG .= "Aula del dia viernes is required ";
            } else {
                $AulaVieId = $_POST["Aula"];
            }
            //MaestroId
            if (empty($_POST["MaestroId"])) {
                $profVieId = "-";
            } else {
                $profVieId = $_POST["MaestroId"];
            }
            //MateriaId
            if (empty($_POST["MateriaId"])) {
                $errorMSG .= "MateriaId is required ";
            } else {
                $asgVieId = $_POST["MateriaId"];
            }
            $updateQuery .= "UPDATE tbHorarioGrupo SET Vie = '1', AulaVieId = '$AulaVieId', profVieId = '$profVieId', asgVieId = '$asgVieId' WHERE tbHorarioGrupo.HorarioId = $HorarioId;";
        }
        //Sab
        if (empty($_POST["Sab"])) {
            $Sab = 0;
            $AulaSabId = 0;
        } else {
            $Sab = 1;
            //AulaSabId
            if (empty($_POST["Aula"])) {
                $errorMSG .= "Aula del dia sabado is required ";
            } else {
                $AulaSabId = $_POST["Aula"];
            }
            //MaestroId
            if (empty($_POST["MaestroId"])) {
                $profSabId = "-";
            } else {
                $profSabId = $_POST["MaestroId"];
            }
            //MateriaId
            if (empty($_POST["MateriaId"])) {
                $errorMSG .= "MateriaId is required ";
            } else {
                $asgSabId = $_POST["MateriaId"];
            }
            $updateQuery .= "UPDATE tbHorarioGrupo SET Sab = '1', AulaSabId = '$AulaSabId', profSabId = '$profSabId', asgSabId = '$asgSabId' WHERE tbHorarioGrupo.HorarioId = $HorarioId;";
        }
        //Dom
        if (empty($_POST["Dom"])) {
            $Dom = 0;
            $AulaDomId = 0;
        } else {
            $Dom = 1;
            //AulaDomId
            if (empty($_POST["Aula"])) {
                $errorMSG .= "Aula del dia domingo is required ";
            } else {
                $AulaDomId = $_POST["Aula"];
            }
            //MaestroId
            if (empty($_POST["MaestroId"])) {
                $profDomId = "-";
            } else {
                $profDomId = $_POST["MaestroId"];
            }
            //MateriaId
            if (empty($_POST["MateriaId"])) {
                $errorMSG .= "MateriaId is required ";
            } else {
                $asgDomId = $_POST["MateriaId"];
            }
            $updateQuery .= "UPDATE tbHorarioGrupo SET Dom = '1', AulaDomId = '$AulaDomId', profDomId = '$profDomId', asgDomId = '$asgDomId' WHERE tbHorarioGrupo.HorarioId = $HorarioId;";
        }

        if ($errorMSG == "") {
            include './conexion.php';
            $sql = $updateQuery;
            //$sql = "INSERT INTO tbHorarioGrupo (GrupoId, HorarioId, MateriaId, MaestroId, Lun, AulaLunId, Mar, AulaMarId, Mie, AulaMieId, Jue, AulaJueId, Vie, AulaVieId, Sab, AulaSabId, Dom, AulaDomId) VALUES ('$GrupoId', '$HorarioId', '$MateriaId', '$MaestroId', '$Lun', '$AulaLunId', '$Mar', '$AulaMarId', '$Mie', '$AulaMieId', '$Jue', '$AulaJueId', '$Vie', '$AulaVieId', '$Sab', '$AulaSabId', '$Dom', '$AulaDomId');";
            //echo $sql;
            if ($conn->multi_query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function deleteHorarioGrupo() {
        $errorMSG = "";
        //HorarioGrupoId
        if (empty($_POST["HorarioGrupoId"])) {
            $errorMSG = "HorarioGrupoId is required ";
        } else {
            $HorarioGrupoId = $_POST["HorarioGrupoId"];
        }
        //dia
        if (empty($_POST["dia"])) {
            $errorMSG = "dia is required ";
        } else {
            $dia = $_POST["dia"];
        }

        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE tbHorarioGrupo SET $dia= 0 WHERE HorarioGrupoId = $HorarioGrupoId";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function limpiarFilaHorarioGrupo() {
        $errorMSG = "";
        //HorarioGrupoId
        if (empty($_POST["HorarioGrupoId"])) {
            $errorMSG = "HorarioGrupoId is required ";
        } else {
            $HorarioGrupoId = $_POST["HorarioGrupoId"];
        }

        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE tbHorarioGrupo SET Lun = 0, Mar = 0, Mie = 0, Jue = 0, Vie = 0, Sab = 0, Dom = 0 WHERE HorarioGrupoId = $HorarioGrupoId";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getHorarioEscolarByGrupoId() {
        $errorMSG = "";
        //GrupoId
        if (empty($_GET["GrupoId"])) {
            $errorMSG = "GrupoId is required ";
        } else {
            $GrupoId = $_GET["GrupoId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                    tbHorarioGrupo.HorarioGrupoId,
                    tbHorarioGrupo.GrupoId,
                    tbHorarioGrupo.HorarioId,
                    tbHorarioGrupo.Lun,
                    tbHorarioGrupo.AulaLunId,
                    tbHorarioGrupo.profLunId,
                    tbHorarioGrupo.asgLunId,
                    tbHorarioGrupo.Mar,
                    tbHorarioGrupo.AulaMarId,
                    tbHorarioGrupo.profMarId,
                    tbHorarioGrupo.asgMarId,
                    tbHorarioGrupo.Mie,
                    tbHorarioGrupo.AulaMieId,
                    tbHorarioGrupo.profMieId,
                    tbHorarioGrupo.asgMieId,
                    tbHorarioGrupo.Jue,
                    tbHorarioGrupo.AulaJueId,
                    tbHorarioGrupo.profJueId,
                    tbHorarioGrupo.asgJueId,
                    tbHorarioGrupo.Vie,
                    tbHorarioGrupo.AulaVieId,
                    tbHorarioGrupo.profVieId,
                    tbHorarioGrupo.asgVieId,
                    tbHorarioGrupo.Sab,
                    tbHorarioGrupo.AulaSabId,
                    tbHorarioGrupo.profSabId,
                    tbHorarioGrupo.asgSabId,
                    tbHorarioGrupo.Dom,
                    tbHorarioGrupo.AulaDomId,
                    tbHorarioGrupo.profDomId,
                    tbHorarioGrupo.asgDomId,
                    tbGrupos.Clave,
                    tbGrupos.Descripcion,
                    cHorasHorario.HoraInicial,
                    cHorasHorario.HoraFinal
                    FROM
                    tbHorarioGrupo
                    INNER JOIN tbGrupos ON tbHorarioGrupo.GrupoId = tbGrupos.GrupoId
                    INNER JOIN cHorasHorario ON tbHorarioGrupo.HorarioId = cHorasHorario.HoraHorarioId
                    WHERE tbHorarioGrupo.GrupoId = $GrupoId";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function updateHorasHorario() {
        $errorMSG = "";
        //HoraHorarioId
        if (empty($_POST["HoraHorarioId"])) {
            $errorMSG = "HoraHorarioId is required ";
        } else {
            $HoraHorarioId = $_POST["HoraHorarioId"];
        }
        //HoraInicial
        if (empty($_POST["upHoraInicial"])) {
            $errorMSG = "upHoraInicial is required ";
        } else {
            $HoraInicial = $_POST["upHoraInicial"];
        }
        //HoraFinal
        if (empty($_POST["upHoraFinal"])) {
            $errorMSG = "upHoraFinal is required ";
        } else {
            $HoraFinal = $_POST["upHoraFinal"];
        }

        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE cHorasHorario SET HoraInicial = '$HoraInicial', HoraFinal = '$HoraFinal' WHERE HoraHorarioId = $HoraHorarioId";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function addHorasHorario() {
        $errorMSG = "";
        //HoraInicial
        if (empty($_POST["HoraInicial"])) {
            $errorMSG = "HoraInicial is required ";
        } else {
            $HoraInicial = $_POST["HoraInicial"];
        }
        //HoraFinal
        if (empty($_POST["HoraFinal"])) {
            $errorMSG = "HoraFinal is required ";
        } else {
            $HoraFinal = $_POST["HoraFinal"];
        }
        //NivelId
        if (empty($_POST["idiNivel"])) {
            $errorMSG = "idiNivel is required ";
        } else {
            $NivelId = $_POST["idiNivel"];
        }
        //TurnoId
        if (empty($_POST["idiTurno"])) {
            $errorMSG = "idiTurno is required ";
        } else {
            $TurnoId = $_POST["idiTurno"];
        }

        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO cHorasHorario (HoraInicial, HoraFinal, NivelId, TurnoId, PlantelId) VALUES ('$HoraInicial', '$HoraFinal', '$NivelId', '$TurnoId',  '1')";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function deleteHora() {
        $errorMSG = "";
        //idiprofesor
        if (empty($_POST["HoraHorarioId"])) {
            $errorMSG = "HoraHorarioId is required ";
        } else {
            $HoraHorarioId = $_POST["HoraHorarioId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            // sql to delete a record
            $sql = "DELETE FROM cHorasHorario WHERE HoraHorarioId = $HoraHorarioId";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    // -------DAMIAN HERNANDEZ MERINO----------
    /**
     * MUESTRA LOS CAMPUS MEDIANTE UNA TABLA.
     */
    function getCampus() {
        $errorMSG = "";
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM campus WHERE deleted = 0";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function addCampus() {
        $errorMSG = "";
        //campus
        if (empty($_POST["campus"])) {
            $errorMSG = "campus is required ";
        } else {
            $campus = $_POST["campus"];
        }
        //clave
        if (empty($_POST["clave"])) {
            $errorMSG = "clave is required ";
        } else {
            $clave = $_POST["clave"];
        }
        //direccion
        if (empty($_POST["direccion"])) {
            $errorMSG = "direccion is required ";
        } else {
            $direccion = $_POST["direccion"];
        }
        //telefono
        if (empty($_POST["telefono"])) {
            $errorMSG = "telefono is required ";
        } else {
            $telefono = $_POST["telefono"];
        }

        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO campus (campus, clave, direccion, telefono) VALUES ('$campus', '$clave', '$direccion', '$telefono')";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function deleteCampus() {
        $errorMSG = "";
        //idiprofesor
        if (empty($_POST["idicampus"])) {
            $errorMSG = "idicampus is required ";
        } else {
            $idicampus = $_POST["idicampus"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            // sql to delete a record
            $sql = "UPDATE campus SET deleted = 1 WHERE idicampus = $idicampus";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function suspended_campus() {
        $errorMSG = "";
        if (empty($_POST["idicampus"])) {
            $errorMSG = "idicampus is required ";
        } else {
            $idicampus = $_POST["idicampus"];
        }
        if (empty($_POST["suspended"])) {
            $suspended = '0';
        } else {
            $suspended = $_POST["suspended"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE campus SET suspended = '$suspended' WHERE idicampus = '$idicampus'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error : " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getCampusbyidicampus() {
        $errorMSG = "";
        //idicampus
        if (empty($_GET["idicampus"])) {
            $errorMSG = "idicampus is required ";
        } else {
            $idicampus = $_GET["idicampus"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM campus WHERE idicampus=$idicampus";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function updateCampus() {
        $errorMSG = "";
        //idicampus
        if (empty($_POST["idicampus"])) {
            $errorMSG .= "idicampus is required ";
        } else {
            $idicampus = $_POST["idicampus"];
        }
        //campus
        if (empty($_POST["campus"])) {
            $errorMSG .= "campus is required ";
        } else {
            $campus = $_POST["campus"];
        }
        //clave
        if (empty($_POST["clave"])) {
            $errorMSG .= "clave is required ";
        } else {
            $clave = $_POST["clave"];
        }
        //direccion
        if (empty($_POST["direccion"])) {
            $errorMSG .= "direccion is required ";
        } else {
            $direccion = $_POST["direccion"];
        }
        //telefono
        if (empty($_POST["telefono"])) {
            $errorMSG .= "telefono is required ";
        } else {
            $telefono = $_POST["telefono"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE campus SET campus='$campus', clave = '$clave', direccion = '$direccion', telefono = '$telefono' WHERE idicampus = '$idicampus'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function addcTurno() {
        $errorMSG = "";
        //Decripcion
        if (empty($_POST["Descripcion"])) {
            $errorMSG = "Descripcion is required ";
        } else {
            $Descripcion = $_POST["Descripcion"];
        }
        //Estatus
        if (empty($_POST["Estatus"])) {
            $errorMSG .= "Estatus is required ";
        } else {
            $Estatus = $_POST["Estatus"];
            if ($Estatus === true) {
                $Estatus = 1;
            } elseif ($Estatus === false) {
                $Estatus = 0;
            }
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO cTurno (Descripcion) VALUES ('$Descripcion')";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getCampusbycTurnoId() {
        $errorMSG = "";
        //idicampus
        if (empty($_GET["TurnoId"])) {
            $errorMSG = "TurnoId is required ";
        } else {
            $TurnoId = $_GET["TurnoId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM cTurno WHERE TurnoId='$TurnoId'";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function updatecTurno() {
        $errorMSG = "";
        //idicampus
        if (empty($_POST["TurnoId"])) {
            $errorMSG .= "TurnoId is required ";
        } else {
            $TurnoId = $_POST["TurnoId"];
        }
        //Descripcion
        if (empty($_POST["Descripcion"])) {
            $errorMSG .= "Descripcion is required ";
        } else {
            $Descripcion = $_POST["Descripcion"];
        }
        //Estatus
        if (empty($_POST["Estatus"])) {
            $errorMSG .= "Estatus is required ";
        } else {
            $Estatus = $_POST["Estatus"];
            if ($Estatus == 'true') {
                $Estatus = '1';
            } elseif ($Estatus == 'false') {
                $Estatus = '0';
            }
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE cTurno SET  Descripcion = '$Descripcion', Estatus = '$Estatus' WHERE TurnoId = '$TurnoId'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function deletecTurno() {
        $errorMSG = "";
        //idiprofesor
        if (empty($_POST["TurnoId"])) {
            $errorMSG = "TurnoId is required ";
        } else {
            $TurnoId = $_POST["TurnoId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            // sql to delete a record
            $sql = "UPDATE cTurno SET deleted = 1 WHERE TurnoId = $TurnoId";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function suspended_turno() {
        $errorMSG = "";
        if (empty($_POST["TurnoId"])) {
            $errorMSG = "TurnoId is required ";
        } else {
            $TurnoId = $_POST["TurnoId"];
        }
        if (empty($_POST["suspended"])) {
            $suspended = '0';
        } else {
            $suspended = $_POST["suspended"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE cTurno SET suspended = '$suspended' WHERE TurnoId = '$TurnoId'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error : " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function addcSituacion() {
        $errorMSG = "";
        //Decripcion
        if (empty($_POST["Descripcion"])) {
            $errorMSG = "Descripcion is required ";
        } else {
            $Descripcion = $_POST["Descripcion"];
        }
        //Estatus
        if (empty($_POST["Estatus"])) {
            $errorMSG .= "Estatus is required ";
        } else {
            $Estatus = $_POST["Estatus"];
            if ($Estatus === true) {
                $Estatus = 1;
            } elseif ($Estatus === false) {
                $Estatus = 0;
            }
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO cSituacion (Descripcion, Estatus) VALUES ('$Descripcion', $Estatus)";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getcSituacion() {
        header('Content-Type: application/json');
        include './conexion.php';
        $sql = "SELECT * FROM cSituacion ";
        $result = $conn->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $rows['data'][] = $row;
            }
            print json_encode($rows, JSON_PRETTY_PRINT);
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getSituacionbyId() {
        $errorMSG = "";
        //SituacionId
        if (empty($_GET["SituacionId"])) {
            $errorMSG = "SituacionId is required ";
        } else {
            $SituacionId = $_GET["SituacionId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM cSituacion WHERE SituacionId='$SituacionId'";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function deletecSituacion() {
        $errorMSG = "";
        //idiprofesor
        if (empty($_POST["SituacionId"])) {
            $errorMSG = "SituacionID is required ";
        } else {
            $SituacionId = $_POST["SituacionId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            // sql to delete a record
            $sql = "DELETE FROM cSituacion WHERE SituacionID=$SituacionId";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error deleting record: " . $conn->error;
            }

            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function updatecSituacion() {
        $errorMSG = "";
        //idicampus
        if (empty($_POST["SituacionId"])) {
            $errorMSG .= "SituacionId is required ";
        } else {
            $SituacionId = $_POST["SituacionId"];
        }
        //Descripcion
        if (empty($_POST["Descripcion"])) {
            $errorMSG .= "Descripcion is required ";
        } else {
            $Descripcion = $_POST["Descripcion"];
        }
        //Estatus
        if (empty($_POST["Estatus"])) {
            $errorMSG .= "Estatus is required ";
        } else {
            $Estatus = $_POST["Estatus"];
            if ($Estatus == 'true') {
                $Estatus = '1';
            } elseif ($Estatus == 'false') {
                $Estatus = '0';
            }
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE cSituacion SET  Descripcion = '$Descripcion', Estatus = '$Estatus' WHERE SituacionId = '$SituacionId'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /*
     * AGREGA UNA NUEVA AULA ID A LA TABLA DE cAULAS.
     */

    function addAulas() {
        $errorMSG = "";
        //Decripcion
        if (empty($_POST["Clave"])) {
            $errorMSG = "Clave is required ";
        } else {
            $Clave = $_POST["Clave"];
        }
        //Decripcion
        if (empty($_POST["Descripcion"])) {
            $errorMSG .= "Descripcion is required ";
        } else {
            $Descripcion = $_POST["Descripcion"];
        }
        //Decripcion
        if (empty($_POST["Capacidad"])) {
            $errorMSG .= "Capacidad is required ";
        } else {
            $Capacidad = $_POST["Capacidad"];
        }

        //Estatus
        if (empty($_POST["Estatus"])) {
            $errorMSG .= "Estatus is required ";
        } else {
            $Estatus = $_POST["Estatus"];
            if ($Estatus === true) {
                $Estatus = 1;
            } elseif ($Estatus === false) {
                $Estatus = 0;
            }
        }
        if (empty($_POST["idicampus"])) {
            $errorMSG .= "idicampus is required ";
        } else {
            $idiCampus = $_POST["idicampus"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO cAulas (Clave, Descripcion, Capacidad, Estatus,idicampus ) VALUES ('$Clave','$Descripcion','$Capacidad',$Estatus,'$idiCampus' )";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /*
     * REALIZA LA ELIMINACION DEL AULA ID SELECCIONADOS
     */

    function deleteAula() {
        $errorMSG = "";
        //idiaula
        if (empty($_POST["AulaId"])) {
            $errorMSG = "AulaId is required ";
        } else {
            $AulaId = $_POST["AulaId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            // sql to delete a record
            $sql = "DELETE FROM cAulas WHERE AulaId='$AulaId'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error deleting record: " . $conn->error;
            }

            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /*
     * TRAE DATOS DE LA FILA AULA ID SELECCIONADA 
     */

    function getAulasbyId() {
        $errorMSG = "";
        //idicampus
        if (empty($_GET["AulaId"])) {
            $errorMSG = "AulaId is required ";
        } else {
            $AulaId = $_GET["AulaId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM cAulas WHERE AulaId='$AulaId'";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /*
     * ACTUALIZA LOS DATOS DE LA FILA AULAID SELECCIONADA 
     */

    function updateAula() {
        $errorMSG = "";
        //idicampus
        if (empty($_POST["AulaId"])) {
            $errorMSG .= "AulaId is required ";
        } else {
            $AulaId = $_POST["AulaId"];
        }
        //Descripcion
        if (empty($_POST["Clave"])) {
            $errorMSG .= "Clave is required ";
        } else {
            $Clave = $_POST["Clave"];
        }
        //Estatus
        if (empty($_POST["Descripcion"])) {
            $errorMSG .= "Descripcion is required ";
        } else {
            $Descripcion = $_POST["Descripcion"];
        }
        if (empty($_POST["Capacidad"])) {
            $errorMSG .= "Capacidad is required ";
        } else {
            $Capacidad = $_POST["Capacidad"];
        }
        if (empty($_POST["Estatus"])) {
            $errorMSG .= "Estatus is required ";
        } else {
            $Estatus = $_POST["Estatus"];
            if ($Estatus == 'true') {
                $Estatus = '1';
            } elseif ($Estatus == 'false') {
                $Estatus = '0';
            }
        }
        if (empty($_POST["idicampus"])) {
            $errorMSG .= "Estatus is required ";
        } else {
            $idicampus = $_POST["idicampus"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE cAulas SET  Clave = '$Clave', Descripcion = '$Descripcion', Capacidad = '$Capacidad' , Estatus = '$Estatus', idicampus = '$idicampus'  WHERE AulaId = '$AulaId'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /*
     * TRAE EL CAMPO ID CARRERA
     */

    function getGradosByIdCarrera() {
        $errorMSG = "";
        //CarreraId
        if (empty($_GET["CarreraId"])) {
            $errorMSG = "CarreraId is required ";
        } else {
            $CarreraId = $_GET["CarreraId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM `cGrados` WHERE idicarrera=$CarreraId;";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getcarrera_idicampus() {
        $errorMSG = "";
        //CarreraId
        if (empty($_GET["idicampus"])) {
            $errorMSG = "idicampus is required ";
        } else {
            $idicampus = $_GET["idicampus"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                                        carrera.idicampus,
                                        carrera.idicarrera,
                                        cNiveles.Descripcion,
                                        carrera.nombre,
                                        carrera.deleted,
                                        carrera.suspended 
                                        FROM
                                        carrera
                                        INNER JOIN cNiveles ON carrera.NivelId = cNiveles.NivelId 
                                        WHERE
                                        carrera.idicampus = $idicampus
                                        AND carrera.deleted = 0 
                                        AND carrera.suspended = 0";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /*
     * AGREGA UN NUEVO GRADO ID A LA TABLA DE cGRADOS.
     */

    function addcGrados() {
        $errorMSG = "";
        //NivelId
        if (empty($_POST["NivelId"])) {
            $errorMSG .= "NivelId is required ";
        } else {
            $NivelId = $_POST["NivelId"];
        }
        //Descripcion
        if (empty($_POST["Descripcion"])) {
            $errorMSG = "Descripcion is required ";
        } else {
            $Descripcion = $_POST["Descripcion"];
        }
        //Abreviatura
        if (empty($_POST["Abreviatura"])) {
            $errorMSG .= "Abreviatura is required ";
        } else {
            $Abreviatura = $_POST["Abreviatura"];
        }
        //query_action
        if (empty($_POST["query_action"])) {
            $errorMSG .= "query_action is required ";
        } else {
            $query_action = $_POST["query_action"];
        }
        if ($errorMSG == "") {
            if ($query_action == 'insert') {
                include './conexion.php';
                $sql = "INSERT INTO cGrados (Descripcion, Abreviatura, NivelId) VALUES ('$Descripcion','$Abreviatura','$NivelId' )";
                if ($conn->query($sql) === TRUE) {
                    echo "success";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
            }
            if ($query_action == 'update') {
                //GradosId
                if (empty($_POST["GradosId"])) {
                    $errorMSG .= "GradosId is required ";
                } else {
                    $GradosId = $_POST["GradosId"];
                }
                if ($errorMSG == "") {
                    include './conexion.php';
                    $sql = "UPDATE cGrados SET Descripcion = '$Descripcion', Abreviatura = '$Abreviatura' WHERE GradosId = $GradosId  ";
                    if ($conn->query($sql) === TRUE) {
                        echo "success";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                    $conn->close();
                } else {
                    echo $errorMSG;
                }
            }
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /*
     * ACTUALIZA LA INFORMACION DEL GRADOS ID SELECCIONADO
     */

    function updatecGrados() {
        $errorMSG = "";
        //idicampus
        if (empty($_POST["GradosId"])) {
            $errorMSG = "Descripcion is required ";
        } else {
            $GradosId = $_POST["GradosId"];
        }
        if (empty($_POST["Descripcion"])) {
            $errorMSG = "Descripcion is required ";
        } else {
            $Descripcion = $_POST["Descripcion"];
        }
        //Abreviatura
        if (empty($_POST["Abreviatura"])) {
            $errorMSG .= "Abreviatura is required ";
        } else {
            $Abreviatura = $_POST["Abreviatura"];
        }
        //NivelId
        if (empty($_POST["NivelId"])) {
            $errorMSG .= "NivelId is required ";
        } else {
            $NivelId = $_POST["NivelId"];
        }
        //CarreraId
        if (empty($_POST["idicarrera"])) {
            $errorMSG .= "CarreraId is required ";
        } else {
            $idicarrera = $_POST["idicarrera"];
        }
        //Estatus
        if (empty($_POST["Estatus"])) {
            $errorMSG .= "Estatus is required ";
        } else {
            $Estatus = $_POST["Estatus"];
            if ($Estatus == 'true') {
                $Estatus = '1';
            } elseif ($Estatus == 'false') {
                $Estatus = '0';
            }
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE cGrados SET GradosId = '$GradosId', Descripcion = '$Descripcion', Abreviatura = '$Abreviatura', NivelId= '$NivelId', idicarrera = '$idicarrera', Estatus = '$Estatus' WHERE GradosId = '$GradosId'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function deletecGrados() {
        $errorMSG = "";
        //idiaula
        if (empty($_POST["GradosId"])) {
            $errorMSG = "GradosId is required ";
        } else {
            $GradosId = $_POST["GradosId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            // sql to delete a record
            $sql = "UPDATE cGrados  SET deleted= 1 WHERE GradosId='$GradosId'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error deleting record: " . $conn->error;
            }

            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function suspendedcGrados() {
        $errorMSG = "";
        if (empty($_POST["GradosId"])) {
            $errorMSG = "GradosId is required ";
        } else {
            $GradosId = $_POST["GradosId"];
        }
        if (empty($_POST["suspended"])) {
            $suspended = '0';
        } else {
            $suspended = $_POST["suspended"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE cGrados SET suspended = '$suspended' WHERE GradosId = '$GradosId'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error : " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /*
     * TRAE EL CAMPO GRADOS ID
     */

    function getcGradosbyIdcarrera() {
        $errorMSG = "";
        //idicampus
        if (empty($_GET["GradosId"])) {
            $errorMSG = "GradosId is required ";
        } else {
            $GradosId = $_GET["GradosId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT FROM cGrados WHERE GradosId='$GradosId'";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /*
     * AGREGA UN NUEVO NIVEL ID A LA TABLA DE cNIVELES.
     */

    function addcNiveles() {
        $errorMSG = "";
        //Decripcion
        if (empty($_POST["Descripcion"])) {
            $errorMSG .= "Descripcion is required ";
        } else {
            $Descripcion = $_POST["Descripcion"];
        }
        //Abreviatura
        if (empty($_POST["Abreviatura"])) {
            $errorMSG .= "Abreviatura is required ";
        } else {
            $Abreviatura = $_POST["Abreviatura"];
        }
        //query_action
        if (empty($_POST["query_action"])) {
            $errorMSG .= "query_action is required ";
        } else {
            $query_action = $_POST["query_action"];
        }

        if ($errorMSG == "") {
            if ($query_action == 'insert') {
                include './conexion.php';
                $sql = "INSERT INTO cNiveles (Descripcion, Abreviatura) VALUES ('$Descripcion','$Abreviatura')";
                if ($conn->query($sql) === TRUE) {
                    echo "success";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
            }
            if ($query_action == 'update') {
                //NivelId
                if (empty($_POST["NivelId"])) {
                    $errorMSG .= "NivelId is required ";
                } else {
                    $NivelId = $_POST["NivelId"];
                }
                if ($errorMSG == "") {
                    include './conexion.php';
                    $sql = "UPDATE cNiveles SET Descripcion = '$Descripcion', Abreviatura = '$Abreviatura' WHERE NivelId = $NivelId";
                    if ($conn->query($sql) === TRUE) {
                        echo "success";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                    $conn->close();
                } else {
                    echo $errorMSG;
                }
            }
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /*
     * TRAE EL CAMPO IDICAMPUS
     */

    function getcNivelesbyidicampus() {
        $errorMSG = "";
        //idiciclo
        if (empty($_GET["idicampus"])) {
            $errorMSG = "idicampus is required ";
        } else {
            $idicampus = $_GET["idicampus"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM cNiveles WHERE idicampus=$idicampus";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getcNiveles() {
        $errorMSG = "";
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                                        cNiveles.NivelId,
                                        cNiveles.deleted,
                                        cNiveles.suspended,
                                        cNiveles.Descripcion,
                                        cNiveles.Abreviatura,
                                        cNiveles.created 
                                        FROM
                                        cNiveles 
                                        WHERE
                                        cNiveles.deleted = 0 ";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /*
     * TRAE EL CAMPO GRADOSID
     */

    function getcGradosbyId() {
        $errorMSG = "";
        //GradosId
        if (empty($_GET["idicarrera"])) {
            $errorMSG = "idicarrera is required ";
        } else {
            $idicarrera = $_GET["idicarrera"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM cGrados WHERE idicarrera=$idicarrera";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /*
     * REALIZA LA ELIMINACION DEL NIVEL ID SELECCIONADOS
     */

    function deletecNiveles() {
        $errorMSG = "";
        if (empty($_POST["NivelId"])) {
            $errorMSG = "NivelId is required ";
        } else {
            $NivelId = $_POST["NivelId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            // sql to delete a record
            $sql = "UPDATE cNiveles SET deleted = 1 WHERE NivelId = '$NivelId'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function suspended_cNiveles() {
        $errorMSG = "";
        if (empty($_POST["NivelId"])) {
            $errorMSG = "NivelId is required ";
        } else {
            $NivelId = $_POST["NivelId"];
        }
        if (empty($_POST["suspended"])) {
            $suspended = '0';
        } else {
            $suspended = $_POST["suspended"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE cNiveles SET suspended = '$suspended' WHERE NivelId = '$NivelId'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error : " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /*
     * TRAE EL CAMPO NIVEL ID
     */

    function getcNivelesbyIdNiveles() {
        $errorMSG = "";
        //NivelId
        if (empty($_GET["NivelId"])) {
            $errorMSG = "NivelId is required ";
        } else {
            $NivelId = $_GET["NivelId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM cNiveles WHERE NivelId='$NivelId'";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /*
     * ACTUALIZA LA INFORMACION DEL NIVEL ID SELECCIONADO
     */

    function updatecNiveles() {
        $errorMSG = "";
        //Decripcion
        if (empty($_POST["NivelId"])) {
            $errorMSG .= "NivelId is required ";
        } else {
            $NivelId = $_POST["NivelId"];
        }
        if (empty($_POST["Descripcion"])) {
            $errorMSG .= "Descripcion is required ";
        } else {
            $Descripcion = $_POST["Descripcion"];
        }
        //Abreviatura
        if (empty($_POST["Abreviatura"])) {
            $errorMSG .= "Abreviatura is required ";
        } else {
            $Abreviatura = $_POST["Abreviatura"];
        }
        //idicampus
        if (empty($_POST["idicampus"])) {
            $errorMSG .= "idicampus is required ";
        } else {
            $idicampus = $_POST["idicampus"];
        }
        //Estatus
        if (empty($_POST["Estatus"])) {
            $errorMSG .= "Estatus is required ";
        } else {
            $Estatus = $_POST["Estatus"];
            if ($Estatus == 'true') {
                $Estatus = '1';
            } elseif ($Estatus == 'false') {
                $Estatus = '0';
            }
        }
        if (empty($_POST["RVOE"])) {
            $RVOE = "";
        } else {
            $RVOE = $_POST["RVOE"];
        }
        //Tiene carrera
        if (empty($_POST["TieneCarreras"])) {
            $TieneCarreras = 1;
        } else {
            $TieneCarreras = $_POST["TieneCarreras"];
        }
        //GradoMaximo
        if (empty($_POST["GradoMaximo"])) {
            $GradoMaximo = 1;
        } else {
            $GradoMaximo = $_POST["GradoMaximo"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE cNiveles SET  NivelId = '$NivelId', Descripcion = '$Descripcion', Abreviatura = '$Abreviatura' , idicampus = '$idicampus', Estatus = '$Estatus', RVOE = '$RVOE' , TieneCarreras = '$TieneCarreras', GradoMaximo='$GradoMaximo'  WHERE NivelId = '$NivelId'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /*
     * TRAE EL CAMPO NIVEL ID
     */

    function getcarrerabyNivelId() {//se anexo por la eliminacion de la tabla cCarreras
        $errorMSG = "";
        //doc_nacimiento
        if (empty($_GET["NivelId"])) {
            $errorMSG .= "NivelId is required ";
        } else {
            $NivelId = $_GET["NivelId"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM carrera where NivelId = $NivelId";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getCarreraByIdiCampus() {//se anexo por la eliminacion de la tabla cCarreras
        $errorMSG = "";
        //doc_nacimiento
        if (empty($_GET["idicampus"])) {
            $errorMSG .= "idicampus is required ";
        } else {
            $idicampus = $_GET["idicampus"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                                        carrera.idicarrera,
                                        carrera.NivelId,
                                        carrera.idicampus,
                                        carrera.idinotification,
                                        carrera.deleted,
                                        carrera.suspended,
                                        carrera.nombre,
                                        carrera.description,
                                        carrera.salary,
                                        carrera.available,
                                        cNiveles.Descripcion as nivel
                                        FROM
                                        carrera
                                        INNER JOIN cNiveles ON carrera.NivelId = cNiveles.NivelId
                                        WHERE
                                        carrera.deleted = 0 AND
                                        carrera.suspended = 0 and
                                        carrera.idicampus = $idicampus";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /*
     * TRAE EL CAMPO NIVEL ID
     */

    function getcarrerabyId() {//se anexo por la eliminacion de la tabla cCarreras
        $errorMSG = "";
        //doc_nacimiento
        if (empty($_GET["idicarrera"])) {
            $errorMSG .= "idicarrera is required ";
        } else {
            $idicarrera = $_GET["idicarrera"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                                        campus.campus,
                                        cNiveles.Descripcion AS nivel,
                                        carrera.idicarrera,
                                        carrera.NivelId,
                                        carrera.idicampus,
                                        carrera.idinotification,
                                        carrera.deleted,
                                        carrera.suspended,
                                        carrera.nombre,
                                        carrera.description,
                                        carrera.comments,
                                        carrera.working_day,
                                        carrera.salary,
                                        carrera.message,
                                        carrera.available,
                                        carrera.rvoe,
                                        carrera.numero_carrera,
                                        carrera.lms_course_id,
                                        carrera.files_name,
                                        carrera.files_size,
                                        carrera.files_type,
                                        carrera.deadline,
                                        carrera.clave,
                                        carrera.last_update,
                                        carrera.categoria,
                                        carrera.duracion 
                                        FROM
                                        carrera
                                        INNER JOIN campus ON carrera.idicampus = campus.idicampus
                                        INNER JOIN cNiveles ON carrera.NivelId = cNiveles.NivelId 
                                        WHERE
                                        carrera.deleted = 0 
                                        AND carrera.idicarrera = '$idicarrera' ";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getAllCarreras() {//se anexo por la eliminacion de la tabla cCarreras
        $errorMSG = "";
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                                        carrera.idicarrera,
                                        carrera.NivelId,
                                        carrera.idicampus,
                                        carrera.idinotification,
                                        carrera.deleted,
                                        carrera.suspended,
                                        carrera.nombre,
                                        carrera.description,
                                        carrera.comments,
                                        carrera.working_day,
                                        carrera.salary,
                                        carrera.message,
                                        carrera.rvoe,
                                        carrera.last_update,
                                        campus.campus,
                                        cNiveles.Descripcion AS perfil,
                                        carrera.available,
                                        carrera.deadline
                                        FROM
                                        carrera
                                        INNER JOIN campus ON carrera.idicampus = campus.idicampus
                                        INNER JOIN cNiveles ON carrera.NivelId = cNiveles.NivelId
                                        WHERE
                                        carrera.deleted = 0
                                        ORDER BY
                                        carrera.idicarrera DESC";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getMateriasByNivelIDAndCarreraIdAndGradoId() {
        $errorMSG = "";
        //NivelId
        if (empty($_GET["NivelId"])) {
            $errorMSG = "NivelId is required ";
        } else {
            $NivelId = $_GET["NivelId"];
        }
        //CarreraId
        if (empty($_GET["CarreraId"])) {
            $errorMSG = "CarreraId is required ";
        } else {
            $CarreraId = $_GET["CarreraId"];
        }
        //GradoId
        if (empty($_GET["GradosId"])) {
            $errorMSG = "GradosId is required ";
        } else {
            $GradoId = $_GET["GradosId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM tbMaterias WHERE NivelId = '$NivelId' AND CarreraId = '$CarreraId' AND GradoId = '$GradoId'";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                $rows['error'][] = "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                $rows['error'][] = "Something went wrong :(";
            } else {
                $rows['error'][] = $errorMSG;
            }
        }
    }

    function getcGradobyIDcarreraID() {//se anexo por la eliminacion de la tabla cCarreras
        $errorMSG = "";
        //doc_nacimiento
        if (empty($_GET["idicarrera"])) {
            $errorMSG .= "idicarrera is required ";
        } else {
            $idicarrera = $_GET["idicarrera"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM cGrados where idicarrera = $idicarrera";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /*
     * AGREGA UN NUEVO GRADO ID A LA TABLA DE cGRADOS.
     */

    function addTablaMateria() {
        $errorMSG = "";
        //Descripcion
        if (empty($_POST["DescripcionPlan"])) {
            $errorMSG = "DescripcionPlan is required ";
        } else {
            $DescripcionPlan = $_POST["DescripcionPlan"];
        }
        //Abreviatura
        if (empty($_POST["NivelId"])) {
            $errorMSG .= "NivelId is required ";
        } else {
            $NivelId = $_POST["NivelId"];
        }
        //NivelId
        if (empty($_POST["CarreraId"])) {
            $errorMSG .= "CarreraId is required ";
        } else {
            $CarreraId = $_POST["CarreraId"];
        }
        //CarreraId
        if (empty($_POST["GradosId"])) {
            $errorMSG .= "GradosId is required ";
        } else {
            $GradosId = $_POST["GradosId"];
        }
        //CarreraId
        if (empty($_POST["Clave"])) {
            $errorMSG .= "Clave is required ";
        } else {
            $Clave = $_POST["Clave"];
        }
        //CarreraId
        if (empty($_POST["Nombre"])) {
            $errorMSG .= "Nombre is required ";
        } else {
            $Nombre = $_POST["Nombre"];
        }
        if (empty($_POST["Creditos"])) {
            $errorMSG .= "Creditos is required ";
        } else {
            $Creditos = $_POST["Creditos"];
        }
        if (empty($_POST["HorasSemana"])) {
            $errorMSG .= "HorasSemana is required ";
        } else {
            $HorasSemana = $_POST["HorasSemana"];
        }
        if (empty($_POST["HorasSemana"])) {
            $errorMSG .= "HorasSemana is required ";
        } else {
            $HorasSemana = $_POST["HorasSemana"];
        }

        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "INSERT INTO tbMaterias (DescripcionPlan, NivelId, CarreraId, GradoId, Clave, Nombre, Creditos, HorasSemana ) VALUES"
                    . " ('$DescripcionPlan','$NivelId','$CarreraId','$GradosId','$Clave', '$Nombre', '$Creditos', '$HorasSemana' )"; //AND GradoId = '$GradoId'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /*
     * REALIZA LA ELIMINACION DEL NIVEL ID SELECCIONADOS
     */

    function deleteTablaMateria() {
        $errorMSG = "";
        //idiaula
        if (empty($_POST["MateriaId"])) {
            $errorMSG = "NivelId is required ";
        } else {
            $MateriaId = $_POST["MateriaId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            // sql to delete a record
            $sql = "DELETE FROM tbMaterias WHERE MateriaId='$MateriaId'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error deleting record: " . $conn->error;
            }

            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getcTablaMateriaId() {
        $errorMSG = "";
        //GradosId
        if (empty($_GET["MateriaId"])) {
            $errorMSG = "MateriaId is required ";
        } else {
            $MateriaId = $_GET["MateriaId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM tbMaterias WHERE MateriaId=$MateriaId";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getgradobyId() {
        $errorMSG = "";
        //doc_nacimiento
        if (empty($_GET["GradosId"])) {
            $errorMSG .= "GradosId is required ";
        } else {
            $GradosId = $_GET["GradosId"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM cGrados where GradosId = $GradosId";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getgradobyNivelId() {//se anexo por la eliminacion de la tabla cCarreras
        $errorMSG = "";
        //doc_nacimiento
        if (empty($_GET["NivelId"])) {
            $errorMSG .= "NivelId is required ";
        } else {
            $NivelId = $_GET["NivelId"];
        }
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM cGrados where NivelId = $NivelId";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function updateTablaMaterias() {
        $errorMSG = "";
        //MateriaID
        if (empty($_POST["MateriaId"])) {
            $errorMSG .= "MateriaId is required ";
        } else {
            $MateriaId = $_POST["MateriaId"];
            //DescripcionPlan
        }
        if (empty($_POST["DescripcionPlan"])) {
            $errorMSG .= "DescripcionPlan is required ";
        } else {
            $DescripcionPlan = $_POST["DescripcionPlan"];
        }
        //NivelId
        if (empty($_POST["NivelId"])) {
            $errorMSG .= "NivelId is required ";
        } else {
            $NivelId = $_POST["NivelId"];
        }
        //CarreraId
        if (empty($_POST["CarreraId"])) {
            $errorMSG .= "idicampus is required ";
        } else {
            $CarreraId = $_POST["CarreraId"];
        }
        //GradoId
        if (empty($_POST["GradoId"])) {
            $errorMSG .= "GradoId is required ";
        } else {
            $GradoId = $_POST["GradoId"];
        }
        //Clave
        if (empty($_POST["Clave"])) {
            $errorMSG .= "Clave is required ";
        } else {
            $Clave = $_POST["Clave"];
        }
        //Nombre
        if (empty($_POST["Nombre"])) {
            $errorMSG .= "Nombre is required ";
        } else {
            $Nombre = $_POST["Nombre"];
        }
        //Creditos
        if (empty($_POST["Creditos"])) {
            $errorMSG .= "Creditos is required ";
        } else {
            $Creditos = $_POST["Creditos"];
        }
        if (empty($_POST["HorasSemana"])) {
            $errorMSG .= "HorasSemana is required ";
        } else {
            $HorasSemana = $_POST["HorasSemana"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE tbMaterias SET  MateriaId = '$MateriaId', DescripcionPlan = '$DescripcionPlan', NivelId = '$NivelId' , CarreraId = '$CarreraId', GradoId = '$GradoId', Clave = '$Clave' , Nombre = '$Nombre', Creditos='$Creditos', HorasSemana = '$HorasSemana'  WHERE MateriaId = '$MateriaId'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /*
     * ACTUALIZA EL IDIPROFESOR SELECCIONADO
     */

    function updateProfesor() {
        $errorMSG = "";
        //idiprofesor
        if (empty($_POST["idiprofesor"])) {
            $idiprofesor = "";
        } else {
            $idiprofesor = $_POST["idiprofesor"];
        }
        //idicampus
        if (empty($_POST["idicampus"])) {
            $idicampus = "";
        } else {
            $idicampus = $_POST["idicampus"];
        }
        //nombre
        if (empty($_POST["nombre"])) {
            $nombre = "";
        } else {
            $nombre = $_POST["nombre"];
        }
        //apellido_paterno
        if (empty($_POST["apellido_paterno"])) {
            $apellido_paterno = "";
        } else {
            $apellido_paterno = $_POST["apellido_paterno"];
        }
        //apellido_materno
        if (empty($_POST["apellido_materno"])) {
            $apellido_materno = "";
        } else {
            $apellido_materno = $_POST["apellido_paterno"];
        }
        //fecha_nacimientos
        if (empty($_POST["fecha_nacimiento"])) {
            $fecha_nacimiento = 'NULL';
        } else {
            $f = $_POST["fecha_nacimiento"];
            $fecha_nacimiento = "'$f'";
        }
        //email
        if (empty($_POST["email"])) {
            $errorMSG .= "email is required ";
        } else {
            $email = $_POST["email"];
        }
        //telefono
        if (empty($_POST["telefono"])) {
            $telefono = "";
        } else {
            $telefono = $_POST["telefono"];
        }
        //edad
        if (empty($_POST["edad"])) {
            $errorMSG .= "edad is required ";
        } else {
            $edad = $_POST["edad"];
        }
        //curp
        if (empty($_POST["curp"])) {
            $curp = "";
        } else {
            $curp = $_POST["curp"];
        }
        //genero
        if (empty($_POST["genero"])) {
            $errorMSG .= "genero is required ";
        } else {
            $genero = $_POST["genero"];
        }
        //rfc
        if (empty($_POST["rfc"])) {
            $rfc = "";
        } else {
            $rfc = $_POST["rfc"];
        }
        //nss
        if (empty($_POST["nss"])) {
            $nss = "";
        } else {
            $nss = $_POST["nss"];
        }
        //movil
        if (empty($_POST["movil"])) {
            $movil = '';
        } else {
            $movil = $_POST["movil"];
        }
        //direccion
        if (empty($_POST["direccion"])) {
            $direccion = "";
        } else {
            $direccion = $_POST["direccion"];
        }
        //ciudad
        if (empty($_POST["ciudad"])) {
            $ciudad = "";
        } else {
            $ciudad = $_POST["ciudad"];
        }
        //municipio
        if (empty($_POST["municipio"])) {
            $municipio = "";
        } else {
            $municipio = $_POST["ciudad"];
        }
        //cp
        if (empty($_POST["cp"])) {
            $cp = "";
        } else {
            $cp = $_POST["cp"];
        }
        //pais
        if (empty($_POST["pais"])) {
            $pais = "";
        } else {
            $pais = $_POST["pais"];
        }
        //tiposangre
        if (empty($_POST["tiposangre"])) {
            $tiposangre = '';
        } else {
            $tiposangre = $_POST["tiposangre"];
        }
        //alergias
        if (empty($_POST["alergias"])) {
            $alergias = '';
        } else {
            $alergias = $_POST["alergias"];
        }
        //infoadicional
        if (empty($_POST["infoadicional"])) {
            $infoadicional = '';
        } else {
            $infoadicional = $_POST["infoadicional"];
        }
        //cedula
        if (empty($_POST["cedula"])) {
            $cedula = '';
        } else {
            $cedula = $_POST["cedula"];
        }
        //grado
        if (empty($_POST["grado"])) {
            $grado = '';
        } else {
            $grado = $_POST["grado"];
        }
        //perfil
        if (empty($_POST["perfil"])) {
            $perfil = '';
        } else {
            $perfil = $_POST["perfil"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE profesor SET "
                    . "idiprofesor = '$idiprofesor', nombre = '$nombre', idicampus = '$idicampus', apellido_paterno = '$apellido_paterno', apellido_materno = '$apellido_materno', fecha_nacimiento = $fecha_nacimiento , email = '$email', telefono = '$telefono', edad =  '$edad', genero = '$genero' ,curp = '$curp',"
                    . " rfc = '$rfc', nss = '$nss', "
                    . "movil = '$movil', "
                    . "direccion = '$direccion', "
                    . "ciudad = '$ciudad', "
                    . "municipio = '$municipio', "
                    . "cp = '$cp' "
                    . ", pais = '$pais', "
                    . "tiposangre = '$tiposangre',"
                    . " alergias =  '$alergias',"
                    . " infoadicional = '$infoadicional',"
                    . " cedula = '$cedula', grado = '$grado', perfil= '$perfil'  WHERE idiprofesor = '$idiprofesor'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getGradosByidicarrera() {
        $errorMSG = "";
        //GradosId
        if (empty($_GET["idicarrera"])) {
            $errorMSG = "idicarrera is required ";
        } else {
            $idicarrera = $_GET["idicarrera"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM cGrados WHERE idicarrera=$idicarrera";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function carrera_file_remove() {
        //post input string idinotification
        if (empty($_POST["idicarrera"])) {
            $errorMSG .= "idicarrera is required to update row ";
        } else {
            $idicarrera = $_POST["idicarrera"];
        }
        if ($errorMSG == '') {
            include './touploadfile.php';
            $sql = "UPDATE carrera SET files = null, files_name = '', files_size = null, files_type = null WHERE idicarrera = $idicarrera";
            if ($conn->query($sql) === TRUE) {
                echo 'success';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            echo $errorMSG;
        }
    }

    function deleteGrupo() {
        $errorMSG = "";
        //idiprofesor
        if (empty($_POST["GrupoId"])) {
            $errorMSG = "GrupoId is required ";
        } else {
            $GrupoId = $_POST["GrupoId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            // sql to delete a record
            $sql = "UPDATE tbGrupos SET deleted = 1 WHERE GrupoId = $GrupoId";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function suspended_Grupo() {
        $errorMSG = "";
        if (empty($_POST["GrupoId"])) {
            $errorMSG = "GrupoId is required ";
        } else {
            $GrupoId = $_POST["GrupoId"];
        }
        if (empty($_POST["suspended"])) {
            $suspended = '0';
        } else {
            $suspended = $_POST["suspended"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE tbGrupos SET suspended = '$suspended' WHERE GrupoId = '$GrupoId'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error : " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function deleteidigenerales() {
        $errorMSG = "";
        //idiprofesor
        if (empty($_POST["idigenerales"])) {
            $errorMSG = "idigenerales is required ";
        } else {
            $idigenerales = $_POST["idigenerales"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            // sql to delete a record
            $sql = "UPDATE datos_generales SET deleted = 1 WHERE idigenerales = $idigenerales";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function suspended_idigenerales() {
        $errorMSG = "";
        if (empty($_POST["idigenerales"])) {
            $errorMSG = "idigenerales is required ";
        } else {
            $idigenerales = $_POST["idigenerales"];
        }
        if (empty($_POST["suspended"])) {
            $suspended = '0';
        } else {
            $suspended = $_POST["suspended"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE datos_generales SET suspended = '$suspended' WHERE idigenerales = '$idigenerales'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error : " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function getprofesorId() {
        $errorMSG = "";
        //idiprofesor
        if (empty($_GET["idiprofesor"])) {
            $errorMSG = "idiprofesor is required ";
        } else {
            $idiprofesor = $_GET["idiprofesor"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM profesor WHERE idiprofesor=$idiprofesor";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * añade un registro a la tabla de tbMaterias
     * created by bennderodriguez
     */
    function add_tbMaterias() {
        $errorMSG = "";
        //post input string idicarrera
        if (empty($_POST["idicarrera"])) {
            $errorMSG .= "idicarrera is required ";
        } else {
            $idicarrera = $_POST["idicarrera"];
        }
        //post input string GradosId
        if (empty($_POST["GradosId"])) {
            $errorMSG .= "GradosId is required ";
        } else {
            $GradosId = $_POST["GradosId"];
        }
        //post input string Clave
        if (empty($_POST["Clave"])) {
            $errorMSG .= "Clave is required ";
        } else {
            $Clave = $_POST["Clave"];
        }
        //post input string Nombre
        if (empty($_POST["Nombre"])) {
            $errorMSG .= "Nombre is required ";
        } else {
            $Nombre = $_POST["Nombre"];
        }
        //post input string Creditos
        if (empty($_POST["Creditos"])) {
            $Creditos = 0;
        } else {
            $Creditos = $_POST["Creditos"];
        }
        //post input string Unidades
        if (empty($_POST["Unidades"])) {
            $Unidades = 0;
        } else {
            $Unidades = $_POST["Unidades"];
        }
        //post input string HorasSemana
        if (empty($_POST["HorasSemana"])) {
            $HorasSemana = 0;
        } else {
            $HorasSemana = $_POST["HorasSemana"];
        }
        //query_action
        if (empty($_POST["query_action"])) {
            $errorMSG .= 'query_action is required ';
        } else {
            $query_action = $_POST["query_action"];
        }

        // run query
        if ($errorMSG == "") {
            if ($query_action == "insert") {
                include "./conexion.php";
                $sql = "INSERT INTO tbMaterias (Clave,Nombre,Creditos,Unidades,HorasSemana,idicarrera,GradosId) VALUES ('$Clave','$Nombre','$Creditos','$Unidades','$HorasSemana','$idicarrera','$GradosId')";
                if ($conn->query($sql) === TRUE) {
                    echo "success";
                } else {
                    echo "Error: " . $conn->error;
                }
                $conn->close();
            }
            if ($query_action == "update") {
                //MateriaId
                if (empty($_POST["MateriaId"])) {
                    $errorMSG .= 'MateriaId is required ';
                } else {
                    $MateriaId = $_POST["MateriaId"];
                }
                if ($errorMSG == "") {
                    include "./conexion.php";
                    $sql = "UPDATE tbMaterias SET Clave = '$Clave',Nombre = '$Nombre',Creditos = '$Creditos',Unidades = '$Unidades',HorasSemana = '$HorasSemana' WHERE MateriaId = $MateriaId";
                    if ($conn->query($sql) === TRUE) {
                        echo "success";
                    } else {
                        echo "Error: " . $conn->error;
                    }
                    $conn->close();
                } else {
                    echo $errorMSG;
                }
            }
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function deleted_tbMaterias() {
        $errorMSG = "";
        //idiprofesor
        if (empty($_POST["MateriaId"])) {
            $errorMSG = "MateriaId is required ";
        } else {
            $MateriaId = $_POST["MateriaId"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            // sql to delete a record
            $sql = "UPDATE tbMaterias SET deleted = 1 WHERE MateriaId = $MateriaId";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function suspended_tbMaterias() {
        $errorMSG = "";
        if (empty($_POST["MateriaId"])) {
            $errorMSG = "MateriaId is required ";
        } else {
            $MateriaId = $_POST["MateriaId"];
        }
        if (empty($_POST["suspended"])) {
            $suspended = '0';
        } else {
            $suspended = $_POST["suspended"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE tbMaterias SET suspended = '$suspended' WHERE MateriaId = '$MateriaId'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error : " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function restore_password() {
        $errorMSG = "";
        if (empty($_POST["idigenerales"])) {
            $errorMSG = "idigenerales is required ";
        } else {
            $idigenerales = $_POST["idigenerales"];
        }
        if (empty($_POST["new_password"])) {
            $errorMSG = "new_password is required ";
        } else {
            $new_password = $_POST["new_password"];
        }

        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE tbuser 
            SET PASSWORD = sha2 ( '$new_password', 256 ) 
            WHERE
            idigenerales = $idigenerales;";
            if ($conn->multi_query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function restore_password_idigenerales($idigenerales, $new_password) {
        $errorMSG = "";
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE tbuser 
            SET PASSWORD = sha2 ( '$new_password', 256 ) 
            WHERE
            idigenerales = $idigenerales;";
            if ($conn->multi_query($sql) === TRUE) {
                //echo "success";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function delete_cat_doc() {
        $errorMSG = "";
        //idiprofesor
        if (empty($_POST["ididocumento"])) {
            $errorMSG = "ididocumento is required ";
        } else {
            $ididocumento = $_POST["ididocumento"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            // sql to delete a record
            $sql = "UPDATE cDocumentos SET deleted = 1 WHERE ididocumento = $ididocumento";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function suspended_cat_doc() {
        $errorMSG = "";
        if (empty($_POST["ididocumento"])) {
            $errorMSG = "ididocumento is required ";
        } else {
            $ididocumento = $_POST["ididocumento"];
        }
        if (empty($_POST["suspended"])) {
            $suspended = '0';
        } else {
            $suspended = $_POST["suspended"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE cDocumentos SET suspended = '$suspended' WHERE ididocumento = '$ididocumento'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error : " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * añade un registro a la tabla de cDocumentos
     * created by bennderodriguez
     */
    function add_cDocumentos() {
        $errorMSG = "";
        //post input string type
        if (empty($_POST["type"])) {
            $errorMSG = "type is required ";
        } else {
            $type = $_POST["type"];
        }
        //post input string description
        if (empty($_POST["description"])) {
            $errorMSG .= "description is required ";
        } else {
            $description = $_POST["description"];
        }
        //post input string comments
        if (empty($_POST["comments"])) {
            $errorMSG .= "comments is required ";
        } else {
            $comments = $_POST["comments"];
        }
        //post input string query_action
        if (empty($_POST["query_action"])) {
            $errorMSG .= "query_action is required ";
        } else {
            $query_action = $_POST["query_action"];
        }

        // run query
        if ($errorMSG == "") {
            if ($query_action == 'insert') {
                include "./conexion.php";
                $sql = "INSERT INTO cDocumentos (type,description,comments) VALUES  ('$type','$description','$comments')";
                if ($conn->query($sql) === TRUE) {
                    echo "success";
                } else {
                    echo "Error: " . $conn->error;
                }
                $conn->close();
            }
            if ($query_action == 'update') {
                if (empty($_POST["ididocumento"])) {
                    $errorMSG = "ididocumento is required ";
                } else {
                    $ididocumento = $_POST["ididocumento"];
                }
                if ($errorMSG == "") {
                    include "./conexion.php";
                    $sql = "UPDATE cDocumentos SET type = '$type',description = '$description',comments = '$comments' WHERE ididocumento = $ididocumento";
                    if ($conn->query($sql) === TRUE) {
                        echo "success";
                    } else {
                        echo "Error: " . $conn->error;
                    }
                    $conn->close();
                }
            }
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function get_cat_docs() {
        $errorMSG = "";
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT * FROM cDocumentos WHERE deleted = 0";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function get_cat_docs_id() {
        $errorMSG = "";
        //post input string type
        if (empty($_GET["ididocumento"])) {
            $errorMSG = "ididocumento is required ";
        } else {
            $ididocumento = $_GET["ididocumento"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                    cDocumentos.ididocumento,
                    cDocumentos.deleted,
                    cDocumentos.suspended,
                    cDocumentos.type,
                    cDocumentos.description,
                    cDocumentos.comments
                    FROM
                    cDocumentos WHERE cDocumentos.ididocumento = $ididocumento";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * añade un registro a la tabla de tbButtonPyament
     * created by bennderodriguez
     */
    function add_tbButtonPyament() {
        $errorMSG = "";

        //post input string idiservicio
        if (empty($_POST["idiservicio"])) {
            $errorMSG = "idiservicio is required ";
        } else {
            $idiservicio = $_POST["idiservicio"];
        }

        //post input string button
        if (empty($_POST["button"])) {
            $errorMSG .= "button is required ";
        } else {
            $button = $_POST["button"];
        }
        //post input string description
        if (empty($_POST["description"])) {
            $errorMSG .= "description is required ";
        } else {
            $description = $_POST["description"];
        }
        //post input string comments
        if (empty($_POST["comments"])) {
            $errorMSG .= "comments is required ";
        } else {
            $comments = $_POST["comments"];
        }
        //post input string query_action
        if (empty($_POST["query_action"])) {
            $errorMSG .= "query_action is required ";
        } else {
            $query_action = $_POST["query_action"];
        }

        // run query
        if ($errorMSG == "") {
            if ($query_action == 'insert') {
                include "./conexion.php";
                $sql = "INSERT INTO tbButtonPyament (idiservicio, button,description,comments) VALUES ('$idiservicio','$button','$description','$comments')";
                if ($conn->query($sql) === TRUE) {
                    echo "success";
                } else {
                    echo "Error: " . $conn->error;
                }
                $conn->close();
            }
            if ($query_action == 'update') {
                if (empty($_POST["idibutton"])) {
                    $errorMSG = "idibutton is required ";
                } else {
                    $idibutton = $_POST["idibutton"];
                }
                if ($errorMSG == "") {
                    include "./conexion.php";
                    $sql = "UPDATE tbButtonPyament SET idiservicio = '$idiservicio', button = '$button',description = '$description',comments = '$comments' WHERE idibutton = $idibutton";
                    if ($conn->query($sql) === TRUE) {
                        echo "success";
                    } else {
                        echo "Error: " . $conn->error;
                    }
                    $conn->close();
                }
            }
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function gettbButtonPyament() {
        $errorMSG = "";
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                    tbButtonPyament.idibutton,
                    tbButtonPyament.idiservicio,
                    tbButtonPyament.deleted,
                    tbButtonPyament.suspended,
                    tbButtonPyament.button,
                    tbButtonPyament.description,
                    tbButtonPyament.comments
                    FROM
                    tbButtonPyament
                    WHERE
                    tbButtonPyament.deleted = 0";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function gettbButtonPyamentId() {
        $errorMSG = "";
        //post input string type
        if (empty($_GET["idibutton"])) {
            $errorMSG = "idibutton is required ";
        } else {
            $idibutton = $_GET["idibutton"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                    tbButtonPyament.idibutton,
                    tbButtonPyament.idiservicio,
                    tbButtonPyament.deleted,
                    tbButtonPyament.suspended,
                    tbButtonPyament.button,
                    tbButtonPyament.description,
                    tbButtonPyament.comments
                    FROM
                    tbButtonPyament
                    WHERE
                    tbButtonPyament.idibutton = $idibutton";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function deletetbButtonPyament() {
        $errorMSG = "";
        //idiprofesor
        if (empty($_POST["idibutton"])) {
            $errorMSG = "idibutton is required ";
        } else {
            $idibutton = $_POST["idibutton"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            // sql to delete a record
            $sql = "UPDATE tbButtonPyament SET deleted = 1 WHERE idibutton = $idibutton";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function suspendedtbButtonPyament() {
        $errorMSG = "";
        if (empty($_POST["idibutton"])) {
            $errorMSG = "idibutton is required ";
        } else {
            $idibutton = $_POST["idibutton"];
        }
        if (empty($_POST["suspended"])) {
            $suspended = '0';
        } else {
            $suspended = $_POST["suspended"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE tbButtonPyament SET suspended = '$suspended' WHERE idibutton = '$idibutton'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error : " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * añade un registro a la tabla de tbCustomFormInputs
     * created by bennderodriguez
     */
    function add_tbCustomFormInputs() {
        $errorMSG = "";
        //post input string input_title
        if (empty($_POST["input_title"])) {
            $errorMSG = "input_title is required ";
        } else {
            $input_title = $_POST["input_title"];
        }
        //post input string idicustomform
        if (empty($_POST["idicustomform"])) {
            $errorMSG .= "idicustomform is required ";
        } else {
            $idicustomform = $_POST["idicustomform"];
        }
        //post input string input_type
        if (empty($_POST["input_type"])) {
            $errorMSG .= "input_type is required ";
        } else {
            $input_type = $_POST["input_type"];
        }
        //post input string input_name
        if (empty($_POST["input_name"])) {
            $errorMSG .= "input_name is required ";
        } else {
            $input_name = $_POST["input_name"];
        }
        //post input string input_label
        if (empty($_POST["input_label"])) {
            $errorMSG .= "input_label is required ";
        } else {
            $input_label = $_POST["input_label"];
        }
        //post input string input_col
        if (empty($_POST["input_col"])) {
            $errorMSG .= "input_col is required ";
        } else {
            $input_col = $_POST["input_col"];
        }
        //post input string input_maxlength
        if (empty($_POST["input_maxlength"])) {
            $errorMSG .= "input_maxlength is required ";
        } else {
            $input_maxlength = $_POST["input_maxlength"];
        }
        //post input string input_id
        if (empty($_POST["input_id"])) {
            $errorMSG .= "input_id is required ";
        } else {
            $input_id = $_POST["input_id"];
        }
        //post input string input_required
        if (empty($_POST["input_required"])) {
            $input_required = '0';
        } else {
            $input_required = '1';
        }
        //post input string query_action
        if (empty($_POST["query_action"])) {
            $errorMSG .= "query_action is required ";
        } else {
            $query_action = $_POST["query_action"];
        }
        // run query
        if ($errorMSG == "") {
            if ($query_action == 'insert') {
                include "./conexion.php";
                $sql = "INSERT INTO tbCustomFormInputs (idicustomform, input_title, input_type, input_name, input_label, input_col, input_maxlength, input_id, input_required) VALUES ('$idicustomform', '$input_title','$input_type','$input_name','$input_label','$input_col','$input_maxlength','$input_id','$input_required')";
                if ($conn->query($sql) === TRUE) {
                    echo "success";
                } else {
                    echo "Error: " . $conn->error;
                }
                $conn->close();
            }
            if ($query_action == 'update') {
                if (empty($_POST["idibutton"])) {
                    $errorMSG = "idibutton is required ";
                } else {
                    $idibutton = $_POST["idibutton"];
                }
                if ($errorMSG == "") {
                    //
                }
            }
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * añade un registro a la tabla de tbCustomForm
     * created by bennderodriguez
     */
    function add_tbCustomForm() {
        $errorMSG = "";
        //post input string form_title
        if (empty($_POST["form_title"])) {
            $errorMSG = "form_title is required ";
        } else {
            $form_title = $_POST["form_title"];
        }
        //post input string form_description
        if (empty($_POST["form_description"])) {
            $errorMSG .= "form_description is required ";
        } else {
            $form_description = $_POST["form_description"];
        }
        // run query
        if ($errorMSG == "") {
            include "./conexion.php";
            $sql = "INSERT INTO tbCustomForm (form_title,form_description) VALUES ('$form_title','$form_description')";
            if ($conn->query($sql) === TRUE) {
                $last_id = $conn->insert_id;
                echo $last_id;
            } else {
                echo "Error: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function gettbCustomForm() {
        $errorMSG = "";
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                    tbCustomForm.idicustomform,
                    tbCustomForm.deleted,
                    tbCustomForm.suspended,
                    tbCustomForm.form_title,
                    tbCustomForm.form_description
                    FROM
                    tbCustomForm
                    WHERE tbCustomForm.deleted = 0";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function gettbCustomFormId() {
        $errorMSG = "";
        //post input string type
        if (empty($_GET["idicustomform"])) {
            $errorMSG = "idicustomform is required ";
        } else {
            $idicustomform = $_GET["idicustomform"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                    tbCustomForm.idicustomform,
                    tbCustomForm.deleted,
                    tbCustomForm.suspended,
                    tbCustomForm.form_title,
                    tbCustomForm.form_description
                    FROM
                    tbCustomForm
                    WHERE
                    tbCustomForm.idicustomform = $idicustomform";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function gettbCustomFormInputsIdicustomform() {
        $errorMSG = "";
        //post input string type
        if (empty($_GET["idicustomform"])) {
            $errorMSG = "idicustomform is required ";
        } else {
            $idicustomform = $_GET["idicustomform"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                    tbCustomFormInputs.idicustomimput,
                    tbCustomFormInputs.idicustomform,
                    tbCustomFormInputs.deleted,
                    tbCustomFormInputs.suspended,
                    tbCustomFormInputs.input_title,
                    tbCustomFormInputs.input_type,
                    tbCustomFormInputs.input_name,
                    tbCustomFormInputs.input_label,
                    tbCustomFormInputs.input_col,
                    tbCustomFormInputs.input_maxlength,
                    tbCustomFormInputs.input_id,
                    tbCustomFormInputs.input_required 
                    FROM
                    tbCustomFormInputs 
                    WHERE
                    tbCustomFormInputs.deleted = 0 
                    AND tbCustomFormInputs.idicustomform = $idicustomform";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function tbCustomFormInputsIdicustomformActive() {
        $errorMSG = "";
        //post input string type
        if (empty($_GET["idicustomform"])) {
            $errorMSG = "idicustomform is required ";
        } else {
            $idicustomform = $_GET["idicustomform"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                    tbCustomFormInputs.idicustomimput,
                    tbCustomFormInputs.idicustomform,
                    tbCustomFormInputs.deleted,
                    tbCustomFormInputs.suspended,
                    tbCustomFormInputs.input_title,
                    tbCustomFormInputs.input_type,
                    tbCustomFormInputs.input_name,
                    tbCustomFormInputs.input_label,
                    tbCustomFormInputs.input_col,
                    tbCustomFormInputs.input_maxlength,
                    tbCustomFormInputs.input_id,
                    tbCustomFormInputs.input_required,
                    tbCustomForm.form_title,
                    tbCustomForm.form_description 
                    FROM
                    tbCustomFormInputs
                    INNER JOIN tbCustomForm ON tbCustomFormInputs.idicustomform = tbCustomForm.idicustomform 
                    WHERE
                    tbCustomFormInputs.deleted = 0 
                    AND tbCustomFormInputs.suspended = 0 
                    AND tbCustomFormInputs.idicustomform = $idicustomform";
            $result = $conn->query($sql);
            $rows = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $rows['data'][] = $row;
                }
                print json_encode($rows, JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function deletedtbCustomFormInputs() {
        $errorMSG = "";
        //idiprofesor
        if (empty($_POST["idicustomimput"])) {
            $errorMSG = "idicustomimput is required ";
        } else {
            $idicustomimput = $_POST["idicustomimput"];
        }
        // redirect to success page
        if ($errorMSG == "") {
            include './conexion.php';
            // sql to delete a record
            $sql = "UPDATE tbCustomFormInputs SET deleted = 1 WHERE idicustomimput = $idicustomimput";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function suspendedtbCustomFormInputs() {
        $errorMSG = "";
        if (empty($_POST["idicustomimput"])) {
            $errorMSG = "idicustomimput is required ";
        } else {
            $idicustomimput = $_POST["idicustomimput"];
        }
        if (empty($_POST["suspended"])) {
            $suspended = '0';
        } else {
            $suspended = $_POST["suspended"];
        }
        if ($errorMSG == "") {
            include './conexion.php';
            $sql = "UPDATE tbCustomFormInputs SET suspended = '$suspended' WHERE idicustomimput = '$idicustomimput'";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error : " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function add_custom_form() {
        $errorMSG = '';
        if (empty($_POST["idigenerales"])) {
            $errorMSG = "idigenerales is required ";
        } else {
            $idigenerales = $_POST["idigenerales"];
        }
        if (empty($_POST["idicustomform"])) {
            $errorMSG .= "idicustomform is required ";
        } else {
            $idicustomform = $_POST["idicustomform"];
        }
        if ($errorMSG == "") {
            $rows = array();
            foreach ($_POST as $key => $value) {
                $data_array['data'][] = array(
                    "$key" => "$value",
                );
            }
            $rows = $data_array;
            include './conexion.php';
            $sql = "INSERT INTO tbCustomFormContent (idigenerales, idicustomform, container) VALUES ('$idigenerales', '$idicustomform', '" . serialize($rows) . "')";
            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error: " . $conn->error;
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    function gettbCustomFormContent() {
        $errorMSG = '';
        //idigenerales
//        if (empty($_GET["idigenerales"])) {
//            $errorMSG = 'idigenerales is required';
//        } else {
//            $idigenerales = $_GET["idigenerales"];
//        }

        if ($errorMSG == "") {
            header('Content-Type: application/json');
            include './conexion.php';
            $sql = "SELECT
                    tbCustomFormContent.idcustomformcontent,
                    tbCustomFormContent.idigenerales,
                    tbCustomFormContent.idicustomform,
                    tbCustomFormContent.container
                    FROM
                    tbCustomFormContent";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $container = $row["container"];
                }
                print json_encode(unserialize($container), JSON_PRETTY_PRINT);
            } else {
                echo "0 results";
            }
            $conn->close();
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

}

$api = new Kambal();

