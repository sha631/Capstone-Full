<?php
    include_once "../includes/accessChecker.php";
?>

<div class="content-page">

    <div class="container-fluid">

        <div class="row">

            <div class="col-sm-12">

                <div class="card">

                    <div class="card-header d-flex justify-content-between">

                        <div class="header-title d-flex justify-content-between align-items center">
                            <h4 class="card-title"> <?php echo htmlspecialchars($pageTitles[$pageName]); ?> </h4>
                        </div>

                    </div>

                    <div class="card-body">

                        <form action="../process/productManagement.php" method="POST" autocomplete="off" data-toggle="validator" enctype="multipart/form-data">

                            <h5 class="mb-3"> Product Information </h5>

                            <div class="row">

                                <div class="col-md-12">

                                    <div class="mb-3">

                                        <label class="form-label"> Product Image </label>

                                        <!-- Image Preview -->
                                        <div class="mb-3 text-center">
                                            <img id="imagePreview"
                                                src="<?php echo htmlspecialchars($productsPictureFolderPath . "default-product-image.png"); ?>"
                                                alt="Product Preview"
                                                class="img-thumbnail"
                                                style="max-height:200px;"
                                                width="200px"
                                                height="200">
                                        </div>

                                        <!-- File Input -->
                                        <div class="custom-file">
                                            <input
                                                type="file"
                                                class="custom-file-input"
                                                id="imageInput"
                                                name="productImage"
                                                accept=".jpg, .jpeg, .png, .gif">

                                            <div class="input-group-prepend">
                                                <label class="custom-file-label" for="imageInput" id="fileName"> Choose File </label>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-12">

                                    <div class="mb-3">

                                        <label class="form-label" for="productType">
                                            Product Type <span class="text-danger">*</span>
                                        </label>

                                        <div class="input-group mb-2">

                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="itemsList"> Type </label>
                                            </div>

                                            <select id="productType" class="custom-select" name="productType" required>
                                                <option value="" selected disabled> Select Product Type </option>
                                                <option value="Single"> Single </option>
                                                <option value="Combo"> Combo </option>
                                                <option value="Clubhouse"> Clubhouse </option>
                                                <option value="Add-ons"> Add-ons </option>
                                            </select>

                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label> Product Name <span class="text-danger">*</span> </label>

                                        <input
                                            type="text"
                                            name="productName"
                                            class="form-control"
                                            placeholder="Enter Product Name"
                                            data-errors="Please Enter Product Name."
                                            required />

                                        <div class="help-block with-errors"></div>

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label> Product Price <span class="text-danger">*</span> </label>

                                        <input
                                            type="number"
                                            min="1"
                                            step="1"
                                            name="productPrice"
                                            class="form-control"
                                            placeholder="Enter Product Price"
                                            data-errors="Please Enter Product Price."
                                            required />

                                        <div class="help-block with-errors"></div>

                                    </div>

                                </div>

                                <div class="col-md-12 mb-2">

                                    <h5 class="mb-3"> Items in Product </h5>

                                    <div class="row g-3" id="items-container">

                                        <div class="col-md-4 item-row">

                                            <div class="card p-2 shadow-sm d-flex flex-column">

                                                <div class="mb-0">

                                                    <label class="form-label" for="itemsList"> Select Item </label>

                                                    <div class="input-group mb-2">

                                                        <div class="input-group-prepend">
                                                            <label class="input-group-text" for="itemsList"> Items </label>
                                                        </div>

                                                        <select id="itemsList" class="custom-select" name="itemId[]" required>
                                                            <?php
                                                            $items = $conn->prepare("SELECT item_id, item_name FROM inventory_table ORDER BY item_name");
                                                            $items->execute();

                                                            $itemsQueryResult = $items->get_result();

                                                            while ($itemData = $itemsQueryResult->fetch_array()) {
                                                            ?>
                                                                <option value="<?php echo $itemData["item_id"]; ?>">
                                                                    <?php echo $itemData["item_name"]; ?>
                                                                </option>";
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>

                                                    </div>

                                                </div>

                                                <div class="d-flex align-items-center justify-content-between">

                                                    <div class="flex-grow-1 me-2">

                                                        <label class="form-label" for="itemQuantity"> Quantity </label>

                                                        <input type="number" id="itemQuantity" name="itemQuantity[]" value="1" min="1" class="form-control" required>
                                                    </div>

                                                    <button type="button" class="btn text-danger align-self-end remove-item mt-4" title="Remove Item">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <button type="button" class="btn btn-primary mb-3" id="add-item">
                                        <i class="bi bi-plus-lg"></i>
                                        Add Another Item
                                    </button>

                                </div>

                            </div>

                            <button type="submit" class="btn btn-success mr-2" name="addNewProduct">
                                <i class="bi bi-plus-lg"></i>
                                Add Product
                            </button>

                            <button type="reset" class="btn btn-danger">
                                <i class="bi bi-x-lg"></i>
                                Clear
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script>
    // Add/Remove items dynamically
    document.getElementById('add-item').addEventListener('click', function() {
        let container = document.getElementById('items-container');
        let row = document.querySelector('.item-row').cloneNode(true);

        // Reset values
        row.querySelector('select').selectedIndex = 0;
        row.querySelector('input').value = 1;

        container.appendChild(row);
    });

    document.getElementById('items-container').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-item')) {
            if (document.querySelectorAll('.item-row').length > 1) {
                e.target.closest('.item-row').remove();
            }
        }
    });
</script>