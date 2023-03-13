function afficherGraphe(){
//Récupérer le choix de l'utilisateur

var choix=document.getElementsByName('etat[]');

for(let i=0;i<choix.length;i++)
{
  if(choix[i].checked==true)
  {
    var etat = choix[i].value; break
  }
}

console.debug(etat);

  var chart = am4core.create("chartdiv", am4charts.XYChart);
  //chart.dataSource.url = "/AfficherGrapheVol";

  chart.dataSource.url = "rest.php/graphe_test/"+etat;

  let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
  categoryAxis.dataFields.category = "idetat";
  categoryAxis.title.text = etat;

  let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
  valueAxis.title.text = "bat en %";


  var series = chart.series.push(new am4charts.LineSeries());
  series.dataFields.valueY = etat;
  series.dataFields.categoryX = "idetat";
  series.name = "Sales";
  series.columns.template.tooltipText = "Series: {name}\nCategory: {categoryX}\nValue: {valueY}";
  series.columns.template.fill = am4core.color("#104547"); // fill


}
