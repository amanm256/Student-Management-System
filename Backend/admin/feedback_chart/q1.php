<?php
$con  = mysqli_connect("localhost","root","","feedback_system1");
if (!$con) 
{
    # code...
    echo "Problem in database connection! Contact administrator!" . mysqli_error();
}
else
{
    $sql ="SELECT * FROM feedback";
    $result = mysqli_query($con,$sql);
    $sql1 ="SELECT * FROM faculty";
    $result1 =mysqli_query($con,$sql1);
    $chart_data="";
    $f_email=$f_email1="";
    $chintal=$akash=$harshil=$priyal=$hardik=0;
    $sales=array('0','0','5');
    $f1=$f2=$f3=$f4=$f5=$f4avg=$f5avg=0;
    while($row=mysqli_fetch_array($result1)) 
    {
        $productname[]= $row['Name'];
        //echo"<br>";
    }
    //print_r ($productname);
    /* while ($row=mysqli_fetch_array($result)) 
    {
        $sales[]=$row["Teacher provided the course outline having weekly content plan w"];
        echo $row['Teacher provided the course outline having weekly content plan w'];
    } */
    if((mysqli_num_rows($result))>0) 
    {
        // output data of each row
        while($row=mysqli_fetch_array($result)) 
        {
            $f_email= $row["faculty_id"];
            //echo "<br>",$f_email,"<br>";
                if(($row["faculty_id"])=="chintalr@gmail.com")
                {
                    $chintal++;
                    $f2=$f2+$row["Teacher provided the course outline having weekly content plan w"];
                    //echo $f1;
                    $f2avg=($f2/$chintal);
                    
                }
                if(($row["faculty_id"])=="akashp@gmail.com")
                {
                    $akash++;
                    $f1=$f1+$row["Teacher provided the course outline having weekly content plan w"];
                    //echo $f2;
                    $f1avg=($f1/$akash);
                    
                }
                if(($row["faculty_id"])=="harshilj@gmail.com")
                {
                    $harshil++; 
                    $f3=$f3+$row["Teacher provided the course outline having weekly content plan w"];
                    //echo $f3;
                    $f3avg=($f3/$harshil);
                }
                if(($row["faculty_id"])=="priyalv@gmail.com")
                {
                    $priyal++; 
                    $f4=$f4+$row["Teacher provided the course outline having weekly content plan w"];
                    //echo $f4;
                    $f4avg=($f4/$priyal);
                }
                if(($row["faculty_id"])=="hardikj@gmail.com")
                {
                    $hardik++; 
                    $f5=$f5+$row["Teacher provided the course outline having weekly content plan w"];
                    //echo $f5;
                    $f5avg=($f5/$hardik);
                }
            
        }
        array_splice($sales,0,0,$f1avg);
        array_splice($sales,1,0,$f2avg);
        array_splice($sales,2,0,$f3avg);
        array_splice($sales,3,0,$f4avg);
        array_splice($sales,4,0,$f5avg);

    } 
    else 
    {
        //echo "0 results found in faculty feedback table ";
    }
    //echo "<br>",$chintal,"<br>",$akash,"<br>",$harshil,"<br>";

   // print_r ($sales);
}


?>
<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Graph</title> 
    </head>
    <body>
        <div style="width:60%;hieght:20%;text-align:center">
            <h2 class="page-header" >Average of Q1 </h2>
            <div>Faculties </div>
            <canvas  id="chartjs_bar"></canvas> 
        </div>    
    </body>
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($productname); ?>,
                        datasets: [{
                            backgroundColor: [
                               "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750",
                                "#2ec551",
                                "#7040fa",
                                "#ff004e"
                            ],
                            data:<?php echo json_encode($sales); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: true,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
                }
                });
    </script>
</html>