// ------------------------------------------------ Shipping statistics --------------------------------------------------
// Growth of Indian Fleet during 2014-2022
const fleetData = [{
    "year": "2014",
    "coastal": 846,
    "overseas": 358,
    "total": 1199
}, {
    "year": "2015",
    "coastal": 873,
    "overseas": 373,
    "total": 1204
}, {
    "year": "2016",
    "coastal": 898,
    "overseas": 403,
    "total": 1301
}, {
    "year": "2017",
    "coastal": 928,
    "overseas": 443,
    "total": 1371
}, {
    "year": "2018",
    "coastal": 944,
    "overseas": 456,
    "total": 1400
}, {
    "year": "2019",
    "coastal": 972,
    "overseas": 457,
    "total": 1429
}, {
    "year": "2020",
    "coastal": 998,
    "overseas": 465,
    "total": 1463
}, {
    "year": "2021",
    "coastal": 1027,
    "overseas": 464,
    "total": 1491
}, {
    "year": "2022",
    "coastal": 1034,
    "overseas": 486,
    "total": 1520
}];
const fleetSeries = [
    { field: "coastal", name: "Coastal", color: "#4CAF50", tooltipLocation: "vertical" },
    { field: "overseas", name: "Overseas", color: "#FFEB3B", tooltipLocation: "horizontal" },
    { field: "total", name: "Total", color: "#2196F3", tooltipLocation: "down" }
];
drawColumnChart("fleetChart", fleetData, fleetSeries, "No. of vessels");
drawTable("fleetTable", fleetData, fleetSeries, "Growth of Indian Fleet during 2014-2022");

// Growth of Indian Tonnage during 2014-2022
const tonnageData = [{
    "year": "2014",
    "coastal": 1218,
    "overseas": 9090,
    "total": 10383
}, {
    "year": "2015",
    "coastal": 1502,
    "overseas": 9006,
    "total": 10309
}, {
    "year": "2016",
    "coastal": 1518,
    "overseas": 9907,
    "total": 11425
}, {
    "year": "2017",
    "coastal": 1469,
    "overseas": 10883,
    "total": 12352
}, {
    "year": "2018",
    "coastal": 1479,
    "overseas": 11204,
    "total": 12683
}, {
    "year": "2019",
    "coastal": 1480,
    "overseas": 11266,
    "total": 12746
}, {
    "year": "2020",
    "coastal": 1673,
    "overseas": 11338,
    "total": 13011
}, {
    "year": "2021",
    "coastal": 1560,
    "overseas": 11435,
    "total": 12995
}, {
    "year": "2022",
    "coastal": 1578,
    "overseas": 12113,
    "total": 13691
}];
const tonnageSeries = [
    { field: "coastal", name: "Coastal", color: "#4CAF50", tooltipLocation: "vertical" },
    { field: "overseas", name: "Overseas", color: "#FFEB3B", tooltipLocation: "horizontal" },
    { field: "total", name: "Total", color: "#2196F3", tooltipLocation: "down" }
];
const tonnageColumns = [
    { data: "coastal"}
]
drawColumnChart("tonnageChart", tonnageData, tonnageSeries, "'000 GT");
drawTable("tonnageTable", tonnageData, tonnageSeries, "Growth of Indian Tonnage during 2014-2022");

