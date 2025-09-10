  $(function () {
    //usage
    $(".usage").persianDatepicker();

    //themes
    $("#pdpDefault").persianDatepicker({alwaysShow: true,});
    $("#pdpLatoja").persianDatepicker({theme: "latoja", alwaysShow: true,});
    $("#pdpLightorang").persianDatepicker({theme: "lightorang", alwaysShow: true,});
    $("#pdpMelon").persianDatepicker({theme: "melon", alwaysShow: true,});
    $("#pdpDark").persianDatepicker({theme: "dark", alwaysShow: true,});

    //size
    $("#pdpSmall").persianDatepicker({cellWidth: 14, cellHeight: 12, fontSize: 8});
    $("#pdpBig").persianDatepicker({cellWidth: 78, cellHeight: 60, fontSize: 18});

    //formatting
    $("#pdpF1").persianDatepicker({formatDate: "YYYY/MM/DD 0h:0m:0s:ms"});
    $("#pdpF2").persianDatepicker({formatDate: "YYYY-0M-0D"});
    $("#pdpF3").persianDatepicker({formatDate: "YYYY-NM-DW|ND", isRTL: !0});

    //startDate & endDate
    $("#pdpStartEnd").persianDatepicker({startDate: "1394/11/12", endDate: "1395/5/5"});
    $("#pdpStartToday").persianDatepicker({startDate: "today", endDate: "1410/11/5"});
    $("#pdpEndToday").persianDatepicker({startDate: "1397/11/12", endDate: "today"});

    //selectedBefor & selectedDate
    $("#pdpSelectedDate").persianDatepicker({selectedDate: "1404/1/1", alwaysShow: !0});
    $("#pdpSelectedBefore").persianDatepicker({selectedBefore: !0});
    $("#pdpSelectedBoth").persianDatepicker({selectedBefore: !0, selectedDate: "1395/5/5"});

    //jdate & gdate attributes
    $("#pdp-data-jdate").persianDatepicker({
    onSelect: function () {
    alert($("#pdp-data-jdate").attr("data-gdate"));
}
});
    $("#pdp-data-gdate").persianDatepicker({
    showGregorianDate: true,
    onSelect: function () {
    alert($("#pdp-data-gdate").attr("data-jdate"));
}
});


    //Gregorian date
    $("#pdpGregorian").persianDatepicker({showGregorianDate: true});


    //startDate is tomarrow
    var p = new persianDate();
    $("#pdpStartDateTomarrow").persianDatepicker({
    startDate: p.now().addDay(1).toString("YYYY/MM/DD"),
    endDate: p.now().addDay(4).toString("YYYY/MM/DD")
});


});
