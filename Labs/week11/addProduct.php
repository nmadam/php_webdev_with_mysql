<?php
    require_once('Product.php');
    require_once('Tools.php');
    require_once('Electronics.php');
    require_once('connectvars.php');
    require_once('header.php');
    
    $output_form = true;
    
    if ($output_form = true) {
    ?>
    <!--Display selection form-->
    <div class = "container">
        <p class="text-info">Choose Which Type of Product</p>
    </div>

    <div class = "container">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="type">Choose Type of Product</label>
                    <div class="row">
                        <div class="col-md-5">
                            <select class="form-control" value= "type" name="type">
                            <option value="Generic">Generic Product</option>
                            <option value="Tools">Tools</option>
                            <option value="Electronics">Electronics</option>
                            </select><br />
                        </div>
                    </div>
            </div>
            <input type="submit" value="Type of Product" name="submit" />
        </form>
    </div>
    <?php
    }
   
    //Connect to the database
   // $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if (isset($_POST['submit'])) {
        $product = $_POST['type'];
        $output_form = false;
            
        if ($product == "Generic") {
            //$generic_input_form = true;
            addGenericProduct();
        }
        else if ($product == "Tools") {
            addTool();
        }
        else if ($product == "Electronics") {
            addElectronic();
        }
    }
    
    function addGenericProduct() {
        echo("**Inside addGenericProduct");
        $output_form = false;
        $generic_input_form = true;
        
        if (isset($_POST['submitgeneric'])) {
            echo("in in submitgeneric");
            $title = $_POST['title'];
        	$description = $_POST['description'];
        	$price = $_POST['price'];
       
            $genericProduct = new Product();
            $genericProduct->setTitle($title);
            $genericProduct->setDescription($description);
            $genericProduct->setPrice($price);
            $genericProduct->insertProduct();
        }
    }


if (isset($_POST['submit'])) {
    if ($generic_input_form = true) {
        $output_form = false;
        ?>
    <!--Display Generic Product Input Form-->
    <div class = "container">
        <p class="text-info">Please enter Product Information</p>
    </div>

    <div class = "container">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label for="title">Product Title:</label>
                <div class="row">
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="title">
                    </div>
                </div>
        </div>
        <div class="form-group">
            <label for="description">Product Description:</label>
                <div class="row">
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="description">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="price">Product Price:</label>
                <div class="row">
                    <div class="col-md-5">
                        <input type="price" class="form-control" name="price">
                    </div>
                </div>
        </div>
        <input type="submit" value="Generic Product" name="submitgeneric" />
        </form>
    </div>
    <?php
    }
}