// Growth of Indian Fleet by Size of Vessels during 2014-2022
const fleetSizeData = [{
    "year": "2014",
    "Below 999": 612,
    "1000-4999": 317,
    "5000-9999": 51,
    "10000-19999": 34,
    "20000-34999":0,
    "35000-49999": 84,
    "50000 & Above": 56,
},

{
    "year": "2015",
    "Below 999": 623,
    "1000-4999": 338,
    "5000-9999": 55,
    "10000-19999": 37,
    "20000-34999":0,
    "35000-49999": 90,
    "50000 & Above": 54,
},

{
    "year": "2016",
    "Below 999": 638,
    "1000-4999": 358,
    "5000-9999": 58,
    "10000-19999": 38,
    "20000-34999": 94,
    "35000-49999":0,
    "50000 & Above": 59,
},

{
    "year": "2017",
    "Below 999": 668,
    "1000-4999": 378,
    "5000-9999": 59,
    "10000-19999": 40,
    "20000-34999": 103,
    "35000-49999":0,
    "50000 & Above": 63,
},

{
    "year": "2018",
    "Below 999": 681,
    "1000-4999": 376,
    "5000-9999": 69,
    "10000-19999": 40,
    "20000-34999": 104,
    "35000-49999":0,
    "50000 & Above": 61,
},

{
    "year": "2019",
    "Below 999": 703,
    "1000-4999": 382,
    "5000-9999": 67,
    "10000-19999": 39,
    "20000-34999": 110,
    "35000-49999":0,
    "50000 & Above": 61,
},

{
    "year": "2020",
    "Below 999": 717,
    "1000-4999": 393,
    "5000-9999": 73,
    "10000-19999": 38,
    "20000-34999": 111,
    "35000-49999":0,
    "50000 & Above": 62,
},

{
    "year": "2021",
    "Below 999": 733,
    "1000-4999": 399,
    "5000-9999": 0,
    "10000-19999": 38,
    "20000-34999": 113,
    "35000-49999": 75,
    "50000 & Above": 58,
},

{
    "year": "2022",
    "Below 999": 748,
    "1000-4999": 398,
    "5000-9999": 76,
    "10000-19999": 39,
    "20000-34999": 116,
    "35000-49999":0,
    "50000 & Above": 59,
}];
const fleetSizeSeries = [
    { field: "Below 999", name: "Below 999", color: "#e60049", tooltipLocation: "vertical" },
    { field: "1000-4999", name: "1000-4999", color: "#0bb4ff", tooltipLocation: "up" },
    { field: "5000-9999", name: "5000-9999", color: "#50e991", tooltipLocation: "down" },
	{ field: "10000-19999", name: "10000-19999", color: "#e6d800", tooltipLocation: "left" },
    { field: "20000-34999", name: "20000-34999", color: "#9b19f5", tooltipLocation: "right" },
    { field: "35000-49999", name: "35000-49999", color: "#ffa300", tooltipLocation: "up" },
	{ field: "50000 & Above", name: "50000 & Above", color: "#dc0ab4", tooltipLocation: "down" },
];
drawColumnChart("fleetSizeChart", fleetSizeData, fleetSizeSeries, "No. of vessels");
drawTable("fleetSizeTable", fleetSizeData, fleetSizeSeries, "Growth of Indian Fleet by Size of Vessels during 2014-2022");


// ------------------------------------------------ Port statistics --------------------------------------------------
// Major Ports - Capacity and Traffic (Million Tonnes)
const capacityTrafficData = [
    { year: "2014-15", majorPortsTraffic: 581.3, majorPortsCapacity: 871.5, nonMajorPortsTraffic: 470.9, nonMajorPortsCapacity: 689.0 },
    { year: "2015-16", majorPortsTraffic: 605.9, majorPortsCapacity: 965.4, nonMajorPortsTraffic: 465.9, nonMajorPortsCapacity: 737.8 },
    { year: "2016-17", majorPortsTraffic: 648.5, majorPortsCapacity: 1065.8, nonMajorPortsTraffic: 485.3, nonMajorPortsCapacity: 788.6 },
    { year: "2017-18", majorPortsTraffic: 679.5, majorPortsCapacity: 1451.8, nonMajorPortsTraffic: 529.1, nonMajorPortsCapacity: 856.2 },
    { year: "2018-19", majorPortsTraffic: 699.2, majorPortsCapacity: 1514.1, nonMajorPortsTraffic: 582.6, nonMajorPortsCapacity: 910.3 },
    { year: "2019-20", majorPortsTraffic: 704.9, majorPortsCapacity: 1534.9, nonMajorPortsTraffic: 615.1, nonMajorPortsCapacity: 988.0 },
    { year: "2020-21", majorPortsTraffic: 672.7, majorPortsCapacity: 1560.6, nonMajorPortsTraffic: 577.3, nonMajorPortsCapacity: 994.2 },
    { year: "2021-22", majorPortsTraffic: 720.1, majorPortsCapacity: 1597.59, nonMajorPortsTraffic: 603.8, nonMajorPortsCapacity: 1007.4 },
    { year: "2022-23(P)", majorPortsTraffic: 784.3, majorPortsCapacity: 1597.59, nonMajorPortsTraffic: 651.0, nonMajorPortsCapacity: 1009.6 }
];
const capacityTrafficSeries = [
    { field: "majorPortsTraffic", name: "Major Ports Traffic", color: "#FF5733", bulletShape: "circle" },
    { field: "majorPortsCapacity", name: "Major Ports Capacity", color: "#33FF57", bulletShape: "square" },
    { field: "nonMajorPortsTraffic", name: "Non-Major Ports Traffic", color: "#3377FF", bulletShape: "triangle" },
    { field: "nonMajorPortsCapacity", name: "Non-Major Ports Capacity", color: "#FF3377", bulletShape: "x" }
];
drawLineChart("capacityTrafficChart", capacityTrafficData, capacityTrafficSeries, "Million Tonnes");
drawTable("capacityTrafficTable", capacityTrafficData, capacityTrafficSeries, "Major Ports - Capacity and Traffic (Million Tonnes)");

