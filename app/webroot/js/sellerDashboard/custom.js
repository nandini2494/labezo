$('input[id=base-input]').change(function () {
    $('#fake-input').val($(this).val().replace("C:\\fakepath\\", ""));
});

/* ==================Javascript code for custom input type file on button ================ */

$('input[id=main-input]').change(function () {
    console.log($(this).val());
    var mainValue = $(this).val();
    if (mainValue == "") {
        document.getElementById("fake-btn").innerHTML = "Choose File";
    } else {
        document.getElementById("fake-btn").innerHTML = mainValue.replace("C:\\fakepath\\", "");
    }
});

$(function () {
    $('a[title]').tooltip();
});

$(document).ready(function () {
    $('#update_button').click(function () {
        if ($(this).text() == "Save") {
         document.getElementById('box_enabled').disabled = true
         $(this).text('Update');
         } else {
         document.getElementById('box_enabled').disabled = false
         $(this).text('Save');
         }
    });

});

/* new_div */
$(document).ready(function () {
    $('.btn-filter').on('click', function () {
        var $target = $(this).data('target');
        if ($target != 'all') {
            $('.table tbody tr').css('display', 'none');
            $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
        } else {
            $('.table tbody tr').css('display', 'none').fadeIn('slow');
        }
    });

    $('#checkall').on('click', function () {
        if ($("#mytable #checkall").is(':checked')) {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});

/* new_div end */




/* custom js */

$(document).ready(function () {
    $("#panel1").click(function () {
        $("#arow1").toggleClass("fa-chevron-left");
        $("#arow1").toggleClass("fa-chevron-down");
    });

    $("#panel2").click(function () {
        $("#arow2").toggleClass("fa-chevron-left");
        $("#arow2").toggleClass("fa-chevron-down");
    });

    $("#panel3").click(function () {
        $("#arow3").toggleClass("fa-chevron-left");
        $("#arow3").toggleClass("fa-chevron-down");
    });

    $("#panel4").click(function () {
        $("#arow4").toggleClass("fa-chevron-left");
        $("#arow4").toggleClass("fa-chevron-down");
    });

    $("#panel5").click(function () {
        $("#arow5").toggleClass("fa-chevron-left");
        $("#arow5").toggleClass("fa-chevron-down");
    });

    $("#panel6").click(function () {
        $("#arow6").toggleClass("fa-chevron-left");
        $("#arow6").toggleClass("fa-chevron-down");
    });

    $("#panel7").click(function () {
        $("#arow7").toggleClass("fa-chevron-left");
        $("#arow7").toggleClass("fa-chevron-down");
    });

    $("#panel8").click(function () {
        $("#arow8").toggleClass("fa-chevron-left");
        $("#arow8").toggleClass("fa-chevron-down");
    });

    $("#panel9").click(function () {
        $("#arow9").toggleClass("fa-chevron-left");
        $("#arow9").toggleClass("fa-chevron-down");
    });

    $("#panel10").click(function () {
        $("#arow10").toggleClass("fa-chevron-left");
        $("#arow10").toggleClass("fa-chevron-down");
    });

    $("#panel11").click(function () {
        $("#arow11").toggleClass("fa-chevron-left");
        $("#arow11").toggleClass("fa-chevron-down");
    });

    $("#menu-icon").click(function () {
        $("#chang-menu-icon").toggleClass("fa-bars");
        $("#chang-menu-icon").toggleClass("fa-times");
        $("#show-nav").toggleClass("hide-sidebar");
        $("#show-nav").toggleClass("left-sidebar");

        $("#left-container").toggleClass("less-width");
        $("#right-container").toggleClass("full-width");
    });



});



/* custom js  end */

/* count use */

/* count use end */