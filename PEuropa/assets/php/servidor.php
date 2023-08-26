<?php
require_once("BBDD_CTRLR.php");
//Comprobación

if (isset($_REQUEST['peticion'])) {
    switch ($_REQUEST['peticion']) {
        case 'cargar_cat':
            $cat_id = $_REQUEST['cat_id'];
            $sql = "SELECT * FROM categorias WHERE cat_id = $cat_id";
            $datos['sql'] = $sql;
            $datos['respuesta'] = BBDD_CTRLR::Consultas($sql);
            echo json_encode($datos);
            break;
        case 'preguntas':
            $cat_id = $_REQUEST['cat_id'];
            $sql = "SELECT c.*, rand() as aleatorio FROM preguntas as c WHERE pr_cat_id = $cat_id ORDER BY aleatorio";
            $datos['sql'] = $sql;
            $datos['respuesta'] = BBDD_CTRLR::Consultas($sql);
            echo json_encode($datos);
            break;
        case 'todas_las_preguntas':
            $sql = "SELECT * FROM preguntas";
            $datos['sql'] = $sql;
            $datos['respuesta'] = BBDD_CTRLR::Consultas($sql);
            echo json_encode($datos);
            break;
        case 'contador_pr':
            $sql = "SELECT * FROM preguntas";
            $datos['sql'] = $sql;
            $datos['respuesta'] = BBDD_CTRLR::Consultas($sql);
            echo json_encode($datos);
            break;
        case 'password':
            $sql = "SELECT * FROM admin_pass";
            $datos['sql'] = $sql;
            $datos['respuesta'] = BBDD_CTRLR::Consultas($sql);
            echo json_encode($datos);
            break;
        case 'grabar_pregunta':
            $nuevapr = $_REQUEST['nuevapr'];
            $nuevar1 = $_REQUEST['nuevar1'];
            $nuevar2 = $_REQUEST['nuevar2'];
            $nuevar3 = $_REQUEST['nuevar3'];
            $nuevar4 = $_REQUEST['nuevar4'];
            $rcorrecta = $_REQUEST['rcorrecta'];
            $prcat_id = $_REQUEST['prcat_id'];
            $sql = "INSERT INTO preguntas (`pr_id`, `pr_pregunta`, `pr_r1`, `pr_r2`, `pr_r3`, `pr_r4`, `pr_valida`, `pr_cat_id`) 
            VALUES (null,'$nuevapr','$nuevar1','$nuevar2','$nuevar3','$nuevar4','$rcorrecta','$prcat_id')";
            $datos['sql'] = $sql;
            $datos['respuesta'] = BBDD_CTRLR::CRUD($sql, 'id');
            echo json_encode($datos);
            break;
        case 'contar_pr':
            $sql = "SELECT c.*, count(p.pr_cat_id) as contador FROM categorias c, preguntas p WHERE c.cat_id = p.pr_cat_id GROUP by pr_cat_id order by cat_id";
            $datos['sql'] = $sql;
            $datos['respuesta'] = BBDD_CTRLR::Consultas($sql);
            echo json_encode($datos);
            break;
        case "eliminar_pregunta":
            $select = $_REQUEST['select'];
            $sql = "DELETE FROM preguntas WHERE pr_id = $select";
            $datos['sql'] = $sql;
            $datos['respuesta'] = BBDD_CTRLR::CRUD($sql,'id');
            echo json_encode($datos);
            break;
            
        case "modificar_pregunta":
            $nuevapr = $_REQUEST['nuevapr'];
            $nuevar1 = $_REQUEST['nuevar1'];
            $nuevar2 = $_REQUEST['nuevar2'];
            $nuevar3 = $_REQUEST['nuevar3'];
            $nuevar4 = $_REQUEST['nuevar4'];
            $rcorrecta = $_REQUEST['rcorrecta'];
            $prcat_id = $_REQUEST['prcat_id'];
            $pr_id = $_REQUEST['pr_id'];
            $sql = "UPDATE preguntas SET pr_pregunta = '$nuevapr' ,pr_r1= '$nuevar1',pr_r2= '$nuevar2',
            pr_r3= '$nuevar3',pr_r4= '$nuevar4',pr_valida=$rcorrecta,pr_cat_id=$prcat_id WHERE pr_id = $pr_id ";
            $datos['sql'] = $sql;
            $datos['respuesta'] = BBDD_CTRLR::CRUD($sql, 'id');
            echo json_encode($datos);
            break;
     }
    
}