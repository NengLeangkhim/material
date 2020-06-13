function CloseDropsown(){
        if(check_session()){
        return;
    }
    document.getElementById('dropdownsearchallform').style.display="none";
}
$(document).ready(function() {
    var i = 1;
    var a = 0;
    $('#rowFornRequestAdd').click(function() {
            if(check_session()){
        return;
    }
        i++;
        a++;
        var tblRow = '<tr id="row' + i + '">' +
            '<td >' + a +
            '</td>' +
            '<td>' +
            '<input type="text" class="form-control" name="name[]" required>' +
            '</td>' +
            '<td>' +
            '<input type="text" class="form-control" name="name[]" required>' +
            '</td>' +
            '<td>' +
            '<input type="text" class="form-control" name="name[]" required>' +
            '</td>' +
            '<td>' +
            '<input type="text" class="form-control" name="name[]" required>' +
            '</td>' +
            '<td style="text-align:center">' +
            '<button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button>' +
            '</td>' +
            '</tr>';
        $('#dynamic_fields').append(tblRow);
    });
    $(document).on('click', '.btn_remove', function() {
            if(check_session()){
        return;
    }
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
        a--;
        for (j = 1; j <= a; j++) {
            setRowPrice('tblRequestForm', )
        }
    });
});

function setRowPrice(tableId, rowId, colNum, newValue) {
        if(check_session()){
        return;
    }
    $('#' + table).find('tr#' + rowId).find('td:eq(colNum)').html(newValue);
};

$(document).ready(function() {
    $(".nav-item a").on("click", function() {
        $(".navbar-nav").find(".actives").removeClass("actives");
        $(this).parent().addClass("actives");
    });
});
var i = 1;
var a = 0;

function addrow() {
        if(check_session()){
        return;
    }
    i++;
    a++;
    var tblRow = '<tr id="row' + i + '">' +
        '<td >' + a +
        '</td>' +
        '<td>' +
        '<input type="text" class="form-control" name="description[]" required>' +
        '</td>' +
        '<td>' +
        '<input type="number" min="0" step="1" class="form-control" name="qty[]" required>' +
        '</td>' +
        '<td>' +
        '<input type="text" class="form-control" name="other[]" required>' +
        '</td>' +
        '<td>' +
        '<select class="form-control" id="sel_receiver' + a + '" name="receiver[]" required><option value="-1" disabled hidden selected></option></select>' +
        '</td>' +
        '<td style="text-align:center">' +
        '<button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button>' +
        '</td>' +
        '</tr>';
    $('#dynamic_fields').append(tblRow);
    getval_sel('get_all_staff', 'sel_receiver' + a);
};

function addrow_vehicle() {
        if(check_session()){
        return;
    }
    i++;
    a++;
    var tblRow = '<tr id="row' + i + '">' +
        // '<td >'+a+
        // '</td>'+
        '<td>' +
        '<div class="input-group">'+
           '<input type="date" class="form-control" name="date[]" required>' +
            ' <div class="input-group-append">'+
                '<span class="input-group-text fa fa-calendar" id="basic-addon2"></span>'+
            ' </div>'+
        '</div>'+
        '</td>' +
        '<td>' +
        '<div class="input-group">'+
            '<input type="time" class="form-control" name="departure_time[]" required>' +
            ' <div class="input-group-append">'+
                '  <span class="input-group-text fa fa-clock-o" id="basic-addon2"></span>'+
            ' </div>'+
        '</div>'+
        '</td>' +
        '<td>' +

        '<div class="input-group">'+
             '<input type="time" class="form-control" name="return_time[]" required>' +
            ' <div class="input-group-append">'+
                '  <span class="input-group-text fa fa-clock-o" id="basic-addon2"></span>'+
            ' </div>'+
        '</div>'+
        '</td>' +
        '<td>' +
        '<textarea class="form-control" name="destination[]" rows="1" required></textarea>' +
        '</td>' +
        '<td>' +
        '<textarea class="form-control" name="objective[]" rows="1" required></textarea>' +
        '</td>' +
        '<td>' +
        '<textarea class="form-control" name="other[]" rows="1" required></textarea>' +
        '</td>' +
        '<td style="text-align:center">' +
        '<button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button>' +
        '</td>' +
        '</tr>';
    console.log(tblRow);
    $('#dynamic_field').append(tblRow);
    datetime();
};





