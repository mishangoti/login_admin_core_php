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
                                        <strong>Update</strong> Product
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" id="insert_form">
                                            <div class="form-group  ">
                                                <label for="cc-name" class="control-label mb-1">Name*</label>
                                                <div class="form_field">
                                                    <input name="name" type="text" class="form-control cc-name valid" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="form-group  ">
                                                <label for="cc-name" class="control-label mb-1">Type*</label>
                                                
                                                <div class="form_field">
                                                    <input name="type" type="text" class="form-control cc-name valid" placeholder="Type">
                                                </div>
                                            </div>
                                            <div class="form-group  ">
                                                <label for="cc-name" class="control-label mb-1">Sku*</label>
                                                <div class="form_field">
                                                    <input name="sku" type="text" class="form-control cc-name" placeholder="Sku">
                                                </div>
                                            </div>
                                            <div class="form-group  ">
                                                <label for="cc-name" class="control-label mb-1">Parent Sku*</label>
                                                <div class="form_field">
                                                    <input name="parent" type="text" class="form-control cc-name valid" placeholder="Parent">
                                                </div>
                                            </div>
                                            <div class="form-group  ">
                                                <label for="cc-name" class="control-label mb-1">Sale Price*</label>
                                                <div class="form_field">
                                                    <input name="sale_price" type="text" class="form-control cc-name valid" 
                                                placeholder="Sale Price">
                                                </div>
                                            </div>
                                            <div class="form-group  ">
                                                <label for="cc-name" class="control-label mb-1">Regular Price*</label>
                                                <div class="form_field">
                                                    <input name="regular_price" type="text" class="form-control cc-name valid" placeholder="Regular Price">
                                                </div>
                                            </div>
                                            <div class="form-group  ">
                                                <label for="cc-name" class="control-label mb-1">Stock Status*</label>
                                                <div class="form_field">
                                                    <input name="stock_status" type="text" class="form-control cc-name valid" placeholder="Stock Status">
                                                </div>
                                            </div>
                                            <div class="form-group  ">
                                                <label for="cc-name" class="control-label mb-1">Im Name*</label>
                                                <div class="form_field">
                                                    <input name="im_name" type="text" class="form-control cc-name valid" placeholder="Im Name">
                                            </div>
                                            <div class="form-group  ">
                                                <label for="cc-name" class="control-label mb-1">Im Url*</label>
                                                <div class="form_field">
                                                    <input name="im_url" type="text" class="form-control cc-name valid" placeholder="Im Url">
                                                </div>
                                            </div>
                                            <div class="form-group  ">
                                                <label for="cc-name" class="control-label mb-1">Product Url*</label>
                                                <div class="form_field">
                                                    <input name="product_url" type="text" class="form-control cc-name valid" placeholder="Product Url">
                                                </div>
                                            </div>
                                            <div class="form-group  ">
                                                <label for="cc-name" class="control-label mb-1">Categories*</label>
                                                <div class="form_field">
                                                    <input name="categories" type="text" class="form-control cc-name valid" placeholder="Categories">
                                                </div>
                                            </div>
                                            <div class="form-group  ">
                                                <label for="cc-name" class="control-label mb-1">Dimentions*</label>
                                                <div class="form_field"> 
                                                    <input name="dimentions" type="text" class="form-control cc-name valid" placeholder="Dimentions">
                                                </div>
                                            </div>
                                            <div class="form-group  ">
                                                <label for="cc-name" class="control-label mb-1">Description*</label>
                                                <div class="form_field">
                                                    <textarea name="description" class="form-control cc-name valid" placeholder="Description"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group  ">
                                                <label for="cc-name" class="control-label mb-1">P Id*</label>
                                                <div class="form_field"> 
                                                    <input name="p_id" type="text" class="form-control cc-name valid" placeholder="P Id">
                                                </div>
                                            </div>
                                             <div class="card-footer">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-dot-circle-o"></i> Submit
                                                </button>
                                                <button type="reset" class="btn btn-danger btn-sm" id="reset">
                                                    <i class="fa fa-ban"></i> Reset
                                                </button>
                                            </div>
                                        </form>
                                    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>      
    <script type="text/javascript">
        $(document).ready(function() {
            $( "#insert_form" ).validate( {
                rules: {
                    name: {
                        required: true
                    },
                    type: {
                        required: true
                    },
                    sku: {
                        required: true
                    },
                    parent: {
                        required: true
                    },
                    sale_price: {
                        required: true,
                        digits: true
                    },
                    regular_price: {
                        required: true,
                        digits: true
                    },
                    stock_status:{
                        required: true
                    },
                    im_name:{
                        required: true
                    },
                    im_url:{
                        required: true,
                        url: true
                    },
                    product_url:{
                        required: true
                    },
                    categories:{
                        required: true
                    },
                    dimentions:{
                        required: true
                    },
                    description:{
                        required: true
                    },
                    p_id:{
                        required: true
                    },
                },
                messages: {
                    username: {
                        required: "Please enter a Username",
                    },
                    type: {
                        required: "Please enter a Type",
                    },
                    sku: {
                        required: "Please enter a Sku",
                    },
                    parent: {
                        required: "Please enter a Parent",
                    },
                    sale_price: {
                        required: "Please enter a Sale Price",
                        digits: "Please enter numeric valuse only"
                    },
                    regular_price: {
                        required: "Please enter a Regular Price",
                    },
                    stock_status: {
                        required: "Please enter a Stock Status",
                    },   
                    im_name: {
                        required: "Please enter a Im Name",
                    },
                    im_url: {
                        required: "Please enter a Im Url",
                    },
                    product_url: {
                        required: "Please enter a Product Url",
                    },
                    categories: {
                        required: "Please enter a Categories",
                    },
                    dimentions: {
                        required: "Please enter a Dimensions",
                    },
                    description: {
                        required: "Please enter a Description",
                    },
                    p_id: {
                        required: "Please enter a P Id",
                    }
                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".form_field" ).addClass( "has-error" ).removeClass( " " );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".form_field" ).addClass( " " ).removeClass( "has-error" );
                }
            });
        });
    </script>
</body>

</html>
<!-- end document-->
