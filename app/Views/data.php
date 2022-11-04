<html>
    <head>        
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js"></script>
        
    </head>
    <body>
        <div class="container">
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
                <table class="table table-bordered display" id="tableID">
                <thead>
                    <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Products</th>
                    </tr>
                </thead>
                <tbody>
                   <?php foreach($data as $user){ ?>
                        <tr>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['phone'] ?></td>
                        <td><button type="button" class="btn btn-primary myModal" data-toggle="modal" value="<?= $user['username'] ?>">View</button></td>
                        </tr>
                    <?php } ?> 
                </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-body">
                <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Type</th>
                    <th scope="col">Discount</th>
                    </tr>
                </thead>
                <tbody class="data">
                   
                </tbody>
                </table>
                </div>
                </div>
            </div>
        </div>
    </body>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#tableID').DataTable({
                searching: true
            });
        });
    </script>
    <script>
        var url= '<?= base_url() ?>';
        $('.myModal').on('click', function () {
            $('.data').html('');
            const formData =  new FormData();
            formData.append('username',$(this).val())
            axios.post(`${url}/modal`,formData).then((res)=>{
                if(res.data)
                $('.data').append(res.data);
            });
            $('#exampleModal').modal('show')    
        })
    </script>
</html>