$(document).ready(function() {
    $("#seaechBox").keyup(function() {
        // alert();
            if(check_session()){
        return;
    }
        var name = $(this).val();
        if (name.length > 0) {
            var x = new XMLHttpRequest();
            x.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("seachChange").innerHTML = this.responseText;
                    document.getElementById('seachChange').style.display="block";
                }
            };
            x.open("GET", "views/layouts/showSearch.php?value="+name, true);
            x.send();
        } else {
            document.getElementById('seachChange').innerHTML="";
            document.getElementById('seachChange').style.display="none";
        }


    });
});



function ShowForm(id,name) {
        if(check_session()){
        return;
    }
    id=id.split(",");
    var fname = "/" + id[1] + '?id=' + id[0];
    var x = new XMLHttpRequest();
    x.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            $(".content-wrapper").html('');
            $(".content-wrapper").html(this.responseText);
            datetime();
        }
    };
    x.open("GET", fname, true);
    x.send();
}

// function ShowFormView(id, offset) {

//     id=id.split(",");
//     var fname = "views/layouts/" + id[1] + '?id=' + id[0] + '&offset=' + offset;
//     var x = new XMLHttpRequest();
//     document.getElementById("submenuchange").innerHTML='<center></br><div class="spinner-border text-primary center" role="status"><span class="sr-only">Loading...</span></div>&nbsp&nbsp<label style="font-weight:bold;font-size:16px;">Please wait...</label></center>';
//     x.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {
//             document.getElementById("submenuchange").innerHTML = this.responseText;
//         }
//     };
//     x.open("GET",'views/layouts/table.php', true);
//     x.send();
// }
function ShowFormView(id,erid,tar) {
    if(check_session()){
        return;
    }
    $('[data-toggle="tooltip"]').tooltip('dispose');
    id=id.split(",");
    var fname = "/"+id[1] + '?id=' + id[0] + '&offset=' + erid;
    var x = new XMLHttpRequest();
    setTimeout(function(){$('#more_detail').modal('show')},200);
    spin(tar);
    x.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById(tar).innerHTML = this.responseText;
            date_view();
        }
    };
    x.open("GET", fname, true);
    x.send();
}
function ShowFormAPR(id,erid,tar) {
        if(check_session()){
        return;
    }
    id=id.split(",");
    var fname = "views/layouts/" + id[1] + '?id=' + id[0] + '&erid=' + erid;
    var x = new XMLHttpRequest();
    setTimeout(function(){$('#more_detail').modal('show')},200);
    spin(tar);
    x.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById(tar).innerHTML = this.responseText;
        }
    };
    x.open("GET", fname, true);
    x.send();
}



function showSearch() {

}

// function map() {
//     alert("sdfvs");
//     var pointLatLng = new google.maps.LatLng(11.5812192, 104.8893527),
//         marker, map;
//     var mapOptions = { zoom: 15, center: pointLatLng, mapTypeId: google.maps.MapTypeId.ROADMAP };

//     var map = new google.maps.Map(document.getElementById('gmap_canvas'), mapOptions);
//     marker = new google.maps.Marker({
//         map: map,
//         draggable: true,
//         animation: google.maps.Animation.DROP,
//         position: pointLatLng
//     });
//     google.maps.event.addListener(map, 'click', function(evt) {
//         $(":input[name='latlng']").val(evt.latLng.toUrlValue(6));
//         marker.setPosition(evt.latLng);
//     });
//     google.maps.event.addListener(marker, 'dragend', function(evt) {
//         $(":input[name='latlng']").val(evt.latLng.toUrlValue(6));
//         marker.setPosition(evt.latLng);
//     });
//     infoWindow = new google.maps.InfoWindow;
//     if (navigator.geolocation) {
//         navigator.geolocation.getCurrentPosition(function(position) {
//             var pos = {
//                 lat: position.coords.latitude,
//                 lng: position.coords.longitude
//             };
//             $(":input[name='latlng']").val(pos.lat + ',' + pos.lat);
//             marker.setPosition(pos);
//             infoWindow.open(map);
//             map.setCenter(pos);
//         }, function() {
//             handleLocationError(true, infoWindow, map.getCenter());
//         });
//     } else {
//         // Browser doesn't support Geolocation
//         handleLocationError(false, infoWindow, map.getCenter());
//     }
// }

