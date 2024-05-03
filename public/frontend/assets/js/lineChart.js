function drawLineChart(container, data, seriesData, valueAxisTitle) {
    am4core.useTheme(am4themes_animated);

    var chart = am4core.create(container, am4charts.XYChart);
    chart.data = data;

    var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
    categoryAxis.dataFields.category = "year";
    categoryAxis.renderer.grid.template.location = 0;
    categoryAxis.renderer.minGridDistance = 55;

    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
    valueAxis.title.text = valueAxisTitle;
    // valueAxis.min = 200;
    // valueAxis.max = 1800;
    // valueAxis.strictMinMax = true;

    function createSeries(field, name, color, bulletShape) {
        var series = chart.series.push(new am4charts.LineSeries());
        series.dataFields.valueY = field;
        series.dataFields.categoryX = "year";
        series.name = name;
        series.tooltipText = "{name}: {valueY}";
        series.strokeWidth = 3;
        series.stroke = am4core.color(color);

        var bullet = series.bullets.push(new am4charts.Bullet());
        bullet.tooltipText = name + ": {valueY}";

        var shape;
        switch (bulletShape) {
            case 'circle':
                shape = bullet.createChild(am4core.Circle);
                break;
            case 'square':
                shape = bullet.createChild(am4core.Rectangle);
                break;
            case 'triangle':
                shape = bullet.createChild(am4core.Triangle);
                break;
            case 'x':
                shape = bullet.createChild(am4core.Triangle);
                shape.rotation = 45;
                break;
            default:
                shape = bullet.createChild(am4core.Circle);
        }
        shape.width = 10;
        shape.height = 10;
        shape.horizontalCenter = "middle";
        shape.verticalCenter = "middle";
        shape.fill = am4core.color(color);

        return series;
    }

    for(let series of seriesData) {
        createSeries(series.field, series.name, series.color, series.bulletShape);
    }

    chart.legend = new am4charts.Legend();
    chart.legend.position = "bottom";

    chart.scrollbarX = new am4core.Scrollbar();
    chart.scrollbarY = new am4core.Scrollbar();

    chart.cursor = new am4charts.XYCursor();
}