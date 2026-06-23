if((mysqli_num_rows($result))>0) 
    {
        // output data of each row
        while($row=mysqli_fetch_array($result)) 
        {
            $f_email= $row["faculty_id"];
            echo "<br>",$f_email;
                if(($row["faculty_id"])=="chintalr@gmail.com")
                {
                    $chintal++;
                    $f1=$f1+$row["Teacher provided the course outline having weekly content plan w"];
                    echo $f1;
                    $f1avg=($f1/$chintal);
                    
                }
                if(($row["faculty_id"])=="akashp@gmail.com")
                {
                    $akash++;
                    $f2=$f2+$row["Teacher provided the course outline having weekly content plan w"];
                    echo $f2;
                    $f2avg=($f2/$akash);
                    
                }
                if(($row["faculty_id"])=="harshilj@gmail.com")
                {
                    $harshil++; 
                    $f3=$f3+$row["Teacher provided the course outline having weekly content plan w"];
                    echo $f3;
                    $f3avg=($f3/$harshil);
                }
        }
        array_splice($sales,0,0,$f1avg);
        array_splice($sales,1,0,$f2avg);
        array_splice($sales,2,0,$f3avg);
    } 
    else 
    {
        echo "0 results found in faculty feedback table ";
    }