<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Font Awesome Icon Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {
  box-sizing: border-box;
}
.heading {
  font-size: 25px;
  margin-right: 25px;
}

.fa {
  font-size: 25px;
}

.checked {
  color: orange;
}

/* Three column layout */
.side {
  float: left;
  width: 15%;
  margin-top:10px;
}

.middle {
  margin-top:10px;
  float: left;
  width: 70%;
}

/* Place text to the right */
.right {
  text-align: right;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* The bar container */
.bar-container {
  width: 100%;
  background-color: #f1f1f1;
  text-align: center;
  color: white;
}

/* Individual bars */
.bar-5 { height: 18px; background-color: #4CAF50;}
.bar-4 { height: 18px; background-color: #2196F3;}
.bar-3 { height: 18px; background-color: #00bcd4;}
.bar-2 { height: 18px; background-color: #ff9800;}
.bar-1 { height: 18px; background-color: #f44336;}

/* Responsive layout - make the columns stack on top of each other instead of next to each other */
@media (max-width: 400px) {
  .side, .middle {
    width: 100%;
  }
  .right {
    display: none;
  }
}
</style>
</head>
<body>
<form method="post">
<table class="table table-hover">
<tr>

<th> Select Faculty</th>
<td>
<select name="faculty" class="form-control">
	<?php
	$sql=mysqli_query($conn,"select * from faculty");
	while($r=mysqli_fetch_array($sql))
	{
	echo "<option value='".$r['email']."'>".$r['Name']."</option>";
	}
		 ?>
</select>
</td>
<td><input name="sub" type="submit" value="Check Average" class="btn btn-success"/></td>
</tr>
</table>
</form>
<hr style="border:1px solid red"/>
<!--Chart-->

<?php
extract($_POST);
if(isset($sub))
{
//Count total Votes
$r=mysqli_query($conn,"select * from feedback where faculty_id='$faculty'");
$c=mysqli_num_rows($r);	
$ans1 = 0;
$v1 =0;
$v2=0;
$v3=0;
$v4=0;
$v5=0;
$p1;
$p2;
$p3;
$p4;
$p5;

while($retrive=mysqli_fetch_array($r))
{
	$id1=$retrive['Teacher provided the course outline having weekly content plan w'];
	$name=$retrive['Course objectives,learning outcomes and grading criteria are cle'];
	$ans1 = $ans1+$id1;

	if($id1 == 5){
		$v5++;
	}
	if($id1 == 4){
		$v4++;
	}

	if($id1 == 3){
		$v3++;
	}

	if($id1 == 2){
		$v2++;
	}

	if($id1 == 1){
		$v1++;
	}
	
}
$totalStudent=20;

$p1 = ($v1*100)/$totalStudent; 

$p2 = ($v2*100)/$totalStudent; 

$p3 = ($v3*100)/$totalStudent; 

$p4 = ($v4*100)/$totalStudent; 

$p5 = ($v5*100)/$totalStudent; 

$avg = $ans1/$c;
}
?>	
<span class="heading">User Rating</span>
<span class="fa fa-star <?php if($avg >= 1){ echo 'checked'; }?>"></span>
<span class="fa fa-star <?php if($avg >= 2){ echo 'checked'; }?>"></span>
<span class="fa fa-star <?php if($avg >= 3){ echo 'checked'; }?>"></span>
<span class="fa fa-star <?php if($avg >= 4){ echo 'checked'; }?>"></span>
<span class="fa fa-star <?php if($avg >= 5){ echo 'checked'; }?>"></span>
<p><?php echo "$avg Average based on $c reviews ";?></p>
<hr style="border:3px solid #f1f1f1">

<div class="row">
  <div class="side">
    <div>5 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-5" style="width:<?php echo $p5; ?>%"></div>
    </div>
  </div>
  <div class="side right">
    <div><?php echo "$v5"; ?></div>
  </div>
  <div class="side">
    <div>4 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-4" style="width:<?php echo $p4; ?>%"></div>
    </div>
  </div>
  <div class="side right">
    <div><?php echo "$v4"; ?></div>
  </div>
  <div class="side">
    <div>3 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-3" style="width:<?php echo $p3; ?>%"></div>
    </div>
  </div>
  <div class="side right">
    <div><?php echo "$v3"; ?></div>
  </div>
  <div class="side">
    <div>2 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-2" style="width:<?php echo $p2; ?>%"></div>
    </div>
  </div>
  <div class="side right">
    <div><?php echo "$v2"; ?></div>
  </div>
  <div class="side">
    <div>1 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-1" style="width:<?php echo $p1; ?>%"></div>
    </div>
  </div>
  <div class="side right">
    <div><?php echo "$v1"; ?></div>
  </div>
</div>

<!-- Chart Ends-->

<?php
extract($_POST);
if(isset($sub))
{
//Count total Votes
$r=mysqli_query($conn,"select * from feedback where faculty_id='$faculty'");
$c=mysqli_num_rows($r);	


/*
$r1=mysqli_query($conn,"select * from feedback where faculty_id='$faculty'");
$c1=mysqli_fetch_assoc($r1);	
echo "<h4>Total Student Attempts : ".$c1[3]."</h4>";

*/

//question 1 start
error_reporting(1);
$q=mysqli_query($conn,"select * from feedback where faculty_id='$faculty'");
while($res=mysqli_fetch_array($q))
{
	if($res[3]==5)
	{
	$stongly_agree++;
	} 
	else if($res[3]==4)
	{
	$agree++;
	}
	else if($res[3]==3)
	{
	$neutral++;
	}
	else if($res[3]==2)
	{
	$disagree++;
	}
	else if($res[3]==1)
	{
	$strongly_disagree++;
	}
	
}
//question 1 end


//question 2 start
$q2=mysqli_query($conn,"select * from feedback where faculty_id='$faculty'");
while($res=mysqli_fetch_array($q2))
{
	if($res[4]==5)
	{
	$stongly_agree1++;
	} 
	else if($res[4]==4)
	{
	$agree++;
	}
	else if($res[4]==3)
	{
	$neutral++;
	}
	else if($res[4]==2)
	{
	$disagree++;
	}
	else if($res[4]==1)
	{
	$strongly_disagree++;
	}
	
}
//question 2 end

//count 
$t=$stongly_agree+$stongly_agree1;




$q=mysqli_query($conn,"select * from feedback where faculty_id='$faculty'");
while($res=mysqli_fetch_array($q))
{
$count+=$res[3];
$count+=$res[4];
$count+=$res[5];
$count+=$res[6];
$count+=$res[7];
$count+=$res[8];
$count+=$res[9];
$count+=$res[10];
$count+=$res[11];
$count+=$res[12];
$count+=$res[13];
$count+=$res[14];
$count+=$res[15];
}
//echo $count;
}
?>
</body>