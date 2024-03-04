//Visualisera circkeldiagrammet för Cupertino:
function drawChart() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'articleName');
    data.addColumn('number', 'articleNumber');

    for (var i = 0; i < my_2dC.length; i++) {
        data.addRow([my_2dC[i].articleName, parseInt(my_2dC[i].articleNumber)]);
    }

    var options = {
        title: 'Number of articles, Cupertino',backgroundColor: 'transparent', is3D: true, colors:['rgb(11, 255, 56)', 'rgb(14, 101, 30)', 'rgb(157, 255, 0)','rgb(0, 226, 173)','rgb(111, 107, 0)']
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
}

google.charts.load('current', {'packages':['corechart']});

google.charts.setOnLoadCallback(drawChart);


//Visualisera cirkeldiagrammet för Norrköping:
function drawChartN() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'articleName');
    data.addColumn('number', 'articleNumber');

    for (var i = 0; i < my_2dN.length; i++) {
        data.addRow([my_2dN[i].articleName, parseInt(my_2dN[i].articleNumber)]);
    }

    var options = {
        title: 'Number of articles, Norrköping',backgroundColor: 'transparent', is3D: true, colors:['rgb(11, 255, 56)', 'rgb(14, 101, 30)', 'rgb(157, 255, 0)','rgb(0, 226, 173)','rgb(111, 107, 0)']
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechartN'));
    chart.draw(data, options);
}

google.charts.load('current', {'packages':['corechart']});

google.charts.setOnLoadCallback(drawChartN);

//Visualisera cirkeldiagrammet för Frankfurt:
function drawChartF() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'articleName');
    data.addColumn('number', 'articleNumber');

    for (var i = 0; i < my_2dN.length; i++) {
        data.addRow([my_2dF[i].articleName, parseInt(my_2dF[i].articleNumber)]);
    }

    var options = {
        title: 'Number of articles, Frankfurt',backgroundColor: 'transparent', is3D: true, colors:['rgb(11, 255, 56)', 'rgb(14, 101, 30)', 'rgb(157, 255, 0)','rgb(0, 226, 173)','rgb(111, 107, 0)']
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechartF'));
    chart.draw(data, options);
}

google.charts.load('current', {'packages':['corechart']});

google.charts.setOnLoadCallback(drawChartF);

//Visualisera kartorna:
function drawRegionsMap() {
    var data = new google.visualization.DataTable();
    data.addColumn('string','departmentCountry');
    data.addColumn('number', 'totalArticles');
    
    for (var i = 0; i < my_2dDep.length; i++) {
        
        data.addRow([my_2dDep[i].departmentCountry, parseInt(my_2dDep[i].totalArticles)]);
    }
    
    var options = {title: 'Number of articles per country',backgroundColor: 'transparent',colorAxis: {colors: ['rgb(148, 255, 91)', 'rgb(23, 67, 0)']}};

    var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

    chart.draw(data, options);
  }

google.charts.load('current', {
    'packages':['geochart'],
});
google.charts.setOnLoadCallback(drawRegionsMap);
