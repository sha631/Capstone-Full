<?php
    include_once "../includes/accessChecker.php";

    $productId = htmlspecialchars(base64_decode($_GET["productId"])) ?? null;

    if (!$productId || $productId === null) {
        displayNotification("error", "Invalid Product", "Invalid product!");
        header("Location: ../dashboard.php?page=products-list");
        exit();
    }

    $getProductData = $conn->prepare("SELECT * FROM products_table WHERE product_id = ? LIMIT 1");
    $getProductData->bind_param("i", $productId);
    $getProductData->execute();

    $productQueryResult = $getProductData->get_result();

    if ($productQueryResult->num_rows === 1) {
        $productData = $productQueryResult->fetch_object();

        $productImage = $productData->product_image ?? "default-product-image.png";
    } else {
        displayNotification("error", "Invalid Product", "Invalid product!");
        header("Location: ../dashboard.php?page=products-list");
        exit();
    }
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

                        <h5 class="mb-3"> Product Information </h5>

                        <div class="row">

                            <div class="col-md-6">

                                <form action="../process/productManagement.php" method="POST" autocomplete="off" data-toggle="validator" enctype="multipart/form-data">

                                    <input type="hidden" name="productName" value="<?php echo htmlspecialchars($productData->product_name); ?>">
                                    <input type="hidden" name="productId" value="<?php echo htmlspecialchars($productId); ?>">

                                    <div class="mb-3">

                                        <label> Product Image </label>

                                        <!-- Image Preview -->
                                        <div class="mb-3 text-center">
                                            <img id="imagePreview"
                                                src="<?php echo htmlspecialchars($productsPictureFolderPath . $productImage); ?>"
                                                alt="Product Preview"
                                                class=""
                                                style="max-height:200px;"
                                                width="200px"
                                                height="200px">
                                        </div>

                                        <!-- File Input -->
                                        <div class="custom-file mb-1">
                                            <input
                                                type="file"
                                                class="custom-file-input"
                                                id="imageInput"
                                                name="productImage"
                                                accept=".jpg, .jpeg, .png, .gif"
                                                required>

                                            <div class="input-group-prepend">
                                                <label class="custom-file-label" for="imageInput" id="fileName"> Choose File </label>
                                            </div>

                                        </div>

                                        <button class="mt-2 btn btn-success w-100" type="submit" name="updateProductPhoto">
                                            <i class="bi bi-pencil-square"></i>
                                            Update Product Photo
                                        </button>

                                    </div>

                                </form>

                            </div>

                            <div class="col-md-6">

                                <form action="../process/productManagement.php" method="POST" autocomplete="off" data-toggle="validator" enctype="multipart/form-data">

                                    <input type="hidden" name="productId" value="<?php echo htmlspecialchars($productId); ?>">

                                    <div class="row">

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
                                                        <option value="Single" <?php echo htmlspecialchars($productData->product_type === "Single" ? "selected" : ""); ?>> Single </option>
                                                        <option value="Combo" <?php echo htmlspecialchars($productData->product_type === "Combo" ? "selected" : ""); ?>> Combo </option>
                                                        <option value="Clubhouse" <?php echo htmlspecialchars($productData->product_type === "Clubhouse" ? "selected" : ""); ?>> Clubhouse </option>
                                                        <option value="Add-ons" <?php echo htmlspecialchars($productData->product_type === "Add-ons" ? "selected" : ""); ?>> Add-ons </option>
                                                    </select>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-12 mb-0">

                                            <div class="form-group">

                                                <label> Product Name <span class="text-danger">*</span> </label>

                                                <input
                                                    type="text"
                                                    name="productName"
                                                    class="form-control"
                                                    placeholder="Enter Product Name"
                                                    data-errors="Please Enter Product Name."
                                                    value="<?php echo htmlspecialchars($productData->product_name); ?>"
                                                    required />

                                                <div class="help-block with-errors"></div>

                                            </div>

                                        </div>

                                        <div class="col-md-12 mb-0">

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
                                                    value="<?php echo htmlspecialchars($productData->product_price); ?>"
                                                    required />

                                                <div class="help-block with-errors"></div>

                                            </div>

                                        </div>

                                        <button class="mt-2 btn btn-success w-100" type="submit" name="updateProductDetails">
                                            <i class="bi bi-pencil-square"></i>
                                            Update Product Details
                                        </button>

                                    </div>

                                </form>

                            </div>

                            <div class="col-md-12 mt-2">

                                <div class="card">

                                    <div class="card-header d-flex justify-content-between">

                                        <div class="header-title d-flex justify-content-between align-items center">
                                            <h4 class="card-title"> Product Inclusions </h4>
                                        </div>

                                        <a href="#" class="btn btn-success add-list" data-bs-toggle="modal" data-bs-target="#addProductItem">
                                            <i class="las la-plus mr-3"></i>
                                            Add Item
                                        </a>

                                    </div>

                                    <div class="card-body">

                                        <div class="col-lg-12">

                                            <div class="table-responsive rounded mb-3">

                                                <table class="data-tables table mb-0 tbl-server-info text-center custom-table">

                                                    <thead class="bg-white text-uppercase">

                                                        <tr class="ligth ligth-data">

                                                            <th> Item Name </th>
                                                            <th> Item Quantity </th>
                                                            <th> Action </th>

                                                        </tr>

                                                    </thead>

                                                    <tbody class="light-body text-center">

                                                        <?php
                                                        $getProductItems = $conn->prepare("SELECT 
                                                                                            pi.*,
                                                                                            it.item_name
                                                                                        FROM inventory_table it
                                                                                        LEFT JOIN product_items_table pi
                                                                                        ON it.item_id = pi.item_id
                                                                                        LEFT JOIN products_table p
                                                                                        ON pi.product_id = p.product_id
                                                                                        WHERE p.product_id = ?
                                                                                        ORDER BY pi.quantity DESC
                                                                                        ");
                                                        $getProductItems->bind_param("i", $productId);
                                                        $getProductItems->execute();

                                                        $productItemsQueryResult = $getProductItems->get_result();

                                                        while ($productItemData = $productItemsQueryResult->fetch_array()) {
                                                        ?>
                                                            <tr>

                                                                <td class="fw-bold">
                                                                    <?php echo htmlspecialchars($productItemData["item_name"]); ?>
                                                                </td>

                                                                <td>
                                                                    <?php echo htmlspecialchars($productItemData["quantity"]); ?>
                                                                </td>

                                                                <td class="export-ignore">
                                                                    <div class="d-flex align-items-center justify-content-center">

                                                                        <div>
                                                                            <button
                                                                                class="btn btn-warning btn-sm px-2 mr-2"
                                                                                data-toggle="tooltip"
                                                                                data-placement="top"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#updateItem<?php echo htmlspecialchars($productItemData["product_item_id"]); ?>"
                                                                                title=""
                                                                                data-original-title="Edit Quantity">
                                                                                <i class="bi bi-pencil square mr-0"></i>
                                                                            </button>
                                                                        </div>

                                                                        <div>
                                                                            <form action="../process/productManagement.php" method="POST" id="removeItemForm">

                                                                                <input type="hidden" name="removeItem" value="1">
                                                                                <input type="hidden" name="productName" value="<?php echo htmlspecialchars($productData->product_name); ?>">
                                                                                <input type="hidden" name="productItemId" value="<?php echo htmlspecialchars($productItemData["product_item_id"]); ?>">
                                                                                <input type="hidden" name="productId" value="<?php echo htmlspecialchars($productItemData["product_id"]); ?>">

                                                                                <button
                                                                                    type="submit"
                                                                                    class="btn btn-danger btn-sm px-2 mr-2"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="top"
                                                                                    title=""
                                                                                    data-original-title="Remove Item"
                                                                                    onclick="confirmAction(
                                                                                        event,
                                                                                        this.form,
                                                                                        'removeItemForm',
                                                                                        'Remove Item: <?php echo htmlspecialchars($productItemData['item_name']); ?>?',
                                                                                        'warning',
                                                                                        'Are you sure you want to remove this item?',
                                                                                        'Remove Item',
                                                                                        '#E08DB4'
                                                                                    )">
                                                                                    <i class="bi bi-dash-circle mr-0"></i>
                                                                                </button>
                                                                            </form>
                                                                        </div>

                                                                    </div>

                                                                </td>

                                                            </tr>

                                                            <div class="modal fade" id="updateItem<?php echo htmlspecialchars($productItemData["product_item_id"]); ?>" tabindex="-1" aria-labelledby="addMultipleInventoryModal" aria-hidden="true">

                                                                <div class="modal-dialog modal-md modal-dialog-centered">

                                                                    <div class="modal-content">

                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="updateItem<?php echo htmlspecialchars($productItemData["product_item_id"]); ?>"> Update Item: <?php echo htmlspecialchars($productItemData["item_name"]); ?> </h5>

                                                                            <button type="button" class="btn-close bg-transparent border border-0" data-bs-dismiss="modal" aria-label="Close">
                                                                                <i class="bi bi-x-lg"></i>
                                                                            </button>
                                                                        </div>

                                                                        <form action="../process/productManagement.php" id="quantityUpdateForm" method="POST" data-toggle="validator">

                                                                            <input type="hidden" name="productName" value="<?php echo htmlspecialchars($productData->product_name); ?>">
                                                                            <input type="hidden" name="productItemId" value="<?php echo htmlspecialchars($productItemData["product_item_id"]); ?>">
                                                                            <input type="hidden" name="productId" value="<?php echo htmlspecialchars($productId); ?>">
                                                                            <input type="hidden" name="itemId" value="<?php echo htmlspecialchars($productItemData["item_id"]); ?>">

                                                                            <div class="modal-body">

                                                                                <div class="row">

                                                                                    <div class="col-md-12">

                                                                                        <div class="form-group">

                                                                                            <label> Item Quantity </label>

                                                                                            <input
                                                                                                type="number"
                                                                                                name="itemQuantity"
                                                                                                class="form-control"
                                                                                                placeholder="Enter Item Quantity"
                                                                                                data-errors="Please Enter Item Quantity."
                                                                                                value="<?php echo htmlspecialchars($productItemData["quantity"]); ?>"
                                                                                                required />

                                                                                            <div class="help-block with-errors"></div>

                                                                                        </div>

                                                                                    </div>

                                                                                </div>

                                                                            </div>

                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                                                                    <i class="bi bi-x-lg"></i>
                                                                                    Cancel
                                                                                </button>

                                                                                <button type="submit" class="btn btn-primary" name="updateItemQuantity">
                                                                                    <i class="bi bi-pencil"></i>
                                                                                    Update Quantity
                                                                                </button>
                                                                            </div>

                                                                        </form>

                                                                    </div>

                                                                </div>

                                                            </div>
                                                        <?php
                                                        }
                                                        ?>

                                                    </tbody>

                                                </table>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<div class="modal fade" id="addProductItem" tabindex="-1" aria-labelledby="addMultipleInventoryModal" aria-hidden="true">

    <div class="modal-dialog modal-md modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="addProductItem">
                    Add Item For: <?php echo htmlspecialchars($productData->product_name); ?>
                </h5>

                <button type="button" class="btn-close bg-transparent border border-0" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>

            <form action="../process/productManagement.php" id="addProductItem" method="POST" data-toggle="validator">

                <input type="hidden" name="productName" value="<?php echo htmlspecialchars($productData->product_name); ?>">
                <input type="hidden" name="productId" value="<?php echo htmlspecialchars($productId); ?>">

                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-12 mb-1">

                            <label class="form-label" for="itemsList"> Select Item </label>

                            <div class="input-group mb-2">

                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="itemsList"> Items </label>
                                </div>

                                <select id="itemsList" class="custom-select" name="itemId" required>
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

                        <div class="col-md-12">

                            <div class="form-group">

                                <label> Item Quantity </label>

                                <input
                                    type="number"
                                    name="itemQuantity"
                                    class="form-control"
                                    placeholder="Enter Item Quantity"
                                    data-errors="Please Enter Item Quantity."
                                    step="1"
                                    min="1"
                                    value="1"
                                    required />

                                <div class="help-block with-errors"></div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <i class="bi bi-x-lg"></i>
                        Cancel
                    </button>

                    <button type="submit" class="btn btn-primary" name="addProductItem">
                        <i class="bi bi-pencil"></i>
                        Update Quantity
                    </button>
                </div>

            </form>

        </div>

    </div>

</div>