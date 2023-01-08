<!doctype html>
<html lang="en">

<head>
    <title>Using php CRUD-OOP and PDO with Mysql</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v6.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- Font Awesome CSS v5.2.1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@latest/css/all.min.css">
    <!-- data table CSS v1.13.1-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css" />




</head>

<body>



    <header>
        <!-- place navbar here -->
        <nav class="bg-dark">
            <div class="container ">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#"><i class="fa-solid fa-explosion me-3"></i> SRT</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">App</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Service</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h4 class="text-capitalize text-center py-3">CRUD by PHP-OOP and PDP my sqli</h4>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h4 class="mt-2 text-primary text-uppercase">All Users</h4>
                </div>
                <div class="col-lg-6">
                    <button data-bs-toggle="modal" data-bs-target="#addUserModal"
                        class="btn btn-primary float-end m-1"><i class="fa-solid fa-users me-2"></i>Add Users</button>
                    <a href="action.php?export=excel" class="btn btn-success text-capitalize float-end m-1"><i class="fa-solid fa-file-export me-2"></i>Export To Excel</a>
                </div>
            </div>
            <hr>
            <!-- table -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive" id="showUser">

                    </div>
                </div>
            </div>
        </div>


        <!-- add Modal -->
        <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="form-data" method="POST">
                            <div class="form-group mb-3">
                                <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="tel" name="phone" class="form-control" placeholder="Enter Phone Number" required>
                            </div>
                            <div class="form-group mb-3 d-block">
                                <input type="submit" id="insert" name="insert" class="btn btn-danger btn-block" >
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- edit Modal -->
        <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editUserModalLabel">Update User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="edit-form-data" method="POST">
                            <div class="form-group mb-3">
                                <input type="hidden" name="userId" id="userId">
                                <input type="text" name="fname" class="form-control" id="fname" placeholder="Enter First Name" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" name="lname" class="form-control" id="lname" placeholder="Enter Last Name" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="tel" name="phone" class="form-control" id="phone" placeholder="Enter Phone Number" required>
                            </div>
                            <div class="form-group mb-3 d-block">
                                <input type="submit" id="update" name="update" class="btn btn-danger btn-block" >
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>














    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <!-- Datatable csn -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.js"></script>
    <!-- sweet alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>





    <script>
        $(document).ready(function () {

        // show data
        showAllUsers();
        function showAllUsers(){
            $.ajax({
                type: "POST",
                url: "action.php",
                data: {action:'view'},
                success: function (response) {
                    $('#showUser').html(response);
                    $('.table').DataTable({
                        order: [0,'desc'],
                    });

                }
            });}

        // insert data
        $('#insert').click(function (e) { 
            if ($('#form-data')[0].checkValidity()) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "action.php",
                    data: $('#form-data').serialize()+"&action=insert",
                    success: function (response) {
                        Swal.fire(
                        'User Added!',
                        'Your User Added Successfully!',
                        'success'
                        )
                        $('#addUserModal').modal('hide');
                        $('#form-data')[0].reset();
                        showAllUsers();

                    }
                });
                
            }
            
        });

        // edit 
        $('body').on('click','.edit_btn', function (e) {
            e.preventDefault();
            // console.log('Yes it work');
            let edit_id = $(this).attr('id');
            $.ajax({
                type: "POST",
                url: "action.php",
                data: {edit_id:edit_id},
                success: function (response) {
                    let data = JSON.parse(response);
                    let user = data[0];
                    $('#userId').val(user.id);
                    $('#fname').val(user.first_name);
                    $('#lname').val(user.last_name);
                    $('#email').val(user.email);
                    $('#phone').val(user.phone);
                }
            });
        });

        // update data
        $('#update').click(function (e) { 
            if ($('#edit-form-data')[0].checkValidity()) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "action.php",
                    data: $('#edit-form-data').serialize()+"&action=update",
                    success: function (response) {
                      Swal.fire(
                        'User Updated!',
                        'Your User Updated Successfully!',
                        'success'
                        )
                        $('#editUserModal').modal('hide');
                        $('#edit-form-data')[0].reset();
                        showAllUsers();

                    }
                });
                
            }
            
        });

        // view
        $(document).on('click','.show_btn', function (e) {
            e.preventDefault();
            let info_Id = $(this).attr('id');
            // alert(info_Id);
            $.ajax({
                type: "POST",
                url: "action.php",
                data: {info_Id:info_Id},
                success: function (response) {
                 let data = JSON.parse(response);
                 let user = data[0];
                 Swal.fire({
                title: '<strong>User info: ID('+user.id+')</strong>',
                icon: 'info',
                html: '<div class=""><b>First Name: </b> '+user.first_name+'<br><b>Last Name:</b> '+user.last_name+'<br><b> Email : </b> '+user.email+'<br><b>Phone: </b> '+user.phone + '</div>',
                })




                }
            });
        });

        // delete
        $(document).on('click','.delete_btn', function (e) {
            e.preventDefault();
            let tr = $(this).closest('tr');
            let del_id = $(this).attr('id');
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "action.php",
                    data: {delete_id:del_id},
                    success: function (response) {
                        // showAllUsers();
                        tr.css('transition','0.7s');
                        tr.css('background','#ff6666');
                        setTimeout(function() {
                        showAllUsers();
                        }, 3000);

                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                    }
                });

            }
            })
            
        });











        });
    </script>



</body>

</html>