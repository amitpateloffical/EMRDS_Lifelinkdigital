<select id="country">
    <option value="">Select a Country</option>
    <option value="usa">USA</option>
    <option value="canada">Canada</option>
</select>

<select id="city">
    <option value="">Select a City</option>
</select>

<input type="text" id="location" placeholder="Enter a Location">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        // Cache selectors for efficiency
        var $country = $("#country");
        var $city = $("#city");
        var $location = $("#location");
        var $textContainer = $("#text-container"); // Add an element to display the text

        // Create JavaScript objects that map countries to cities
        var citiesByCountry = {
            "usa": ["New York", "Los Angeles", "Chicago"],
            "canada": ["Toronto", "Vancouver", "Montreal"]
        };

        // Function to update the city select options
        function updateCityOptions() {
            var selectedCountry = $country.val();
            $city.empty();

            if (selectedCountry) {
                var cities = citiesByCountry[selectedCountry];
                for (var i = 0; i < cities.length; i++) {
                    $city.append("<option value='" + cities[i] + "'>" + cities[i] + "</option>");
                }
            }

            // Clear the text container
            $textContainer.text("");
        }

        // Initial call to populate cities based on the selected country
        updateCityOptions();

        // Event listeners for the country and city select fields
        $country.on("change", updateCityOptions);

        // Event listener for the location input
        $location.on("input", function() {
            // Capture the selected country, city, and location
            var selectedCountry = $country.val();
            var selectedCity = $city.val();
            var locationText = $location.val();

            // Serialize the data as JSON and display it in the text container
            var data = {
                "Country": selectedCountry,
                "City": selectedCity,
                "Location": locationText
            };
            $textContainer.text(JSON.stringify(data));
        });
    });
</script>
+
