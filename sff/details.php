<?php
    include "Base/head.php";
    include "SQL/db_connect.php";

    $fieldid = mysqli_real_escape_string($conn, $_GET['id']);


    $sql = "SELECT endtime,name,description,position,status,type,city FROM fields WHERE id=$fieldid";

    $result = $conn->query($sql);
    $fields_data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $field = $fields_data[0];
    $type = $field['type'];

    if(!$conn->query($sql))
    {
        echo $conn->error ;
    }

?>
<header>
    <h1 class="title"><?=$field['name']?></h1>
    <h2 class="city-title"><?=$field['city']?></h2>
</header>

    <nav class="navbar">
        <ul class="nav">
            <li style="margin-top: 50px;"></li>
            <li style="font-size: 1.4em;">MENU</li>
            <div class="nav-li">
                <li><a href="index.php"><div class="circle"></div></a></li>
                <li><a href="city.php?type=<?= $type?>"><div class="circle"></div></a></li>
                <li><a href="fields_list.php?location=<?= $field['city']?>&type=<?= $type?>"><div class="circle"></div></a></li>

            </div>
        </ul>
    </nav>
    <section>
    <div class="map">
        <?=$field['position']?>
    </div>

    <p class="description">
        <span style="font-weight: bold;">More info:</span>
        <?=$field['description']?>
    </p>



    <form class="reservation" action="_reserv.php" method="GET">

        <?php

            if ($field['status'] == "free")
            {
                echo '<div class="status-free">FREE</div>';
            }

            else
            {
                $date = date("Y-m-d H:i", $field['endtime'] + 7200);
                echo '<div class="status-occupied">OCCUPIED<span style="font-size: 0.65em;">  TIME:' .$date. '</span></div>';
            }

        ?>

        <input type="hidden" name="id" value=<?= $fieldid ?> />
        <!-- <output name="time_output" for="time">4</output></label>
        <input type="range" name="time" value="4" min="1" max="8" onchange="time_output.value = parseInt(time.value)"> -->

        <?php if(isset($_COOKIE['ID'])): ?>
        <select name="time">
             <option value="1" selected>1 Hour</option>
             <option value="2">2 Hour</option>
             <option value="3">3 Hours</option>
             <option value="4">4 Hours</option>
        </select>
    <?php endif; ?>

        <?php
            if (isset($_COOKIE['ID']))
            {
                if ($field['status'] != "free")
                {
                    echo '<input id="occupied" style="background: #595959; cursor: pointer;" value="Change status"/>';
                }
                else
                {
                    echo '<input style="background: #595959; cursor: pointer;"type="submit" value="Change status" />';
                }

            }
            else
            {
                echo '<a id="login" style="background: #595959; cursor: pointer;">Change status</a>';
            }

        ?>

        <?php if(isset($_COOKIE['ID'])): ?>
            <div style="text-align: center;" class="form-buttons">
                  <a style="line-height: 45px"class="submit" href="_logout.php?id=<?=$fieldid?>">LOGOUT</a>
              </div>
        <?php endif; ?>
    <?php if(!isset($_COOKIE['ID'])): ?>
            <div style="text-align: center;" class="form-buttons">
                  <a style="line-height: 45px" class="submit" href="login.php?id=<?=$fieldid?>">LOGIN</a>
              </div>
        <?php endif; ?>
    </form>
    </section>
    <script>
	    $(function(){
	    	$('#login').on('click',function(){
				$.amaran({
                    'theme'     :'awesome error',
                    'content'   :{
                        title:'ERROR',
                        message:'You must login to change field status!',
                        info:'',
                        icon:'fa fa-times-circle'
                    },
                    'cssanimationIn'    :'boundeInDown',
                    'cssanimationOut'   :'zoomOutUp',
                    'position'          :'top right'

                });
			});

            $('#occupied').on('click',function(){
				$.amaran({
                    'theme'     :'awesome error',
                    'content'   :{
                        title:'ERROR',
                        message:'This field is occupied!',
                        info:'',
                        icon:'fa fa-times-circle'
                    },
                    'cssanimationIn'    :'boundeInDown',
                    'cssanimationOut'   :'zoomOutUp',
                    'position'          :'top right'

                });
			});
	    });
    </script>
<?php
    include "Base/foot.php";

    $location = $field['city'];
    $type = $field['type'];

    $sql = "SELECT id,starttime, endtime FROM fields WHERE city='$location' AND type = '$type'";
    $result = $conn->query($sql);
    $fields_data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach($fields_data as $field)
    {
       if ($field['endtime'] <= time())
       {
           $fieldid = $field['id'];
           $sql = "UPDATE fields SET status='free' WHERE id=$fieldid";
           $result = $conn->query($sql);
       }
    }
 ?>