// Major Ports & Non -Major Ports - Cargo Traffic (Share %)
const cargoTrafficData = [
    { year: "2014-15", majorPortsShare: 44.8, nonMajorPortsShare: 55.2 },
    { year: "2015-16", majorPortsShare: 43.5, nonMajorPortsShare: 56.5 },
    { year: "2016-17", majorPortsShare: 42.8, nonMajorPortsShare: 57.2 },
    { year: "2017-18", majorPortsShare: 43.8, nonMajorPortsShare: 56.2 },
    { year: "2018-19", majorPortsShare: 43.5, nonMajorPortsShare: 54.5 },
    { year: "2019-20", majorPortsShare: 46.6, nonMajorPortsShare: 53.4 },
    { year: "2020-21", majorPortsShare: 46.2, nonMajorPortsShare: 53.8 },
    { year: "2021-22", majorPortsShare: 45.6, nonMajorPortsShare: 54.4 },
    { year: "2022-23", majorPortsShare: 45.4, nonMajorPortsShare: 54.6 }
];
const cargoTrafficSeries = [
    { field: "majorPortsShare", name: "Major Ports Share", color: "#FF5733", bulletShape: "triangle" },
    { field: "nonMajorPortsShare", name: "Non-Major Ports Share", color: "#3377FF", bulletShape: "square" }
];
drawLineChart("cargoTrafficChart", cargoTrafficData, cargoTrafficSeries, "Share Percentage");
drawTable("cargoTrafficTable", cargoTrafficData, cargoTrafficSeries, "Major Ports & Non -Major Ports - Cargo Traffic (Share %)");

// Overseas and Coastal Traffic ( Million Tonnes)
const trafficData = [
    { year: "2014-15", majorPortsShare: 92.70, nonMajorPortsShare: 879.56 },
    { year: "2015-16", majorPortsShare: 96, nonMajorPortsShare: 892.56 },
    { year: "2016-17", majorPortsShare: 106.62, nonMajorPortsShare: 932.57 },
    { year: "2017-18", majorPortsShare: 122.76, nonMajorPortsShare: 975.54 },
    { year: "2018-19", majorPortsShare: 137.02, nonMajorPortsShare: 1019.10 },
    { year: "2019-20", majorPortsShare: 131.82, nonMajorPortsShare: 1066.24 },
    { year: "2020-21", majorPortsShare: 118.23, nonMajorPortsShare: 1021.88 },
    { year: "2021-22", majorPortsShare: 135.42, nonMajorPortsShare: 1060.13 },
    { year: "2022-23", majorPortsShare: 157.99, nonMajorPortsShare: 1127.08 }
];
const trafficSeries = [
    { field: "majorPortsShare", name: "Overseas", color: "#FF5733", bulletShape: "triangle" },
    { field: "nonMajorPortsShare", name: "Coastal", color: "#3377FF", bulletShape: "square" }
];
drawLineChart("trafficChart", trafficData, trafficSeries, "Million Tonnes");
drawTable("trafficTable", trafficData, trafficSeries, "Overseas and Coastal Traffic ( Million Tonnes)");

// Average Turn Round Time (All Vessels)
const turnAroundData = [
    { year: "2014-15", majorPortsShare: 93.36 },
    { year: "2015-16", majorPortsShare: 84.24 },
    { year: "2016-17", majorPortsShare: 83.52 },
    { year: "2017-18", majorPortsShare: 69.84 },
    { year: "2018-19", majorPortsShare: 65.52 },
    { year: "2019-20", majorPortsShare: 50.88 },
    { year: "2020-21", majorPortsShare: 52.32 },
    { year: "2021-22", majorPortsShare: 53.34 },
    { year: "2022-23", majorPortsShare: 51.45 }
];
const turnAroundSeries = [
    { field: "majorPortsShare", name: "Average Turn Round Time (All Vessels)", color: "#FF5733", bulletShape: "triangle" }
];
drawLineChart("turnAroundChart", turnAroundData, turnAroundSeries, "Hours");
drawTable("turnAroundTable", turnAroundData, turnAroundSeries, "Average Turn Round Time (All Vessels)");

// Major Ports- Turn Around Time Container Vessels (Hours)
const turnAroundContainerData = [
    { year: "2014-15", majorPortsShare: 54.5 },
    { year: "2015-16", majorPortsShare: 42.5 },
    { year: "2016-17", majorPortsShare: 43.0 },
    { year: "2017-18", majorPortsShare: 42.2 },
    { year: "2018-19", majorPortsShare: 38.6 },
    { year: "2019-20", majorPortsShare: 33.4 },
    { year: "2020-21", majorPortsShare: 31.2 },
    { year: "2021-22", majorPortsShare: 34.9 },
    { year: "2022-23", majorPortsShare: 31.2 }
];
const turnAroundContainerSeries = [
    { field: "majorPortsShare", name: "Turn Around Time (Container Vessels)", color: "#FF5733", bulletShape: "triangle" }
];
drawColumnChart("turnAroundContainerChart", turnAroundContainerData, turnAroundContainerSeries, "Hours");
drawTable("turnAroundContainerTable", turnAroundContainerData, turnAroundContainerSeries, "Major Ports- Turn Around Time Container Vessels (Hours)");


