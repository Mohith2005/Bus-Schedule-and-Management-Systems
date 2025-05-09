document.getElementById("route-form").addEventListener("submit", function (e) {
    e.preventDefault();

    const source = document.getElementById("source").value;
    const destination = document.getElementById("destination").value;
    const date = document.getElementById("date").value;

    fetch("scripts/fetch_routes.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `source=${encodeURIComponent(source)}&destination=${encodeURIComponent(destination)}&date=${encodeURIComponent(date)}`
    })
    .then(res => res.json())
    .then(data => {
        const tbody = document.querySelector("#results-table tbody");
        tbody.innerHTML = "";

        if (data.length === 0) {
            tbody.innerHTML = "<tr><td colspan='5'>No routes found.</td></tr>";
        } else {
            data.forEach(route => {
                const row = `<tr>
                    <td>${route.bus_id}</td>
                    <td>${route.source} → ${route.destination}</td>
                    <td>${route.departure_time}</td>
                    <td>${route.arrival_time}</td>
                    <td>${route.status}</td>
                </tr>`;
                tbody.insertAdjacentHTML("beforeend", row);
            });
        }
    });
});
