</div>
<!-- // END Header Layout -->

<?php require('_nav.php'); ?>
<?php require('_drawer.php'); ?>
<?php require('_modal.php'); ?>

<!-- jQuery -->
<script src="/assets/vendor/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="/assets/vendor/popper.min.js"></script>
<script src="/assets/vendor/bootstrap.min.js"></script>

<!-- Perfect Scrollbar -->
<script src="/assets/vendor/perfect-scrollbar.min.js"></script>

<!-- DOM Factory -->
<script src="/assets/vendor/dom-factory.js"></script>

<!-- MDK -->
<script src="/assets/vendor/material-design-kit.js"></script>

<!-- Fix Footer -->
<script src="/assets/vendor/fix-footer.js"></script>

<!-- Chart.js -->
<script src="/assets/vendor/Chart.min.js"></script>

<!-- App JS -->
<script src="/assets/js/app.js"></script>

<!-- Highlight.js -->
<script src="/assets/js/hljs.js"></script>

<!-- App Settings (safe to remove) -->
<script src="/assets/js/app-settings.js"></script>

 <!-- AlertifyJS -->
 <!-- <script src="/libraries/AlertifyJS/build/alertify.min.js"></script> -->
 <script src="<?= DIRECTORY_SEPARATOR .'libraries' . DIRECTORY_SEPARATOR . 'AlertifyJS' . DIRECTORY_SEPARATOR .  'build' . DIRECTORY_SEPARATOR . 'alertify.min.js'?>"></script>

 <!-- TinyMCE -->
 <script src="https://cdn.tiny.cloud/1/i17ihccb1zwjcogwuoh0gzdkdy6my09sewr9yzhj7jre0wt4/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
 <script src="/assets/js/tinymce-init.js"></script>

<?php
    if(isset($_SESSION['alertify'])){
        echo $_SESSION['alertify'];
        unset($_SESSION['alertify']);
    }
?>

<script>
    $('body').bind('copy',function(e) {
        e.preventDefault(); return false; 
    });
</script>



</body>


<!-- Mirrored from tutorio-bootstrap.frontendmatter.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Dec 2019 17:02:34 GMT -->

</html>