// ------------------------------------------------ Ship Building & Repairing statistics --------------------------------------------------
// No. of Ships on Order and Ships Delivered during 2014-15 to 2021-22
const shipOrdersData = [{
    "year": "2014-15",
    "coastal": 298,
    "overseas": 39,
    "total": 10383
}, {
    "year": "2015-16",
    "coastal": 296,
    "overseas": 55,
    "total": 10309
}, {
    "year": "2016-17",
    "coastal": 248,
    "overseas": 36,
    "total": 11425
}, {
    "year": "2017-18",
    "coastal": 231,
    "overseas": 64,
    "total": 12352
}, {
    "year": "2018-19",
    "coastal": 188,
    "overseas": 41,
    "total": 12683
}, {
    "year": "2019-20",
    "coastal": 249,
    "overseas": 78,
    "total": 12746
}, {
    "year": "2020-21",
    "coastal": 280,
    "overseas": 69,
    "total": 13011
}, {
    "year": "2021-22",
    "coastal": 338,
    "overseas": 113,
    "total": 12995
}];
const shipOrdersSeries = [
    { field: "coastal", name: "Ships on Order Book", color: "#4CAF50", tooltipLocation: "vertical" },
    { field: "overseas", name: "Ships Delivered", color: "#FFEB3B", tooltipLocation: "horizontal" }
];
drawColumnChart("shipOrdersChart", shipOrdersData, shipOrdersSeries, "No. of vessels");
drawTable("shipOrdersTable", shipOrdersData, shipOrdersSeries, "No. of Ships on Order and Ships Delivered during 2014-15 to 2021-22");

// Ship Building Order Book by type of Vessels
const shipBookData = [{
    "year": "2014-15",
    "coastal": 10,
    "overseas": 25,
    "total": 40
}, {
    "year": "2015-16",
    "coastal": 11,
    "overseas": 31,
    "total": 40
}, {
    "year": "2016-17",
    "coastal": 15,
    "overseas": 25,
    "total": 25
}, {
    "year": "2017-18",
    "coastal": 18,
    "overseas": 19,
    "total": 28
}, {
    "year": "2018-19",
    "coastal": 22,
    "overseas": 20,
    "total": 20
}, {
    "year": "2018-19",
    "coastal": 22,
    "overseas": 20,
    "total": 20
}, {
    "year": "2018-19",
    "coastal": 22,
    "overseas": 20,
    "total": 20
}, {
    "year": "2021-22",
    "coastal": 10,
    "overseas": 15,
    "total": 25
}];
const shipBookSeries = [
    { field: "coastal", name: "Tankers", color: "#4CAF50", tooltipLocation: "vertical" },
    { field: "overseas", name: "Dry Cargo", color: "#FFEB3B", tooltipLocation: "horizontal" },
    { field: "total", name: "Bulk Cargo", color: "#2196F3", tooltipLocation: "down" }
];
drawColumnChart("shipBookChart", shipBookData, shipBookSeries, "No. of vessels");
drawTable("shipBookTable", shipBookData, shipBookSeries, "Ship Building Order Book by type of Vessels");


// ------------------------------------------------ Inland Waterways Transport Statistics --------------------------------------------------
// Movement of cargo (in Million Tonnes) on National Waterways
const inlandWaterwaysData = [
    { year: "2014-15", majorPortsShare: 29.16 },
    { year: "2015-16", majorPortsShare: 41.53 },
    { year: "2016-17", majorPortsShare: 55.47 },
    { year: "2017-18", majorPortsShare: 55.03 },
    { year: "2018-19", majorPortsShare: 72.30 },
    { year: "2019-20", majorPortsShare: 73.64 },
    { year: "2020-21", majorPortsShare: 83.61 },
    { year: "2021-22", majorPortsShare: 108.79 }
];
const inlandWaterwaysSeries = [
    { field: "majorPortsShare", name: "Movement of cargo (in Million Tonnes) on National Waterways", color: "#FF5733", bulletShape: "triangle" }
];
drawLineChart("inlandWaterwaysChart", inlandWaterwaysData, inlandWaterwaysSeries, "Cargo (in Million Tonnes)");
drawTable("inlandWaterwaysTable", inlandWaterwaysData, inlandWaterwaysSeries, "Movement of cargo (in Million Tonnes ) on National Waterways");
