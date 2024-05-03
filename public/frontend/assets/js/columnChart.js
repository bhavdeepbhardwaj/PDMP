function drawColumnChart(container, data, seriesData, valueAxisTitle) {
    am4core.useTheme(am4themes_animated);

    var chart = am4core.create(container, am4charts.XYChart);
    chart.data = data

    var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
    categoryAxis.dataFields.category = "year";
    categoryAxis.title.text = "Year";
    categoryAxis.renderer.minGridDistance = 55;
    categoryAxis.renderer.cellStartLocation = 0.1;
    categoryAxis.renderer.cellEndLocation = 0.7;

    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
    valueAxis.title.text = valueAxisTitle;
	// valueAxis.min = 0;
    // valueAxis.max = 16000;
    // valueAxis.strictMinMax = true;
	
	

    function createSeries(field, name, color, tooltipLocation) {
        var series = chart.series.push(new am4charts.ColumnSeries());
        series.dataFields.valueY = field;
        series.dataFields.categoryX = "year";
        series.name = name;
        series.columns.template.tooltipText = "{name}: [bold]{valueY}[/]";
        series.tooltip.pointerOrientation = tooltipLocation;
        series.columns.template.fill = am4core.color(color);
        series.columns.template.strokeWidth = 2;
		/*
		var valueLabel = series.bullets.push(new am4charts.LabelBullet());
		valueLabel.label.text = "{valueY}";
		valueLabel.label.fontSize = 10;
		valueLabel.label.horizontalCenter = "left";*/
    }

    for(let series of seriesData) {
        createSeries(series.field, series.name, series.color, series.tooltipLocation);
    }

    chart.legend = new am4charts.Legend();
    chart.scrollbarX = new am4core.Scrollbar();
    chart.scrollbarY = new am4core.Scrollbar();

    chart.cursor = new am4charts.XYCursor();
    chart.cursor.lineX.strokeOpacity = 0;
    chart.cursor.lineY.strokeOpacity = 0;
}