// function handleLocationError(browserHasGeolocation, infoWindow, pos) {
//     infoWindow.setPosition(pos);
//     infoWindow.setContent(browserHasGeolocation ?
//         'Error: The Geolocation service failed.' :
//         'Error: Your browser doesn\'t support geolocation.');
//     infoWindow.open(map);
// }
//    function getLocation() {
//
//        if (navigator.geolocation) {
//            navigator.geolocation.getCurrentPosition(showPosition);
//        } else {
//            alert("Geolocation is not supported by this browser.");
//        }
//    }
//
//    function showPosition(position) {
//        alert(position.coords.latitude+','+position.coords.longitude);
//        $(":input[name='latlng']").val(position.coords.latitude+','+position.coords.longitude);
//    }
// $(document).ready(function() {
//     map();
// });


// ===========================តារាងសម្រង់តម្លៃ=============================


function addrow_quotation() {
        if(check_session()){
        return;
    }
    a++;
    var tblRow =
        '<tr id="row' + i + '" class="package-row" >' +
            '<td class="style_td">' + i +
            '</td>' +
            '<td class="style_td">' +
            '<input type="text" class="form-control" name="a[]"  required>' +
            '</td>' +
            '<td class="style_td ">' +
            '<input type="number" class="form-control" name="a[]" id="num"  onchange="myFunction()" required>' +
            '</td>' +
            '<td class="style_td ">' +
            '<input type="text" class="form-control" name="a[]" required>' +
            '</td>' +
            '<td class="style_td">' +
            '<input type="number" class="form-control" name="a[]" class="amount" id="amount" onchange="myFunction()" required>' +
            '</td>' +
            '<td class="style_td ">' +
            '<input type="text" class="form-control total" name="a[]" id="total"  class="total" required disabled>' +
            '</td>' +
            '<td class="style_td ">' +
            '<input type="text" class="form-control" name="a[]" required>' +
            '</td>' +
            '<td style="text-align:center">' +
            '<button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_delete">Delete</button>' +
            '</td>' +
        '</tr>';
        i++;
    // console.log(tblRow);
    $('#addrow_quo').append(tblRow);
};
$(document).on('click', '.btn_delete', function() {
        if(check_session()){
        return;
    }
    var button_id = $(this).attr("id");
    $('#row' + button_id + '').remove();
    a--;
    myFunction();
    // for (j = 1; j <= a; j++) {
    //     setRowPrice('tblRequestForm', )
    // }

});
// $(document).on('click', '.amount', function() {

//     var num = parseInt(document.getElementById("num").value);
//     var amount = parseInt(document.getElementById("amount").value);
//     var total = num * amount;
//     // document.getElementById("total").value = total;
//     alert(total);
//     // $('tr').each(function() {
//     //     var str = 0;
//     //     $(this).find('.sub').each(function() {
//     //         var total
//     //     })
//     // })

// });

// function myFunction() {
//     // alert();
//     var num = parseInt(document.getElementById("num").value);
//     var amount = parseInt(document.getElementById("amount").value);
//     var total = num * amount;
//     // var subtotal += total;
//     document.getElementById("total").value = "$ " + total;
//     // document.getElementById("subtotal").value = "$ " + subtotal;s
//     // alert(total);
// }
function myFunction() {
        if(check_session()){
        return;
    }
    // alert();
    var subTotal = 0;
    var rows = document.querySelectorAll("tr.package-row");
    rows.forEach(function(currentRow) {
        var num = parseInt(currentRow.querySelector('#num').value);
        var price = parseInt(currentRow.querySelector('#amount').value);
        var total = 0;
        // document.querySelectorAll('num');
        if (isNaN(price) || isNaN(num)) {
            currentRow.querySelector("#total").value = "$ " + 0;
        } else {
            var total = num * price;
            currentRow.querySelector("#total").value = '$ ' + total;
            var price = parseInt(currentRow.querySelector('#amount').value);
            // console.log(total);
            subTotal += total;
        }
    });

    var lblSubTotal = document.getElementById('subtotal');
    lblSubTotal.innerHTML = '$ ' + subTotal;

}

function ViewAllForm(){
        if(check_session()){
        return;
    }
    spin('big-guy');
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("big-guy").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET", "views/layouts/AllForm.php", true);
    xmlhttp.send();
}
function dropdownsearchallformkeyup(value){
        if(check_session()){
        return;
    }
    var fmf="views/layouts/AllForm.php?value="+value;
    // spin('dropdownsearchallform');
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("dropdownsearchallform").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET",fmf , true);
    xmlhttp.send();
}

