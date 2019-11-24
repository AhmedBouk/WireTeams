

      <div class="card-header ">
          <h4 class="card-title table-success">Frame analysis </h4>
      </div>
               <form method="POST" action="" enctype="multipart/form-data">
                        <label for="trame">File:</label>
                        <input class="btn active button info " type="file" name="trame" >

                        <input class="btn active button info " type="submit" name="envoyer" value="Send the file">
               </form>
      <div class="card-header">
          <h4 class="card-title table-success">Json Files</h4>
      </div>
      <?php
            $req= $pdo->query('SELECT id, name FROM files');
               while($data = $req->fetch()){
                   echo $data['name'].' : '.'<a href="upgrade.php?id='.$data['id']. ' ">Parser ' .$data['name'].'</a><br>';
               }


?>

