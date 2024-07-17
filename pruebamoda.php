<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="libraries/swet alert 2/sweetalert2.min.css"></script>
    <link rel="stylesheet" href="libraries/swet alert 2/sweetalert2.min.css">
    <title>Document</title>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
</head>

<body>
    <script>
    Swal.fire("SweetAlert2 is working!");
    </script>
    <?php
  echo "<script> Swal.fire({
    icon: 'success',
    title: 'Usuario creado',
    showConfirmButton: false,
    timer: 1500
  }); </script>";
  ?>


</body>

</html>