function dropdownsearchallform(){
        if(check_session()){
        return;
    }
    document.getElementById("searchallform").value = "";
    document.getElementById('dropdownsearchallform').style.display="block";
    var s="";
    dropdownsearchallformkeyup(s);
}
function hideShowFormDiv(){
    document.getElementById('seachChange').style.display="none";
}


// ===========================EQUIPMENT REQUEST FORM=============================

function addrow_requsest() {
        if(check_session()){
        return;
    }
    a++;
    var tblRow =
        '<tr id="row' + i + '" class="package-row" >' +
            '<td class="style_td">' +
            '<input type="text" class="form-control" name="product_name[]"  required>' +
            '</td>' +
            '<td class="style_td ">' +
            '<input type="text" class="form-control" name="modal[]" id="num" required>' +
            '</td>' +
            '<td class="style_td ">' +
            '<input type="number" step="1" min="1" class="form-control" name="qty[]" required>' +
            '</td>' +
            '<td class="style_td ">' +
            '<input type="text" class="form-control total" name="type[]" id="total"  class="total" required >' +
            '</td>' +
            '<td class="style_td ">' +
            '<input type="number" min="0.0001" step="0.0001" class="form-control total" name="price[]" id="total"  class="total" required >' +
            '</td>' +
            '<td style="text-align:center">' +
            '<button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_delete">Delete</button>' +
            '</td>' +
        '</tr>';
        i++;
    // console.log(tblRow);
    $('#dynamic_fields_request').append(tblRow);
};
$(document).on('click', '.btn_delete', function() {
        if(check_session()){
        return;
    }
    var button_id = $(this).attr("id");
    $('#row' + button_id + '').remove();
    a--;
    myFunction();
    // for (j = 1; j <= a; j++) {
    //     setRowPrice('tblRequestForm', )
    // }

});
function reportShow(){
        if(check_session()){
        return;
    }
    spin('big-guy');
    var today = new Date();
    var dd=""+ today.getFullYear();
    dd+="-"+(today.getMonth()+1);
    dd += "-"+today.getDate();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("big-guy").innerHTML = this.responseText;
            if(this.responseText.length>0){
                get_report_val('report-div',''+dd,''+dd);
            }
            datetime();
        }
    }
    xmlhttp.open("GET","views/layouts/report.php" , true);
    xmlhttp.send();
}
function getRandomColor() {
    var letters = '0123456789ABCDEF'.split('');
    var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}
function chart(r){
        if(check_session()){
        return;
    }
    var labels = r.map(function(e) {
        return e.name;
     });
     var data = r.map(function(e) {
        return e.count;
     });
    new Chart(document.getElementById("bar-chart"), {
        type: 'pie',
        data: {
          labels:labels, //["Africa", "Asia", "Europe", "Latin America", "North America"],
          datasets: [
            {
              label: "Request",
              backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
              data: data,//[2478,5267,734,784,433]
            }
          ]
        },
        options: {
          legend: { display: false },
          title: {
            display: true,
            text: 'Total request of each Department'
          },
        responsive: true,
        // onClick: function (e) {
        //     // debugger;
        //     var activePointLabel = this.getElementsAtEvent(e);
        //     console.log(activePointLabel);
        // },
        // scales: {
        //         yAxes: [{
        //             ticks: {
        //                 beginAtZero: true,
        //             }
        //         }]
        //     },
        }
    });
}

function date(){
    $( "input[type='date']" ).each(function( index,item ) {
        console.log(item);
        $(item).attr("type","text");
        // $(item).attr("autocomplete","off");
        $(item).css("cursor","pointer");
        $(item).datetimepicker({
            format: 'L'
        });
      });
}
function date_view(){
    $( "input[type='date']" ).each(function( index,item ) {
        console.log(item);
        $(item).attr("type","text");
        // $(item).attr("autocomplete","off");
      });
}
function time(){
    $( "input[type='time']" ).each(function( index,item ) {
        $(item).attr("type","text");
        // $(item).attr("autocomplete","off");
        $( item ).datetimepicker({
            format: 'LT'
        });
        // $(item).removeAttr("readonly");
      });
}
function datetime(){
    date();
    time();
}
