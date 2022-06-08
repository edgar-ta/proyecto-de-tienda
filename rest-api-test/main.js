const tableBody = document.querySelector("[data-id='tableBody']");
const table = document.querySelector("");

const relativeURL = (pathname) => new URL(pathname, "http://localhost/");

document.querySelector("[data-id='fetchMoreButton']").addEventListener("click", (_) => {
    if (FETCH_DONE) return;
    let url = relativeURL("sub.php");
    url.search = new URLSearchParams({ action: "getStudents", lastFetched: LAST_FETCHED });
    fetch(url)
        .then(response => response.json())
        .then(json => {
            LAST_FETCHED = json["lastFetched"];
            FETCH_DONE   = json["fetchDone"];
            for (student of json["students"]) {
                let tableRow = document.createElement("tr");
                for (let value of Object.values(student)) {
                    let tableData = document.createElement("td");
                    tableData.innerText = value;
                    tableRow.appendChild(tableData);
                }
                tableBody.appendChild(tableRow);
            }
        })
        .catch(_ => alert("Couldn't fetch more students from the database; try again later"));
});


