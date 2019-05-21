<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<?php 
    include 'header.php';
?>
<style type="text/css">
    .has-error{
        color: red;
    }
</style>


<body class="animsition">
    <div class="page-wrapper">
        <?php
            include 'sidebar.php';
        ?>
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <?php 
                include 'head.php';
            ?>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                  <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Remove</strong> Product
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="form-group ">
                                                <label for="cc-name" class="control-label mb-1">Im Name*</label>
                                                <div class="form_field">
                                                    <input id="im_name" name="im_name" type="text" class="form-control cc-name valid" placeholder="Im Name">
                                                    <p id="err" class="has-error"></p>
                                            </div>
                                    </div>
                                    </form>
                                    <div class="card-footer">
                                        <button id="delete" type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <?php 
        include 'footer.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#delete').on('click', function(){
                var im_name = $('#im_name').val();
                if(!im_name){
                    $('#err').html('Please enter a Im Name');
                }
            });

            $( "#delete" ).keyup(function() {
                var im_name = $('#im_name').val();
                if(im_name == ''){
                    $('#err').html('Please enter a Im Name');
                }else{
                    $('#err').hide();

                }
            });
        });
    </script>

</body>

</html>
<!-- end document-->
