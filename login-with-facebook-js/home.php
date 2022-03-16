<?php
    include "config.php";

    $url = 'http://10.101.92.39/fbbotrobi/db-service/public/index.php';
    $postRequest = true;
    $requestHeaders = [];
    $headers = ["cache-control: no-cache"];
    $headers = array_merge($headers, $requestHeaders);
    $postData=['method'=>'allComments'];
    $carlHandler = curl_init();
    curl_setopt($carlHandler, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($carlHandler, CURLOPT_TIMEOUT, 15);
    curl_setopt($carlHandler, CURLOPT_URL, $url);
    curl_setopt($carlHandler, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($carlHandler, CURLOPT_HTTPHEADER, $headers);

    curl_setopt($carlHandler, CURLOPT_POST, true);
    curl_setopt($carlHandler, CURLOPT_POSTFIELDS, $postData);

    curl_setopt($carlHandler, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($carlHandler, CURLOPT_SSL_VERIFYPEER, false);

    $response = json_decode(trim(curl_exec($carlHandler)));
    $data = json_decode($response->data) ;
?>
<!-- <!doctype html>
<html>
    <head></head>
    <body>
        <h1>Homepage</h1>
        <form method='post' action="">
            <input type="submit" value="Logout" name="but_logout">
        </form>
    </body>
</html> -->
<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Instagram Comment </title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="main.css">

  <meta name="theme-color" content="#fafafa">
</head>

<body>

<!--**********************************
                Instagram
 ***********************************-->

<div class="main-container">

  <div class="ccpro-aside">
    <div class="ccpro-logo">
      <img src="gplex.svg" alt="">
    </div>
    <ul>
      <li>
        <a href="" class="active">Instagram comments</a>
      </li>
    </ul>
  </div>

  <main class="ccpro-main">
    <div class="ccpro-header">
        <h5>CC PRO Comment System</h5>
        <button class="btn btn-info btn-sm"  onclick="logoutFunction()" > Logout </button>
    </div>
    <div class="ccpro-header">
      <h5>Comment List</h5>
      <div class="ccpro-button">
        <!-- <button type="button" class="btn btn-info btn-sm">Add</button>
        <button type="button" class="btn btn-danger btn-sm">Delete</button> -->
      </div>

    </div>

     <!--**********************************
                  Table
      ***********************************-->
    <table class="table table-sm table-bordered table-striped">
      <thead>
      <tr>
      <!-- <th scope="col"> Id </th> -->
        <!-- <th scope="col">Comment Id </th> -->
        <th scope="col">content</th>
        <!-- <th scope="col">Assign Agent</th> -->
        <th scope="col">Commented Date </th>
        <th scope="col">Is Assign Agent </th>
        <!-- <th scope="col">Sender Id </th> -->
        <th scope="col">Sender Name </th>
        <th scope="col">Media Id  </th>
        <th scope="col">Media Product Type  </th>
      </tr>
      </thead>
      <tbody>
        <?php 
            foreach($data as $item){ 
        ?>
            <tr>
                <!-- <th scope="row"><?php echo $item->id ?> </th> -->
                <!-- <td><?php echo $item->comment_id ?> </td> -->
                <td><?php echo $item->content ?></td>
                <!-- <td><?php echo $item->assign_agent?$item->assign_agent:'Agent Not Assigned' ?></td> -->
                <td><?php echo date_format(date_create($item->created_date),"Y/m/d") ?></td>
                <td><?php echo $item->is_agent_assign ?></td>
                <!-- <td><?php echo $item->sender_id ?></td> -->
                <td><?php echo $item->sender_name ?></td>
                <td><?php echo $item->media_id ?></td>
                <td><?php echo $item->media_product_type ?></td>
                <td><a class="btn btn-danger"  href="reply.php?m_id=<?php echo $item->media_id ?>&&comment_id=<?php echo $item->comment_id ?>&&content=<?php echo $item->content ?>&&create_date=<?php echo date_format(date_create($item->created_date),"Y-m-d")?>">Open</div></td>
            </tr>
        <?php 
            } 
        ?>
      </tbody>
    </table>



  </main>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <textarea name="" id="" cols="30" rows="10"></textarea>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Send Reply</button>
      </div>
    </div>
  </div>
</div>



</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="script.js"></script>
</body>

</html>
