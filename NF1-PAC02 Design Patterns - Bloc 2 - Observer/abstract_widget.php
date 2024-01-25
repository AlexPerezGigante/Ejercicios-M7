<?php

interface Observer {
  public function update(Observable $subject);
}


abstract class Widget implements Observer {

  protected $internalData = array();

  abstract public function draw();

  public function update(Observable $subject) {
         $this->internalData = $subject->getData();
  }
}


class BasicWidget extends Widget {

  function __construct() {
  }

  public function draw() {
         $html = "<head>
         <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js\"></script>
         <script src=\"https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js\" integrity=\"sha512-DkPsH9LzNzZaZjCszwKrooKwgjArJDiEjA5tTgr3YX4E6TYv93ICS8T41yFHJnnSmGpnf0Mvb5NhScYbwvhn2w==\" crossorigin=\"anonymous\" referrerpolicy=\"no-referrer\"></script>
         <link rel=\"stylesheet\" href=\"css.css\">
     </head>
     <header>
     <div style=\"display: flex;\">
     <div class='select-ctr'>
     <div class='selected-input input-preview'>Name</div>";

         $numRecords = count($this->internalData[0]);
         for($i = 0; $i < $numRecords; $i++) {
                $pilots = $this->internalData[0];
                $input= $i+1;
                $html .=  "<div class='input input-$input' data-val='$pilots[$i]'>$pilots[$i]</div>";
                }
         $html .= "</div>
         <div class='select-ctr' style=\"margin-left: 100px;\">
         <div class='selected-input input-preview'>Budget(M)</div>";
         $numRecords = count($this->internalData[0]);
         for($i = 0; $i < $numRecords; $i++) {
                $pilots = $this->internalData[1];
                $input= $i+1;
                $html .=  "<div class='input input-$input' data-val='$pilots[$i]'>$pilots[$i]</div>";
                }
         $html .= "</div>
         <div class='select-ctr' style=\"margin-left: 100px;\">
         <div class='selected-input input-preview'>Country</div>";
         $numRecords = count($this->internalData[0]);
         for($i = 0; $i < $numRecords; $i++) {
              $pilots = $this->internalData[2];                       $input= $i+1;
              $html .=  "<div class='input input-$input' data-val='$pilots[$i]'>$pilots[$i]</div>";
         }
         $html .= "</div>
         <div class='select-ctr' style=\"margin-left: 100px;\">
         <div class='selected-input input-preview'>MotorSport</div>";
         $numRecords = count($this->internalData[0]);
         for($i = 0; $i < $numRecords; $i++) {
                $pilots = $this->internalData[3];
                $input= $i+1;
                $html .=  "<div class='input input-$input' data-val='$pilots[$i]'>$pilots[$i]</div>";
                }
         $html .= "</div>";

         $html .="</div></header>
";
         echo $html;
  }
}


class FancyWidget extends Widget {
  
  function __construct() {
  }
  
  public function draw() {
         $html = 
         "
         <div>
         <canvas id=\"grafico\"></canvas>
         </div>
         <script src=\"https://cdn.jsdelivr.net/npm/chart.js\"></script>
         <script>
              const ctx = document.getElementById('grafico');
              
              new Chart(ctx, {
              type: 'doughnut',
              data: {
                     labels: [";
                     $numRecords = count($this->internalData[0]);
                     for($i = 0; $i < $numRecords; $i++) {
                            $name = $this->internalData[0];   
                            $html.="'$name[$i]',"; 
                            }
              
                     $html.="],
                     datasets: [{
                     label: 'M gained in races',
                     data: [";
                     $numRecords = count($this->internalData[0]);
                     for($i = 0; $i < $numRecords; $i++) {
                            $budget = $this->internalData[1];   
                            $html.="'$budget[$i]',"; 
                            }
              
                     $html.="],
                     borderWidth: 1
                     }]
              },
              options: {
                     scales: {
                     y: {
                     beginAtZero: true
                     }
                     }
              },
              });
         </script>
         <script src=\"main.js\"></script>
         ";
         echo $html;
  }
}

?>
