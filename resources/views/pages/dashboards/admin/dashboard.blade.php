@extends('layout.default')
@section('title', 'Dashboard')
@section('content')

  <?php echo "<div>";

  $n = 10;
  $length = $n + ($n-1);
  $arr = [$n];

   
   for($i= 1; $i<=$n; $i++){
    
      for($j=$length; $j>=1; $j--){
          if(in_array($j,$arr)){
            echo "-*-";
          }else{
            echo "---";
          }  
      }

      array_push($arr,($n-$i));
      array_push($arr,($n+$i));
  
      echo "<br>";
   }

   echo "</div>"; ?>
  
@endsection