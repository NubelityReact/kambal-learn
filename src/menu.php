<?php
include './headers.php';
if ($categoria == 'general') {
    ?> 
    <script>
        location.href = "core_public_student_dashboard.php";
    </script>
    <?php
}
if ($edit) {
    include './menu_gerencial.php';
} else {
    include './menu_normal.php';
}
include './footer.php';
?>
<script src="asset/js/menuCharts.js"></script>