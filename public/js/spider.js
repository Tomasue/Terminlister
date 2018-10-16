let marksCanvas = document.getElementById("canvas");
let inputValue = [];
function addTo() {
    inputValue.push(document.getElementById('input').value);
    console.log(inputValue);
}


let marksData = {
    labels: ["English", "Maths", "Physics", "Chemistry", "Biology", "History"],
    datasets: [{
        label: "Student A",
        backgroundColor: "rgba(200,0,0,0.2)",
        data: inputValue.value
    }, {
        label: "Student B",
        backgroundColor: "rgba(0,0,200,0.2)",
        data: [54, 65, 60, 70, 70, 75]
    }]
};

let radarChart = new Chart(marksCanvas, {
    type: 'radar',
    data: marksData
});

