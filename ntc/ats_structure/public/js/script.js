setTimeout(() => {
    const alertDiv = document.getElementsByName("alert_container");
    if (alertDiv[0] != undefined)
        alertDiv[0].parentNode.removeChild(alertDiv[0]);
}, 3000);

function showJobDetails(iframeRoute) {
    var ifrm = parent.document.querySelector("[name=frame_job_details]");
    ifrm.src = iframeRoute;
}

function showMessageConvo(iframeRoute, messageId) {
    var message_id = parent.document.querySelector("[name=message_id]");
    message_id.value = messageId;
    var ifrm = parent.document.querySelector("[name=frame_message_convo]");
    ifrm.src = iframeRoute;
}

function changeApplicationStatus(status) {
    document.getElementsByName("status").value = status;
    document.submit();
}

function selectFirstMessage() {
    var firstEntry = document.getElementsByClassName("message-list-button")[0];
    firstEntry.click();
    firstEntry.focus();
}

jQuery(document).ready(function ($) {
    routeName = document.getElementsByName("route_states")[0].value;
    selected = document.getElementsByName("selected_state")[0].value;

    updateStateList(routeName, selected);

    setTimeout(function () {
        routeName = document.getElementsByName("route_cities")[0].value;
        selected = document.getElementsByName("selected_city")[0].value;

        updateCityList(routeName, selected);
    }, 500);
});

async function updateStateList(routeName, selectedState) {
    countryCode = document.getElementsByName("country")[0].value;
    provinceElement = document.getElementsByName("state")[0];

    var url = routeName.replace("country_code", countryCode);

    try {
        let response = await fetch(url);

        if (!response.ok) {
            throw new Error("Unable to fetch province data");
        }

        const provinces = await response.json();

        provinces.forEach((province) => {
            var opt = document.createElement("option");
            opt.value = province.province_code;
            opt.innerHTML = province.province_name;
            if (province.province_code === selectedState) {
                opt.selected = true;
            } else {
                opt.selected = false;
            }
            provinceElement.appendChild(opt);
        });
    } catch (err) {
        console.log(err);
    }
}

async function updateCityList(routeName, selectedCity) {
    provinceCode = document.getElementsByName("state")[0].value;
    cityElement = document.getElementsByName("city")[0];

    var url = routeName.replace("province_code", provinceCode);

    try {
        let response = await fetch(url);

        if (!response.ok) {
            throw new Error("Unable to fetch city data");
        }

        const cities = await response.json();

        cities.forEach((city) => {
            var opt = document.createElement("option");
            opt.value = city.city_code;
            opt.innerHTML = city.city_name;
            cityElement.appendChild(opt);
        });
    } catch (err) {
        console.log(err);
    }
}
