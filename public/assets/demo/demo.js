var map;
var myLatLng;
$("#locationbtn").click(function() {
    console.log("clicked");
    $("#click").css('display', 'none');
    geoLocationInit();
});
    function geoLocationInit() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(success, fail);
        } else {
            alert("Browser not supported");
        }
    }

    function success(position) {
        console.log(position);
        var latval = position.coords.latitude;
        var lngval = position.coords.longitude;
        demo.initGoogleMaps(latval,lngval);
        //myLatLng = new google.maps.LatLng(latval, lngval);
        //createMap(myLatLng);
        // nearbySearch(myLatLng, "school");
        //searchGirls(latval,lngval);
    }

    function fail() {
        alert("it fails");
    }
    ////////////////////////////////////////////////////////////////////

demo = {
    initPickColor: function() {
        $('.pick-class-label').click(function() {
            var new_class = $(this).attr('new-class');
            var old_class = $('#display-buttons').attr('data-class');
            var display_div = $('#display-buttons');
            if (display_div.length) {
                var display_buttons = display_div.find('.btn');
                display_buttons.removeClass(old_class);
                display_buttons.addClass(new_class);
                display_div.attr('data-class', new_class);
            }
        });
    },
    // checkFullPageBackgroundImage: function() {
    //     $page = $('.full-page');
    //     image_src = $page.data('image');

    //     if (image_src !== undefined) {
    //         image_container = '<div class="full-page-background" style="background-image: url(' + image_src + ') "/>';
    //         $page.append(image_container);
    //     }
    // },
    // checkFullPageBackgroundImage: function() {
    //     $page = $('.full-page');
    //     image_src = $page.data('image');

    //     if (image_src !== undefined) {
    //         image_container = '<div class="full-page-background" style="background-image: url(' + image_src + ') "/>';
    //         $page.append(image_container);
    //     }
    // },

    initDocChart: function() {
        chartColor = "#FFFFFF";

        // General configuration for the charts with Line gradientStroke
        gradientChartOptionsConfiguration = {
            maintainAspectRatio: false,
            legend: {
                display: false
            },
            tooltips: {
                bodySpacing: 4,
                mode: "nearest",
                intersect: 0,
                position: "nearest",
                xPadding: 10,
                yPadding: 10,
                caretPadding: 10
            },
            responsive: true,
            scales: {
                yAxes: [{
                    display: 0,
                    gridLines: 0,
                    ticks: {
                        display: false
                    },
                    gridLines: {
                        zeroLineColor: "transparent",
                        drawTicks: false,
                        display: false,
                        drawBorder: false
                    }
                }],
                xAxes: [{
                    display: 0,
                    gridLines: 0,
                    ticks: {
                        display: false
                    },
                    gridLines: {
                        zeroLineColor: "transparent",
                        drawTicks: false,
                        display: false,
                        drawBorder: false
                    }
                }]
            },
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 15,
                    bottom: 15
                }
            }
        };

        ctx = document.getElementById('lineChartExample').getContext("2d");
        gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
        gradientStroke.addColorStop(0, '#80b6f4');
        gradientStroke.addColorStop(1, chartColor);

        gradientFill = ctx.createLinearGradient(0, 170, 0, 50);
        gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
        gradientFill.addColorStop(1, "rgba(249, 99, 59, 0.40)");

        myChart = new Chart(ctx, {
            type: 'line',
            responsive: true,
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                // labels: states,

                datasets: [{
                    label: "Active Users",
                    borderColor: "#f96332",
                    pointBorderColor: "#FFF",
                    pointBackgroundColor: "#f96332",
                    pointBorderWidth: 2,
                    pointHoverRadius: 4,
                    pointHoverBorderWidth: 1,
                    pointRadius: 4,
                    fill: true,
                    backgroundColor: gradientFill,
                    borderWidth: 2,
                    data: [542, 480, 430, 550, 530, 453, 380, 434, 568, 610, 700, 630]
                }]
            },
            options: gradientChartOptionsConfiguration
        });
    },

    initDashboardPageCharts: function(states,plasma,oxygen) {
        // alert(typeof(states));
        chartColor = "#FFFFFF";

        // General configuration for the charts with Line gradientStroke
        gradientChartOptionsConfiguration = {
            maintainAspectRatio: false,
            legend: {
                display: false
            },
            tooltips: {
                bodySpacing: 4,
                mode: "nearest",
                intersect: 0,
                position: "nearest",
                xPadding: 10,
                yPadding: 10,
                caretPadding: 10
            },
            responsive: 1,
            scales: {
                yAxes: [{
                    display: 0,
                    gridLines: 0,
                    ticks: {
                        display: false
                    },
                    gridLines: {
                        zeroLineColor: "transparent",
                        drawTicks: false,
                        display: false,
                        drawBorder: false
                    }
                }],
                xAxes: [{
                    display: 0,
                    gridLines: 0,
                    ticks: {
                        display: false
                    },
                    gridLines: {
                        zeroLineColor: "transparent",
                        drawTicks: false,
                        display: false,
                        drawBorder: false
                    }
                }]
            },
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 15,
                    bottom: 15
                }
            }
        };

        gradientChartOptionsConfigurationWithNumbersAndGrid = {
            maintainAspectRatio: false,
            legend: {
                display: false
            },
            tooltips: {
                bodySpacing: 4,
                mode: "nearest",
                intersect: 0,
                position: "nearest",
                xPadding: 10,
                yPadding: 10,
                caretPadding: 10
            },
            responsive: true,
            scales: {
                yAxes: [{
                    gridLines: 0,
                    gridLines: {
                        zeroLineColor: "transparent",
                        drawBorder: false
                    }
                }],
                xAxes: [{
                    display: 0,
                    gridLines: 0,
                    ticks: {
                        display: false
                    },
                    gridLines: {
                        zeroLineColor: "transparent",
                        drawTicks: false,
                        display: false,
                        drawBorder: false
                    }
                }]
            },
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 15,
                    bottom: 15
                }
            }
        };

        var ctx = document.getElementById('bigDashboardChart').getContext("2d"); //the one at the top

        var gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
        gradientStroke.addColorStop(0, '#80b6f4');
        gradientStroke.addColorStop(1, chartColor);

        var gradientFill = ctx.createLinearGradient(0, 200, 0, 50);
        gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
        gradientFill.addColorStop(1, "rgba(255, 255, 255, 0.24)");

        var dataFirst={
            label: "Plasma",
            borderColor: chartColor,
            pointBorderColor: chartColor,
            pointBackgroundColor: "gray",
            pointHoverBackgroundColor: "#1e3d60",
            pointHoverBorderColor: chartColor,
            pointBorderWidth: 1,
            pointHoverRadius: 7,
            pointHoverBorderWidth: 2,
            pointRadius: 5,
            fill: true,
            backgroundColor: gradientFill,
            borderWidth: 2,
            // data: [50, 150, 100, 190, 130, 90, 150, 160, 120, 140, 190, 95]
            data:plasma
        };
        var dataSecond={
            label: "Oxygen Cylinder",
            borderColor: chartColor,
            pointBorderColor: chartColor,
            pointBackgroundColor: "yellow",
            pointHoverBackgroundColor: "black",
            pointHoverBorderColor: chartColor,
            pointBorderWidth: 1,
            pointHoverRadius: 7,
            pointHoverBorderWidth: 2,
            pointRadius: 5,
            fill: true,
            backgroundColor: gradientFill,
            borderWidth: 2,
            // data: [50, 150, 100, 190, 130, 90, 150, 160, 120, 140, 190, 95]
            data:oxygen
        };
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: states,
                datasets: [dataFirst, dataSecond]

            },
            options: {
                layout: {
                    padding: {
                        left: 20,
                        right: 20,
                        top: 0,
                        bottom: 0
                    }
                },
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: '#fff',
                    titleFontColor: '#333',
                    bodyFontColor: '#666',
                    bodySpacing: 4,
                    xPadding: 12,
                    mode: "nearest",
                    intersect: 0,
                    position: "nearest"
                },
                legend: {
                    position: "bottom",
                    fillStyle: "white",
                    display: true,
                    labels: {
                        boxWidth: 50,
                        fontColor: 'white',
                        fontStyle: 'italic'
                        
                      }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            fontColor: "rgba(255,255,255,0.4)",
                            fontStyle: "bold",
                            beginAtZero: true,
                            maxTicksLimit: 5,
                            padding: 10
                        },
                        gridLines: {
                            drawTicks: true,
                            drawBorder: false,
                            display: true,
                            color: "rgba(255,255,255,0.1)",
                            zeroLineColor: "transparent"
                        }

                    }],
                    xAxes: [{
                        gridLines: {
                            zeroLineColor: "transparent",
                            display: false,

                        },
                        ticks: {
                            //padding: 10,
                            fontColor: "rgba(255,255,255,0.4)",
                            fontStyle: "bold"
                        }
                    }]
                }
            }
        });


        

        var cardStatsMiniLineColor = "#fff",
            cardStatsMiniDotColor = "#fff";

        // ctx = document.getElementById('lineChartExample').getContext("2d");

        // gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
        // gradientStroke.addColorStop(0, '#80b6f4');
        // gradientStroke.addColorStop(1, chartColor);

        // gradientFill = ctx.createLinearGradient(0, 170, 0, 50);
        // gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
        // gradientFill.addColorStop(1, "rgba(249, 99, 59, 0.40)");

        // myChart = new Chart(ctx, {
        //     type: 'line',
        //     responsive: true,
        //     data: {
        //         labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        //         // labels: states,
        //         datasets: [{
        //             label: "Active Users",
        //             borderColor: "#f96332",
        //             pointBorderColor: "#FFF",
        //             pointBackgroundColor: "#f96332",
        //             pointBorderWidth: 2,
        //             pointHoverRadius: 4,
        //             pointHoverBorderWidth: 1,
        //             pointRadius: 4,
        //             fill: true,
        //             backgroundColor: gradientFill,
        //             borderWidth: 2,
        //             data: [542, 480, 430, 550, 530, 453, 380, 434, 568, 610, 700, 630]
        //             // data: oxygen
        //         }]
        //     },
        //     options: gradientChartOptionsConfiguration
        // });


        // ctx = document.getElementById('lineChartExampleWithNumbersAndGrid').getContext("2d");

        // gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
        // gradientStroke.addColorStop(0, '#18ce0f');
        // gradientStroke.addColorStop(1, chartColor);

        // gradientFill = ctx.createLinearGradient(0, 170, 0, 50);
        // gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
        // gradientFill.addColorStop(1, hexToRGB('#18ce0f', 0.4));

        // myChart = new Chart(ctx, {
        //     type: 'line',
        //     responsive: true,
        //     data: {
        //         labels: ["12pm,", "3pm", "6pm", "9pm", "12am", "3am", "6am", "9am"],
        //         datasets: [{
        //             label: "Email Stats",
        //             borderColor: "#18ce0f",
        //             pointBorderColor: "#FFF",
        //             pointBackgroundColor: "#18ce0f",
        //             pointBorderWidth: 2,
        //             pointHoverRadius: 4,
        //             pointHoverBorderWidth: 1,
        //             pointRadius: 4,
        //             fill: true,
        //             backgroundColor: gradientFill,
        //             borderWidth: 2,
        //             data: [40, 500, 650, 700, 1200, 1250, 1300, 1900]
        //         }]
        //     },
        //     options: gradientChartOptionsConfigurationWithNumbersAndGrid
        // });

        var e = document.getElementById("barChartSimpleGradientsNumbersPlasma").getContext("2d");
        gradientFill = ctx.createLinearGradient(0, 170, 0, 50);
        gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
        gradientFill.addColorStop(1, hexToRGB('#2CA8FF', 0.6));

        var a = {
            type: "bar",
            data: {
                // labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                labels: states,
                datasets: [{
                    label: "Plasma Donors",
                    backgroundColor: gradientFill,
                    borderColor: "#2CA8FF",
                    pointBorderColor: "#FFF",
                    pointBackgroundColor: "#2CA8FF",
                    pointBorderWidth: 2,
                    pointHoverRadius: 4,
                    pointHoverBorderWidth: 1,
                    pointRadius: 4,
                    fill: true,
                    borderWidth: 1,
                    data: plasma
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                tooltips: {
                    bodySpacing: 4,
                    mode: "nearest",
                    intersect: 0,
                    position: "nearest",
                    xPadding: 10,
                    yPadding: 10,
                    caretPadding: 10
                },
                responsive: 1,
                scales: {
                    yAxes: [{
                        gridLines: 0,
                        gridLines: {
                            zeroLineColor: "transparent",
                            drawBorder: false
                        }
                    }],
                    xAxes: [{
                        display: 0,
                        gridLines: 0,
                        ticks: {
                            display: false
                        },
                        gridLines: {
                            zeroLineColor: "transparent",
                            drawTicks: false,
                            display: false,
                            drawBorder: false
                        }
                    }]
                },
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 15,
                        bottom: 15
                    }
                }
            }
        };


        var ee = document.getElementById("barChartSimpleGradientsNumbersOxygen").getContext("2d");
        gradientFill = ctx.createLinearGradient(0, 170, 0, 50);
        gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
        gradientFill.addColorStop(1, hexToRGB('#f52075', 0.6));
        
        var aa = {
            type: "bar",
            data: {
                // labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                labels: states,
                datasets: [{
                    label: "Oxygen Cylinders",
                    backgroundColor: gradientFill,
                    borderColor: "#f52075",
                    pointBorderColor: "#FFF",
                    pointBackgroundColor: "#f52075",
                    pointBorderWidth: 2,
                    pointHoverRadius: 4,
                    pointHoverBorderWidth: 1,
                    pointRadius: 4,
                    fill: true,
                    borderWidth: 1,
                    data: oxygen
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                tooltips: {
                    bodySpacing: 4,
                    mode: "nearest",
                    intersect: 0,
                    position: "nearest",
                    xPadding: 10,
                    yPadding: 10,
                    caretPadding: 10
                },
                responsive: 1,
                scales: {
                    yAxes: [{
                        gridLines: 0,
                        gridLines: {
                            zeroLineColor: "transparent",
                            drawBorder: false
                        }
                    }],
                    xAxes: [{
                        display: 0,
                        gridLines: 0,
                        ticks: {
                            display: false
                        },
                        gridLines: {
                            zeroLineColor: "transparent",
                            drawTicks: false,
                            display: false,
                            drawBorder: false
                        }
                    }]
                },
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 15,
                        bottom: 15
                    }
                }
            }
        };

        var viewsChart = new Chart(e, a);
        var viewsChartt = new Chart(ee, aa);
    },

    initGoogleMaps: function() {
        lat = arguments[0];
        lon = arguments[1];
        console.log(arguments[0]);
        console.log(arguments[1]);

        // var map=new MapmyIndia.Map("map",{ center:[lat,lon] ,zoomControl: true,hybrid:true,search: false });
        // L.marker([lat, lon]).addTo(map);

        // var options={
        //     map:map,
        //     callback:callback_method
        // };

        // var picker= new MapmyIndia.placePicker(options);
        // function callback_method(data){
        //     console.log(data);
        //     alert(JSON.stringify(data));
        // } 
        // picker.remove();
        // picker.getLocation();
        // picker.setLocation({lat:28.8787,lng:77.787877});
        // showCircle();
        // function showCircle() 
        // { 
        //     lat = arguments[0];
        //     lon = arguments[1];
        //     radius = 500; 
        //     marker.setLatLng([lat, lon]);
        //     currentDiameter = L.circle([lat, lon],
        //     { 
        //         color: 'pink', 
        //         fillColor: '#FFC0CB',
        //         fillOpacity: 0.5,
        //         radius: radius 
        //     });

        //     currentDiameter.addTo(map); 
        //     map.fitBounds(currentDiameter.getBounds()); 
        // }
        // var mymap = L.map('mapid').setView([arguments[0], arguments[1]], 13);
        // L.tileLayer("https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=asOpGsjo0knWkvef61D7",{
        //     attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>'
        // }).addTo(mymap);
        // var marker = L.marker([arguments[0],arguments[1]]).addTo(mymap);
        // var myLatlng = new google.maps.LatLng(arguments[0], arguments[1]);
        // var mapOptions = {
        //     zoom: 13,
        //     center: myLatlng,
        //     scrollwheel: false, //we disable de scroll over the map, it is a really annoing when you scroll through page
        //     styles: [{
        //         "featureType": "water",
        //         "elementType": "geometry",
        //         "stylers": [{
        //             "color": "#e9e9e9"
        //         }, {
        //             "lightness": 17
        //         }]
        //     }, {
        //         "featureType": "landscape",
        //         "elementType": "geometry",
        //         "stylers": [{
        //             "color": "#f5f5f5"
        //         }, {
        //             "lightness": 20
        //         }]
        //     }, {
        //         "featureType": "road.highway",
        //         "elementType": "geometry.fill",
        //         "stylers": [{
        //             "color": "#ffffff"
        //         }, {
        //             "lightness": 17
        //         }]
        //     }, {
        //         "featureType": "road.highway",
        //         "elementType": "geometry.stroke",
        //         "stylers": [{
        //             "color": "#ffffff"
        //         }, {
        //             "lightness": 29
        //         }, {
        //             "weight": 0.2
        //         }]
        //     }, {
        //         "featureType": "road.arterial",
        //         "elementType": "geometry",
        //         "stylers": [{
        //             "color": "#ffffff"
        //         }, {
        //             "lightness": 18
        //         }]
        //     }, {
        //         "featureType": "road.local",
        //         "elementType": "geometry",
        //         "stylers": [{
        //             "color": "#ffffff"
        //         }, {
        //             "lightness": 16
        //         }]
        //     }, {
        //         "featureType": "poi",
        //         "elementType": "geometry",
        //         "stylers": [{
        //             "color": "#f5f5f5"
        //         }, {
        //             "lightness": 21
        //         }]
        //     }, {
        //         "featureType": "poi.park",
        //         "elementType": "geometry",
        //         "stylers": [{
        //             "color": "#dedede"
        //         }, {
        //             "lightness": 21
        //         }]
        //     }, {
        //         "elementType": "labels.text.stroke",
        //         "stylers": [{
        //             "visibility": "on"
        //         }, {
        //             "color": "#ffffff"
        //         }, {
        //             "lightness": 16
        //         }]
        //     }, {
        //         "elementType": "labels.text.fill",
        //         "stylers": [{
        //             "saturation": 36
        //         }, {
        //             "color": "#333333"
        //         }, {
        //             "lightness": 40
        //         }]
        //     }, {
        //         "elementType": "labels.icon",
        //         "stylers": [{
        //             "visibility": "off"
        //         }]
        //     }, {
        //         "featureType": "transit",
        //         "elementType": "geometry",
        //         "stylers": [{
        //             "color": "#f2f2f2"
        //         }, {
        //             "lightness": 19
        //         }]
        //     }, {
        //         "featureType": "administrative",
        //         "elementType": "geometry.fill",
        //         "stylers": [{
        //             "color": "#fefefe"
        //         }, {
        //             "lightness": 20
        //         }]
        //     }, {
        //         "featureType": "administrative",
        //         "elementType": "geometry.stroke",
        //         "stylers": [{
        //             "color": "#fefefe"
        //         }, {
        //             "lightness": 17
        //         }, {
        //             "weight": 1.2
        //         }]
        //     }]
        // };
        // var map = new google.maps.Map(document.getElementById("map"), mapOptions);

        // var marker = new google.maps.Marker({
        //     position: myLatlng,
        //     title: "Hello World!"
        // });

        // To add the marker to the map, call setMap();
        // marker.setMap(map);


        //{"access_token":"4ec5f1b2-a5aa-4a8c-be9f-4ebea8e17e25","token_type":"bearer","expires_in":86399,"scope":"READ","project_code":"prj1631969808i208337669","client_id":"33OkryzDZsJ4V6OYUuJ6H3gTC5qITysilw9QMB-dg7yIed4hMlVBjl3ZKcl-Myl9XKAZQHmlZQdPrwqw16Ya4g=="}
      //  [{"key":"grant_type","value":"client_credentials","description":""},{"key":"client_id","value":"33OkryzDZsJ4V6OYUuJ6H3gTC5qITysilw9QMB-dg7yIed4hMlVBjl3ZKcl-Myl9XKAZQHmlZQdPrwqw16Ya4g==","description":""},{"key":"client_secret","value":"lrFxI-iSEg9BQqBPvPkF4Th9SJon38XTFKpx6rFMhsaw690pMCvr_kLXnSgdnWyEmp7-Zla70JaCyWUbr3R9tycL8vTbU8kI","description":""}]
    }
};