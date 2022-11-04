<html>
    <head>
        <link rel="stylesheet" href=<?= base_url('assets/bootstrap.min.css') ?>>
        <script src=<?= base_url('assets/jquery.js') ?> ></script>
          
    </head>
    <body>
        <div class="container" style="background-color: whitesmoke;">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= base_url('/') ?>"><h5>Add Form</h5></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/data') ?>"><h5>View Form</h5></a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="row" style="margin-top:25px">
                <form method="POST" action="<?= base_url('/addProduct') ?>">
                <div class="col-md-12">
                    <h5>User Details</h5>
                <hr/>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter name" required>  
                        </div>
                        <div class="col-md-4">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                        </div>
                        <div class="col-md-4">
                            <label>Phone number</label>
                            <input type="text" class="form-control" name="phone" placeholder="Enter phone number" required>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Enter username" required> 
                        </div>
                        <div class="col-md-4">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                        </div>
                                    
                    </div>
                </div><br/>
                <div class="row">
                    <div class="col-md-10"><h5>Product Details</h5></div><div class="col-md-2" align='right'><button type="button" class="btn btn-primary" id="rowAdder">Add</button></div>
                </div>
                <hr/>                
                <div id="product_box">
                    <div id="product_form">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Product Name</label>
                                <input type="text" class="form-control" name="p_name[]" placeholder="Product name" required>  
                            </div>
                            <div class="col-md-2">
                                <label>Price</label>
                                <input type="text" class="form-control price" onChange="calculator(this)" name="price[]" placeholder="Enter price" required>
                            </div>
                            <div class="col-md-2">
                                <label>Quantity</label>
                                <input type="text" class="form-control qty" onChange="calculator(this)" name="qty[]" placeholder="Enter quantity" required>
                            </div>
                            <div class="col-md-3">
                                <label>Product Type</label>
                                <select class="form-control type" onChange="showTextbox(this)" name="type[]" required>
                                    <option value="">Choose</option>
                                    <option value="flat">flat</option>
                                    <option value="discount">discount</option>
                                </select>
                            </div> 
                            <div class="col-md-2 discount d-none">
                                <label>Discount</label>
                                <input type="text" name="discount[]" onChange="calculator(this)" class="form-control disc" placeholder="Enter Amount">
                            </div>
                        </div><br/>
                    </div>
                </div><br/>
                <?php
                if(session()->getFlashdata('success'))
                echo '<h5>'.session()->getFlashdata('success').'</h5>';
                if(session()->getFlashdata('error'))
                echo '<h5>'.session()->getFlashdata('error').'</h5>';
                ?>
                <div class="row">
                <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                <p>Total Amount : <input type="text" class="form-control" id="f_total" name="f_total" disabled></p>
                </div>
                </div>
            </form>
            </div>
        </div>
    </body>
    <script src="<?= base_url('assets/calculator.js') ?>"></script>
</html>