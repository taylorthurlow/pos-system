/**
 * These first two variables are going to make later code a lot easier to read. The skuInBox is the
 * text field in which the entered sku is placed, and the display is the div in which the transaction
 * information is displayed in its entirety. The "spin(true)" starts the spinner which will go away
 * once transaction data has been gathered and we are ready to proceed.
 **/

var skuInBox = document.getElementById('inSku');
var display = document.getElementById('pos-product-list');




/**
 * This function here executes on page load to handle the enter button when entering skus for the
 * transaction. This is why there is no "add" button next to the text box.
 **/

$("#inSku").keyup(function (event) {
    //Uncomment to test with mobile "next" button
    //alert(event.keyCode);
    if (event.keyCode == 13) {
        ringItem();
    }
    if (event.keyCode == 81) {
        popup();
    }
});

function popup() {

    if($('.pos-main').css('display') == 'block') {
        $('.pos-main').css({ 'display': 'none' });
        $('.pos-overlay').css({ 'display': 'block' });
    } else {
        $('.pos-main').css({ 'display': 'block' });
        $('.pos-overlay').css({ 'display': 'none' });
    }

}


/**
 * These following functions allow the page to capture the cursor into the
 * sku input box when the user types in numbers.
 **/

$(document).bind('keydown', function(e) {
    if(String.fromCharCode(e.keyCode) == "1") {
        $('#inSku').focus();
    }
});
$(document).bind('keydown', function(e) {
    if(String.fromCharCode(e.keyCode) == "2") {
        $('#inSku').focus();
    }
});
$(document).bind('keydown', function(e) {
    if(String.fromCharCode(e.keyCode) == "3") {
        $('#inSku').focus();
    }
});
$(document).bind('keydown', function(e) {
    if(String.fromCharCode(e.keyCode) == "4") {
        $('#inSku').focus();
    }
});
$(document).bind('keydown', function(e) {
    if(String.fromCharCode(e.keyCode) == "5") {
        $('#inSku').focus();
    }
});
$(document).bind('keydown', function(e) {
    if(String.fromCharCode(e.keyCode) == "6") {
        $('#inSku').focus();
    }
});
$(document).bind('keydown', function(e) {
    if(String.fromCharCode(e.keyCode) == "7") {
        $('#inSku').focus();
    }
});
$(document).bind('keydown', function(e) {
    if(String.fromCharCode(e.keyCode) == "8") {
        $('#inSku').focus();
    }
});
$(document).bind('keydown', function(e) {
    if(String.fromCharCode(e.keyCode) == "9") {
        $('#inSku').focus();
    }
});
$(document).bind('keydown', function(e) {
    if(String.fromCharCode(e.keyCode) == "0") {
        $('#inSku').focus();
    }
});


/**
 * This spin function takes advantage of the spin.js script to allow a spinner and a dark screen to
 * appear when scripts are loading and we need to block user input. The "opts" variable can be changed
 * if desired. Requires jQuery for the fadeIn/Out.
 **/

function spin(bool) {
    var opts = {
        lines: 13, // The number of lines to draw
        length: 20, // The length of each line
        width: 10, // The line thickness
        radius: 30, // The radius of the inner circle
        direction: 1, // 1: clockwise, -1: counterclockwise
        color: '#FFF' // #rgb or #rrggbb or array of colors
    };
    var target = document.getElementById('spinner');
    var spinner = new Spinner(opts);
    if (bool) {
        spinner.spin(target);
        $('#spinner').fadeIn();
    } else {
        spinner.stop();
        $('#spinner').fadeOut();
    }
}


/**
 * This function is called whenever the body object on the PHP page is loaded. It will set up the
 * environment needed to conduct the transaction - like giving the transaction a number and allocating
 * the proper spots in the MySQL database. As of now, the location (specified by 'data: 'loc=120'') is
 * hard coded, but in the event the system needs to be used in a different location, a configuration
 * file could be implemented that allows it to be changed without manually changing this file.
 **/

function startNewTrans() {
    $.ajax({
        type: 'POST',
        url: 'startNewTransaction.php',
        data: {
            loc: 120
        },
        success: function (data) {
            document.getElementById('curTran').innerHTML = 'Tran: ' + data + '<br>';
        }
    });
}


/**
 * This function simply adds the sku given by the user into the proper transaction table. It then calls
 * the refreshList() function which will update the list that is displayed.
 **/

function ringItem() {
    var inSku = skuInBox.value;
    $.ajax({
        url: 'ringItem.php',
        type: 'POST',
        data: {
            inSku: inSku
        },
        success: function (data) {
            refreshList();
        }
    });
}


/**
 * This function is designed to pull all the skus from a single transaction table, and then place them
 * into an array. This array is then iterated and each sku in that array is checked against the sku info
 * database, pulling information about each sku into another array. It then organizes everything in a
 * convenient manner for displaying on the main transaction window.
 **/

function refreshList() {
    $.ajax({
        url: 'refreshList.php',
        success: function (data) {
            var forParsing = data;
            var trimmed = forParsing.substring(0, (forParsing.length - 1));
            var skus = trimmed.split('|');
            var size = skus.length;
            $.ajax({
                url: 'retreiveSkuInfo.php',
                type: 'POST',
                data: {
                    skus: skus,
                    size: size
                },
                success: function (data) {
                    display.innerHTML = data;
                    skuInBox.value = '';

                    $('.overlay').css({
                        'height': ($('.pos-main').height() + 'px')
                    });
                }
            });
        }
    });



}


/**
 * This function is a simple way to add a new sku to the skus table. It takes all necesary information
 * and places it into the database. It then clears the form that called it.
 **/

function addSku() {
    $.ajax({
        url: 'addSku.php',
        type: 'POST',
        data: {
            sku: $('input#sub-sku').val(),
            nameshort: $('input#sub-nameshort').val(),
            namelong: $('input#sub-namelong').val(),
            pricefull: $('input#sub-pricefull').val(),
            pricesale: $('input#sub-pricesale').val(),
            tax: $('input#sub-tax').val()
        },
        success: function () {
            document.getElementById('sub-sku').value = '';
            document.getElementById('sub-nameshort').value = '';
            document.getElementById('sub-namelong').value = '';
            document.getElementById('sub-pricefull').value = '';
            document.getElementById('sub-pricesale').value = '';
            document.getElementById('sub-tax').value = '';
        }
    });
}
