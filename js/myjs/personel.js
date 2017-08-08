$(function () {

    //alert("Test");
    // $("#fullname").autocomplete({
    //     maxResults: 10,
    //     appendTo: "#widget-content",
    //     source: function (request, response) {
    //         $.ajax({
    //             url: "http://api.phuket.psu.ac.th/roleprovider/getuserbyname/" + encodeURIComponent($("#fullname").val()),
    //             dataType: "json",
    //             success: function (d) {
    //                 if (d.status == "ok") {
    //                     response($.map(d.result.slice(0, 15), function (item) {
    //                         return {
    //                             label: item.fullname,
    //                             value: item.account_name,
    //                             value2: item.fullname
    //                         };
    //                     }));
    //                 } else {
    //                     alert(d.status);
    //                 }
    //             }
    //         });
    //     },
    //
    //     minLength: 1,
    //     select: function (event, ui) {
    //         event.preventDefault();
    //         $("#fullname").val(ui.item.label);
    //         $("#username").val(ui.item.value);
    //         $("#From_NumControl").val(ui.item.value2);
    //         //alert($("#From_NumControl").val());
    //     },
    //     open: function () {
    //         $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
    //     },
    //     close: function () {
    //         $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
    //     }
    // });

    $("#fullname_request").autocomplete({
        maxResults: 10,
        appendTo: "#widget-content2",
        source: function (request, response) {
            $.ajax({
                url: "http://api.phuket.psu.ac.th/roleprovider/getuserbyname/" + encodeURIComponent($("#fullname_request").val()),
                dataType: "json",
                success: function (d) {
                    if (d.status == "ok") {
                        response($.map(d.result.slice(0, 15), function (item) {
                            return {
                                label: item.fullname,
                                value: item.account_name,
                                value2: item.fullname
                            };
                        }));
                    } else {
                        alert(d.status);
                    }
                }
            });
        },

        minLength: 1,
        select: function (event, ui) {
            event.preventDefault();
            $("#fullname_request").val(ui.item.label);
            // $("#username").val(ui.item.value);
            $("#user_request_name").val(ui.item.value2);
            //alert($("#From_NumControl").val());
        },
        open: function () {
            $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
        },
        close: function () {
            $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
        }
    });

    $("#user_section").autocomplete({
        maxResults: 10,
        appendTo: "#widget-content3",
        source: function (request, response) {
            $.ajax({
                url: "http://api.phuket.psu.ac.th/roleprovider/getallpktsection/" + encodeURIComponent($("#user_section").val()),
                dataType: "json",
                success: function (d) {
                //alert("555");
                    // if (d.status == "ok") {
                        response($.map(d.result.slice(0, 15), function (item) {
                            return {
                                label: item.sect_name_thai,
                                value: item.sect_name_thai
                            };
                        }));
                    // } else {
                    //     alert(d.status);
                    // }
                }
            });
        },

        minLength: 1,
        select: function (event, ui) {
            event.preventDefault();
            $("#user_section").val(ui.item.label);
            // $("#username").val(ui.item.value);
            $("#user_section_value").val(ui.item.value);
            //alert($("#From_NumControl").val());
        },
        open: function () {
            $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
        },
        close: function () {
            $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
        }
    });
});
