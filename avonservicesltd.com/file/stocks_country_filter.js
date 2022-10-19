$(document).ready(function () {
    var $tableSel = $('.js-dataTB');

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });

    $('.js-dataTB.link').on('click', 'tbody tr td:not(.sorting_1)', function (e) {
        if ($(e.target).parent().children('td:first').hasClass('sorting_1') == true) {
            var $link = $(this).parent().attr('data-link');
            if ((typeof $link != 'undefined') && ($link != '')) {
                window.location = $(this).parent().attr('data-link');
            }
        }
    });

    var url_string = window.location.href;
    var url = new URL(url_string);
    var c = url.searchParams.get("country");

    if (c != null)
        filterByParam(c);

    $('.table-country-filter a').on('click', function (e) {
        e.preventDefault();
        var tagValue = $(this).attr("data-value");

        if ($(this).parent().hasClass("active")) {
            tagValue = "";
            $('.table-country-filter li').removeClass("active");
        } else {
            $('.table-country-filter li').removeClass("active");
            $(this).parent().addClass("active");
        }

        tagValue = tagValue.trim();

        $.fn.dataTableExt.afnFiltering.length = 0;
        filterByCountry(0, tagValue); // We call our filter function
        $tableSel.dataTable().fnDraw(); // Manually redraw the table after filtering
    });

    /* Our main filter function
     */
    function filterByCountry(column, strValue) {
        // Custom filter syntax requires pushing the new filter to the global filter array
        $.fn.dataTableExt.afnFiltering.push(
            function (oSettings, aData, iDataIndex) {
                var rowValue = aData[column];
                return rowValue === strValue || strValue === '';
            }
        );
    }

    function filterByParam(countryCode) {
        var countryValue = countryCode;
        var $this = $("a[data-value='" + countryValue + "']");

        if ($this.parent().hasClass("active")) {
            countryValue = "";
            $('.table-country-filter li').removeClass("active");
        } else {
            $('.table-country-filter li').removeClass("active");
            $this.parent().addClass("active");
        }

        $.fn.dataTableExt.afnFiltering.length = 0;
        filterByCountry(0, countryValue); // We call our filter function
        $tableSel.dataTable().fnDraw(); // Manually redraw the table after filtering
    }
});