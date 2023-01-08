<?php 

require_once 'db.php';
$db = new Database();

if (isset($_POST['action']) && $_POST['action'] == 'view') {
    $output = '';
    $data = $db->read(); //get the read method

    if ($db->totalRowCount() > 0)
    {
        $output .= '
        <table class="table table-striped table-sm table-bordered">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>E-Mail</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>';
        foreach ($data as $row) {
            $output .=
            '<tr class="text-center text-secondary">
            <td>'.$row['id'].'</td>
            <td>'.$row['first_name'].'</td>
            <td>'.$row['last_name'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['phone'].'</td>
            <td class="text-center">

            <a href="#" title="view detials" class="text-success mx-1 show_btn" id="'.$row['id'].'">
            <i class="fa-solid fa-circle-info"></i></a>

            <a href="#" data-bs-toggle="modal" data-bs-target="#editUserModal" title="edit" class="text-primary mx-1 edit_btn" id="'.$row['id'].'">
            <i class="fa-solid fa-pen-to-square"></i></a>

            <a href="#" title="delete" class="text-danger mx-1 delete_btn" id="'.$row['id'].'">
            <i class="fa-solid fa-trash-can"></i></a>
 
            </td>
            </tr>';
        }
        $output .= '</tbody></table>';
        echo $output;
    }
    else
    {
        echo '<h4 class="text-center mt-5 text-danger">No user Found in Database</h4>';
    }
}


    // insert data
    if (isset($_POST['action']) && $_POST['action'] == 'insert') {
        $fname = $_POST['first_name'];
        $lname = $_POST['last_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $db->insert($fname,$lname,$email,$phone);
    }

    // edit
    if (isset($_POST['edit_id']) )
    {
        $id = $_POST['edit_id'];
        $row = $db->getUserById($id);
        echo json_encode($row);
    }

    // update
    if (isset($_POST['action']) && $_POST['action'] == 'update')
    
    {
        $id    = $_POST['userId'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $db->update($id,$fname,$lname,$email,$phone);

    }

    // delete
    if (isset($_POST['delete_id']))
    
    {
        $id = $_POST['delete_id'];    
        $db->delete($id);
    }

    // show
    if (isset($_POST['info_Id']))
    
    {
        $id = $_POST['info_Id'];
        $row = $db->getUserById($id);
        echo json_encode($row);
    }

    // export
    if (isset($_GET['export']) && $_GET['export'] == 'excel')
    
    {
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=users.Xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        
        $data = $db->read();
        echo '<table border="1">';
        echo '<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th></tr>';

        foreach ($data as $row)
        
        {
            
        echo '<tr>
                <td>'.$row['id'].'</td>
                <td>'.$row['first_name'].'</td>
                <td>'.$row['last_name'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['phone'].'</td>
             </tr>';

        };
        echo '</table>';
    }

?>