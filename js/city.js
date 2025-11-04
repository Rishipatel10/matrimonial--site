let allCities = []; // Store valid Indian cities

$(document).ready(function () {
    const username = "__solanki__abhi__"; // Replace with your GeoNames username
    const apiUrl = `https://secure.geonames.org/searchJSON?country=IN&featureClass=P&maxRows=1000&username=${username}`;

    // 🔄 Fetch all Indian cities on page load
    $.getJSON(apiUrl, function (data) {
        allCities = data.geonames.map(city => city.name.toLowerCase()); // Store city names in lowercase
    }).fail(function () {
        console.error("Error fetching city data.");
        $("#city-input").prop("disabled", true).attr("placeholder", "City data unavailable");
    });

    // 📝 Show dropdown as user types
    $("#city-input").on("input", function () {
        let query = $(this).val().trim().toLowerCase();
        let dropdown = $("#city-dropdown");
        dropdown.empty().show();

        if (query.length > 1) {
            let filteredCities = allCities.filter(city =>
                city.includes(query)
            ).slice(0, 10); // Show up to 10 results

            if (filteredCities.length > 0) {
                filteredCities.forEach(cityName => {
                    dropdown.append(`<div class='list-group-item city-option' data-city='${cityName}'>${cityName}</div>`);
                });
            } else {
                dropdown.append(`<div class='list-group-item'>No results found</div>`);
            }
        } else {
            dropdown.hide();
        }
    });

    // ✅ Select city from dropdown
    $(document).on("click", ".city-option", function () {
        $("#city-input").val($(this).data("city"));
        $("#city-dropdown").hide();
        $("#city-error").hide();
    });

    // 🚫 Clear invalid city input
    $("#city-input").on("blur", function () {
        let enteredCity = $(this).val().trim().toLowerCase();
        if (!allCities.includes(enteredCity)) {
            $(this).val(""); // Clear input if invalid
            $("#city-error").text("⚠ Please select a valid city from the dropdown.").show();
        } else {
            $("#city-error").hide();
        }
    });

    // ❌ Hide dropdown when clicking outside
    $(document).click(function (event) {
        if (!$(event.target).closest(".form-group").length) {
            $("#city-dropdown").hide();
        }
    });

    // 🚫 Validate before form submission
    $("form").on("submit", function (e) {
        let inputCity = $("#city-input").val().trim().toLowerCase();
        if (!allCities.includes(inputCity)) {
            e.preventDefault();
            $("#city-error").text("⚠ You must select a valid city from the dropdown.").show();
        } else {
            $("#city-error").hide();
        }
    });
});
