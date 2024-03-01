<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

 <div class="container-fluid mt-4">
 <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Student Information</h5>

              <a href="<?php echo site_url('users/newusers/')?>" style="float: right;" class="btn btn-primary">Add Student</a>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th class="col">Name</th>
                    <th class="col">Birthday</th>
                    <th class="col">Email</th>
                    <th class="col">Phone Number</th>+
                    <th class="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  if (isset($user) && is_countable($user) && count($user) > 0) {
                    foreach ($user as $myUser)   {
                      ?>
                        <tr>
                        <td><b><?php echo $myUser['firstName']; ?> <?php echo $myUser['middleName']; ?> <?php echo $myUser['lastName']; ?></b></td>
                        <td>
                        <?php echo $myUser['dateOfBirth'];?>
                        </td>
                        <td>
                        <?php echo $myUser['email'];?>
                        </td>
                        <td>
                        <?php echo $myUser['phoneNumber'];?>
                        </td>

          <td>
            <a class="btn btn-info" href="<?php echo site_url('users/edit/'.$myUser['id'])?>">Edit</a>
          </td>
          <td>
            <form action="<?php echo site_url('users/delete/'.$myUser['id'])?>" method="post">
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </td>
      </tr>
      <?php
          }
      }
        else
      {     
          ?>
          <h4>No Record Found!</h4>
      <?php
      }
      ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
 </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
if (isset($_SESSION['status']) && $_SESSION['status_code'] != '' )
{
    ?>
        <script>
            swal({
                title: "<?php echo $_SESSION['status']; ?>",
                icon: "<?php echo $_SESSION['status_code']; ?>",
            });
        </script> 
        <?php
        unset($_SESSION['status']);
        unset($_SESSION['status_code']);
}
?>
  </body>
</html>