const fetchData = async () => {
    const response = await fetch("fetch-data.php");
    const db = await response.json();
    return db;
};

const displayDogInformation = async () => {
    const db = await fetchData();
    const breed = document.querySelector("#dog-select").value;
    document.querySelector("#dog-breed").textContent = db[breed].breed;
    document.querySelector("#dog-weight").textContent = `Weight: ${db[breed].weight}`;
    document.querySelector("#dog-life-span").textContent = `Life span: ${db[breed].lifeSpan}`;
};

document.querySelector("#dog-select").addEventListener("change", displayDogInformation);
