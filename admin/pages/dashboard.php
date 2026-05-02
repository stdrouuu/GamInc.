<?php
session_start();

// Check if admin is logged in, if not redirect to login
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] != true) {
    header('Location: ../login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard | GamInc.</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }
        body {
            background-color: #0a0a0a;
            color: #ffffff;
            min-height: 100vh;
        }

        /* Top Navbar */
        .admin-navbar {
            background: #111111;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #222;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .admin-navbar .logo {
            font-size: 1.3rem;
            font-weight: 700;
        }
        .admin-navbar .logo span {
            color: #00e6e0;
        }
        .admin-navbar .admin-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .admin-navbar .admin-info span {
            color: #aaa;
        }
        .btn-logout {
            background: transparent;
            border: 1px solid #ff4d4d;
            color: #ff4d4d;
            padding: 6px 15px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.85rem;
            transition: all 0.3s ease;
        }
        .btn-logout:hover {
            background: #ff4d4d;
            color: #fff;
        }

        /* Main Content */
        .admin-content {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }
        .page-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #00e6e0;
            margin-bottom: 20px;
        }

        /* Add Product Button */
        .btn-add {
            background: #00e6e0;
            color: #000;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }
        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 230, 224, 0.4);
        }

        /* Product Table */
        .product-table {
            width: 100%;
            border-collapse: collapse;
            background: #141414;
            border-radius: 10px;
            overflow: hidden;
        }
        .product-table th {
            background: #1a1a1a;
            padding: 12px 15px;
            text-align: left;
            color: #00e6e0;
            font-weight: 600;
            font-size: 0.9rem;
        }
        .product-table td {
            padding: 12px 15px;
            border-top: 1px solid #222;
            font-size: 0.9rem;
            color: #ddd;
            vertical-align: middle;
        }
        .product-table tr:hover {
            background: #1a1a1a;
        }
        .product-table img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 6px;
        }
        .label-badge {
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 700;
            color: #fff;
        }
        .label-PLAYSTATION { background: #0066ff; }
        .label-SWITCH2 { background: #ff0000; }
        .label-OTHER { background: #a200ff; }

        .btn-edit {
            background: #fbbf24;
            color: #000;
            border: none;
            padding: 5px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.8rem;
            font-weight: 600;
            margin-right: 5px;
            transition: all 0.2s ease;
        }
        .btn-edit:hover { transform: scale(1.05); }

        .btn-delete {
            background: #dc2626;
            color: #fff;
            border: none;
            padding: 5px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.8rem;
            font-weight: 600;
            transition: all 0.2s ease;
        }
        .btn-delete:hover { transform: scale(1.05); }

        /* Modal Styles */
        .modal-content {
            background: #1a1a1a;
            color: #fff;
            border: 1px solid #333;
        }
        .modal-header {
            border-bottom: 1px solid #333;
        }
        .modal-header .btn-close {
            filter: invert(1);
        }
        .modal-footer {
            border-top: 1px solid #333;
        }
        .modal-body label {
            color: #aaa;
            font-size: 0.9rem;
            margin-bottom: 5px;
        }
        .modal-body input,
        .modal-body select,
        .modal-body textarea {
            background: #222;
            border: 1px solid #333;
            color: #fff;
            border-radius: 6px;
            padding: 10px;
            width: 100%;
            margin-bottom: 12px;
        }
        .modal-body input:focus,
        .modal-body select:focus,
        .modal-body textarea:focus {
            outline: 1px solid #00e6e0;
            box-shadow: 0 0 5px rgba(0, 230, 224, 0.3);
        }
        .modal-body textarea {
            resize: vertical;
            min-height: 80px;
        }
        .btn-save {
            background: #00e6e0;
            color: #000;
            border: none;
            padding: 8px 20px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
        }
        .btn-save:hover {
            box-shadow: 0 5px 15px rgba(0, 230, 224, 0.4);
        }
        .btn-cancel {
            background: #333;
            color: #fff;
            border: none;
            padding: 8px 20px;
            border-radius: 6px;
            cursor: pointer;
        }

        .preview-img {
            max-width: 120px;
            max-height: 120px;
            object-fit: cover;
            border-radius: 8px;
            margin-top: 8px;
        }

        /* back to website link */
        .back-to-site {
            color: #aaa;
            text-decoration: none;
            font-size: 0.85rem;
        }
        .back-to-site:hover {
            color: #00e6e0;
        }

        @media (max-width: 768px) {
            .admin-content { padding: 0 10px; }
            .product-table th, .product-table td { padding: 8px 10px; font-size: 0.8rem; }
            .product-table img { width: 35px; height: 35px; }
        }
    </style>
</head>
<body>

    <!-- Admin Navbar -->
    <div class="admin-navbar">
        <div class="logo">
            <i class="fa-solid fa-puzzle-piece"></i>
            Gam<span>Inc.</span> Admin
        </div>
        <div class="admin-info">
            <a href="../../index.php?page=main" class="back-to-site">
                <i class="fas fa-external-link-alt"></i> View Website
            </a>
            <span>Hello, <?php echo $_SESSION['admin_username']; ?></span>
            <button class="btn-logout" id="logoutBtn">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </div>
    </div>

    <!-- Main Content -->
    <div class="admin-content">
        <h1 class="page-title">Manage Products</h1>

        <button class="btn-add" id="btnAddProduct">
            <i class="fas fa-plus"></i> Add New Product
        </button>

        <table class="product-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Label</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="productTableBody">
                <!-- Products loaded here via AJAX -->
            </tbody>
        </table>
    </div>

    <!-- Add/Edit Product Modal -->
    <div class="modal fade" id="productModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="productId" />

                    <label>Product Name</label>
                    <input type="text" id="productName" placeholder="Enter product name" />

                    <label>Price (Rp)</label>
                    <input type="number" id="productPrice" placeholder="Enter price" />

                    <label>Label</label>
                    <select id="productLabel">
                        <option value="PLAYSTATION">PLAYSTATION</option>
                        <option value="SWITCH 2">SWITCH 2</option>
                        <option value="OTHER">OTHER</option>
                    </select>

                    <label>Description</label>
                    <textarea id="productDescription" placeholder="Enter product description"></textarea>

                    <label>Product Image</label>
                    <input type="file" id="productImage" accept="image/*" />
                    <img id="imagePreview" class="preview-img" style="display:none;" />
                </div>
                <div class="modal-footer">
                    <button class="btn-cancel" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn-save" id="btnSaveProduct">Save Product</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this product?</p>
                    <input type="hidden" id="deleteProductId" />
                </div>
                <div class="modal-footer">
                    <button class="btn-cancel" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn-delete" id="btnConfirmDelete">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Load all products on page load
        $(document).ready(function() {
            loadProducts();
        });

        // Load products into table
        function loadProducts() {
            $.ajax({
                url: '../api/admin_products.php?action=getAll',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    data.forEach(function(product) {
                        // Format label class name
                        var labelClass = 'label-' + product.label.replace(' ', '');

                        html += '<tr>';
                        html += '<td>' + product.id + '</td>';
                        html += '<td><img src="../../' + product.image + '" alt="' + product.name + '"></td>';
                        html += '<td>' + product.name + '</td>';
                        html += '<td>Rp ' + parseInt(product.price).toLocaleString('id-ID') + '</td>';
                        html += '<td><span class="label-badge ' + labelClass + '">' + product.label + '</span></td>';
                        html += '<td>';
                        html += '<button class="btn-edit" onclick="editProduct(' + product.id + ')"><i class="fas fa-edit"></i> Edit</button>';
                        html += '<button class="btn-delete" onclick="showDeleteModal(' + product.id + ')"><i class="fas fa-trash"></i> Delete</button>';
                        html += '</td>';
                        html += '</tr>';
                    });
                    $('#productTableBody').html(html);
                }
            });
        }

        // Open Add Product Modal
        $('#btnAddProduct').click(function() {
            $('#modalTitle').text('Add Product');
            $('#productId').val('');
            $('#productName').val('');
            $('#productPrice').val('');
            $('#productLabel').val('PLAYSTATION');
            $('#productDescription').val('');
            $('#productImage').val('');
            $('#imagePreview').hide();
            var modal = new bootstrap.Modal(document.getElementById('productModal'));
            modal.show();
        });

        // Image preview
        $('#productImage').change(function() {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').attr('src', e.target.result).show();
                };
                reader.readAsDataURL(file);
            }
        });

        // Save Product (Add or Update)
        $('#btnSaveProduct').click(function() {
            var id = $('#productId').val();
            var formData = new FormData();

            formData.append('name', $('#productName').val());
            formData.append('price', $('#productPrice').val());
            formData.append('label', $('#productLabel').val());
            formData.append('description', $('#productDescription').val());

            // Add image if selected
            var imageFile = $('#productImage')[0].files[0];
            if (imageFile) {
                formData.append('image', imageFile);
            }

            // Decide if add or update
            if (id) {
                formData.append('action', 'updateProduct');
                formData.append('id', id);
            } else {
                formData.append('action', 'addProduct');
            }

            $.ajax({
                url: '../api/admin_products.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        bootstrap.Modal.getInstance(document.getElementById('productModal')).hide();
                        loadProducts();
                        alert(response.message);
                    } else {
                        alert(response.message);
                    }
                }
            });
        });

        // Edit product - load data into modal
        function editProduct(id) {
            $.ajax({
                url: '../../api/products.php?action=getOne&id=' + id,
                type: 'GET',
                dataType: 'json',
                success: function(product) {
                    $('#modalTitle').text('Edit Product');
                    $('#productId').val(product.id);
                    $('#productName').val(product.name);
                    $('#productPrice').val(product.price);
                    $('#productLabel').val(product.label);
                    $('#productDescription').val(product.description);
                    $('#productImage').val('');

                    if (product.image) {
                        $('#imagePreview').attr('src', '../../' + product.image).show();
                    } else {
                        $('#imagePreview').hide();
                    }

                    var modal = new bootstrap.Modal(document.getElementById('productModal'));
                    modal.show();
                }
            });
        }

        // Show delete confirmation modal
        function showDeleteModal(id) {
            $('#deleteProductId').val(id);
            var modal = new bootstrap.Modal(document.getElementById('deleteModal'));
            modal.show();
        }

        // Confirm delete
        $('#btnConfirmDelete').click(function() {
            var id = $('#deleteProductId').val();

            $.ajax({
                url: '../api/admin_products.php',
                type: 'POST',
                data: { action: 'deleteProduct', id: id },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        bootstrap.Modal.getInstance(document.getElementById('deleteModal')).hide();
                        loadProducts();
                        alert(response.message);
                    }
                }
            });
        });

        // Logout
        $('#logoutBtn').click(function() {
            $.ajax({
                url: '../api/admin_auth.php',
                type: 'POST',
                data: { action: 'logout' },
                dataType: 'json',
                success: function() {
                    window.location.href = '../login.php';
                }
            });
        });
    </script>

</body>
</html>