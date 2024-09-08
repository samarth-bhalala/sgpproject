<?php
    session_start();
    extract($_POST);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
.card {
 width: 50%;
 padding: 1.9rem 1.2rem;
 text-align: center;
 background: #2a2b38;
 margin:auto;
 margin-top:200px;
 border-radius:40px;
}

/*Inputs*/
.field {
 margin-top: .5rem;
 display: flex;
 align-items: center;
 justify-content: center;
 gap: .5em;
 background-color: #1f2029;
 border-radius: 4px;
 padding: .5em 1em;
}

.input-icon {
 height: 1em;
 width: 1em;
 fill: #ffeba7;
}

.input-field {
 background: none;
 border: none;
 outline: none;
 width: 100%;
 color: #d3d3d3;
}

/*Text*/
.title {
 margin-bottom: 1rem;
 font-size: 1.5em;
 font-weight: 500;
 color: #f5f5f5;
}

/*Buttons*/
.btn {
 margin: 1rem;
 border: none;
 border-radius: 4px;
 font-weight: bold;
 font-size: .8em;
 text-transform: uppercase;
 padding: 0.6em 1.2em;
 background-color: #ffeba7;
 color: #5e6681;
 box-shadow: 0 8px 24px 0 rgb(255 235 167 / 20%);
 transition: all .3s ease-in-out;
}

.btn-link {
 color: #f5f5f5;
 display: block;
 font-size: .75em;
 transition: color .3s ease-out;
}

/*Hover & focus*/
.field input:focus::placeholder {
 opacity: 0;
 transition: opacity .3s;
}

.btn:hover {
 background-color: #5e6681;
 color: #ffeba7;
 box-shadow: 0 8px 24px 0 rgb(16 39 112 / 20%);
}

.btn-link:hover {
 color: #ffeba7;
}
.buttn{
  margin: 1rem;
 border: none;
 border-radius: 4px;
 font-weight: bold;
 font-size: .8em;
 text-transform: uppercase;
 padding: 0.6em 1.2em;
 background-color: #ffeba7;
 color: #5e6681;
 box-shadow: 0 8px 24px 0 rgb(255 235 167 / 20%);
 transition: all .3s ease-in-out;
 cursor: pointer;
}
@media only screen and (max-width:600px){
  .card {
 width: 100%;
 padding: 1.9rem 1.2rem;
 text-align: center;
 background: #2a2b38;
 margin:auto;
 margin-top:200px;
 border-radius:40px;
}
}
    </style>
</head>
<body>
<!-- <div class="container">
    <div class="content">
       <i style="background-image: url(); background-position: 0px -52px; background-size: auto; width: 175px; height: 51px; background-repeat: no-repeat; display: inline-block;" role="img" class="" aria-label="Instagram" data-visualcompletion="css-img"></i> 
      <h2>Study Schools</h2>
      <form class="content__form" action="edit_info.inc.php" method="POST">
        <div class="content__inputs">  
          <label>
            <input required="" type="password" name="pass" id="password">
            <span>Enter Your Password</span><br>
            <input type="button" id="shpass" class="buttn" name="shpass" value="🔒" onclick="change_pass()" title="show password">
          </label>
        </div>
        <button>Change Info</button>
        <?php
        if(isset($_REQUEST['wrngpass']))
        {
          echo $_REQUEST['wrngpass'];
        }
        ?>
      </form>
    </div>
  </div> -->
  <div class="card">
  <h4 class="title">Physiofit</h4>
  <form action="edit_info.inc.php" method="POST">
    <div class="field">
      <svg class="input-icon" viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg">
      <path d="M80 192V144C80 64.47 144.5 0 224 0C303.5 0 368 64.47 368 144V192H384C419.3 192 448 220.7 448 256V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V256C0 220.7 28.65 192 64 192H80zM144 192H304V144C304 99.82 268.2 64 224 64C179.8 64 144 99.82 144 144V192z"></path></svg>
      <input autocomplete="off" placeholder="Password" class="input-field" name="chng_pass" id="password" type="password">
      <input type="button" id="shpass" class="buttn" name="shpass" value="🔒" onclick="change_pass()" title="show password">
    </div>
    <button class="btn" type="submit">Submit</button>
  </form>
</div>
  <?php
  // echo $_POST['logpass'];
  //echo $new_user_name;
      if(isset($new_user_name) and isset($new_user_email))
      {
        $_SESSION['new_name']=$new_user_name;
        $_SESSION['new_mail']=$new_user_email;
      }
  ?>
  <script>
    function change_pass(){
        var x=document.getElementById('shpass').value;
        if(x=="🔒")
        {
            x=document.getElementById('shpass').value="🔐";
            document.getElementById('password').type='text';
            document.getElementById('shpass').title="hide password";
        }
        else{
            x=document.getElementById('shpass').value="🔒";
            document.getElementById('password').type='password';
            document.getElementById('shpass').title="show password";
        }
    }
  </script>
</body>
</html>