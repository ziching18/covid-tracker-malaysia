<!DOCTYPE html>
<html>
    <head>
        <?php include 'data.php';?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>COVID in Malaysia</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="index.css"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&family=Inter">
        <style>
            
        </style>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script>
            // global array containing all information to be displayed
            var states = new Array();
            states = [
                ['Johor',<?php echo end($cases[0]); ?>,<?php echo $state_total_cases[0]; ?>,<?php echo end($deaths[0]); ?>,<?php echo $state_total_deaths[0]; ?>],
                ['Kedah',<?php echo end($cases[1]); ?>,<?php echo $state_total_cases[1]; ?>,<?php echo end($deaths[1]); ?>,<?php echo $state_total_deaths[1]; ?>],
                ['Kelantan',<?php echo end($cases[2]); ?>,<?php echo $state_total_cases[2]; ?>,<?php echo end($deaths[2]); ?>,<?php echo $state_total_deaths[2]; ?>],
                ['Melaka',<?php echo end($cases[3]); ?>,<?php echo $state_total_cases[3]; ?>,<?php echo end($deaths[3]); ?>,<?php echo $state_total_deaths[3]; ?>],
                ['Negeri Sembilan',<?php echo end($cases[4]); ?>,<?php echo $state_total_cases[4]; ?>,<?php echo end($deaths[4]); ?>,<?php echo $state_total_deaths[4]; ?>],
                ['Pahang',<?php echo end($cases[5]); ?>,<?php echo $state_total_cases[5]; ?>,<?php echo end($deaths[5]); ?>,<?php echo $state_total_deaths[5]; ?>],
                ['Perak',<?php echo end($cases[6]); ?>,<?php echo $state_total_cases[6]; ?>,<?php echo end($deaths[6]); ?>,<?php echo $state_total_deaths[6]; ?>],
                ['Perlis',<?php echo end($cases[7]); ?>,<?php echo $state_total_cases[7]; ?>,<?php echo end($deaths[7]); ?>,<?php echo $state_total_deaths[7]; ?>],
                ['Penang',<?php echo end($cases[8]); ?>,<?php echo $state_total_cases[8]; ?>,<?php echo end($deaths[8]); ?>,<?php echo $state_total_deaths[8]; ?>],
                ['Sabah',<?php echo end($cases[9]); ?>,<?php echo $state_total_cases[9]; ?>,<?php echo end($deaths[9]); ?>,<?php echo $state_total_deaths[9]; ?>],
                ['Sarawak',<?php echo end($cases[10]); ?>,<?php echo $state_total_cases[10]; ?>,<?php echo end($deaths[10]); ?>,<?php echo $state_total_deaths[10]; ?>],
                ['Selangor',<?php echo end($cases[11]); ?>,<?php echo $state_total_cases[11]; ?>,<?php echo end($deaths[11]); ?>,<?php echo $state_total_deaths[11]; ?>],
                ['Terengganu',<?php echo end($cases[12]); ?>,<?php echo $state_total_cases[12]; ?>,<?php echo end($deaths[12]); ?>,<?php echo $state_total_deaths[12]; ?>],
                ['W.P. Kuala Lumpur',<?php echo end($cases[13]); ?>,<?php echo $state_total_cases[13]; ?>,<?php echo end($deaths[13]); ?>,<?php echo $state_total_deaths[13]; ?>],
                ['W.P. Labuan',<?php echo end($cases[14]); ?>,<?php echo $state_total_cases[14]; ?>,<?php echo end($deaths[14]); ?>,<?php echo $state_total_deaths[14]; ?>],
                ['W.P. Putrajaya',<?php echo end($cases[15]); ?>,<?php echo $state_total_cases[15]; ?>,<?php echo end($deaths[15]); ?>,<?php echo $state_total_deaths[15]; ?>] 
            ]
            
            // function to display the current date
            function displayDate() {
                const d = new Date();
                const formattedDate = d.toLocaleString("en-GB", {
                    day:"numeric",
                    month:"short",
                    year:"numeric",
                    hour:"numeric",
                    minute:"2-digit",
                    second:"2-digit",
                    hour12:false,
                    timeZoneName:"short"
                    //timeZone:""
                });
                document.getElementById("date").innerHTML = formattedDate;
            }

            // function to draw and display the map of Malaysia
            function drawMap() {
                google.charts.load('current', {
                'packages':['geochart'],
                });
                google.charts.setOnLoadCallback(drawRegionsMap);

                function drawRegionsMap() {
                    var data = google.visualization.arrayToDataTable([
                    ['State', 'Data'],
                    [{v:'MY-01', f:' Johor'}, parseInt(states[0][1])],
                    [{v:'MY-02', f:' Kedah'}, parseInt(states[1][1])],
                    [{v:'MY-03', f:' Kelantan'}, parseInt(states[2][1])],
                    [{v:'MY-04', f:' Melaka'}, parseInt(states[3][1])],
                    [{v:'MY-05', f:' Negeri Sembilan'}, parseInt(states[4][1])],
                    [{v:'MY-06', f:' Pahang'}, parseInt(states[5][1])],
                    [{v:'MY-08', f:' Perak'}, parseInt(states[6][1])],
                    [{v:'MY-09', f:' Perlis'}, parseInt(states[7][1])],
                    [{v:'MY-07', f:' Penang'}, parseInt(states[8][1])],
                    [{v:'MY-12', f:' Sabah'}, parseInt(states[9][1])],
                    [{v:'MY-13', f:' Sarawak'}, parseInt(states[10][1])],
                    [{v:'MY-10', f:' Selangor'}, parseInt(states[11][1])],
                    [{v:'MY-11', f:' Terengganu'}, parseInt(states[12][1])],
                    [{v:'MY-14', f:' Wilayah Persekutuan Kuala Lumpur'}, parseInt(states[13][1])],
                    [{v:'MY-15', f:' Wilayah Persekutuan Labuan'}, parseInt(states[14][1])],
                    [{v:'MY-16', f:' Wilayah Persekutuan Putrajaya'}, parseInt(states[15][1])]
                    ]); // data to insert the value of each state (new cases)

                    var options = {
                        region:'MY', // only displays Malaysia
                        defaultColor:'#d1cce0',
                        datalessRegionColor:'#ededed',
                        backgroundColor:'#ededed',
                        resolution:'provinces',
                        /*colorAxis: {colors: ['#ffd1d1','#d1ffe3', '#d8d1ff']}*/
                        /*colorAxis: {colors: ['#ea4f5e','#f6c248','#40e7b8','#4f73f4','#d965f9']},*/
                        colorAxis: {colors: ['#0000ff','#00ff00', '#5eff00', '#d4ff00', '#ffa200', '#ff0000']},
                        /*legend:'none',*/
                        magnifyingGlass: {enable: true, zoomFactor:5.0},
                        /*tooltip: {trigger:'none'}*/
                    };

                    var chart_div = document.getElementById('regions_div');
                    var chart = new google.visualization.GeoChart(chart_div); 

                    // function to get map selection
                    function myClickHandler() {
                        var selection = chart.getSelection();
                        console.log(selection)
                        
                        // get selection index
                        var state = '';
                        for (var i = 0; i < selection.length; i++) {
                            var item = selection[i];
                            if (item.row != null) {
                                state += states[item.row][0];
                            }
                            if (item.row != null) {
                                var r = item.row;
                                break;
                            }
                        } 
                        var ncase = states[r][1];
                        var tcase = states[r][2];
                        var ndeath = states[r][3];
                        var tdeath = states[r][4];
                    
                        if (state == '') {
                            alert("Please try again later!");
                        }
                        else { // write values in HTML 
                            document.getElementById("text").innerHTML = state;
                            document.getElementById("new-case").innerHTML = ncase;
                            document.getElementById("total-case").innerHTML = tcase;
                            document.getElementById("new-death").innerHTML = ndeath;
                            document.getElementById("total-death").innerHTML = tdeath;
                        }
                        
                    }
                    google.visualization.events.addListener(chart, 'select', myClickHandler); // add map selection listener to map

                    chart.draw(data, options); // draw map
                }
            }

            // function to select state, for the buttons
            function selectState(click_id) {
                var state = states[click_id][0];
                var ncase = states[click_id][1];
                var tcase = states[click_id][2];
                var ndeath = states[click_id][3];
                var tdeath = states[click_id][4];
                document.getElementById("text").innerHTML = state;
                document.getElementById("new-case").innerHTML = ncase;
                document.getElementById("total-case").innerHTML = tcase;
                document.getElementById("new-death").innerHTML = ndeath;
                document.getElementById("total-death").innerHTML = tdeath;
            }

            // function to display accummulative national totals
            function displayTotal() {
                var totcase = <?php echo $totals[0]; ?>;
                var totdeath = <?php echo $totals[1]; ?>;
                var totvax = <?php echo $totals[2]; ?>;
                document.getElementById("tot-case").innerHTML = totcase;
                document.getElementById("tot-death").innerHTML = totdeath;
                document.getElementById("tot-vax").innerHTML = totvax;
            }

            // function to call necessary functions once the body loads
            function thisJS() {
                displayDate();
                drawMap();
                displayTotal();
            }
        </script>
    </head>
    <body onload="thisJS()">
        <div class="header">
            <p>
                <a href="index.php" id="title"><b>COVID in Malaysia</b></a>
                <img src="Flag_of_Malaysia.svg" height="20px" style="border-radius:5px; padding-right:50px;">
                <a class="nav" href="about.html">About</a>
                <a id="date"></a>
            </p>
        </div>
        <div class="map">
            <table style="width:100%; height:100%;">
                <tr>
                    <td style="width:70%; border-radius:10px; background-color:#ededed" rowspan="4">
                        <div id="regions_div"></div>
                    </td>
                    <td style="width:30%">
                        <table style="width:100%; height:100%; padding:55px; background-color:#cadaeb; border-radius:10px;">
                            <tr>
                                <td colspan="2">
                                    <div class="info-header">
                                        <p id="text">[click on a state]</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <div class="info-panel">
                                    <td style="text-align:right; width:50%">
                                            <p>New Cases:</p>
                                            <p>Total Cases:</p>
                                            <p>New Deaths:</p>
                                            <p>Total Deaths:</p>
                                    </td>
                                    <td style="width:50%; padding-left:0.5%;">
                                        <b><p id="new-case">-</p></b>
                                        <p id="total-case">-</p>
                                        <p id="new-death">-</p>
                                        <p id="total-death">-</p>
                                    </td>
                                </div>
                            </tr>
                            <tr>
                                <td colspan="2"><p style="text-align:center; font-size:10px; margin:0px;">Data updated: 24/3/2022</p></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p style="text-align:center; margin-bottom:0px; font-size:20px;"><b>Total in Malaysia</b></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:right; width:50%; font-size:15px">
                                    <p style="margin-top:0px; margin-bottom:0px;">Cases:</p>
                                    <p style="margin-top:0px; margin-bottom:0px;">Deaths:</p>
                                    <p style="margin-top:0px; margin-bottom:0px;">Vaccinated:</p>
                                </td>
                                <td style="width:50%; padding-left:0.5%; font-size:15px">
                                    <p id="tot-case" style="margin-top:0px; margin-bottom:0px;"></p>
                                    <p id="tot-death" style="margin-top:0px; margin-bottom:0px;"></p>
                                    <p id="tot-vax" style="margin-top:0px; margin-bottom:0px;"></p>
                                </td>
                            </tr>
                        </table>
                    </td>  
                </tr>
            </table>
        </div>
        <div class="selection">
            <button id="perlis" onclick="selectState(this.value)" type="submit" value="7">Perlis</button>
            <button id="kedah" onclick="selectState(this.value)" type="button" value="1">Kedah</button>
            <button id="penang" onclick="selectState(this.value)" type="button" value="8">Penang</button>
            <button id="perak" onclick="selectState(this.value)" type="button" value="6">Perak</button>
            <button id="kelantan" onclick="selectState(this.value)" type="button" value="2">Kelantan</button>
            <button id="terengganu" onclick="selectState(this.value)" type="button" value="12">Terengganu</button>
            <button id="selangor" onclick="selectState(this.value)" type="button" value="11">Selangor</button>
            <button id="kl" onclick="selectState(this.value)" type="button" value="13">W.P. Kuala Lumpur</button>
            <button id="pahang" onclick="selectState(this.value)" type="button" value="5">Pahang</button>
            <button id="nsembilan" onclick="selectState(this.value)" type="button" value="4">Negeri Sembilan</button>
            <button id="melaka" onclick="selectState(this.value)" type="button" value="3">Melaka</button>
            <button id="johor" onclick="selectState(this.value)" type="button" value="0">Johor</button>
            <button id="sarawak" onclick="selectState(this.value)" type="button" value="10">Sarawak</button>
            <button id="labuan" onclick="selectState(this.value)" type="button" value="14">W.P. Labuan</button>
            <button id="sabah" onclick="selectState(this.value)" type="button" value="9">Sabah</button>
            <button id="putrajaya" onclick="selectState(this.value)" type="button" value="15">W.P. Putrajaya</button>
        </div>
        <div class="footer">
            <table>
                <tr>
                    <td style="width:30%; color:white;"><p>© 2022 to Tan Zi Ching (1181102378)</p></td>
                    <td></td>
                    <td style="width:100%; color:white; padding-right:2%;">
                        <p style="text-align:right;">
                            Data courtesy of:
                            <a href="https://github.com/MoH-Malaysia/covid19-public" target="_blank">Ministry of Health (MoH) Malaysia
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16" style="margin-top:auto; margin-bottom:auto;">
                                    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                                </svg>
                            </a>                            
                        </p>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>    

<!--REFERENCES
https://stackoverflow.com/questions/16636418/google-geochart-not-working-with-malaysia-map
https://github.com/MoH-Malaysia/covid19-public/blob/main/epidemic/cases_state.csv
https://covidnow.moh.gov.my/?refresh=1645593426598



-->