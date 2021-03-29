<script src="js/sweetalert.min.js"></script>

<script>
    <?php 
    
    if(isset($_SESSION["TITLE"]) && $_SESSION["STATUS"]!='')
    {
        ?>
    swal({
      title: "<?php echo $_SESSION['TITLE']; ?>",
      text: "<?php echo $_SESSION['TEXT']; ?>",
      icon: "<?php echo $_SESSION['ICON']; ?>",
      button: "<?php echo $_SESSION['ButtonText']; ?>",
    });
    
    <?php
        $_SESSION["STATUS"] = 'TRUE';
        
    }
    ?>
</script>