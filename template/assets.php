<script src="../libs/bootstrap-3.2.0-dist/js/jquery-1.11.1.min.js"></script>
<script src="../libs/bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>
<script src="../libs/bootstrap-3.2.0-dist/js/docs.min.js"></script>

<!--Datatables-->
<script src="../libs/datatables/js/jquery.dataTables.min.js"></script>
<!--Datatables-->

<!--Notificaciones-->
<script src="../libs/notification/js/classie.js"></script>
<script src="../libs/notification/js/notificationFx.js"></script>
<script>
    mensaje_notificacion = '<?php if(isset($mensaje_notificacion)) echo $mensaje_notificacion; else echo "";?>';
    notification_type = '<?php if (isset($notification_type)) echo $notification_type; else echo "";?>';
</script>
<!--Notifications-->

<!--Biblioteca-->
<script src="../js/biblioteca.min.js"></script>
<script src="../js/encoder.min.js"></script>
<!--Biblitoeca-->