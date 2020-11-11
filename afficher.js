
      function afficher(){

       var pol = document.querySelector('input[id="id_polluant"]:checked');

      var date_debut = document.getElementById("date_debut").value;
      var date_fin = document.getElementById("date_fin").value;
      var select = document.getElementById("ville" );
      var quartier = select.options[select.selectedIndex].value;
     var methode = document.querySelector('input[id="methode"]:checked');
     var canvas=document.getElementById("myChart");


     if(pol&&date_debut&&date_fin&&methode){

     var id_polluant = pol.value;

      var url='http://localhost/Air_quality_plateform-master/json4.php?date_debut='+date_debut+'&quartier='+quartier+'&id_polluant='+id_polluant+'&date_fin='+date_fin;

  $.ajax({
    url: url,
    method: "GET",
    success: function(data) {

       var x = [];

      var y = [];

      for(var i=1 ;i< data.length;i++) {
       

        x.push(" " + data[i].DATE_MESURE);


        y.push(" "+ data[i]._QUANTITE);

      }
      
      var chartdata = {
        labels: x,
        datasets : [
          {
            label:  data[0].nom_polluant +'('+data[0].unite_mesure+')' ,
            backgroundColor: 'rgba(200, 200, 200, 0.75)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: y
            
      }]};

        

     var ctx = canvas.getContext('2d');
  var barGraph = new Chart(ctx, {
        type: methode.value,
        data: chartdata,
         options: {
        layout: {
            padding: {
                left: 60,
                right: 60,
                top: 0,
                bottom: 50
            }
        }
    }
      });
  delete(chartdata);
          },
    error: function(data) {
      console.log(data);

}   
    
 });

       }
      else {
      
       alert("Veuillez remplir tous les champs du formulaire");

      }}



      

     function afficher2(){

        var select = document.getElementById("ville" );
        var id_ville = select.options[select.selectedIndex].value;
        console.log(id_ville);

       // var divresult=document.getElementById("indice");
  
     if(id_ville){
     
           var url='http://localhost/qair/json3.php?id_ville='+id_ville;
     
       $.ajax({
         url: url,
         method: "GET",
         success: function(data) {
     
            var indice=data[0]._QUANTITE;
             
            
            if(indice<5){
 $("#result").html( "<img src='img/smiley-icon.png' width='150' height='150'> <br> <p>Trés bonne qualité d'air aujourd'hui (1-4)</p>" );
              
            }
            else if(indice <8){
              $("#result").html( "<img src='img/smiley2.png' width='150' height='150'> <br> <p>qualité d'air moyenne aujourd'hui (5-7)</p>" );


            }
            else {
              $("#result").html( "<img src='img/smiley3.png' width='150' height='150'> <br> <p>Mauvaise qualité d'air aujourd'hui(8-10) </p>" );

            }
     
           }
          });
            
           
      
    }
    else {
      alert("Veuillez selectionner une ville");
    }
      }

  
